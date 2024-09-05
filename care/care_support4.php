<? 
$_dep = array(2,7,4);
$_tit = array('어린이집지원','대체인력지원','어린이집직접채용');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub07-page sub07-4-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/care_support.php" class=""><span>대체교사인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support2.php" class=""><span>대체조리원인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support3.php" class=""><span>긴급대체교사지원신청</span></a>
                        <a href="<?=DIR?>/care/care_support4.php" class="active"><span>어린이집직접채용</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>대체교사 인력지원을 받지 못한 경우 어린이집에서 직접 채용한 대체교사에게 인건비를 지원해 줌으로써 어린이집의 원활한 운영에 도움을 주고자 함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>어린이집 직접채용 대체교사 인건비 지원 절차</h3>
                        </div>

                        <ul class="list_box_wr grid-5">
                            <li>
                                <span class="title">인력 확인</span>
                                <ul class="text_wr">
                                   <li>어린이집 → 육아종합지원센터</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">사전확인신청서 제출</span>
                                <ul class="text_wr">
                                   <li>어린이집 → 육아종합지원센터 홈페이지 작성 후 제출</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">사전확인증 발급</span>
                                <ul class="text_wr">
                                   <li>육아종합지원센터 → 어린이집(마이페이지)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">임면서류 제출</span>
                                <ul class="text_wr">
                                   <li>어린이집 → 지자체 담당(사전확인증 포함)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">인건비 신청</span>
                                <ul class="text_wr">
                                   <li>어린이집(증빙자료 첨부)신청 → 지자체 교부</li> 
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사전확인 신청서 작성</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>※ 사전확인증 승인 여부 : 1~2일 소요 됨(주말제외)</li>
                        </ul>

                        <form action="?" method="post" name="care_frm" id="care_frm" class="careFrm">
                            <div class="table_wr __mt30">
                                <table class="__table">
                                    <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 20%;">
                                        <col style="width: 70%;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th colspan="2">어린이집 명</th>
                                            <td>
                                                <input type="text" name="care_name" id="care_name" class="__input careFrm_name" value="A어린이집" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">보육교사 명</th>
                                            <td>
                                                <input type="text" name="care_name" id="care_name" class="__input careFrm_name">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">반 연령</th>
                                            <td>
                                                <input type="text" name="care_year" id="care_year" class="__input careFrm_year">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">임용일</th>
                                            <td>
                                                <input type="date" name="care_day1" id="care_day1" class="__input careFrm_day1">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">신청기간</th>
                                            <td>
                                                <div class="date_box">
                                                    <input type="date" name="care_day2" id="care_day2" class="__input careFrm_day2">
                                                    <p>~</p>
                                                    <input type="date" name="care_day3" id="care_day3" class="__input careFrm_day3">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <th rowspan="12">신청사유</th>
                                            <td class="mbw30">교육</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk" id="care_chk1" class="careChk careChk1"><label for="care_chk1">보수교육(직무교육)</label></li>
                                                    <li><input type="radio" name="care_chk" id="care_chk2" class="careChk careChk2"><label for="care_chk2">승급교육</label></li>
                                                    <li><input type="radio" name="care_chk" id="care_chk3" class="careChk careChk3"><label for="care_chk3">원장사전직무교육</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">결혼 및 휴가</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk2" id="care_chk4" class="careChk careChk1"><label for="care_chk4">본인결혼</label></li>
                                                    <li><input type="radio" name="care_chk2" id="care_chk5" class="careChk careChk2"><label for="care_chk5">연가</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">예비군 훈련</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk3" id="care_chk6" class="careChk careChk1"><label for="care_chk6">훈련기간</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">건강검진</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk4" id="care_chk7" class="careChk careChk1"><label for="care_chk7">건강검진 1일</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">어린이집 사후 방문 지원</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk5" id="care_chk8" class="careChk careChk1"><label for="care_chk8">어린이집 사후 방문(컨설팅)지원</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">아동학대 후속조치를 위한 긴급 보육지원</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk6" id="care_chk9" class="careChk careChk1"><label for="care_chk9">아동학대 후속조치를 위한 긴급 보육지원 등(아동학대로 인한 격리조치 등)</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">보육교사 권익보호를 위한 긴급지원</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk7" id="care_chk10" class="careChk careChk1"><label for="care_chk10">보육교사 권익보호를 위한 긴급지원</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">가족상</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk8" id="care_chk11" class="careChk careChk1"><label for="care_chk11">배우자, 본인 및 배우자의 부모</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk12" class="careChk careChk2"><label for="care_chk12">본인 및 배우자의 조부모·․ 외조부모</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk13" class="careChk careChk3"><label for="care_chk13">자녀와 그 자녀의 배우자</label></li>
                                                    <li><input type="radio" name="care_chk8" id="care_chk14" class="careChk careChk4"><label for="care_chk14">본인 및 배우자의 형제자매</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">본인 질병 등 사고</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk9" id="care_chk15" class="careChk careChk1"><label for="care_chk15">감염성 질환, 긴급 수술, 교통사고 등</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">모성보호</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk10" id="care_chk16" class="careChk careChk1"><label for="care_chk16">인공수정 또는 체외수정 등 난임치료</label></li>
                                                    <li><input type="radio" name="care_chk10" id="care_chk17" class="careChk careChk2"><label for="care_chk17">유산 (~11주미만(5일) / 12~15주(10일))</label></li>
                                                    <li><input type="radio" name="care_chk10" id="care_chk18" class="careChk careChk3"><label for="care_chk18">임산부·영유아·미숙아등의 건강관리등 (산전관리, 건강검진, 예방접종 등)</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">일,가정양립</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk11" id="care_chk18" class="careChk careChk1"><label for="care_chk18">배우자 출산휴가</label></li>
                                                    <li><input type="radio" name="care_chk11" id="care_chk19" class="careChk careChk2"><label for="care_chk19">가족돌봄휴가 (기족의 질병,사고,노령 또는 자녀의 양육)</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <td class="mbw30">퇴직</td>
                                            <td class="mbw70">
                                                <ul class="radio_wr">
                                                    <li><input type="radio" name="care_chk12" id="care_chk20" class="careChk careChk1"><label for="care_chk20">보육교사의 퇴직</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="left_wr">
                                            <th colspan="2">어린이집 확인</th>
                                            <td>
                                                <div class="check_wr">
                                                    <input type="checkbox" name="agreebtn" id="agreebtn" class="__agreebtn"><label for="agreebtn">위 신청 사유에 따라 대체교사 인건비 지원을 신청하며 사실과 틀림 없음을 확인함</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <ul class="dot_list">
                                                    <li>사전확인증 확인 및 출력은 마이페이지에서 가능 합니다.</li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="button_wr __mt20">
                                    <button type="submit" class="submit_btn">신청하기</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-3494-3559</li>
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
</html>