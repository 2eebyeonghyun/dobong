<? 
$_dep = array(6,5,1);
$_tit = array('커뮤니티','상담','양육상담');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page counseling-page counseling01-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/community/counseling.php" class="active"><span>양육상담</span></a>
                        <a href="<?=DIR?>/community/counseling2.php" class=""><span>보육교직원상담</span></a>
                        <a href="<?=DIR?>/community/counseling3.php" class=""><span>이용상담</span></a>
                    </div>

                    <div class="row">
                        <div class="top">
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

                        <div class="bot">
                            <table class="notice_table counseling_table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">번호</th>
                                        <th class="tbh02">제목</th>
                                        <th class="tbh03">등록일</th>
                                        <th class="tbh04">상태</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr class="__secret">
                                        <td class="counseling_num">2</td>
                                        <td class="counseling_subject"><a href="<?=DIR?>/community/counseling_view.php">육아스트레스 여러가지 문제 상담요청</a><i class="axi axi-lock3"></i></td>
                                        <td class="counseling_date">2022.07.25</td>
                                        <td class="counseling_state"><span class="state_block standby">상담대기</span></td>
                                    </tr>
                                    <tr class="__secret">
                                        <td class="counseling_num">1</td>
                                        <td class="counseling_subject"><a href="#none">육아스트레스 여러가지 문제 상담요청</a><i class="axi axi-lock3"></i></td>
                                        <td class="counseling_date">2022.07.25</td>
                                        <td class="counseling_state"><span class="state_block complete">상담완료</span></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="write_btn_wr">
                                <a href="<?=DIR?>/community/counseling_write.php" class="write_btn">글쓰기</a>
                            </div>

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