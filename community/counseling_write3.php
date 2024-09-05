<? 
$_dep = array(6,5,3);
$_tit = array('커뮤니티','상담','이용상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page frm-page counseling3-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>
        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tit1">
                            <h3>상담신청서 및 초기상담 기록지</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="counseling_frm" id="counseling_frm" class="counselingFrm" onsubmit="return submitbtn();">
                                <table class="counselingFrm_table __table">
                                    <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 90%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th>공개여부</th>
                                            <td class="w100 border-bottom" colspan="3">
                                                <ul class="radio_wr grid-2">
                                                    <li><input type="radio" name="public_chk" id="public_chk_Y" class="publicChk" checked><label for="public_chk_Y">공개</label></li>
                                                    <li><input type="radio" name="public_chk" id="public_chk_N" class="publicChk"><label for="public_chk_N">비공개</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>제목</th>
                                            <td class="w100 border-bottom">
                                                <input type="text" name="counseling_subject" id="counseling_subject" class="__input counselingSubject" placeholder="제목을 입력해주세요">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>질문</th>
                                            <td class="w100 border-bottom">
                                                <textarea name="counseling_text" id="counseling_text" class="__textarea counselingText" placeholder="질문을 남겨주세요"></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="button_wr __mt70">
                                    <a href="<?=DIR?>/community/counseling3.php" class="cancle_btn">취소하기</a>
                                    <button type="submit" class="Submitbtn">신청하기</button>
                                </div>
                            </form>
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

<script type="text/javascript">
    function submitbtn() {
        var f = document.counseling_frm;

        if (!f.agree_Y.checked) {
            alert('개인 정보 이용 동의를 체크해주세요');
            return false;
        }

        if (!f.agreeChk_Y.checked) {
            alert('상담동의서 동의를 체크해주세요');
            return false;
        }

        if ($("input[name=counseling_chk1]:radio:checked").length < 1) {
            alert("상담경혐여부(육아종합지원센터)를 선택해주세요");
            $("input[name=counseling_chk1]").select();
            return false;
        }

        if ($("input[name=counseling_chk2]:radio:checked").length < 1) {
            alert("상담경혐여부(타기관)를 선택해주세요");
            $("input[name=counseling_chk2]").select();
            return false;
        }

        if ($("input[name=counseling_chk3]:radio:checked").length < 1) {
            alert("보육경력 선택해주세요");
            $("input[name=counseling_chk3]").select();
            return false;
        }

        if ($("input[name=counseling_chk4]:radio:checked").length < 1) {
            alert("신청경로를 선택해주세요");
            $("input[name=counseling_chk4]").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>