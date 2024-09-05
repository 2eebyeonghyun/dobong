<?
$_dep = array(8,3,5);
$_tit = array('마이페이지','온라인신청내역','사전확인증');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

</head>
<body>
<style>
    .wrap {padding: 0;}
</style>
<div id="wrap" class="wrap">
    <section class="section member-page asso-page print-page">
        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <form action="?" method="post" name="print_frm" id="print_frm" class="printFrm">
                        <div class="top_text_wr">
                            <span class="top_text">대체교사 인건비 지원</span>
                            <span class="bot_text">사전확인증</span>
                        </div>

                        <div class="main_text_wr">
                            <div class="row">
                                <span class="title">어린이집명 : </span>
                                <p class="text">A어린이집</p>
                            </div>

                            <div class="row">
                                <span class="title">주소 : </span>
                                <p class="text">서울시 구로구 디지털로26길 123 지플러스코오롱디지털타워 1510호</p>
                            </div>

                            <div class="row">
                                <span class="title">보육교사명 : </span>
                                <p class="text">홍길동</p>
                            </div>

                            <div class="row">
                                <span class="title">신청기간 : </span>
                                <p class="text">2024/06/04 ~ 06/10</p>
                            </div>

                            <div class="row">
                                <span class="title">신청사유 : </span>
                                <p class="text">보수교육(직무교육)</p>
                            </div>
                        </div>

                        <div class="bot_text_wr">
                            <p class="text">위 신청의 지원 사유 및 중복지원 등에 이상이 없음을 확인함.</p>

                            <div class="date_wr">
                                <span class="date">2024년 06월 04일</span>
                            </div>

                            <div class="stamp_wr">
                                <span class="title">도봉구육아종합지원센터장</span>
                                <p class="name">진소라</p>
                                <p class="stamp">(인)<img src="<?=DIR?>/img/member/stamp.png" alt="도봉구 도장 이미지"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>
</div>
</body>
<script>
    window.addEventListener('load', function () {
        console.log('페이지 로드 완료');

        const pageContent = document.documentElement.outerHTML;
        const win = window.open('about:blank', '_blank');

        // 가져온 HTML을 새 윈도우에 적용합니다.
        win
            .document
            .write(pageContent);

        // 새 윈도우에서 페이지를 출력합니다.
        win
            .document
            .close();
        win.print();
    });
</script>
</html>