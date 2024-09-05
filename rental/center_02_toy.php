<? 
$_dep = array(4,3,1);
$_tit = array('도서·장난감 검색','창동센터','장난감검색');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page center01-page center02-toy-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tab3">
                            <a href="<?=DIR?>/rental/center_02_toy.php" class="active"><span>장난감검색</span></a>
                            <a href="<?=DIR?>/rental/center_02_book.php" class=""><span>도서검색</span></a>
                        </div>

                        <form action="?" method="post" name="rental_frm" id="rental_frm" class="toyFrm" onsubmit="return rentalsubmitbtn();">
                            <div class="search_wr">
                                <div class="select_wr">
                                    <select name="category_sel" id="category_sel" class="categorySel __select">
                                        <option value="">분류전체</option>
                                        <option value="SA">게임</option>
                                        <option value="SB">블럭</option>
                                        <option value="SC">신체</option>
                                        <option value="SD">악기</option>
                                        <option value="SE">역할</option>
                                        <option value="SF">육아</option>
                                        <option value="SG">조작</option>
                                        <option value="SH">탈것</option>
                                        <option value="SI">퍼즐</option>
                                    </select>

                                    <select name="age_sel" id="age_sel" class="ageSel __select">
                                        <option value="">연령전체</option>
                                        <option value="AG1">0 ~ 6개월</option>
                                        <option value="AG2">7 ~ 12개월</option>
                                        <option value="AG3">13 ~ 24개월</option>
                                        <option value="AG4">2 ~ 4세</option>
                                        <option value="AG5">4세 이상</option>
                                    </select>
                                </div>

                                <input type="text" name="search_text_box" id="search_text_box" class="__input textbox" placeholder="장난감명을 입력해주세요">
                                <button type="submit" class="search_btn">검색</button>
                            </div>

                            <div class="option_wr">
                                <ul class="counter_wr">
                                    <li><span class="all_counter counter_text">총 보유폼목 386종 <p class="count count1">762</p> 개</span></li>
                                    <li><span class="result_counter counter_text">검색결과 386종 <p class="count count2">762</p> 개</span></li>
                                </ul>

                                <div class="option_btn_wr">
                                    <select name="option_sel" id="option_sel" class="optionSel">
                                        <option value="VW1">8개씩보기</option>
                                        <option value="VW2">16개씩보기</option>
                                        <option value="VW3">24개씩보기</option>
                                    </select>
                                </div>
                            </div>

                            <div class="view_wr toy_view_wr">
                                <ul class="list">
                                    <li>
                                        <a href="<?=DIR?>/rental/rental_toy.php" class="item">
                                            <div class="img_wr">
                                                <span></span>
                                            </div>

                                            <div class="info_wr">
                                                <div class="toy_info">
                                                    <span class="title">캐치티니핑 하츄핑 청소기</span>
                                                    <p class="age">연령 3세이상</p>
                                                </div>
                                                
                                                <ul class="state_info">
                                                    <!-- <li>
                                                        <span class="state state1">배달예약중</span>
                                                        <p class="count">0개</p>
                                                    </li> -->
                                                    <li>
                                                        <span class="state state2">대여가능</span>
                                                        <p class="count">0개</p>
                                                    </li>
                                                    <li>
                                                        <span class="state state3">대여중</span>
                                                        <p class="count">2개</p>
                                                    </li>
                                                    <!-- <li>
                                                        <span class="state state4">A/S중</span>
                                                        <p class="count">0개</p>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none" class="item">
                                            <div class="img_wr">
                                                <span></span>
                                            </div>

                                            <div class="info_wr">
                                                <div class="toy_info">
                                                    <span class="title">캐치티니핑 하츄핑 청소기</span>
                                                    <p class="age">연령 3세이상</p>
                                                </div>
                                                
                                                <ul class="state_info">
                                                    <li>
                                                        <span class="state state2">대여가능</span>
                                                        <p class="count">0개</p>
                                                    </li>
                                                    <li>
                                                        <span class="state state3">대여중</span>
                                                        <p class="count">2개</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none" class="item">
                                            <div class="img_wr">
                                                <span></span>
                                            </div>

                                            <div class="info_wr">
                                                <div class="toy_info">
                                                    <span class="title">캐치티니핑 하츄핑 청소기</span>
                                                    <p class="age">연령 3세이상</p>
                                                </div>
                                                
                                                <ul class="state_info">
                                                    <li>
                                                        <span class="state state2">대여가능</span>
                                                        <p class="count">0개</p>
                                                    </li>
                                                    <li>
                                                        <span class="state state3">대여중</span>
                                                        <p class="count">2개</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none" class="item">
                                            <div class="img_wr">
                                                <span></span>
                                            </div>

                                            <div class="info_wr">
                                                <div class="toy_info">
                                                    <span class="title">캐치티니핑 하츄핑 청소기</span>
                                                    <p class="age">연령 3세이상</p>
                                                </div>
                                                
                                                <ul class="state_info">
                                                    <li>
                                                        <span class="state state2">대여가능</span>
                                                        <p class="count">0개</p>
                                                    </li>
                                                    <li>
                                                        <span class="state state3">대여중</span>
                                                        <p class="count">2개</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#none" class="item">
                                            <div class="img_wr">
                                                <img src="<?=DIR?>/img/rental/rental_img1.png" alt="테스트 이미지">
                                            </div>

                                            <div class="info_wr">
                                                <div class="toy_info">
                                                    <span class="title">캐치티니핑 하츄핑 청소기</span>
                                                    <p class="age">연령 3세이상</p>
                                                </div>
                                                
                                                <ul class="state_info">
                                                    <li>
                                                        <span class="state state2">대여가능</span>
                                                        <p class="count">0개</p>
                                                    </li>
                                                    <li>
                                                        <span class="state state3">대여중</span>
                                                        <p class="count">2개</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>

                        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/pagenation.php"; ?>
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