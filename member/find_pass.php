<? include $_SERVER["DOCUMENT_ROOT"]."/CheckPlus_Test/checkplus_config.php"; ?>

<?
// http > https
if(!isset($_SERVER["HTTPS"])) {
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}
?>

<?
$_dep = array(7,3);
$_tit = array('회원관련','아이디/비밀번호 찾기');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>


</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>
    
    <section class="section member-page find-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__find">
                        <div class="tab">
                            <a href="<?=DIR?>/member/find_id.php">아이디 찾기</a>
                            <a href="<?=DIR?>/member/find_pass.php" class="active">비밀번호 찾기</a>
                        </div>

                        <div class="tit">
                            <dl>
                                <dt>
                                    회원가입시 등록한 아이디 정보를 입력하시고<br class="__p"> 
                                    본인인증을 진행해주세요.
                                </dt>
                                <dd>본인인증이 완료되면 새로운 비밀번호로 등록 가능합니다.</dd>
                            </dl>
                        </div>

                        <form name="idPwdFrmC" onsubmit="return pwdCheckC(this);">
                            <input type="hidden" name="m" value="checkplusSerivce">						<!-- 필수 데이타로, 누락하시면 안됩니다. -->
                            <input type="hidden" name="EncodeData" value="<?= $enc_data ?>">		<!-- 위에서 업체정보를 암호화 한 데이타입니다. -->
                            <input type="hidden" name="param_r1" value="findpw">
                            <input type="hidden" name="param_r2" value="">
                            <input type="hidden" name="param_r3" value="">

                            <div class="form">
                                <dl>
                                    <dt>아이디</dt>
                                    <dd><input type="text" class="__inp" name="userid" style="ime-mode:inactive"></dd>
                                </dl>
                            </div>

                            <div class="btn">
                                <button type="submit" class="__btnPhone">
                                    <img src="../images/ico-phone.gif" alt="">
                                    <span>휴대폰 인증</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>
<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>

</body>
<script src="/include/js/gpin.js"></script>
<script language="javascript" src="../../include/js/member.js"></script>
<script language="javascript">
    // 아이디, 패스워드 찾기
    function popInfo(userid, url) {
        url = "/html/sub05/" + url + ".php?userid=" + userid;
        // window.showModalDialog(url, window, "dialogWidth:450px;
        // dialogHeight:200px;status:no;help:no");
        var left = (screen.width - 450) / 2;
        var top = (screen.height - 200) / 2;
        window.open(
            url,
            "popup_id_win",
            "left=" + left + ",top=" + top + ",width=450,height=200"
        );
    }

    function popInfo2(userid, passwd, url) {
        url = "/html/member/" + url + ".php?userid=" + userid + "&passwd=" + passwd;
        // window.showModalDialog(url, window, "dialogWidth:450px;
        // dialogHeight:200px;status:no;help:no");
        var left = (screen.width - 450) / 2;
        var top = (screen.height - 200) / 2;
        window.open(
            url,
            "popup_id_win",
            "left=" + left + ",top=" + top + ",width=450,height=200"
        );
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

    function pwdCheckB(form) {
        if (!form.userid.value) {
            alert('아이디를 입력해 주세요');
            form
                .userid
                .focus();
            return false;
        }
        checkAuth('findpw', form.userid.value);
        return false;
    }

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

    function fnPopup2() {
        document.idPwdFrmC.param_r2.value = document.idPwdFrmC.userid.value;
        window.open(
            '',
            'popupChk',
            'width=500, height=550, top=100, left=100, fullscreen=no, menubar=no, status=no' +
                    ', toolbar=no, titlebar=yes, location=no, scrollbar=no'
        );
        document.idPwdFrmC.action = "https://nice.checkplus.co.kr/CheckPlusSafeModel/checkplus.cb";
        document.idPwdFrmC.target = "popupChk";
        document
            .idPwdFrmC
            .submit();
    }

    function pwdCheckC(form) {
        if (!form.userid.value) {
            alert('아이디를 입력해 주세요');
            form
                .userid
                .focus();
            return false;
        }
        fnPopup2();
        return false;
    }
</script>
</html>