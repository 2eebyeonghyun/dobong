<?
$_dep = array(2,9,3);
$_tit = array('보육지원','서울형 모아어린이집','우리동네 생태지도');
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
				<h2><img src="../images/icon/sub_ico_renew2.png">생태친화보육ㆍ서울형 모아어린이집</h2>
			</div>
			<div id="content">
				
				

				<div class="__tab3">
<!--
					<a href="<?=DIR?>/care/eco1.php"><span>생태친화보육</span></a>
					<a href="<?=DIR?>/care/eco2.php"><span>생태친화어린이집</span></a>
-->
					<a href="<?=DIR?>/care/eco4.php"><span>서울형 모아어린이집</span></a>
					<a href="<?=DIR?>/care/eco3.php" class="active"><span>우리동네 생태지도</span></a>
				</div>

				
				<div class="tac __mt50">
					<img src="<?=DIR?>/images/eco3_211029.jpg" alt="">
				</div>




				





			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>