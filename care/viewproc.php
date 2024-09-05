	<meta charset="euc-kr">
	<?
    include "../../include/global/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/lib/class/class.sms.php";

	$regdate = time();
	$mbTel = $_POST[mbTel4]."-".$_POST[mbTel5]."-".$_POST[mbTel6];
	$mbHp = $_POST[mbTel1]."-".$_POST[mbTel2]."-".$_POST[mbTel3];

	$smsyn = $_POST[smsyn];
	$pname = $_POST[pname];
	$addr = $_POST[addr1]." ".$_POST[addr2]." ".$_POST[addr3];

	// 신청자 참석여부
	$appStatus	= $_POST[applyStatus];	

	// 추가인원
	$addInwon	= $_POST[addInwon];
		
	$addDetail	= $_POST[addDetail];

	// 추가아동
	$child			= $_POST[child];

	$gubun			= $_POST[gubun];
	$child_count	= $_POST[child_count];

	// 공동육아방의 경우 아동추가 필수
//	if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
//		var_dump($child);
//		var_dump($child_count);
//		var_dump($gubun);

		if($gubun=="꿈자람공동육아방" && $child_count < 1){
			echo "<script>alert('꿈자람공동육아방 신청시 추가 아동 1명이상 선택은 필수입니다.');history.back();</script>";
			exit;
		} elseif($gubun=="꿈자람공동육아방"){
			$addInwon = $child_count;
		}

//	}


	switch($gubun){
		case "부모관련":
			if($jobh!="부모"){
				$sisulName = "";
				$sisulType = "";
				$job = $jobh;
			}else{
				$childName = "";
			}
		break;

		case "꿈자람공동육아방":
			$childName = "";
		break;

		case "영유아프로그램":
			$childName = "";
		break;

		case "보육교직원":
			$sisulName = "";
			$sisulType = "";
			$job = $jobh;
		break;

		default:
			
		break;
	}

	$query = "select * from ddm_daynursery where idx = '$_POST[parent_idx]'";
	$eduinfo = sqlRow($query);
	
	/****
		*	신청여부 체크
		*/
	//$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx='$parent_idx' && mbId='$mbId' and del_yn='N'";
	$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx in(select idx from ddm_daynursery where left(FROM_UNIXTIME(edu_sdate), 13) = (select left(FROM_UNIXTIME(edu_sdate), 13) from ddm_daynursery where idx = '$parent_idx')) && mbId='$mbId' and del_yn='N'";

if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
//	echo $query;
//	exit;
}

		//echo "<script>alert(\"$query\");</script>";
	$appchk = sqlRowOne($query);
	if($appchk > 0){
		echo "<script>alert('예약 신청은 1일 1회만 가능합니다. 해당일은 이미 신청되었습니다.');location.href = 'association.php';</script>";
		exit;
	}

	/****
		*	신청날짜 검증
		*/
//	교육및 행사 기간 체크 x
//	if($regdate < $eduinfo[edu_edate]){ // 행사기간 체크
		if($eduinfo[req_sdate] < $regdate && $regdate < $eduinfo[req_edate]){ // 접수기간 체크	
		}else{
			echo "<script>alert('예약 접수기간이 아닙니다.');</script>";
			exit;
		}
//	}else{
//		echo "<script>alert('교육 및 행사기간이 지났습니다.');</script>";
//		exit;
//	}

	// insert 하기 전에 인원 찼는지 다시 확인
	/*** 
	   *	신청인원의 count에서 del_yn 은 제외
	   *	예약인원이 꽉차고 대기인원이 들어갔을시,
	   *	예약인원의 취소가 발생해버리면 먼저 신청한 대기인원보다 나중에 신청한 인원이 예약인원으로 갈 경우가 발생해버리기 때문에
	   *	대기인원의 예약인원으로 이동은 관리자가 직접 변경
	   */


	// 해당 이벤트의 모집인원
	$inwon = $eduinfo[inwon]; //신청가능인원
	$winwon = $eduinfo[winwon]; //대기신청가능인원

	// 해당 이벤트를 지원한 인원
	$appInwon = 0; //신청인원
	$wappInwon = 0; //대기신청인원
	$all_child_count = 0; // 추가자녀신청인원
	$wall_child_count = 0; // 추가자녀대기신청인원
	$app_type = 0; // 예전 ddm_edu_app 쪽 child 컬럼 데이터 사용여부 체크

	// 대기신청인원없을시 취소자인원은 제외
/*
	if($winwon > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}
*/
	$del_yn = "and del_yn='N'";

	/* 신청자 인원카운팅 */
	$query = "select * from ddm_daynursery_app where parent_idx = '$_POST[parent_idx]' and status1=1 $del_yn";
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
	$query = "select * from ddm_daynursery_app where parent_idx = '$_POST[parent_idx]' and status1=3 and del_yn='N'";
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
		$inwon_empty = $inwon - $appInwon;
		$winwon_empty = $winwon - $wappInwon;
	}
	else{
		$inwon_empty = $inwon - $all_child_count;
		$winwon_empty = $winwon - $wall_child_count;
	}
	
	
	
	// 지원 가능 여부 확인
	if($_REQUEST[applyStatus] == 'N') {$self_count = 0;} else {$self_count = 1;}
	//$self_count = 0;

	if($gubun == '부모관련'){
		$temp_inwon = 1;
		$temp_winwon = 1;
	}
	else{
		$temp_inwon = $addInwon + $self_count;
		$temp_winwon = $addInwon + $self_count;
	}

	// 설정된 인원과 비교하여 신청제한
	if(!$winwon){ // 대기신청이 없을때
		if($temp_inwon > $inwon_empty){
			echo "<script>alert('신청인원이 초과되었습니다. 신청가능인원은 ".$inwon_empty."명 입니다.');history.back();</script>";
			exit;
		}else{
			$status1 = 1; //신청
		}
	}else{	// 대기신청이 있을때
		if($temp_inwon > $inwon_empty){ // 신청인원이 꽉찼을경우
			if($temp_winwon > $winwon_empty){ // 대기인원이 꽉찼을경우
				echo "<script>alert('신청인원및 대기신청인원이 초과되었습니다.\\n신청가능인원:".$inwon_empty."명, 신청대기가능인원:".$winwon_empty."명 입니다.\\n\\n ※ 신청과 대기신청 둘다 사용할수는 없으니, 가능한 인원에 맞게 인원설정다시한 뒤 신청해주세요.');</script>";
//				echo "<script>alert('접수인원이 마감되었습니다.\\n대기자로 신청되었으며, 자세한 사항은 센터로 문의해 주시기 바랍니다.\\nTel. 02)2237-5800\\n\\n ※ 신청과 대기를 동시에 진행할 수 없으니, 가능한 인원에 맞게 설정한 뒤 다시 신청해주세요.');</script>";
				echo "<script>history.back();</script>";
				exit;
			}else{
				
				$status1 = 3; //대기
				if($inwon_empty > 0){ // 신청인원이 여유있으나 현재 신청한 인원이 신청인원보다 클 경우 대기인원으로 전환되지만
									  // 인원체크후 신청인원으로 전환할수있게 안내
?>
<script>
/*
if(confirm("현재 신청가능인원이 <?=$inwon_empty?>명 이므로 대기인원으로 들어갑니다.\n대기인원으로 신청을 원하시면 [확인] 버튼을 눌러주세요.")){
		<?$tmp_check = true;?>
	}else{
		<?$tmp_check = false;?>
	}
*/
alert("현재 신청가능인원이 <?=$inwon_empty?>명 이므로 대기인원으로 들어갑니다.\n대기신청 취소를 원하시면 [마이페이지-온라인신청내역-꿈자람공동육아방신청] 메뉴에서 가능합니다.");
</script>
<?	
/*
					if(!$tmp_check){
						echo "<script>history.back();</script>";
						exit;
					}
*/
				}
			}
		}else{
			$status1 = 1; //신청
		}
	}

	// 신청제한부분 통과시 신청

	if(trim($mbId) == '' || trim($mbName) == '') {
?>
<script>
		alert('세션이 만료되었습니다.');
</script>
<?	
		exit;
	}

	if($eduinfo['climit1'] && $eduinfo['climit2']) $tmp_type = 1; // 개월이상~개월이하
	if($eduinfo['climit1'] && !$eduinfo['climit2']) $tmp_type = 2; // 개월이상
	if(!$eduinfo['climit1'] && $eduinfo['climit2']) $tmp_type = 3; // 개월이하
	if(!$eduinfo['climit1'] && !$eduinfo['climit2']) $tmp_type = 4; // 사용하지않음

	/***
	   * 우리아이 쑥쑥, 영유아프로그램일경우 childbirth 사용 
	   * 교육개월수 설정과 아동생년월일 데이터와 비교하여 월령제한 체크
	***/

	if($childbirth){

		$chk_birth = split('\|', $childbirth);	//자녀아동 개월수
		$tmp_sdate = date("Ymd",$eduinfo['edu_sdate']);	//교육 설정날짜
		
		for($i=1; $i<count($chk_birth);$i++){
			$tmp_now_m = sqlRowOne("SELECT 
									Floor(
										TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") + DATEDIFF(".$tmp_sdate.", ".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") MONTH) 
										/
										DATEDIFF(".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") + 1 MONTH, ".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") MONTH) 
										) tmp_month");

			if($tmp_type == 1){
				if($tmp_now_m >= $eduinfo[climit1] && $tmp_now_m <= $eduinfo[climit2]){
				}else{
					echo "<script>alert('".($i)."번째 추가아동의 생년월일이 월령제한에 맞지 않습니다.\\n(현재개월수:".$tmp_now_m."개월)');</script>";
					exit;
				}
			}
			
			if($tmp_type == 2){
				if($tmp_now_m >= $eduinfo[climit1]){
				}else{
					echo "<script>alert('".($i)."번째 추가아동의 생년월일이 월령제한에 맞지 않습니다.\\n(현재개월수:".$tmp_now_m."개월)');</script>";
					exit;
				}
			}

			if($tmp_type == 3){
				if($tmp_now_m <= $eduinfo[climit2]){
				}else{
					echo "<script>alert('".($i)."번째 추가아동의 생년월일이 월령제한에 맞지 않습니다.\\n(현재개월수:".$tmp_now_m."개월)');</script>";
					exit;
				}
			}

			if($tmp_type == 4){
				// 사용하지않음
			}
//				echo "<script>alert('".$tmp_now_m."개월');</script>";
		}
	}


	


	$query = "INSERT INTO ddm_daynursery_app SET 
						parent_idx = '$_POST[parent_idx]'
						, mbId = '$_POST[mbId]'
						, mbName = '$_POST[mbName]'
						, sisulName = '$sisulName'
						, sisulType = '$sisulType'
						, job = '$job'
						, childName = '$childName'
						, mbTel = HEX(AES_ENCRYPT('$mbTel','DM'))
						, mbHp = HEX(AES_ENCRYPT('$mbHp','DM'))
						, smsyn = '$smsyn'
						, pname = '$pname'
						, addr = '$addr'
						, regdate = '$regdate'
						, status1 = '$status1'
						, addInwon = '$addInwon'
						, applyStatus = '$applyStatus'
						";

	//echo "<script>alert(\"$query\");</script>";
	//exit;

	mysql_query($query);

	// 추가인원 insert 하기(기본정보 5개필드와 add_idx에 신청자 idx 를 기재한다.)
	$detail = preg_split('/\|/', $addDetail);
	
	$idx = mysql_insert_id();
	
	for($i = 0; $i < $addInwon; $i++){
		if($gubun == '보육교직원교육'){
			$mbName		= $detail[$i*4 + 1];
			$sisulName	= $detail[$i*4 + 2];
			$sisulType	= $detail[$i*4 + 3];
			$job		= $detail[$i*4 + 4];

			$query = "insert into ddm_daynursery_app SET
						mbName = '$mbName'
						, sisulName = '$sisulName'
						, sisulType = '$sisulType'
						, job = '$job'
						, status1 = '$status1'
						, add_idx = '$idx'
				 ";
		}else{
			$mbName		= $detail[$i*2 + 1];
			$mbBirth		= $detail[$i*2 + 2];

			$query = "insert into ddm_daynursery_app SET
						mbName = '$mbName'
						, status1 = '$status1'
						, add_idx = '$idx'
						, childbirth = '$mbBirth'
				 ";
		}
		mysql_query($query);
	}
	

	if($smsyn == "Y" && $status1 == 1) {
		$objsms = new SMS_CLASS($DBSMS,$INFO);

		if(!$objsms->status=="readytosend"){
			echo "<script>alert('".$objsms->errmsg."');</script>";
			exit;
		}

		$sucess_cnt = 0;
		$fail_cnt = 0;
		$pass_cnt = 0;

		$sendnumber = '02-2212-1975';
		if($eduinfo[s_cd] == '03') {
			$sendnumber = '02-2212-1975'; //배봉산점
		} else if($eduinfo[s_cd] == '04') {
			$sendnumber = '02-2212-5844'; //장안2동점
		}
		//fix. 발신번호 고정
		$sendnumber = '02-2237-5800';
		$send_name = $_POST[mbName];

		//$eduYmd = date('Y년 m월 d일', $eduinfo[edu_sdate]);
		$eduYmd = date('m월 d일', $eduinfo[edu_sdate]);
		$timeCnt = 0;
		if( $eduinfo[eTime] == "10:00~12:00" || $eduinfo[eTime] == "10:00~11:30" ) $timeCnt = 1;
		if( $eduinfo[eTime] == "13:00~15:00" || $eduinfo[eTime] == "14:00~15:30" ) $timeCnt = 2;
		if( $eduinfo[eTime] == "15:30~17:30" || $eduinfo[eTime] == "16:00~17:30" ) $timeCnt = 3;
		if( $eduinfo[eTime] == "18:00~19:30" ) $timeCnt = 4;

		$eduinfo[ePlace] = str_replace("동대문구육아종합지원센터","",$eduinfo[ePlace]);
		$eduinfo[ePlace] = str_replace("공동육아방","",$eduinfo[ePlace]);
		$eduinfo[ePlace] = str_replace(" ","",$eduinfo[ePlace]);
		$msgbox = '꿈자람공동육아방 '.$eduinfo[ePlace].' '.$eduYmd.' '.$timeCnt.'회차('.$eduinfo[eTime].') 신청되었습니다(주차불가)';

		if(!($objsms->sendPhoneNumberCheck($sendnumber))){
			//발신자번호 오류로 문자발송 안됨
		} else {
			$v = $mbHp;
			$v = trim($v);
			$v = str_replace(" ","",$v);
			$v = str_replace("-","",$v);
			$rtn = false;

			if($v) $rtn = $objsms->send($v,$sendnumber,$msgbox,$send_name,"N");
			if($rtn){
				$sucess_cnt++;
			}
			else $fail_cnt++;
		}
	}



	$status_name = $status1 == 1 ? "신청":"대기신청";
	echo "<script>alert('".$status_name." 되었습니다.');location.href = '../mypage/association.php';</script>";
	exit;
?>