<? 
$_dep = array(6,5,1);
$_tit = array('커뮤니티','상담','양육상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page frm-page counseling1-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>
        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tit1">
                            <h3>상담신청서</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="counseling_frm" id="counseling_frm" class="counselingFrm" onsubmit="return submitbtn();">
                                <table class="counselingFrm_table __table">
                                    <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 15%;">
                                        <col style="width: 32.5%;">
                                        <col style="width: 32.5%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th colspan="2">상담분야</th>
                                            <td class="w100 border-bottom" colspan="2">
                                                <ul class="radio_wr m_w100">
                                                    <li><input type="radio" name="counseling_chk1" id="counseling_chk1" class="counselingChk counselingChk1"><label for="care_chk1">아동발달</label></li>
                                                    <li><input type="radio" name="counseling_chk1" id="counseling_chk2" class="counselingChk counselingChk2"><label for="care_chk2">문제행동</label></li>
                                                    <li><input type="radio" name="counseling_chk1" id="counseling_chk3" class="counselingChk counselingChk3"><label for="care_chk3">양육방법</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th rowspan="5">기본항목</th>
                                            <td class="title_zo border-bottom">의뢰자</td>
                                            <td class="border-bottom" colspan="2">
                                                <ul class="radio_wr m_w100">
                                                    <li><input type="radio" name="counseling_chk2" id="counseling_chk4" class="counselingChk counselingChk4"><label for="counseling_chk4">부</label></li>
                                                    <li><input type="radio" name="counseling_chk2" id="counseling_chk5" class="counselingChk counselingChk5"><label for="counseling_chk5">모</label></li>
                                                    <li><input type="radio" name="counseling_chk2" id="counseling_chk6" class="counselingChk counselingChk6"><label for="counseling_chk6">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title_zo border-bottom">자녀연령</td>
                                            <td class="border-bottom" colspan="2">
                                                <ul class="text_wr">
                                                    <li>
                                                        <p class="text">만</p>
                                                        <input type="text" name="counseling_age" id="counseling_age" class="__input counselingAge">
                                                        <div class="age2_tab">
                                                            <p class="text">
                                                                (<input type="text" name="counseling_age2" id="counseling_age2" class="__input counselingAge2">개월)
                                                            </p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="w100">
                                            <td class="w100 mw100">양육환경</td>
                                            <td class="w50 border-bottom">
                                                <ul class="radio_wr">
                                                    <li>
                                                        <input type="radio" name="counseling_chk3" id="counseling_chk7" class="counselingChk counselingChk7">
                                                        <label for="counseling_chk7">가정양육</label>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="w50 border-bottom">
                                                <ul class="radio_wr flex">
                                                    <li>
                                                        <input type="radio" name="counseling_chk3" id="counseling_chk8" class="counselingChk counselingChk8">
                                                        <label for="counseling_chk8">위탁양육</label>
                                                        <div class="dept2_radio_wr">
                                                            (
                                                                <ul class="dep2_rd_wr">
                                                                    <li>
                                                                        <input type="radio" name="counseling_chk4" id="counseling_chk9" class="counselingChk counselingChk9">
                                                                        <label for="counseling_chk9">친인척</label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="radio" name="counseling_chk4" id="counseling_chk10" class="counselingChk counselingChk10">
                                                                        <label for="counseling_chk10">기관</label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="radio" name="counseling_chk4" id="counseling_chk11" class="counselingChk counselingChk11">
                                                                        <label for="counseling_chk11">기타</label>
                                                                    </li>
                                                                </ul>
                                                              )
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title_zo border-bottom">기관경험</td>
                                            <td class="border-bottom" colspan="2">
                                                <ul class="radio_wr grid-1">
                                                    <li class="flex">
                                                        <input type="radio" name="counseling_chk5" id="counseling_chk12" class="counselingChk counselingChk12">
                                                        <label for="counseling_chk12">있다</label>
                                                        <span class="box">(형태 : <input type="text" name="counseling_ex" id="counseling_ex" class="__input counselingEx" placeholder="예) 가정어린이집">)</span>
                                                    </li>

                                                    <li>
                                                        <input type="radio" name="counseling_chk5" id="counseling_chk13" class="counselingChk counselingChk13">
                                                        <label for="counseling_chk13">없다</label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="title_zo border-bottom">상담경험</td>
                                            <td class="border-bottom" colspan="2">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="counseling_chk6" id="counseling_chk14" class="counselingChk counselingChk14"><label for="counseling_chk14">있다</label></li>
                                                    <li><input type="radio" name="counseling_chk6" id="counseling_chk15" class="counselingChk counselingChk15"><label for="counseling_chk15">없다</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">상담내용</th>
                                            <td class="w100 border-bottom" colspan="2">
                                                <textarea name="counseling_textarea" id="counseling_textarea" class="__textarea" placeholder="추가 상담을 원하실 경우, 전화번호를 남겨주세요."></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">기타사항</th>
                                            <td class="w100 border-bottom" colspan="2">
                                                <textarea name="counseling_textarea2" id="counseling_textarea2" class="__textarea counseling_textarea2" placeholder="추가 상담을 원하실 경우, 전화번호를 남겨주세요."></textarea>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="agree_wr __mt50">
                                    <span class="title">상담동의서</span>
                                    
                                    <ul class="dot_list __mt20">
                                        <li>모든 상담은 비밀유지되어 비공개, 익명성이 보장됩니다. 단, 비밀보장의 한계에 따라 상담참여자 개인 및 사회에 위험(자신 또는 타인 생명과 안접 위협, 감염성 질병, 학대 등)이 있다고 판단될 때 비밀보장이 제외될 수 있습니다.</li>
                                    </ul>

                                    <div class="table_wr __mt30">
                                        <table class="__table">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 90%;">
                                            </colgroup>

                                            <tbody>
                                                <tr>
                                                    <th rowspan="3">개인정보 공개 동의</th>
                                                    <td class="w100 border-bottom">
                                                        <span class="title">(수집, 이용 목적)</span> 
                                                        수집된 상담 내용은 보육교직원 상담사업을 위하여 이용되며, 개인정보는 다른 목적으로 사용되지 않습니다.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w100 border-bottom">
                                                        <span class="title">(보유 및 이용기간)</span> 
                                                        상담 자료는 센터에서 5년간 보관하고 이후에는 폐기합니다.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w100 border-bottom">
                                                        <span class="title">개인 정보 이용에 동의하십니까?</span>
                                                        <ul class="agree_list __mt5">
                                                            <li><input type="radio" name="agree_" id="agree_Y" class="agree_radio"><label for="agree_Y">동의함</label></li>
                                                            <li><input type="radio" name="agree_" id="agree_N" class="agree_radio"><label for="agree_N">동의하지 않음</label></li>
                                                        </ul>
                                                        <p class="information_txt">(* 미동의시 상담이 진행되지 않습니다.)</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <ul class="dot_list __mt20">
                                        <li>상담 과정 중 아동학대를 알게 된 경우에는 아동보호전문기관 또는 수사기관에 신고하여 알리는 것을 원칙으로 하고 있습니다. (「아동학대범죄의 처벌 등에 관한 특례법」 제10조(아동학대 신고 의무와 절차))</li>
                                        <li>상담 중 외부상담전문기관(예: 신경정신과, 정신보건센터, 상담전문센터 등)과의 연계가 필요한 경우, 상담자의 권유 및 본 센터의 방침에 적극적으로 협조해 주시기 바랍니다.</li>
                                        <li>이에 동의하시면 아래에 서명해 주시기 바랍니다. 위 내용을 충분히 알고 있으며, 상담의 규정에 동의합니다.</li>
                                    </ul>

                                    <div class="agree_wr2 __mt30">
                                        <div class="frmdate_wr">
                                            <p class="year">2024년</p>
                                            <p class="month">05월</p>
                                            <p class="day">14일</p>
                                        </div>

                                        <div class="check_wr __mt20">
                                            <ul class="agree_list __mt5">
                                                <li><input type="radio" name="agreeChk_" id="agreeChk_Y" class="agree_radio"><label for="agreeChk_Y">동의함</label></li>
                                                <li><input type="radio" name="agreeChk_" id="agreeChk_N" class="agree_radio"><label for="agreeChk_N">동의하지 않음</label></li>
                                            </ul>
                                            <p class="information_txt">(* 미동의시 상담이 진행되지 않습니다.)</p>
                                        </div>

                                        <p class="frm_information_txt __mt30">* 위 자료는 상담관련 외에 다른 용도로 사용되지 않을 것이며 상담내용은 비밀이 보장됨을 알려드립니다.</p>
                                    </div>
                                </div>

                                <div class="button_wr __mt70">
                                    <a href="<?=DIR?>/community/counseling.php" class="cancle_btn">취소하기</a>
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
            alert("상담분야를 선택해주세요");
            $("input[name=counseling_chk1]").select();
            return false;
        }

        if ($("input[name=counseling_chk2]:radio:checked").length < 1) {
            alert("의뢰자를 선택해주세요");
            $("input[name=counseling_chk2]").select();
            return false;
        }

        if ($("#counseling_age").val() == "") {
            alert("자녀연령(나이)을 입력해주세요");
            $("#counseling_age").select();
            return false;
        }

        if ($("#counseling_age2").val() == "") {
            alert("자녀연령(개월 수)을 입력해주세요");
            $("#counseling_age2").select();
            return false;
        }

        if ($("input[name=counseling_chk3]:radio:checked").length < 1) {
            alert("양육환경 선택해주세요");
            $("input[name=counseling_chk3]").select();
            return false;
        }

        if ($("input[name=counseling_chk5]:radio:checked").length < 1) {
            alert("기관경험을 선택해주세요");
            $("input[name=counseling_chk5]").select();
            return false;
        }

        if ($("input[name=counseling_chk6]:radio:checked").length < 1) {
            alert("상담경험을 선택해주세요");
            $("input[name=counseling_chk6]").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>