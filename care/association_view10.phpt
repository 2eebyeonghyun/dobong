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
$_tit = array('보육지원','꿈자람공동육아방');
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

	// 해당 이벤트를 지원한 인원
	$appInwon = 0; //신청인원
	$wappInwon = 0; //대기신청인원
	$all_child_count = 0; // 추가자녀신청인원
	$wall_child_count = 0; // 추가자녀대기신청인원
	$app_type = 0; // 예전 ddm_edu_app 쪽 child 컬럼 데이터 사용여부 체크

/*fix.
	// 대기신청인원없을시 취소자인원은 제외
	if($rs[winwon] > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}
*/
	$del_yn = "and del_yn='N'";


	/* 신청자 인원카운팅 */
	$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1=1 $del_yn";
	$applist = sqlArray($query);
	if($applist){
		foreach($applist as $k => $app){
			if($app[addInwon])	$appInwon += $app[addInwon]; // 추가인원
			if($app[applyStatus] != 'N'){
				$appInwon++;	// 본인
			}	
			if($app[child]){
				$child		 = split('\|', $app[child]);
				$child_count = sizeof($child);
				$child_count = $child_count - 1;
				$all_child_count += $child_count;

				$app_type = 1; // 예전 데이터는 child 에 넣어놓는데.. 이거 한줄씩 넣도록 바꿨고, 기존 데이터는 그대로 보여지게 구분할 변수 추가..
			}
		}
	}

	/* 대기신청자 인원카운팅 */
	$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1='3' and del_yn='N'";
	$wapplist = sqlArray($query);
	if($wapplist){
		foreach($wapplist as $k => $app){
			if($app[addInwon])	$wappInwon += $app[addInwon]; // 추가인원
			if($app[applyStatus] != 'N'){
				$wappInwon++;	// 본인
			}	
			if($app[child]){
				$child		 = split('\|', $app[child]);
				$child_count = sizeof($child);
				$child_count = $child_count - 1;
				$wall_child_count += $child_count;
			}
		}
	}

	// 지원 가능 인원
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
		// 보육교직원
		if($rs[s_cd] != "00"){
			if($mbRow[memtype1] == "개인" && $mbRow[job1] != "보육시설종사자"){ // 개인회원일 경우
//				행사기간체크는 제외하기로 함 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // 행사기간 체크
					if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // 접수기간 체크
/*
						// 중복신청 체크
						$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
*/

						// 지점, 날짜 확인
						$query02 = "select s_cd, req_sdate, edu_sdate from ddm_daynursery where idx = ".$idx;
						$ddm_chk = sqlRow($query02);

						// 같은날 동일지점 idx 확인
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

						// 같은날 동일지점 중복신청 체크
						$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx in($req_sdate_idx) && mbId='$_SESSION[member_id]' and del_yn='N'";
						$appRow	= sqlRowOne($query);

						if($appRow!="0"){
							$appValue = "4";
						}else{
							// 신청 정원 체크
							// 설정된 인원과 비교하여 신청제한
							if(!$rs[winwon]){ // 대기신청이 없을때
	//							echo $inwon_empty;
								if($inwon_empty < 1){
									$appValue = "5";
								}else{
									$appValue = "1";
								}
							}else{	// 대기신청이 있을때
								if($inwon_empty < 1){ // 신청인원이 꽉찼을경우
									if($winwon_empty < 1){ // 대기인원이 꽉찼을경우
										$appValue = "9";
									}else{
										$appValue = "1"; // 대기접수
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

	// 지점 확인
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
					//alert('보육시설종사자 및 기관회원만 신청 할 수 있습니다.');
					//return;
				case "8":
					//alert('개인회원(부모)만 신청 할 수 있습니다.');
					//return;
					break;
				case "0":
					alert('꿈자람공동육아방 신청은 회원만 할 수 있습니다.');
					location.href='../member/login.php?ret_url=<?=urlencode($ret_url)?>';
					return;
				case "2":
					alert('꿈자람공동육아방 접수기간이 아닙니다.');
					return;
				case "3":
					alert('꿈자람공동육아방 기간이 지났습니다.');
					return;
				case "4":
					alert('이미 신청하셨습니다.(동일지점 하루1회 제한)');
					return;
				case "5":
					alert('신청 정원이 마감되었습니다.');
					return;
				case "6":
					alert('지난 꿈자람공동육아방 [<?=$edu_result[title]?>]에 불참하여, <?=$left_days?>일간 신청이 불가능합니다.');
					return;
				case "9":
					alert('신청인원및 대기신청인원이 초과되었습니다. 신청가능인원:<?=$inwon_empty?>명, 신청대기가능인원:<?=$winwon_empty?>명 입니다.');
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

	<? /*개월수 체크*/ ?>
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
		
		// 가능인원 초과 여부 체크
		// 인원체크는 스크립트로 x 오래된화면은 체크불가능하므로..
		if(f.gubun.value == "꿈자람공동육아방"){
			if(Number($('select[name=child_count]')[0].value) == '0')
			{
				alert('추가 아동은 적어도 1명이 있어야 합니다!');
				return false;
			}
		}
		
		// 모든 추가 인원 정보 input 하나에 넣기
		if(add_inwon > 0)
		{
			if(f.gubun.value == '부모관련'){
				// 추가인원이없기때문에 제외
			}
			else if(f.gubun.value == '보육교직원교육')
			{
					for(var i = 0; i < add_inwon; i++){
						// 내용이 채워져 있는지 확인
						<? if($rs['license']=="Y") { ?>
						if($('[name=addName]')[i].value == '')
						{
							alert('추가인원의 상세내용을 입력해 주십시오.');
							$('[name=addName]')[i].focus();
							return false;
						}
						
						if($('[name=addSisulName]')[i].value == '')
						{
							alert('추가인원의 상세내용을 입력해 주십시오.');
							$('[name=addSisulName]')[i].focus();
							return false;
						}
						
						if($('[name=addSisulType]')[i].value == '')
						{
							alert('추가인원의 상세내용을 입력해 주십시오.');
							$('[name=addSisulType]')[i].focus();
							return false;
						}
						
						if($('[name=addJob]')[i].value == '')
						{
							alert('추가인원의 상세내용을 입력해 주십시오.');
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
					// 내용이 채워져 있는지 확인
					if($('[name=addName]')[i].value == '')
					{
						alert('추가인원의 상세내용을 입력해 주십시오.');
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
			case "부모관련":

				if(f.jobh.value=="부모"){
					if(!f.childName.value){
						alert('자녀명을 입력하세요!');
						f.childName.focus();
						return false;
					}
				}else{    
					if(!f.sisulName.value){
						alert('시설명을 입력하세요!');
						f.sisulName.focus();
						return false;
					}

					if(!f.sisulType.value){
						alert('시설유형을 선택하세요!');
						f.sisulType.focus();
						return false;
					}
				}
				break;		

			case "꿈자람공동육아방":
				var add_childbirth_string_array = add_childbirth_string.split('|');
				/*for(var i = 1, l=add_childbirth_string_array.length; i<l; i++){
					var child_mon = dateDiff(add_childbirth_string_array[i], new Date());
					<?if($rs['climit1']) {?>
						if(child_mon < <?=$rs['climit1']?>){
							alert('월령제한을 확인해주세요.');
							return false;
						}
					<? } ?>
					<?if($rs['climit2']) {?>
						if(child_mon > <?=$rs['climit2']?>){
							alert('월령제한을 확인해주세요.');
							return false;
						}
					<? } ?>
				}*/

				break;	
			case "영유아프로그램":
				var add_childbirth_string_array = add_childbirth_string.split('|');
				for(var i = 1, l=add_childbirth_string_array.length; i<l; i++){
					var child_mon = dateDiff(add_childbirth_string_array[i], new Date());
					<?if($rs['climit1']) {?>
						if(child_mon < <?=$rs['climit1']?>){
							alert('월령제한을 확인해주세요.');
							return false;
						}
					<? } ?>
					<?if($rs['climit2']) {?>
						if(child_mon > <?=$rs['climit2']?>){
							alert('월령제한을 확인해주세요.');
							return false;
						}
					<? } ?>
				}
				break;

			default:

				if(!f.sisulName.value){
					alert('시설명을 입력하세요!');
					f.sisulName.focus();
					return false;
				}

				if(!f.sisulType.value){
					alert('시설유형을 선택하세요!');
					f.sisulType.focus();
					return false;
				}
				if(!f.job.value){
					alert('직위를 선택하세요!');
					f.job.focus();
					return false;
				}
		
				break;
		}


		if(!f.mbTel2.value){
			alert('연락처를 입력하세요!');
			f.mbTel2.focus();
			return false;
		}

		if(!f.mbTel3.value){
			alert('연락처를 입력하세요!');
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
			alert('SMS 수신여부를 확인해주세요!');
			smsynRadio[0].focus();
			return false;
		}
/*.fix. 20210913 김성중
		if(!f.pname.value){
			alert('보호자 이름을 입력해 주세요!');
			f.pname.focus();
			return false;
		}
/*
		if(!f.addr1.value){
			alert('주소를 입력해 주세요!');
			f.addr1.focus();
			return false;
		}

		if(!f.addr3.value){
			alert('상세주소를 입력해 주세요!');
			f.addr3.focus();
			return false;
		}
*/
		// 개인정보 초상권 동의여부 체크
		if (f.agree1[0].checked == false ){
			alert("개인정보 및 초상권 약관에 동의하셔야 이용 할 수 있습니다.");
			return false;
		}

		return;
	}

	function address_find() {
		new daum.Postcode({
			oncomplete: function(data) {
				document.getElementById('addr1').value = data.zonecode;
				document.getElementById('addr2').value = data.address;
				alert('나머지 주소를 입력해주세요!');
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
						<p class="date">등록일 2020-01-14</p>-->

					</div>

					<div class="__rendInfo">
						<dl>
							<dt>구분</dt>
							<dd><?=$rs[gubun]?></dd>
						</dl>
						<dl>
							<dt>접수기간</dt>
							<dd><?=date("n월 d일 H시",$rs[req_sdate])."($req_sday) ~ ".date("n월 d일 H시",$rs[req_edate])."($req_eday)"?></dd>
						</dl>
						<dl>
							<dt>시간</dt>
							<dd><?=$rs[eTime]?></dd>
						</dl>
						<dl>
							<dt>장소</dt>
							<dd><?=$rs[ePlace]?></dd>
						</dl><!--
						<dl>
							<dt>주최</dt>
							<dd><?=$rs[sponsor]?></dd>
						</dl>
						<dl>
							<dt>문의처</dt>
							<dd><?=$rs[tel]?></dd>
						</dl>-->
						<dl>
							<dt>신청현황</dt>
							<dd>가능인원<?if($rs[gubun]=='꿈자람공동육아방'){echo '(아동및보호자)';}?> <?=number_format($inwon_empty)?>명 / 신청인원<?if($rs[gubun]=='꿈자람공동육아방'){echo '(아동및보호자)';}?>
										  <? if($app_type) echo number_format($all_child_count); else echo number_format($appInwon); ?>명</dd>
						</dl><!--
						<dl>
							<dt>대기신청현황</dt>
							<dd>가능인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?> <?=number_format($winwon_empty)?>명 / 신청인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?>
										  <? if($app_type) echo number_format($wall_child_count); else echo number_format($wappInwon); ?>명</dd>
						</dl>-->
<?
	if($rs['s_cd']!="00"){
		$climit = "";
		if($rs['climit1'] && $rs['climit2']) $climit = $rs['climit1']."개월이상 ~ ".$rs['climit2']."개월이하";
		if($rs['climit1'] && !$rs['climit2']) $climit = $rs['climit1']."개월이상";
		if(!$rs['climit1'] && $rs['climit2']) $climit = $rs['climit2']."개월이하";
		if(!$rs['climit1'] && !$rs['climit2']) $climit = "없음";
?><!--
						<dl>
							<dt>월령제한</dt>
							<dd><?=$climit?></dd>
						</dl>-->
<?}?><!--
						<dl>
							<dt>교육비</dt>
							<dd><?=@number_format($rs[money])?>원</dd>
						</dl>
						<dl class="wide">
							<dt>납부방법</dt>
							<dd><?=$rs[bankinfo]?></dd>
						</dl>-->
<?if($rs['e_file1'] || $rs['e_file2']){?>
						<dl class="wide">
							<dt>첨부파일</dt>
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
							<a href="javascript:disChange(1,'<?=$appValue?>');" class="__btn1">온라인 신청하기</a>
						</div>
					</div>

				</div>

				<div class="__botArea">
<!--
					<a href="#" class="btn prev">
						<span>이전글</span>
						<strong>이전글이 없습니다.</strong>
					</a>
					<a href="#" class="btn next">
						<span>다음글</span>
						<strong>다음글이 없습니다.</strong>
					</a>
-->
					<div class="cen">
						<a href="<?=$list_url?>" class="__btnList"><span>목록</span></a>
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
			<h3>꿈자람공동육아방 온라인 신청하기</h3>
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
				<h3>유의사항</h3>
				<div class="__txt15 __mt10">
<?if($rs['s_cd']!="00"){?>
					월령계산은 행사시작날짜기준으로 계산됩니다.<br/>
<?}?>
					교육 및 행사 신청은 본인 신청만 가능합니다.<br>
					교육 및 행사 내용 및 일정 변경시 아래 연락처와 이메일 주소로 변경 내용이 발송됩니다.<br>
					현재 연락처, 이메일 주소가 가입시 회원정보와 동일한지 반드시 확인해주시기 바랍니다. 
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
						<th scope="row">신청구분</th>
						<td>
							<?=$rs[ePlace]?>(<?=$_SESSION['member_level']=='기관' || $job1 =='보육시설종사자'?'단체':$_SESSION['member_level']?>)
						</td>
					</tr>
					<tr id="idDisType201" >
						<th scope="row"><?=$_SESSION['member_level']=='기관' || $job1 =='보육시설종사자'?'시설명':'신청자명'?></th>
						<td>
												<? if($_SESSION['member_level']=='기관' || $job1 =='보육시설종사자') {?>
												<input id="tltjfaud" name="tltjfaud" type="text" class="__inp"> <!-- /// 시설명 /// -->
												<? } else {
													echo $mbRow[name];
												}?>
						</td>
					</tr>
					<tr id="idDisType201" >
						<th scope="row">SMS 수신여부</th>
						<td>
												<label><input type="radio" name="smsyn" value="Y"> 허용</label>
												<label><input type="radio" name="smsyn" value="N"> 허용안함</label>
						</td>
					</tr>
					<tr>
						<th scope="row">전화번호</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<select name="mbTel4" class="__inp">
													<option value="02" <?if($exMbTel2[0] == "012"){ echo"selected"; }?>>02</option>
									</select>
								</li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel5" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel2[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel6" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel2[1]?>"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">핸드폰</th>
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
								<li><input type="text" class="__inp" name="mbTel2" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel3" onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[2]?>"></li>
							</ul>
						</td>
					</tr>

					<tr>
						<th scope="row">신청일</th>
						<td>
							<?=date("Y-m-d",$rs[edu_sdate])/*." ~ ".date("Y-m-d",$rs[edu_edate])*/?>
						</td>
					</tr>
					<tr>
						<th scope="row">신청시간</th>
						<td>
							<?=$rs[eTime]?>
						</td>
					</tr>
					<tr id="idDisType201" style="display:none;">
						<th scope="row"><?=$_SESSION['member_level']=='기관' || $job1 =='보육시설종사자'?'신청자명':'보호자 이름'?></th>
						<td><input id="pname" name="pname" type="text" class="__inp" onblur="if(this.value == '<?=$mbRow[name]?>' ) {document.getElementById('pname-checkbox').checked = true;}else{document.getElementById('pname-checkbox').checked = false;}" value="<?=$mbRow[name]?>"> &nbsp;<input type="checkbox" id="pname-checkbox" onclick="if(this.checked){document.getElementById('pname').value='<?=$mbRow[name]?>';}else{document.getElementById('pname').value=''}" checked> 신청자와 동일</td>
					</tr>
										<? if($_SESSION['member_level']=='기관' || $job1 =='보육시설종사자') { ?>
					<tr id="idDisType201" >
						<th scope="row">직책</th>
						<td><input id="wlrcor" name="wlrcor" type="text" value="" class="__inp"></td>
					</tr>
										<? } ?>
					<tr id="idDisType202" >
						<th scope="row">추가인원</th>
						<td>
							<select name="child_count" onchange='<?
													//fix. if($_SESSION['member_level']!='기관' && $job1!='보육시설종사자'){
													if($_SESSION['member_level']!='기관'){
														if($rs[s_cd] != '00') echo 'change_add_child(this)'; else echo 'change_add_inwon(this)';
													}
												?>' class="__inp">
												<?
												$limit = 5;
												if($_SESSION['member_level']=='기관' || $job1 =='보육시설종사자') $limit = 20;
												for($i = 0; $i <= $limit; $i++)
												{
													echo "<option value={$i}>{$i}</option>";
												}												
												?>
												</select> 명<br><span style="font-size: 12px;"><?=$_SESSION['member_level']=='기관' || $job1 =='보육시설종사자'?'(교사, 영유아 모두 포함. 명단에 포함된 인원만 입장 가능)':'(보호자를 제외한 영유아, 동반자 모두 포함. 명단에 포함된 인원만 입장 가능)<br /><font color="tomato">※ 초등학생 입장불가</font>'?></span>
						</td>
					</tr>
					<tr id='detail_tr' style='display:none'>
						<th scope="row">상세내용</td>
						<td class="bcontent1_m" id='add'>
							<span style="color: red;">※영유아와 동반자 이름은 각각 입력</span>
						</td>
					</tr>


					<tr id="idDisType101" style='display:none'>
						<th scope="row">주소</th>
						<td>
								<ul class="__form __m-w100p" style="width:290px;">
									<li><input type="text" class="__inp" id="addr1" name="addr1" maxlength="7" value="<?=$row[homezipcode]?>"></li>
									<li class="space"></li>
									<li style="width:100px;"><button type="button" class="__btn2 __w100p" onclick="address_find();">우편번호찾기</button></li>
								</ul>
								<p class="__mt10"><input type="text" class="__inp" id="addr2" name="addr2" value="<?=$row[homeaddress]?>"></p>
								<p class="__mt10"><input type="text" class="__inp" id="addr3" name="addr3" value="<?=$row[homeaddress2]?>"></p>
						</td>
					</tr>



				</tbody>
			</table>

<?if($rs[s_cd] == "00"){?>
			<dl class="__resBefore __mt20">
				<dt>1. 개인정보 수집 및 활용에 대한 동의</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">제공받는 자</td>
							<td style="text-align:center;border:1px solid #ddd;">항목</td>
							<td style="text-align:center;border:1px solid #ddd;">수집목적</td>
							<td style="text-align:center;border:1px solid #ddd;">보유기간</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">동대문구 육아종합지원센터</td>
							<td style="text-align:center;border:1px solid #ddd;">개인정보<br />(성명, 영유아/동반자 생년월일, 핸드폰번호, 사진, 기타사항)</td>
							<td style="text-align:center;border:1px solid #ddd;">보도자료 및 이용자 관리</td>
							<td style="text-align:center;border:1px solid #ddd;">3년</td>
						</tr>
					</table><br>
					- 본인은「개인정보 보호법」제15조(개인정보의 수집 및 이용) 및 제38조(권리행사의 방법 및 절차)에 따라 개인정보 열람에 대해 동의합니다.<br />
					- 수집한 개인정보는 다른 목적으로 사용되지 않습니다.<br />
					- 개인정보 수집·이용에 대한 동의를 거부할 수 있습니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>2. 안전사고책임에 대한 동의</dt>
				<dd>
					- 공동육아방에서 발생하는 안전사고의 모든 책임은 보호자에게 있으며<br />
					- 본인은 안전사고책임에 동의합니다. 안전사고책임에 대한 동의를 거부할 수 있습니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>3. 영상정보녹화에 대한 동의</dt>
				<dd>
					- 영상정보 처리기기(CCTV)는 방범 및 화재예방, 시설안전관리의 목적을 위해 24시간 연속 촬영 및 녹화 되고 있습니다.<br />
					- 본인은 영상정보 녹화 및 열람에 동의합니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>4. 저작권 보호</dt>
				<dd>
					① 온라인 교육으로 진행 될 경우 교육자료 및 정보의 사용과 관련하여 촬영,녹화,캡쳐를 하지않으며 제3자에게 영상이나 교육관련 내용을 제공하지 않습니다.<br>
					② 이를 위반할 경우 저작권법(제104조의 6, 제 104조의 8)에 따라 처벌받을 수 있습니다.
				</dd>
			</dl>
<?}else{?>
			<dl class="__resBefore __mt20">
				<dt>1. 개인정보 수집 및 활용에 대한 동의</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">제공받는 자</td>
							<td style="text-align:center;border:1px solid #ddd;">항목</td>
							<td style="text-align:center;border:1px solid #ddd;">수집목적</td>
							<td style="text-align:center;border:1px solid #ddd;">보유기간</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">동대문구 육아종합지원센터</td>
							<td style="text-align:center;border:1px solid #ddd;">개인정보<br />(성명, 영유아/동반자 생년월일, 핸드폰번호, 사진, 기타사항)</td>
							<td style="text-align:center;border:1px solid #ddd;">보도자료 및 이용자 관리</td>
							<td style="text-align:center;border:1px solid #ddd;">3년</td>
						</tr>
					</table><br>
					- 본인은「개인정보 보호법」제15조(개인정보의 수집 및 이용) 및 제38조(권리행사의 방법 및 절차)에 따라 개인정보 열람에 대해 동의합니다.<br />
					- 수집한 개인정보는 다른 목적으로 사용되지 않습니다.<br />
					- 개인정보 수집·이용에 대한 동의를 거부할 수 있습니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>2. 안전사고책임에 대한 동의</dt>
				<dd>
					- 공동육아방에서 발생하는 안전사고의 모든 책임은 보호자에게 있으며<br />
					- 본인은 안전사고책임에 동의합니다. 안전사고책임에 대한 동의를 거부할 수 있습니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>3. 영상정보녹화에 대한 동의</dt>
				<dd>
					- 영상정보 처리기기(CCTV)는 방범 및 화재예방, 시설안전관리의 목적을 위해 24시간 연속 촬영 및 녹화 되고 있습니다.<br />
					- 본인은 영상정보 녹화 및 열람에 동의합니다.<br />
					- <strong>그러나 동의를 거부할 경우 공동육아방 이용에 제한을 받을 수 있습니다.</strong>

				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>4. 저작권 보호</dt>
				<dd>
					① 온라인 교육으로 진행 될 경우 교육자료 및 정보의 사용과 관련하여 촬영,녹화,캡쳐를 하지않으며 제3자에게 영상이나 교육관련 내용을 제공하지 않습니다.<br>
					② 이를 위반할 경우 저작권법(제104조의 6, 제 104조의 8)에 따라 처벌받을 수 있습니다.
				</dd>
			</dl>
<?}?>
<!--
			<div class="__caution type2 __mt20">
				<h3>[유의사항]  「본인은 개인정보 수집 및 영상정보 녹화에 동의하며, 공동육아방 이용 중 안전사고 발생 시 모든 책임은 보호자에게 있습니다.」</h3>
			</div>
-->
			<dl class="__resAgree __mt20">
				<dt>위 내용에 동의하십니까?</dt>
				<dd>
					<label><input type="radio" name="agree1"> 동의합니다.</label>
					<label><input type="radio" name="agree1"> 동의하지 않습니다.</label>
				</dd>
			</dl>

			<div class="__botArea">
				<div class="cen">
					<button type="button" class="__btn1 gray" onclick="fadeOut($(this).closest('.__popBasic'));">취소</button> &nbsp;
					<button type="submit" class="__btn1">확인</button>
				</div>
			</div>

						</form>

		</div>
	</div>
	<div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>
</div>

<script language="javascript">
<!--



//교육 신청할 때 추가인원 나오기전에 "추가할 인원이 있으신가요? "예, 아니오" 하고 "예"라고 체크하면, "교육 신청자도 교육에 함께 참석하실건가요? "예, 아니요" 물어본후  "예" 라고 하면 추가 인원과 추가 상세내용(직급칸은 없애주세요. 시설명과 시설유형,연락처를 필수로 해주세요)이 나오도록해 주시고, 
 //"아니오"라고 하면 추가인원신청 칸이 안 나오게 해주세요.

	function inwonCheck(f)
	{
		//if(confirm("추가할 인원이 있으신가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)")){
			$('#add_tr').css('display', '');
		//} else {
			//$('#add_tr').css('display', 'none');
			//$('select[name=child_count]').val(0).trigger('change');
		//}
		return;
	}


	function jsJobCh(){
		f = document.frm;
		if(f.job.value=="부모"){
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
			/*case "부모관련":
				document.getElementById('idDisType103').style.display = "";
				document.getElementById('idDisType201').style.display = "none";
				document.getElementById('idDisType202').style.display = "none";
				document.getElementById('idDisType203').style.display = "none";
				break;
			case "영유아프로그램":
				document.getElementById('idDisType103').style.display = "none";
				document.getElementById('idDisType201').style.display = "none";
				document.getElementById('idDisType202').style.display = "none";
				document.getElementById('idDisType203').style.display = "none";
				break;*/
			case "꿈자람공동육아방":
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

	/* 보육교직원 */
	function change_add_inwon(object)
	{	
		var previous_inwon	= $('[name=addInwon]')[0].value;
		var add_inwon		= object.value;
		var difference		= add_inwon - previous_inwon;
		var difference_abs	= Math.abs(difference);

		var head_form		= "<div id='head_form'><span style='margin-right:50px;margin-left:15px;'>성명</span><span style='margin-right:33px;'>시설명</span><span style='margin-right:43px;'>시설유형</span><span style='margin-right:50px;'>직위</span></div>";
		var form_string		= "<div class=add_detail><input class='input_3' name='addName' style='width:70px; margin-right:5px;'><input class='input_3' name='addSisulName' value='<?=$mbRow[cpName]?>' style='width:70px;margin-right:5px;'><input class='input_3' name='addSisulType' style='width:70px; margin-right:5px;'><select name='addJob' style='width:80px;margin-right:5px;'><option value=''>직위</option><option value='원장'>원장</option><option value='보육교사'>보육교사</option><option value='특수교사'>특수교사</option><option value='치료사'>치료사</option><option value='간호사'>간호사</option><option value='영양사'>영양사</option><option value='취사부'>취사부</option><option value='기타'>기타</option></select></div>";

		$('[name=addInwon]')[0].value = add_inwon;
		
		// 추가인원이 있을 때
		if(add_inwon > 0)
		{
			$('#detail_tr').css('display', '');

			// head_form 이 없을 때만 추가한다.
			if(document.getElementById('head_form') == null)
			{
				$('#add').append(head_form);
			}			
		}
		// 추가인원이 없을 때
		else
		{
			$('#detail_tr').css('display', 'none');
			//$('#add').remove();
		}


		// 인원을 늘렸을 때
		if(difference > 0)
		{
			for(var i = 0; i < difference; i++)
			{
				$('#add').append(form_string);
			}
		}
		// 인원을 줄였을 때
		else if(difference < 0)
		{
			for(var i = 0; i < difference_abs; i++)
			{
				// .add_detail 들중에 뒤에서부터 삭제한다.
				$('.add_detail:last').remove();
			}
		}
			
		return;
	}

	/* 교육및행사(보육교직원x) */
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
		
		// 연 설정
		option_addBirth1 += "<select name='addBirth1' style='margin-right:5px;'>"
		for(var i = year; i>=year-80; i--){
			option_addBirth1 += "<option value='"+i+"'>"+i+"</option>";
		}
		option_addBirth1 += "</select>"
		
		// 월 설정
		option_addBirth2 += "<select name='addBirth2' style='margin-right:5px;'>"
		for(var i = 1; i<=12; i++){
			if(i < 10 ){
				option_addBirth2 += "<option value='0"+i+"'>0"+i+"</option>";
			}else{
				option_addBirth2 += "<option value='"+i+"'>"+i+"</option>";
			}
		}
		option_addBirth2 += "</select>"

		// 일 설정
		option_addBirth3 += "<select name='addBirth3' style='margin-right:5px;'>"
		for(var i = 1; i<=31; i++){
			if(i < 10 ){
				option_addBirth3 += "<option value='0"+i+"'>0"+i+"</option>";
			}else{
				option_addBirth3 += "<option value='"+i+"'>"+i+"</option>";
			}
		}
		option_addBirth3 += "</select>"

		var head_form		= "<div id='head_form'><span style='margin-left:4px;'>이름(영유아 및 동반자)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style='margin-left:12px;'>생년월일</span></div>";
		var form_string		= "<div class='add_detail'>";
			form_string		+= "<span><input type='text' class='input_3' name='addName' style='width:70px; margin-right:5px;'></span>";
			form_string		+= "<span>"+option_addBirth1+option_addBirth2+option_addBirth3+"</span>";
			form_string		+= "</div>";

		$('[name=addInwon]')[0].value = add_inwon;

		
		// 추가인원이 있을 때
		if(add_inwon > 0)
		{
			$('#detail_tr').css('display', '');

			// head_form 이 없을 때만 추가한다.
			if(document.getElementById('head_form') == null)
			{
				$('#add').append(head_form);
			}	
		}
		// 추가인원이 없을 때
		else
		{
			$('#detail_tr').css('display', 'none');
//			$('#add').remove();
		}


		// 인원을 늘렸을 때
		if(difference > 0)
		{
			for(var i = 0; i < difference; i++)
			{
				$('#add').append(form_string);
			}
		}
		// 인원을 줄였을 때
		else if(difference < 0)
		{			
			for(var i = 0; i < difference_abs; i++)
			{
				// .add_detail 들중에 뒤에서부터 삭제한다.
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