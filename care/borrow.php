<?
$pno = "020207";
//$view_url = "notice_view.php";
?>
<?
$_dep = array(2,7);
$_tit = array('��������','�����û');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
</head>
<script type="text/JavaScript">
	//��ʸ�
	function move1(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="borrow_schedule.php?pno=020207&mode=list2";
	    }
		else
	    {
			alert('�ȳ����׿� �����ϼž� �մϴ�.');
			document.rentForm.agree1.focus();
	    }
	}
	//������
	function move2(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="borrow_schedule2.php?pno=020207&mode=list3";
	    }
		else
	    {
			alert('�ȳ����׿� �����ϼž� �մϴ�.');
			document.rentForm.agree1.focus();
	    }
	}
	function move3(){
		if(document.rentForm.agree2.checked == true)
	    {
			location.href="../sub/index.php?pno=020207&mode=list4&scd=01";
	    }
		else
	    {
			alert('�ȳ����׿� �����ϼž� �մϴ�.');
			document.rentForm.agree2.focus();
	    }
	}
	function move4(){
		if(document.rentForm.agree2.checked == true)
	    {
			location.href="../sub/index.php?pno=020207&mode=list4&scd=02";
	    }
		else
	    {
			alert('�ȳ����׿� �����ϼž� �մϴ�.');
			document.rentForm.agree2.focus();
	    }
	}
</script>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/borrow.gif">�����û</h2>
			</div>
			<div id="content">
<!--
				<div class="__tab3">
					<a href="<?=DIR?>/care/borrow_schedule.html" class="active"><span>��ʸ��� ��� ��û�ϱ�</span></a>
					<a href="<?=DIR?>/care/borrow_schedule.html"><span>������ ��� ��û�ϱ�</span></a>
				</div>
-->
				<div class="__greenHead">
					<dl>
						<dt>���빮�����������������Ϳ�����</dt>
						<dd>
							���빮�� ���� �������ýü� �Ǵ� ��ü�� ������� ���� ����, ���� ���Ƹ�, ȸ�� ���� ���� ������ �����մϴ�.
						</dd>
					</dl>
				</div>
				<div class="__tit1 __mt50">
					<h3>����ü� �ȳ� </h3>
				</div>

				<table class="__tbl type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">����</th>
							<th scope="col">���</th>
							<th scope="col" width="300px">�ü� ��Ȳ</th>
							<th scope="col" width="250px">���</th>
							<th scope="col" width="200px">������ɽð�</th>
							<th scope="col">���ǻ���</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>��ʸ���</td>
							<td>B1F ��Ƽ��������� ��</td>
<!--							<td>2�ο� ���� å�� 23��, ���� 46��, ����ũ 2��<br>�߰�����û: ����������</td>-->
                            <td>å�� 23��, ���� 45��, ����ũ 2��<br>�߰�����û: ����������</td>
<!--							<td rowspan="2">���빮�� ����� ����ȸ,<br>���빮�� �����, ���Ƶ��Ƹ� </td>-->
                            <td rowspan="2">���빮�� ����� ����ȸ,<br>���빮�� �����, ���Ƶ��Ƹ� ��</td>
<!--							<td rowspan="2">ȭ~�� ���� : 10:00~12:00<BR>ȭ~�� ���� : 12:00~17:00</td>-->
                            <td rowspan="2">ȭ~�� ���� : 09:30~11:30<BR>ȭ~�� ���� : 13:30~17:30</td>
							<td>��  02) 2237-5800</td>
						</tr>
						<tr>
							<td>������</td>
							<td>3F ����Ű����</td>
<!--							<td>���� 29��, ����ũ 2��<br>�߰�����û : ����������</td>-->
                            <td>���� 25��, ����ũ 2��<br>�߰�����û : ����������</td>
							<td>��  02) 923-2272</td>
						</tr>
						
						
					</tbody>
				</table>
				
				<ul class="__dotlist dang __orange __txt15 __mt20">
					<li>���� ��� �� ������ ���� ����ϰ� �ð��� ���� �� �� �ֽ��ϴ�.</li>
					<li>������ ���� ���̾� ����� ���Ͻô� ��� ����/���� ��� ��� ��û�� �մϴ�. </li>
                    <li>������� �������θ� ���� �� ��� ��û �����մϴ�. </li>
				</ul>

				<!--<div class="__tit1 __mt50">
					<h3>������ </h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>
						��ʸ��� B1��Ƽ���� �����, ���빮������������������ ������ 3�� ����Ű���� 
					</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>�ü���Ȳ</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>2�ο� ����å�� : 25��, ���� 60��, ����ũ 2��</li>
					<li>�߰�����û : ����������</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>������</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>���빮�� ����� ����ȸ, ���빮�� ���� �����, ���Ƶ��Ƹ�(10�� �̻�) </li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>������ɽð�</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>ȭ~�� ���� : 10:00~12:00 </li>
					<li>ȭ~�� ���� : 12:00~17:00 </li>
				</ul>
				<ul class="__dotlist dang __orange __txt15">
					<li>���� ��� �� ������ ���� ����ϰ� �ð��� ���� �� �� �ֽ��ϴ�.</li>
					<li>������ ���� ���̾� ����� ���Ͻô� ��� ����/���� ��� ��� ��û�� �մϴ�. </li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>������</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>��û�Ⱓ : ����� �ִ� 30���� ~ �ּ� 2���� </li>
					<li>�����û �� ����ڿ��� �뺸�մϴ�. (�� ��ʸ��� 02-2237-5800, ������ 02-923-2272) </li>
				</ul>-->

				<div class="__caution __mt30">
					<h3>��� �� ���ǻ��� </h3>
					<ul class="__dotlist __txt15 __mt15">
						<!--<li>���������� ���� �� �ʿ��� ������(��Ʈ��, ������������) ���� �̿��ڰ� �غ��մϴ�. </li>
						<li>���� ��û���� ���� ��⿡ ���� ����� ���� �� �����մϴ�. </li>
						<li>��� �� �߻��ϴ� �⹰�ļ� �� �սǿ� ���ؼ��� ��� �̿��ڰ� å�����ϴ�. </li>
						<li>���� �� ��۱��, �ÿ¼���, �ó������ ������ �� ������ ���մϴ�. </li>
						<li>��Ƽ���� �����, ����Ű���� �� ���� ���Ϸ���, �ڷ���� ������ ���մϴ�. </li>
						<li>��� �� �������� �� ������ ������ �մϴ�. </li>
						<li>��� �� �ش����� �繫�Ƿ� ��������� �뺸�մϴ�. </li>
						<li>��� ��� �ÿ��� �ݵ�� ���ͷ� ��ȭ ���� �ٶ��ϴ�. </li>
						<li>�ش� ������ �ִ� 3�������� ��û �����մϴ�. </li>
						<li>����Ϸ� 30�� �� ~ 3�� ������ ��û �����մϴ�. </li>
						<li style="font-weight: bold; color: #ff0000; text-decoration: underline;">����ǿ��� CCTV�� ��ġ�Ǿ� ������, ��� ��ȭ �� ������ �����մϴ�. </li>-->
						<li>����Ϸ� 30�� �� ~ 3�� ������ �ִ� 3�������� ��û �����մϴ�.</li>
						<li>��� ��� �ÿ��� �ݵ�� ���ͷ� ��ȭ ���� �ٶ��ϴ�.</li>
						<li>���������� ���� �� �ʿ��� ������(��Ʈ��,������������)���� ��� �̿��ڰ� �غ��մϴ�.</li>
						<li>��� �� �߻��ϴ� �⹰�ļ� �� �սǿ� ���ؼ��� ��� �̿��ڰ� å�����ϴ�.</li>
						<li>������� �������� �� ������ ���� �� ����ؾ��ϸ�, �ش����� �繫�Ƿ� ��������� �뺸�մϴ�.</li>
						<li>������ ��� �Ұ��� ���� �Һ� ���� ��Ź�帳�ϴ�.</li>
					</ul>
				</div>

				<!--<div class="__tit1 __mt50">
					<h3>���ǻ���</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li> ��  02) 2237-5800 ��ʸ��� ��� ����� </li>
					<li> ��  02) 923-2272 ������ ��� ����� </li>
				</ul>-->

				<form name='rentForm'>
					<div class="__apprAgree __mt80">
						<!--<label><input type="checkbox" name="agree1" />
						���� ���빮�������������������� ��� �ȳ����׿� ���� ���� ������ �ؼ��ϰ� ���뿡 �����մϴ�. </label>-->
						<label><input type="checkbox" name="agree1" />
						����ǿ��� CCTV�� ��ġ�Ǿ� �����Ƿ� ��� ��ȭ �� ������ ����Ǹ�, ���� ���빮�������������������� ��� �ȳ����׿� ���� ���� ������ �ؼ��ϰ� ���뿡 �����մϴ�.</label>
					</div>
				</form>

				<div class="__botArea">
					<div class="cen">
						<a href="#none" class="__btn3 __m-w100p" onclick='move1();'>��ʸ��� ��� ��û�ϱ�</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move2();'>������ ��� ��û�ϱ�</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>



</body>
</html>