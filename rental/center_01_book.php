<? 
$_dep = array(4,2,2);
$_tit = array('도서·장난감 검색','방학센터','도서검색');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page center01-page center-book-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tab3">
                            <a href="<?=DIR?>/rental/center_01_toy.php" class=""><span>장난감검색</span></a>
                            <a href="<?=DIR?>/rental/center_01_book.php" class="active"><span>도서검색</span></a>
                        </div>

                        <form action="?" method="post" name="rental_frm" id="rental_frm" class="toyFrm bookFrm" onsubmit="return rentalsubmitbtn();">
                            <div class="search_wr">
                                <div class="select_wr">
                                    <select name="category_sel" id="category_sel" class="categorySel __select">
                                        <option value="">분류전체</option>
                                        <option value="SA">영아</option>
                                        <option value="SA">유아</option>
                                        <option value="SA">성인</option>
                                    </select>

                                    <select name="info_sel" id="info_sel" class="infoSel __select">
                                        <option value="">전체</option>
                                        <option value="IF01">도서명</option>
                                        <option value="IF02">출판사</option>
                                        <option value="IF03">저자명</option>
                                    </select>
                                </div>

                                <input type="text" name="search_text_box" id="search_text_box" class="__input textbox" placeholder="도서명을 입력해주세요">
                                <button type="submit" class="search_btn">검색</button>
                            </div>

                            <div class="option_wr">
                                <ul class="counter_wr">
                                    <li><span class="all_counter counter_text">총 보유폼목 386종 <p class="count count1">762</p> 개</span></li>
                                    <li><span class="result_counter counter_text">검색결과 386종 <p class="count count2">762</p> 개</span></li>
                                </ul>

                                <div class="option_btn_wr">
                                    <ul class="list">
                                        <li class="active"><a href="#none" class="option_btn option2">최근등록순</a></li>
                                        <li class=""><a href="#none" class="option_btn option1">저자순</a></li>
                                        <li class=""><a href="#none" class="option_btn option3">출판연도순</a></li>
                                    </ul>

                                    <select name="option_sel" id="option_sel" class="optionSel">
                                        <option value="VW1">8개씩보기</option>
                                        <option value="VW2">16개씩보기</option>
                                        <option value="VW3">24개씩보기</option>
                                    </select>
                                </div>
                            </div>

                            <div class="view_wr book_view_wr">
                                <table class="__table book_view_table">
                                    <thead>
                                        <tr>
                                            <th class="tbh01">분류</th>
                                            <th class="tbh02">도서명</th>
                                            <th class="tbh03">출판사</th>
                                            <th class="tbh04">저자명</th>
                                            <th class="tbh05">대여상태</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="book_category">부모</td>
                                            <td class="book_subject"><a href="<?=DIR?>/rental/rental_book.php" class="subject_title">내 아이의 말 습관</a></td>
                                            <td class="book_company">웨일북</td>
                                            <td class="book_writer">천영희</td>
                                            <td class="book_state">
                                                <span class="state_block open">대여가능</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="book_category">아동</td>
                                            <td class="book_subject"><a href="<?=DIR?>/rental/rental_book.php" class="subject_title">내 아이의 말 습관</a></td>
                                            <td class="book_company">웨일북</td>
                                            <td class="book_writer">천영희</td>
                                            <td class="book_state">
                                                <span class="state_block imposs">대여중</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="book_category">교사</td>
                                            <td class="book_subject"><a href="<?=DIR?>/rental/rental_book.php" class="subject_title">내 아이의 말 습관</a></td>
                                            <td class="book_company">웨일북</td>
                                            <td class="book_writer">천영희</td>
                                            <td class="book_state">
                                                <span class="state_block as">AS중</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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