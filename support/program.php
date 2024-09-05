<? 
$_dep = array(3,2,1);
$_tit = array('가정양육지원','체험프로그램','영유아체험프로그램');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section support-page sub02-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tit1">
                            <h3>영유아체험프로그램</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt20">필요성 및 목적</div>
                        <ul class="__dotlist __txt15">
                            <li>다양한 체험프로그램을 통해 영유아가 성취감과 자신감을 느낄 수 있는 계기를 마련해주고, 신체적, 사회적, 인지적 발달, 표현력 향상, 즐거움의 표현 등 유아의 놀이성 발달을 지원하고자 함</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">이용대상</div>
                        <ul class="__dotlist __txt15">
                            <li>도봉구육아종합지원센터 유료회원 혹은 비회원으로 4~6세 영유아</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육소개</div>
                        <ul class="__dotlist __txt15">
                            <li>다양한 주제의 요리, 미술 등의 체험프로그램이 매월 단회기 혹은 다회기로 진행</li>
                        </ul>

                        <ul class="picture_list picture-3 __mt20">
                            <li><img src="<?=DIR?>/img/support/program_img1.png" alt="놀이누림터 이미지"></li>
                            <li><img src="<?=DIR?>/img/support/program_img2.png" alt="놀이누림터 이미지"></li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>부모-자녀체험프로그램</h3>
                        </div>

                        <div class="__txt17 __blue fwn __mt20">필요성 및 목적</div>
                        <ul class="__dotlist __txt15">
                            <li>체험프로그램에 부모-자녀가 함께 참여하여 자녀의 발달을 이해하고, 발달에 적합한 긍정적 상호작용으로 전인적인 발달을 도울 수 있도록 지원하고자 함</li>
                            <li>오감을 모두 사용하는 다양한 활동을 통해 영유아의 지적 호기심을 충족시켜주고, 언어적 자극, 창의력 증진, 사회성 향상 등을 도모하고자 함</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">이용대상</div>
                        <ul class="__dotlist __txt15">
                            <li>도봉구육아종합지원센터 유료회원 혹은 비회원으로 6세 이하 영유아와 그 부모/조부모</li>
                        </ul>

                        <div class="__txt17 __blue fwn __mt20">교육소개</div>
                        <ul class="__dotlist __txt15">
                            <li>다양한 주제의 그림책, 요리, 미술, 체육 등의 체험프로그램이 매월 단회기 혹은 다회기로 진행</li>
                        </ul>

                        <ul class="picture_list picture-3 __mt20">
                            <li><img src="<?=DIR?>/img/support/program_img3.png" alt="놀이누림터 이미지"></li>
                            <li><img src="<?=DIR?>/img/support/program_img4.png" alt="놀이누림터 이미지"></li>
                            <li><img src="<?=DIR?>/img/support/program_img5.png" alt="놀이누림터 이미지"></li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/rental/center_01_toy.php" target="_blank" class="__btn4">방학센터 예약바로가기</a>
                            <a href="<?=DIR?>/rental/center_02_toy.php" target="_blank" class="__btn4">창동센터 예약바로가기</a>
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