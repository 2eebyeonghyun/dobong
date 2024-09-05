<? 
$_dep = array(3,6,2);
$_tit = array('가정양육지원','도서·장난감 대여','찾아가는장난감 도토리');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page sub01-page sub01-1-2-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/rental/rental_information.php"><span>장난감누림터·장난감나눔이</span></a>
                        <a href="<?=DIR?>/rental/rental_information2.php" class="active"><span>찾아가는장난감 도토리</span></a>
                        <a href="<?=DIR?>/rental/rental_information3.php"><span>도서누림터·도서나눔이</span></a>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>도·토·리(도봉구 토이 딜리버리)</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>센터에 직접 방문하여 장난감을 대여하기 어려운 대상을 위해 집 앞까지 찾아가는 장난감 대여사업입니다.</li>
                        </ul>

                        <div class="picture_list_wr picture_list_wr_w100 __mt30">
                            <div class="w100">
                                <span class="title">도토리(도봉구 토이 딜리버리)</span>
                                <ul class="list">
                                    <li><img src="<?=DIR?>/img/rental/rental_img5.png" alt="도토리(도봉구 토이 딜리버리) 이미지"></li>
                                    <li><img src="<?=DIR?>/img/rental/rental_img6.png" alt="도토리(도봉구 토이 딜리버리) 이미지"></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용대상</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도봉구에 거주하는 센터 회원으로 아래에 해당하는 자</li>
                            <li>영유아 자녀를 둔 임산부 가족</li>
                            <li>24개월 이하 자녀를 둔 가족</li>
                            <li>36개월 이하 자녀가 2명 이상인 가족</li>
                            <li>미취학 자녀가 3명 이상인 가족</li>
                            <li>장애인 가족</li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용안내</h3>
                        </div>

                        <ul class="list_box_wr grid-3">
                            <li>
                                <span class="title">신청</span>
                                <ul class="text_wr">
                                   <li>수령희망일 도토리 예약</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">대여</span>
                                <ul class="text_wr">
                                   <li>이용자 집 앞으로 비대면 배달</li> 
                                </ul>
                            </li>
                            <li>
                                <span class="title">반납</span>
                                <ul class="text_wr flex-wrap">
                                   <li>집 앞에서 비대면 수거</li> 
                                   <li>센터 직접 방문 반납</li> 
                                </ul>
                            </li>
                        </ul>

                        <div class="__appr __mt20">
                            <dl>
                                <dt class="__txt17 fwn __blue">[신청]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>매주 목요일 10시부터 다음주 도토리 예약</li>
                                    </ul>
                                </dd>
                            </dl>

                            <dl>
                                <dt class="__txt17 fwn __blue">[대여개수]</dt>
                                <dd>
                                    <ul class="__dotlist __txt15">
                                        <li>2개</li>
                                        <li>장난감누림터(방학) 보유 물품만 신청 가능</li>
                                        <li>대형 장난감 최대 1개 신청 가능</li>
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
                                        <li>대여했던 상태로 정리하여 도토리 반납수거 신청 / 센터 직접 방문하여 반납</li>
                                        <li>연체 시 반납 수거 불가, 직접 방문 반납만 가능</li>
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
                            <h3>운영일정</h3>
                        </div>

                        <div class="table_wr __mt30">
                            <table class="__table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">회차</th>
                                        <th class="tbh02">월</th>
                                        <th class="tbh03">화</th>
                                        <th class="tbh04">수</th>
                                        <th class="tbh05">목</th>
                                        <th class="tbh06">금</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1회차<br> 10:00-11:30</th>
                                        <td>창동/쌍문동</td>
                                        <td>방학동/도봉동</td>
                                        <td>창동/쌍문동</td>
                                        <td>방학동/도봉동</td>
                                        <td>창동/쌍문동</td>
                                    </tr>
                                    <tr>
                                        <th>2회차<br> 14:00-15:30</th>
                                        <td>방학동/도봉동</td>
                                        <td>창동/쌍문동</td>
                                        <td>방학동/도봉동</td>
                                        <td>창동/쌍문동</td>
                                        <td>방학동/도봉동</td>
                                    </tr>
                                    <tr>
                                        <th>3회차<br> 14:30-16:00</th>
                                        <td>창동/쌍문동</td>
                                        <td></td>
                                        <td>창동/쌍문동</td>
                                        <td></td>
                                        <td>창동/쌍문동</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>이용규칙</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>도토리는 주 1회 이용 가능합니다</li>
                            <li>신청 물품은 배달 전까지 장난감누림터에 직접 방문한 이용자에게 대출 우선권이 주어집니다</li>
                            <li>장난감 배달은 회원정보에 입력된 주소지 문 앞에서 비대면으로 이루어집니다.<br> ※ 대여 장난감 배달 후/반납장난감 수거 전 발생하는 분실 및 파손에 대해서는 이용자에게 책임이 있습니다.</li>
                            <li>배달 당일 연락이 되지 않거나 부재한 경우에는 신청이 자동 취소되며 2주간 도토리 이용이 제한됩니다</li>
                        </ul>

                        <div class="__mt50 tac fot_btn_wr">
                            <a href="<?=DIR?>/rental/center_01_toy.php" target="_blank" class="__btn4">도토리 예약 바로가기</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="__tit1">
                            <h3>문의</h3>
                        </div>

                        <ul class="__dotlist __txt15">
                            <li>010-9298-3341</li>
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