<meta charset="euc-kr">
<?
	include $_SERVER["DOCUMENT_ROOT"]."/include/global/config.php"; 

	$tableName	 = "ona_member";
	$tableName2 = "ona_member_family";
	
	$mode					= trim($_POST['mode']);
	$memtype1			= trim($_POST['memtype1']);
	$memtype2			= "일반";
	$userid					= trim($_POST['userid']);
	$passwd_ori		= trim($_POST['passwd']);
	$passwd				= hash('sha256',trim($_POST['passwd']));
	$name					= trim($_POST['name']);
	$jumin1					= trim($_POST['jumin1']);
	$jumin2					= trim($_POST['jumin2']);
	$email					= trim($_POST['email1']).'@'.trim($_POST['email2']);
	if(trim($_POST['tel2']) && trim($_POST['tel3'])){
		$tel					= trim($_POST['tel1']).'-'.trim($_POST['tel2']).'-'.trim($_POST['tel3']);
	}
	$telType				= trim($_POST['telType']);
	$mobile				= trim($_POST['hp1']).'-'.trim($_POST['hp2']).'-'.trim($_POST['hp3']);	
//	$homezipcode		= trim($_POST['homezipcode1']).'-'.trim($_POST['homezipcode2']);
	$homezipcode		= trim($_POST['homezipcode']);
	$homeaddress		= trim($_POST['homeaddress']);
	$homeaddress2	= trim($_POST['homeaddress2']);
	$mailyn					= trim($_POST['mailyn']);
	$smsyn				= trim($_POST['smsyn']);
	$toyEntry				= trim($_POST['toyEntry']);

	// 현재 자녀중복체크 X 토이엔트리를 != N으로 바꾸면 될듯
	// 자녀 중복체크
	/*if ( trim($childName) && $toyEntry == "Y" && $jumin1 && $jumin2 ) {
		foreach ($childName as $k=>$vArr) {			
			if($childjumin1[$k] && $childjumin2[$k]){

				$tmpj = $childjumin1[$k]."-".$childjumin2[$k];
				$query = "SELECT count(*) As Cnt FROM $tableName2 WHERE jumincheck=md5('".$tmpj."')";
				//$query = "SELECT count(*) As Cnt FROM $tableName2 WHERE jumin='$childjumin1[$k]-$childjumin2[$k]'";
				$result	= mysql_query($query);
				$row		= mysql_fetch_array($result);
				
				if($row[Cnt] > 0 ){
					echo"<script>
								alert('$childName[$k] 아동은 등록된 아동입니다.');										
							 </script>";
					exit;
					
				}
			}
		}
	}*/
	
	switch ($memtype1){
		case "개인":
			$job1			= trim($_POST['job1']);
			if($job1 == "보육시설종사자"){
				$job2				= trim($_POST['job2']);
				$cpName		= trim($_POST['cpNameA']);
				$memtype3	= trim($_POST['memtype3A']);
			}
			break;

		case "기관":
			$memtype3	= trim($_POST['memtype3']);
			$memtype4	= trim($_POST['memtype4']);
			$sisulid		= trim($_POST['sisulid']);
			$cpName		= trim($_POST['cpName']);
			$cpJang		= trim($_POST['cpJang']);
			$cpNumber	= trim($_POST['cpNumber']);
			$cpTel			= trim($_POST['cpTel1']).'-'.trim($_POST['cpTel2']).'-'.trim($_POST['cpTel3']);
			break;

		case "학생":		
			$school1		= trim($_POST['school1']);
			$school2		= trim($_POST['school2']);
			break;

	}
	
	// 전화번호 타입에 따라..
	if($telType == "H"){
		$homephone = $tel;
	}else{
		$workphone = $tel;
	}

	// 회원구분이 기관이고 지역구분이 관외이면..
	if ($memtype4 == "관외" ){
		$cpName	= "";
		$cpJang	= "";
		$cpNumber = "";
	}

	if($mode=="write"){

//		if( $userid && $passwd && $jumin1 && $jumin2	){

			//status1 - 1 : 회원 / 2 : 탈퇴

			$query = "INSERT INTO $tableName (
								memtype1, memtype2, memtype3, memtype4, memtype5, userid, 
								passwd, name, jumin1, jumin2, telType, 
								homephone, workphone, mobile, 
								smsyn,	 email, 
								mailyn, homezipcode, homeaddress, homeaddress2, regdate, 
								job1, job2, toyEntry, sisulid, cpName, cpJang, 
								cpNumber, cpTel, status1, status2, 
								s_cd,  c_cd, school1, school2,
								virtualNo, dupInfo, authInfo
						   ) VALUES (
								'$memtype1', '$memtype2', '$memtype3', '$memtype4', '$memtype5', '$userid', 
								'$passwd', '$name', '$jumin1', '".substr($jumin2,0,1)."', '$telType ', 
								HEX(AES_ENCRYPT('$homephone','DM')), HEX(AES_ENCRYPT('$workphone','DM')), HEX(AES_ENCRYPT('$mobile','DM')), 
								'$smsyn', '$email', 
								'$mailyn', '$homezipcode', '$homeaddress', '$homeaddress2', now(), 
								'$job1', '$job2', '$toyEntry', '$sisulid', '$cpName', '$cpJang', 
								'$cpNumber', '$cpTel', '1', '1',
								'$INFO[s_cd]','$INFO[c_cd]', '$school1', '$school2',
								'$virtualNo', '$dupInfo', '$authInfo'
						   )";

			mysql_query($query);

			// 부모
			$query = "INSERT INTO $tableName2 ( 
								userid, name, jumin, nursery, relation, s_cd,  c_cd, status1, rent_grade
							) VALUES ( 
								'$userid', '$name', '".$jumin1."-".substr($jumin2,0,1)."', '기타', '본인', '$INFO[s_cd]', '$INFO[c_cd]', 1, '$memtype1'
							)";
			mysql_query($query);
				

			// 자녀
			if ($childName) {
				foreach ($childName as $k=>$vArr) {
					if(trim($childName[$k])=="" || trim($cbirth1[$k])=="" || trim($csex[$k])=="") continue;
				
					$cjumin1 = substr($cbirth1[$k],2,2).$cbirth2[$k].$cbirth3[$k];

					$cjumin2 = $csex[$k];

					if(substr($cbirth1[$k],0,1)=='2'){
						$cjumin2 = $cjumin2+2;
					}

					if($cjumin2 == 3){
						$relation = "아들";
					}else{
						$relation = "딸";
					}
			
					$query = "INSERT INTO $tableName2 ( 
										  userid, name, jumin, nursery, relation, s_cd,  c_cd, status1, rent_grade
									   ) VALUES ( 
										 '$userid', '$childName[$k]', '$cjumin1-$cjumin2', '$nursery[$k]', '$relation', '$INFO[s_cd]','$INFO[c_cd]', 1, '$memtype1'
									   )";

					mysql_query($query);
				}
			}
//		}

		sendResult("write_ok",$userid);
		exit;
	}
		
	if($mode=="modify"){

		if(trim($userid) == '')
		{
			$userid = trim($_SESSION['member_id']);
		}
		$newpasswd	= hash('sha256',trim($_POST['newpasswd']));

		if(!$_SESSION['masterSession']){
			$query = "SELECT * FROM ona_member WHERE userid='".$userid."' && passwd='".$passwd."'";
		}else{
			$query = "SELECT * FROM ona_member WHERE userid='".$userid."'";
		}
		$row		= sqlRow($query);
		
		if($row){
			$query = "UPDATE $tableName SET 
								 memtype3='$memtype3'
								, memtype4='$memtype4'
								, memtype5='$memtype5'
								, telType='$telType'
								, homephone=HEX(AES_ENCRYPT('$homephone','DM'))
								, workphone=HEX(AES_ENCRYPT('$workphone','DM'))
								, mobile=HEX(AES_ENCRYPT('$mobile','DM'))
								, smsyn='$smsyn'
								, email='$email'
								, mailyn='$mailyn'
								, homezipcode='$homezipcode'
								, homeaddress='$homeaddress'
								, homeaddress2='$homeaddress2'
								, moddate=now()
								, job1='$job1'
								, job2='$job2'
								, toyEntry='$toyEntry'
								, sisulid='$sisulid'
								, cpName='$cpName'
								, cpJang='$cpJang'
								, cpNumber='$cpNumber'
								, cpTel='$cpTel'
								, school1='$school1'
								, school2='$school2'
							WHERE userid='".$userid."'";

if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
    echo "<script>alert(\"1\");</script>";
    echo $query;
}

				mysql_query($query);			
				mysql_query("update $tableName2 set rent_grade = '$memtype1' where userid = '$userid'");

				/* 개인정보자료 열람 저장 */
				if($_SESSION['masterSession']){
					sqlExe("insert into admin_acthist set 
					userid='$_SESSION[member_id]'
					,ip='$_SERVER[REMOTE_ADDR]'
					,act='회원정보수정'
					,url='$_SERVER[REQUEST_URI]'
					,regdate=now()");
				}
			
			/*if ($childName) {
				foreach ($childName as $k=>$vArr) {
					if(trim($childName[$k])=="" || trim($cbirth1[$k])=="" || trim($csex[$k])=="") continue;
				
					$cjumin1 = substr($cbirth1[$k],2,2).$cbirth2[$k].$cbirth3[$k];

					$cjumin2 = $csex[$k];

					if($cbirth1 > 1999)
					{
						$cjumin2 = $cjumin2+2;
					}
			
					$query = "INSERT INTO $tableName2 ( 
										  userid, name, jumin, nursery, s_cd,  c_cd, status1, rent_grade
									   ) VALUES ( 
										 '$userid', '$childName[$k]', '$cjumin1-$cjumin2', '$nursery[$k]', '$INFO[s_cd]','$INFO[c_cd]', 1, '$memtype1'
									   )";

					mysql_query($query);
				}
			}*/
			
			
			// 수정 자녀(수정만 가능 삭제는 열어주면 안됨...)
			if ($tmp_childName) {
				foreach ($tmp_childName as $k=>$vArr) {
					if(trim($tmp_childName[$k])=="" || trim($tmp_cbirth1[$k])=="" || trim($tmp_csex[$k])=="" || trim($tmp_nursery[$k])=="") continue;

					$tmp_cjumin1 = substr($tmp_cbirth1[$k],2,2).$tmp_cbirth2[$k].$tmp_cbirth3[$k];

					$tmp_cjumin2 = $tmp_csex[$k];

					if(substr($tmp_cbirth1[$k],0,1)=='2')
					{
						$tmp_cjumin2 = $tmp_cjumin2+2;
					}

					if($tmp_cjumin2 == 3){
						$relation = "아들";
					}else{
						$relation = "딸";
					}

					//업데이트 신중..
					if($userid && $tmp_family_idx[$k]){
						$query = "UPDATE $tableName2 set
							 name='$tmp_childName[$k]'
							,jumin='$tmp_cjumin1-$tmp_cjumin2'
							,nursery='$tmp_nursery[$k]'
							,relation='$relation'
							,modid='$userid'
							,moddate=now()
							where userid='$userid' and idx='$tmp_family_idx[$k]'
						";
						mysql_query($query);
					}
				}
			}

			// 추가자녀
			
			if ($childName) {
				foreach ($childName as $k=>$vArr) {
					if(trim($childName[$k])=="" || trim($cbirth1[$k])=="" || trim($csex[$k])=="" || trim($nursery[$k])=="") continue;

					$cjumin1 = substr($cbirth1[$k],2,2).$cbirth2[$k].$cbirth3[$k];

					$cjumin2 = $csex[$k];

					if(substr($cbirth1[$k],0,1)=='2')
					{
						$cjumin2 = $cjumin2+2;
					}
					if($cjumin2 == 3){
						$relation = "아들";
					}else{
						$relation = "딸";
					}

					$query = "INSERT INTO $tableName2 set
						userid='$userid'
						,name='$childName[$k]'
						,jumin='$cjumin1-$cjumin2'
						,nursery='$nursery[$k]'
						,relation='$relation'
						,memberno=''
						,c_cd='$INFO[C_CD]'
						,s_cd='$INFO[S_CD]'
						,rent_grade='$memtype1'
						,regid='$userid'
						,regdate=now()
					";
					mysql_query($query);
				}
			}

			if($chgpasswd) sqlExe("update ona_member set passwd='$newpasswd' where userid='$userid' and status1!='2'");

		}else{

			echo "<script>						
						alert('비밀번호가 일치하지 않습니다.');
					  </script>";
			exit;

		}

		sendResult("modify_ok");
		exit;
	}
	function sendResult($result, $userid=""){
	global $ret_host;
		if($result=="write_ok"){
?>
<form name="locationFrm" method="post">
	<input type="hidden" name="pno">
	<input type="hidden" name="userid">
	<input type="hidden" name="passwd">
	<input type="hidden" name="name">
</form>
<?
			$str = "<script>";
			$str.= "alert('축하드립니다. 회원가입이 완료 되었습니다.');";
			$str.= "document.locationFrm.pno.value='050203';";
			$str.= "document.locationFrm.userid.value='$userid';";
			$str.= "document.locationFrm.name.value='$name';";
			$str.= "document.locationFrm.passwd.value='$passwd_ori';";
			$str.= "document.locationFrm.action='/new/member/join3.php';";
			$str.= "document.locationFrm.submit();";
			$str.= "</script>";
		}
		if($result=="modify_ok"){
			$str= "<script>";
			$str.= "alert('회원정보가 수정 되었습니다.');";
//fix.			$str.= "parent.location.reload();";
			$str.= "location.replace('modify.php');";
			$str.= "</script>";
		}
		if($result=="wrong_info") $str = "<script>alert('입력하신 정보가 정확하지 않습니다.');parent.frm.submitting.value='N';</script>";
		if($result=="wrong_passwd") $str = "<script>alert('비밀번호가 일치하지 않습니다.');parent.frm.submitting.value='N';</script>";

		if($result=="modify_ok" && $_SESSION['masterSession']!="master"){
			$cpName = sqlRowOne("select cpName from ona_member where userid='$_SESSION[member_id]' and status1!='2'");
			$_SESSION['member_cpName'] = $cpName;
		}
		
		echo $str;
		exit;
}?>