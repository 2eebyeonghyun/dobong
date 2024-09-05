<?
$pno = "020207";
//$view_url = "notice_view.php";
?>
<?
$_dep = array(2,7);
$_tit = array('보육지원','대관신청');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
</head>
<script type="text/JavaScript">
	//답십리
	function move1(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="borrow_schedule.php?pno=020207&mode=list2";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree1.focus();
	    }
	}
	//제기점
	function move2(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="borrow_schedule2.php?pno=020207&mode=list3";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree1.focus();
	    }
	}
	function move3(){
		if(document.rentForm.agree2.checked == true)
	    {
			location.href="../sub/index.php?pno=020207&mode=list4&scd=01";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
	function move4(){
		if(document.rentForm.agree2.checked == true)
	    {
			location.href="../sub/index.php?pno=020207&mode=list4&scd=02";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
</script>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/borrow.gif">대관신청</h2>
			</div>
			<div id="content">
<!--
				<div class="__tab3">
					<a href="<?=DIR?>/care/borrow_schedule.html" class="active"><span>답십리점 대관 신청하기</span></a>
					<a href="<?=DIR?>/care/borrow_schedule.html"><span>제기점 대관 신청하기</span></a>
				</div>
-->
				<div class="__greenHead">
					<dl>
						<dt>동대문구육아종합지원센터에서는</dt>
						<dd>
							동대문구 관내 보육관련시설 또는 단체를 대상으로 교사 교육, 육아 동아리, 회의 등을 위한 공간을 지원합니다.
						</dd>
					</dl>
				</div>
				<div class="__tit1 __mt50">
					<h3>대관시설 안내 </h3>
				</div>

				<table class="__tbl type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">지점</th>
							<th scope="col">장소</th>
							<th scope="col" width="300px">시설 현황</th>
							<th scope="col" width="250px">대상</th>
							<th scope="col" width="200px">대관가능시간</th>
							<th scope="col">문의사항</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>답십리점</td>
							<td>B1F 느티나무배움터 Ⅰ</td>
<!--							<td>2인용 강의 책상 23개, 의자 46개, 마이크 2대<br>추가사용신청: 빔프로젝터</td>-->
                            <td>책상 23개, 의자 45개, 마이크 2대<br>추가사용신청: 빔프로젝터</td>
<!--							<td rowspan="2">동대문구 어린이집 연합회,<br>동대문구 어린이집, 육아동아리 </td>-->
                            <td rowspan="2">동대문구 어린이집 연합회,<br>동대문구 어린이집, 육아동아리 등</td>
<!--							<td rowspan="2">화~금 오전 : 10:00~12:00<BR>화~금 오후 : 12:00~17:00</td>-->
                            <td rowspan="2">화~금 오전 : 09:30~11:30<BR>화~금 오후 : 13:30~17:30</td>
							<td>☎  02) 2237-5800</td>
						</tr>
						<tr>
							<td>제기점</td>
							<td>3F 생각키움터</td>
<!--							<td>의자 29개, 마이크 2대<br>추가사용신청 : 빔프로젝터</td>-->
                            <td>의자 25개, 마이크 2대<br>추가사용신청 : 빔프로젝터</td>
							<td>☎  02) 923-2272</td>
						</tr>
						
						
					</tbody>
				</table>
				
				<ul class="__dotlist dang __orange __txt15 __mt20">
					<li>센터 행사 및 사정에 따라 대관일과 시간은 제한 될 수 있습니다.</li>
					<li>오전과 오후 연이어 대관을 원하시는 경우 오전/오후 모두 대관 신청을 합니다. </li>
                    <li>토요일은 유선으로만 문의 및 대관 신청 가능합니다. </li>
				</ul>

				<!--<div class="__tit1 __mt50">
					<h3>대관장소 </h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>
						답십리점 B1느티나무 배움터, 동대문구육아종합지원센터 제기점 3층 생각키움터 
					</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>시설현황</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>2인용 강의책상 : 25개, 의자 60개, 마이크 2대</li>
					<li>추가사용신청 : 빔프로젝터</li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>대관대상</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>동대문구 어린이집 연합회, 동대문구 관내 어린이집, 육아동아리(10인 이상) </li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>대관가능시간</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>화~금 오전 : 10:00~12:00 </li>
					<li>화~금 오후 : 12:00~17:00 </li>
				</ul>
				<ul class="__dotlist dang __orange __txt15">
					<li>센터 행사 및 사정에 따라 대관일과 시간은 제한 될 수 있습니다.</li>
					<li>오전과 오후 연이어 대관을 원하시는 경우 오전/오후 모두 대관 신청을 합니다. </li>
				</ul>

				<div class="__tit1 __mt50">
					<h3>대관방법</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li>신청기간 : 대관일 최대 30일전 ~ 최소 2일전 </li>
					<li>대관신청 후 담당자에게 통보합니다. (☎ 답십리점 02-2237-5800, 제기점 02-923-2272) </li>
				</ul>-->

				<div class="__caution __mt30">
					<h3>대관 시 주의사항 </h3>
					<ul class="__dotlist __txt15 __mt15">
						<!--<li>빔프로젝터 연결 시 필요한 기자재(노트북, 레이저포인터) 등은 이용자가 준비합니다. </li>
						<li>사전 요청되지 않은 기기에 대한 사용은 협의 후 결정합니다. </li>
						<li>대관 시 발생하는 기물파손 및 손실에 대해서는 대관 이용자가 책임집니다. </li>
						<li>영상 · 방송기기, 냉온수기, 냉난방기기는 관계자 외 조작을 금합니다. </li>
						<li>느티나무 배움터, 생각키움터 외 기계실 보일러실, 자료실의 출입을 금합니다. </li>
						<li>대관 후 정리정돈 및 쓰레기 정리를 합니다. </li>
						<li>대관 후 해당지점 사무실로 대관마감을 통보합니다. </li>
						<li>대관 취소 시에는 반드시 센터로 전화 연락 바랍니다. </li>
						<li>해당 월에는 최대 3개까지만 신청 가능합니다. </li>
						<li>대관일로 30일 전 ~ 3일 전까지 신청 가능합니다. </li>
						<li style="font-weight: bold; color: #ff0000; text-decoration: underline;">대관실에는 CCTV가 설치되어 있으며, 상시 녹화 및 열람에 동의합니다. </li>-->
						<li>대관일로 30일 전 ~ 3일 전까지 최대 3개까지만 신청 가능합니다.</li>
						<li>대관 취소 시에는 반드시 센터로 전화 연락 바랍니다.</li>
						<li>빔프로젝터 연결 시 필요한 기자재(노트북,레이저포인터)등은 대관 이용자가 준비합니다.</li>
						<li>대관 시 발생하는 기물파손 및 손실에 대해서는 대관 이용자가 책임집니다.</li>
						<li>대관실은 정리정돈 및 쓰레기 정리 후 퇴실해야하며, 해당지점 사무실로 대관마감을 통보합니다.</li>
						<li>종이컵 사용 불가로 개인 텀블러 지참 부탁드립니다.</li>
					</ul>
				</div>

				<!--<div class="__tit1 __mt50">
					<h3>문의사항</h3>
				</div>
				<ul class="__dotlist __txt15">
					<li> ☎  02) 2237-5800 답십리점 대관 담당자 </li>
					<li> ☎  02) 923-2272 제기점 대관 담당자 </li>
				</ul>-->

				<form name='rentForm'>
					<div class="__apprAgree __mt80">
						<!--<label><input type="checkbox" name="agree1" />
						위의 동대문구육아종합지원센터의 대관 안내사항에 따라 관련 규정을 준수하고 내용에 동의합니다. </label>-->
						<label><input type="checkbox" name="agree1" />
						대관실에는 CCTV가 설치되어 있으므로 상시 녹화 및 열람이 진행되며, 위의 동대문구육아종합지원센터의 대관 안내사항에 따라 관련 규정을 준수하고 내용에 동의합니다.</label>
					</div>
				</form>

				<div class="__botArea">
					<div class="cen">
						<a href="#none" class="__btn3 __m-w100p" onclick='move1();'>답십리점 대관 신청하기</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move2();'>제기점 대관 신청하기</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>



</body>
</html>