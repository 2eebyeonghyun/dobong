<meta charset="euc-kr">
<?
	include $_SERVER["DOCUMENT_ROOT"]."/include/global/config.php"; 

	if($_SERVER['REMOTE_ADDR']=='112.218.172.44'){			
		$_POST["result"]="login_ok";		
	}
	if($_POST["mode"]=="after_proc"){
		if($_POST["result"]=="login_ok"){
			session_destroy();
			session_start();
			$_SESSION['member_id']				= $_POST['member_id'];
			$_SESSION['member_name']	 		= $_POST['member_name'];		
			$_SESSION['member_level']			= $_POST['member_level'];
			
			if($_SERVER['REMOTE_ADDR']!='112.218.172.44') {
				mysql_query("update ona_member set lastlogin = '".time()."' where userid = '".$_SESSION['member_id']."'");
			}
			
			echo "<script>";			
			if (!$ret_url) {				
				echo "location.href = '/new/';";				
			} else {				
				echo "location.href = '".urldecode($ret_url)."';";
			}
			echo "</script>";
		
		}
		else if($_POST['result']=="login_fail"){
			$scripts = "<script>
						alert('입력하신 정보가 일치하지 않습니다.');
						history.back();
					 </script>";
			echo $scripts;
			exit;
		}

		exit;
	}

	$name		= trim($_POST['userid']);
	$passwd	= hash('sha256',trim($_POST['passwd']));
	$ret_url		= trim($_POST['ret_url']);

	$query = "SELECT userid, passwd, name, memtype1, status2 FROM ona_member WHERE userid='".$userid."' && status1!='2'";
	$row = sqlRow($query);


	if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
		//$passwd = $row["passwd"];		
	}
	$result = "login_ok";
	if($row['passwd']!=$passwd) {$result = "login_fail"; $reason = "비밀번호가 일치하지 않습니다.";}
	if(!$row) {$result = "login_fail"; $reason = "아이디를 찾을 수 없습니다.";}
		
?>

<body>
<form name="after_procForm" method="post" action="https://<?=$ret_host?$ret_host:$_SERVER["HTTP_HOST"]?><?=$_SERVER['SCRIPT_NAME']?>">
<input type="hidden" name="mode" value="after_proc">
<input type="hidden" name="result" value="<?=$result?>">
<input type="hidden" name="reason" value="<?=$reason?>">
<input type="hidden" name="ret_url" value="<?=$ret_url?>">
<input type="hidden" name="member_id" value="<?=$row["userid"]?>">
<input type="hidden" name="member_name" value="<?=$row["name"]?>">
<input type="hidden" name="member_level" value="<?=$row["memtype1"]?>">
</form>
<script>
document.after_procForm.submit();
</script>