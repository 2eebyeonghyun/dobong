<?
$pno = "030902";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
if(!$list_url) $list_url = "raise.php";
?>
<?
$_dep = array(4,2);
$_tit = array('교육 및 행사','교육 및 행사');
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

	// 해당 이벤트를 지원한 인원
	$appInwon = 0; //신청인원
	$wappInwon = 0; //대기신청인원
	$all_child_count = 0; // 추가자녀신청인원
	$wall_child_count = 0; // 추가자녀대기신청인원
	$app_type = 0; // 예전 ddm_edu_app 쪽 child 컬럼 데이터 사용여부 체크

	// 대기신청인원없을시 취소자인원은 제외
	if($rs[winwon] > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}

	/* 신청자 인원카운팅 */
	$query = "select * from ddm_edu_app where parent_idx = '$idx' and status1=1 $del_yn";
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
	$query = "select * from ddm_edu_app where parent_idx = '$idx' and status1='3' and del_yn='N'";
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
		if($rs[s_cd] == "00"){
			if($mbRow[memtype1] != "기관" && $mbRow[job1] != "보육시설종사자"){ // 개인회원(부모)일 경우
				$appValue = "7";
			}else{
//				행사기간체크는 제외하기로 함 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // 행사기간 체크
					if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // 접수기간 체크
						// 중복신청 체크
						$query	= "SELECT count(*) FROM ddm_edu_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
						$appRow		= sqlRowOne($query);
						if($appRow!="0"){
							$appValue = "4";
						}else{
							// 신청 정원 체크
							// 설정된 인원과 비교하여 신청제한
							if(!$rs[winwon]){ // 대기신청이 없을때
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
		//답십리, 제기 교육및행사
		else{
			if($mbRow[memtype1] == "개인" && $mbRow[job1] != "보육시설종사자"){ // 개인회원일 경우
//				행사기간체크는 제외하기로 함 2017-03-21
//				if($thisTime < $rs[edu_edate]){ // 행사기간 체크
	// 				if($rs[req_sdate] < $thisTime && $thisTime < $rs[req_edate]){ // 접수기간 체크
	// 					// 중복신청 체크
	// 					$query	= "SELECT count(*) FROM ddm_edu_app WHERE parent_idx='$idx' && mbId='$_SESSION[member_id]' and del_yn='N'";
	// 					$appRow	= sqlRowOne($query);
	// 					if($appRow!="0"){
	// 						$appValue = "4";
	// 					}else{
	// 						// 신청 정원 체크
	// 						// 설정된 인원과 비교하여 신청제한
	// 						if(!$rs[winwon]){ // 대기신청이 없을때
	// //							echo $inwon_empty;
	// 							if($inwon_empty < 1){
	// 								$appValue = "5";
	// 							}else{
	// 								$appValue = "1";
	// 							}
	// 						}else{	// 대기신청이 있을때
	// 							if($inwon_empty < 1){ // 신청인원이 꽉찼을경우
	// 								if($winwon_empty < 1){ // 대기인원이 꽉찼을경우
	// 									$appValue = "9";
	// 								}else{
	// 									$appValue = "1"; // 대기접수
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
					alert('보육시설종사자 및 기관회원만 신청 할 수 있습니다.');
					return;
				case "8":
					alert('개인회원(부모)만 신청 할 수 있습니다.');
					return;
				case "0":
					alert('교육 및 행사 신청은 회원만 할 수 있습니다.');
					location.href='../member/login.php?ret_url=<?=urlencode($ret_url)?>';
					return;
				case "2":
					alert('교육 및 행사 접수기간이 아닙니다.');
					return;
				case "3":
					alert('교육 및 행사기간이 지났습니다.');
					return;
				case "4":
					alert('이미 신청하셨습니다.');
					return;
				case "5":
					alert('신청 정원이 마감되었습니다.');
					return;
				case "6":
					alert('지난 교육 [<?=$edu_result[title]?>]에 불참하여, <?=$left_days?>일간 교육신청이 불가능합니다.');
					return;
				case "9":
					alert('신청인원및 대기신청인원이 초과되었습니다. 신청가능인원:<?=$inwon_empty?>명, 신청대기가능인원:<?=$winwon_empty?>명 입니다.');
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
		if(f.gubun.value == "우리아이 쑥쑥" || f.gubun.value == "영유아프로그램"){
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

			case "우리아이 쑥쑥":
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

		if(!f.mbEmail1.value){
			alert('이메일을 입력하세요!');
			f.mbEmail1.focus();
			return false;
		}

		if(!f.mbEmail2.value){
			alert('이메일을 입력하세요!');
			f.mbEmail2.focus();
			return false;
		}

		// 개인정보 초상권 동의여부 체크
		if (f.agree1[0].checked == false ){
			alert("개인정보 및 초상권 약관에 동의하셔야 이용 할 수 있습니다.");
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
					<a href="<?=DIR?>/study/care.php"><span>보육지원</span></a>
					<a href="<?=DIR?>/study/raise.php" class="active"><span>양육지원</span></a>
				</div>

				<div class="__tab __mt10">
					<a href="raise.php"><span>답십리점 / 배봉산점 / 장안2동점</span></a>
					<a href="raise_2.php" class="active"><span>제기점</span></a>
				</div>

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
							<dt>행사기간</dt>
							<dd><?=$mEduDate?></dd>
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
						</dl>
						<dl>
							<dt>주최</dt>
							<dd><?=$rs[sponsor]?></dd>
						</dl>
						<dl>
							<dt>문의처</dt>
							<dd><?=$rs[tel]?></dd>
						</dl>
						<dl>
							<dt>신청현황</dt>
							<dd>가능인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?> <?=number_format($inwon_empty)?>명 / 신청인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?>
										  <? if($app_type) echo number_format($all_child_count); else echo number_format($appInwon); ?>명</dd>
						</dl>
						<dl>
							<dt>대기신청현황</dt>
							<dd>가능인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?> <?=number_format($winwon_empty)?>명 / 신청인원<?if($rs[gubun]=='우리아이 쑥쑥' || $rs[gubun]=='영유아프로그램'){echo '(아동)';}?>
										  <? if($app_type) echo number_format($wall_child_count); else echo number_format($wappInwon); ?>명</dd>
						</dl>
<?
	if($rs['s_cd']!="00"){
		$climit = "";
		if($rs['climit1'] && $rs['climit2']) $climit = $rs['climit1']."개월이상 ~ ".$rs['climit2']."개월이하";
		if($rs['climit1'] && !$rs['climit2']) $climit = $rs['climit1']."개월이상";
		if(!$rs['climit1'] && $rs['climit2']) $climit = $rs['climit2']."개월이하";
		if(!$rs['climit1'] && !$rs['climit2']) $climit = "없음";
?>
						<dl>
							<dt>월령제한</dt>
							<dd><?=$climit?></dd>
						</dl>
<?}?>
						<dl>
							<dt>교육비</dt>
							<dd><?=@number_format($rs[money])?>원</dd>
						</dl>
						<dl class="wide">
							<dt>납부방법</dt>
							<dd><?=$rs[bankinfo]?></dd>
						</dl>
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
			<h3>교육 및 행사 온라인 신청하기</h3>
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
				<h3>유의사항</h3>
				<div class="__txt15 __mt10">
<?if($rs['s_cd']!="00"){?>
					월령계산은 행사시작날짜기준으로 계산됩니다.<br/>
<?}?>
					교육 및 행사 신청은 본인 신청만 가능합니다.<br>
					교육 및 행사 내용 및 일정 변경시 아래 연락처와 이메일 주소로 변경 내용이 발송됩니다.<br>
					현재 연락처, 이메일 주소가 가입시 회원정보와 동일한지 반드시 확인해주시기 바랍니다. 
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
						<th scope="row">신청자명</th>
						<td>
							<?=$mbRow[name]?>
						</td>
					</tr>
					<? if($rs[gubun]=="부모관련"){ ?>
					<tr style='display:none'>
						<th scope="row"> 직업</th>
						<td>
							<select name="jobh" onChange="jsJobCh()" class="__inp">
								<option value="부모">부모</option>
								<option value="보육시설종사자">보육시설종사자</option>
							</select>
						</td>
					</tr>
					<? } ?>
					<!-- 부모 -->
					<tr id="idDisType101" style="display:none">
						<th scope="row">주소</th>
						<td><input name="addr" type="text" value="" class="__inp"></td>
					</tr>
					<tr id="idDisType103"  style="display:none">
						<th scope="row">자녀명</th>
						<td><input name="childName" type="text" value="" class="__inp"></td>
					</tr>
					<!-- 보육시설종사자 -->
					<tr id="idDisType201" >
						<th scope="row">시설명</th>
						<td><input name="sisulName" type="text" value="<?=$mbRow[cpName]?>" class="__inp"></td>
					</tr>
					<tr id="idDisType202" >
						<th scope="row">시설유형</th>
						<td>
							<select name="sisulType" class="__inp">
								<option value="">시설유형</option>
								<option value="국공립" <?if($mbRow[memtype3]=="국공립") echo "selected";?>>국공립</option>
								<option value="법인" <?if($mbRow[memtype3]=="법인") echo "selected";?>>법인</option>
								<option value="법인외" <?if($mbRow[memtype3]=="법인외") echo "selected";?>>법인외(단체)</option>
								<option value="민간" <?if($mbRow[memtype3]=="민간") echo "selected";?>>민간</option>
								<option value="가정" <?if($mbRow[memtype3]=="가정") echo "selected";?>>가정</option>
								<option value="직장" <?if($mbRow[memtype3]=="직장") echo "selected";?>>직장</option>
								<option value="부모협동" <?if($mbRow[memtype3]=="부모협동") echo "selected";?>>부모협동</option>
							</select>
						</td>
					</tr>
					<tr id="idDisType203" >
						<th scope="row">직위</th>
						<td>
							<select name="job" class="__inp">
								<option value="">:: 선택 ::</option>
								<option value="원장">원장</option>
								<option value="보육교사">보육교사</option>
								<option value="특수교사">특수교사</option>
								<option value="치료사">치료사</option>
								<option value="간호사">간호사</option>
								<option value="영양사">영양사</option>
								<option value="취사부">취사부</option>
								<option value="기타">기타</option>
							</select>
						</td>
					</tr>


					<tr>
						<th scope="row">연락처</th>
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
						<th scope="row">이메일</th>
						<td>
							<ul class="__form email" style="width:100%">
								<li><input type="text" class="__inp" name="mbEmail1" value="<?=$exMbEmail[0]?>"></li>
								<li class="dash">@</li>
								<li><input type="text" class="__inp" name="mbEmail2" value="<?=$exMbEmail[1]?>"></li>
								<li class="space"></li>
								<li class="sel">
									<select name="aa" id="aa" class="__inp" onChange="if(this.value=='NONE'){this.form.mbEmail2.select();this.form.mbEmail2.focus();}else{this.form.mbEmail2.value=this.value;}">
												  <option value=NONE>직접입력</option>
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
					<tr <?if($rs[gubun]=="부모관련"){?>style='display:none'<?}?>>
						<th scope="row"><? if($rs[s_cd] != '00') echo "추가아동"; else echo "추가인원";?></th>
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
								명
							</div>
							<div class="__mt10">(보호자를 제외한 영유아, 동반자 모두 포함, 명단에 포함된 인원만 입장 가능)</div>
						</td>
					</tr>
					<tr id='detail_tr' style='display:none'>
						<th scope="row"><? if($rs[s_cd] != '00') echo "추가아동"; else echo "추가인원";?> 상세내용</th>
						<td class="bcontent1_m" id='add'>																	
						</td>
					</tr>


				</tbody>
			</table>

<?if($rs[s_cd] == "00"){?>
			<dl class="__resBefore __mt20">
				<dt>[개인정보 수집이용 내역]</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">항목</td>
							<td style="text-align:center;border:1px solid #ddd;">수집목적</td>
							<td style="text-align:center;border:1px solid #ddd;">보유기간</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">성명, 어린이집 명, 직위, 연락처, 초상권 등</td>
							<td style="text-align:center;border:1px solid #ddd;">교육운영, 보도자료</td>
							<td style="text-align:center;border:1px solid #ddd;">2년</td>							
						</tr>
					</table><br>
					※ 수집된 개인정보는 수집목적 외 다른 목적으로 사용되지 않으며, 개인정보 수집 이용에 거부할 권리가 있습니다. 그러나 동의하지 않을 시 교육 참여가 제한됩니다.
				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>[저작권 보호]</dt>
				<dd>
					① 온라인 교육으로 진행 될 경우 교육자료 및 정보의 사용과 관련하여 촬영,녹화,캡쳐를 하지않으며 제3자에게 영상이나 교육관련 내용을 제공하지 않습니다.<br>
					② 이를 위반할 경우 저작권법(제104조의 6, 제 104조의 8)에 따라 처벌받을 수 있습니다.
				</dd>
			</dl>

			<dl class="__resBefore __mt20">
				<dt>[교육취소 및 관련 규정]</dt>
				<dd>
					회원은 본 교육에 대해 무단 결석을 할 경우, 적용되는 제한사항에 동의합니다.<br>
					<span class="__orange">· 교육일로 부터 30일 동안 교육 시청 불가</span><br>
					· 단, 아래와 같은 사항은 예외로 적용됨<br>
					① 교육 당일 취소시, 전화 연락하여 감기 또는 전염성 질환으로 참석이 어려운 경우<br>
					② 교육 당일, 사고 및 불가피한 사정이 발생한 경우 ( 교육일로 부터 7일 이내에 증빙서류를 센터에 제출해야 함.)<br>
					※ 교육 참석을 원하는 회원을 위해 신중한 신청 부탁 드리며, 동의하지 않을 시 교육 참여가 제한됩니다.
				</dd>
			</dl>
<?}else{?>
			<dl class="__resBefore __mt20">
				<dt>[개인정보 수집이용 내역]</dt>
				<dd>
					<table style="width:100%;border:1px solid #ddd;">
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">항목</td>
							<td style="text-align:center;border:1px solid #ddd;">수집목적</td>
							<td style="text-align:center;border:1px solid #ddd;">보유기간</td>
						</tr>
						<tr>
							<td style="text-align:center;border:1px solid #ddd;">성명, 어린이집 명, 직위, 연락처, 초상권 등</td>
							<td style="text-align:center;border:1px solid #ddd;">교육운영, 보도자료</td>
							<td style="text-align:center;border:1px solid #ddd;">2년</td>							
						</tr>
					</table><br>
					※ 수집된 개인정보는 수집목적 외 다른 목적으로 사용되지 않으며, 개인정보 수집 이용에 거부할 권리가 있습니다. 그러나 동의하지 않을 시 교육 참여가 제한됩니다.
				</dd>
			</dl>
			<dl class="__resBefore __mt20">
				<dt>[저작권 보호]</dt>
				<dd>
					① 온라인 교육으로 진행 될 경우 교육자료 및 정보의 사용과 관련하여 촬영,녹화,캡쳐를 하지않으며 제3자에게 영상이나 교육관련 내용을 제공하지 않습니다.<br>
					② 이를 위반할 경우 저작권법(제104조의 6, 제 104조의 8)에 따라 처벌받을 수 있습니다.
				</dd>
			</dl>

			<dl class="__resBefore __mt20">
				<dt>[교육취소 및 관련 규정]</dt>
				<dd>
					회원은 본 교육에 대해 무단 결석을 할 경우, 적용되는 제한사항에 동의합니다.<br>
					<span class="__orange">· 교육일로 부터 30일 동안 교육 신청 불가</span><br>
					· 단, 아래와 같은 사항은 예외로 적용됨<br>
					① 교육 당일 취소시, 전화 연락하여 감기 또는 전염성 질환으로 참석이 어려운 경우<br>
					② 교육 당일, 사고 및 불가피한 사정이 발생한 경우 ( 교육일로 부터 7일 이내에 증빙서류를 센터에 제출해야 함.)<br>
					※ 교육 참석을 원하는 회원을 위해 신중한 신청 부탁 드리며, 동의하지 않을 시 교육 참여가 제한됩니다.
				</dd>
			</dl>
<?}?>
			<div class="__caution type2 __mt20">
				<h3>[유의사항]  당일 취소는 불가능합니다.</h3>
			</div>

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
		if(f.gubun.value == '우리아이 쑥쑥' || f.gubun.value == '영유아프로그램') { 
			$('[name=applyStatus]')[0].value = "N";
			$('#add_tr').css('display', '');
		} 
		else if(f.gubun.value == '부모관련') { 
			$('#add_tr').css('display', 'none');
			$('select[name=child_count]').val(0).trigger('change');
		} 
		else if(f.gubun.value == '보육교직원교육') { 
			<?if(date("Y-m",$rs[edu_sdate]) < '2017-02' || in_array($rs[idx],Array('2112','2113','2114','2115'))){?>
				if(confirm("추가할 인원이 있으신가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)"))
				{
					if(!confirm("교육 신청자도 교육에 함께 참석하실건가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)"))
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
				if(confirm("추가할 인원이 있으신가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)"))
				{
					if(!confirm("교육 신청자도 교육에 함께 참석하실건가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)"))
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
			if(confirm("추가할 인원이 있으신가요? \n\n(확인 버튼은 [예], 취소버튼은 [아니오]를 뜻합니다)")){
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
		if(f.job.value=="부모"){
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
			case "부모관련":
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
				break;
			case "우리아이 쑥쑥":
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
		for(var i = year; i>=year-7; i--){
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

		var head_form		= "<div id='head_form'><span style='margin-left:13px;'>아동 이름 </span><span style='margin-left:12px;'>아동 생년월일</span></div>";
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