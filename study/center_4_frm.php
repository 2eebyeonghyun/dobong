<? 
$_dep = array(5,2,4);
$_tit = array('교육 및 놀이실 예약','양육자 및 영유아','부모양육상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub08-page frm-page center4_frm-page">
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
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col>
                                        <col style="width: 15%;">
                                        <col style="width: 10%;">
                                    </colgroup>

                                    <tbody>
                                        <tr>
                                            <th rowspan="5">
                                                <p><strong>내담자</strong></p>
                                            </th>

                                            <td class="title_zo">
                                                <p><strong>이 름</strong></p>
                                            </td>
                                            <td colspan="3">
                                                <input type="text" name="counseling_name" id="counseling_name" class="__input counselingName">
                                            </td>

                                            <td class="title_zo border-bottom" colspan="2">
                                                <p><strong>연 령</strong></p>
                                            </td>
                                            <td class="border-bottom" colspan="3">
                                                <input type="text" name="counseling_age" id="counseling_age" class="__input counselingAge">
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
                                            <td class="title_zo">
                                                <p><strong>연락처</strong></p>
                                            </td>
                                            <td class="" colspan="3">
                                                <input type="text" name="counseling_tel" id="counseling_tel" class="__input counselingTel" maxlength="13" oninput="autoHyphen2(this)">
                                            </td>

                                            <td class="title_zo border-bottom" colspan="2">
                                                <p>
                                                    <strong>이메일</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom" colspan="3">
                                                <input type="text" name="counseling_mail" id="counseling_mail" class="__input counselingMail">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom mobile-w100 mobile-w100-border">
                                                <p>
                                                    <strong>주 소</strong>
                                                </p>
                                            </td>
                                            <td class="border-bottom mobile-w100" colspan="8">
                                                <div class="location_wr">
                                                    <input type="text" name="counseling_addr" id="counseling_addr" class="__input location_text" placeholder="주소">
                                                    <input type="button" onclick="sample5_execDaumPostcode()" class="location_btn" value="주소 검색"><br>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">상담대상과의 관계</td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="relationship_chk" id="relationship_chk1" class="careChk relationshipChk1"><label for="relationship_chk1">엄마</label></li>
                                                    <li><input type="radio" name="relationship_chk" id="relationship_chk2" class="careChk relationshipChk2"><label for="relationship_chk2">아빠</label></li>
                                                    <li><input type="radio" name="relationship_chk" id="relationship_chk3" class="careChk relationshipChk3"><label for="relationship_chk3">할머니</label></li>
                                                    <li><input type="radio" name="relationship_chk" id="relationship_chk4" class="careChk relationshipChk4"><label for="relationship_chk4">할아버지</label></li>
                                                    <li><input type="radio" name="relationship_chk" id="relationship_chk5" class="careChk relationshipChk5"><label for="relationship_chk5">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="pc_tr">
                                            <th colspan="2" rowspan="7">
                                                <p>
                                                    <strong>가족관계</strong>
                                                </p>
                                            </th>
                                            <td class="title_zo" rowspan="5">구성원</td>
                                            <td class="title_zo">이름</td>
                                            <td class="title_zo">관계</td>
                                            <td class="title_zo">연령</td>
                                            <td class="title_zo">학력</td>
                                            <td class="title_zo">직업</td>
                                            <td class="title_zo">친밀도</td>
                                            <td class="title_zo">동거여부</td>
                                        </tr>

                                        <tr class="pc_tr">
                                            <td><input type="text" name="family_name" id="family_name" class="__input familyName"></td>
                                            <td><input type="text" name="family_rela" id="family_rela" class="__input familyRela"></td>
                                            <td><input type="text" name="family_age" id="family_age" class="__input familyAge"></td>
                                            <td><input type="text" name="family_ability" id="family_ability" class="__input familyAbility"></td>
                                            <td><input type="text" name="family_job" id="family_job" class="__input familyJob"></td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="intimacy_chk" id="intimacy_chk1" class="careChk intimacyChk"><label for="intimacy_chk1">1</label></li>
                                                    <li><input type="radio" name="intimacy_chk" id="intimacy_chk2" class="careChk intimacyChk"><label for="intimacy_chk2">2</label></li>
                                                    <li><input type="radio" name="intimacy_chk" id="intimacy_chk3" class="careChk intimacyChk"><label for="intimacy_chk3">3</label></li>
                                                    <li><input type="radio" name="intimacy_chk" id="intimacy_chk4" class="careChk intimacyChk"><label for="intimacy_chk4">4</label></li>
                                                    <li><input type="radio" name="intimacy_chk" id="intimacy_chk5" class="careChk intimacyChk"><label for="intimacy_chk5">5</label></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="together_chk" id="together_chk1" class="careChk"><label for="together_chk1">동거</label></li>
                                                    <li><input type="radio" name="together_chk" id="together_chk2" class="careChk"><label for="together_chk2">비동거</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="pc_tr">
                                            <td><input type="text" name="family_name" id="family_name" class="__input familyName"></td>
                                            <td><input type="text" name="family_rela" id="family_rela" class="__input familyRela"></td>
                                            <td><input type="text" name="family_age" id="family_age" class="__input familyAge"></td>
                                            <td><input type="text" name="family_ability" id="family_ability" class="__input familyAbility"></td>
                                            <td><input type="text" name="family_job" id="family_job" class="__input familyJob"></td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="intimacy_chk2" id="intimacy_chk6" class="careChk intimacyChk"><label for="intimacy_chk6">1</label></li>
                                                    <li><input type="radio" name="intimacy_chk2" id="intimacy_chk7" class="careChk intimacyChk"><label for="intimacy_chk7">2</label></li>
                                                    <li><input type="radio" name="intimacy_chk2" id="intimacy_chk8" class="careChk intimacyChk"><label for="intimacy_chk8">3</label></li>
                                                    <li><input type="radio" name="intimacy_chk2" id="intimacy_chk9" class="careChk intimacyChk"><label for="intimacy_chk9">4</label></li>
                                                    <li><input type="radio" name="intimacy_chk2" id="intimacy_chk10" class="careChk intimacyChk"><label for="intimacy_chk10">5</label></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="together_chk2" id="together_chk3" class="careChk"><label for="together_chk3">동거</label></li>
                                                    <li><input type="radio" name="together_chk2" id="together_chk4" class="careChk"><label for="together_chk4">비동거</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="pc_tr">
                                            <td><input type="text" name="family_name" id="family_name" class="__input familyName"></td>
                                            <td><input type="text" name="family_rela" id="family_rela" class="__input familyRela"></td>
                                            <td><input type="text" name="family_age" id="family_age" class="__input familyAge"></td>
                                            <td><input type="text" name="family_ability" id="family_ability" class="__input familyAbility"></td>
                                            <td><input type="text" name="family_job" id="family_job" class="__input familyJob"></td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="intimacy_chk3" id="intimacy_chk11" class="careChk intimacyChk"><label for="intimacy_chk11">1</label></li>
                                                    <li><input type="radio" name="intimacy_chk3" id="intimacy_chk12" class="careChk intimacyChk"><label for="intimacy_chk12">2</label></li>
                                                    <li><input type="radio" name="intimacy_chk3" id="intimacy_chk13" class="careChk intimacyChk"><label for="intimacy_chk13">3</label></li>
                                                    <li><input type="radio" name="intimacy_chk3" id="intimacy_chk14" class="careChk intimacyChk"><label for="intimacy_chk14">4</label></li>
                                                    <li><input type="radio" name="intimacy_chk3" id="intimacy_chk15" class="careChk intimacyChk"><label for="intimacy_chk15">5</label></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="together_chk3" id="together_chk5" class="careChk"><label for="together_chk5">동거</label></li>
                                                    <li><input type="radio" name="together_chk3" id="together_chk6" class="careChk"><label for="together_chk6">비동거</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="pc_tr">
                                            <td><input type="text" name="family_name" id="family_name" class="__input familyName"></td>
                                            <td><input type="text" name="family_rela" id="family_rela" class="__input familyRela"></td>
                                            <td><input type="text" name="family_age" id="family_age" class="__input familyAge"></td>
                                            <td><input type="text" name="family_ability" id="family_ability" class="__input familyAbility"></td>
                                            <td><input type="text" name="family_job" id="family_job" class="__input familyJob"></td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="intimacy_chk4" id="intimacy_chk16" class="careChk intimacyChk"><label for="intimacy_chk16">1</label></li>
                                                    <li><input type="radio" name="intimacy_chk4" id="intimacy_chk17" class="careChk intimacyChk"><label for="intimacy_chk17">2</label></li>
                                                    <li><input type="radio" name="intimacy_chk4" id="intimacy_chk18" class="careChk intimacyChk"><label for="intimacy_chk18">3</label></li>
                                                    <li><input type="radio" name="intimacy_chk4" id="intimacy_chk19" class="careChk intimacyChk"><label for="intimacy_chk19">4</label></li>
                                                    <li><input type="radio" name="intimacy_chk4" id="intimacy_chk20" class="careChk intimacyChk"><label for="intimacy_chk20">5</label></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="together_chk4" id="together_chk7" class="careChk"><label for="together_chk7">동거</label></li>
                                                    <li><input type="radio" name="together_chk4" id="together_chk8" class="careChk"><label for="together_chk8">비동거</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr class="mobile_tr">
                                            <th>
                                                <p>
                                                    <strong>가족관계</strong>
                                                </p>
                                            </th>
                                            <td class="border-bottom">
                                                <div class="row">
                                                    <ul class="list">
                                                        <li>
                                                            <span class="title">이름</span>
                                                            <input type="text" name="family_name" id="family_name" class="__input familyName">
                                                        </li>
                                                        <li>
                                                            <span class="title">관계</span>
                                                            <input type="text" name="family_rela" id="family_rela" class="__input familyRela">
                                                        </li>
                                                        <li>
                                                            <span class="title">연령</span>
                                                            <input type="text" name="family_age" id="family_age" class="__input familyAge">
                                                        </li>
                                                        <li>
                                                            <span class="title">학력</span>
                                                            <input type="text" name="family_ability" id="family_ability" class="__input familyAbility">
                                                        </li>
                                                        <li>
                                                            <span class="title">직업</span>
                                                            <input type="text" name="family_job" id="family_job" class="__input familyJob">
                                                        </li>
                                                        <li>
                                                            <span class="title">친밀도</span>
                                                            <ul class="radio_wr grid-5">
                                                                <li><input type="radio" name="intimacy_chk" id="intimacy_chk1" class="careChk intimacyChk"><label for="intimacy_chk1">1</label></li>
                                                                <li><input type="radio" name="intimacy_chk" id="intimacy_chk2" class="careChk intimacyChk"><label for="intimacy_chk2">2</label></li>
                                                                <li><input type="radio" name="intimacy_chk" id="intimacy_chk3" class="careChk intimacyChk"><label for="intimacy_chk3">3</label></li>
                                                                <li><input type="radio" name="intimacy_chk" id="intimacy_chk4" class="careChk intimacyChk"><label for="intimacy_chk4">4</label></li>
                                                                <li><input type="radio" name="intimacy_chk" id="intimacy_chk5" class="careChk intimacyChk"><label for="intimacy_chk5">5</label></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span class="title">동거여부</span>
                                                            <ul class="radio_wr grid-2">
                                                                <li><input type="radio" name="together_chk" id="together_chk1" class="careChk"><label for="together_chk1">동거</label></li>
                                                                <li><input type="radio" name="together_chk" id="together_chk2" class="careChk"><label for="together_chk2">비동거</label></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="row">
                                                    <ul class="list">
                                                        <li>
                                                            <span class="title">이름</span>
                                                            <input type="text" name="family_name" id="family_name" class="__input familyName">
                                                        </li>
                                                        <li>
                                                            <span class="title">관계</span>
                                                            <input type="text" name="family_rela" id="family_rela" class="__input familyRela">
                                                        </li>
                                                        <li>
                                                            <span class="title">연령</span>
                                                            <input type="text" name="family_age" id="family_age" class="__input familyAge">
                                                        </li>
                                                        <li>
                                                            <span class="title">학력</span>
                                                            <input type="text" name="family_ability" id="family_ability" class="__input familyAbility">
                                                        </li>
                                                        <li>
                                                            <span class="title">직업</span>
                                                            <input type="text" name="family_job" id="family_job" class="__input familyJob">
                                                        </li>
                                                        <li>
                                                            <span class="title">친밀도</span>
                                                            <ul class="radio_wr grid-5">
                                                                <li><input type="radio" name="intimacy_chk2" id="intimacy_chk6" class="careChk intimacyChk"><label for="intimacy_chk6">1</label></li>
                                                                <li><input type="radio" name="intimacy_chk2" id="intimacy_chk7" class="careChk intimacyChk"><label for="intimacy_chk7">2</label></li>
                                                                <li><input type="radio" name="intimacy_chk2" id="intimacy_chk8" class="careChk intimacyChk"><label for="intimacy_chk8">3</label></li>
                                                                <li><input type="radio" name="intimacy_chk2" id="intimacy_chk9" class="careChk intimacyChk"><label for="intimacy_chk9">4</label></li>
                                                                <li><input type="radio" name="intimacy_chk2" id="intimacy_chk10" class="careChk intimacyChk"><label for="intimacy_chk10">5</label></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span class="title">동거여부</span>
                                                            <ul class="radio_wr grid-2">
                                                                <li><input type="radio" name="together_chk2" id="together_chk3" class="careChk"><label for="together_chk3">동거</label></li>
                                                                <li><input type="radio" name="together_chk2" id="together_chk4" class="careChk"><label for="together_chk4">비동거</label></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="row">
                                                    <ul class="list">
                                                        <li>
                                                            <span class="title">이름</span>
                                                            <input type="text" name="family_name" id="family_name" class="__input familyName">
                                                        </li>
                                                        <li>
                                                            <span class="title">관계</span>
                                                            <input type="text" name="family_rela" id="family_rela" class="__input familyRela">
                                                        </li>
                                                        <li>
                                                            <span class="title">연령</span>
                                                            <input type="text" name="family_age" id="family_age" class="__input familyAge">
                                                        </li>
                                                        <li>
                                                            <span class="title">학력</span>
                                                            <input type="text" name="family_ability" id="family_ability" class="__input familyAbility">
                                                        </li>
                                                        <li>
                                                            <span class="title">직업</span>
                                                            <input type="text" name="family_job" id="family_job" class="__input familyJob">
                                                        </li>
                                                        <li>
                                                            <span class="title">친밀도</span>
                                                            <ul class="radio_wr grid-5">
                                                                <li><input type="radio" name="intimacy_chk3" id="intimacy_chk11" class="careChk intimacyChk"><label for="intimacy_chk11">1</label></li>
                                                                <li><input type="radio" name="intimacy_chk3" id="intimacy_chk12" class="careChk intimacyChk"><label for="intimacy_chk12">2</label></li>
                                                                <li><input type="radio" name="intimacy_chk3" id="intimacy_chk13" class="careChk intimacyChk"><label for="intimacy_chk13">3</label></li>
                                                                <li><input type="radio" name="intimacy_chk3" id="intimacy_chk14" class="careChk intimacyChk"><label for="intimacy_chk14">4</label></li>
                                                                <li><input type="radio" name="intimacy_chk3" id="intimacy_chk15" class="careChk intimacyChk"><label for="intimacy_chk15">5</label></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span class="title">동거여부</span>
                                                            <ul class="radio_wr grid-2">
                                                                <li><input type="radio" name="together_chk3" id="together_chk5" class="careChk"><label for="together_chk5">동거</label></li>
                                                                <li><input type="radio" name="together_chk3" id="together_chk6" class="careChk"><label for="together_chk6">비동거</label></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="row">
                                                    <ul class="list">
                                                        <li>
                                                            <span class="title">이름</span>
                                                            <input type="text" name="family_name" id="family_name" class="__input familyName">
                                                        </li>
                                                        <li>
                                                            <span class="title">관계</span>
                                                            <input type="text" name="family_rela" id="family_rela" class="__input familyRela">
                                                        </li>
                                                        <li>
                                                            <span class="title">연령</span>
                                                            <input type="text" name="family_age" id="family_age" class="__input familyAge">
                                                        </li>
                                                        <li>
                                                            <span class="title">학력</span>
                                                            <input type="text" name="family_ability" id="family_ability" class="__input familyAbility">
                                                        </li>
                                                        <li>
                                                            <span class="title">직업</span>
                                                            <input type="text" name="family_job" id="family_job" class="__input familyJob">
                                                        </li>
                                                        <li>
                                                            <span class="title">친밀도</span>
                                                            <ul class="radio_wr grid-5">
                                                                <li><input type="radio" name="intimacy_chk4" id="intimacy_chk16" class="careChk intimacyChk"><label for="intimacy_chk16">1</label></li>
                                                                <li><input type="radio" name="intimacy_chk4" id="intimacy_chk17" class="careChk intimacyChk"><label for="intimacy_chk17">2</label></li>
                                                                <li><input type="radio" name="intimacy_chk4" id="intimacy_chk18" class="careChk intimacyChk"><label for="intimacy_chk18">3</label></li>
                                                                <li><input type="radio" name="intimacy_chk4" id="intimacy_chk19" class="careChk intimacyChk"><label for="intimacy_chk19">4</label></li>
                                                                <li><input type="radio" name="intimacy_chk4" id="intimacy_chk20" class="careChk intimacyChk"><label for="intimacy_chk20">5</label></li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <span class="title">동거여부</span>
                                                            <ul class="radio_wr grid-2">
                                                                <li><input type="radio" name="together_chk4" id="together_chk7" class="careChk"><label for="together_chk7">동거</label></li>
                                                                <li><input type="radio" name="together_chk4" id="together_chk8" class="careChk"><label for="together_chk8">비동거</label></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">가족형태</td>
                                            <td class="border-bottom flex-left" colspan="7">
                                                <ul class="radio_wr grid-1">
                                                    <li><input type="radio" name="family_chk" id="family_chk1" class="careChk familyChk1"><label for="family_chk1">결혼가정</label></li>
                                                    <li><input type="radio" name="family_chk" id="family_chk2" class="careChk familyChk2"><label for="family_chk2">한부모가정</label></li>
                                                    <li><input type="radio" name="family_chk" id="family_chk3" class="careChk familyChk3"><label for="family_chk3">재혼가정</label></li>
                                                    <li><input type="radio" name="family_chk" id="family_chk4" class="careChk familyChk4"><label for="family_chk4">독신가정</label></li>
                                                    <li><input type="radio" name="family_chk" id="family_chk5" class="careChk familyChk5"><label for="family_chk5">다문화가정</label></li>
                                                    <li><input type="radio" name="family_chk" id="family_chk6" class="careChk familyChk6"><label for="family_chk6">기타</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom">경제상항</td>
                                            <td class="border-bottom flex-left" colspan="7">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="level_chk" id="level_chk1" class="careChk levelChk1"><label for="level_chk1">상</label></li>
                                                    <li><input type="radio" name="level_chk" id="level_chk2" class="careChk levelChk2"><label for="level_chk2">중</label></li>
                                                    <li><input type="radio" name="level_chk" id="level_chk3" class="careChk levelChk3"><label for="level_chk3">하</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th rowspan="2" colspan="2">
                                                <p><strong>상담경험여부</strong></p>
                                            </th>
                                            <td class="w100" rowspan="2">
                                                <ul class="radio_wr grid-2">
                                                    <li><input type="radio" name="counseling_experience" id="counseling_experience1" class="careChk"><label for="counseling_experience1">있다</label></li>
                                                    <li><input type="radio" name="counseling_experience" id="counseling_experience2" class="careChk"><label for="counseling_experience2">없다</label></li>
                                                </ul>
                                            </td>
                                            <td class="title_zo border-bottom mobile-w100 mobile-w100-border" colspan="3">
                                                <p><strong>상담경험시기(횟수)</strong></p>
                                            </td>
                                            <td class="border-bottom mobile-w100" colspan="4">
                                                <div class="counseling_count_wr">
                                                    <input type="date" name="counseling_date" id="counseling_date" class="__input counselingDate">
                                                    <div class="count">
                                                        (<input type="text" name="counseling_count" id="counseling_count" class="__input counselingCount"> 회)
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="title_zo border-bottom" colspan="3">
                                                <p><strong>상담기관 또는 병원</strong></p>
                                            </td>
                                            <td class="border-bottom" colspan="4">
                                                <input type="text" name="counseling_hospital" id="counseling_hospital" class="__input counselingHospital">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th rowspan="2">
                                                <p><strong>상담영역</strong></p>
                                            </th>
                                            <td class="title_zo border-bottom">
                                                <p><strong>상담유형</strong></p>
                                            </td>
                                            <td class="border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="type_chk" id="type_chk1" class="careChk typeChk1"><label for="type_chk1">개별상담</label></li>
                                                    <li><input type="radio" name="type_chk" id="type_chk2" class="careChk typeChk2"><label for="type_chk2">화상상담</label></li>
                                                    <li><input type="radio" name="type_chk" id="type_chk3" class="careChk typeChk3"><label for="type_chk3">전화상담</label></li>
                                                </ul>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="w100 background_f9">
                                                <p>
                                                    <strong>상담내용</strong>
                                                </p>
                                            </td>
                                            <td class="w100 border-bottom flex-left" colspan="8">
                                                <ul class="checkbox_wr grid-1">
                                                    <li><input type="checkbox" name="content_chk" id="content_chk1" class="checkbox contentChk1"><label for="content_chk1">영유아 발달 및 문제행동</label></li>
                                                    <li><input type="checkbox" name="content_chk" id="content_chk2" class="checkbox contentChk2"><label for="content_chk2">양육방법</label></li>
                                                    <li><input type="checkbox" name="content_chk" id="content_chk3" class="checkbox contentChk3"><label for="content_chk3">어린이집 관련</label></li>
                                                    <li><input type="checkbox" name="content_chk" id="content_chk4" class="checkbox contentChk4"><label for="content_chk4">가족관계 어려움</label></li>
                                                    <li><input type="checkbox" name="content_chk" id="content_chk5" class="checkbox contentChk5"><label for="content_chk5">심리관련</label></li>
                                                    <li><input type="checkbox" name="content_chk" id="content_chk6" class="checkbox contentChk6"><label for="content_chk6">기타</label></li>
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
                                                <textarea name="counseling_information2" id="counseling_information2" class="__textarea counseling"></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="2">
                                                <p>
                                                    <strong>신청경로</strong>
                                                </p>
                                            </th>
                                            <td class="w100 border-bottom flex-left" colspan="8">
                                                <ul class="radio_wr grid-2">
                                                    <li><input type="radio" name="care_chk8" id="care_chk34" class="careChk careChk1"><label for="care_chk34">인터넷</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk35" class="careChk careChk2"><label for="care_chk35">홍보물</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk36" class="careChk careChk3"><label for="care_chk36">주변권유(이용자추천)</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk37" class="careChk careChk4"><label for="care_chk37">교육</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk38" class="careChk careChk5"><label for="care_chk38">기타</label></li>
                                                </ul>
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
                                    <a href="<?=DIR?>/study/center_4.php" class="cancle_btn">취소하기</a>
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
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    function sample5_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                var addr = data.address; // 최종 주소 변수

                // 주소 정보를 해당 필드에 넣는다.
                document.getElementById("counseling_addr").value = addr;
            }
        }).open();
    }
</script>
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

        if ($("input[name=care_chk]:radio:checked").length < 1) {
            alert("결혼여부를 선택해주세요");
            $("input[name=care_chk]").select();
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

        if ($("#counseling_addr").val() == "") {
            alert("주소를 입력해주세요");
            $("#counseling_addr").select();
            return false;
        }

        if ($("input[name=relationship_chk]:radio:checked").length < 1) {
            alert("상담대상과의 관계를 선택해주세요");
            $("input[name=relationship_chk]").select();
            return false;
        }

        if ($("input[name=family_chk]:radio:checked").length < 1) {
            alert("가족형태를 선택해주세요");
            $("input[name=family_chk]").select();
            return false;
        }

        if ($("input[name=level_chk]:radio:checked").length < 1) {
            alert("경제상항을 선택해주세요");
            $("input[name=level_chk]").select();
            return false;
        }

        if ($("input[name=counseling_experience]:radio:checked").length < 1) {
            alert("상담경험여부를 선택해주세요");
            $("input[name=counseling_experience]").select();
            return false;
        }

        if ($("input[name=type_chk]:radio:checked").length < 1) {
            alert("상담유형을 선택해주세요");
            $("input[name=type_chk]").select();
            return false;
        }

        if ($("input[name=content_chk]:checkbox:checked").length < 1) {
            alert("상담내용을 선택해주세요");
            $("input[name=content_chk]").select();
            return false;
        }

        if ($("#counseling_information2").val() == "") {
            alert("신청사유를 입력해주세요");
            $("#counseling_information2").select();
            return false;
        }

        if ($("input[name=care_chk8]:radio:checked").length < 1) {
            alert("신청경로를 선택해주세요");
            $("input[name=care_chk8]").select();
            return false;
        }

        f.action = "";
        f.submit();
    }
</script>
</html>