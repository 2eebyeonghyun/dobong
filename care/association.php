<?
$_dep = array(2,8);
$_tit = array('보육지원','꿈자람공동육아방');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
</head>
<script type="text/JavaScript">
	//답십리
	function move(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule.php?pno=030105&mode=list4&scd=01";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree1.focus();
	    }
	}
	//답십리2호점
	function move1(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule7.php?pno=030807&mode=list4&scd=01";
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
			location.href="association_schedule2.php?pno=030204&mode=list4&scd=02";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree1.focus();
	    }
	}
	//배봉산점
	function move3(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule3.php?pno=030803&mode=list4&scd=01";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree1.focus();
	    }
	}
	//장안2동점
	function move4(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule4.php?pno=030804&mode=list4&scd=02";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
	//제기2호점
	function move5(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule5.php?pno=030805&mode=list4&scd=02";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
	//장안1동점
	function move6(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule6.php?pno=030806&mode=list4&scd=06";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
	//용신점
	function move7(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule8.php?pno=030808&mode=list4&scd=06";
	    }
		else
	    {
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
    
    
    //휘경점
    function move8(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule9.php?pno=030809&mode=list4&scd=06";
	    }
		else
	    {
			// alert('준비중입니다.');
			// document.rentForm.agree2.focus();
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
    
	<?$ip_c = $_SERVER["REMOTE_ADDR"];
	if($ip_c == "61.75.54.138" || $ip_c == "220.117.42.33"){?>
    //청량리점
    function move9(){
		if(document.rentForm.agree1.checked == true)
	    {
			location.href="association_schedule10.php?pno=030810&mode=list4&scd=06";
	    }
		else
	    {
			// alert('준비중입니다.');
			// document.rentForm.agree2.focus();
			alert('안내사항에 동의하셔야 합니다.');
			document.rentForm.agree2.focus();
	    }
	}
	<?}?>
    
    
    
    
</script>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/association2.gif">꿈자람공동육아방</h2>
			</div>
			<div id="content">
<!--
				<div class="__tab3">
					<a href="<?=DIR?>/care/association_schedule.html" class="active"><span>답십리점 공동육아방 이용신청</span></a>
					<a href="<?=DIR?>/care/association_schedule.html"><span>제기점 공동육아방 이용신청</span></a>
					<a href="<?=DIR?>/care/association_schedule.html"><span>배봉산점 공동육아방 이용신청</span></a>
					<a href="<?=DIR?>/care/association_schedule.html"><span>장안2동점 공동육아방 이용신청</span></a>
					<a href="<?=DIR?>/care/association_schedule.html"><span>제기2호점 공동육아방 이용신청</span></a>
					<a href="<?=DIR?>/care/association_schedule.html"><span>장안1동점 공동육아방 이용신청</span></a>
				</div>
-->
				<div class="__greenHead">
					<dl>
						<dt>동대문구육아종합지원센터는</dt>
						<dd>
							관내 어린이집 이용자에게 안전하고 흥미로운 놀이공간을 제공하며, 어린이집과의 지역사회연계를 통하여 보육친화적인 분위기 조성 및 지역사회의 육아지원 협력체계를 구축하고자 합니다.


						</dd>
					</dl>
				</div>


				<div class="__tit1 __mt50">
					<h3>꿈자람공동육아방 기관회원 이용시간 </h3>
				</div>

				<table class="__tbl type2">
					<caption>TABLE</caption>
					<thead>
						<tr>
							<th scope="col">지점</th>
							<th scope="col">이용시간</th>
							<th scope="col">이용인원</th>
							<th scope="col">문의사항</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>답십리점</td>
							<td>금요일 10:00~12:00</td>
							<td>25명 (인솔교사 포함)</td>
							<td>☎  02) 2237-5800</td>
						</tr>
						<tr>
							<td>답십리2호점</td>
							<td>수요일 10:00~12:00</td>
							<td>25명 (인솔교사 포함)</td>
							<td>☎  070) 4121-2005</td>
						</tr>
						<tr>
							<td>제기점</td>
							<td>목요일 10:00~12:00</td>
							<td>25명 (인솔교사 포함)</td>
							<td>☎  02) 923-2272</td>
						</tr>
						<tr>
							<td>제기2호점</td>
<!--							<td>화요일 10:00~12:00 </td>-->
                            <td>화, 금요일 10:00~12:00</td>
							<td>20명 (인솔교사 포함)</td>
							<td>☎  02) 921-9868</td>
						</tr>
						<tr>
							<td>배봉산점</td>
<!--							<td>목요일 10:00~12:00</td>-->
                            <td>화, 목요일 10:00~12:00</td>
							<td>20명 (인솔교사 포함)</td>
							<td>☎  02) 2212-1975 </td>
						</tr>
						<tr>
							<td>장안1호점</td>
<!--							<td>금요일 10:00~12:00</td>-->
                            <td>화, 금요일 10:00~12:00</td>
							<td>20명 (인솔교사 포함)</td>
							<td>☎  02) 2212-0833  </td>
						</tr>	
						<tr>
							<td>장안2호점</td>
							<td>수요일 10:00~12:00</td>
							<td>20명 (인솔교사 포함)</td>
							<td>☎  02) 2212-5844  </td>
						</tr>
						<tr>
							<td>용신점</td>
							<td>수요일 10:00~12:00</td>
							<td>25명 (인솔교사 포함)</td>
							<td>☎  02)921-5801  </td>
						</tr>
                                           
                        <tr>
							<td>휘경점</td>
							<td>목요일 10:00~12:00</td>
							<td>25명 (인솔교사 포함)</td>
							<td>☎  070)4112-7085  </td>
						</tr>
                        <tr>
							<td>청량리점</td>
							<td>수요일 10:00~12:00</td>
							<td>20명 (인솔교사 포함)</td>
							<td>☎  02)3295-2390  </td>
						</tr>
                                            
												
						
					</tbody>
				</table>
				
				




				

				<div class="__caution __mt30">
					<h3>이용 시 주의사항 </h3>
					<ul class="__dotlist __txt15 __mt15">
						<li>이용 취소 시에는 반드시 홈페이지에서 취소를 합니다. </li>
						<li>놀이공간에서 음식물 섭취 불가합니다.</li>
						<li>공동육아방에서 발생하는 안전사고의 모든 책임은 인솔자에게 있습니다.</li>
						<li>공동육아방 이용 시 물품 및 놀잇감이 파손되지 않도록 소중하고 안전히 놀이해 주십시오.</li>
						<li>냉온수기, 냉난방기기는 관계자 외 조작을 금합니다. </li>
					</ul>
				</div>

<form name='rentForm'>
				<div class="__apprAgree __mt80">
					<label><input type="checkbox" name="agree1" />
					위의 동대문구육아종합지원센터의 대관 안내사항에 따라 관련 규정을 준수하고 내용에 동의합니다. </label>
				</div>
</form>

				<div class="__botArea">
					<div class="cen">
						<a href="#none" class="__btn3 __m-w100p" onclick='move();' title="새창 열림">답십리점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move1();' title="새창 열림">답십리2호점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move2();' title="새창 열림">제기점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move5();' title="새창 열림">제기2호점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move3();' title="새창 열림">배봉산점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move6();' title="새창 열림">장안1호점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move4();' title="새창 열림">장안2호점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move7();' title="새창 열림">용신점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move8();' title="새창 열림">휘경점 이용신청</a>
						<a href="#none" class="__btn3 __m-w100p __mmt5" onclick='move9();' title="새창 열림">청량리점 이용신청</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>