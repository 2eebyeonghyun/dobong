<? 
$_dep = array(3,6,3);
$_tit = array('가정양육지원','도서·장난감 대여','도서누림터·도서나눔이');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page sub01-page sub01-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/rental/rental_information.php"><span>장난감누림터·장난감나눔이</span></a>
                        <a href="<?=DIR?>/rental/rental_information2.php"><span>찾아가는장난감 도토리</span></a>
                        <a href="<?=DIR?>/rental/rental_information3.php" class="active"><span>도서누림터·도서나눔이</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>도서누림터 · 도서나눔이</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>영유아와 부모가 함께 이용하는 영유아 도서관으로 영유아를 위한 다양한 그림책이나 양육자를 위한 도서를 열람하거나 대여할 수 있습니다</li>
                        </ul>

                        <div class="picture_list_wr __mt30">
                            <div class="lef">
                                <span class="title">도서누림터(방학센터)</span>
                                <ul class="list">
                                    <li><img src="<?=DIR?>/img/rental/rental_img7.png" alt="도서누림터(방학센터) 이미지"></li>
                                    <li><img src="<?=DIR?>/img/rental/rental_img8.png" alt="도서누림터(방학센터) 이미지"></li>
                                </ul>
                            </div>
                            <div class="rig">
                                <span class="title">도서나눔이(창동센터)</span>
                                <ul class="list">
                                    <li><img src="<?=DIR?>/img/rental/rental_img9.png" alt="도서나눔이(창동센터) 이미지"></li>
                                    <li><img src="<?=DIR?>/img/rental/rental_img10.png" alt="도서나눔이(창동센터) 이미지"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도봉구육아종합지원센터 유료회원</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용안내</h3>
                        </div>

                        <div class="__appr">
                            <dl>
                                <dt class="__txt17 fwn __blue">[열람]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>운영시간 내 도서누림터/도서나눔이 방문하여 자유롭게 열람</li>
                                    </ul>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="__txt17 fwn __blue">[대여]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>회원증 지참 후 대여실에 방문하여 대여</li>
                                    </ul>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="__txt17 fwn __blue">[대여개수]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>10권</li>
                                        <li>사운드북은 3권까지 대여 가능</li>
                                        <li>신착도서는 5권까지 대여 가능</li>
                                    </ul>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="__txt17 fwn __blue">[대여기간]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>14일</li>
                                    </ul>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="__txt17 fwn __blue">[연장]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>홈페이지에서 1회 연장(7일) 가능</li>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용시간</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">구분</th>
                                        <th class="tbh02">도서누림터</th>
                                        <th class="tbh03">도서나눔이</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th>운영시간</th>
                                        <td>월요일-금요일 9:00-18:00<br> 토요일 : 10:00-15:00</td>
                                        <td>화요일-토요일 9:00-18:00<br> 일요일 : 10:00-15:00</td>
                                    </tr>
                                    <tr>
                                        <th>점심시간</th>
                                        <td>12:00-13:00(*토요일은 점심시간 없이 운영)</td>
                                        <td>12:00-13:00(*일요일은 점심시간 없이 운영)</td>
                                    </tr>
                                    <tr>
                                        <th>위치</th>
                                        <td>서울시 도봉구 방학로 12길 28 4층 장난감누림터 ☎02-3494-3371</td>
                                        <td>서울시 도봉구 우이천로 4길 24-5 2층 장난감나눔이 ☎02-994-3371</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="information_text __mt20">※ 운영 종료 30분 전후로 대여실 청소 및 소독이 이루어집니다.</p>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용규칙</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>회원증을 지참 후 이용하시기 바랍니다</li>
                            <li>도서 연체 시 연체일 만큼 대여가 불가합니다</li>
                            <li>헝겊책은 열람만 가능합니다</li>
                            <li>쾌적한 대여실 운영을 위해 실 내에서 음식물 섭취는 불가합니다</li>
                            <li>도서 분실 및 파손 시 변상 규정에 따라 처리됩니다</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/rental/center_01_toy.php" class="__btn4">방학센터 검색바로가기</a>
                            <a href="<?=DIR?>/rental/center_02_toy.php" class="__btn4">창동센터 검색바로가기</a>
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