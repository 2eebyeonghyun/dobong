<? 
$_dep = array(3,4,1);
$_tit = array('가정양육지원','발달지원 및 치료','언어 및 놀이치료');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section support-page sub04-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/support/treatment.php" class="active"><span>언어 및 놀이치료</span></a>
                        <a href="<?=DIR?>/support/treatment2.php"><span>영유아발달지원사업</span></a>
                        <a href="<?=DIR?>/support/treatment3.php"><span>양육상담</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>언어·놀이치료실</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>영유아의 언어, 심리·정서적 지원을 통해 건강한 성장을 도모하고자 합니다.</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>36개월~6세 미만의 영유아</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용내용 및 시간</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <colgroup>
                                    <col style="width: 20%;">
                                    <col style="width: 80%;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>검사 실시</th>
                                        <td>언어검사, 놀이관찰평가 (50분, 영유아의 집중도에 따라 시간이 조정될 수 있음)</td>
                                    </tr>
                                    <tr>
                                        <th>상담 및 치료</th>
                                        <td>초기상담, 언어치료, 놀이치료 (치료 40분, 보호자 상담 10분)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>상담실 이용 안내</h3>
                        </div>

                        <ul class="list_box_wr">
                            <li>전화접수 및 방문상담</li>
                            <li>초기면접</li>
                            <li>검사 실시</li>
                            <li>결과해석상담 및 치료연계</li>
                            <li>아동치료 및 부모상담</li>
                        </ul>

                        <ul class="__dotlist __txt15 __mt20">
                            <li>전화접수를 통해 방문상담 시간을 예약하고, 담당치료사와 스케쥴을 조율한 후 예약한 시간에 맞추어 센터로 방문하시면 됩니다.</li>
                            <li>초기상담 이후에 담당치료사의 소견에 따라 검사 및 치료진행 여부가 결정됩니다.</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>치료 대기 신청서</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>치료 대기를 신청하시면 순번이 되었을 때 개별 연락 드립니다.</li>
                        </ul>

                        <form action="?" method="post" name="support_frm" id="support_frm" class="table_wr supportFrm __mt30" onsubmit="return submitbtn();">
                            <table class="__table">
                                <colgroup>
                                    <col style="width: 10%">
                                    <col style="width: 10%">
                                    <col>
                                </colgroup>

                                <tbody>
                                    <tr>
                                        <th colspan="2">신청구분</th>
                                        <td class="w100 border-bottom">
                                            <ul class="radio_wr grid-2">
                                                <li><input type="radio" name="counseling_category" id="counseling_category1" class="careChk"><label for="counseling_category1">놀이치료</label></li>
                                                <li><input type="radio" name="counseling_category" id="counseling_category2" class="careChk"><label for="counseling_category2">언어치료</label></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th rowspan="3">신청자</th>
                                        <td class="title_zo border-bottom">
                                            <p><strong>이름</strong></p>
                                        </td>
                                        <td class="border-bottom"><input type="text" name="counseling_name" id="counseling_name" class="__input counselingName"></td>
                                    </tr>

                                    <tr>
                                        <td class="title_zo border-bottom">휴대폰번호</td>
                                        <td class="border-bottom"><input type="text" name="counseling_tel" id="counseling_tel" class="__input counselingTel" maxlength="13" oninput="autoHyphen2(this)"></td>
                                    </tr>

                                    <tr>
                                        <td class="title_zo border-bottom">자녀와의<br> 관계</td>
                                        <td class="border-bottom flex-left">
                                            <ul class="radio_wr">
                                                <li><input type="radio" name="counseling_parents" id="counseling_parents1" class="careChk"><label for="counseling_parents1">부</label></li>
                                                <li><input type="radio" name="counseling_parents" id="counseling_parents2" class="careChk"><label for="counseling_parents2">모</label></li>
                                                <li><input type="radio" name="counseling_parents" id="counseling_parents3" class="careChk"><label for="counseling_parents3">기타</label></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th rowspan="2">자녀정보</th>
                                        <td class="title_zo border-bottom">
                                            <p><strong>자녀명</strong></p>
                                        </td>
                                        <td class="border-bottom"><input type="text" name="children_name" id="children_name" class="__input"></td>
                                    </tr>

                                    <tr>
                                        <td class="title_zo border-bottom">자녀<br> 생년월일</td>
                                        <td class="border-bottom">
                                            <input type="date" name="children_date" id="children_date" class="__input">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>신청사유<br> (주 호소 문제)</th>
                                        <td class="w100 border-bottom" colspan="2">
                                            <textarea name="counseling_text" id="counseling_text" class="__textarea " placeholder="* 원활한 치료 연계를 위해 자세하게 작성 부탁드립니다."></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="button_wr __mt30">
                                <button type="submit" class="Submitbtn">신청하기</button>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>치료비 납부 안내</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>치료비용은 한 달 기준으로 선납부하시면 됩니다. (1회: 35,000원)</li>
                            <li>입금계좌: 우리은행 1005-102-768430 도봉구육아종합지원센터 (창동)</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>치료비용 환불 및 취소</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>치료 당일 취소의 경우에는 환불이 되지 않습니다.</li>
                            <li>치료 하루 전 오후 6시까지 취소를 할 경우 다음 회기로 연장됩니다.</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-994-3341 (화요일-토요일 09:00~18:00)</li>
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
<script type="text/javascript">
    function submitbtn() {
        var f = document.support_frm;

        if ($("input[name=counseling_category]:radio:checked").length < 1) {
            alert("신청구분을 선택해주세요");
            $("input[name=counseling_category]").select();
            return false;
        }

        if ($.trim($("#counseling_name").val()) == "") {
            alert("신청자명을 입력해주세요");
            $("#counseling_name").select();
            return false;
        }

        if ($("#counseling_tel").val() == "") {
            alert("연락처를 입력해주세요");
            $("#counseling_tel").select();
            return false;
        }

        if ($.trim($("#counseling_tel").val()).length < 10 || $.trim($("#counseling_tel").val()).length > 13) {
            alert("연락처는 10~13자리 입니다");
            $("#counseling_tel").select();
            return false;
        }

        if ($("input[name=counseling_parents]:radio:checked").length < 1) {
            alert("자녀와의 관계를 선택해주세요");
            $("input[name=counseling_parents]").select();
            return false;
        }

        if ($("#children_name").val() == "") {
            alert("자녀명을 입력해주세요");
            $("#children_name").select();
            return false;
        }

        if ($("#counseling_text").val() == "") {
            alert("신청사유를 입력해주세요");
            $("#counseling_text").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>