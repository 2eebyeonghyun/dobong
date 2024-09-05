<?
$_dep = array(3,4,2);
$_tit = array('양육지원','시간제보육','시간제보육안내 및 신청');
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
					<a href="<?=DIR?>/raise/time.php" ><span>시간제보육실</span></a>
					<a href="<?=DIR?>/raise/time2.php" class="active"><span>시간제보육안내 및 신청</span></a>
					<a href="<?=DIR?>/raise/time3.php"><span>보육계획안</span></a>
				</div>

				<div class="__tit1 __mt50">
					<h3>시간제보육안내 및 신청</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>가정양육 시에도 지정된 제공기관에서 시간단위로 보육서비스를 이용하고, 이용한 시간만큼 보육료를 지불하는 보육서비스 </li>
				</ul>
				
				
				<div class="__tit1 __mt50">
					<h3>이용정보</h3>
				</div>

				<table class="__tbl type2">
					<tbody>
						<tr>
							<th scope="row" colspan="2">구분</th>
							<td><span class="big">시간제 보육</span></td>
						</tr>
						<tr>
							<th scope="row" colspan="2">대상연령</th>
							<td>6개월~36개월 미만 영아</td>
						</tr>
						<tr>
							<th scope="row" colspan="2">이용시간</th>
							<td>평일 09:00~18:00</td>
						</tr>
						<tr>
							<th scope="row" colspan="2">지원시간</th>
							<td>월 60시간</td>
						</tr>
						<tr>
							<th scope="row" rowspan="3">보육료</th>
							<th>이용단가</th>
							<td>시간당 5천원</td>
						</tr>
						<tr>
							<th>지원단가</th>
							<td>시간당 3천원</td>
						</tr>
						<tr>
							<th>본인부담</th>
							<td>시간당 2천원</td>
						</tr>
					</tbody>
				</table>
				<ul class="__dotlist __txt15 __mt10">
					<li>보육료 또는 유아학비를 지원받는 아동이 시간제보육반을 이용할 경우 전액 본인부담 </li>

				</ul>

				<div class="__tit1 __mt50">
					<h3>이용시 유의사항</h3>
				</div>
<!--
				<ul class="__dotlist __txt15">
					<li>
						<span class="__orange">사전 연락 및 예약시간을 조정하지 않고 이용시간이 초과한 경우</span><br>
						: 당월 누적 벌점이 -7점일 경우, 당월 사전예약 취소 및 당월 온라인 예약 불가 (단, 당일 전화예약은 가능하며 전액 본인부담)
					</li>
				</ul>
-->
               
                <p class="__txt15" style="margin-top:10px; text-align:center;">
                    <예약취소 및 변경에 따른 벌점부과 기준>
                        </p>
                <table class="__tbl fix type2 __mt10">
                    <caption>TABLE</caption>
                    <thead>
                        <tr>
                            <th scope="col" colspan="4">이용당일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>예약시간 전</td>
                            <td>예약시간 내</td>
                            <td>미이용</td>
                            <td>초과이용</td>
                        </tr>
                        <tr>
                            <td>1점</td>
                            <td>2점</td>
                            <td>3점</td>
                            <td>4점</td>
                        </tr>
                    </tbody>
                </table>
                <p class="__txt15">※ 벌점제는 독립반과 통합반 합산되어 운영</p>
                <p class="__txt15">※ 벌점 7점 이상일 경우, 당월 예약내역 취소 및 예약불가&middot;바우처 지원 제한(당월 벌점 이월되지 않음)</p>


				<div class="__tit1 __mt50">
					<h3>결제방법</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>아이행복카드로 이용 시 마다 결제 (현금결제 시 전액 본인부담)</li>
					<li>아이행복카드 사전발급 필수 (기존 아이사랑카드, 국민행복카드 사용 가능) </li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>이용방법</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>온라인 신청 및 전화신청 (☎1661-9361)  </li>
					<li>최초 이용 시 임신육아종합포털 아이사랑에서 시간제보육 아동등록 완료 필수 </li>
                    <li>사전 예약 시 온라인에서 1~14일 전까지 예약 가능하며, 당일 예약일 경우 전화신청12시까지 가능</li>
					<li>처음 이용할 경우 아이 적응을 고려하여 1-2시간 이내로 예약 권장</li>
				</ul>

<!--
                <ul class="__dotlist ">
                   <li></li>
               </ul>
-->
               

				<div class="__tit1 __mt50">
					<h3>제출서류</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>시간제보육 이용신청서 및 운영규정서약서</li>
					<li>시간제보육 아동등록 및 이용 관련 개인정보 동의</li>
					<li>가족관계증명서 및 신분증 (가족관계 및 본인확인 후 반환)</li>
				</ul>


				<div class="__tit1 __mt50">
					<h3>개인준비물</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>
						간식, 기저귀, 여벌옷, 개별침구, 물티슈 등<br>
						※ 시간제보육 제공기관에서 급·간식은 별도로 제공되지 않습니다.
					</li>
				</ul>

				<div class="__mt50 tac">
					<a href="http://www.childcare.go.kr/" target="_blank" class="__btn4">임신육아종합포털 아이사랑 신청 바로가기 </a>
				</div>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>