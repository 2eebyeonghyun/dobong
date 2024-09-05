<div id="snb" class="snb-wrap">
    <ul class="sub_menu">
        <li class="home">
            <a href="<?=DIR?>/">
                <i class="axi axi-home"></i>
            </a>
        </li>

        <li class="ov">
            <span><?=$_tit[0]?></span>
            <ul>
                <li class="<?pubGnb('1');?>">
                    <a href="<?=DIR?>/center/vision.php">센터소개</a>
                </li>
                <li class="<?pubGnb('2');?>">
                    <a href="<?=DIR?>/care/operation.php">어린이집지원</a>
                </li>
                <li class="<?pubGnb('3');?>">
                    <a href="<?=DIR?>/support/playground.php">가정양육지원</a>
                </li>
                <li class="<?pubGnb('4');?>">
                    <a href="<?=DIR?>/rental/center_01_toy.php">도서·장난감 검색</a>
                </li>
                <li class="<?pubGnb('5');?>">
                    <a href="<?=DIR?>/study/care.html">교육 및 놀이실 예약</a>
                </li>
                <li class="<?pubGnb('6');?>">
                    <a href="<?=DIR?>/community/notice.php">커뮤니티</a>
                </li>
            </ul>
        </li>

        <li class="ov second-ov">
            <span><?=$_tit[1]?></span>
            <?if($_dep[0]==1){?>
            <ul>
                <li class="<?pubGnb('1,1');?>">
                    <a href="<?=DIR?>/center/vision.php">설립목적</a>
                </li>
                <li class="<?pubGnb('1,2');?>">
                    <a href="<?=DIR?>/center/history.html">연혁</a>
                </li>
                <li class="<?pubGnb('1,3');?>">
                    <a href="<?=DIR?>/center/org.php">조직구성</a>
                </li>
                <li class="<?pubGnb('1,4');?>">
                    <a href="<?=DIR?>/center/business.php">주요사업</a>
                </li>
                <li class="<?pubGnb('1,5');?>">
                    <a href="<?=DIR?>/center/information.php">이용안내</a>
                </li>
                <li class="<?pubGnb('1,6');?>">
                    <a href="<?=DIR?>/center/facilities.php">시설현황</a>
                </li>
                <li class="<?pubGnb('1,7');?>">
                    <a href="<?=DIR?>/center/location.html">오시는 길</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2){?>
            <ul>
                <li class="<?pubGnb('2,1');?>">
                    <a href="<?=DIR?>/care/operation.php">어린이집운영</a>
                </li>
                <li class="<?pubGnb('2,2');?>">
                    <a href="<?=DIR?>/care/sub02.php">보육행정</a>
                </li>
                <li class="<?pubGnb('2,3');?>">
                    <a href="<?=DIR?>/care/teacher_education.php">보육교직원교육</a>
                </li>
                <li class="<?pubGnb('2,4');?>">
                    <a href="<?=DIR?>/care/counselting.php">어린이집컨설팅</a>
                </li>
                <li class="<?pubGnb('2,5');?>">
                    <a href="<?=DIR?>/care/eco.php">생태보육</a>
                </li>
                <li class="<?pubGnb('2,6');?>">
                    <a href="<?=DIR?>/care/program.html">장애아지원</a>
                </li>
                <li class="<?pubGnb('2,7');?>">
                    <a href="<?=DIR?>/care/care_support.php">대체인력지원</a>
                </li>
                <li class="<?pubGnb('2,8');?>">
                    <a href="<?=DIR?>/care/child.html">아동학대예방</a>
                </li>
                <li class="<?pubGnb('2,9');?>">
                    <a href="<?=DIR?>/care/another_support2.php">기타지원사업</a>
                </li>
                <li class="<?pubGnb('2,10');?>">
                    <a href="<?=DIR?>/care/data_room.php">자료실</a>
                </li>
            </ul>
        <?}else if($_dep[0]==3){?>
            <ul>
                <li class="<?pubGnb('3,6');?>">
                    <a href="<?=DIR?>/rental/rental_information.php">도서·장난감 대여</a>
                </li>
                <li class="<?pubGnb('3,1');?>">
                    <a href="<?=DIR?>/support/playground.php">실내놀이실</a>
                </li>
                <li class="<?pubGnb('3,2');?>">
                    <a href="<?=DIR?>/support/program.php">체험프로그램</a>
                </li>
                <li class="<?pubGnb('3,3');?>">
                    <a href="<?=DIR?>/support/parents_education.php">부모교육</a>
                </li>
                <li class="<?pubGnb('3,4');?>">
                    <a href="<?=DIR?>/support/treatment.php">발달지원 및 치료</a>
                </li>
                <li class="<?pubGnb('3,5');?>">
                    <a href="<?=DIR?>/support/time.php">시간제보육</a>
                </li>
            </ul>
        <?}else if($_dep[0]==4){?>
            <ul>
                <li class="<?pubGnb('4,2');?>">
                    <a href="<?=DIR?>/rental/center_01_toy.php">방학센터</a>
                </li>
                <li class="<?pubGnb('4,3');?>">
                    <a href="<?=DIR?>/rental/center_02_toy.php">창동센터</a>
                </li>
            </ul>
        <?}else if($_dep[0]==5){?>
            <ul>
                <li class="<?pubGnb('5,1');?>">
                    <a href="<?=DIR?>/study/care.html">보육교직원</a>
                </li>
                <li class="<?pubGnb('5,2');?>">
                    <a href="<?=DIR?>/study/center_all.php">양육자 및 영유아</a>
                </li>
            </ul>
        <?}else if($_dep[0]==6){?>
            <ul>
                <li class="<?pubGnb('6,1');?>">
                    <a href="<?=DIR?>/community/notice.php">공지사항</a>
                </li>
                <li class="<?pubGnb('6,2');?>">
                    <a href="<?=DIR?>/community/notice.php">센터소식</a>
                </li>
                <li class="<?pubGnb('6,3');?>">
                    <a href="<?=DIR?>/community/notice.php">정보알림</a>
                </li>
                <li class="<?pubGnb('6,4');?>">
                    <a href="<?=DIR?>/community/job.php">구인</a>
                </li>
                <li class="<?pubGnb('6,5');?>">
                    <a href="<?=DIR?>/community/counseling.php">상담</a>
                </li>
            </ul>
        <?}else if($_dep[0]==8){?>
            <ul>
                <li class="<?pubGnb('8,1');?>">
                    <a href="<?=DIR?>/mypage/modify.html">회원정보 수정</a>
                </li>
                <li class="<?pubGnb('8,2');?>">
                    <a href="<?=DIR?>/mypage/toy.php">대여리스트</a>
                </li>
                <li class="<?pubGnb('8,3');?>">
                    <a href="<?=DIR?>/mypage/study.php">온라인신청내역</a>
                </li>
                <li class="<?pubGnb('8,4');?>">
                    <a href="<?=DIR?>/mypage/leave.php">회원탈퇴</a>
                </li>
            </ul>
        <?}else if($_dep[0]==9){?>
            <ul>
                <li class="<?pubGnb('9,1');?>">
                    <a href="<?=DIR?>/etc/provision.html">이용약관</a>
                </li>
                <li class="<?pubGnb('9,2');?>">
                    <a href="<?=DIR?>/etc/privacy.html">개인정보처리방침</a>
                </li>
                <li class="<?pubGnb('9,3');?>">
                    <a href="<?=DIR?>/etc/email.html">이메일무단수집거부</a>
                </li>
                <li class="<?pubGnb('9,4');?>">
                    <a href="<?=DIR?>/center/location.html">찾아오시는 길</a>
                </li>
            </ul>
            <?}?>
        </li>

        <?if($_dep[2]){?>
        <li class="ov last-ov">
            <span><?=$_tit[2]?></span>
            <?if($_dep[0]==1&&$_dep[1]==7){?>
            <ul>
                <li class="<?pubGnb('1,7,1');?>">
                    <a href="<?=DIR?>/center/location.html">도봉구육아종합지원센터</a>
                </li>
                <li class="<?pubGnb('1,7,2');?>">
                    <a href="<?=DIR?>/center/location1.html">도봉구육아종합지원센터 창동점</a>
                </li>
                <li class="<?pubGnb('1,7,3');?>">
                    <a href="<?=DIR?>/center/location2.html">쓰담쓰담 열린육아방</a>
                </li>
                <li class="<?pubGnb('1,7,4');?>">
                    <a href="<?=DIR?>/center/location3.html">도봉2동점</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==1){?>
            <ul>
                <li class="<?pubGnb('2,1,1');?>">
                    <a href="<?=DIR?>/care/operation.php">어린이집안내</a>
                </li>
                <li class="<?pubGnb('2,1,2');?>">
                    <a href="<?=DIR?>/care/operation2.php">어린이집입소기준</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==2){?>
            <ul>
                <li class="<?pubGnb('2,2,1');?>">
                    <a href="<?=DIR?>/care/sub02.php">영유아보육법</a>
                </li>
                <li class="<?pubGnb('2,2,2');?>">
                    <a href="<?=DIR?>/care/sub02-2.php">도봉구보육조례</a>
                </li>
                <li class="<?pubGnb('2,2,3');?>">
                    <a href="<?=DIR?>/care/sub02-3.php">보육사업안내</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==4){?>
            <ul>
                <li class="<?pubGnb('2,4,1');?>">
                    <a href="<?=DIR?>/care/counselting.php">평가제</a>
                </li>
                <li class="<?pubGnb('2,4,2');?>">
                    <a href="<?=DIR?>/care/counselting2.php">보육과정</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==7){?>
            <ul>
                <li class="<?pubGnb('2,7,1');?>">
                    <a href="<?=DIR?>/care/care_support.php">대체교육인력지원</a>
                </li>
                <li class="<?pubGnb('2,7,2');?>">
                    <a href="<?=DIR?>/care/care_support2.php">대체조리원인력지원</a>
                </li>
                <li class="<?pubGnb('2,7,3');?>">
                    <a href="<?=DIR?>/care/care_support3.php">긴급대체교사지원신청</a>
                </li>
                <li class="<?pubGnb('2,7,4');?>">
                    <a href="<?=DIR?>/care/care_support4.php">어린이집직접채용</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==9){?>
            <ul>
                <li class="<?pubGnb('2,9,1');?>">
                    <a href="<?=DIR?>/care/another_support2.php">어린이집안전관리 전문요원 운영</a>
                </li>
                <li class="<?pubGnb('2,9,2');?>">
                    <a href="<?=DIR?>/care/another_support.php">서울형모아어린이집</a>
                </li>
            </ul>
        <?}else if($_dep[0]==2&&$_dep[1]==10){?>
            <ul>
                <li class="<?pubGnb('2,10,1');?>">
                    <a href="<?=DIR?>/care/data_room.php">어린이집운영</a>
                </li>
                <li class="<?pubGnb('2,10,2');?>">
                    <a href="<?=DIR?>/care/data_room2.php">건강,영양(식단)</a>
                </li>
            </ul>

        <?}else if($_dep[0]==3&&$_dep[1]==6){?>
            <ul>
                <li class="<?pubGnb('3,6,1');?>">
                    <a href="<?=DIR?>/rental/rental_information.php">장난감누림터·장난감나눔이</a>
                </li>
                <li class="<?pubGnb('3,6,2');?>">
                    <a href="<?=DIR?>/rental/rental_information3.php">찾아가는장난감 도토리</a>
                </li>
                <li class="<?pubGnb('3,6,3');?>">
                    <a href="<?=DIR?>/rental/rental_information3.php">도서누림터·도서나눔이</a>
                </li>
            </ul>
        <?}else if($_dep[0]==3&&$_dep[1]==1){?>
            <ul>
                <li class="<?pubGnb('3,1,1');?>">
                    <a href="<?=DIR?>/support/playground.php">놀이누림터</a>
                </li>
                <li class="<?pubGnb('3,1,2');?>">
                    <a href="<?=DIR?>/support/playground2.php">쓰담쓰담열린육아방</a>
                </li>
                <li class="<?pubGnb('3,1,3');?>">
                    <a href="<?=DIR?>/support/playground3.php">서울형키즈카페</a>
                </li>
            </ul>
        <?}else if($_dep[0]==3&&$_dep[1]==2){?>
            <ul>
                <li class="<?pubGnb('3,2,1');?>">
                    <a href="<?=DIR?>/support/program.php">영유아체험프로그램</a>
                </li>
            </ul>
        <?}else if($_dep[0]==3&&$_dep[1]==3){?>
            <ul>
                <li class="<?pubGnb('3,3,1');?>">
                    <a href="<?=DIR?>/support/parents_education.php">공통부모교육</a>
                </li>
                <li class="<?pubGnb('3,3,2');?>">
                    <a href="<?=DIR?>/support/parents_education2.php">자체부모교육</a>
                </li>
            </ul>
        <?}else if($_dep[0]==3&&$_dep[1]==4){?>
            <ul>
                <li class="<?pubGnb('3,4,1');?>">
                    <a href="<?=DIR?>/support/treatment.php">언어 및 놀이치료</a>
                </li>
                <li class="<?pubGnb('3,4,2');?>">
                    <a href="<?=DIR?>/support/treatment2.php">영유아발달지원사업</a>
                </li>
                <li class="<?pubGnb('3,4,3');?>">
                    <a href="<?=DIR?>/support/treatment3.php">양육상담</a>
                </li>
            </ul>

        <?}else if($_dep[0]==4&&$_dep[1]==2){?>
            <ul>
                <li class="<?pubGnb('4,2,1');?>">
                    <a href="<?=DIR?>/rental/center_01_toy.php">장난감검색</a>
                </li>
                <li class="<?pubGnb('4,2,2');?>">
                    <a href="<?=DIR?>/rental/center_01_book.php">도서검색</a>
                </li>
            </ul>

        <?}else if($_dep[0]==4&&$_dep[1]==3){?>
            <ul>
                <li class="<?pubGnb('4,3,1');?>">
                    <a href="<?=DIR?>/rental/center_02_toy.php">장난감검색</a>
                </li>
                <li class="<?pubGnb('4,3,2');?>">
                    <a href="<?=DIR?>/rental/center_02_book.php">도서검색</a>
                </li>
            </ul>

        <?}else if($_dep[0]==5&&$_dep[1]==1){?>
            <ul>
                <li class="<?pubGnb('5,1,1');?>">
                    <a href="<?=DIR?>/study/care.html">교육 및 행사</a>
                </li>
                <li class="<?pubGnb('5,1,2');?>">
                    <a href="<?=DIR?>/study/care2.php">놀이실 및 프로그램</a>
                </li>
                <li class="<?pubGnb('5,1,3');?>">
                    <a href="<?=DIR?>/study/care3.php">대체인력추가신청</a>
                </li>
                <li class="<?pubGnb('5,1,4');?>">
                    <a href="<?=DIR?>/study/care4.php">부모교직원상담</a>
                </li>
            </ul>
        <?}else if($_dep[0]==5&&$_dep[1]==2){?>
            <ul>
                <li class="<?pubGnb('5,2,1');?>">
                    <a href="<?=DIR?>/study/center_all.php">전체</a>
                </li>
                <li class="<?pubGnb('5,2,2');?>">
                    <a href="<?=DIR?>/study/center_1.php">방학센터</a>
                </li>
                <li class="<?pubGnb('5,2,3');?>">
                    <a href="<?=DIR?>/study/center_2.php">창동센터</a>
                </li>
                <li class="<?pubGnb('5,2,4');?>">
                    <a href="<?=DIR?>/study/center_3.php">기타놀이실</a>
                </li>
                <li class="<?pubGnb('5,2,5');?>">
                    <a href="<?=DIR?>/study/center_4.php">부모양육상담</a>
                </li>
            </ul>
        <?}else if($_dep[0]==6&&$_dep[1]==5){?>
            <ul>
                <li class="<?pubGnb('6,5,1');?>">
                    <a href="<?=DIR?>/community/counseling.php">양육상담</a>
                </li>
                <li class="<?pubGnb('6,5,2');?>">
                    <a href="<?=DIR?>/community/counseling2.php">보육교직원상담</a>
                </li>
                <li class="<?pubGnb('6,5,2');?>">
                    <a href="<?=DIR?>/community/counseling3.php">이용상담</a>
                </li>
            </ul>

        <?}else if($_dep[0]==8&&$_dep[1]==2){?>
            <ul>
                <li class="<?pubGnb('8,2,1');?>">
                    <a href="<?=DIR?>/mypage/toy.php">장난감 대여</a>
                </li>
                <li class="<?pubGnb('8,2,2');?>">
                    <a href="<?=DIR?>/mypage/book.php">도서 대여</a>
                </li>
                <li class="<?pubGnb('8,2,2');?>">
                    <a href="<?=DIR?>/mypage/reserve.php">예약목록</a>
                </li>
            </ul>
        <?}else if($_dep[0]==8&&$_dep[1]==3){?>
            <ul>
                <li class="<?pubGnb('8,3,1');?>">
                    <a href="<?=DIR?>/mypage/study.php">교육 및 행사</a>
                </li>
                <li class="<?pubGnb('8,3,2');?>">
                    <a href="<?=DIR?>/mypage/program.php">컨설팅 프로그램</a>
                </li>
                <li class="<?pubGnb('8,3,2');?>">
                    <a href="<?=DIR?>/mypage/borrow.php">대관신청</a>
                </li>
                <!-- <li class="<?pubGnb('8,3,4');?>">
                    <a href="<?=DIR?>/mypage/table.php">상차림신청</a>
                </li> -->
                <li class="<?pubGnb('8,3,5');?>">
                    <a href="<?=DIR?>/mypage/association.php">사전확인증</a>
                </li>
            </ul>
            <?}?>
        </li>

        <?if($_dep[3]){?>
        <li class="ov last-ov">
            <span><?=$_tit[3]?></span>
            <?if($_dep[0]==2&&$_dep[1]==10&&$_dep[2]==2){?>
            <ul>
                <li class="<?pubGnb('2,10,2,1');?>">
                    <a href="<?=DIR?>/care/data_room2.php">식단정보</a>
                </li>
                <li class="<?pubGnb('2,10,2,2');?>">
                    <a href="<?=DIR?>/care/data_room2-2.php">레시피</a>
                </li>
                <li class="<?pubGnb('2,10,2,3');?>">
                    <a href="<?=DIR?>/care/data_room2-3.php">정보자료</a>
                </li>
            </ul>

        <?}else if($_dep[0]==4&&$_dep[1]==1&&$_dep[2]==1){?>
            <ul>
                <li class="<?pubGnb('4,1,1,1');?>">
                    <a href="<?=DIR?>/rental/rental_information.php">장난감누림터·장난감나눔이</a>
                </li>
                <li class="<?pubGnb('4,1,1,2');?>">
                    <a href="<?=DIR?>/rental/rental_information2.php">찾아가는장난감 도토리</a>
                </li>
            </ul>
            <?}?>
        </li>
        <?}?>

        <?}?>
    </ul>
</div>