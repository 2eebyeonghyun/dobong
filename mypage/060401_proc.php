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
	echo "<script>alert('���� �뿩���� ��ǰ�� �����ż� Ż�� �Ұ����մϴ�.\n�뿩���� ��ǰ�� �������������� Ȯ���Ͻ� �� �ֽ��ϴ�.');</script>";
	exit;
}
$tmpChk = sqlRowOne("select count(*) from ona_member_family where userid='$userid' and memberno!='' and expdate>curdate()");
if($tmpChk){
	echo "<script>alert('�߱޹����� �뿩ȸ��ī�尡 �Ⱓ�� �����־ Ż�� �Ұ����մϴ�.');</script>";
	exit;
}

$memInfo = sqlRow("select * from ona_member where userid='$userid' and status1!='2'");

if(!$memInfo){
	session_destroy();
	echo "<script>alert('�̹� ó�� �Ǿ����ϴ�.');parent.location = '/new/';</script>";
	exit;
}
if($passwd!=$memInfo['passwd']){
	echo "<script>alert('��й�ȣ�� ��ġ���� �ʽ��ϴ�.');</script>";
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
alert('ȸ��Ż�� �Ǿ����ϴ�.');
parent.location.href='/new/';
</script>
