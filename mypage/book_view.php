<?
// $pno = $_REQUEST['pno'];
// if(!$pno) $pno = "060201";
// if(!$list_url) $list_url = "toy.php";

// if($pno=="060201"){
// 	$list_url = "toy.php";
// 	$_dep = array(7,2,1);
// 	$_tit = array('마이페이지','대여리스트','장난감 대여');
// } else if($pno=="060202"){
// 	$list_url = "book.php";
// 	$_dep = array(7,2,2);
// 	$_tit = array('마이페이지','대여리스트','도서 대여');
// } else if($pno=="060203"){
// 	$list_url = "reserve.php";
// 	$_dep = array(7,2,3);
// 	$_tit = array('마이페이지','대여리스트','예약목록');
// }
?>
<?
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
	// $query = "SELECT 
	// 					A.itemname, A.itemcode, A.sdate, A.edate1, A.edate2, B.writer, B.maker, C.indate, B.buyprice, B.content, B.booktr1, B.booktr2, B.bookcall, (select count(*) from ona_orderitem where delete_yn='N' and itemcode=A.itemcode) As CNT, D.bname
	// 				FROM ona_orderitem As A 
	// 					LEFT JOIN ona_item B ON B.itemcode=A.itemcode
	// 					LEFT JOIN ona_item_barcode C ON C.barcode=A.barcode
	// 					LEFT JOIN ona_bcode D ON D.bcode=A.bcode
	// 				WHERE A.orderno='".$orderno."'";
	// //echo $query;
	// $result	= mysql_query($query);
	// $row	 	= @mysql_fetch_array($result);

	// $bookGroupStr = $row[bname].$row[booktr1].($row[booktr2]?".".$row[booktr2]:"").($row[bookcall]?"/".$row[bookcall]:"");

	// $list_url .= "?pno=".$pno."&page=".$page."&board_kind=".$board_kind."&search=".$search."&keyword=".$keyword;
?>
</head>
<body>

<form name="deleteForm" method="post" action="/skin/common/board_common_proc.php" target="procFrame">
    <input type="hidden" name="pno" value="<?=$pno?>">
    <input type="hidden" name="boardName" value="<?=$table?>">
    <input type="hidden" name="mode" value="delete">
    <input type="hidden" name="board_idx" value="<?=$board_idx?>">
    <input type="hidden" name="returnUrl" value="<?=$returnUrl?>">
    <input type="hidden" name="board_id" value="<?=$_SESSION['member_id']?>">
</form>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page book-page book-view-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__rendInfo">
                        <dl>
                            <dt>도서명</dt>
                            <dd><?=$row[itemname]?></dd>
                        </dl>
                        <dl>
                            <dt>저자명</dt>
                            <dd><?=$row[writer]?></dd>
                        </dl>
                        <dl>
                            <dt>출판사</dt>
                            <dd><?=$row[maker]?></dd>
                        </dl>
                        <dl>
                            <dt>구입날짜</dt>
                            <dd><?=$row[indate]?></dd>
                        </dl>
                        <dl>
                            <dt>구입가격</dt>
                            <dd><?=number_format($row[buyprice])?>원</dd>
                        </dl>
                        <dl>
                            <dt>등록번호</dt>
                            <dd><?=$row[itemcode]?></dd>
                        </dl>
                        <dl>
                            <dt>청구기호</dt>
                            <dd><?=$bookGroupStr?></dd>
                        </dl>
                        <dl>
                            <dt>연령</dt>
                            <dd><?=$row[age]?>세</dd>
                        </dl>
                        <dl>
                            <dt>대여일</dt>
                            <dd><?=$row[sdate]?></dd>
                        </dl>
                        <dl>
                            <dt>반납예정일</dt>
                            <dd><?=$row[edate1]?></dd>
                        </dl>
                        <dl class="wide">
                            <dt>반납일</dt>
                            <dd><?=$row[edate2]?></dd>
                        </dl>
                    </div>
                    <div class="con">
                        <br>
                        <?=nl2br($row[content])?>
                    </div>
                </div>
                <div class="__botArea">
                    <div class="cen">
                        <a href="<?=$list_url?>" class="__btnList"><span>목록</span></a>
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
<script language="javascript" src="/include/js/popup.js" type="text/javascript"></script>
<script>
function jsDownload(v1) {
var window_left = screen.width;
var window_top = screen.height;

var w = 200;
var h = 100;

var t = (screen.height / 2) - (h / 2) - 100;
var l = (screen.width / 2) - (w / 2);

open_popup(
    "../../include/global/download_board.php?file=" + v1,
    'DL',
    'DL',
    l,
    t,
    w,
    h
);
}
</script>
</html>