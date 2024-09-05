<?
$_dep = array(2,9,2);
$_tit = array('보육지원','서울형 모아어린이집','생태친화어린이집');
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
					<a href="<?=DIR?>/care/eco2.php" class="active"><span>생태친화어린이집</span></a>
-->
					<a href="<?=DIR?>/care/eco4.php"><span>서울형 모아어린이집</span></a>
					<a href="<?=DIR?>/care/eco3.php"><span>우리동네 생태지도</span></a>
				</div>

				
				<div class="__greenHead">
					<dl>
						<dt>생태친화어린이집이란?</dt>
						<dd>
							생태친화보육을 운영하는 어린이집으로 시간과 공간에 제약을 두지 않고 아이 스스로 놀이를 주도해 놀이 속에서 다양한 경험을 할 수 있습니다.
						</dd>
					</dl>
				</div>


				<div class="tac __mt50">
					<img src="<?=DIR?>/images/eco2.gif" alt="">
				</div>




				<div class="__tit1 __mt50">
					<h3>세부내용</h3>
				</div>

				<div class="__txt17 __bora fwn __mt20">생태친화어린이집 지원(거점어린이집)</div>
				<ul class="__dotlist __txt15 __mt10">
					<li>생태친화어린이집 컨설팅</li>
					<li>원장세미나</li>
					<li>교사교육</li>
					<li>부모교육</li>
				</ul>


				<div class="__txt17 __bora fwn __mt40">생태친화어린이집 확산(비거점어린이집)</div>
				<ul class="__dotlist __txt15 __mt10">
					<li>생태친화보육 전문컨설팅 지원</li>
					<li>디딤돌공동체(교사연구모임)</li>
					<li>교사교육</li>
					<li>부모교육</li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>동대문구 거점어린이집 현황</h3>
				</div>

<table class="__tbl fix type2 __mt10">
					<caption>TABLE</caption>
					<colgroup class="__p">
						<col style="width:70px;">
						<col>
						<col>
						<col>
						<col>
					</colgroup>
					<colgroup class="__m">
						<col style="width:40px;">
						<col>
						<col>
						<col>
						<col>
					</colgroup>
					<thead>
						<tr>
							<th scope="col">번호</th>
							<th scope="col">어린이집명</th>
							<th scope="col">유형</th>
							<th scope="col">연락처</th>
							<th scope="col">주소</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td >미드카운티어린이집</td>
							<td>국공립</td>
							<td>02-6713-1410</td>
							<td>동대문구 답십리로 141</td>
						</tr>
						<tr>
							<td>2</td>
							<td >이문어린이집</td>
							<td>국공립</td>
							<td>02-969-2052</td>
							<td>동대문구 신이문로 9</td>
						</tr>
						<tr>
							<td>3</td>
							<td >청솔어린이집</td>
							<td>국공립</td>
							<td>02-3394-5026</td>
							<td>동대문구 전농로10길 20</td>
						</tr>
						<tr>
							<td>4</td>
							<td >함께행복한어린이집</td>
							<td>가정</td>
							<td>02-925-5123</td>
							<td>동대문구 제기동 왕산로23길 89</td>
						</tr>
						<tr>
							<td>5</td>
							<td >해찬어린이집</td>
							<td>민간</td>
							<td>02-6451-7942</td>
							<td>동대문구 한천로 248 2단지 관리동</td>
						</tr>

						
					</tbody>
				</table>






			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>