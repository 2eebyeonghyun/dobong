<?
$_dep = array(7,2);
$_tit = array('회원관련','회원가입');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";

//$pno = "050203";
//$view_url = "notice_view.php";

$userid = $_POST['userid'];
$passwd = $_POST['passwd'];
$name = $_POST['name'];

?>

</head>
<body>
<div id="wrap" class="wrap">
	  <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page join-page join_3-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__joinProcess">
                        <div class="step step1"><span>01.약관동의</span></div>
                        <div class="step step2"><span>02.회원정보 입력</span></div>
                        <div class="step step3 active"><span>03.가입완료</span></div>
                    </div>

                    <div class="__joinResult">
                        <div class="area">
                            <h3>동대문구육아종합지원센터 회원으로 가입해 주셔서 감사합니다.</h3>
                            <div class="con">
                                <dl>
                                    <dt>회원 아이디</dt>
                                    <dd>ewr23**</dd>
                                </dl>
                                <dl>
                                    <dt>비밀번호</dt>
                                    <dd>암호화처리됨</dd>
                                </dl>
                                <dl>
                                    <dt>E-mail</dt>
                                    <dd>we32e@naver.com</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="__botArea">
                        <div class="cen">
                            <a href="./login.php" class="__btn1">로그인하기</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>

</body>
</html>