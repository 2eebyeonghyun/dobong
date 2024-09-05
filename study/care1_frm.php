<? 
$_dep = array(5,1,1);
$_tit = array('교육 및 놀이실 예약','보육교직원','교육 및 행사');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section raise-page frm-page program-frm">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>
        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tit1">
                            <h3>프로그램 신청</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="program_frm" id="program_frm" class="programFrm" onsubmit="return submitbtn();">
                                <div class="row">
                                    <table class="program_table1 __table">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col>
                                            <col style="width: 15%;">
                                            <col>
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="title_zo border-bottom">이름</th>
                                                <td class="border-bottom" colspan="3">홍길동</td>
                                            </tr>

                                            <tr>
                                                <th class="title_zo border-bottom">어린이집명</th>
                                                <td class="border-bottom" colspan="3">A어린이집</td>
                                            </tr>

                                            <tr>
                                                <th class="title_zo border-bottom">신청인원</th>
                                                <td class="border-bottom" colspan="3">
                                                    <select name="program_count" id="program_count" class="__select w600">
                                                        <option value="1명">1명</option>
                                                        <option value="2명">2명</option>
                                                        <option value="3명">3명</option>
                                                        <option value="4명">4명</option>
                                                        <option value="5명">5명</option>
                                                        <option value="6명">6명</option>
                                                    </select>
                                                    <p class="information_text">신청인원 수 만큼 참석자명단에 기재해 주세요.</p>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="title_zo">연락처</th>
                                                <td class="">010-000-0000</td>

                                                <th class="title_zo border-bottom">이메일</th>
                                                <td class="border-bottom">dobong@naver.com</td>
                                            </tr>

                                            <tr class="w100">
                                                <th class="title_zo border-bottom">
                                                    등록명단<br> 
                                                    <span class="small_txt">(원장님도 교육을 원할 시 등록명단에 추가해 주세요)</span>
                                                </th>
                                                <td class="border-bottom" colspan="3">
                                                    <div class="participants_wr">
                                                        <table class="__table">
                                                            <colgroup>
                                                                <col>
                                                                <col>
                                                                <col>
                                                                <col>
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>이름</th>
                                                                    <th>직종</th>
                                                                    <th>유형</th>
                                                                    <th>연락처</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td data-th="이름"><input type="text" name="participants_name" id="participants_name" class="__input"></td>
                                                                    <td data-th="직종">
                                                                        <select name="participants_job" id="participants_job" class="__select">
                                                                            <option value="선택">선택</option>
                                                                            <option value="원장">원장</option>
                                                                            <option value="보육교사">보육교사</option>
                                                                            <option value="특수교사">특수교사</option>
                                                                            <option value="부모">부모</option>
                                                                            <option value="조리사">조리사</option>
                                                                            <option value="기타">기타</option>
                                                                        </select>
                                                                    </td>
                                                                    <td data-th="유형">국공립</td>
                                                                    <td data-th="연락처"><input type="text" name="participants_tel" id="participants_tel" class="__input" maxlength="13" oninput="autoHyphen2(this)"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td data-th="이름"><input type="text" name="participants_name" id="participants_name" class="__input"></td>
                                                                    <td data-th="직종">
                                                                        <select name="participants_job" id="participants_job" class="__select">
                                                                            <option value="선택">선택</option>
                                                                            <option value="원장">원장</option>
                                                                            <option value="보육교사">보육교사</option>
                                                                            <option value="특수교사">특수교사</option>
                                                                            <option value="부모">부모</option>
                                                                            <option value="조리사">조리사</option>
                                                                            <option value="기타">기타</option>
                                                                        </select>
                                                                    </td>
                                                                    <td data-th="유형">국공립</td>
                                                                    <td data-th="연락처"><input type="text" name="participants_tel" id="participants_tel" class="__input" maxlength="13" oninput="autoHyphen2(this)"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <table class="program_table3 __table">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col style="width: 85%;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="title_zo border-bottom">저작권보호동의</th>
                                                <td class="border-bottom">
                                                    <div class="checkbox_wr">
                                                        <input type="checkbox" name="program_agree1" id="program_agree1" class="programAgree1 __checkbox">
                                                        <label for="program_agree1">비대면 교육 시 교육 장면을 캡처,녹화, 활용하여 유출하거나 공유할 경우, 저작권법(제104조의 6, 제104조의 8)에 따라 처벌 받을 수 있다는 것에 동의합니다.</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="title_zo border-bottom">개인정보 수집·이용 동의</th>
                                                <td class="border-bottom">
                                                    <div class="checkbox_wr">
                                                        <input type="checkbox" name="program_agree2" id="program_agree2" class="programAgree2 __checkbox">
                                                        <label for="program_agree1">개인정보보호법에 따라 예약 시 필요한 이름, 어린이집명, 휴대전화, 신청인원, 이메일 주소, 등록명단(이름, 직종, 유형, 연락처) 등의 정보를 사업 종료일까지 수집 및 이용하는 것에 동의합니다.</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th class="title_zo border-bottom">개인정보 제3자 제공 동의</th>
                                                <td class="border-bottom">
                                                    <div class="checkbox_wr">
                                                        <input type="checkbox" name="program_agree3" id="program_agree3" class="programAgree3 __checkbox">
                                                        <label for="program_agree2">개인정보보호법 제17조에 따라 아래의 경우 제3자에게 제공하는 것을 동의합니다.</label>
                                                    </div>

                                                    <div class="table_wr">
                                                        <table class="agree_table __table">
                                                            <colgroup>
                                                                <col>
                                                                <col>
                                                                <col>
                                                                <col>
                                                            </colgroup>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="top_wr">
                                                                            <span class="title">제공받는 자</span>
                                                                        </div>
                                                                        <div class="bot_wr">
                                                                            <p class="text">LG U+ 기업메시징</p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="top_wr">
                                                                            <span class="title">개인정보 이용목적</span>
                                                                        </div>
                                                                        <div class="bot_wr">
                                                                            <p class="text">교육 및 프로그램 예약관련 문자발송</p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="top_wr">
                                                                            <span class="title">제공하는 개인정보의 항목</span>
                                                                        </div>
                                                                        <div class="bot_wr">
                                                                            <p class="text">신청자의 연락처</p>
                                                                        </div>
                                                                    </td>

                                                                    <td>
                                                                        <div class="top_wr">
                                                                            <span class="title">개인정보 보유 및 이용기간</span>
                                                                        </div>
                                                                        <div class="bot_wr">
                                                                            <p class="text">사업완료 시 까지</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <p class="information_text">* 개인정보 수집·이용 및 제3자제공 미동의 시 관련 정보를 안내할 수 없어 신청이 불가합니다.</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="button_wr __mt70">
                                    <a href="#none" class="cancle_btn">취소하기</a>
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
        var f = document.program_frm;

        if ($.trim($("#program_parents").val()) == "") {
            alert("부모 인원을 입력해주세요");
            $("#program_parents").select();
            return false;
        }

        if ($("#program_text").val() == "") {
            alert("비고를 입력해주세요");
            $("#program_text").select();
            return false;
        }

        if ($("input[name=program_agree1]:checkbox:checked").length < 1) {
            alert("개인정보 제공 동의를 선택해주세요");
            $("input[name=program_agree1]").select();
            return false;
        }

        if ($("input[name=program_agree2]:checkbox:checked").length < 1) {
            alert("개인정보 제3자 제공 동의를 선택해주세요");
            $("input[name=program_agree2]").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>