<?
$pno = "030810";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if(!$list_url) $list_url = "association_schedule10.php";

	if(!isset($_SERVER["HTTPS"]))
	{
		  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
		  exit;
	}
?>

<?
$_dep = array(2,8);
$_tit = array('��������','���ڶ��������ƹ�');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	$returnUrl = getListUrl(Array("mode"=>"list"));
	
	$table = "ddm_daynursery";

    $toYear = $_GET[toYear];
    $toMonth = $_GET[toMonth];
    $sitem = $_GET[sitem];
    $skey = $_GET[skey];
    $page = $_GET[page];
	$query = "select * from ddm_daynursery where idx=$idx";
	$rs = sqlRow($query);

	$req_sday = strftime("%a",$rs[req_sdate]);
	$req_eday = strftime("%a",$rs[req_edate]);

	if($_SESSION[member_id]){
		$query	= "SELECT name
						, AES_DECRYPT(UNHEX(homephone),'DM') homephone
						, AES_DECRYPT(UNHEX(mobile),'DM') mobile
						, email
						, memtype1
						, memtype3
						, job1
						, cpName
						, homezipcode
						, homeaddress
						, homeaddress2
					FROM ona_member 
					WHERE userid='$_SESSION[member_id]'";
		$mbRow		= sqlRow($query);
		$exMbTel		= explode("-",$mbRow[mobile]);
		$exMbTel2		= explode("-",$mbRow[homephone]);
		$exMbEmail	= explode("@",$mbRow[email]);
	}

	$thisTime = time();

	// �ش� �̺�Ʈ�� ������ �ο�
	$appInwon = 0; //��û�ο�
	$wappInwon = 0; //����û�ο�
	$all_child_count = 0; // �߰��ڳ��û�ο�
	$wall_child_count = 0; // �߰��ڳ����û�ο�
	$app_type = 0; // ���� ddm_edu_app �� child �÷� ������ ��뿩�� üũ

/*fix.
	// ����û�ο������� ������ο��� ����
	if($rs[winwon] > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}
*/
	$del_yn = "and del_yn='N'";


	/* ��û�� �ο�ī���� */
	$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1=1 $del_yn";
	$applist = sqlArray($query);
	if($applist){
		foreach($applist as $k => $app){
			if($app[addInwon])	$appInwon += $app[addInwon]; // �߰��ο�
			if($app[applyStatus] != 'N'){
				$appInwon++;	// ����
			}	
			if($app[child]){
				$child		 = split('\|', $app[child]);
				$child_count = sizeof($child);
				$child_count = $child_count - 1;
				$all_child_count += $child_count;

				$app_type = 1; // ���� �����ʹ� child �� �־���µ�.. �̰� ���پ� �ֵ��� �ٲ��, ���� �����ʹ� �״�� �������� ������ ���� �߰�..
			}
		}
	}

	/* ����û�� �ο�ī���� */
	$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1='3' and del_yn='N'";
	$wapplist = sqlArray($query);
	if($wapplist){
		foreach($wapplist as $k => $app){
			if($app[addInwon])	$wappInwon += $app[addInwon]; // �߰��ο�
			if($app[applyStatus] != 'N'){
				$wappInwon++;	// ����
			}	
			if($app[child]){
				$child		 = split('\|', $app[child]);
				$child_count = sizeof($child);
				$child_count = $child_count - 1;
				$wall_child_count += $child_count;
			}
		}
	}

	// ���� ���� �ο�
	if(!$app_type){
		$inwon_empty = $rs[inwon] - $appInwon;
		$winwon_empty = $rs[winwon] - $wappInwon;
	}
	else{
		$inwon_empty = $rs[inwon] - $all_child_count;
		$winwon_empty = $rs[winwon] - $wall_child_count;
	}

	if(!$_SESSION[member_id]){
		$appValue = "0";
	}else{
		// ����������
		if($rs[s_cd] != "00"){
			if($mbRow[memtype1] == "����" && $mbRow[job1] != "�����ü�������"){ // ����ȸ���� ���
//				���Ⱓüũ�� �����ϱ�� �� 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // ���Ⱓ üũ
					if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // �����Ⱓ üũ
/*
						// �ߺ���û üũ
						$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
*/

						// ����, ��¥ Ȯ��
						$query02 = "select s_cd, req_sdate, edu_sdate from ddm_daynursery where idx = ".$idx;
						$ddm_chk = sqlRow($query02);

						// ������ �������� idx Ȯ��
						$req_sdate_idx = "";
						$query03	= "SELECT idx FROM ddm_daynursery WHERE s_cd='$ddm_chk[s_cd]' && req_sdate='$ddm_chk[req_sdate]'";
						$applist03 = sqlArray($query03);
						if($applist03){
							foreach($applist03 as $k => $app03){
								if($req_sdate_idx == ""){
									$req_sdate_idx = $app03[idx];
								} else{
									$req_sdate_idx .= ",".$app03[idx];
								}
							}
						}

						// ������ �������� �ߺ���û üũ
						$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx in($req_sdate_idx) && mbId='$_SESSION[member_id]' and del_yn='N'";
						$appRow	= sqlRowOne($query);

						if($appRow!="0"){
							$appValue = "4";
						}else{
							// ��û ���� üũ
							// ������ �ο��� ���Ͽ� ��û����
							if(!$rs[winwon]){ // ����û�� ������
	//							echo $inwon_empty;
								if($inwon_empty < 1){
									$appValue = "5";
								}else{
									$appValue = "1";
								}
							}else{	// ����û�� ������
								if($inwon_empty < 1){ // ��û�ο��� ��á�����
									if($winwon_empty < 1){ // ����ο��� ��á�����
										$appValue = "9";
									}else{
										$appValue = "1"; // �������
									}
								}else{
									$appValue = "1";
								}
							}
						}
					}else{
						$appValue = "2";
					}
//				}else{
//					$appValue = "3";
//				}
			}else{
				$appValue = "8";
			}
		}
	}
	if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
//		$appValue = "1";
	}

	$query	= "select * from ddm_daynursery_absence where mbId = '$_SESSION[member_id]' order by regdate desc limit 1";
	$attendance_result	= sqlRow($query);

	// ���� Ȯ��
	if($attendance_result[appidx]){
		$query02 = "select parent_idx from ddm_daynursery_app where idx = ".$attendance_result[appidx];
		$app_result	= sqlRow($query02);

		if($app_result[parent_idx]){
			$query03 = "select s_cd from ddm_daynursery where idx = ".$app_result[parent_idx];
			$ddm_result	= sqlRow($query03);
		}
	}

	$today_timestamp	= mktime(0,0,0,date('m'),date('d'),date('Y'));
	if($ddm_result[s_cd]=="10" && (int)$attendance_result[regdate] + 86400*7 > $today_timestamp)
	{
		$appValue  = "6";
		$left_days = ( (int)$attendance_result[regdate] + 86400*7 - $today_timestamp ) / 86400;
		$left_days = $left_days;
		
		$query		= "select * from ddm_daynursery where idx = '$attendance_result[eduidx]'";
		$edu_result		= sqlRow($query);
	}

	$job1 = sqlRowOne("select job1 from ona_member where userid = '".$_SESSION['member_id']."'");
?>
<!-- script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script language="javascript">
<!--
	function disChange(v1,v2){
		if(v1==1){
			switch(v2){
				case "7":
					//alert('�����ü������� �� ���ȸ���� ��û �� �� �ֽ��ϴ�.');
					//return;
				case "8":
					//alert('����ȸ��(�θ�)�� ��û �� �� �ֽ��ϴ�.');
					//return;
					break;
				case "0":
					alert('���ڶ��������ƹ� ��û�� ȸ���� �� �� �ֽ��ϴ�.');
					location.href='../member/login.php?ret_url=<?=urlencode($ret_url)?>';
					return;
				case "2":
					alert('���ڶ��������ƹ� �����Ⱓ�� �ƴմϴ�.');
					return;
				case "3":
					alert('���ڶ��������ƹ� �Ⱓ�� �������ϴ�.');
					return;
				case "4":
					alert('�̹� ��û�ϼ̽��ϴ�.(�������� �Ϸ�1ȸ ����)');
					return;
				case "5":
					alert('��û ������ �����Ǿ����ϴ�.');
					return;
				case "6":
					alert('���� ���ڶ��������ƹ� [<?=$edu_result[title]?>]�� �����Ͽ�, <?=$left_days?>�ϰ� ��û�� �Ұ����մϴ�.');
					return;
				case "9":
					alert('��û�ο��� ����û�ο��� �ʰ��Ǿ����ϴ�. ��û�����ο�:<?=$inwon_empty?>��, ��û��Ⱑ���ο�:<?=$winwon_empty?>�� �Դϴ�.');
					return;
			}		
			inwonCheck(document.frm);
			fadeIn('.__popBasic.popOnline');
//fix.			document.getElementById('display2').style.visibility = "visible";
		}else{
			fadeOut('.__popBasic.popOnline');
//fix.			document.getElementById('display2').style.visibility = "hidden";
		}
	}

	<? /*������ üũ*/ ?>
	function dateDiff(_date1, _date2) {
		if(_date1.length == 6){
			_date1 = '20'+_date1;
		}
		if(_date1.length == 8){
			_date1 = _date1.substring(0,4)+'-'+_date1.substring(4,6)+'-'+_date1.substring(6,8);
		}

		var diffDate_1 = _date1 instanceof Date ? _date1 : new Date(_date1);
		var diffDate_2 = _date2 instanceof Date ? _date2 : new Date(_date2);

		diffDate_1 = new Date(diffDate_1.getFullYear(), diffDate_1.getMonth() + 1, diffDate_1.getDate());
		diffDate_2 = new Date(diffDate_2.getFullYear(), diffDate_2.getMonth() + 1, diffDate_2.getDate());

		var diff = Math.abs(diffDate_2.getTime() - diffDate_1.getTime());
		diff = Math.ceil(diff / (1000 * 3600 * 24));

		return Math.floor((diff+1)/30);
	}

	function appCheck(f)
	{		
		var add_inwon			= Number($('[name=addInwon]')[0].value);
		var add_detail_string	= '';
		var add_child_string	= '';
		var add_childbirth_string	= '';
		var addBirth = '';
		
		// �����ο� �ʰ� ���� üũ
		// �ο�üũ�� ��ũ��Ʈ�� x ������ȭ���� üũ�Ұ����ϹǷ�..
		if(f.gubun.value == "���ڶ��������ƹ�"){
			if(Number($('select[name=child_count]')[0].value) == '0')
			{
				alert('�߰� �Ƶ��� ��� 1���� �־�� �մϴ�!');
				return false;
			}
		}
		
		// ��� �߰� �ο� ���� input �ϳ��� �ֱ�
		if(add_inwon > 0)
		{
			if(f.gubun.value == '�θ����'){
				// �߰��ο��̾��⶧���� ����
			}
			else if(f.gubun.value == '��������������')
			{
					for(var i = 0; i < add_inwon; i++){
						// ������ ä���� �ִ��� Ȯ��
						<? if($rs['license']=="Y") { ?>
						if($('[name=addName]')[i].value == '')
						{
							alert('�߰��ο��� �󼼳����� �Է��� �ֽʽÿ�.');
							$('[name=addName]')[i].focus();
							return false;
						}
						
						if($('[name=addSisulName]')[i].value == '')
						{
							alert('�߰��ο��� �󼼳����� �Է��� �ֽʽÿ�.');
							$('[name=addSisulName]')[i].focus();
							return false;
						}
						
						if($('[name=addSisulType]')[i].value == '')
						{
							alert('�߰��ο��� �󼼳����� �Է��� �ֽʽÿ�.');
							$('[name=addSisulType]')[i].focus();
							return false;
						}
						
						if($('[name=addJob]')[i].value == '')
						{
							alert('�߰��ο��� �󼼳����� �Է��� �ֽʽÿ�.');
							$('[name=addJob]')[i].focus();
							return false;
						}
						<? } ?>
						
						add_detail_string = add_detail_string + '|' + $('[name=addName]')[i].value + '|' + $('[name=addSisulName]')[i].value + '|' + $('[name=addSisulType]')[i].value + '|' + $('[name=addJob]')[i].value;
					}
				$('[name=addDetail]')[0].value = add_detail_string;
			}
			else
			{
				for(var i = 0; i < add_inwon; i++)
				{
					// ������ ä���� �ִ��� Ȯ��
					if($('[name=addName]')[i].value == '')
					{
						alert('�߰��ο��� �󼼳����� �Է��� �ֽʽÿ�.');
						$('[name=addName]')[i].focus();
						return false;
					}
		
					var addBirth = $('[name=addBirth1]')[i].value.substring(2,4) + $('[name=addBirth2]')[i].value + $('[name=addBirth3]')[i].value;
					add_detail_string = add_detail_string + '|' + $('[name=addName]')[i].value + '|' + addBirth;
					add_childbirth_string = add_childbirth_string + '|' + addBirth;
				}
				$('[name=addDetail]')[0].value = add_detail_string;
				$('[name=childbirth]')[0].value = add_childbirth_string;
			}	

		}

		switch (f.gubun.value){
			case "�θ����":

				if(f.jobh.value=="�θ�"){
					if(!f.childName.value){
						alert('�ڳ���� �Է��ϼ���!');
						f.childName.focus();
						return false;
					}
				}else{    
					if(!f.sisulName.value){
						alert('�ü����� �Է��ϼ���!');
						f.sisulName.focus();
						return false;
					}

					if(!f.sisulType.value){
						alert('�ü������� �����ϼ���!');
						f.sisulType.focus();
						return false;
					}
				}
				break;		

			case "���ڶ��������ƹ�":
				var add_childbirth_string_array = add_childbirth_string.split('|');
				/*for(var i = 1, l=add_childbirth_string_array.length; i<l; i++){
					var child_mon = dateDiff(add_childbirth_string_array[i], new Date());
					<?if($rs['climit1']) {?>
						if(child_mon < <?=$rs['climit1']?>){
							alert('���������� Ȯ�����ּ���.');
							return false;
						}
					<? } ?>
					<?if($rs['climit2']) {?>
						if(child_mon > <?=$rs['climit2']?>){
							alert('���������� Ȯ�����ּ���.');
							return false;
						}
					<? } ?>
				}*/

				break;	
			case "���������α׷�":
				var add_childbirth_string_array = add_childbirth_string.split('|');
				for(var i = 1, l=add_childbirth_string_array.length; i<l; i++){
					var child_mon = dateDiff(add_childbirth_string_array[i], new Date());
					<?if($rs['climit1']) {?>
						if(child_mon < <?=$rs['climit1']?>){
							alert('���������� Ȯ�����ּ���.');
							return false;
						}
					<? } ?>
					<?if($rs['climit2']) {?>
						if(child_mon > <?=$rs['climit2']?>){
							alert('���������� Ȯ�����ּ���.');
							return false;
						}
					<? } ?>
				}
				break;

			default:

				if(!f.sisulName.value){
					alert('�ü����� �Է��ϼ���!');
					f.sisulName.focus();
					return false;
				}

				if(!f.sisulType.value){
					alert('�ü������� �����ϼ���!');
					f.sisulType.focus();
					return false;
				}
				if(!f.job.value){
					alert('������ �����ϼ���!');
					f.job.focus();
					return false;
				}
		
				break;
		}


		if(!f.mbTel2.value){
			alert('����ó�� �Է��ϼ���!');
			f.mbTel2.focus();
			return false;
		}

		if(!f.mbTel3.value){
			alert('����ó�� �Է��ϼ���!');
			f.mbTel3.focus();
			return false;
		}

		var smsynRadio = document.getElementsByName('smsyn');
		var smsynRadioChecked = false;

		for(var i=0, il=smsynRadio.length; i<il; i++) {
			if(smsynRadio[i].checked == true) {
				smsynRadioChecked = true;
				break;
			}
		}
		if(!smsynRadioChecked){
			alert('SMS ���ſ��θ� Ȯ�����ּ���!');
			smsynRadio[0].focus();
			return false;
		}
/*.fix. 20210913 �輺��
		if(!f.pname.value){
			alert('��ȣ�� �̸��� �Է��� �ּ���!');
			f.pname.focus();
			return false;
		}
/*
		if(!f.addr1.value){
			alert('�ּҸ� �Է��� �ּ���!');
			f.addr1.focus();
			return false;
		}

		if(!f.addr3.value){
			alert('���ּҸ� �Է��� �ּ���!');
			f.addr3.focus();
			return false;
		}
*/
		// �������� �ʻ�� ���ǿ��� üũ
		if (f.agree1[0].checked == false ){
			alert("�������� �� �ʻ�� ����� �����ϼž� �̿� �� �� �ֽ��ϴ�.");
			return false;
		}

		return;
	}

	function address_find() {
		new daum.Postcode({
			oncomplete: function(data) {
				document.getElementById('addr1').value = data.zonecode;
				document.getElementById('addr2').value = data.address;
				alert('������ �ּҸ� �Է����ּ���!');
				document.getElementById('addr3').value = '';
				document.getElementById('addr3').focus();
			}
		}).open();
	}
//-->
</script>
<script language="javascript" src="/include/js/popup.js" type="text/javascript"></script>

<script>
function jsDownload_abs(v1){
	if(!document.downloadFrame){
		document.body.insertAdjacentHTML("beforeEnd","<iframe name='downloadFrame' src='about:blank' style='display:none'></iframe><form name='downloadForm' method='post' target='downloadFrame' action='download_educare.php'><input type='hidden' name='file'></form>");
	}
	document.downloadForm.file.value = v1;
	document.downloadForm.submit();
}
</script>
</head>
<body>

<form name="deleteForm" method="post" action="/skin/daynursery/viewdelete_proc.php" target="procFrame">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="boardName" value="<?=$table?>">
	<input type="hidden" name="mode" value="delete">
	<input type="hidden" name="idx" value="<?=$idx?>">
	<input type="hidden" name="returnUrl" value="<?=$returnUrl?>">
	<input type="hidden" name="board_id" value="<?=$_SESSION['member_id']?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">

			

				<div class="__boardView type2">
					<div class="top">
						<h3><?=$rs[title]?></h3><!--
						<p class="date">����� 2020-01-14</p>-->

					</div>

					<div class="__rendInfo">
						<dl>
							<dt>����</dt>
							<dd><?=$rs[gubun]?></dd>
						</dl>
						<dl>
							<dt>�����Ⱓ</dt>
							<dd><?=date("n�� d�� H��",$rs[req_sdate])."($req_sday) ~ ".date("n�� d�� H��",$rs[req_edate])."($req_eday)"?></dd>
						</dl>
						<dl>
							<dt>�ð�</dt>
							<dd><?=$rs[eTime]?></dd>
						</dl>
						<dl>
							<dt>���</dt>
							<dd><?=$rs[ePlace]?></dd>
						</dl><!--
						<dl>
							<dt>����</dt>
							<dd><?=$rs[sponsor]?></dd>
						</dl>
						<dl>
							<dt>����ó</dt>
							<dd><?=$rs[tel]?></dd>
						</dl>-->
						<dl>
							<dt>��û��Ȳ</dt>
							<dd>�����ο�<?if($rs[gubun]=='���ڶ��������ƹ�'){echo '(�Ƶ��׺�ȣ��)';}?> <?=number_format($inwon_empty)?>�� / ��û�ο�<?if($rs[gubun]=='���ڶ��������ƹ�'){echo '(�Ƶ��׺�ȣ��)';}?>
										  <? if($app_type) echo number_format($all_child_count); else echo number_format($appInwon); ?>��</dd>
						</dl><!--
						<dl>
							<dt>����û��Ȳ</dt>
							<dd>�����ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?> <?=number_format($winwon_empty)?>�� / ��û�ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?>
										  <? if($app_type) echo number_format($wall_child_count); else echo number_format($wappInwon); ?>��</dd>
						</dl>-->
<?
	if($rs['s_cd']!="00"){
		$climit = "";
		if($rs['climit1'] && $rs['climit2']) $climit = $rs['climit1']."�����̻� ~ ".$rs['climit2']."��������";
		if($rs['climit1'] && !$rs['climit2']) $climit = $rs['climit1']."�����̻�";
		if(!$rs['climit1'] && $rs['climit2']) $climit = $rs['climit2']."��������";
		if(!$rs['climit1'] && !$rs['climit2']) $climit = "����";
?><!--
						<dl>
							<dt>��������</dt>
							<dd><?=$climit?></dd>
						</dl>-->
<?}?><!--
						<dl>
							<dt>������</dt>
							<dd><?=@number_format($rs[money])?>��</dd>
						</dl>
						<dl class="wide">
							<dt>���ι��</dt>
							<dd><?=$rs[bankinfo]?></dd>
						</dl>-->
<?if($rs['e_file1'] || $rs['e_file2']){?>
						<dl class="wide">
							<dt>÷������</dt>
							<dd>
												<?if($rs['e_file1']){?><a href="#" onclick="jsDownload_abs('<?=$rs['e_file1']?>');return false;"><?=$rs['e_file1']?></a><?}?>
												<?if($rs['e_file2']){?><a href="#" onclick="jsDownload_abs('<?=$rs['e_file2']?>');return false;"><?=$rs['e_file2']?></a><?}?>
							</dd>
						</dl>
<?}?>
					</div>

					<div class="con">
						<?=str_replace("</P>","",str_replace("<P>","<br>",stripslashes($rs[content])))?>
						
						<div class="__mt50 tac">
							<a href="javascript:disChange(1,'<?=$appValue?>');" class="__btn1">�¶��� ��û�ϱ�</a>
						</div>
					</div>

				</div>

				<div class="__botArea">
<!--
					<a href="#" class="btn prev">
						<span>������</span>
						<strong>�������� �����ϴ�.</strong>
					</a>
					<a href="#" class="btn next">
						<span>������</span>
						<strong>�������� �����ϴ�.</strong>
					</a>
-->
					<div class="cen">
						<a href="<?=$list_url?>" class="__btnList"><span>���</span></a>
					</div>
				</div>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>

<div class="__popBasic popOnline">
	<div class="inner">
		<div class="title">
			<h3>���ڶ��������ƹ� �¶��� ��û�ϱ�</h3>
			<button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
		</div>
		<div class="desc">

						<form name="frm" method="post" action="viewproc.php" onSubmit="return appCheck(this);">
							<input type="hidden" name="mbId" value="<?=$_SESSION[member_id]?>">
							<input type="hidden" name="mbName" value="<?=$mbRow[name]?>">
							<input type="hidden" name="parent_idx" value="<?=$idx?>">
							<input type="hidden" name="gubun" value="<?=$rs[gubun]?>">
							<input type="hidden" name="s_cd" value="<?=$rs[s_cd]?>">

							<input type="hidden" name="addInwon" value="0">
							<input type="hidden" name="addDetail" value="">
							<input type="hidden" name="applyStatus" value="">
							<input type="hidden" name="child" value="">
							<input type="hidden" name="childbirth" value="">

			<!--div class="__provisionHead type2">
				<h3>���ǻ���</h3>
				<div class="__txt15 __mt10">
<?if($rs['s_cd']!="00"){?>
					���ɰ���� �����۳�¥�������� ���˴ϴ�.<br/>
<?}?>
					���� �� ��� ��û�� ���� ��û�� �����մϴ�.<br>
					���� �� ��� ���� �� ���� ����� �Ʒ� ����ó�� �̸��� �ּҷ� ���� ������ �߼۵˴ϴ�.<br>
					���� ����ó, �̸��� �ּҰ� ���Խ� ȸ�������� �������� �ݵ�� Ȯ�����ֽñ� �ٶ��ϴ�. 
				</div>
			</div-->

			<table class="__tblView respond __mt30">
				<caption>TABLE</caption>
				<colgroup>
					<col style="width:140px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">��û����</th>
						<td>
							<?=$rs[ePlace]?>(<?=$_SESSION['member_level']=='���' || $job1 =='�����ü�������'?'��ü':$_SESSION['member_level']?>)
						</td>
					</tr>
					<tr id="idDisType201" >
						<th scope="row"><?=$_SESSION['member_level']=='���' || $job1 =='�����ü�������'?'�ü���':'��û�ڸ�'?></th>
						<td>
												<? if($_SESSION['member_level']=='���' || $job1 =='�����ü�������') {?>
												<input id="tltjfaud" name="tltjfaud" type="text" class="__inp"> <!-- /// �ü��� /// -->
												<? } else {
													echo $mbRow[name];
												}?>
						</td>
					</tr>
					<tr id="idDisType201" >
						<th scope="row">SMS ���ſ���</th>
						<td>
												<label><input type="radio" name="smsyn" value="Y"> ���</label>
												<label><input type="radio" name="smsyn" value="N"> ������</label>
						</td>
					</tr>
					<tr>
						<th scope="row">��ȭ��ȣ</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<select name="mbTel4" class="__inp">
													<option value="02" <?if($exMbTel2[0] == "012"){ echo"selected"; }?>>02</option>
									</select>
								</li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel5" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel2[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel6" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel2[1]?>"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">�ڵ���</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<select name="mbTel1" class="__inp">
													<option value="010" <?if($exMbTel[0] == "010"){ echo"selected"; }?>>010</option>
													<option value="011" <?if($exMbTel[0] == "011"){ echo"selected"; }?>>011</option>
													<option value="016" <?if($exMbTel[0] == "016"){ echo"selected"; }?>>016</option>
													<option value="017" <?if($exMbTel[0] == "017"){ echo"selected"; }?>>017</option>
													<option value="018" <?if($exMbTel[0] == "018"){ echo"selected"; }?>>018</option>
													<option value="019" <?if($exMbTel[0] == "019"){ echo"selected"; }?>>019</option>
									</select>
								</li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel2" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel3" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[2]?>"></li>
							</ul>
						</td>
					</tr>

					<tr>
						<th scope="row">��û��</th>
						<td>
							<?=date("Y-m-d",$rs[edu_sdate])/*." ~ ".date("Y-m-d",$rs[edu_edate])*/?>
						</td>
					</tr>
					<tr>
						<th scope="row">��û�ð�</th>
						<td>
							<?=$rs[eTime]?>
						</td>
					</tr>
					<tr id="idDisType201" style="display:none;">
						<th scope="row"><?=$_SESSION['member_level']=='���' || $job1 =='�����ü�������'?'��û�ڸ�':'��ȣ�� �̸�'?></th>
						<td><input id="pname" name="pname" type="text" class="__inp" onblur="if(this.value == '<?=$mbRow[name]?>' ) {document.getElementById('pname-checkbox').checked = true;}else{document.getElementById('pname-checkbox').checked = false;}" value="<?=$mbRow[name]?>"> &nbsp;<input type="checkbox" id="pname-checkbox" onclick="if(this.checked){document.getElementById('pname').value='<?=$mbRow[name]?>';}else{document.getElementById('pname').value=''}" checked> ��û�ڿ� ����</td>
					</tr>
										<? if($_SESSION['member_level']=='���' || $job1 =='�����ü�������') { ?>
					<tr id="idDisType201" >
						<th scope="row">��å</th>
						<td><input id="wlrcor" name="wlrcor" type="text" value="" class="__inp"></td>
					</tr>
										<? } ?>
					<tr id="idDisType202" >
						<th scope="row">�߰��ο�</th>
						<td>
							<select name="child_count" onchange='<?
													//fix. if($_SESSION['member_level']!='���' && $job1!='�����ü�������'){
													if($_SESSION['member_level']!='���'){
														if($rs[s_cd] != '00') echo 'change_add_child(this)'; else echo 'change_add_inwon(this)';
													}
												?>' class="__inp">
												<?
												$limit = 5;
												if($_SESSION['member_level']=='���' || $job1 =='�����ü�������') $limit = 20;
												for($i = 0; $i <= $limit; $i++)
												{
													echo "<option value={$i}>{$i}</option>";
												}												
												?>
												</select> ��<br><span style="font-size: 12px;"><?=$_SESSION['member_level']=='���' || $job1 =='�����ü�������'?'(����, ������ ��� ����. ��ܿ� ���Ե� �ο��� ���� ����)':'(��ȣ�ڸ� ������ ������, ������ ��� ����. ��ܿ� ���Ե� �ο��� ���� ����)<br /><font color="tomato">�� �ʵ��л� ����Ұ�</font>'?></span>
						</td>
					</tr>
					<tr id='detail_tr' style='display:none'>
						<th scope="row">�󼼳���</td>
						<td class="bcontent1_m" id='add'>
							<span style="color: red;">�ؿ����ƿ� ������ �̸��� ���� �Է�</span>
						</td>
					</tr>


					<tr id="idDisType101" style='display:none'>
						<th scope="row">�ּ�</th>
						<td>
								<ul class="__form __m-w100p" style="width:290px;">
									<li><input type="text" class="__inp" id="addr1" name="addr1" maxlength="7" value="<?=$row[homezipcode]?>"></li>
									<li class="space"></li>
									<li style="width:100px;"><button type="button" class="__btn2 __w100p" onclick="address_find();">�����ȣã��</button></li>
								</ul>
								<p class="__mt10"><input type="text" class="__inp" id="addr2" name="addr2" value="<?=$row[homeaddress]?>"></p>
								<p class="__mt10"><input type="text" class="__inp" id="addr3" name="addr3" value="<?=$row[homeaddress2]?>"></p>
						</td>
					</tr>



				</tbody>
			</table>

<?if($rs[s_cd] == "00"){?>
			<dl class="__resBefore __mt20">
				<dt>1. �������� ���� �� Ȱ�뿡 ���� ����</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">�����޴� ��</td>
							<td style="text-align:center;border:1px solid #ddd;">�׸�</td>
							<td style="text-align:center;border:1px solid #ddd;">��������</td>
							<td style="text-align:center;border:1px solid #ddd;">�����Ⱓ</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">���빮�� ����������������</td>
							<td style="text-align:center;border:1px solid #ddd;">��������<br />(����, ������/������ �������, �ڵ�����ȣ, ����, ��Ÿ����)</td>
							<td style="text-align:center;border:1px solid #ddd;">�����ڷ� �� �̿��� ����</td>
							<td style="text-align:center;border:1px solid #ddd;">3��</td>
						</tr>
					</table><br>
					- ���������������� ��ȣ������15��(���������� ���� �� �̿�) �� ��38��(�Ǹ������ ��� �� ����)�� ���� �������� ������ ���� �����մϴ�.<br />
					- ������ ���������� �ٸ� �������� ������ �ʽ��ϴ�.<br />
					- �������� �������̿뿡 ���� ���Ǹ� �ź��� �� �ֽ��ϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>2. �������å�ӿ� ���� ����</dt>
				<dd>
					- �������ƹ濡�� �߻��ϴ� ��������� ��� å���� ��ȣ�ڿ��� ������<br />
					- ������ �������å�ӿ� �����մϴ�. �������å�ӿ� ���� ���Ǹ� �ź��� �� �ֽ��ϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>3. ����������ȭ�� ���� ����</dt>
				<dd>
					- �������� ó�����(CCTV)�� ��� �� ȭ�翹��, �ü����������� ������ ���� 24�ð� ���� �Կ� �� ��ȭ �ǰ� �ֽ��ϴ�.<br />
					- ������ �������� ��ȭ �� ������ �����մϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>4. ���۱� ��ȣ</dt>
				<dd>
					�� �¶��� �������� ���� �� ��� �����ڷ� �� ������ ���� �����Ͽ� �Կ�,��ȭ,ĸ�ĸ� ���������� ��3�ڿ��� �����̳� �������� ������ �������� �ʽ��ϴ�.<br>
					�� �̸� ������ ��� ���۱ǹ�(��104���� 6, �� 104���� 8)�� ���� ó������ �� �ֽ��ϴ�.
				</dd>
			</dl>
<?}else{?>
			<dl class="__resBefore __mt20">
				<dt>1. �������� ���� �� Ȱ�뿡 ���� ����</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">�����޴� ��</td>
							<td style="text-align:center;border:1px solid #ddd;">�׸�</td>
							<td style="text-align:center;border:1px solid #ddd;">��������</td>
							<td style="text-align:center;border:1px solid #ddd;">�����Ⱓ</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">���빮�� ����������������</td>
							<td style="text-align:center;border:1px solid #ddd;">��������<br />(����, ������/������ �������, �ڵ�����ȣ, ����, ��Ÿ����)</td>
							<td style="text-align:center;border:1px solid #ddd;">�����ڷ� �� �̿��� ����</td>
							<td style="text-align:center;border:1px solid #ddd;">3��</td>
						</tr>
					</table><br>
					- ���������������� ��ȣ������15��(���������� ���� �� �̿�) �� ��38��(�Ǹ������ ��� �� ����)�� ���� �������� ������ ���� �����մϴ�.<br />
					- ������ ���������� �ٸ� �������� ������ �ʽ��ϴ�.<br />
					- �������� �������̿뿡 ���� ���Ǹ� �ź��� �� �ֽ��ϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>2. �������å�ӿ� ���� ����</dt>
				<dd>
					- �������ƹ濡�� �߻��ϴ� ��������� ��� å���� ��ȣ�ڿ��� ������<br />
					- ������ �������å�ӿ� �����մϴ�. �������å�ӿ� ���� ���Ǹ� �ź��� �� �ֽ��ϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>3. ����������ȭ�� ���� ����</dt>
				<dd>
					- �������� ó�����(CCTV)�� ��� �� ȭ�翹��, �ü����������� ������ ���� 24�ð� ���� �Կ� �� ��ȭ �ǰ� �ֽ��ϴ�.<br />
					- ������ �������� ��ȭ �� ������ �����մϴ�.<br />
					- <strong>�׷��� ���Ǹ� �ź��� ��� �������ƹ� �̿뿡 ������ ���� �� �ֽ��ϴ�.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>4. ���۱� ��ȣ</dt>
				<dd>
					�� �¶��� �������� ���� �� ��� �����ڷ� �� ������ ���� �����Ͽ� �Կ�,��ȭ,ĸ�ĸ� ���������� ��3�ڿ��� �����̳� �������� ������ �������� �ʽ��ϴ�.<br>
					�� �̸� ������ ��� ���۱ǹ�(��104���� 6, �� 104���� 8)�� ���� ó������ �� �ֽ��ϴ�.
				</dd>
			</dl>
<?}?>
<!--
			<div class="__caution type2 __mt20">
				<h3>[���ǻ���]  �������� �������� ���� �� �������� ��ȭ�� �����ϸ�, �������ƹ� �̿� �� ������� �߻� �� ��� å���� ��ȣ�ڿ��� �ֽ��ϴ�.��</h3>
			</div>
-->
			<dl class="__resAgree __mt20">
				<dt>�� ���뿡 �����Ͻʴϱ�?</dt>
				<dd>
					<label><input type="radio" name="agree1"> �����մϴ�.</label>
					<label><input type="radio" name="agree1"> �������� �ʽ��ϴ�.</label>
				</dd>
			</dl>

			<div class="__botArea">
				<div class="cen">
					<button type="button" class="__btn1 gray" onclick="fadeOut($(this).closest('.__popBasic'));">���</button> &nbsp;
					<button type="submit" class="__btn1">Ȯ��</button>
				</div>
			</div>

						</form>

		</div>
	</div>
	<div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>
</div>

<script language="javascript">
<!--



//���� ��û�� �� �߰��ο� ���������� "�߰��� �ο��� �����Ű���? "��, �ƴϿ�" �ϰ� "��"��� üũ�ϸ�, "���� ��û�ڵ� ������ �Բ� �����Ͻǰǰ���? "��, �ƴϿ�" �����  "��" ��� �ϸ� �߰� �ο��� �߰� �󼼳���(����ĭ�� �����ּ���. �ü���� �ü�����,����ó�� �ʼ��� ���ּ���)�� ���������� �ֽð�, 
 //"�ƴϿ�"��� �ϸ� �߰��ο���û ĭ�� �� ������ ���ּ���.

	function inwonCheck(f)
	{
		//if(confirm("�߰��� �ο��� �����Ű���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)")){
			$('#add_tr').css('display', '');
		//} else {
			//$('#add_tr').css('display', 'none');
			//$('select[name=child_count]').val(0).trigger('change');
		//}
		return;
	}


	function jsJobCh(){
		f = document.frm;
		if(f.job.value=="�θ�"){
			//document.getElementById('idDisType103').style.display = "";
			//document.getElementById('idDisType201').style.display = "none";
			//document.getElementById('idDisType202').style.display = "none";
			//document.getElementById('idDisType203').style.display = "none";
		}else{
			//document.getElementById('idDisType103').style.display = "none";
			//document.getElementById('idDisType201').style.display = "";
			//document.getElementById('idDisType202').style.display = "";
			//document.getElementById('idDisType203').style.display = "";
		}
	}

	function autoRun(v){
		switch (v){
			/*case "�θ����":
				document.getElementById('idDisType103').style.display = "";
				document.getElementById('idDisType201').style.display = "none";
				document.getElementById('idDisType202').style.display = "none";
				document.getElementById('idDisType203').style.display = "none";
				break;
			case "���������α׷�":
				document.getElementById('idDisType103').style.display = "none";
				document.getElementById('idDisType201').style.display = "none";
				document.getElementById('idDisType202').style.display = "none";
				document.getElementById('idDisType203').style.display = "none";
				break;*/
			case "���ڶ��������ƹ�":
				//document.getElementById('idDisType103').style.display = "none";
				//document.getElementById('idDisType201').style.display = "none";
				//document.getElementById('idDisType202').style.display = "none";
				//document.getElementById('idDisType203').style.display = "none";
				break;
			default:
				//document.getElementById('idDisType103').style.display = "none";
				//document.getElementById('idDisType201').style.display = "";
				//document.getElementById('idDisType202').style.display = "";
				//document.getElementById('idDisType203').style.display = "";
				break;
		}
		
	}
	autoRun('<?=$rs[gubun]?>');

	/* ���������� */
	function change_add_inwon(object)
	{	
		var previous_inwon	= $('[name=addInwon]')[0].value;
		var add_inwon		= object.value;
		var difference		= add_inwon - previous_inwon;
		var difference_abs	= Math.abs(difference);

		var head_form		= "<div id='head_form'><span style='margin-right:50px;margin-left:15px;'>����</span><span style='margin-right:33px;'>�ü���</span><span style='margin-right:43px;'>�ü�����</span><span style='margin-right:50px;'>����</span></div>";
		var form_string		= "<div class=add_detail><input class='input_3' name='addName' style='width:70px; margin-right:5px;'><input class='input_3' name='addSisulName' value='<?=$mbRow[cpName]?>' style='width:70px;margin-right:5px;'><input class='input_3' name='addSisulType' style='width:70px; margin-right:5px;'><select name='addJob' style='width:80px;margin-right:5px;'><option value=''>����</option><option value='����'>����</option><option value='��������'>��������</option><option value='Ư������'>Ư������</option><option value='ġ���'>ġ���</option><option value='��ȣ��'>��ȣ��</option><option value='�����'>�����</option><option value='����'>����</option><option value='��Ÿ'>��Ÿ</option></select></div>";

		$('[name=addInwon]')[0].value = add_inwon;
		
		// �߰��ο��� ���� ��
		if(add_inwon > 0)
		{
			$('#detail_tr').css('display', '');

			// head_form �� ���� ���� �߰��Ѵ�.
			if(document.getElementById('head_form') == null)
			{
				$('#add').append(head_form);
			}			
		}
		// �߰��ο��� ���� ��
		else
		{
			$('#detail_tr').css('display', 'none');
			//$('#add').remove();
		}


		// �ο��� �÷��� ��
		if(difference > 0)
		{
			for(var i = 0; i < difference; i++)
			{
				$('#add').append(form_string);
			}
		}
		// �ο��� �ٿ��� ��
		else if(difference < 0)
		{
			for(var i = 0; i < difference_abs; i++)
			{
				// .add_detail ���߿� �ڿ������� �����Ѵ�.
				$('.add_detail:last').remove();
			}
		}
			
		return;
	}

	/* ���������(����������x) */
	function change_add_child(object)
	{	
		var previous_inwon	= $('[name=addInwon]')[0].value;
		var add_inwon		= object.value;
		var difference		= add_inwon - previous_inwon;
		var difference_abs	= Math.abs(difference);
		
		var option_addBirth1 = "";
		var option_addBirth2 = "";
		var option_addBirth3 = "";

		var d = new Date();
		var year = d.getFullYear();
		
		// �� ����
		option_addBirth1 += "<select name='addBirth1' style='margin-right:5px;'>"
		for(var i = year; i>=year-80; i--){
			option_addBirth1 += "<option value='"+i+"'>"+i+"</option>";
		}
		option_addBirth1 += "</select>"
		
		// �� ����
		option_addBirth2 += "<select name='addBirth2' style='margin-right:5px;'>"
		for(var i = 1; i<=12; i++){
			if(i < 10 ){
				option_addBirth2 += "<option value='0"+i+"'>0"+i+"</option>";
			}else{
				option_addBirth2 += "<option value='"+i+"'>"+i+"</option>";
			}
		}
		option_addBirth2 += "</select>"

		// �� ����
		option_addBirth3 += "<select name='addBirth3' style='margin-right:5px;'>"
		for(var i = 1; i<=31; i++){
			if(i < 10 ){
				option_addBirth3 += "<option value='0"+i+"'>0"+i+"</option>";
			}else{
				option_addBirth3 += "<option value='"+i+"'>"+i+"</option>";
			}
		}
		option_addBirth3 += "</select>"

		var head_form		= "<div id='head_form'><span style='margin-left:4px;'>�̸�(������ �� ������)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style='margin-left:12px;'>�������</span></div>";
		var form_string		= "<div class='add_detail'>";
			form_string		+= "<span><input type='text' class='input_3' name='addName' style='width:70px; margin-right:5px;'></span>";
			form_string		+= "<span>"+option_addBirth1+option_addBirth2+option_addBirth3+"</span>";
			form_string		+= "</div>";

		$('[name=addInwon]')[0].value = add_inwon;

		
		// �߰��ο��� ���� ��
		if(add_inwon > 0)
		{
			$('#detail_tr').css('display', '');

			// head_form �� ���� ���� �߰��Ѵ�.
			if(document.getElementById('head_form') == null)
			{
				$('#add').append(head_form);
			}	
		}
		// �߰��ο��� ���� ��
		else
		{
			$('#detail_tr').css('display', 'none');
//			$('#add').remove();
		}


		// �ο��� �÷��� ��
		if(difference > 0)
		{
			for(var i = 0; i < difference; i++)
			{
				$('#add').append(form_string);
			}
		}
		// �ο��� �ٿ��� ��
		else if(difference < 0)
		{			
			for(var i = 0; i < difference_abs; i++)
			{
				// .add_detail ���߿� �ڿ������� �����Ѵ�.
				$('.add_detail:last').remove();			
			}
		}
			
		return;
	}
//-->
</script>

</body>
</html>
<?}?>