<? 
$_dep = array(2,7,1);
$_tit = array('어린이집지원','대체인력지원','대체교사인력지원');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub07-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/care_support.php" class="active"><span>대체교사인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support2.php" class=""><span>대체조리원인력지원</span></a>
                        <a href="<?=DIR?>/care/care_support3.php" class=""><span>긴급대체교사지원신청</span></a>
                        <a href="<?=DIR?>/care/care_support4.php" class=""><span>어린이집직접채용</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>보육교사의 휴가,보수교육 등으로 업무에 공백이 생기는 경우 이를 대체할 수 있는 대체교사를 배치 받음으로써 어린이집의 원활한 운영을 지원하고 보육교사에게는 재충전의 기회와 자기개발 등의 기회를 가질 수 있도록 지원함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>지원내용</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <thead>
                                    <tr>
                                        <th class="tbh01" colspan="2">구분</th>
                                        <th class="tbh02" colspan="3">국•·시비 지원</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td colspan="2">지원대상</td>
                                        <td colspan="3">담임교사(보육교사, 특수교사), 교사 겸직원장, 연장보육 전담교사, 야간연장 보육교사, 대표자 겸직 담임교사, 대표자 겸 교사겸직원장<br> ※교사 겸직 원장의 경우, 연간 최대 15일, 보조교사 등은 미지원</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="7">상시</td>
                                        <td>1</td>
                                        <td>보수교육(직무교육)</td>
                                        <td>5일</td>
                                        <td rowspan="7">매월 신청</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">2</td>
                                        <td>본인결혼(우선지원)</td>
                                        <td class="border-right">1~5일</td>
                                    </tr>

                                    <tr>
                                        <td>연가</td>
                                        <td class="border-right">연간 1일~15일</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="2">3</td>
                                        <td>예비군 훈련</td>
                                        <td class="border-right">훈련기간</td>
                                    </tr>

                                    <tr>
                                        <td>건강검진</td>
                                        <td class="border-right">1일</td>
                                    </tr>

                                    <tr>
                                        <td>4</td>
                                        <td>어린이집 사후 방문(컨설팅)지원</td>
                                        <td class="border-right">회당 1일</td>
                                    </tr>

                                    <tr>
                                        <td>5</td>
                                        <td>보수교육(승급, 원장사전직무교육)</td>
                                        <td class="border-right">최대10일</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="13">긴급</td>
                                        <td rowspan="2">최우선</td>
                                        <td>아동학대 후속조치를 위한 긴급 보육지원 등 (아동학대로 인한 격리조치 등)</td>
                                        <td>기간제한 없음</td>
                                        <td rowspan="13">수시 신청</td>
                                    </tr>

                                    <tr>
                                        <td>보육교사 권익보호를 위한 긴급지원 등</td>
                                        <td class="border-right">1~10일</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="4">가족상</td>
                                        <td>배우자, 본인 및 배우자의 부모</td>
                                        <td class="border-right">5일</td>
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
                                        <td class="border-right">1~5일(최대10일)</td>
                                    </tr>

                                    <tr>
                                        <td rowspan="3">모성보호</td>
                                        <td>인공수정 또는 체외수정 등 난임치료</td>
                                        <td class="border-right">1일(최대3일)</td>
                                    </tr>

                                    <tr>
                                        <td>유산 (~11주미만(5일)/12~15주(10일))</td>
                                        <td class="border-right">5일(최대10일)</td>
                                    </tr>

                                    <tr>
                                        <td>임산부·영유아·미숙아등의 건강관리등<br> (산전관리, 건강검진, 예방접종 등)</td>
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
                                        <td class="border-right">1~5일(최대 5일)</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">신청<br> [매월1일~10일]</td>
                                        <td colspan="3">
                                            <ul class="link_wr">
                                                <li><a href="http://cpms.childcare.go.kr" target="_blank">보육통합시스템 바로가기</a></li>
                                                <li><a href="http://iseoul.seoul.go.kr/portal/mainCall.do" target="_blank">서울시보육포털서비스 바로가기</a></li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">배치</td>
                                        <td colspan="3">
                                            <ul class="dot_list">
                                                <li>매월 13일 오전10시부터 보육통합시스템에서 배치 대체교사 이름 확인 가능<br> ※ 보육통합시스템>어린이집운영>보육교직원 관리>대체교사<br> (지원 확정시 상태가 “신청”→“배치”로 변경됨, 미지원시 신청 또는 미지원)</li>
                                                <li>미지원 어린이집에 대한 별도 안내 없음</li>
                                            </ul>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">추가신청</td>
                                        <td colspan="3">
                                            <ul class="dot_list">
                                                <li>매월 13일 오후1시부터 대체인력추가신청 현황판에서 확인 후 신청<br> ※ 도봉구육아종합지원센터>교육 및 놀이실예약>대체인력추가신청</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="http://cpms.childcare.go.kr" target="_blank" class="__btn4">배치결과확인 바로가기</a>
                            <a href="<?=DIR?>/study/care3.php" target="_blank" class="__btn4">대체인력추가신청 바로가기</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>대체교사 지원 절차</h3>
                        </div>

                        <ul class="list_box_wr grid-5">
                            <li>
                                <span class="title">어린이집</span>
                                <ul class="text_wr">
                                   <li>전월 1일~10일 대체교사 사전신청</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대체교사확정</span>
                                <ul class="text_wr">
                                   <li>보육통합시스템 > 대체교사 신청내역 확인(신청→배치)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대체교사추가신청</span>
                                <ul class="text_wr">
                                   <li>교육 및 놀이실예약 > 대체인력추가신청</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대체교사지원</span>
                                <ul class="text_wr">
                                   <li>대체교사 근무</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">어린이집</span>
                                <ul class="text_wr">
                                   <li>대체교사 설문지 [N] 등록</li> 
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>유의사항</h3>
                        </div>

                        <div class="information_text_wr __mt15">
                            <span class="title">대체교사의 업무</span>
                            <div class="text_wr">
                                <ul class="list">
                                    <li>담당반의 보육과정 및 일과운영 지원</li>
                                    <li>담당반 교사의 업무분장 구역 청소 및 정리 지원</li>
                                    <li>해당 반의 알림장 작성 및 보육일지 작성 제출</li>
                                </ul>

                                <ul class="info_list">
                                    <li>※ 대체교사의 구체적인 업무분장은 오리엔테이션을 통해 협의해주세요</li>
                                    <li>※ 대체교사는 기본적인 담임교사의 통상 업무를 수행하며, 서업의 목적과 무관한 지시는 지양해 주시길 바랍니다</li>
                                </ul>
                            </div>
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