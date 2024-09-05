<? 
$_dep = array(2,1,1);
$_tit = array('어린이집지원','어린이집운영','어린이집 안내');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub01-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/operation.php" class="active"><span>어린이집 안내</span></a>
                        <a href="<?=DIR?>/care/operation2.php"><span>어린이집 입소기준</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>어린이집 안내</h3>
                        </div>

                        <ul class="list_box_wr information_list_wr">
                            <li>
                                <span class="title">국공립어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>국가나 지방자치단체가 설치‧운영하는 상시 영유아 11인 이상을 보육할 수 있는 어린이집</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">가정어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>개인이 가정이나 그에 준하는 곳에 설치‧운영하는 상시 영유아 5인 이상 20인 이하를 보육할 수 있는 어린이집 </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">민간어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>국공립‧사회복지법인 및 법인단체등‧직장‧가정‧협동 어린이집이 아닌 어린이집으로 상시 영유아 21인 이상을 보육할 수 있는 시설을 갖춘 어린이집</li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">사회복지법인어린이집, 법인 단체등어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>사회복지사업법에 따른 사회복지법인이 설치‧운영하는 상시 영유아 21인 이상을 보육할 수 있는 시설을 갖춘 어린이집 </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">직장어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>사업주가 사업장의 근로자를 위하여 설치‧운영하는 어린이집으로 상시 영유아 5인 이상을 보육할 수 있는 어린이집 </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <span class="title">협동어린이집</span>
                                <div class="text_wr">
                                    <ul class="text_list">
                                        <li>보호자 또는 보호자와 보육교직원 11인 이상이 조합을 결성하여 설치‧운영하는 상시 영유아 11명 이상을 보육할 수 있는 어린이집 </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>어린이집 정보 검색</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 어린이집의 정보와 위치는 [어린이집 정보공개포털]을 이용하시기 바랍니다.</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="https://info.childcare.go.kr/info/main.jsp" target="_blank" class="__btn4">어린이집정보공개포털 홈페이지 바로가기</a>
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