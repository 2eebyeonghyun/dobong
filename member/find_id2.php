<? include $_SERVER["DOCUMENT_ROOT"]."/CheckPlus_Test/checkplus_config.php"; ?>
<?
// http > https
if(!isset($_SERVER["HTTPS"])) {
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
?>
<?
$_dep = array(6,3);
$_tit = array('ȸ������','���̵�/��й�ȣ ã��');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?
	$f_userid		= trim($_POST['f_userid']);
?>
<script src="/include/js/gpin.js"></script>
<script language="javascript">
<!--
	// ���̵�, �н����� ã��
	function popInfo(userid,url) {
		url = "/html/sub05/"+url+".php?userid="+userid;
		//window.showModalDialog(url, window, "dialogWidth:450px; dialogHeight:200px;status:no;help:no");
		var left = (screen.width-450) / 2;
		var top = (screen.height-200) / 2;
		window.open(url, "popup_id_win", "left="+left+",top="+top+",width=450,height=200");
	}

	function popInfo2(userid,passwd,url) {
		url = "/html/member/"+url+".php?userid="+userid+"&passwd="+passwd;
		//window.showModalDialog(url, window, "dialogWidth:450px; dialogHeight:200px;status:no;help:no");
		var left = (screen.width-450) / 2;
		var top = (screen.height-200) / 2;
		window.open(url, "popup_id_win", "left="+left+",top="+top+",width=450,height=200");
	}

	function changediv(tmp){
		if(tmp == '1')
		{
			document.getElementById('authTrA').style.display = '';
			document.getElementById('authTrB').style.display = 'none';
		}
		else if(tmp == '2')
		{
			document.getElementById('authTrA').style.display = 'none';
			document.getElementById('authTrB').style.display = '';
		}
	}

	function pwdCheckB(form){
		if(!form.userid.value){alert('���̵� �Է��� �ּ���');form.userid.focus();return false;}
		checkAuth('findpw',form.userid.value);
		return false;
	}

	function fnPopup(){
		window.open('', 'popupChk', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
		document.thisForm.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
		document.thisForm.target = "popupChk";
		document.thisForm.submit();
	}

	function fnPopup2(){
		document.idPwdFrmC.param_r2.value = document.idPwdFrmC.userid.value;
		window.open('', 'popupChk', 'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no, toolbar=no, titlebar=yes, location=no, scrollbar=no');
		document.idPwdFrmC.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
		document.idPwdFrmC.target = "popupChk";
		document.idPwdFrmC.submit();
	}

	function pwdCheckC(form){
		if(!form.userid.value){alert('���̵� �Է��� �ּ���');form.userid.focus();return false;}
		fnPopup2();
		return false;
	}
//-->
</script>

<script language="javascript" src="../../include/js/member.js"></script>		
</head>
<body>

<form name="returnForm" method="post" action="find_id2.php">
	<input type="hidden" name="f_userid">
</form>	

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">
				<div class="__find">
					<div class="tab">
						<a href="./find_id.php" class="active">���̵� ã��</a>
						<a href="./find_pass.php">��й�ȣ ã��</a>
					</div>
					<div class="tit">
						<dl>
							<dt>ȸ������ ���̵�� <font color="tomato"><?=$f_userid	?></font> �Դϴ�.</dt>
							<dd>
								���������� �Է��Ͻ� ������ ���� �� ȸ�����Կ��� Ȯ�� �뵵�� ���Ǹ�
								�̿� �������� ���ǰų� ������� �ʽ��ϴ�.
							</dd>
						</dl>
					</div>

					<div class="btn">
						<button type="button" class="__btnPhone" onclick="location.replace('../member/login.php');">
							<span>�α��� �Ϸ�����</span>
						</button>
					</div>

				</div>
			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>