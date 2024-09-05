<? 
$_dep = array(2,1,2);
$_tit = array('어린이집지원','어린이집운영','어린이집 입소기준');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub01-page sub01-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/operation.php"><span>어린이집 안내</span></a>
                        <a href="<?=DIR?>/care/operation2.php" class="active"><span>어린이집 입소기준</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>운영</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt50">입소대기 등록 시점</div>

                        <ul class="__dotlist __txt15 __mt10">
                            <li>연중 수시</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt50">입소대기 신청 어린이집 수</div>

                        <ul class="list_box_wr information_list_wr">
                            <li>
                                <span class="title">재원중</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>2개소</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">미재원중</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>3개소</li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt50">입소대기 절차</div>

                        <div class="step_list_wr __mt50">
                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>
                                            <b>임신육아종합포털 아이사랑 홈페이지</b>에서 어린이집에 입소할 자녀 등록
                                        </li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">부모</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>어린이집 검색 후 신청할 어린이집 선택</li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">부모</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>입소대기 신청</li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">부모</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>입소대상자확정</li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">어린이집</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>입소우선순위자료제출</li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">부모</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="lef">
                                    <ul class="text_wr">
                                        <li>아동입소처리</li>
                                    </ul>
                                </div>

                                <div class="rig">
                                    <span class="title">어린이집</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>입소 순위</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt50">[입소우선순위 관련 규정]</div>

                        <ul class="__dotlist __txt15">
                            <li>[영유아보육법] 제28조, 동법 시행령 제21조의3, 시행규칙 제29조의 입소 우선 대상 기준</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt50">[1순위]</div>

                        <ul class="__dotlist __txt15">
                            <li>국민기초생활 보장법에 따른 수급자(법정)</li>
                            <li>한부모가족지원법 제5조의 규정에 의한 지원대상자의 자녀</li>
                            <li>한부모가족지원법 제5조의 제2항에 따른 지원대상자의 손자녀('24. 2. 9. 시행)</li>
                            <li>국민기초생활 보장법 제24조의 규정에 의한 차상위계층의 자녀(중위소득의 50% 이하)</li>
                            <li>아동복지시설에서 생활중인 영유아</li>
                            <li>｢장애인복지법｣제2조에 따른 장애인 중 보건복지부령으로 정하는 장애 정도가 심한 자의 자녀</li>
                            <li>｢장애인복지법｣제2조에 따른 장애인 중 보건복지부령으로 정하는 장애 정도가 심한 형제/자매를 둔 영유아</li>
                            <li>｢국가유공자 등 예우 및 지원에 관한 법률｣ 제4조제1항에 따른 국가유공자 중 전몰자(제3호), 순직자(제5호･제14호･제16호), 상이자(제4호･제6호･제12호･제15호･제17호) 로서 보건복지부령으로 정하는 자의 자녀</li>
                            <li>부모가 모두 취업중이거나 취업을 준비 중인 영유아</li>
                            <li>다문화가족지원법 제2조 제1호에 따른 다문화가족의 영유아</li>
                            <li>「북한이탈주민의 보호 및 정착지원에 관한 법률」 제2조제1호에 따른 북한이탈주민 및 그 자녀인 영유아</li>
                            <li>제1형 당뇨를 가진 경우로서 의학적 조치가 용이하고 일상생활이 가능하여 보육에 지장이 없는 영유아</li>
                            <li>국민건강보험법 시행령 제19조제1항[별표2]제3호나목2)에 따른 보건복지부장관이 정하여 고시하는 희귀난치성 질환을 가진 사람 중 보건복지부장관이 인정하는 사람의 자녀인 영유아('24. 2. 9. 시행)</li>
                            <li>자녀가 3명 이상인 가구 또는 자녀가 2명인 가구의 영유아</li>
                            <li>임신부의 자녀인 영유아</li>
                            <li>산업단지 입주기업체 및 지원기관 근로자의 자녀로서 산업단지에 설치된 어린이집을 이용하는 영유아</li>
                            <li>법인･단체 등이 어린이집을 국가 또는 지방자치단체에 기부채납하여 국공립어린이집으로 전환된 경우 해당 법인･단체 등의 근로자 자녀로서 그 어린이집을 이용하는 영유아</li>
                            <li>법 제24조제2항제3호에 따라 ｢주택법｣ 제2조제3호에 따른 공동주택에 설치된 민간어린이집이 국공립어린이집으로 전환된 경우 해당 공동주택의 거주자 자녀로서 그 어린이집을 이용하는 영유아</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt50">[2순위]</div>

                        <ul class="__dotlist __txt15">
                            <li>기타 「한부모가족지원법」에 따른 한부모 가족('24. 2. 9. 시행)</li>
                            <li>
                                가정위탁 보호아동 및 입양된 영유아 자세히보기<br> 
                                ※ 위탁가정의 경우에 위탁아동을 친자녀로 포함하여 입소우선순위 모든 요건 적용
                            </li>
                            <li>
                                동일 어린이집 재원 중인 아동의 형제·자매<br> 
                                ex) 3월 신학기 입소시, 재원중인 형제·자매가 초등학교에 입학하는 경우에는 미해당<br> 
                                ※ 입소일 기준으로 형제·자매가 재원 중이어야 함
                            </li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt50">[3순위]</div>

                        <ul class="__dotlist __txt15">
                            <li>1, 2순위에 해당하지 않는 일반 영유아</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="https://www.childcare.go.kr/" target="_blank" class="__btn4">임신육아종합포털 아이사랑 홈페이지 바로가기</a>
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
</html>