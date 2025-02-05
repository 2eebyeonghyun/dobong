<?
$_dep = array(3,1,5);
$_tit = array('양육지원','장난감대여사업','휘경점 이용안내');
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
				<h2><img src="../images/icon/toy.gif">장난감대여사업</h2>
			</div>
			<div id="content">			
			
			<? include_once '../inc/tab3.php'; ?>
				

				<div class="tac"><img src="<?=DIR?>/images/floor-dab.jpg" alt=""></div>

				<div class="__tit1 __mt50">
					<h3>이용대상</h3>
				</div>

				<div class="__txt17 __blue fwn">
					[개인회원]
				</div>
				<ul class="__dotlist __txt15 __mt5">
					<li>서울시거주 만 5세 이하의 영유아를 둔 부모, 위탁모, 예비부모 및 임신을 계획 중인 부모, 조부모</li>
				</ul>

				<div class="__txt17 __blue __mt20 fwn">
					[기관회원]
				</div>
				<ul class="__dotlist __txt15 __mt5">
					<li>동대문구소재 어린이집 및 보육교직원</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>이용시간</h3>
				</div>
				<ul class="__dotlist __txt15">
<!--
					<li>화요일 ~ 토요일 : 10:00 ~ 18:00</li>
					<li>목요일 : 20:00까지 연장 운영</li>
					<li>휴관일 : 월요일 / 일요일 / 공휴일</li>
-->
                    <li>화요일 ~ 토요일 : 10:00 ~ 18:00</li>
					<li><span class="__orange">환경정비시간 12:00 ~ 13:00 이용불가</span></li>
					<li>휴관일 : 월요일, 일요일, 법정 공휴일 (반납 및 대여불가)</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>이용방법</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>장난감 대여시 <span class="__orange">실물회원카드 또는 모바일회원카드를 반드시 지참</span>해야 합니다. 장난감의 <span class="__orange">바코드</span>가 손상되지 않도록 사용해주세요.</li>
					<li>대여: 실물회원카드 또는 모바일회원카드 지참 후 2층 장난감방 이용 (가족 당 한 명에게만 모바일 카드발급)
</li>
				</ul>

				<table class="__tbl type2 fix __mt15">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">1회당</th>
							<th scope="col">장난감</th>
							<th scope="col">도서</th>
							<th scope="col">대여일수(최대)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>개인회원</td>
							<td>2점</td>
							<td>3권</td>
							<td>7일(14일)</td>
						</tr>
						<tr>
							<td>기관회원</td>
							<td>5점</td>
							<td>5권</td>
							<td>7일(14일)</td>
						</tr>
						<tr>
							<td>학생회원</td>
							<td>대여불가</td>
							<td>5권</td>
							<td>7일(14일)</td>
						</tr>
					</tbody>
				</table>

<!--
				<ul class="__dotlist dang __txt14 __orange __mt15">
					<li>회원카드 재발급 : 3회 초과(개인 부주의, 파손, 분실)시 수수료 1,000원 발생 </li>
				</ul>
-->

				<div class="__tit1 __mt50">
					<h3>연체료</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>장난감연체 : 장난감 구입가격의 1% x 연체일수</li>
					<li>(센터홈페이지 ⇒ 로그인 ⇒ 마이페이지 ⇒ 대여리스트에서 확인가능)</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>장난감파손 및 분실로 인한 변상 </h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>변상 : 동일한 부속품 또는 동일한 장난감(2주 이내)</li>
					<li>변상금납부 : 단종 등에 의한 구입불가의 경우 기준에 의한 변상금납부</li>
				</ul>

				<table class="__tbl type2 fix __mt15">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">1년이내 구입품</th>
							<th scope="col">1년이후~2년이내 구입품</th>
							<th scope="col">2년이후~3년이내 구입품</th>
							<th scope="col">3년이후 구입품</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>구매가격의 80%</td>
							<td>구매가격의 50%</td>
							<td>구매가격의 30%</td>
							<td>구매가격의 10%</td>
						</tr>
					</tbody>
				</table>

				<ul class="__dotlist dang __txt14 __orange __mt15">
					<li>구매가격 : 홈페이지 장난감명에 공지 </li>
				</ul>

				<ul class="__dotlist __txt15 __mt20">
					<li>장난감비닐 분실 : 비닐 구매가격 500원 현금납부(2주 이내 반납 시 반환) </li>
				</ul>

				<div class="__caution __mt20">
					<h3>유의사항</h3>
					<ul class="__dotlist __txt15 __mt15">
						<li>장난감의 고장, 파손, 분실(제6조 1항) 또는 구성물 분실(제6조 3항)에 따라 2주의 유예기간 이후부터 최대 한 달 까지 변상 또는 구성물이 반납되지 않는 경우, 대여서비스이용 제한 및 센터에서 진행되는 교육 및 프로그램 참여가 제한 될 수 있습니다.  </li>
						<li>대여 물품의 파손 및 구성물 미반납이 3회(누적 기록) 초과 시, 대여서비스이용이 제한 될 수 있습니다. </li>
					</ul>
				</div>

				<div class="__tit1 __mt50">
					<h3>장난감 온라인 예약</h3>
				</div>
				<div class="tac">
					<img src="<?=DIR?>/images/dab-process.gif" class="__p" alt="">
					<img src="<?=DIR?>/images/dab-process-m.gif" class="__m" alt="">
				</div>

				<div class="__tit1 __mt50">
					<h3>회원구분</h3>
				</div>
				<table class="__tbl type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">구분</th>
							<th scope="col">대상</th>
							<th scope="col">구비서류</th>
							<th scope="col">연회비</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td rowspan="11">
								개인<br class="__m">회원
							</td>
							<td>
								부모
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본(자녀포함)</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
						<tr>
							<td>
								조부모
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>조부모 신분증</li>
									<li>조부모 주민등록등본</li>
									<li>손자녀 주민등록등본</li>
									<li>직계자녀 가족관계증명서(손자녀포함)</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
						<tr>
							<td>
								예비부모 및 임산부
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>임신확인 증빙서류(산모수첩, 진료확인서 등)</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
						<tr>
							<td>
								위탁모 가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>본인 신분증</li>
									<li>위탁모자원봉사 신청서</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
						<tr>
							<td>
								다자녀가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>다둥이 행복카드</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								장애인가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>장애인 복지카드</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								한부모가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>한부모가족증명서</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								차상위계층가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>차상위계층증빙서류</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								기초생활수급가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>주민등록등본</li>
									<li>생계, 의료급여수급자 증명서</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								우수자원봉사자 가정
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>신분증</li>
									<li>주민등록등본</li>
									<li>가족관계증명서</li>
									<li>우수자원봉사자증</li>
								</ul>
							</td>
							<td>
								면제
							</td>
						</tr>
						<tr>
							<td>
								관내 보육교직원
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>부모 신분증</li>
									<li>재직증명서</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
						<tr>
							<td>
								기관<br class="__m">회원
							</td>
							<td>
								관내 어린이집
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>고유번호증 또는 어린이집 인가증</li>
								</ul>
							</td>
							<td>
								20,000원
							</td>
						</tr>
						<tr>
							<td>
								학생<br class="__m">회원
							</td>
							<td>
								보육관련학과 대학생
							</td>
							<td class="tal">
								<ul class="__dotlist">
									<li>본인 신분증</li>
									<li>학생증 또는 재학증명서</li>
								</ul>
							</td>
							<td>
								10,000원
							</td>
						</tr>
					</tbody>
				</table>

				<ul class="__dotlist dang __txt14 __orange __mt15">
					<li>등본상에 자녀가 등재된 서울 시민에 한함.(최근1개월 이내)</li>
					<li>위임하고자 할 경우 위임동의서 작성 후 제출.
					<a href="<?=DIR?>/images/위임동의서.hwp"><p class="ico"><span class="__ico2 orange">위임동의서 다운로드</span></p></a></li>
				</ul>

				<div class="__caution __mt20">
					<h3>유의사항</h3>
					<ul class="__dotlist __txt15 __mt15">
						<li>도서 및 장난감 대여시 회원카드를 반드시 지참해야 합니다.</li>
						<li>장난감의 바코드가 손상되지 않도록 사용해주세요.</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>