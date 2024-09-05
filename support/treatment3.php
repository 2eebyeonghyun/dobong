<? 
$_dep = array(3,4,3);
$_tit = array('가정양육지원','발달지원 및 치료','양육상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section support-page sub04-page sub04-3-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/support/treatment.php"><span>언어 및 놀이치료</span></a>
                        <a href="<?=DIR?>/support/treatment2.php"><span>영유아발달지원사업</span></a>
                        <a href="<?=DIR?>/support/treatment3.php" class="active"><span>양육상담</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>양육상담</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>영유아자녀를 둔 양육자들이 겪는 육아스트레스와 양육과 관련한 어려움의 해소를 지원하기 위한 부모양육상담입니다.</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 영유아를 둔 모든 양육자</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용내용</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>영유아시기 발달 및 문제행동</li>
                            <li>영유아 자녀양육방법</li>
                            <li>영유아 양육자의 육아스트레스 및 심리적 어려움 지원 등</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용방법</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>센터방문, 화상, 전화상담 및 온라인상담 (무료)</li>
                        </ul>

                        <ul class="list_box_wr grid-4">
                            <li>홈페이지를 통한 상담신청서</li>
                            <li>상담안내 (문자 혹은 유선으로 상담일정 확정안내)</li>
                            <li>상담실시</li>
                            <li>상담만족도 실시</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/study/center_4.php" target="_blank" class="__btn4">센터방문,화상,전화상담 신청하기</a>
                            <a href="<?=DIR?>/community/counseling.php" target="_blank" class="__btn4">온라인상담 바로가기</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>02-3494-3340 (월요일-금요일 09:00~18:00)</li>
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