<? 
$_dep = array(2,4,1);
$_tit = array('어린이집지원','어린이집 컨설팅','평가제');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub04-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/counselting.php" class="active"><span>평가제</span></a>
                        <a href="<?=DIR?>/care/counselting2.php"><span>보육과정 컨설팅</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>보육·양육에 대한 사회적 책임 강화 실현 및 안심 보육환경 조성을 위해 국가 차원에서 모든 어린이집을 주기적으로 평가하여 상시적인 보육서비스 질을 확보하고자 함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>연혁</h3>
                        </div>

                        <ul class="list_box_wr history_list_wr">
                            <li>
                                <span class="day_wr">2004.1.</span>
                                <div class="contents_wr">
                                    <p>어린이집 평가인증제도 도입근거마련 (영유아보육법 제30조)</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2005.1 ~ 12.</span>
                                <div class="contents_wr">
                                    <p>어린이집 평가인증 시범운영실시</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2006.1.</span>
                                <div class="contents_wr">
                                    <p>제1차어린이집 평가인증시행</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2010.2.</span>
                                <div class="contents_wr">
                                    <p>제2차어린이집 평가인증시행</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2014.11.</span>
                                <div class="contents_wr">
                                    <p>3차 시범지표적용</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2017.11.</span>
                                <div class="contents_wr">
                                    <p>제3차어린이집 평가인증시행 (통합지표)</p>
                                </div>
                            </li>
                            <li>
                                <span class="day_wr">2019.6.</span>
                                <div class="contents_wr">
                                    <p>어린이집 평가제 시행</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>평가지표</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>평가지표(4영역 18지표 59항목)</li>
                            <li>영유아 권리 존중, 급간식 위생, 안전 분야 필수지표(요소) 확대</li>
                        </ul>

                        <div class="imgbox __mt20">
                            <img src="<?=DIR?>/img/care/counselting.svg" alt="평가지표 이미지">
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>평가등급</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>어린이집 평가등급은 4등급(A, B, C, D)으로 구분하며, A, B등급은 3년, C, D등급은 2년의 평가주기를 부여</li>
                        </ul>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <thead>
                                    <tr>
                                        <th class="tbh01"></th>
                                        <th class="tbh02">등급구분(정의)</th>
                                        <th class="tbh03">등급부여기준</th>
                                        <th class="tbh04">주기</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>국가 평가에서 제시하고 있는 기준을 모든 영역에서 충족함</td>
                                        <td>4개 영역 모두 ‘우수’인 경우 (필수 지표 및 요소 충족)</td>
                                        <td rowspan="2">3년</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>국가 평가에서 제시하고 있는 기준을 대부분 충족함</td>
                                        <td class="border-right">‘우수’ 영역이 3개 이하이며 ‘개선필요’ 영역이 없는 경우</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>국가 평가에서 제시하고 있는 기준 대비 부분적으로 개선이 필요함</td>
                                        <td>‘개선필요’ 영역이 1개 있는 경우</td>
                                        <td rowspan="2">2년</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td>국가 평가에서 제시하고 있는 기준 대비 상당한 개선이 필요함</td>
                                        <td class="border-right">‘개선필요’ 영역이 2개 이상인 경우</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/care/data_room.php" target="_blank" class="__btn4">어린이집 운영 자료실 바로가기</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-3494-3552</li>
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