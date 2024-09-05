<? 
$_dep = array(3,6,1);
$_tit = array('가정양육지원','도서·장난감 대여','장난감누림터·장난감나눔이');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page sub01-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/rental/rental_information.php" class="active"><span>장난감누림터 · 장난감나눔이</span></a>
                        <a href="<?=DIR?>/rental/rental_information2.php"><span>찾아가는장난감 도토리</span></a>
                        <a href="<?=DIR?>/rental/rental_information3.php"><span>도서누림터·도서나눔이</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>장난감누림터 · 장난감나눔이</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>영유아를 위한 다양한 장난감을 대여하는 장난감도서관입니다</li>
                        </ul>

                        <div class="picture_list_wr __mt30">
                            <div class="lef">
                                <span class="title">장난감누림터(방학센터)</span>
                                <ul class="list">
                                    <li><img src="<?=DIR?>/img/rental/rental_img1.png" alt="장난감누림터(방학센터) 이미지"></li>
                                    <li><img src="<?=DIR?>/img/rental/rental_img2.png" alt="장난감누림터(방학센터) 이미지"></li>
                                </ul>
                            </div>
                            <div class="rig">
                                <span class="title">장난감나눔이(창동센터)</span>
                                <ul class="list">
                                    <li><img src="<?=DIR?>/img/rental/rental_img3.png" alt="장난감나눔이(창동센터) 이미지"></li>
                                    <li><img src="<?=DIR?>/img/rental/rental_img4.png" alt="장난감나눔이(창동센터) 이미지"></li>
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
                                        <li>2개(장난감누림터/장난감나눔이 합산하여 최대 2개)</li>
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
                                <dt class="__txt17 fwn __blue">[반납]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>대여했던 상태로 정리하여 대여한 지점으로 직접 반납</li>
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
                                        <th class="tbh02">장난감누림터</th>
                                        <th class="tbh03">장난감나눔이</th>
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
                            <h3>이용시간</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>회원증을 지참 후 이용하시기 바랍니다</li>
                            <li>장난감 대여 시 담당자와 함께 부품의 개수와 상태를 확인해주시고, 대여 직후 문제 발견 시 대여하신 지점으로 바로 연락주시기 바랍니다</li>
                            <li>대여하신 장난감은 회원들이 함께 사용하는 물품으로 깨끗하게 사용해주시기 바랍니다</li>
                            <li>대여장난감은 실내에서만 이용하시기 바라며 고장 및 파손 방지를 위해 물에서 사용하는 것은 삼가주시기 바랍니다(단 물놀이 장난감은 제외)</li>
                            <li>장난감(부속품, 비닐 포함)분실 및 파손 시 변상 규정에 따라 처리됩니다</li>
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