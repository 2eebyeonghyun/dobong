<?
	if(!isset($_SERVER["HTTPS"]))
	{
		  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
		  exit;
	}

$pno = "020304";
$mode = "list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,1,4);
$_tit = array('보육지원','평가제','컨설팅 사업');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	if(!$idx) goBack("잘못된 경로로 접근하셨습니다.");

	$pQuery	= "SELECT * FROM ddm_aid WHERE idx='".$idx."'";
	$pResult	= mysql_query($pQuery);
	$pRow		= mysql_fetch_array($pResult);

	if($_SESSION[member_id]){
		$mbQuery	= "SELECT cpName
							, cpJang	
							, AES_DECRYPT(UNHEX(mobile),'DM') mobile 
						FROM ona_member 
						WHERE userid='$_SESSION[member_id]'";
		$mbResult	= mysql_query($mbQuery);
		$mbRow		= mysql_fetch_array($mbResult);
		$exMbTel		= explode("-",$mbRow[mobile]);
	}
?>
<script language="javascript" src="../../include/js/member.js"></script>
<!-- <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script> -->
<script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>
<script language="javascript">
<!--
	function valuationDisplay(v1){
		if (v1=="미신청"){
			document.getElementById("idValuation").style.display = "none";
			document.getElementById("idVnumber").style.display = "none";
		}else{
			document.getElementById("idValuation").style.display = "";
			document.getElementById("idVnumber").style.display = "";
		}
	}

	function getCheckedE2(){
		f = document.frm;		
		var values = "";
		len = f.elements["kind2"].length;		
		if(len){
			for (var i=0; i< len; i++) {
				if(f.kind2[i].checked)
					if(values == "")
						values += f.kind2[i].value;
					else
						values += ","+f.kind2[i].value;
			}	
		}else{
			values = f.kind2.value;
		}
		return values;
	}

	function getCheckedE3(){
		f = document.frm;		
		var values = "";
		len = f.elements["childinfo"].length;		
		if(len){
			for (var i=0; i< len; i++) {
				if(!f.childinfo[i].value) f.childinfo[i].value = "0";
				if(values == "")
					values += f.childinfo[i].value+"^"+f.tinfo[i].value+"^"+f.cinfo[i].value;
				else
					values += ","+f.childinfo[i].value+"^"+f.tinfo[i].value+"^"+f.cinfo[i].value;
			}
		}else{
			values = f.childinfo.value+"^"+f.tinfo.value+"^"+f.cinfo.value;
		}
		var temp1 = '';
		var temp2 = '';

		if(document.getElementById("Achildinfo").value == "")
		{
			temp1 = '0';	
		}
		else 
		{
			temp1 = document.getElementById("Achildinfo").value;
		}

		if(document.getElementById("Nchildinfo").value == "")
		{
			temp2 = '0';	
		}
		else 
		{
			temp2 = document.getElementById("Nchildinfo").value;
		}

		values += ","+temp1+"^"+temp2;
		return values;
	}

	function getCheckedE4(){
		f = document.frm;		
		var values = "";
		len = f.elements["staffinfo"].length;		
		if(len){
			for (var i=0; i< len; i++) {
				if(!f.staffinfo[i].value) f.staffinfo[i].value = "0";
				if(values == "")
					values += f.staffinfo[i].value;
				else
					values += ","+f.staffinfo[i].value;
			}	
		}else{
			values = f.staffinfo.value;
		}
		return values;
	}

	function inputCheck(f){

		if(!f.cpName.value){
			alert('시설명을 입력하세요');
			f.cpName.focus();
			return false;
		}

		if(!f.homeaddress.value){
			alert('주소를 입력하세요');
			f.cpName.focus();
			return false;
		}

		f.imKind2.value = getCheckedE2();
		f.imChild.value = getCheckedE3();
		f.imStaff.value = getCheckedE4();

		if(!f.homeaddress.value){
			alert('주소를 입력하세요');
			return false;
		}

		if(!f.jangname.value){
			alert('원장명을 입력하세요');
			f.jangname.focus();
			return false;
		}
		return;

	}
	// 우편번호
	function popPost() {
		url = "/html/sub05/popup_address.php";
		window.showModalDialog(url, window, "dialogWidth:472px; dialogHeight:405px;status:no;help:no;");
	}
//hide_tr hide_tr_1
	function trhideshow() {
		var t = document.frm.hide_tr.value;

		for(j=t; j<11; j++)
		{
			
			var temp = 'hide_tr_' + j;
			document.getElementById(temp).style.display = 'none';

			if(j!=t)
			{
				var temp2 = 'tr_name_'+ j;
				document.getElementById(temp2).value = '';
				var temp3 = 'tr_job_' + j;
				document.getElementById(temp3).value = '';
				var temp4 = 'tr_date_' + j;
				document.getElementById(temp4).value = '';
			}
		}
		
		for(i=1; i<=t; i++)
		{
			var temp = 'hide_tr_' + i;
			document.getElementById(temp).style.display = '';
		}
	}
	function address_find() {
		new daum.Postcode({
			oncomplete: function(data) {
				
				// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
				// 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.
				
				//새우편주소 5자리 zonecode 
				document.getElementById('homezipcode').value = data.zonecode;
				document.getElementById('homeaddress').value = data.address;

				//전체 주소에서 연결 번지 및 ()로 묶여 있는 부가정보를 제거하고자 할 경우,
				//아래와 같은 정규식을 사용해도 된다. 정규식은 개발자의 목적에 맞게 수정해서 사용 가능하다.
				//var addr = data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
				//document.getElementById('addr').value = addr;

				document.getElementById('homeaddress2').focus();
			}
		}).open();
	}
//-->
</script>
<script src="/include/js/calendar.js"></script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2>평가제</h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>평가제 안내</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>평가제 운영체계</span></a>
					<a href="<?=DIR?>/care/appraisal3.php"><span>관련자료실</span></a>
					<a href="<?=DIR?>/care/appraisal4.php" class="active"><span>컨설팅 사업</span></a>
				</div>
				<div class="__provisionHead">
					<h3>유의사항</h3>
					<div class="__txt15 __mt10">
						조력프로그램신청은 조력 신청 기간 중 시설당 조력 신청은 한번만 가능합니다.<br>
						조력프로그램 신청 후 예약완료는 마이페이지에서 확인이 가능하며, 변경사항 발생시 전화로 안내를 해드리오니 아래 입력하신 
						연락처와 회원가입시 회원정보가 동일한지 반드시 확인해주시기 바랍니다.
					</div>
				</div>

				<div class="__tit1 __mt50">
					<h3>어린이집 정보</h3>
				</div>

			<form name="frm" method="post" action="../../html/sub02/020304_proc.php" onSubmit="return inputCheck(this);">
				<input type="hidden" name="pidx" value="<?=$idx?>">
				<input type="hidden" name="send" value="write">
				<input type="hidden" name="mbid" value="<?=$_SESSION[member_id]?>">
				<input type="hidden" name="cpJang" value="<?=$mbRow[cpJang]?>">
				<input type="hidden" name="wdate" value="<?=$pRow[wdate]?>">
				<input type="hidden" name="kind" value="<?=$pRow[kind]?>">

				<input type="hidden" name="imKind2">
				<input type="hidden" name="imChild">
				<input type="hidden" name="imStaff">

				<table class="__tblView respond">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:140px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">어린이집명</th>
							<td>
								<input type="text" class="__inp" name="cpName" value='<?=$mbRow[cpName]?>'>
							</td>
						</tr>
						<tr>
							<th scope="row">원장 성명</th>
							<td>
								<input type="text" class="__inp __m-w100p" style="width:150px;" name="jangname" value='<?=$mbRow[cpJang]?>'>
							</td>
						</tr>
						<tr>
							<th scope="row">신청일시</th>
							<td>
								<?=date("Y 년 m월 d일",strtotime($pRow[wdate]))?> <?=$pRow[kind]=="AM"?"1":"2"?>
							</td>
						</tr>
						<tr>
							<th scope="row">연락처</th>
							<td>
								<ul class="__form __m-w100p" style="width:420px;">
									<li>
										<select name="mbTel1" class="__inp">
											<option value="010" <?if($exMbTel[0] == "010"){ echo"selected"; }?>>010</option>
											<option value="011" <?if($exMbTel[0] == "011"){ echo"selected"; }?>>011</option>
											<option value="016" <?if($exMbTel[0] == "016"){ echo"selected"; }?>>016</option>
											<option value="017" <?if($exMbTel[0] == "017"){ echo"selected"; }?>>017</option>
											<option value="018" <?if($exMbTel[0] == "018"){ echo"selected"; }?>>018</option>
											<option value="019" <?if($exMbTel[0] == "019"){ echo"selected"; }?>>019</option>
										</select> 
									</li>
									<li class="dash">-</li>
									<li><input type="text" class="__inp" name="mbTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[1]?>"></li>
									<li class="dash">-</li>
									<li><input type="text" class="__inp" name="mbTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[2]?>"></li>
								</ul>
							</td>
						</tr>
						<tr>
							<th scope="row">주소</th>
							<td>
								<ul class="__form __m-w100p" style="width:290px;">
									<li><input type="text" class="__inp" name="homezipcode" id="homezipcode" value="<?=$row[homezipcode]?>"></li>
									<li class="space"></li>
									<li style="width:100px;"><button type="button" class="__btn2 __w100p" onclick="address_find();">우편번호찾기</button></li>
								</ul>
								<p class="__mt10"><input type="text" class="__inp" name="homeaddress" id="homeaddress" value="<?=$row[homeaddress]?>"></p>
								<p class="__mt10"><input type="text" class="__inp" name="homeaddress2" id="homeaddress2" value="<?=$row[homeaddress]?>"></p>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="__tit1 __mt50">
					<h3>어린이집 현황</h3>
				</div>

				<table class="__tblView respond">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:140px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">어린이집 유형</th>
							<td>
								<label><input name="kind1" type="radio" value="국공립" checked> 국공립</label>
								<label><input name="kind1" type="radio" value="법인 및 민간"> 법인 및 민간</label>
								<label><input name="kind1" type="radio" value="직장"> 직장</label>
								<label><input name="kind1" type="radio" value="가정"> 가정</label>
								<label><input name="kind1" type="radio" value="부모협동"> 부모협동</label>
							</td>
						</tr>
						<tr>
							<th scope="row">어린이집 특성</th>
							<td>
								<label><input name="kind2" type="checkbox" value="일반"> 일반</label>
								<label><input name="kind2" type="checkbox" value="시간연장"> 시간연장</label>
								<label><input name="kind2" type="checkbox" value="방과후"> 방과후</label>
								<label><input name="kind2" type="checkbox" value="영아전담"> 영아전담</label>
								<label><input name="kind2" type="checkbox" value="장애전담"> 장애전담</label>
								<label><input name="kind2" type="checkbox" value="장애통합"> 장애통합</label>
							</td>
						</tr>
						<tr>
							<th scope="row">원아현황</th>
							<td>
								<table class="childState __m-w100p" style="width:530px;">
									<caption>TABLE</caption>
									<colgroup>
										<col />
										<col style="width:150px;"/>
										<col style="width:200px;"/>
									</colgroup>
									<thead>
										<tr>
											<th scope="col"></th>
											<th scope="col">원아수</th>
											<th scope="col">교사 대 영유아 비율</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="tal">만 0세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">만 1세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">만 2세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">만 3세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">만 4세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">만 5세반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">혼합반</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" name="childinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash">(</li>
													<li><input type="text" class="__inp" name="tinfo"></li>
													<li class="dash">:</li>
													<li><input type="text" class="__inp" name="cinfo"></li>
													<li class="dash">)</li>
												</ul>
											</td>
										</tr>
										<tr>
											<td class="tal">원아 총 정원</td>
											<td>
												<ul class="__form">
													<li><input type="text" class="__inp" id='Achildinfo' name="Achildinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
													<li class="rt">명</li>
												</ul>
											</td>
											<td>
												<ul class="__form">
													<li class="dash" style="width:80px;">원아 현원</li>
													<li><input type="text" class="__inp" id='Nchildinfo' name="Nchildinfo"></li>
													<li class="rt">명</li>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<th scope="row">보육교직원 현황</th>
							<td>
								<ul class="peopleState">
									<li>
										<ul class="__form">
											<li class="peo">원장</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">교사</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">취사부</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">사무원</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">영양사</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">간호사</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
									<li>
										<ul class="__form">
											<li class="peo">총 정원</li>
											<li><input type="text" class="__inp" name="staffinfo" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="0"></li>
											<li class="rt">명</li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>

					</tbody>
				</table>

				<div class="__tit1 __mt50">
					<h3>
						지표교육 참석자
						<span class="dib">
							<select id = 'hide_tr' name = 'hide_tr' onchange='trhideshow();' class="__inp">
							<? for($t=1; $t<11; $t++) { 
								echo "<option value='".$t."'>".$t."</option>";
								}
							?>
							</select>
							명
						</span>
					</h3>
				</div>

				<table class="__tblList type2">
					<caption>TABLE</caption>
					<colgroup class="__p">
						<col style="width:70px;"/>
						<col />
						<col style="width:290px;"/>
						<col />
					</colgroup>
					<colgroup class="__m">
						<col style="width:25%;"/>
						<col style="width:35%;"/>
						<col />
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="__p">구분</th>
							<th scope="col">성명</th>
							<th scope="col">직위</th>
							<th scope="col">참석일</th>
						</tr>
					</thead>
					<tbody>
						<tr id = 'hide_tr_1'>
							<td class="__p">1</td>
							<td><input type="text" class="__inp" id='tr_name_1' name="tr_name_1"/></td>
							<td><input type="text" class="__inp" id='tr_job_1' name="tr_job_1"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_1' name="tr_date_1"/></td>
						</tr>
						<tr id = 'hide_tr_2' style='display:none;'>
							<td class="__p">2</td>
							<td><input type="text" class="__inp" id='tr_name_2' name="tr_name_2"/></td>
							<td><input type="text" class="__inp" id='tr_job_2' name="tr_job_2"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_2' name="tr_date_2"/></td>
						</tr>
						<tr id = 'hide_tr_3' style='display:none;'>
							<td class="__p">3</td>
							<td><input type="text" class="__inp" id='tr_name_3' name="tr_name_3"/></td>
							<td><input type="text" class="__inp" id='tr_job_3' name="tr_job_3"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_3' name="tr_date_3"/></td>
						</tr>
						<tr id = 'hide_tr_4' style='display:none;'>
							<td class="__p">4</td>
							<td><input type="text" class="__inp" id='tr_name_4' name="tr_name_4"/></td>
							<td><input type="text" class="__inp" id='tr_job_4' name="tr_job_4"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_4' name="tr_date_4"/></td>
						</tr>
						<tr id = 'hide_tr_5' style='display:none;'>
							<td class="__p">5</td>
							<td><input type="text" class="__inp" id='tr_name_5' name="tr_name_5"/></td>
							<td><input type="text" class="__inp" id='tr_job_5' name="tr_job_5"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_5' name="tr_date_5"/></td>
						</tr>
						<tr id = 'hide_tr_6' style='display:none;'>
							<td class="__p">6</td>
							<td><input type="text" class="__inp" id='tr_name_6' name="tr_name_6"/></td>
							<td><input type="text" class="__inp" id='tr_job_6' name="tr_job_6"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_6' name="tr_date_6"/></td>
						</tr>
						<tr id = 'hide_tr_7' style='display:none;'>
							<td class="__p">7</td>
							<td><input type="text" class="__inp" id='tr_name_7' name="tr_name_7"/></td>
							<td><input type="text" class="__inp" id='tr_job_7' name="tr_job_7"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_7' name="tr_date_7"/></td>
						</tr>
						<tr id = 'hide_tr_8' style='display:none;'>
							<td class="__p">8</td>
							<td><input type="text" class="__inp" id='tr_name_8' name="tr_name_8"/></td>
							<td><input type="text" class="__inp" id='tr_job_8' name="tr_job_8"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_8' name="tr_date_8"/></td>
						</tr>
						<tr id = 'hide_tr_9' style='display:none;'>
							<td class="__p">9</td>
							<td><input type="text" class="__inp" id='tr_name_9' name="tr_name_9"/></td>
							<td><input type="text" class="__inp" id='tr_job_9' name="tr_job_9"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_9' name="tr_date_9"/></td>
						</tr>
						<tr id = 'hide_tr_10' style='display:none;'>
							<td class="__p">10</td>
							<td><input type="text" class="__inp" id='tr_name_10' name="tr_name_10"/></td>
							<td><input type="text" class="__inp" id='tr_job_10' name="tr_job_10"/></td>
							<td><input type="text" class="__inp _date" id='tr_date_10' name="tr_date_10"/></td>
						</tr>
					</tbody>
				</table>

				<div class="__mt10 tar __txt14 __orange">※ 지표교육 이수 후, 조력 신청이 가능합니다.</div>


				<div class="__tit1 __mt50">
					<h3>평가인증 신청</h3>
				</div>

				<table class="__tblView respond">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:170px;">
						<col>
					</colgroup>
					<tbody>
						<tr>
							<th scope="row">평가인증 참여 기수</th>
							<td>
								<ul class="flag">
									<li><label><input type="radio" name="valuation1" value="N" checked /> 신규인증</label> ( <input type="text" class="__inp __m-w30" style="width:60px;" name="valuation2"/> )</li>
									<li><label><input type="radio" name="valuation1" value="R" /> 재인증</label> ( <input type="text" class="__inp __m-w30" style="width:60px;" name="valuation3"/> )</li>
									<li><?=date('Y')?>년 <input type="text" class="__inp __m-w30" style="width:60px;" name="valuation4"/> 기</li>
								</ul>
							</td>
						</tr>
					</tbody>
				</table>

				<div class="__mt10 tar __txt14 __orange">※ 조력 일정이 확정되면 센터에서 유선으로 연락드립니다.</div>

				<div class="__botArea">
					<div class="cen">
						<a href="appraisal4_schedule.php" class="__btn1 gray">취소</a> &nbsp;
						<button type="submit" class="__btn1">확인</button>
					</div>
				</div>

			</form>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>

<script>
$('._date').datepicker();
</script>
</body>
</html>