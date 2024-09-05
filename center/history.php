<?
$_dep = array(1,2);
$_tit = array('센터소개','설립목적 및 연혁');
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
			<div id="tit">
				<h2><img src="../images/icon/history.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">
				<div class="__headSlogan">
					<h3>
						<strong class="__green">동대문구육아종합지원센터</strong>의 설립목적은
					</h3>
					<p>
						동대문구가 설치 · 지원하고 경희대학교가 운영하는 기관입니다.<br>
						동대문구의 영유아, 부모, 보육교직원에게 전문적인 보육서비스 및 다양한 육아프로그램을 제공하여 질 높은 보육 · 육아 환경을 조성하고자 합니다.
					</p>
				</div>

				<div class="__tit1">
					<h3>연혁</h3>
				</div>

				<div class="__history2" data-num="0">
					<div class="tab">
						<div class="roll _hisNav">
<?
	$num_ = -1;
	while($rs=@mysql_fetch_array($result)){
		$num_++;
?>
							<div class="year" data-num="<?=$num_?>"><a href="#none"><span><?=$rs['board_subject']?></span></a></div>
<?
	}
?>
						</div>
					</div>
					<div class="sec _hisFor">
<?
	@mysql_data_seek($result,0);
	while($rs=@mysql_fetch_array($result)){

		$sql02	= "SELECT board_email, board_content FROM ddm_board_history where board_subject = '".$rs['board_subject']."' order by board_email";
		$result02 = @mysql_query($sql02);
?>
						<div class="box">
							<h4><?=$rs['board_subject']?></h4>
							<div class="area" style="min-height: 50px;">
<?
		while($rs02=@mysql_fetch_array($result02)){
			$board_email = explode("-",$rs02['board_email']);
?>
								<dl>
									<dt><?=$board_email[0]?>월 <?=$board_email[1]?>일</dt>
									<dd><?=nl2br($rs02['board_content'])?></dd>
								</dl>
<?
		}
?>
							</div>
						</div>
<?
	}
?>
					</div>
				</div>
				<div class="sc_intro">
					<h3>경희대학교는</h3>
<!--
					<p>
						동대문구육아종합지원센터는 학교법인 경희학원이 동대문구청으로부터 위탁받아 운영하고 있습니다.
						<br>
						학교법인 경희학원은
					</p>
-->
                    <ul style="margin:15px 0; ">
                        <li>학원의 민주화, 사상의 민주화, 생활의 민주화를 교훈으로 삼아,
                        </li>
                        <li>아동·가족 전문가 양성을 목표로 동대문구 사회복지사업에 적극 참여하여 복지 향상을 위해 노력하며,
                        </li>
                        <li>학술의 지구적 실천, 대학의 공적 봉사를 통한 평화로운 인류사회 모색을 위해 노력하고 있습니다. </li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>

<script>
his.init();
</script>
</body>
</html>


