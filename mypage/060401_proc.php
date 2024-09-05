<meta charset="euc-kr">
<?
$charType = "no";
$cssType = "no";
$iframeType = "no";
$blurType = "no";
include $_SERVER["DOCUMENT_ROOT"]."/include/global/config.php";

$userid = $_POST['userid'];
$passwd	= hash('sha256',trim($_POST['passwd']));
$content = $_POST['content'];

$tmpChk = sqlRowOne("select count(*) from ona_orderitem where userid='$userid' and delete_yn='N' and status='RT03'");
if($tmpChk){
	echo "<script>alert('현재 대여중인 물품이 있으셔서 탈퇴가 불가능합니다.\n대여중인 상품은 마이페이지에서 확인하실 수 있습니다.');</script>";
	exit;
}
$tmpChk = sqlRowOne("select count(*) from ona_member_family where userid='$userid' and memberno!='' and expdate>curdate()");
if($tmpChk){
	echo "<script>alert('발급받으신 대여회원카드가 기간이 남아있어서 탈퇴가 불가능합니다.');</script>";
	exit;
}

$memInfo = sqlRow("select * from ona_member where userid='$userid' and status1!='2'");

if(!$memInfo){
	session_destroy();
	echo "<script>alert('이미 처리 되었습니다.');parent.location = '/new/';</script>";
	exit;
}
if($passwd!=$memInfo['passwd']){
	echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
	exit;
}

$query = "INSERT INTO ddm_mb_secession SET
	userid='$userid'
	,jumin='$memInfo[jumin1]-$memInfo[jumin2]'
	,name='$memInfo[name]'
	,content='$content'
	,regdate=now()
";

sqlExe($query);
	
$query = "UPDATE ona_member SET status1='2', jumin1='', jumin2='' WHERE userid='".$memInfo['userid']."'";
sqlExe($query);
$query = "UPDATE ona_member_family SET status1='2', jumin='' WHERE userid='".$memInfo['userid']."'";
sqlExe($query);
$query = "DELETE FROM ddm_diary WHERE mbid='".$memInfo['userid']."'";
sqlExe($query);
$query = "UPDATE ddm_edu_app SET status1='2' WHERE mbId='".$memInfo['userid']."'";
sqlExe($query);
$query = "UPDATE ddm_rq_counsel SET status1='2' WHERE rq_regid='".$memInfo['userid']."'";
sqlExe($query);
$query = "UPDATE ddm_childRoom_app SET status1='2' WHERE mbid='".$memInfo['userid']."'";
sqlExe($query);
$query = "UPDATE ddm_aid_app SET status1='2' WHERE mbId='".$memInfo['userid']."'";
sqlExe($query);

session_destroy();
?>
<script>
alert('회원탈퇴 되었습니다.');
parent.location.href='/new/';
</script>
