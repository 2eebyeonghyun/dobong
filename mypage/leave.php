<?
//$pno = "060401";
//$view_url = "toy_view.php";
?>

<?
$_dep = array(8,4);
$_tit = array('마이페이지','회원탈퇴');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
// if(!$_SESSION['member_id']){
// 	echo "<script>alert('로그아웃 되었습니다. 로그인후 이용해주세요.');location='/dobong/member/login.php';</script>";
// 	exit;
// }
?>
</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page leave-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php" class="active"><span>회원탈퇴</span></a>
                    </div>

                    <form name="frm" method="post" action="060401_proc.php" onsubmit="return inputCheck(this);" target='procFrame'>
                        <input type="hidden" name="mbid" value="<?=$_SESSION[member_id]?>">
                        <input type="hidden" name="userid" value="<?=$_SESSION[member_id]?>">

                        <div class="__leaveHead __mb50">
                            <h3><strong>회원탈퇴</strong>를 하시면 제공되었던 서비스를 이용하실 수 없습니다.</h3>
                            <div class="__txt15 __mt10">
                                불편이나 불만사항을 말씀해 주시면, 동대문구육아종합지원센터에서 적극적으로 해결하도록 하겠습니다.<br>
                                회원탈퇴시 회원님께 제공되었던 서비스의 이용이 불가능하오니 신중히 고려해주세요.
                            </div>
                        </div>

                        <div class="__caution type4 __mb20">
                            <h3>탈퇴사유</h3>
                        </div>

                        <table class="__tblView respond">
                            <caption>TABLE</caption>
                            <colgroup>
                                <col style="width:180px;">
                                <col>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th scope="row">회원 아이디</th>
                                    <td>
                                        <?=$_SESSION[member_id]?>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">비밀번호</th>
                                    <td><input type="password" class="__inp __m-w100p" style="width:270px;" name="passwd"></td>
                                </tr>
                                <tr>
                                    <th scope="row">탈퇴사유</th>
                                    <td><textarea name="content" class="__inp" style="height:80px;"></textarea></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="__mt30 tac __orange __txt15">※ 회원님께서 보내주신 탈퇴사유는 동대문구육아종합지원센터의 더 좋은 서비스를 위해 소중히 여기겠습니다.</div>

                        <div class="__botArea">
                            <div class="cen">
                                <a href="javascript:history.back();" class="__btn1 gray">취소</a>
                                &nbsp;
                                <button type="submit" class="__btn1">확인</button>
                            </div>
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
<script>
function inputCheck(f) {
    if (!f.userid.value) {
        alert('회원 아이디를 입력하세요');
        f
            .userid
            .focus();
        return false;
    }
    if (f.mbid.value != f.userid.value) {
        alert('입력하신 아이디가 로그인한 아이디와 일치하기 않습니다.');
        f
            .userid
            .focus();
        return false;
    }
    if (!f.passwd.value) {
        alert('비밀번호를 입력하세요');
        f
            .passwd
            .focus();
        return false;
    }
    if (!f.content.value) {
        alert('탈퇴사유를 입력하세요');
        f
            .content
            .focus();
        return false;
    }
    if (confirm('회원 탈퇴하시겠습니까?\n탈퇴시 회원님의 정보가 삭제됩니다.')) {
        return;
    } else {
        return false;
    }
}
</script>
</html>