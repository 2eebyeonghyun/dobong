<? 
$_dep = array(4);
$_tit = array('도서·장난감 검색','장난감검색');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page view-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tab3">
                            <a href="<?=DIR?>/rental/center_01_toy.php" class="active"><span>장난감검색</span></a>
                            <a href="<?=DIR?>/rental/center_01_book.php" class=""><span>도서검색</span></a>
                        </div>

                        <form action="?" method="post" name="view_frm" id="view_frm" class="viewFrm">
                            <div class="top_wr">
                                <div class="picture_wr">
                                    <img src="<?=DIR?>/img/rental/rental_img1.png" alt="테스트 이미지">
                                </div>

                                <div class="info_wr">
                                    <ul class="list">
                                        <li class="w100"><span class="title">장난감명</span><p class="text">캐치티니핑 하츄핑 청소기</p></li>
                                        <li class=""><span class="title">영역</span><p class="text">조작</p></li>
                                        <li class=""><span class="title">추천연령</span><p class="text">3세이상</p></li>
                                        <li class=""><span class="title">제조사</span><p class="text">하베브릭스</p></li>
                                    </ul>
                                </div>

                                <div class="information_wr">
                                    <p class="text">근육, 감각, 손과 눈의 협응력 UP!<br> 인지능력, 청각/시각 소근육 발달UP!<br> 스스로 학습, 자신감, 창의력 UP!</p>
                                </div>
                            </div>

                            <div class="bot_wr">
                                <span class="title">대여상태</span>

                                <table class="rental_table">
                                    <thead>
                                        <tr>
                                            <th class="tbh01">번호</th>
                                            <th class="tbh02">바코드</th>
                                            <th class="tbh03">대여횟수</th>
                                            <th class="tbh04">대여상태</th>
                                            <th class="tbh05">예약하기</th>
                                            <th class="tbh06">반납예정일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="rental_num">1</td>
                                            <td class="rental_barcode">NW01TH00001901</td>
                                            <td class="rental_count">57회</td>
                                            <td class="rental_state"><span>대여가능</span></td>
                                            <td class="rental_reserve">
                                                <a href="#none" class="reservebtn">배달예약</a>
                                            </td>
                                            <td class="rental_endday"></td>
                                        </tr>
                                        <tr>
                                            <td class="rental_num">2</td>
                                            <td class="rental_barcode">NW01TH00001901</td>
                                            <td class="rental_count">57회</td>
                                            <td class="rental_state reserve"><span>대여중</span></td>
                                            <td class="rental_reserve reserve_impossible">예약불가</td>
                                            <td class="rental_endday">2024-05-25</td>
                                        </tr>
                                        <tr>
                                            <td class="rental_num">3</td>
                                            <td class="rental_barcode">NW01TH00001901</td>
                                            <td class="rental_count">57회</td>
                                            <td class="rental_state"><span>대여가능</span></td>
                                            <td class="rental_reserve">
                                                <a href="#none" class="reservebtn">배달예약</a>
                                            </td>
                                            <td class="rental_endday"></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="reserve_wr">
                                    <span class="title">예약신청하기</span>

                                    <div class="calendar_wr">
                                        <div class="calendar_day_wr">
                                            <div class="day_wr">
                                                <select name="cal_year" id="cal_year" class="__select calYear">
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                    <option value="2034">2034</option>
                                                    <option value="2035">2035</option>
                                                    <option value="2036">2036</option>
                                                    <option value="2037">2037</option>
                                                    <option value="2038">2038</option>
                                                    <option value="2039">2039</option>
                                                    <option value="2040">2040</option>
                                                </select>

                                                <select name="cal_day" id="cal_day" class="__select calDay">
                                                    <option value="1">1월</option>
                                                    <option value="2">2월</option>
                                                    <option value="3">3월</option>
                                                    <option value="4">4월</option>
                                                    <option value="5">5월</option>
                                                    <option value="6">6월</option>
                                                    <option value="7">7월</option>
                                                    <option value="8">8월</option>
                                                    <option value="9">9월</option>
                                                    <option value="10">10월</option>
                                                    <option value="11">11월</option>
                                                    <option value="12">12월</option>
                                                </select>
                                            </div>

                                            <div class="calendar_btn_wr">
                                                <a href="#none" class="prev"><i class="axi axi-ion-arrow-left-b"></i></a>
                                                <a href="#none" class="next"><i class="axi axi-ion-arrow-right-b"></i></a>
                                            </div>
                                        </div>

                                        <table class="calendar_table">
                                            <thead>
                                                <tr>
                                                    <th>일</th>
                                                    <th>월</th>
                                                    <th>화</th>
                                                    <th>수</th>
                                                    <th>목</th>
                                                    <th>금</th>
                                                    <th>토</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td class="empty">28</td>
                                                    <td class="empty">29</td>
                                                    <td class="empty">30</td>
                                                    <td class="">1</td>
                                                    <td class="">2</td>
                                                    <td class="">3</td>
                                                    <td class="">4</td>
                                                </tr>

                                                <tr>
                                                    <td class="">5</td>
                                                    <td class="">6</td>
                                                    <td class="">7</td>
                                                    <td class="">8</td>
                                                    <td class="">9</td>
                                                    <td class="">10</td>
                                                    <td class="">11</td>
                                                </tr>

                                                <tr>
                                                    <td class="">12</td>
                                                    <td class="">13</td>
                                                    <td class="">14</td>
                                                    <td class="">15</td>
                                                    <td class="">16</td>
                                                    <td class="">17</td>
                                                    <td class="">18</td>
                                                </tr>

                                                <tr>
                                                    <td class="">19</td>
                                                    <td class="">20</td>
                                                    <td class="">21</td>
                                                    <td class="select">22</td>
                                                    <td class="select">23</td>
                                                    <td class="select">24</td>
                                                    <td class="">25</td>
                                                </tr>

                                                <tr>
                                                    <td class="">26</td>
                                                    <td class="">27</td>
                                                    <td class="">28</td>
                                                    <td class="">29</td>
                                                    <td class="">30</td>
                                                    <td class="">31</td>
                                                    <td class="empty">1</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="rental_list">
                                            <ul class="list">
                                                <li>
                                                    <span class="title">대여일</span>
                                                    <p class="date">2024-05-24(금)</p>
                                                </li>
                                                <li>
                                                    <span class="title">반납예정</span>
                                                    <p class="date">2024-06-07(금)</p>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="rental_btn_wr">
                                            <button type="submit" class="rental_btn">예약신청하기</button>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="list_btn_wr">
                                    <a href="#none" class="listbtn">목록<i class="axi axi-ion-grid"></i></a>
                                </div>
                            </div>

                        </form>
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