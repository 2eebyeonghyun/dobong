<? 
$_dep = array(2,7,3);
$_tit = array('어린이집지원','대체인력지원','긴급대체교사지원신청');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub07-page sub07-3-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/care_support.php" class=""><span>대체교사인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support2.php" class=""><span>대체조리원인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support3.php" class="active"><span>긴급대체교사지원신청</span></a>
                        <a href="<?=DIR?>/care/care_support4.php" class=""><span>어린이집직접채용</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>어린이집 교사의 갑작스런 질병 또는 가족상, 모성보호, 일가정 양립, 퇴직등의 사유로 업무공백이 생겼을 때 긴급 대체교사를 지원하여 안정적인 보육 일과 진행을 돕고자 함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>신청사유 및 지원일수</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <colgroup>
                                    <col style="width: 10%;">
                                    <col style="width: 10%;">
                                    <col style="width: 45%;">
                                    <col style="width: 20%;">
                                    <col style="width: 15%;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td rowspan="13">긴급</td>
                                        <td rowspan="2">최우선</td>
                                        <td>아동학대 후속조치를 위한 긴급 보육지원 등(아동학대로 인한 격리조치 등)</td>
                                        <td class="border-right">기간제한 없음</td>
                                        <td rowspan="2">어린이집 확인서</td>
                                    </tr>
                                    <tr>
                                        <td>보육교사 권익보호를 위한 긴급지원 등</td>
                                        <td class="border-right">1~10일</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="4">가족상</td>
                                        <td>배우자, 본인 및 배우자의 부모</td>
                                        <td>5일</td>
                                        <td rowspan="4">사망진단서</td>
                                    </tr>
                                    <tr>
                                        <td>본인 및 배우자의 조부모·․ 외조부모</td>
                                        <td class="border-right">3일</td>
                                    </tr>
                                    <tr>
                                        <td>자녀와 그 자녀의 배우자</td>
                                        <td class="border-right">3일</td>
                                    </tr>
                                    <tr>
                                        <td>본인 및 배우자의 형제자매</td>
                                        <td class="border-right">1일</td>
                                    </tr>
                                    <tr>
                                        <td>본인 질병 등 사고</td>
                                        <td>감염성 질환, 긴급 수술, 교통사고 등</td>
                                        <td>1~5일 (최대10일)</td>
                                        <td>소견서</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">모성보호</td>
                                        <td>인공수정 또는 체외수정 등 난임치료</td>
                                        <td>1일(최대3일)</td>
                                        <td rowspan="5">진료 확인서</td>
                                    </tr>
                                    <tr>
                                        <td>유산(~11주미만(5일)/12~15주(10일))</td>
                                        <td class="border-right">5일(최대10일)</td>
                                    </tr>
                                    <tr>
                                        <td>임산부·영유아·미숙아등의 건강관리등 (산전관리, 건강검진, 예방접종 등)</td>
                                        <td class="border-right">1일(최대3일)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">일,가정 양립</td>
                                        <td>배우자 출산휴가</td>
                                        <td class="border-right">1일(최대5일)</td>
                                    </tr>
                                    <tr>
                                        <td>가족돌봄휴가(기족의 질병,사고,노령 또는 자녀의 양육)</td>
                                        <td class="border-right">1일(최대3일)</td>
                                    </tr>
                                    <tr>
                                        <td>퇴직</td>
                                        <td>보육교사의 퇴직</td>
                                        <td>1~5일(최대5일)</td>
                                        <td>사직서</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>신청방법</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>달력창의 신청 가능 날짜 확인 후 전날 오후 6시 전 또는 당일 9시 전화 접수</li>
                        </ul>

                        <div class="calendar_day_wr __mt30">
                            <a href="#none" class="cal_btn prev_btn"><i class="axi axi-keyboard-arrow-left"></i></a>
                            <span class="cal_day">2024년 05월</span>
                            <a href="#none" class="cal_btn next_btn"><i class="axi axi-keyboard-arrow-right"></i></a>
                        </div>

                        <div class="table_wr __mt30">
                            <div class="mobile_information_wr">
                                <ul class="list">
                                    <li><span class="ball close"></span><p class="text">마감</p></li>
                                    <li><span class="ball"></span><p class="text">신청가능</p></li>
                                </ul>
                            </div>
                            <table class="__table calendar_table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">월</th>
                                        <th class="tbh02">화</th>
                                        <th class="tbh03">수</th>
                                        <th class="tbh04">목</th>
                                        <th class="tbh05">금</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="empty"></td>
                                        <td class="empty"></td>
                                        <td class="holiday">
                                            <span class="day">1</span>
                                            <div class="contents">
                                                <p class="text close">근로자의날 미지원</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">2</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">3</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="holiday">
                                            <span class="day">6</span>
                                            <div class="contents">
                                                <p class="text close">대체 공휴일</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">7</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">8</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">9</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">10</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span class="day">13</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">14</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="holiday">
                                            <span class="day">15</span>
                                            <div class="contents">
                                                <p class="text close">석가탄신일 미지원</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">16</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">17</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span class="day">20</span>
                                            <div class="contents">
                                                <p class="text close">마감</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">21</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">22</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">23</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">24</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="">
                                            <span class="day">27</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">28</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="">
                                            <span class="day">29</span>
                                            <div class="contents">
                                                <p class="text open">신청가능</p>
                                            </div>
                                        </td>
                                        <td class="empty"></td>
                                        <td class="empty"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="information_text">※ 증빙자료: 사유별 증빙자료 센터로 제출</p>
                        </div>
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