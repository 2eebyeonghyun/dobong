<? 
$_dep = array(7,1);
$_tit = array('회원관련','로그인');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";

if($_SESSION['member_id']){
	echo "<script>location.replace('/dobong/');</script>";
	exit;
}

$ret_url = $_REQUEST['ret_url'];

	if(!isset($_SERVER["HTTPS"]))

	{
		  header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
		  exit;
	}
?>
</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page login-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__login">
                        <form name="frm" method="post" action="member_login_proc.php" onsubmit="return login_check(this)" autocomplete="off">
                            <input type='hidden' name='ret_url' value='<?=urlencode($ret_url)?>'>
                            <input type="hidden" name="ret_host" value="<?=$_SERVER["HTTP_HOST"]?>">
                            <ul class="form">
                                <li class="id"><input type="text" name="userid" placeholder="아이디를 입력해주세요" autocomplete="off"/></li>
                                <li class="pass"><input type="password" name="passwd" placeholder="비밀번호를 입력해주세요" autocomplete="new-password"/></li>
                            </ul>
                            <button type="submit" class="btn">로그인</button>
                        </form>

                        <ul class="bot">
                            <li>
                                <dl>
                                    <dt>신규회원가입</dt>
                                    <dd>
                                        회원가입을 통해 더 많은 서비스를 이용하실 수 있습니다.
                                    </dd>
                                </dl>
                                <p>
                                    <a href="<?=DIR?>/member/join.php">
                                        <span>신규 회원가입</span>
                                        <i class="axi axi-angle-right"></i>
                                    </a>
                                </p>
                            </li>
                            <li>
                                <dl>
                                    <dt>아이디/비밀번호 찾기</dt>
                                    <dd>
                                        가입 당시의 기재하신 아이디와 비밀번호를 분실하셨는지요?
                                    </dd>
                                </dl>
                                <p>
                                    <a href="<?=DIR?>/member/find_id.php">
                                        <span>아이디/비밀번호 찾기</span>
                                        <i class="axi axi-angle-right"></i>
                                    </a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </article>

        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
    </section>
</div>

<? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>
</body>

<script>
function login_check(f) {

    if (!f.userid.value) {
        alert("아이디 입력을 부탁드립니다");
        f
            .userid
            .focus();
        return false;
    }

    if (!f.passwd.value) {
        alert("패스워드 입력을 부탁드립니다");
        f
            .passwd
            .focus();
        return false;
    }

    return;

}
</script>
</html>