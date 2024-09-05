<? 
$_dep = array(2,10,2,3);
$_tit = array('어린이집지원','자료실','건강,영양(식단)','식단정보');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/care/data_room.php" class=""><span>어린이집운영</span></a>
                        <a href="<?=DIR?>/care/data_room2.php" class="active"><span>건강,영양(식단)</span></a>
                    </div>

                    <div class="row">
                        <div class="top">
                            <div class="lef">
                                <div class="counter_wr">
                                    <span class="counter">총 1,000</span>
                                    <p class="text">건의 검색결과가 있습니다.</p>
                                </div>
                            </div>

                            <div class="rig">
                                <form action="?" method="post" name="sfrm" id="sfrm" class="notice_frm">
                                    <div class="box">
                                        <select name="subject" id="subject" class="__select frm_subject">
                                            <option value="">전체</option>
                                            <option value="">제목</option>
                                            <option value="">내용</option>
                                        </select>
                                        <input type="text" name="text" id="text" class="frm_text">
                                        <button type="submit" class="frm_btn"><i class="axi axi-search3"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <ul class="tabbox">
                            <li class=""><a href="<?=DIR?>/care/data_room2.php">식단정보</a></li>
                            <li class=""><a href="<?=DIR?>/care/data_room2-2.php">레시피</a></li>
                            <li class="active"><a href="<?=DIR?>/care/data_room2-3.php">정보자료</a></li>
                        </ul>

                        <div class="bot">
                            <table class="notice_table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">번호</th>
                                        <th class="tbh02">제목</th>
                                        <th class="tbh03">첨부파일</th>
                                        <th class="tbh04">등록일</th>
                                        <th class="tbh05">조회</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr class="headline">
                                        <td class="notice_table_num"><span class="imp">공지</span></td>
                                        <td class="notice_table_title"><a href="#none" class="title">[보건복지부] 코로나19 유행대비 어린이집 대응지침(13판- 23.06.01 시행)</a></td>
                                        <td class="notice_table_file"><img src="<?=DIR?>/img/icon/file_icon.gif" alt="파일 아이콘"></td>
                                        <td class="notice_table_date">2021.07.06</td>
                                        <td class="notice_table_counter">21</td>
                                    </tr>

                                    <tr class="">
                                        <td class="notice_table_num">1</td>
                                        <td class="notice_table_title"><a href="#none" class="title">[보건복지부] 코로나19 유행대비 어린이집 대응지침(13판- 23.06.01 시행)</a></td>
                                        <td class="notice_table_file"><img src="<?=DIR?>/img/icon/file_icon.gif" alt="파일 아이콘"></td>
                                        <td class="notice_table_date">2021.07.06</td>
                                        <td class="notice_table_counter">21</td>
                                    </tr>
                                </tbody>
                            </table>

                            <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/pagenation.php"; ?>
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