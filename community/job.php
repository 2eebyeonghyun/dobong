<? 
$_dep = array(6,4);
$_tit = array('커뮤니티','구인');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

</head>
<body>
<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section notice-page job-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="row">
                        <div class="top">
                            <div class="lef">
                                <div class="select_wr">
                                    <select name="job_list" id="job_list" class="__select jobList">
                                        <option value="모집직종">모집직종</option>
                                        <option value="보육교사">보육교사</option>
                                        <option value="원장">원장</option>
                                        <option value="간호사">간호사</option>
                                        <option value="영양사">영양사</option>
                                        <option value="조리원">조리원</option>
                                        <option value="사무원">사무원</option>
                                        <option value="특기교사">특기교사</option>
                                        <option value="대체교사">대체교사</option>
                                        <option value="특수교사">특수교사</option>
                                        <option value="연장반보육교사">연장반보육교사</option>
                                        <option value="보조교사">보조교사</option>
                                        <option value="보육도우미">보육도우미</option>
                                        <option value="보육전문요원">보육전문요원</option>
                                        <option value="행정원">행정원</option>
                                        <option value="기타">기타</option>
                                    </select>

                                    <select name="job_category" id="job_category" class="__select jobCategory">
                                        <option value="시설유형">시설유형</option>
                                        <option value="국공립">국공립</option>
                                        <option value="사회복지법인">사회복지법인</option>
                                        <option value="법인외">법인외</option>
                                        <option value="민간">민간</option>
                                        <option value="직장">직장</option>
                                        <option value="가정">가정</option>
                                        <option value="부모협동">부모협동</option>
                                    </select>
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

                        <div class="bot">
                            <table class="notice_table job_table">
                                <thead>
                                    <tr>
                                        <th class="tbh01">번호</th>
                                        <th class="tbh02">제목</th>
                                        <th class="tbh03">시설명</th>
                                        <th class="tbh04">시설유형</th>
                                        <th class="tbh05">모집직종</th>
                                        <th class="tbh06">등록일</th>
                                        <th class="tbh07">채용여부</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td class="job_num">2</td>
                                        <td class="job_subject"><a href="<?=DIR?>/community/job_view.php">연장반 보육교사 채용합니다</a><span class="new">new</span></td>
                                        <td class="job_name">동화나라</td>
                                        <td class="job_category">가정</td>
                                        <td class="job_list">보육교사</td>
                                        <td class="job_date">2024-05-21</td>
                                        <td class="job_state"><span class="open">채용중</span></td>
                                    </tr>
                                    <tr>
                                        <td class="job_num">1</td>
                                        <td class="job_subject"><a href="#none">★영아반 대체교사 모집합니다.</a></td>
                                        <td class="job_name">동화나라</td>
                                        <td class="job_category">가정</td>
                                        <td class="job_list">보육교사</td>
                                        <td class="job_date">2024-05-21</td>
                                        <td class="job_state"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="write_btn_wr">
                                <a href="<?=DIR?>/community/job_write.php" class="write_btn">글쓰기</a>
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