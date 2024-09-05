<?
//$pno = "060203";
//$view_url = "book_view.php";
?>

<?
$_dep = array(8,2,3);
$_tit = array('마이페이지','대여리스트','예약목록');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
// 	include $_SERVER["DOCUMENT_ROOT"]."/skin/myrent/reserve_check.php";
// 	$page=$page?$page:1;
// 	$listcnt=$listcnt?$listcnt:10;
// 	$start=($page-1)*$listcnt;
// 	$sort=$sort?$sort:"regdate desc";

// 	$where = array();
// 	$where[] = "userid='$_SESSION[member_id]'";
// 	$where[] = "status!='예약취소'";
// 	if($pno=="090205") $where[] = "(select itemtype from ona_item where itemcode=ona_item_reserve.itemcode)!='C'";
// 	if($pno=="090401") $where[] = "(select itemtype from ona_item where itemcode=ona_item_reserve.itemcode)='C'";
// 	if($sch_value) 	$where[] = "$sch_field like '%$sch_value%'";
// 	if($where) $where = " where ".implode(" and ",$where);

// 	$total = sqlRowOne("select count(*) from ona_item_reserve $where");
// 	$itemList = sqlArray("select * from ona_item_reserve $where order by $sort limit $start, $listcnt");


// // for paging
// $TOTAL = $total;
// $req['pagenumber'] = $page;
// $page_limit   = 10;
// $page_block  = 5;
?>
</head>
<body>

<form name="reserveForm" action="proc.php" method="post" target="procFrame">
    <input type="hidden" name="mode">
    <input type="hidden" name="idx" value="">
    <input type="hidden" name="userid" value="<?=$_SESSION['member_id']?>">
</form>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
    <input type="hidden" name="pno" value="<?=$pno?>">
    <input type="hidden" name="mode" value="view">
    <input type="hidden" name="orderno">
    <input type="hidden" name="page" value="<?=$page?>">
</form>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>
    <section class="section member-page toy-page">
        <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/svis.php"; ?>

        <article class="cont">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php" class="active"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php"><span>회원탈퇴</span></a>
                    </div>

                    <div class="__tab">
                        <a href="<?=DIR?>/mypage/toy.php"><span>장난감 대여</span></a>
                        <a href="<?=DIR?>/mypage/book.php"><span>도서 대여</span></a>
                        <a href="<?=DIR?>/mypage/reserve.php" class="active"><span>예약목록</span></a>
                    </div>

                    <table class="__tblList respond3">
                        <caption>TABLE</caption>
                        <colgroup>
                            <col style="width:85px;">
                            <col>
                            <col style="width:150px;">
                            <col style="width:150px;">
                            <col style="width:150px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col" class="__p">번호</th>
                                <th scope="col">구분</th>
                                <th scope="col">예약물품명</th>
                                <th scope="col">예약일</th>
                                <th scope="col">상태</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?
                              if($itemList){
                                $no = $total-$start;
                                $configinfo = sqlArray("select * from ona_init where configname='대여품목'","value1");
                                foreach($itemList as $k => $v){
                                  $iteminfo = sqlRow("select * from ona_item where itemcode='$v[itemcode]'");
                                  if($iteminfo['itemtype']=="T" && $iteminfo['s_cd']=="01") $tmppno = "030102";
                                  if($iteminfo['itemtype']=="T" && $iteminfo['s_cd']=="02") $tmppno = "030202";
                                  if($iteminfo['itemtype']=="B" && $iteminfo['s_cd']=="01") $tmppno = "030103";
                                  if($iteminfo['itemtype']=="B" && $iteminfo['s_cd']=="02") $tmppno = "030203";
                                  $link = $_SERVER['PHP_SELF']."?pno=$tmppno&mode=view&itemcode=$v[itemcode]";
                                  $status_img = "";
                                  if($v['status']=="예약완료") $status_img = '<span class="__ico1 green">예약완료</span>';
                                  if($v['status']=="대여완료") $status_img = '<span class="__ico1 white">대여완료</span>';
                                  if($v['status']=="기간만료") $status_img = '<span class="__ico1 orange">기간만료</span>';
                            ?>
                            <tr>
                                <td data-th="번호" class="__p"><?=$no?></td>
                                <td data-th="구분"><?=$configinfo[$iteminfo['itemtype']]['configtype']?></td>
                                <td data-th="예약물품명" class="subject"><?=$iteminfo['itemname']?></td>
                                <td data-th="예약일"><?=date("Y-m-d H:i:s",$v['sdate'])?></td>
                                <td data-th="상태">
                                  <?=$status_img?>
                                  <? if($v['status']=="예약완료"){ ?>
                                  <br /><span class="__ico1 orange" style="cursor:pointer;" onclick="cancelReserve('<?=$v['idx']?>');">예약취소</span>
                                  <? } ?>
                                </td>
                            </tr>
                            <?
                                $no = $no-1;
                                }
                              }
                            ?>
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
<script type="text/javascript" src="/include/js/osAjax.js"></script>
<script language="javascript">
    function cancelReserve(idx) {
        var form = document.reserveForm;
        if (!confirm("선택하신 대여예약을 취소 하시겠습니까?")) {
            return false;
        }
        form.idx.value = idx;
        form.mode.value = "cancelReserve";
        form.submit();
    }
</script>
</html>