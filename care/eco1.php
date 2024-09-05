<?
$_dep = array(2,9,1);
$_tit = array('보육지원','서울형 모아어린이집','생태친화보육');
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
					<img src="../images/icon/sub_ico_renew2.png">서울형 모아어린이집
				</h2>
			</div>
			<div id="content">
				
				

				<div class="__tab3">
<!--
					<a href="<?=DIR?>/care/eco1.php" class="active"><span>생태친화보육</span></a>
					<a href="<?=DIR?>/care/eco2.php"><span>생태친화어린이집</span></a>
-->
					<a href="<?=DIR?>/care/eco4.php"><span>서울형 모아어린이집</span></a>
					<a href="<?=DIR?>/care/eco3.php"><span>우리동네 생태지도</span></a>
				</div>
				
				<div class="__greenHead">
					<dl>
						<dt>동대문구육아종합지원센터에서는</dt>
						<dd>
							생태친화보육사업을 통해 아이들에게 자연·놀이·아이다움을 주고자 합니다.
						</dd>
					</dl>
				</div>

				<div class="__tit1 __mt50">
					<h3>생태친화보육이란?</h3>
				</div>

				<ul class="__dotlist2 __txt15">
					<li>단순한 생태 관련 활동에서 끝나는 것이 아니라 보육과정, 보육환경 전체를 살펴보는 과정을 통해 아이들 삶 전반의 변화를 꾀하고자 합니다.</li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>생태친화보육 방향</h3>
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