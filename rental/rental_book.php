<? 
$_dep = array(4);
$_tit = array('도서·장난감 검색','도서검색');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section rental-page view-page book-view-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="__tab3">
                            <a href="<?=DIR?>/rental/center_01_toy.php" class=""><span>장난감검색</span></a>
                            <a href="<?=DIR?>/rental/center_01_book.php" class="active"><span>도서검색</span></a>
                        </div>

                        <div class="information_box_wr">
                            <ul class="list">
                                <li class="w100"><span class="title">도서명</span><p class="text">(내 친구 헝겊책) 어슬렁 거북 : 바닷속 친구들</p></li>
                                <li class=""><span class="title">저자명</span><p class="text">편집부 글, 편집부 그림</p></li>
                                <li class=""><span class="title">출판사</span><p class="text">애플비</p></li>
                                <li class=""><span class="title">발행년도</span><p class="text">2024.05.31</p></li>
                                <li class=""><span class="title">등록번호</span><p class="text">DM01BA000519</p></li>
                                <li class=""><span class="title">청구기호</span><p class="text">영09-0063</p></li>
                                <li class=""><span class="title">연령</span><p class="text">0 ~ 3세</p></li>
                                <li class="">
                                    <span class="title">대여상태</span>
                                    <span class="state_block imposs">대여중</span>
                                </li>
                            </ul>
                        </div>

                        <div class="list_btn_wr">
                            <a href="#" onclick="history.back()" class="listbtn">목록<i class="axi axi-ion-grid"></i></a>
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