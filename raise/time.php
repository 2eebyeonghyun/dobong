<?
$_dep = array(3,4,1);
$_tit = array('��������','�ð�������','�ð���������');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/time.gif">�ð�������</h2>
			</div>
			<div id="content">
	<div class="__tab3">
					<a href="<?=DIR?>/raise/time.php" class="active"><span>�ð���������</span></a>
					<a href="<?=DIR?>/raise/time2.php"><span>�ð��������ȳ� �� ��û</span></a>
					<a href="<?=DIR?>/raise/time3.php"><span>������ȹ��</span></a>
				</div>
				
				
				<div class="tac"><img src="<?=DIR?>/images/association-head7.jpg" alt=""></div>
				
				<div class="__tit1 __mt50">
					<h3>�ð���������</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>�θ��� ������ �������� ���� ������ �ʿ��� ��� �ϰ� �ñ� �� �ִ� �ູ�� �����Դϴ�. �̿�ȳ����� ��ð� �� ����� Ȯ���Ͻð� �̿����ּ���. </li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>�̿��� </h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>6����~36���� �̸� ����</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>�̿�ð�</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>���� 9:00~18:00 (�ָ� �� �������� ����)</li>
				</ul>

				<!--<div class="__tit1 __mt50">
					<h3>������</h3>
				</div>
				<div class="__timeImg">
					<div class="box">
						<div class="in">
							<div class="img"><img src="<?=DIR?>/images/time1-1.jpg" alt=""></div>
							<div class="txt">
								��ʸ��� 1�� ��Ƽ���� ���̹� 
							</div>
						</div>
					</div>
					<div class="box">
						<div class="in">
							<div class="img"><img src="<?=DIR?>/images/time1-2.jpg" alt=""></div>
							<div class="txt">
								������ 1�� �ð��������� 
							</div>
						</div>
					</div>
				</div>-->

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>