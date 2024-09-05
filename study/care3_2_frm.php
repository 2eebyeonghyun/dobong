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
                            <h3>대체조리원 추가 신청서</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="substi_frm" id="substi_frm" class="substiFrm" onsubmit="return submitbtn();">
                                <table class="substi_table __table">
                                    <colgroup>
                                        <col style="width: 20%;">
                                        <col style="width: 45%;">
                                        <col style="width: 20%;">
                                        <col style="width: 15%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th>어린이집명</th>
                                            <td class="w100 border-bottom" colspan="3"><input type="text" name="substi_com" id="substi_com" class="__input"></td>
                                        </tr>

                                        <tr>
                                            <th>연락처</th>
                                            <td class="w100 border-bottom" colspan="3"><input type="tel" name="substi_tel" id="substi_tel" class="__input" maxlength="13" oninput="autoHyphen2(this)"></td>
                                        </tr>

                                        <tr>
                                            <th>조리사명</th>
                                            <td class="w100"><input type="text" name="substi_name" id="substi_name" class="__input"></td>
                                            <th>조리원 수</th>
                                            <td class="w100 border-bottom"><input type="text" name="substi_count" id="substi_count" class="__input"></td>
                                        </tr>

                                        <tr>
                                            <th>신청기간</th>
                                            <td class="w100 border-bottom" colspan="3">
                                                <div class="date_wr">
                                                    <input type="date" name="substi_start" id="substi_start" class="__input" style="width: 100%;">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>신청사유</th>
                                            <td class="w100 border-bottom" colspan="3"><textarea name="substi_textarea" id="substi_textarea" class="__textarea"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="__tit1 __mt50">
                                    <h3>어린이집 업무인수인계서</h3>
                                </div>

                                <table class="substi_table __table">
                                    <colgroup>
                                        <col style="width: 20%;">
                                        <col style="width: 80%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th>출퇴근 시간</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information1" id="substi_information1" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>출근 후 준비사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information2" id="substi_information2" class="__textarea he50"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>조리 업무시 주의사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information3" id="substi_information3" class="__textarea he50" placeholder=" 식수 인원,식재료 관련,대체식,조리실 기기 사용등"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>주간 행사 일정</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information4" id="substi_information4" class="__textarea he50" placeholder="날짜,진행시간,조리실 준비 사항등"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>업무분장</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information5" id="substi_information5" class="__textarea he50" placeholder="식재료 검수,급식일지 작성 조리실 청소 위생 청결 리스트 작성등"></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>어린이집 준비사항</th>
                                            <td class="w100 border-bottom"><textarea name="substi_information6" id="substi_information6" class="__textarea he50" placeholder=" 오리엔테이션 진행"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="agreeChk_wr">
                                    <div class="text_wr">
                                        <p class="text">본 ○○어린이집에서는 위와 같이 대체조리원 인력지원을 신청합니다</p>
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
            alert("조리사명을 입력해주세요");
            $("#substi_name").select();
            return false;
        }

        if ($("#substi_count").val() == "") {
            alert("조리원 수를 입력해주세요");
            $("#substi_count").select();
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