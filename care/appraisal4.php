<?
$pno = "020304";
?>
<?
$_dep = array(2,1,4);
$_tit = array('��������','����','������ ���');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<script type="text/JavaScript">
	function move(){
		if(document.rentForm.agree.checked == true)
	    {
			location.href="appraisal4_schedule.php?pno=020304&mode=list2";
	    }
		else
	    {
			alert('�ȳ����׿� �����ϼž� �մϴ�.');
			document.rentForm.agree.focus();
	    }
	   
	}
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/appraisal.gif">����</h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>���� �ȳ�</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>���� �ü��</span></a>
					<a href="<?=DIR?>/care/appraisal3.php"><span>�����ڷ��</span></a>
					<a href="<?=DIR?>/care/appraisal4.php" class="active"><span>������ ���</span></a>
				</div>

				<div class="__tit1">
					<h3>������ ���</h3>
				</div>
				<table class="__tbl fix type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">���� ������</th>
							<th scope="col">����������</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<ul class="__dotlist" style="display:inline-block;">
									<li>����� �湮 ������ : �ش� ������� �湮�Ͽ� ������</li>
								</ul>
							</td>
							<td >
								<ul class="__dotlist" style="display:inline-block;">
									<li>�¶��� �Ǵ� ��ȭ ���</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="__tit1 __mt50">
					<h3>������ ���� ���</h3>
				</div>
				<div class="tac __mt50"><img src="<?=DIR?>/images/appr4-1.jpg" alt="" /></div>

<form name='rentForm'>
				<div class="__apprAgree __mt80">
					<label><input type="checkbox" name="agree" /> ���� ���빮������������������ ���� ������ �ȳ��� Ȯ���ϰ� ���뿡 �����մϴ�.</label>
				</div>
</form>

				<div class="__botArea">
					<div class="cen">
						<a href="javascript:move();" class="__btn3">���� ������ ��û�ϱ�</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>