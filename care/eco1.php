<?
$_dep = array(2,9,1);
$_tit = array('��������','������ ��ƾ����','����ģȭ����');
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
				<h2>
					<!-- <img src="../images/icon/appraisal.gif"> -->
					<img src="../images/icon/sub_ico_renew2.png">������ ��ƾ����
				</h2>
			</div>
			<div id="content">
				
				

				<div class="__tab3">
<!--
					<a href="<?=DIR?>/care/eco1.php" class="active"><span>����ģȭ����</span></a>
					<a href="<?=DIR?>/care/eco2.php"><span>����ģȭ�����</span></a>
-->
					<a href="<?=DIR?>/care/eco4.php"><span>������ ��ƾ����</span></a>
					<a href="<?=DIR?>/care/eco3.php"><span>�츮���� ��������</span></a>
				</div>
				
				<div class="__greenHead">
					<dl>
						<dt>���빮�����������������Ϳ�����</dt>
						<dd>
							����ģȭ��������� ���� ���̵鿡�� �ڿ������̡����̴ٿ��� �ְ��� �մϴ�.
						</dd>
					</dl>
				</div>

				<div class="__tit1 __mt50">
					<h3>����ģȭ�����̶�?</h3>
				</div>

				<ul class="__dotlist2 __txt15">
					<li>�ܼ��� ���� ���� Ȱ������ ������ ���� �ƴ϶� ��������, ����ȯ�� ��ü�� ���캸�� ������ ���� ���̵� �� ������ ��ȭ�� ���ϰ��� �մϴ�.</li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>����ģȭ���� ����</h3>
				</div>


<div class="__mt50">
					<img src="<?=DIR?>/images/eco1.gif" alt="">
				</div>





			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>