<?
$pno = $_REQUEST['pno'];
if(!is_numeric($pno)){
	echo "<script>history.back();</script>";
	exit;
}
?>
<?
$_dep = array(5,5);
$_tit = array('Ŀ�´�Ƽ','�Ҹ�����');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<script>
function ok_chk(){
	
	var form  = document.chks;	
	
	if(!form.agree[0].checked){
		alert("������ �����ϰ� ���� ���ּž� ���� �ۼ��Ͻ� �� �ֽ��ϴ�.");form.agree[0].focus();return;
	}

	form.submit();
}
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<div class="__greenHead2">
					<dl>
						<dt>�Ҹ������� ���빮������������������ �̿��� �Ҹ����� �� �ٸ� �̸��Դϴ�.</dt>
						<dd>
							���빮�����������������͸� �̿��ϸ鼭 �����ϰ� ���� �ǰ��̳� Ī���ϰ� ���� ���� �����Ű���?<br>�Ҹ������� ���� ���빮�����������������Ϳ����� �׻� �����а� �����Ͽ�, �� ���� ���񽺸� �����ص帳�ϴ�.
						</dd>
					</dl>
				</div>

				<div class="__agreeInfo __mt50">
					<div class="img">
						<strong>��㵿�Ǽ�</strong>
					</div>
					<div class="info">
						<dl>
							<dt>
								�ȳ��Ͻʴϱ�?<br>
								�� ����� �������� <strong>��������</strong>�� <strong>��㳻��</strong>�� ���� <br class="__p">
								<strong>���</strong>�� ���ѵ帱 ���� <strong>���</strong>�մϴ�.
							</dt>
							<dd>
								���Ҿ� ���� ȿ������ ��� ���񽺸� �����ϱ� ���� �ʿ��� �� ���� ���� ���׿� ���� �������� ���Ǹ� ���ϰ��� �մϴ�.
							</dd>
						</dl>
					</div>
				</div>
				<div class="__tit1 __mt50">
					<h3>���� ���� ���� ����</h3>
				</div>
				<table class="__tbl type2">
					<caption>TABLE</caption>
					<tbody>
						<tr>
							<th scope="row">����, �̿� ����</th>
							<td class="tal">
								������ ��� ������ ���������� ������� ���Ͽ� �̿�Ǹ�, ���������� �ٸ� �������� ������ �ʽ��ϴ�.
							</td>
						</tr>
						<tr>
							<th scope="row">����, �����Կ� ����</th>
							<td class="tal">
								������� �ڹ��� �������� �������� ��㳻���� ����, ���� �Կ��� �� �� ������ �˷��帳�ϴ�.<br>
								����, ���� �Կ��� ������ �ʴ� ��� �̸� ����ڿ��� ������ �ֽñ� �ٶ��ϴ�.
							</td>
						</tr>
						<tr>
							<th scope="row">���� �� �̿�Ⱓ</th>
							<td class="tal">
								��� �ڷ�� ���Ϳ��� 3�Ⱓ �����ϰ� ���Ŀ��� ����մϴ�.
							</td>
						</tr>
						<tr>
							<th scope="row">���� �ź� �� �Ǹ�</th>
							<td class="tal">
								�ʼ� �׸��� ������ �������� ���� ��� �͸����� ó���մϴ�.
							</td>
						</tr>
					</tbody>
				</table>
				<ul class="__dotlist __txt15 __mt30">
					<li>
						��� ���� �� �Ƶ��д븦 �˰� �� ��쿡�� �Ƶ���ȣ������� �Ǵ� �������� �Ű��Ͽ� �˸��� ���� ��Ģ���� �ϰ� �ֽ��ϴ�.<br>
						(�Ƶ������� �� 25�� �Ƶ��д� �Ű� �ǹ��� ����)
					</li>
					<li>��� �� �ܺλ���������(��: �Ű����Ű�, ���ź��Ǽ���, ����������� ��)���� ���谡 �ʿ��� ���, ������� ���� �� �� ������ ��ħ�� ���������� ������ �ֽñ� �ٶ��ϴ�.</li>
					<li>����� �� ȸ ȸ�� �� ���� ����Ǹ�, ���� ���� �������� �Ἦ���� ���� ���� ����� �ֽñ� �ٶ��ϴ�.</li>
					<li>����, �弳, ������� ���� ���� ���� �����ڰ� �뺸 ���� �����մϴ�.</li>
					<li>�̿� �����Ͻø� �Ʒ��� ������ �ֽñ� �ٶ��ϴ�.</li>
				</ul>

<form name="chks" method="post" action="sound_write.php">
<input type="hidden" name="mode" value="write">
<input type="hidden" name="pno" value="<?=$pno?>">
				<div class="__apprAgree __mt40">
					<label><input type="radio" name="agree" /> �����մϴ�.</label>
					<label><input type="radio" name="agree" /> �������� �ʽ��ϴ�.</label>
				</div>

				<div class="__botArea">
					<div class="cen">
						<a href="javascript:ok_chk();" class="__btn1">Ȯ��</a>
					</div>
				</div>
</form>



			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>