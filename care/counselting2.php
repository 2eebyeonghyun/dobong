<? 
$_dep = array(2,4,2);
$_tit = array('어린이집지원','어린이집 컨설팅','보육과정 컨설팅');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section care-page sub04-page sub04-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/counselting.php"><span>평가제</span></a>
                        <a href="<?=DIR?>/care/counselting2.php" class="active"><span>보육과정 컨설팅</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>사업목적</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>보육전문가인 컨설턴트가 어린이집 내 원장 및 담임교사를 대상으로 보육과정의 이해 및 적용과 어린이집의 자율적인 성장에 초점을 맞춘 컨설팅을 제공하여 보육교직원의 전문성 향상을 돕고자 함</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>세부내용</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>서울시 맞춤 컨설팅</li>
                            <li>도봉구 보육과정 컨설팅</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>컨설팅사업 진행 절차</h3>
                        </div>

                        <ul class="list_box_wr">
                            <li>
                                <div class="block block1">연간계획</div>
                                <div class="block block2">1~2월</div>
                                <div class="block block3">홈페이지</div>
                            </li>

                            <li>
                                <div class="block block1">컨설팅 공지 및 사업설명</div>
                                <div class="block block2">컨설팅 시작 2개월 전</div>
                                <div class="block block3">홈페이지 및 업무연락</div>
                            </li>

                            <li>
                                <div class="block block1">모집 및 선정</div>
                                <div class="block block2">컨설팅 시작 1개월 전</div>
                                <div class="block block3">홈페이지</div>
                            </li>

                            <li>
                                <div class="block block1">컨설팅 실시 (방문, 온라인, 교육, 간담회 등)</div>
                                <div class="block block2">해당 월</div>
                                <div class="block block3">비대면 또는 대면교육</div>
                            </li>

                            <li>
                                <div class="block block1">평가 및 환류</div>
                                <div class="block block2">해당 월/12월</div>
                                <div class="block block3">-</div>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-3494-3342</li>
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