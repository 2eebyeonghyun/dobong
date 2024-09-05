<? 
$_dep = array(5,1,3);
$_tit = array('교육 및 놀이실 예약','보육교직원','대체인력추가신청');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section raise-page frm-page sub03-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>
        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tit1">
                            <h3>대체교사 추가 신청서</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="substi_frm" id="substi_frm" class="substiFrm" onsubmit="return submitbtn();">
                                <table class="substi_table __table">
                                    <colgroup>
                                        <col style="width: 20%;">
                                        <col style="width: 80%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th>어린이집명</th>
                                            <td class="w100 border-bottom"><input type="text" name="substi_com" id="substi_com" class="__input"></td>
                                        </tr>

                                        <tr>
                                            <th>연락처</th>
                                            <td class="w100 border-bottom"><input type="tel" name="substi_tel" id="substi_tel" class="__input" maxlength="13" oninput="autoHyphen2(this)"></td>
                                        </tr>

                                        <tr>
                                            <th>보육교사명</th>
                                            <td class="w100 border-bottom"><input type="text" name="substi_name" id="substi_name" class="__input"></td>
                                        </tr>

                                        <tr>
                                            <th>신청기간</th>
                                            <td class="w100 border-bottom">
                                                <div class="date_wr">
                                                    <input type="date" name="substi_start" id="substi_start" class="__input" style="width: 100%;">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>신청사유</th>
                                            <td class="w100 border-bottom"><textarea name="substi_textarea" id="substi_textarea" class="__textarea"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="__tit1 __mt50">
                                    <h3>어린이집 안내서</h3>
                                </div>

                                <table class="substi_table __table">
                                    <colgroup>
                                        <col style="width: 20%;">
                                        <col style="width: 80%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th>보육시 주의사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information1" id="substi_information1" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>교재교구<br> (수업관련사항)</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information2" id="substi_information2" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>아침 준비사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information3" id="substi_information3" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>실내외 어린이집 시설물 이용방법</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information4" id="substi_information4" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>기타(주간 행사일정)</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information5" id="substi_information5" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>어린이집 준비사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information6" id="substi_information6" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>휴게시간</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information7" id="substi_information7" class="__textarea he50"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="__tit1 __mt50">
                                    <h3>어린이집 동의</h3>
                                </div>

                                <table class="agree_table __table">
                                    <colgroup>
                                        <col style="width: 90%;">
                                        <col style="width: 10%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <td class="w90 border-right border-bottom">등하원 차량 지도 불가</td>
                                            <td class="w10 border-bottom text_center"><input type="checkbox" name="agree_chk" id="agree_chk" class="__checkbox"><label for="agree_chk">동의</label></td>
                                        </tr>

                                        <tr>
                                            <td class="w90 border-right border-bottom">효율적인 반 운영과 안전사고 사전예방을 위하여 대체교사는 신청한 반에서 고정 근무 함 </td>
                                            <td class="w10 border-bottom text_center"><input type="checkbox" name="agree_chk2" id="agree_chk2" class="__checkbox"><label for="agree_chk2">동의</label></td>
                                        </tr>

                                        <tr>
                                            <td class="w90 border-right border-bottom">원활한 업무를 위해 아동학대 의심신고 및 안전사고,감염병 발생에 따른 법적 책임은 어린이집에도 있음을 유의</td>
                                            <td class="w10 border-bottom text_center"><input type="checkbox" name="agree_chk3" id="agree_chk3" class="__checkbox"><label for="agree_chk3">동의</label></td>
                                        </tr>

                                        <tr>
                                            <td class="w90 border-right border-bottom">본 사업은 보육교사의 휴가보장 및 교사 부재시 보육공백은 방지하기 위한 것으로 목적과 무관한 업무지시, 이중 지원이 발생하지 않도록 유의</td>
                                            <td class="w10 border-bottom text_center"><input type="checkbox" name="agree_chk4" id="agree_chk4" class="__checkbox"><label for="agree_chk4">동의</label></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="agreeChk_wr">
                                    <div class="text_wr">
                                        <p class="text">본 ○○어린이집에서는 위와 같이 대체교사 인력지원을 신청합니다</p>
                                    </div>

                                    <div class="date_wr">
                                        <span class="date">2024년 06월 04일</span>
                                    </div>

                                    <div class="charge_wr">
                                        <span>확인자</span>
                                        <p>홍길동</p>
                                        <a href="#none">(인)</a>
                                    </div>
                                </div>

                                <div class="button_wr __mt70">
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

<script>
    function submitbtn() {
        var f = document.substi_frm;

        if (!f.agree_chk.checked) {
            alert('어린이집 동의를 체크해주세요');
            return false;
        }

        if (!f.agree_chk2.checked) {
            alert('어린이집 동의를 체크해주세요');
            return false;
        }

        if (!f.agree_chk3.checked) {
            alert('어린이집 동의를 체크해주세요');
            return false;
        }

        if (!f.agree_chk4.checked) {
            alert('어린이집 동의를 체크해주세요');
            return false;
        }

        if ($.trim($("#substi_com").val()) == "") {
            alert("어린이집명을 입력해주세요");
            $("#substi_com").select();
            return false;
        }

        if ($("#substi_tel").val() == "") {
            alert("연락처를 선택해주세요");
            $("#substi_tel").select();
            return false;
        }

        if ($.trim($("#substi_tel").val()).length < 10 || $.trim($("#substi_tel").val()).length > 13) {
            alert("연락처는 10~13자리 입니다");
            $("#substi_tel").select();
            return false;
        }

        if ($("#substi_name").val() == "") {
            alert("보육교사명을 입력해주세요");
            $("#substi_name").select();
            return false;
        }

        if ($("#substi_textarea").val() == "") {
            alert("신청사유를 입력해주세요");
            $("#substi_textarea").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>