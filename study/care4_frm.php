<? 
$_dep = array(5,1,4);
$_tit = array('교육 및 놀이실 예약','보육교직원','보육교직원상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub08-page frm-page">
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
                                        <col style="width: 5%;">
                                        <col style="width: 5%;">
                                        <col style="width: 10%;">
                                        <col style="width: 2%;">
                                        <col style="width: 3%;">
                                        <col style="width: 5%;">
                                        <col style="width: 3%;">
                                        <col style="width: 2%;">
                                        <col style="width: 3%;">
                                        <col style="width: 13%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th rowspan="3">
                                                <p><strong>내담자</strong></p>
                                            </th>
                                            <td class="title_zo">
                                                <p><strong>이 름</strong></p>
                                            </td>
                                            <td>
                                                <input type="text" name="counseling_name" id="counseling_name" class="__input counselingName">
                                            </td>
                                            <td class="title_zo" colspan="2">
                                                <p><strong>나 이</strong></p>
                                            </td>
                                            <td colspan="2">
                                                <input type="text" name="counseling_age" id="counseling_age" class="__input counselingAge">
                                            </td>
                                            <td class="title_zo border-bottom" colspan="2">
                                                <p><strong>연락처</strong></p>
                                            </td>
                                            <td class="border-bottom">
                                                <input type="text" name="counseling_tel" id="counseling_tel" class="__input counselingTel" maxlength="13" oninput="autoHyphen2(this)">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo">
                                                <p>
                                                    <strong>지 역</strong>
                                                </p>
                                            </td>
                                            <td>
                                                <select name="counseling_loc" id="counseling_loc" class="__input counselingLoc">
                                                    <option value="">서울특별시</option>
                                                </select>
                                            </td>
                                            <td class="title_zo" colspan="2">
                                                <p>
                                                    <strong>상담장소</strong>
                                                </p>
                                            </td>
                                            <td colspan="2">
                                                <select name="counseling_place" id="counseling_place" class="__input counselingPlace">
                                                    <option value="">서울특별시</option>
                                                </select>
                                            </td>
                                            <td class="title_zo border-bottom" colspan="2">
                                                <p>
                                                    <strong>이메일</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom">
                                                <input type="text" name="counseling_mail" id="counseling_mail" class="__input counselingMail">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">
                                                <p>
                                                    <strong>결혼여부</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk" id="care_chk1" class="careChk careChk1"><label for="care_chk1">미혼</label></li>
                                                    <li><input type="radio" name="care_chk" id="care_chk2" class="careChk careChk2"><label for="care_chk2">기혼</label></li>
                                                    <li><input type="radio" name="care_chk" id="care_chk3" class="careChk careChk3"><label for="care_chk3">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2" rowspan="2">
                                                <p>
                                                    <strong>상담경험여부</strong>
                                                </p>
                                            </th>
                                            <td class="w100" colspan="4">
                                                <div class="radio_area">
                                                    <span class="title">육아종합지원센터</span>
                                                    <ul class="radio_wr">
                                                        <li><input type="radio" name="care_chk2" id="care_chk4" class="careChk careChk1"><label for="care_chk4">있음</label></li>
                                                        <li><input type="radio" name="care_chk2" id="care_chk5" class="careChk careChk2"><label for="care_chk5">없음</label></li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="w100 border-bottom" colspan="4">
                                                <div class="radio_area">
                                                    <span class="title">타기관</span>
                                                    <ul class="radio_wr">
                                                        <li><input type="radio" name="care_chk3" id="care_chk6" class="careChk careChk1"><label for="care_chk6">있음</label></li>
                                                        <li><input type="radio" name="care_chk3" id="care_chk7" class="careChk careChk2"><label for="care_chk7">없음</label></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w100" colspan="4">
                                                <div class="informaton_box">
                                                    <div class="flex_box date_box">
                                                        <span class="title">기간: </span>
                                                        <div class="date_wr">
                                                            <input type="date" name="counseling_date1" id="counseling_date1" class="__input counselingDate1">
                                                            <input type="date" name="counseling_date1_2" id="counseling_date1_2" class="__input counselingDate1_1">
                                                        </div>
                                                    </div>

                                                    <div class="flex_box category_box">
                                                        <span class="title">유형: </span>
                                                        <input type="text" name="counseling_category1" id="counseling_category1" class="__input counselingCategory1" placeholder="유형을 입력해주세요">
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="w100 border-bottom" colspan="4">
                                                <div class="informaton_box">
                                                    <div class="flex_box date_box">
                                                        <span class="title">기간: </span>
                                                        <div class="date_wr">
                                                            <input type="date" name="counseling_date2" id="counseling_date2" class="__input counselingDate2">
                                                            <input type="date" name="counseling_date2_2" id="counseling_date2_2" class="__input counselingDate2_2">
                                                        </div>
                                                    </div>

                                                    <div class="flex_box category_box">
                                                        <span class="title">유형: </span>
                                                        <input type="text" name="counseling_category2" id="counseling_category2" class="__input counselingCategory2" placeholder="유형을 입력해주세요">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th rowspan="8">
                                                <p>
                                                    <strong>상담영역</strong>
                                                </p>
                                            </th>
                                            <td class="title_zo border-bottom">
                                                <p>
                                                    <strong>상담유형</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk4" id="care_chk8" class="careChk careChk1"><label for="care_chk8">전화</label></li>
                                                    <li><input type="radio" name="care_chk4" id="care_chk9" class="careChk careChk2"><label for="care_chk9">대면(개별)</label></li>
                                                    <li><input type="radio" name="care_chk4" id="care_chk10" class="careChk careChk3"><label for="care_chk10">화상(개별)</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">
                                                <p><strong>어린이집 유형</strong></p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk5" id="care_chk11" class="careChk careChk1"><label for="care_chk11">국공립</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk12" class="careChk careChk2"><label for="care_chk12">사회복지법인</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk13" class="careChk careChk3"><label for="care_chk13">법인 · 단체 등</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk14" class="careChk careChk4"><label for="care_chk14">민간</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk15" class="careChk careChk5"><label for="care_chk15">직장</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk16" class="careChk careChk6"><label for="care_chk16">가정</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk17" class="careChk careChk7"><label for="care_chk17">협동</label></li>
                                                    <li><input type="radio" name="care_chk5" id="care_chk18" class="careChk careChk8"><label for="care_chk18">미구분</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">
                                                <p><strong>직종(직책)</strong></p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk6" id="care_chk19" class="careChk careChk1"><label for="care_chk19">원장</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk20" class="careChk careChk2"><label for="care_chk20">보육교사</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk21" class="careChk careChk3"><label for="care_chk21">특수교사</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk22" class="careChk careChk4"><label for="care_chk22">미구분</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk23" class="careChk careChk5"><label for="care_chk23">치료사</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk24" class="careChk careChk6"><label for="care_chk24">간호사</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk25" class="careChk careChk7"><label for="care_chk25">영양사</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk26" class="careChk careChk8"><label for="care_chk26">조리원</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk27" class="careChk careChk9"><label for="care_chk27">사무원</label></li>
                                                    <li><input type="radio" name="care_chk6" id="care_chk28" class="careChk careChk10"><label for="care_chk28">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">
                                                <p>
                                                    <strong>보육경력</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk7" id="care_chk29" class="careChk careChk1"><label for="care_chk29">2년 미만</label></li>
                                                    <li><input type="radio" name="care_chk7" id="care_chk30" class="careChk careChk2"><label for="care_chk30">2~4년</label></li>
                                                    <li><input type="radio" name="care_chk7" id="care_chk31" class="careChk careChk3"><label for="care_chk31">5~9년</label></li>
                                                    <li><input type="radio" name="care_chk7" id="care_chk32" class="careChk careChk4"><label for="care_chk32">10년 이상</label></li>
                                                    <li><input type="radio" name="care_chk7" id="care_chk33" class="careChk careChk5"><label for="care_chk33">미구분</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w100 background_f9" rowspan="4">
                                                <p>
                                                    <strong>상담내용</strong>
                                                </p>
                                            </td>
                                            <td class="mobile_x" colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox1" class="checkbox"><label for="checkbox1">진로고민</label>
                                            </td>
                                            <td class="mobile_x" colspan="4">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox2" class="checkbox"><label for="checkbox2">원아들과 관계</label>
                                            </td>
                                            <td class="mobile_x" colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox3" class="checkbox"><label for="checkbox3">업무관련</label>
                                            </td>
                                            
                                            <td class="mobile_checkbox border-bottom">
                                                <ul class="checkbox_wr">
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox1" class="checkbox"><label for="checkbox1">진로고민</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox2" class="checkbox"><label for="checkbox2">원아들과 관계</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox3" class="checkbox"><label for="checkbox3">업무관련</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox4" class="checkbox"><label for="checkbox4">동료, 상사 관계</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox5" class="checkbox"><label for="checkbox5">영유아부모 관계</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox6" class="checkbox"><label for="checkbox6">경제적 안정</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox7" class="checkbox"><label for="checkbox7">개인사 관련</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox8" class="checkbox"><label for="checkbox8">심리, 적성, 성격검사</label></li>
                                                    <li><input type="checkbox" name="counseling_checkbox" id="checkbox9" class="checkbox"><label for="checkbox9">아동학대예방</label></li>
                                                    <li class="w100">
                                                        <div class="text_wr">
                                                            <input type="checkbox" name="counseling_checkbox" id="checkbox10" class="checkbox"><label for="checkbox10">기타</label>
                                                        </div>

                                                        <div class="input_wr">
                                                            <input type="text" name="counseling_information1" id="counseling_information1" class="__input" placeholder="내용을 입력해주세요">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="mobile_x">
                                            <td colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox4" class="checkbox"><label for="checkbox4">동료, 상사 관계</label>
                                            </td>
                                            <td colspan="4">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox5" class="checkbox"><label for="checkbox5">영유아부모 관계</label>
                                            </td>
                                            <td colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox6" class="checkbox"><label for="checkbox6">경제적 안정</label>
                                            </td>
                                        </tr>

                                        <tr class="mobile_x">
                                            <td colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox7" class="checkbox"><label for="checkbox7">개인사 관련</label>
                                            </td>
                                            <td colspan="4">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox8" class="checkbox"><label for="checkbox8">심리, 적성, 성격검사</label>
                                            </td>
                                            <td colspan="2">
                                                <input type="checkbox" name="counseling_checkbox" id="checkbox9" class="checkbox"><label for="checkbox9">아동학대예방</label>
                                            </td>
                                        </tr>

                                        <tr class="mobile_x">
                                            <td colspan="8" class="left_text one_line">
                                                <div class="label_wr">
                                                    <input type="checkbox" name="counseling_checkbox" id="checkbox10" class="checkbox"><label for="checkbox10">기타</label>
                                                </div>
                                                
                                                <div class="input_box_wr">
                                                    <input type="text" name="counseling_information1" id="counseling_information1" class="__input" placeholder="내용을 입력해주세요">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">
                                                <p>
                                                    <strong>신청경로</strong>
                                                </p>
                                            </th>
                                            <td class="w100 border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk8" id="care_chk34" class="careChk careChk1"><label for="care_chk34">인터넷</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk35" class="careChk careChk2"><label for="care_chk35">홍보물</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk36" class="careChk careChk3"><label for="care_chk36">주변권유(이용자추천)</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk37" class="careChk careChk4"><label for="care_chk37">교육</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk38" class="careChk careChk5"><label for="care_chk38">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">
                                                <p>
                                                    <strong>신청사유</strong>
                                                </p>
                                            </th>
                                            <td class="w100 border-bottom" colspan="8">
                                                <input type="text" name="counseling_information2" id="counseling_information2" class="__input counseling">
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
                                                    <th rowspan="4">개인정보 공개 동의</th>
                                                    <td class="w100 border-bottom">
                                                        <span class="title">(수집, 이용 목적)</span> 
                                                        수집된 상담 내용은 보육교직원 상담사업을 위하여 이용되며, 개인정보는 다른 목적으로 사용되지 않습니다.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w100 border-bottom">
                                                        <span class="title">(녹음, 사진촬영 동의)</span> 
                                                        상담자의 자문을 목적으로 여러분의 상담내용을 녹음, 사진 촬영을 할 수 있음을 알려드립니다. 녹음, 사진 촬영을 원하지 않는 경우 미리 상담자에게 말씀해 주시기 바랍니다.
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

                                        <div class="frmname_wr __mt20">
                                            <span class="title">성명 : </span>
                                            <p class="name">홍길동</p>
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

        if ($.trim($("#counseling_name").val()) == "") {
            alert("이름을 입력해주세요");
            $("#counseling_name").select();
            return false;
        }

        if ($("#counseling_age").val() == "") {
            alert("나이를 입력해주세요");
            $("#counseling_age").select();
            return false;
        }

        if ($("#counseling_tel").val() == "") {
            alert("연락처를 선택해주세요");
            $("#counseling_tel").select();
            return false;
        }

        if ($.trim($("#counseling_tel").val()).length < 10 || $.trim($("#counseling_tel").val()).length > 13) {
            alert("연락처는 10~13자리 입니다");
            $("#counseling_tel").select();
            return false;
        }

        if ($("#counseling_mail").val() == "") {
            alert("이메일을 입력해주세요");
            $("#counseling_mail").select();
            return false;
        }

        if ($("input[name=care_chk]:radio:checked").length < 1) {
            alert("결혼여부를 선택해주세요");
            $("input[name=care_chk]").select();
            return false;
        }

        if ($("input[name=care_chk2]:radio:checked").length < 1) {
            alert("상담경험여부(육아종합지원센터)를 선택해주세요");
            $("input[name=care_chk2]").select();
            return false;
        }

        if ($("input[name=care_chk3]:radio:checked").length < 1) {
            alert("상담경험여부(타기관)를 선택해주세요");
            $("input[name=care_chk3]").select();
            return false;
        }

        if ($("input[name=care_chk4]:radio:checked").length < 1) {
            alert("상담유형을 선택해주세요");
            $("input[name=care_chk4]").select();
            return false;
        }

        if ($("input[name=care_chk5]:radio:checked").length < 1) {
            alert("어린이집 유형을 선택해주세요");
            $("input[name=care_chk5]").select();
            return false;
        }

        if ($("input[name=care_chk6]:radio:checked").length < 1) {
            alert("직종(직책)을 선택해주세요");
            $("input[name=care_chk6]").select();
            return false;
        }

        if ($("input[name=care_chk7]:radio:checked").length < 1) {
            alert("보육경력을 선택해주세요");
            $("input[name=care_chk7]").select();
            return false;
        }

        if ($("input[name=counseling_checkbox]:checkbox:checked").length < 1) {
            alert("상담내용을 선택해주세요");
            $("input[name=counseling_checkbox]").select();
            return false;
        }

        if ($("input[name=care_chk8]:radio:checked").length < 1) {
            alert("신청경로를 선택해주세요");
            $("input[name=care_chk8]").select();
            return false;
        }

        if ($("#counseling_information2").val() == "") {
            alert("신청사유를 입력해주세요");
            $("#counseling_information2").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>