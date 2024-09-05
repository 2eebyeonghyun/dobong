<?
$_dep = array(5,1,2);
$_tit = array('교육 및 놀이실 예약','보육교직원','실내놀이실');
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
                            <h3>실내놀이실 신청</h3>
                        </div>

                        <div class="frm_wr">
                            <form action="?" method="post" name="program_frm" id="program_frm" class="programFrm" onsubmit="return submitbtn();">
                                <div class="row">
                                    <table class="program_table1 __table">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col style="width: 85%;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="title_zo border-bottom">예약명</th>
                                                <td class="border-bottom">[방학]놀이누림터 - [ 2회 : 13:00 ~ 15:00 ] ( 2024년 06월 25일 )</td>
                                            </tr>
                                            <tr>
                                                <th class="title_zo border-bottom">예약정보</th>
                                                <td class="border-bottom">
                                                    <div class="count_list">
                                                        <ul class="list">
                                                            <li><p>정원</p> <span>10명</span></li>
                                                            <li><p>신청</p> <span>0명</span></li>
                                                            <li><p>가능인원</p> <span>10명</span></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="title_zo border-bottom">예약정보</th>
                                                <td class="border-bottom">
                                                    <div class="reserve_info_wr">
                                                        <ul class="list">
                                                            <li class="w600_li child_li">
                                                                <p>아동</p>
                                                                <select name="program_child" id="program_child" class="programChild __select">
                                                                    <option value="1명">1명</option>
                                                                    <option value="2명">2명</option>
                                                                    <option value="3명">3명</option>
                                                                </select>
                                                            </li>
                                                            <li class="w600_li parents_li">
                                                                <p>교사</p>
                                                                <input type="text" name="program_parents" id="program_parents" class="programParents __input" placeholder="1명">
                                                            </li>
                                                            <li class="text_li">
                                                                <p>본인의 자녀만 신청 가능합니다</p>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            
                                <div class="row">
                                    <table class="program_table2 __table">
                                        <colgroup>
                                            <col style="width: 15%;">
                                            <col style="width: 85%;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="title_zo border-bottom">신청(자) 기관명</th>
                                                <td class="border-bottom">홍길동</td>
                                            </tr>
                                            <tr>
                                                <th class="title_zo border-bottom">연락처</th>
                                                <td class="border-bottom">
                                                    <input type="text" name="program_tel" id="program_tel" class="programTel __input" value="010-000-0000">
                                                    <p class="information_text">프로그램 및 실예약 알림서비스를 위해 적어주세요</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="title_zo border-bottom">비고</th>
                                                <td class="border-bottom">
                                                    <textarea name="program_text" id="program_text" class="programText __textarea"></textarea>
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
                                                <th class="title_zo border-bottom">개인정보 제공 동의</th>
                                                <td class="border-bottom">
                                                    <div class="checkbox_wr">
                                                        <input type="checkbox" name="program_agree1" id="program_agree1" class="programAgree1 __checkbox">
                                                        <label for="program_agree1">* 개인정보보호법에 따라 예약 시 필요한 신청자명, 연락처, 아동 및 부모 수, 이메일 주소 등의 정보를 사업 종료일까지 수집 및 이용하는 것에 동의합니다.</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="title_zo border-bottom">개인정보 제3자 제공 동의</th>
                                                <td class="border-bottom">
                                                    <div class="checkbox_wr">
                                                        <input type="checkbox" name="program_agree2" id="program_agree2" class="programAgree2 __checkbox">
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