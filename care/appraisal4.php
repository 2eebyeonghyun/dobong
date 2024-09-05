<?
$pno = "020304";
?>
<?
$_dep = array(2,1,4);
$_tit = array('보육지원','평가제','컨설팅 사업');
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
			alert('안내사항에 동의하셔야 합니다.');
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
				<h2><img src="../images/icon/appraisal.gif">평가제</h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>평가제 안내</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>평가제 운영체계</span></a>
					<a href="<?=DIR?>/care/appraisal3.php"><span>관련자료실</span></a>
					<a href="<?=DIR?>/care/appraisal4.php" class="active"><span>컨설팅 사업</span></a>
				</div>

				<div class="__tit1">
					<h3>컨설팅 방법</h3>
				</div>
				<table class="__tbl fix type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">직접 컨설팅</th>
							<th scope="col">간접컨설팅</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<ul class="__dotlist" style="display:inline-block;">
									<li>어린이집 방문 컨설팅 : 해당 어린이집을 방문하여 컨설팅</li>
								</ul>
							</td>
							<td >
								<ul class="__dotlist" style="display:inline-block;">
									<li>온라인 또는 전화 상담</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="__tit1 __mt50">
					<h3>컨설팅 진행 방법</h3>
				</div>
				<div class="tac __mt50"><img src="<?=DIR?>/images/appr4-1.jpg" alt="" /></div>

<form name='rentForm'>
				<div class="__apprAgree __mt80">
					<label><input type="checkbox" name="agree" /> 위의 동대문구육아종합지원센터 평가제 컨설팅 안내를 확인하고 내용에 동의합니다.</label>
				</div>
</form>

				<div class="__botArea">
					<div class="cen">
						<a href="javascript:move();" class="__btn3">평가제 컨설팅 신청하기</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>