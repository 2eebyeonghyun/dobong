<? include $_SERVER["DOCUMENT_ROOT"]."/CheckPlus_Test/checkplus_config.php"; ?>
<?
    // http > https
    if(!isset($_SERVER["HTTPS"])) {
      header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    }
?>

<?
$_dep = array(7,2);
$_tit = array('회원관련','회원가입');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";


if($_SESSION['member_id']){
	echo "<script>location.replace('/dobong/');</script>";
	exit;
}
?>

</head>

<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page join-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__joinProcess">
                        <div class="step step1 active">
                            <span>01.약관동의</span></div>
                        <div class="step step2">
                            <span>02.회원정보 입력</span></div>
                        <div class="step step3">
                            <span>03.가입완료</span></div>
                    </div>

                    <form name="rmCheckForm" method="post" action="../../html/sub05/rnb_check.php" target="procFrame">
                        <input type="hidden" name="SendInfo">
                        <input type="hidden" name="foreigner">
                        <input type="hidden" name="inqRsn">
                        <input type="hidden" name="name">
                        <input type="hidden" name="jumin1">
                        <input type="hidden" name="jumin2">
                    </form>

                    <form name="returnForm" method="post" action="join2.php">
                        <input type="hidden" name="pno" value="050202">
                        <input type="hidden" name="consent" value="N">
                        <input type="hidden" name="dupInfo" value="">
                        <input type="hidden" name="name">
                        <input type="hidden" name="jumin1">
                        <input type="hidden" name="jumin2">
                    </form>

                    <form name="thisForm" method="post">
                        <!-- 내/외국인 구분을 설정하십시오. ( '1'-내국인, '2'-외국인 ) -->
                        <input type="hidden" name="foreigner" value="1">
                        <!-- 조회사유를 설정하십시오. ( '10'-회원가입, '20'-기존회원 확인, '30'-성인인증, '40'-비회원 확인, '90'-기타 사유
                        ) -->
                        <input type="hidden" name="inqRsn" value="10">

                        <!-- 안심체크 모듈 추가 -->
                        <input type="hidden" name="m" value="checkplusSerivce">
                        <!-- 필수 데이타로, 누락하시면 안됩니다. -->
                        <input type="hidden" name="EncodeData" value="<?= $enc_data ?>">
                        <!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
                        <input type="hidden" name="param_r1" value="join">
                        <input type="hidden" name="param_r2" value="">
                        <input type="hidden" name="param_r3" value="">
                        <!-- 안심체크 모듈 추가 -->

                        <div class="__tit1">
                            <h3>이용약관</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree1">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree1">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>대여사업 이용약관</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree6">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree6">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>개인정보 처리방침</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree2">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree2">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>개인정보 수집 · 이용 동의</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree3">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree3">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>수집한 개인정보의 제3자 제공 및 취급 위탁 동의</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree4">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree4">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>개인정보의 보유 및 이용기간</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area">
                                제1장 총 칙<br>
                                <br>
                                제1조(목적)<br>
                                ① 이 약관은 도봉구육아종합지원센터(이하 "센터"라 한다)가 제공하는 포털홈페이지(www.handoccic.mycafe24.com)의 이용조건 및 운영에 관한
                                사항을 규정함을 목적으로 합니다.<br>
                                ② "회원"께서는 "도봉구육아종합지원센터"를 단일 아이디(ID) 및 비밀번호로 이용하실 수 있으며 서비스 이용을 위하여 회원이 제공하신 정보를
                                이용하는 것에 동의합니다.<br>
                                <br>
                                제2조(정의)<br>
                                이 약관에서 사용하는 용어의 정의는 다음 각 호와 같습니다.<br>
                                1. 회원 : 이용자 아이디를 부여받은 자<br>
                                2. 아이디(ID) : 개인을 식별할 수 있는 고유한 이름으로 영문자 또는 숫자의 조합<br>
                                3. 비밀번호 : 비밀 보호를 위해 회원 자신이 설정한 문자 또는 숫자의 조합<br>
                                4. 탈퇴 : 회원이 이용계약을 종료 시키는 행위<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree5">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree5">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__tit1 __mt50">
                            <h3>영상정보녹화에 대한 동의</h3>
                        </div>
                        <div class="__agreeBox">
                            <div class="area" style="height:105px;">
                                ① 영상정보처리기기(CCTV)는 방범 및 화재예방, 시설안전관리의 목적을 위해 24시간 연속 촬영 및 녹화되고 있습니다.<br>
                                ② 위의 내용에 따른 영상정보 녹화 및 열람에 동의합니다.<br>
                                ③ 동의를 거부할 경우 센터 이용에 제한을 받을 수 있습니다.<br>
                            </div>
                            <div class="bot">
                                <label><input type="radio" name="agree7">
                                    동의합니다.</label>
                                <label><input type="radio" name="agree7">
                                    동의하지 않습니다.</label>
                            </div>
                        </div>

                        <div class="__mt70 tac">
                            <!-- button type="button" class="__btnPhone"
                            onclick="location.href='./join2.html'" -->
                            <button type="button" class="__btnPhone" onclick="goIDCheck2();">
                                <img src="<?=DIR?>/images/ico-phone.gif" alt="휴대폰 아이콘">
                                <span>휴대폰 인증</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>
</body>

<script src="/include/js/gpin.js"></script>
<script>
function fnPopup() {
    window.open(
        '',
        'popupChk',
        'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no' +
                ', toolbar=no, titlebar=yes, location=no, scrollbar=no'
    );
    document.thisForm.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
    document.thisForm.target = "popupChk";
    document
        .thisForm
        .submit();
}

function goIDCheck() {
    f = document.thisForm;

    if (f.agree1[1].checked == true) {
        alert("이용 약관에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree2[1].checked == true) {
        alert("개인정보취급방침에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree3[1].checked == true) {
        alert("개인정보수집 및 이용에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree4[1].checked == true) {
        alert("개인정보 제3자 제공 및 취급위탁에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree5[1].checked == true) {
        alert("개인정보 보유 및 이용기간에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree6[1].checked == true) {
        alert("대여사업 이용약관에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree7[1].checked == true) {
        alert("영상정보녹화에 대해 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }

    checkAuth('join', '');
    return false;
}

function goIDCheck2() {
    f = document.thisForm;

    if (f.agree1[0].checked != true) {
        alert("이용 약관에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree2[0].checked != true) {
        alert("개인정보취급방침에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree3[0].checked != true) {
        alert("개인정보수집 및 이용에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree4[0].checked != true) {
        alert("개인정보 제3자 제공 및 취급위탁에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree5[0].checked != true) {
        alert("개인정보 보유 및 이용기간에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree6[0].checked != true) {
        alert("대여사업 이용약관에 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }
    if (f.agree7[0].checked != true) {
        alert("영상정보녹화에 대해 동의하셔야 가입을 할 수 있습니다.");
        return false;
    }

    fnPopup();
    return false;
}

function changediv(tmp) {
    if (tmp == '1') {
        document
            .getElementById('authTrA')
            .style
            .display = '';
        document
            .getElementById('authTrB')
            .style
            .display = 'none';
    } else if (tmp == '2') {
        document
            .getElementById('authTrA')
            .style
            .display = 'none';
        document
            .getElementById('authTrB')
            .style
            .display = '';
    }
}

function go_test() {
    document.returnForm.name.value = '김도완';
    document.returnForm.jumin1.value = '900107';
    document.returnForm.jumin2.value = '1';
    document.returnForm.consent.value = 'Y';

    document
        .returnForm
        .submit();
}
</script>
</html>