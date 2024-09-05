<? 
$_dep = array(3,3,2);
$_tit = array('가정양육지원','부모교육','자체부모교육');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section support-page sub03-page sub03-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/support/parents_education.php"><span>공통부모교육</span></a>
                        <a href="<?=DIR?>/support/parents_education2.php" class="active"><span>자체부모교육</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>그림책부모교육</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt20">필요성 및 목적</div>
                        <ul class="__dotlist __txt15">
                            <li>영유아 양육자에게 좋은 그림책 선별방법 및 구체적인 제시방법을 안내하고, 이를 적용하여 그림책을 통한 부모-자녀와의 긍정적 관계형성을 돕고자 함.</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육대상</div>
                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 영유아 자녀를 둔 모든 양육자</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육소개</div>
                        <ul class="__dotlist __txt15">
                            <li>주제별 그림책으로 할 수 있는 활동 소개, 책 선정 방법 및 그림책 읽어주는 방법 안내</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>부모인식개선교육</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt20">필요성 및 목적</div>
                        <ul class="__dotlist __txt15">
                            <li>영유아 시기의 무분별한 사교육 문제를 인식하고 이로 인해 침해되고 있는 영유아의 놀이에 대한 깊이 있는 이해와 중요성을 인식하는 것이 필요함</li>
                            <li>영유아발달에 적합한 양육방법을 안내함으로써 양육자의 양육태도 및 방법이 자녀발달에 미치는 영향을 인식하고 보다 건강한 양육관 성립을 돕고자 함</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육대상</div>
                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 영유아 자녀를 둔 모든 양육자</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육소개</div>
                        <ul class="__dotlist __txt15">
                            <li>연 1~2회 외부 강사를 초청하여 영유아 발달에 적합한 양육방법과 관련하여 대집단 강의로 진행</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>힐링부모교육</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt20">필요성 및 목적</div>
                        <ul class="__dotlist __txt15">
                            <li>양육자의 양육스트레스 해소 돕고, 양유 관련 정보를 제공하여 양육자의 역량강화를 지원하고자 함</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육대상</div>
                        <ul class="__dotlist __txt15">
                            <li>도봉구 관내 영유아 자녀를 둔 모든 양육자</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육소개</div>
                        <ul class="__dotlist __txt15">
                            <li>매월 다양한 주제의 정기적인 부모교육을 계획하여 소집단으로 진행</li>
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