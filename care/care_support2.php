<? 
$_dep = array(2,7,2);
$_tit = array('어린이집지원','대체인력지원','대체조리원인력지원');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub07-page sub07-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/care_support.php" class=""><span>대체교사인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support2.php" class="active"><span>대체조리원인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support3.php" class=""><span>긴급대체교사지원신청</span></a>
                        <a href="<?=DIR?>/care/care_support4.php" class=""><span>어린이집직접채용</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>어린이집에 대체조리원을 지원하여 급식 공백을 최소화 하고 어린이집 채용 부담 경감과 조리사의 업무 만족도 상승을 도모하고자 함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>지원대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>임용 보고된 어린이집 조리원</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>지원기준</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>조리원 8시간 근무 우선지원</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>지원사유 및 지원일수</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <colgroup>
                                    <col style="width: 10%;">
                                    <col style="width: 20%;">
                                    <col style="width: 60%;">
                                    <col style="width: 10%;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="tbh01">우선순위</th>
                                        <th class="tbh02" colspan="2">지원사유</th>
                                        <th class="tbh03">지원일수</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td colspan="2">아동학대 후속조치를 위한 긴급 급식 지원</td>
                                        <td rowspan="11">1일~3일</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td colspan="2" class="border-right">본인 및 배우자의 직계존(비)속 사망</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2" class="border-right">감염성질환, 긴급수술, 교통사고등</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td colspan="2" class="border-right">본인 결혼 우선지원</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td colspan="2" class="border-right">연가</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td colspan="2" class="border-right">가족돌봄휴가(가족의 질병, 사고, 노령 또는 자녀의 양육)</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">7</td>
                                        <td rowspan="3">모성보호</td>
                                        <td class="border-right">인공수정 또는 체외수정 등 난임치료</td>
                                    </tr>
                                    <tr>
                                        <td class="border-right">유산</td>
                                    </tr>
                                    <tr>
                                        <td class="border-right">임산부•영유아•미숙아등의 건강관리등 (산전관리 ,건겅검진, 예방법종등) </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td colspan="2" class="border-right">조리원 퇴사 (퇴직 후 2주이내 신청)</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td colspan="2" class="border-right">보수교육(직무교육 우선지원)</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td colspan="2">예비군 훈련</td>
                                        <td>훈련기간</td>
                                    </tr>
                                    <tr>
                                        <td>11</td>
                                        <td colspan="2">건강검진</td>
                                        <td>1일</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="information_text">※ 필요시 증빙자료 제출( 사망진단서,병원진료 소견서,청첩장, 교육 수료증)</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>대체조리원 지원절차</h3>
                        </div>

                        <ul class="list_box_wr grid-4">
                            <li>
                                <span class="title">대체조리원 신청</span>
                                <ul class="text_wr">
                                   <li>서울시보육포털서비스 (전월 1일~10일)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대체조리원 확정</span>
                                <ul class="text_wr">
                                   <li>서울시보육포털서비스 > 대체조리원신청 내역확인 (신청→배치)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대체조리원 지원</span>
                                <ul class="text_wr">
                                   <li>대체조리원 1일~최대 3일 근무</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">지원 종료</span>
                                <ul class="text_wr">
                                   <li>대체조리원 평가지 [N] 등록</li> 
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>유의사항</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>매월 시스템을 통한 선 신청과 지원이 이루어지므로 긴급한 사유(경조사, 병가등)에 대한 지원이 어려울 수 있음</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="http://iseoul.seoul.go.kr/portal/mainCall.do" target="_blank" class="__btn4">배치결과확인 바로가기</a>
                            <a href="<?=DIR?>/study/care3.php" target="_blank" class="__btn4">대체인력추가신청 바로가기</a>
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