<? 
$_dep = array(7,2);
$_tit = array('검색','통합검색');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section search-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <form action="?" method="post" name="in_search_frm" id="in_search_frm" class="__insearchFrm">
                            <div class="inner">
                                <select name="in_search_select" id="in_search_select" class="__select">
                                    <option value="">통합검색</option>
                                    <option value="">공지사항</option>
                                    <option value="">센터소식</option>
                                    <option value="">정보알림</option>
                                    <option value="">구인</option>
                                </select>

                                <div class="text_wr">
                                    <input type="text" name="in_search_subject" id="in_search_subject" class="__input" value="어린이">
                                    <button type="submit" class="__searchBtn"><i class="axi axi-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="search_result_wr">
                            <span class="result_counter">총 1,000</span>
                            <p class="text">건의 검색결과가 있습니다.</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <article class="cont cont2">
            <div class="inner">
                <div class="row">
                    <div class="top">
                        <div class="lef">
                            <span class="title">공지사항</span>
                            <p class="counter">15</p>
                        </div>

                        <div class="rig">
                            <a href="<?=DIR?>/community/notice.php" class="morebtn">바로가기<i class="axi axi-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="bot">
                        <table class="result_table">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 90%;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="number"><span class="num">700</span></td>
                                    <td class="news">
                                        <a href="<?=DIR?>/community/notice_view.php" class="result_subject">영유아보육법 시행규칙 일부 개정령 공포·시행</a>
                                        <ul class="result_info">
                                            <li class="result_text">「영유아보육법」시행규칙 일부 개정령 공포・시행 (6월 30일) - 아동학대로 영유아에게 중대한 생명·신체 또는 정신적 손해를 입힌 경우, 원장 및 보육교사 자격정지 기준</li>
                                            <li class="result_date">[2021.07.13]</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </article>

        <article class="cont cont3">
            <div class="inner">
                <div class="row">
                    <div class="top">
                        <div class="lef">
                            <span class="title">구인</span>
                            <p class="counter">5</p>
                        </div>

                        <div class="rig">
                            <a href="<?=DIR?>/community/job.php" class="morebtn">바로가기<i class="axi axi-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="bot">
                        <table class="result_table">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 90%;">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="number"><span class="num">703</span></td>
                                    <td class="news">
                                        <a href="<?=DIR?>/community/job_view.php" class="result_subject">영유아보육법 시행규칙 일부 개정령 공포·시행</a>
                                        <ul class="result_info">
                                            <li class="result_text">「영유아보육법」시행규칙 일부 개정령 공포・시행 (6월 30일) - 아동학대로 영유아에게 중대한 생명·신체 또는 정신적 손해를 입힌 경우, 원장 및 보육교사 자격정지 기준</li>
                                            <li class="result_date">[2021.07.13]</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="number"><span class="num">702</span></td>
                                    <td class="news">
                                        <a href="<?=DIR?>/community/job_view.php" class="result_subject">영유아보육법 시행규칙 일부 개정령 공포·시행</a>
                                        <ul class="result_info">
                                            <li class="result_text">「영유아보육법」시행규칙 일부 개정령 공포・시행 (6월 30일) - 아동학대로 영유아에게 중대한 생명·신체 또는 정신적 손해를 입힌 경우, 원장 및 보육교사 자격정지 기준</li>
                                            <li class="result_date">[2021.07.13]</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="number"><span class="num">653</span></td>
                                    <td class="news">
                                        <a href="<?=DIR?>/community/job_view.php" class="result_subject">영유아보육법 시행규칙 일부 개정령 공포·시행</a>
                                        <ul class="result_info">
                                            <li class="result_text">「영유아보육법」시행규칙 일부 개정령 공포・시행 (6월 30일) - 아동학대로 영유아에게 중대한 생명·신체 또는 정신적 손해를 입힌 경우, 원장 및 보육교사 자격정지 기준</li>
                                            <li class="result_date">[2021.07.13]</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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