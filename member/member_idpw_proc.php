<meta charset="euc-kr">
<?
	include "../../include/global/config.php"; 
	include "../../include/global/sendmail.class.php";
	include "../../G-PIN/gpin_func.php";
	
	$modeType		= trim($_POST['modeType']);
	$jumin1				= trim($_POST['jumin1']);
	$jumin2				= trim($_POST['jumin2']);

	$regNo = $jumin1.$jumin2;
	$dupInfo = getUserDupValue($regNo, $INFO['GPIN_siteId']);

	if( $modeType == "id" ){

		$name	= trim($_POST['name']);			
		
		$query = "SELECT userid FROM ona_member WHERE name='".$name."' && dupInfo='".$dupInfo."'";
		//$query = "SELECT userid FROM ona_member WHERE name='".$name."' && jumin1='".$jumin1."' && jumin2='".$jumin2."'";
		$result	= mysql_query($query);
		$row		= mysql_fetch_array($result);

		if($row[userid]){
			echo "<script>
					  <!--
						f = parent.idSearchFrm;
						f.name.value = '';
						f.jumin1.value = '';
						f.jumin2.value = '';
						f.name.focus();
						parent.popInfo('$row[userid]','popup_id');						
					  -->
				      </script>";
		}else{
			echo "<script>					
					  <!--
						f = parent.idSearchFrm;
						alert('입력하신 정보가 일치하지 않습니다.');
						f.name.value = '';
						f.jumin1.value = '';
						f.jumin2.value = '';
						f.name.focus();
					  //-->
					  </script>";
		}
		
	}else{

		$userid		= trim($_POST['userid']);		
		$email		= trim($_POST['email']);

		$query = "SELECT userid, passwd, name, email FROM ona_member WHERE userid='".$userid."' && dupInfo='".$dupInfo."' && email='".$email."'";
		//$query = "SELECT userid, passwd, name, email FROM ona_member WHERE userid='".$userid."' && jumin1='".$jumin1."' && jumin2='".$jumin2."' && email='".$email."'";
		$result	= mysql_query($query);
		$row		= mysql_fetch_array($result);

		if($row[userid]){

			$mailFile		 = "password_email.htm";
			$mailContent = join ('', file ($mailFile));
			$mailContent = str_replace("{host}", $INFO[url], $mailContent);
			$mailContent = str_replace("{mbID}", $row[userid], $mailContent);
			$mailContent = str_replace("{mbPwd}", $row[passwd], $mailContent);

			mail($row[email] , "[ ".$INFO[company]." ] ".$row[name]."님의 아이디/패스워드 입니다." , "$mailContent" , "From: ".$INFO[company]." <$INFO[email]>\nContent-Type: text/html; charset=EUC-KR");
/*
			$email_title = "[ ".$INFO[company]." ] ".$row[name]."님의 아이디/패스워드 입니다.";
			$email_content = $mailContent;

			$dMail = new Sendmail; 
			$dMail->setUseSMTPServer(true); 
			$dMail->setSMTPServer("222.122.158.112");
			$dMail->setSMTPUser("ccicmail@onandon.co.kr");
			$dMail->setSMTPPasswd("~ccicmail!@#");
			$dMail->setFrom($INFO[email], $INFO[company]); 
			$dMail->setSubject($email_title); 
			$dMail->setMailBody($email_content, true); 
			$dMail->addTo($row[email], $row[name]); 
			$dMail->send(); 
*/
			echo "<script>
					  <!--
						alert('회원가입시 입력하신 이메일로 전송되었습니다.');
						window.close();
					  -->
				      </script>";

		}else{
			echo "<script>					
					  <!--
						alert('입력하신 정보가 일치하지 않습니다.');
					  //-->
					  </script>";
		}

	}
?>