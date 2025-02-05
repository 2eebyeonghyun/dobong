<?
$pno = $_REQUEST['pno'];
if(!is_numeric($pno)){
	echo "<script>history.back();</script>";
	exit;
}
?>
<?
$_dep = array(5,5);
$_tit = array('커뮤니티','소리톡톡');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<script>
function ok_chk(){
	
	var form  = document.chks;	
	
	if(!form.agree[0].checked){
		alert("내용을 숙지하고 동의 해주셔야 글을 작성하실 수 있습니다.");form.agree[0].focus();return;
	}

	form.submit();
}
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<div class="__greenHead2">
					<dl>
						<dt>소리톡톡은 동대문구육아종합지원센터 이용자 소리함의 또 다른 이름입니다.</dt>
						<dd>
							동대문구육아종합지원센터를 이용하면서 제안하고 싶은 의견이나 칭찬하고 싶은 점은 없으신가요?<br>소리톡톡을 통해 동대문구육아종합지원센터에서는 항상 여러분과 소통하여, 더 나은 서비스를 제공해드립니다.
						</dd>
					</dl>
				</div>

				<div class="__agreeInfo __mt50">
					<div class="img">
						<strong>상담동의서</strong>
					</div>
					<div class="info">
						<dl>
							<dt>
								안녕하십니까?<br>
								본 상담은 여러분의 <strong>인적사항</strong>과 <strong>상담내용</strong>에 대해 <br class="__p">
								<strong>비밀</strong>을 지켜드릴 것을 <strong>약속</strong>합니다.
							</dt>
							<dd>
								더불어 보다 효과적인 상담 서비스를 제공하기 위해 필요한 몇 가지 협조 사항에 대해 여러분의 동의를 구하고자 합니다.
							</dd>
						</dl>
					</div>
				</div>
				<div class="__tit1 __mt50">
					<h3>개인 정보 공개 동의</h3>
				</div>
				<table class="__tbl type2">
					<caption>TABLE</caption>
					<tbody>
						<tr>
							<th scope="row">수집, 이용 목적</th>
							<td class="tal">
								수집된 상담 내용은 보육교직원 상담사업을 위하여 이용되며, 개인정보는 다른 목적으로 사용되지 않습니다.
							</td>
						</tr>
						<tr>
							<th scope="row">녹음, 사진촬영 동의</th>
							<td class="tal">
								상담자의 자문을 목적으로 여러분의 상담내용을 녹음, 사진 촬영을 할 수 있음을 알려드립니다.<br>
								녹음, 사진 촬영을 원하지 않는 경우 미리 상담자에게 말씀해 주시기 바랍니다.
							</td>
						</tr>
						<tr>
							<th scope="row">보유 및 이용기간</th>
							<td class="tal">
								상담 자료는 센터에서 3년간 보관하고 이후에는 폐기합니다.
							</td>
						</tr>
						<tr>
							<th scope="row">동의 거부 및 권리</th>
							<td class="tal">
								필수 항목의 정보를 제공하지 않을 경우 익명으로 처리합니다.
							</td>
						</tr>
					</tbody>
				</table>
				<ul class="__dotlist __txt15 __mt30">
					<li>
						상담 과정 중 아동학대를 알게 된 경우에는 아동보호전문기관 또는 수사기관에 신고하여 알리는 것을 원칙으로 하고 있습니다.<br>
						(아동복지법 제 25조 아동학대 신고 의무와 절차)
					</li>
					<li>상담 중 외부상담전문기관(예: 신경정신과, 정신보건센터, 상담전문센터 등)과의 연계가 필요한 경우, 상담자의 권유 및 본 센터의 방침에 적극적으로 협조해 주시기 바랍니다.</li>
					<li>상담은 주 회 회기 분 동안 진행되며, 연락 없이 무단으로 결석하지 않을 것을 약속해 주시기 바랍니다.</li>
					<li>비방글, 욕설, 상업적인 내용 등의 글은 관리자가 통보 없이 삭제합니다.</li>
					<li>이에 동의하시면 아래에 서명해 주시기 바랍니다.</li>
				</ul>

<form name="chks" method="post" action="sound_write.php">
<input type="hidden" name="mode" value="write">
<input type="hidden" name="pno" value="<?=$pno?>">
				<div class="__apprAgree __mt40">
					<label><input type="radio" name="agree" /> 동의합니다.</label>
					<label><input type="radio" name="agree" /> 동의하지 않습니다.</label>
				</div>

				<div class="__botArea">
					<div class="cen">
						<a href="javascript:ok_chk();" class="__btn1">확인</a>
					</div>
				</div>
</form>



			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>