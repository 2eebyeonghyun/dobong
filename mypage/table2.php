<?
//$pno = "060305";
//$view_url = "borrow_view.php";
?>

<?
$_dep = array(8,3,4);
$_tit = array('마이페이지','온라인신청내역','상차림신청');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
// 	// 삭제
// 	if($_POST[send]=="delete" && $_POST[idx]){

// 		$query = "update ona_htable_app set delete_yn='Y' WHERE idx='".$_POST[idx]."'";	
// 		mysql_query($query);

// 		echo "<script language='javascript'>
// 					alert('취소되었습니다.');
// 				  </script>";
// 	}

// 	$listQuery		= "SELECT *
// 							FROM ona_htable_app
// 							WHERE userid='".$_SESSION['member_id']."' && delete_yn='N' && s_cd='02' ORDER BY idx DESC";
// 	$listResult		= mysql_query($listQuery);
// 	$list_num		= @mysql_num_rows($listResult);	

// 	if(!$total_count){ $total_count = 10; }

// 	if ($page == ""){ $page = "1"; }				
// 	$url				= $PHP_SELF."?pno=$pno";
// 	$total_page	= ceil($list_num/$total_count);
// 	$set_page 	= $total_count * ($page-1);
// 	$list_page 	= 10;
// 	$last 			= $page * $total_count;

// 	$paging		= common_paging2($url,$list_num,$page,$list_page,$total_count);
// 	if ($last > $list_num){ $last = $list_num; }


// // for paging
// $TOTAL = $list_num;
// $req['pagenumber'] = $page;
// $page_limit   = 10;
// $page_block  = 5;
?>
</head>
<body>

<form name="frm" method="post" action="<?=$_SERVER['PHP_SELF']?>">
    <input type="hidden" name="pno" value="<?=$pno?>">
    <input type="hidden" name="idx">
    <input type="hidden" name="send" value="delete">
    <input type="hidden" name="page" value="<?=$page?>">
    <input type="hidden" name="state" value="<?=$state?>">
</form>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
    <input type="hidden" name="pno" value="<?=$pno?>">
    <input type="hidden" name="mode" value="view">
    <input type="hidden" name="orderno">
    <input type="hidden" name="page" value="<?=$page?>">
</form>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page table-page">
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
                        <a href="<?=DIR?>/mypage/table.php" class="active"><span>상차림신청</span></a>
                        <a href="<?=DIR?>/mypage/association.php"><span>사전확인증</span></a>
                    </div>

                    <div class="__tab2">
                        <a href="<?=DIR?>/mypage/table.php"><span>방학센터 상차림신청</span></a>
                        <a href="<?=DIR?>/mypage/table2.php" class="active"><span>창동센터 상차림신청</span></a>
                    </div>

                    <table class="__tblList respond3 __mb50">
                        <caption>TABLE</caption>
                        <colgroup>
                            <col style="width:85px;">
                            <col style="width:150px;">
                            <col>
                            <col style="width:120px;">
                            <col style="width:200px;">
                            <col style="width:120px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">지점</th>
                                <th scope="col">상차림 구분</th>
                                <th scope="col">대여일</th>
                                <th scope="col">등록일</th>
                                <th scope="col">예약상태</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?	
                            $no = $list_num - $set_page;
                            if ($list_num){
                              for ($i = $set_page; $i < $last; $i++){
                                @mysql_data_seek($listResult,$i);						
                                $row= mysql_fetch_array($listResult);
                                //$stateIMG = $row['state']=="완료"?"icon_end":"icon_ing";
                            ?>
                            <tr>
                                <td data-th="번호" class="__p"><?=$no?></td>
                                <!-- <td data-th="지점"><?=$row[s_cd]=='01'?'답십리점':'제기점'?></td> -->
                                <td data-th="지점"><?= $row['s_cd'] == '01' ? '답십리점' : ($row['s_cd'] == '02' ? '제기점' : ($row['s_cd'] == '03' ? '휘경점' : '')) ?></td>
							                  <td data-th="상차림 구분"><?=$row[itemname]?></td>
							                  <td data-th="대여일"><?=$row[sdate]?></td>
							                  <td data-th="등록일"><?=$row[regdate]?></td>
							                  <td data-th="예약상태"><img src="../../images/common/icon_app_end.gif" style="cursor:pointer">
                                <?
                                  $temp_today = date("Y-m-d");
                                  if($row[sdate] > $temp_today)
                                  {
                                ?>
                                        <img src="../../images/common/btn_reserve.gif" alt="취소" style="cursor:pointer" onclick="del('<?=$row[idx]?>')">
                                    <?
                                  }
                                ?>
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
<script language="JavaScript">
    function del(v1) {
        if (confirm('정말 취소하시겠습니까?')) {
            f = document.frm;
            f.idx.value = v1;
            f.submit();
        }
    }
    function view_print(v) {
        window.open(
            '../../html/sub06/print.php?idx=' + v,
            'com',
            'width=830,height=750,menubar=no,location=no,resizable=no,status=no,scrollbars=' +
                    'no'
        );
    }
</script>
</html>