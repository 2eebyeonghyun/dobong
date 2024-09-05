<?
$_dep = array(3,4,1);
$_tit = array('양육지원','시간제보육','시간제보육실');
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
				<h2><img src="../images/icon/time.gif">시간제보육</h2>
			</div>
			<div id="content">
	<div class="__tab3">
					<a href="<?=DIR?>/raise/time.php" class="active"><span>시간제보육실</span></a>
					<a href="<?=DIR?>/raise/time2.php"><span>시간제보육안내 및 신청</span></a>
					<a href="<?=DIR?>/raise/time3.php"><span>보육계획안</span></a>
				</div>
				
				
				<div class="tac"><img src="<?=DIR?>/images/association-head7.jpg" alt=""></div>
				
				<div class="__tit1 __mt50">
					<h3>시간제보육은</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>부모의 개인적 사정으로 인해 보육이 필요한 경우 믿고 맡길 수 있는 행복한 공간입니다. 이용안내에서 운영시간 및 방법을 확인하시고 이용해주세요. </li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>이용대상 </h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>6개월~36개월 미만 영아</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>이용시간</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>평일 9:00~18:00 (주말 및 공휴일은 제외)</li>
				</ul>

				<!--<div class="__tit1 __mt50">
					<h3>보육실</h3>
				</div>
				<div class="__timeImg">
					<div class="box">
						<div class="in">
							<div class="img"><img src="<?=DIR?>/images/time1-1.jpg" alt=""></div>
							<div class="txt">
								답십리점 1층 느티나무 아이방 
							</div>
						</div>
					</div>
					<div class="box">
						<div class="in">
							<div class="img"><img src="<?=DIR?>/images/time1-2.jpg" alt=""></div>
							<div class="txt">
								제기점 1층 시간제보육실 
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