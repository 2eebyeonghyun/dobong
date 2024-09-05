<? 
$_dep = array(7,1);
$_tit = array('도봉구육아종합지원센터','사이트맵');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php"; 
?>

<body>
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <div class="wrap">
        <section class="section sitemap-page">
            <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

            <article class="cont cont1">
                <div class="inner">
                    <ul class="sitemap_list">
                        <li>
                            <span class="title">센터소개</span>
                            <ul class="dep2_list">
                                <li><a href="<?=DIR?>/center/vision.php">설립목적</a></li>
                                <li><a href="<?=DIR?>/center/history.html">연혁</a></li>
                                <li><a href="<?=DIR?>/center/org.php">조직구성</a></li>
                                <li><a href="<?=DIR?>/center/business.php">주요사업</a></li>
                                <li><a href="<?=DIR?>/center/information.php">이용안내</a></li>
                                <li><a href="<?=DIR?>/center/facilities.php">시설현황</a></li>
                                <li><a href="<?=DIR?>/center/location.html">오시는 길</a></li>
                            </ul>
                        </li>

                        <li>
                            <span class="title" style="background-color: #52cb56;">어린이집지원</span>
                            <ul class="dep2_list">
                                <li>
                                    <a href="<?=DIR?>/care/operation.php">어린이집운영</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/operation.php">어린이집안내</a></li>
                                        <li><a href="<?=DIR?>/care/operation2.php">어린이집입소기준</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/care/sub02.php">보육행정</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/sub02.php">영유아보육법</a></li>
                                        <li><a href="<?=DIR?>/care/sub02-2.php">도봉구보육조례</a></li>
                                        <li><a href="<?=DIR?>/care/sub02-3.php">보육사업안내</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=DIR?>/care/teacher_education.php">보육교직원교육</a></li>
                                <li>
                                    <a href="<?=DIR?>/care/counselting.php">어린이집컨설팅</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/counselting.php">평가제</a></li>
                                        <li><a href="<?=DIR?>/care/counselting2.php">보육과정</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=DIR?>/care/eco.php">생태보육</a></li>
                                <li><a href="<?=DIR?>/care/program.html">장애아지원</a></li>
                                <li>
                                    <a href="<?=DIR?>/care/care_support.php">대체인력지원</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/care_support.php">대체교사인력지원</a></li>
                                        <li><a href="<?=DIR?>/care/care_support2.php">대체조리원인력지원</a></li>
                                        <li><a href="<?=DIR?>/care/care_support3.php">긴급대체교시지원신청</a></li>
                                        <li><a href="<?=DIR?>/care/care_support4.php">어린이집직접채용</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=DIR?>/care/child.html">아동학대예방</a></li>
                                <li>
                                    <a href="<?=DIR?>/care/another_support.php">기타지원사업</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/another_support.php">서울형모아어린이집</a></li>
                                        <li><a href="<?=DIR?>/care/another_support2.php">어린이집안전관리</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/care/data_room.php">자료실</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/care/data_room.php">어린이집운영</a></li>
                                        <li><a href="<?=DIR?>/care/data_room2.php">건강, 영양(식단)</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span class="title" style="background-color: #39c5db;">가정양육지원</span>
                            <ul class="dep2_list">
                                <li>
                                    <a href="<?=DIR?>/rental/rental_information.php">도서·장난감 대여</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/rental/rental_information.php">장난감누림터·장난감나눔이</a></li>
                                        <li><a href="<?=DIR?>/rental/rental_information2.php">찾아가는장난감 도토리</a></li>
                                        <li><a href="<?=DIR?>/rental/rental_information3.php">도서누림터·도서나눔이</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/support/playground.php">실내놀이실</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/support/playground.php">놀이누림터</a></li>
                                        <li><a href="<?=DIR?>/support/playground2.php">쓰담쓰담열린육아방</a></li>
                                        <li><a href="<?=DIR?>/support/playground3.php">서울형키즈카페</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/support/program.php">체험프로그램</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/support/program.php">영유아체험프로그램</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/support/parents_education.php">부모교육</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/support/parents_education.php">공통부모교육</a></li>
                                        <li><a href="<?=DIR?>/support/parents_education2.php">자체부모교육</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/support/treatment.php">발달지원 및 치료</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/support/treatment.php">언어 및 놀이치료</a></li>
                                        <li><a href="<?=DIR?>/support/treatment2.php">영유아발달지원사업</a></li>
                                        <li><a href="<?=DIR?>/support/treatment3.php">부모양육상담</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?=DIR?>/support/time.php">시간제보육</a></li>
                            </ul>
                        </li>

                        <li>
                            <span class="title" style="background-color: #f795e7;">도서·장난감 검색</span>
                            <ul class="dep2_list">
                                <li>
                                    <a href="<?=DIR?>/rental/center_01_toy.php">방학센터</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/rental/center_01_toy.php">장난감검색</a></li>
                                        <li><a href="<?=DIR?>/rental/center_01_book.php">도서검색</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/rental/center_02_toy.php">창동센터</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/rental/center_02_toy.php">장난감검색</a></li>
                                        <li><a href="<?=DIR?>/rental/center_02_book.php">도서검색</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span class="title" style="background-color: #31dfe7;">교육 및 놀이실 예약</span>
                            <ul class="dep2_list">
                                <li>
                                    <a href="<?=DIR?>/study/care.html">보육교직원</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/study/care.html">교육 및 행사</a></li>
                                        <li><a href="<?=DIR?>/study/care2.phphtml">실내놀이실</a></li>
                                        <li><a href="<?=DIR?>/study/care3.phphtml">대체인력추가신청</a></li>
                                        <li><a href="<?=DIR?>/study/care4.phphtml">보육교직원상담</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?=DIR?>/study/center_all.php">양육자 및 영유아</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/study/center_all.php">전체</a></li>
                                        <li><a href="<?=DIR?>/study/center_1.php">방학센터</a></li>
                                        <li><a href="<?=DIR?>/study/center_2.php">창동센터</a></li>
                                        <li><a href="<?=DIR?>/study/center_3.php">기타놀이실</a></li>
                                        <li><a href="<?=DIR?>/study/center_4.php">부모양육상담</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <span class="title" style="background-color: #089df3;">커뮤니티</span>
                            <ul class="dep2_list">
                                <li><a href="<?=DIR?>/community/notice.php">공지사항</a></li>
                                <li><a href="<?=DIR?>/community/notice.php">센터소식</a></li>
                                <li><a href="<?=DIR?>/community/notice.php">정보알림</a></li>
                                <li><a href="<?=DIR?>/community/job.php">구인 및 구직</a></li>
                                <li>
                                    <a href="<?=DIR?>/community/counseling.php">상담</a>
                                    <ul class="dep3_list">
                                        <li><a href="<?=DIR?>/community/counseling.php">양육상담</a></li>
                                        <li><a href="<?=DIR?>/community/counseling2.php">보육교직원상담</a></li>
                                        <li><a href="<?=DIR?>/community/counseling3.php">이용상담</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </article>

            <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/f_popup.php"; ?>
        </section>
    </div>
    
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/footer.php"; ?>
</body>
</html>