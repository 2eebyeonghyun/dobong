<? 
$_dep = array(2,9,1);
$_tit = array('어린이집지원','기타지원사업','어린이집안전관리 전문요원 운영');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub09-page sub09-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/another_support2.php" class="active"><span>어린이집안전관리</span></a>
                        <a href="<?=DIR?>/care/another_support.php" class=""><span>서울형모아어린이집</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>어린이집의 안전을 진단하고, 경보수를 지원하여 안전한 보육 환경 조성을 지원함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>운영기간</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>매년 3월부터 12월까지</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>지원대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 모든 어린이집</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>세부내용</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">구분</th>
                                        <th class="tbh02">내용</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th rowspan="3">안전진단</th>
                                        <td>
                                            <ul class="dot_list">
                                                <li>필수진단 ➜ 노후시설(준공 30년 이상), 신규시설(개원 1년 이내)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul class="dot_list">
                                                <li>선택진단 ➜ 안전진단 · 경보수 신청시설 (<b>매년 첫 경보수 신청 시 안전진단 동시 실시</b>)<br> (안전진단 거부 시설은 서비스 이용 불가)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul class="dot_list">
                                                <li>안전 진단 목록에 대해 점검하고 결과를 어린이집에 안내<br> (진단 목록은 소방·시설·안전 관련 법령·서울형 평가항목 기반 제작)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>경보수</th>
                                        <td>
                                            <ul class="dot_list">
                                                <li>1개소 <b>연 10회 내에서, 월 2회까지</b> 제공<br> (센터 주도적 안전점검이나 여유일정에 따른 추가 경보수지원은 제공 횟수 무관)</li>
                                                <li>안전관리관이 경보수 가능한 항목 지원<br> (신청서 하단에 기록된 [서식2] 어린이집 안전관리 전문요원 경보수 제공 항목을 참고)</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>운영절차</h3>
                        </div>

                        <ul class="list_box_wr grid-4">
                            <li>
                                <span class="title">신청 및 접수</span>
                                <ul class="text_wr">
                                   <li>신청서 다운로드</li> 
                                   <li>신청서 작성</li> 
                                   <li>이메일 혹은 팩스를 통한 신청서 접수</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">사전확인</span>
                                <ul class="text_wr">
                                   <li>담당자와 전화연락 (방문일정 및 내용협의)</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">어린이집 방문</span>
                                <ul class="text_wr">
                                   <li>안전진단 또는 경보수 진행</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">만족도조사 제출(센터)</span>
                                <ul class="text_wr">
                                   <li>만족도조사 다운로드</li> 
                                   <li>만족도조사 작성</li> 
                                   <li>이메일 혹은 팩스를 통한 만족도 제출</li> 
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>유의사항</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>가급적이면 원아와 접촉하지 않은 시간대와 장소를 마련하고 신청 접수</li>
                            <li>경보수는 간단한 보수를 말하는 것으로 부품 및 재료는 어린이집에서 준비</li>
                            <li>어린이집에서 준비할 수 없는 부품은 자체적으로 업체를 통해 보수</li>
                            <li>업체에서 A/S가능한 부분은 업체 문의</li>
                            <li>신청서 작성 외 현장에서의 추가 요청은 삼가 주시길 바라며, 추가요청이 필요할 경우 추후 신청서를 재제출</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/홈페이지-안전관리 서식1(안전진단신청서).hwp" target="_blank" class="__btn4" download>안전진단신청서 다운로드</a>
                            <a href="<?=DIR?>/홈페이지-안전관리 서식2(경보수신청서).hwp" target="_blank" class="__btn4" download>경보수신청서 다운로드</a>
                            <a href="<?=DIR?>/홈페이지-안전관리 서식3(만족도조사).hwp" target="_blank" class="__btn4" download>만족도조사 다운로드</a>
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