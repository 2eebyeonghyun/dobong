<?
$_dep = array(8,3,5);
$_tit = array('마이페이지','온라인신청내역','사전확인증');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

</head>
<body>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page asso-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php" class="active"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php"><span>회원탈퇴</span></a>
                    </div>

                    <div class="__tab">
                        <a href="<?=DIR?>/mypage/study.php"><span>교육 및 행사</span></a>
                        <a href="<?=DIR?>/mypage/program.php"><span>컨설팅 프로그램</span></a>
                        <a href="<?=DIR?>/mypage/borrow.php"><span>대관신청</span></a>
                        <!-- <a href="<?=DIR?>/mypage/table.php"><span>상차림신청</span></a> -->
                        <a href="<?=DIR?>/mypage/association.php" class="active"><span>사전확인증</span></a>
                    </div>
                    
                    <table class="__tblList respond3 asso_table">
                        <caption>TABLE</caption>
                        <colgroup>
                            <col style="width: 7%;">
                            <col style="width: 15%;">
                            <col>
                            <col style="width: 10%;">
                            <col style="width: 15%;">
                            <col style="width: 20%;">
                            <col style="width: 8%;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">어린이집명</th>
                                <th scope="col">주소</th>
                                <th scope="col">보육교사명</th>
                                <th scope="col">신청기간</th>
                                <th scope="col">신청사유</th>
                                <th scope="col">발급</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
							                  <td data-th="번호" class="__p">1</td>
							                  <td data-th="어린이집명">A어린이집</td>
							                  <td data-th="주소">서울시 구로구 디지털로26길 123 지플러스코오롱디지털타워 1510호</td>
							                  <td data-th="보육교사명">홍길동</td>
							                  <td data-th="신청기간">2024/06/04 ~ 06/10</td>
							                  <td data-th="신청사유">보수교육(직무교육)</td>
							                  <td data-th="발급"><a href="#none" class="print_btn" onclick="window.open('<?=DIR?>/mypage/association_frm.php', 'window_name', 'width=1920, height=1000, location=no, status=no, scrollbars=yes')">발급</a></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="__botArea">
                        <div class="cen"><? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/pagenation.php"; ?></div>
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