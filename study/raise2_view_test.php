<?
$pno = "030902";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if(!$list_url) $list_url = "raise.php";
?>
<?
$_dep = array(4,2);
$_tit = array('���� �� ���','���� �� ���');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
$returnUrl = getListUrl(Array("mode"=>"list"));
$list_url .= "?pno=".$pno."&page=".$page."&toYear=".$toYear."&toMonth=".$toMonth."&sitem=".$sitem."&skey=".$skey;


	$table = "ddm_edu_main";

    $toYear = $_GET[toYear];
    $toMonth = $_GET[toMonth];
    $sitem = $_GET[sitem];
    $skey = $_GET[skey];
    $page = $_GET[page];
	$query = "select * from ddm_edu_main where idx=$idx";
	$rs = sqlRow($query);


	$edu_sdate = date("Y-m-d",$rs['edu_sdate']);
	$edu_edate = date("Y-m-d",$rs['edu_edate']);

	$mEduDate = $edu_sdate;
	if($edu_sdate != $edu_edate) $mEduDate .= " ~ ".$edu_edate;


	$req_sday = strftime("%a",$rs[req_sdate]);
	$req_eday = strftime("%a",$rs[req_edate]);

	if($_SESSION[member_id]){
		$query	= "SELECT name
						, AES_DECRYPT(UNHEX(mobile),'DM') mobile
						, email
						, memtype1
						, memtype3
						, job1
						, cpName 
					FROM ona_member 
					WHERE userid='$_SESSION[member_id]'";
		$mbRow		= sqlRow($query);
		$exMbTel		= explode("-",$mbRow[mobile]);
		$exMbEmail	= explode("@",$mbRow[email]);
	}

	$thisTime = time();

	// �ش� �̺�Ʈ�� ������ �ο�
	$appInwon = 0; //��û�ο�
	$wappInwon = 0; //����û�ο�
	$all_child_count = 0; // �߰��ڳ��û�ο�
	$wall_child_count = 0; // �߰��ڳ����û�ο�
	$app_type = 0; // ���� ddm_edu_app �� child �÷� ������ ��뿩�� üũ

	// ����û�ο������� ������ο��� ����
	if($rs[winwon] > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}

	/* ��û�� �ο�ī���� */
	$query = "select * from ddm_edu_app where parent_idx = '$idx' and status1=1 $del_yn";
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
	$query = "select * from ddm_edu_app where parent_idx = '$idx' and status1='3' and del_yn='N'";
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
		if($rs[s_cd] == "00"){
			if($mbRow[memtype1] != "���" && $mbRow[job1] != "�����ü�������"){ // ����ȸ��(�θ�)�� ���
				$appValue = "7";
			}else{
//				���Ⱓüũ�� �����ϱ�� �� 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // ���Ⱓ üũ
					if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // �����Ⱓ üũ
						// �ߺ���û üũ
						$query	= "SELECT count(*) FROM ddm_edu_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
						$appRow		= sqlRowOne($query);
						if($appRow!="0"){
							$appValue = "4";
						}else{
							// ��û ���� üũ
							// ������ �ο��� ���Ͽ� ��û����
							if(!$rs[winwon]){ // ����û�� ������
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
								}else if($inwon_empty > 0 && $wappInwon > 0){
									if($winwon_empty < 1){
										$appValue = "9";
									} else {
										$appValue = "1";
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
			}
		}
		//��ʸ�, ���� ���������
		else{
			if($mbRow[memtype1] == "����" && $mbRow[job1] != "�����ü�������"){ // ����ȸ���� ���
//				���Ⱓüũ�� �����ϱ�� �� 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // ���Ⱓ üũ
	// 				if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // �����Ⱓ üũ
	// 					// �ߺ���û üũ
	// 					$query	= "SELECT count(*) FROM ddm_edu_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
	// 					$appRow	= sqlRowOne($query);
	// 					if($appRow!="0"){
	// 						$appValue = "4";
	// 					}else{
	// 						// ��û ���� üũ
	// 						// ������ �ο��� ���Ͽ� ��û����
	// 						if(!$rs[winwon]){ // ����û�� ������
	// //							echo $inwon_empty;
	// 							if($inwon_empty < 1){
	// 								$appValue = "5";
	// 							}else{
	// 								$appValue = "1";
	// 							}
	// 						}else{	// ����û�� ������
	// 							if($inwon_empty < 1){ // ��û�ο��� ��á�����
	// 								if($winwon_empty < 1){ // ����ο��� ��á�����
	// 									$appValue = "9";
	// 								}else{
	// 									$appValue = "1"; // �������
	// 								}
	// 							}else if($inwon_empty > 0 && $wappInwon > 0){
	// 								if($winwon_empty < 1){
	// 									$appValue = "9";
	// 								} else {
	// 									$appValue = "1";
	// 								}
	// 							}else{
	// 								$appValue = "1";
	// 							}
	// 						}
	// 					}
	// 				}else{
	// 					$appValue = "2";
	// 				}
					$appValue = "1";
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

	$query	= "select * from ddm_edu_absence where mbId = '$_SESSION[member_id]' order by regdate desc limit 1";
	$attendance_result	= sqlRow($query);
	$today_timestamp	= mktime(0,0,0,date('m'),date('d'),date('Y'));
	if((int)$attendance_result[regdate] + 86400*30 > $today_timestamp)
	{
		$appValue  = "6";
		$left_days = ( (int)$attendance_result[regdate] + 86400*30 - $today_timestamp ) / 86400;
		$left_days = $left_days;
		
		$query		= "select * from ddm_edu_main where idx = '$attendance_result[eduidx]'";
		$edu_result		= sqlRow($query);
	}
?>
<script language="javascript">
<!--
	function disChange(v1,v2){
		if(v1==1){
			switch(v2){
				case "7":
					alert('�����ü������� �� ���ȸ���� ��û �� �� �ֽ��ϴ�.');
					return;
				case "8":
					alert('����ȸ��(�θ�)�� ��û �� �� �ֽ��ϴ�.');
					return;
				case "0":
					alert('���� �� ��� ��û�� ȸ���� �� �� �ֽ��ϴ�.');
					location.href='../member/login.php?ret_url=<?=urlencode($ret_url)?>';
					return;
				case "2":
					alert('���� �� ��� �����Ⱓ�� �ƴմϴ�.');
					return;
				case "3":
					alert('���� �� ���Ⱓ�� �������ϴ�.');
					return;
				case "4":
					alert('�̹� ��û�ϼ̽��ϴ�.');
					return;
				case "5":
					alert('��û ������ �����Ǿ����ϴ�.');
					return;
				case "6":
					alert('���� ���� [<?=$edu_result[title]?>]�� �����Ͽ�, <?=$left_days?>�ϰ� ������û�� �Ұ����մϴ�.');
					return;
				case "9":
					alert('��û�ο��� ����û�ο��� �ʰ��Ǿ����ϴ�. ��û�����ο�:<?=$inwon_empty?>��, ��û��Ⱑ���ο�:<?=$winwon_empty?>�� �Դϴ�.');
					return;
			}		
			inwonCheck(document.frm);
			//fix.document.getElementById('display2').style.visibility = "visible";
			fadeIn('.__popBasic.popOnline');
		}else{
			//fix.document.getElementById('display2').style.visibility = "hidden";
			fadeOut('.__popBasic.popOnline');
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
		if(f.gubun.value == "�츮���� ����" || f.gubun.value == "���������α׷�"){
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

			case "�츮���� ����":
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

		if(!f.mbEmail1.value){
			alert('�̸����� �Է��ϼ���!');
			f.mbEmail1.focus();
			return false;
		}

		if(!f.mbEmail2.value){
			alert('�̸����� �Է��ϼ���!');
			f.mbEmail2.focus();
			return false;
		}

		// �������� �ʻ�� ���ǿ��� üũ
		if (f.agree1[0].checked == false ){
			alert("�������� �� �ʻ�� ����� �����ϼž� �̿� �� �� �ֽ��ϴ�.");
			return false;
		}
		return;
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

<form name="deleteForm" method="post" action="/skin/educare/viewdelete_proc.php" target="procFrame">
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

				<div class="__tab4">
					<a href="<?=DIR?>/study/care.php"><span>��������</span></a>
					<a href="<?=DIR?>/study/raise.php" class="active"><span>��������</span></a>
				</div>

				<div class="__tab __mt10">
					<a href="raise.php"><span>��ʸ��� / ������� / ���2����</span></a>
					<a href="raise_2.php" class="active"><span>������</span></a>
				</div>

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
							<dt>���Ⱓ</dt>
							<dd><?=$mEduDate?></dd>
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
						</dl>
						<dl>
							<dt>����</dt>
							<dd><?=$rs[sponsor]?></dd>
						</dl>
						<dl>
							<dt>����ó</dt>
							<dd><?=$rs[tel]?></dd>
						</dl>
						<dl>
							<dt>��û��Ȳ</dt>
							<dd>�����ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?> <?=number_format($inwon_empty)?>�� / ��û�ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?>
										  <? if($app_type) echo number_format($all_child_count); else echo number_format($appInwon); ?>��</dd>
						</dl>
						<dl>
							<dt>����û��Ȳ</dt>
							<dd>�����ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?> <?=number_format($winwon_empty)?>�� / ��û�ο�<?if($rs[gubun]=='�츮���� ����' || $rs[gubun]=='���������α׷�'){echo '(�Ƶ�)';}?>
										  <? if($app_type) echo number_format($wall_child_count); else echo number_format($wappInwon); ?>��</dd>
						</dl>
<?
	if($rs['s_cd']!="00"){
		$climit = "";
		if($rs['climit1'] && $rs['climit2']) $climit = $rs['climit1']."�����̻� ~ ".$rs['climit2']."��������";
		if($rs['climit1'] && !$rs['climit2']) $climit = $rs['climit1']."�����̻�";
		if(!$rs['climit1'] && $rs['climit2']) $climit = $rs['climit2']."��������";
		if(!$rs['climit1'] && !$rs['climit2']) $climit = "����";
?>
						<dl>
							<dt>��������</dt>
							<dd><?=$climit?></dd>
						</dl>
<?}?>
						<dl>
							<dt>������</dt>
							<dd><?=@number_format($rs[money])?>��</dd>
						</dl>
						<dl class="wide">
							<dt>���ι��</dt>
							<dd><?=$rs[bankinfo]?></dd>
						</dl>
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
			<h3>���� �� ��� �¶��� ��û�ϱ�</h3>
			<button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
		</div>
		<div class="desc">

						<form name="frm" method="post" action="viewproc.php" onSubmit="return appCheck(this);">
							<input type="hidden" name="mbId" value="<?=$_SESSION[member_id]?>">
							<input type="hidden" name="mbName" value="<?=$mbRow[name]?>">
							<input type="hidden" name="parent_idx" value="<?=$idx?>">
							<input type="hidden" name="gubun" value="<?=$rs[gubun]?>">

							<input type="hidden" name="addInwon" value="0">
							<input type="hidden" name="addDetail" value="">
							<input type="hidden" name="applyStatus" value="">
							<input type="hidden" name="child" value="">
							<input type="hidden" name="childbirth" value="">

			<div class="__provisionHead type2">
				<h3>���ǻ���</h3>
				<div class="__txt15 __mt10">
<?if($rs['s_cd']!="00"){?>
					���ɰ���� �����۳�¥�������� ���˴ϴ�.<br/>
<?}?>
					���� �� ��� ��û�� ���� ��û�� �����մϴ�.<br>
					���� �� ��� ���� �� ���� ����� �Ʒ� ����ó�� �̸��� �ּҷ� ���� ������ �߼۵˴ϴ�.<br>
					���� ����ó, �̸��� �ּҰ� ���Խ� ȸ�������� �������� �ݵ�� Ȯ�����ֽñ� �ٶ��ϴ�. 
				</div>
			</div>

			<table class="__tblView respond __mt30">
				<caption>TABLE</caption>
				<colgroup>
					<col style="width:140px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">��û�ڸ�</th>
						<td>
							<?=$mbRow[name]?>
						</td>
					</tr>
					<? if($rs[gubun]=="�θ����"){ ?>
					<tr style='display:none'>
						<th scope="row"> ����</th>
						<td>
							<select name="jobh" onChange="jsJobCh()" class="__inp">
								<option value="�θ�">�θ�</option>
								<option value="�����ü�������">�����ü�������</option>
							</select>
						</td>
					</tr>
					<? } ?>
					<!-- �θ� -->
					<tr id="idDisType101" style="display:none">
						<th scope="row">�ּ�</th>
						<td><input name="addr" type="text" value="" class="__inp"></td>
					</tr>
					<tr id="idDisType103"  style="display:none">
						<th scope="row">�ڳ��</th>
						<td><input name="childName" type="text" value="" class="__inp"></td>
					</tr>
					<!-- �����ü������� -->
					<tr id="idDisType201" >
						<th scope="row">�ü���</th>
						<td><input name="sisulName" type="text" value="<?=$mbRow[cpName]?>" class="__inp"></td>
					</tr>
					<tr id="idDisType202" >
						<th scope="row">�ü�����</th>
						<td>
							<select name="sisulType" class="__inp">
								<option value="">�ü�����</option>
								<option value="������" <?if($mbRow[memtype3]=="������") echo "selected";?>>������</option>
								<option value="����" <?if($mbRow[memtype3]=="����") echo "selected";?>>����</option>
								<option value="���ο�" <?if($mbRow[memtype3]=="���ο�") echo "selected";?>>���ο�(��ü)</option>
								<option value="�ΰ�" <?if($mbRow[memtype3]=="�ΰ�") echo "selected";?>>�ΰ�</option>
								<option value="����" <?if($mbRow[memtype3]=="����") echo "selected";?>>����</option>
								<option value="����" <?if($mbRow[memtype3]=="����") echo "selected";?>>����</option>
								<option value="�θ�����" <?if($mbRow[memtype3]=="�θ�����") echo "selected";?>>�θ�����</option>
							</select>
						</td>
					</tr>
					<tr id="idDisType203" >
						<th scope="row">����</th>
						<td>
							<select name="job" class="__inp">
								<option value="">:: ���� ::</option>
								<option value="����">����</option>
								<option value="��������">��������</option>
								<option value="Ư������">Ư������</option>
								<option value="ġ���">ġ���</option>
								<option value="��ȣ��">��ȣ��</option>
								<option value="�����">�����</option>
								<option value="����">����</option>
								<option value="��Ÿ">��Ÿ</option>
							</select>
						</td>
					</tr>


					<tr>
						<th scope="row">����ó</th>
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
						<th scope="row">�̸���</th>
						<td>
							<ul class="__form email" style="width:100%">
								<li><input type="text" class="__inp" name="mbEmail1" value="<?=$exMbEmail[0]?>"></li>
								<li class="dash">@</li>
								<li><input type="text" class="__inp" name="mbEmail2" value="<?=$exMbEmail[1]?>"></li>
								<li class="space"></li>
								<li class="sel">
									<select name="aa" id="aa" class="__inp" onChange="if(this.value=='NONE'){this.form.mbEmail2.select();this.form.mbEmail2.focus();}else{this.form.mbEmail2.value=this.value;}">
												  <option value=NONE>�����Է�</option>
												  <option value=chollian.net>chollian.net</option>
												  <option value=empal.com>empal.com</option>
												  <option value=freechal.com>freechal.com</option>
												  <option value=hanafos.com>hanafos.com</option>
												  <option value=hanmir.com>hanmir.com</option>
												  <option value=hihome.com>hihome.com</option>
												  <option value=hitel.net>hitel.net</option>
												  <option value=intizen.com>intizen.com</option>
												  <option value=kebi.com>kebi.com</option>
												  <option value=korea.com>korea.com</option>
												  <option value=kornet.net>kornet.net</option>
												  <option value=lycos.co.kr>lycos.co.kr</option>
												  <option value=msn.com>msn.com</option>
												  <option value=naver.com>naver.com</option>
												  <option value=nate.com>nate.com</option>
												  <option value=netian.com>netian.com</option>
												  <option value=netsgo.com>netsgo.com</option>
												  <option value=orgio.net>orgio.net</option>
												  <option value=sayclub.com>sayclub.com</option>
												  <option value=shinbiro.com>shinbiro.com</option>
												  <option value=thrunet.com>thrunet.com</option>
												  <option value=unitel.co.kr>unitel.co.kr</option>
												  <option value=yahoo.com>yahoo.com</option>
												  <option value=yahoo.co.kr>yahoo.co.kr</option>
									</select>
								</li>
							</ul>
						</td>
					</tr>
					<tr <?if($rs[gubun]=="�θ����"){?>style='display:none'<?}?>>
						<th scope="row"><? if($rs[s_cd] != '00') echo "�߰��Ƶ�"; else echo "�߰��ο�";?></th>
						<td>
							<div>
								<select class="__inp" style="width:60px;" name="child_count" onchange='<? if($rs[s_cd] != '00') echo 'change_add_child(this)'; else echo 'change_add_inwon(this)'; ?>'>
												<?
												for($i = 0; $i <= 100; $i++)
												{
													echo "<option value={$i}>{$i}</option>";
												}												
												?>
								</select>
								��
							</div>
							<div class="__mt10">(��ȣ�ڸ� ������ ������, ������ ��� ����, ��ܿ� ���Ե� �ο��� ���� ����)</div>
						</td>
					</tr>
					<tr id='detail_tr' style='display:none'>
						<th scope="row"><? if($rs[s_cd] != '00') echo "�߰��Ƶ�"; else echo "�߰��ο�";?> �󼼳���</th>
						<td class="bcontent1_m" id='add'>																	
						</td>
					</tr>


				</tbody>
			</table>

<?if($rs[s_cd] == "00"){?>
			<dl class="__resBefore __mt20">
				<dt>[�������� �����̿� ����]</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">�׸�</td>
							<td style="text-align:center;border:1px solid #ddd;">��������</td>
							<td style="text-align:center;border:1px solid #ddd;">�����Ⱓ</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">����, ����� ��, ����, ����ó, �ʻ�� ��</td>
							<td style="text-align:center;border:1px solid #ddd;">�����, �����ڷ�</td>
							<td style="text-align:center;border:1px solid #ddd;">2��</td>							
						</tr>
					</table><br>
					�� ������ ���������� �������� �� �ٸ� �������� ������ ������, �������� ���� �̿뿡 �ź��� �Ǹ��� �ֽ��ϴ�. �׷��� �������� ���� �� ���� ������ ���ѵ˴ϴ�.
				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>[���۱� ��ȣ]</dt>
				<dd>
					�� �¶��� �������� ���� �� ��� �����ڷ� �� ������ ���� �����Ͽ� �Կ�,��ȭ,ĸ�ĸ� ���������� ��3�ڿ��� �����̳� �������� ������ �������� �ʽ��ϴ�.<br>
					�� �̸� ������ ��� ���۱ǹ�(��104���� 6, �� 104���� 8)�� ���� ó������ �� �ֽ��ϴ�.
				</dd>
			</dl>

			<dl class="__resBefore __mt20">
				<dt>[������� �� ���� ����]</dt>
				<dd>
					ȸ���� �� ������ ���� ���� �Ἦ�� �� ���, ����Ǵ� ���ѻ��׿� �����մϴ�.<br>
					<span class="__orange">�� �����Ϸ� ���� 30�� ���� ���� ��û �Ұ�</span><br>
					�� ��, �Ʒ��� ���� ������ ���ܷ� �����<br>
					�� ���� ���� ��ҽ�, ��ȭ �����Ͽ� ���� �Ǵ� ������ ��ȯ���� ������ ����� ���<br>
					�� ���� ����, ��� �� �Ұ����� ������ �߻��� ��� ( �����Ϸ� ���� 7�� �̳��� ���������� ���Ϳ� �����ؾ� ��.)<br>
					�� ���� ������ ���ϴ� ȸ���� ���� ������ ��û ��Ź �帮��, �������� ���� �� ���� ������ ���ѵ˴ϴ�.
				</dd>
			</dl>
<?}else{?>
			<dl class="__resBefore __mt20">
				<dt>[�������� �����̿� ����]</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">�׸�</td>
							<td style="text-align:center;border:1px solid #ddd;">��������</td>
							<td style="text-align:center;border:1px solid #ddd;">�����Ⱓ</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">����, ����� ��, ����, ����ó, �ʻ�� ��</td>
							<td style="text-align:center;border:1px solid #ddd;">�����, �����ڷ�</td>
							<td style="text-align:center;border:1px solid #ddd;">2��</td>							
						</tr>
					</table><br>
					�� ������ ���������� �������� �� �ٸ� �������� ������ ������, �������� ���� �̿뿡 �ź��� �Ǹ��� �ֽ��ϴ�. �׷��� �������� ���� �� ���� ������ ���ѵ˴ϴ�.
				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>[���۱� ��ȣ]</dt>
				<dd>
					�� �¶��� �������� ���� �� ��� �����ڷ� �� ������ ���� �����Ͽ� �Կ�,��ȭ,ĸ�ĸ� ���������� ��3�ڿ��� �����̳� �������� ������ �������� �ʽ��ϴ�.<br>
					�� �̸� ������ ��� ���۱ǹ�(��104���� 6, �� 104���� 8)�� ���� ó������ �� �ֽ��ϴ�.
				</dd>
			</dl>

			<dl class="__resBefore __mt20">
				<dt>[������� �� ���� ����]</dt>
				<dd>
					ȸ���� �� ������ ���� ���� �Ἦ�� �� ���, ����Ǵ� ���ѻ��׿� �����մϴ�.<br>
					<span class="__orange">�� �����Ϸ� ���� 30�� ���� ���� ��û �Ұ�</span><br>
					�� ��, �Ʒ��� ���� ������ ���ܷ� �����<br>
					�� ���� ���� ��ҽ�, ��ȭ �����Ͽ� ���� �Ǵ� ������ ��ȯ���� ������ ����� ���<br>
					�� ���� ����, ��� �� �Ұ����� ������ �߻��� ��� ( �����Ϸ� ���� 7�� �̳��� ���������� ���Ϳ� �����ؾ� ��.)<br>
					�� ���� ������ ���ϴ� ȸ���� ���� ������ ��û ��Ź �帮��, �������� ���� �� ���� ������ ���ѵ˴ϴ�.
				</dd>
			</dl>
<?}?>
			<div class="__caution type2 __mt20">
				<h3>[���ǻ���]  ���� ��Ҵ� �Ұ����մϴ�.</h3>
			</div>

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
		if(f.gubun.value == '�츮���� ����' || f.gubun.value == '���������α׷�') { 
			$('[name=applyStatus]')[0].value = "N";
			$('#add_tr').css('display', '');
		} 
		else if(f.gubun.value == '�θ����') { 
			$('#add_tr').css('display', 'none');
			$('select[name=child_count]').val(0).trigger('change');
		} 
		else if(f.gubun.value == '��������������') { 
			<?if(date("Y-m",$rs[edu_sdate]) < '2017-02' || in_array($rs[idx],Array('2112','2113','2114','2115'))){?>
				if(confirm("�߰��� �ο��� �����Ű���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)"))
				{
					if(!confirm("���� ��û�ڵ� ������ �Բ� �����Ͻǰǰ���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)"))
					{
						$('[name=applyStatus]')[0].value = "N";
					}
					$('#add_tr').css('display', '');
				}
				else
				{
					$('#add_tr').css('display', 'none');
					$('select[name=child_count]').val(0).trigger('change');
				}
				return;
			<?}else if($rs[idx] == '2202'){?>
				if(confirm("�߰��� �ο��� �����Ű���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)"))
				{
					if(!confirm("���� ��û�ڵ� ������ �Բ� �����Ͻǰǰ���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)"))
					{
						$('[name=applyStatus]')[0].value = "N";
					}
					$('#add_tr').css('display', '');
				}
				else
				{
					$('#add_tr').css('display', 'none');
					$('select[name=child_count]').val(0).trigger('change');
				}
			<?}else{?>
				$('#add_tr').css('display', 'none');
				$('select[name=child_count]').val(0).trigger('change');
			<?}?>
		
		} else { 
			if(confirm("�߰��� �ο��� �����Ű���? \n\n(Ȯ�� ��ư�� [��], ��ҹ�ư�� [�ƴϿ�]�� ���մϴ�)")){
				$('#add_tr').css('display', '');
			}
			else
			{
				$('#add_tr').css('display', 'none');
				$('select[name=child_count]').val(0).trigger('change');
			}
			return;
		}
	}


	function jsJobCh(){
		f = document.frm;
		if(f.job.value=="�θ�"){
			document.getElementById('idDisType103').style.display = "";
			document.getElementById('idDisType201').style.display = "none";
			document.getElementById('idDisType202').style.display = "none";
			document.getElementById('idDisType203').style.display = "none";
		}else{
			document.getElementById('idDisType103').style.display = "none";
			document.getElementById('idDisType201').style.display = "";
			document.getElementById('idDisType202').style.display = "";
			document.getElementById('idDisType203').style.display = "";
		}
	}

	function autoRun(v){
		switch (v){
			case "�θ����":
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
				break;
			case "�츮���� ����":
				document.getElementById('idDisType103').style.display = "none";
				document.getElementById('idDisType201').style.display = "none";
				document.getElementById('idDisType202').style.display = "none";
				document.getElementById('idDisType203').style.display = "none";
				break;
			default:
				document.getElementById('idDisType103').style.display = "none";
				document.getElementById('idDisType201').style.display = "";
				document.getElementById('idDisType202').style.display = "";
				document.getElementById('idDisType203').style.display = "";
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
		for(var i = year; i>=year-7; i--){
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

		var head_form		= "<div id='head_form'><span style='margin-left:13px;'>�Ƶ� �̸� </span><span style='margin-left:12px;'>�Ƶ� �������</span></div>";
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