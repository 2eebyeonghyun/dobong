<?
//$pno = "060201";
//$view_url = "toy_view.php";
?>

<?
$_dep = array(8,2,1);
$_tit = array('마이페이지','대여리스트','장난감 대여');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
	// $whereAnd = " && itemtype='T'";
	// $whereAnd .= " && userid='".$_SESSION['member_id']."'";

	// if($search && $keyword) $whereAnd .= " && ( $search like '%$keyword%' )";

	// $query	= "SELECT *	FROM ona_orderitem a left join ona_common_code b on a.status = b.cm_cd 
	// 				WHERE delete_yn='N' $whereAnd ORDER BY sdate DESC";	
	// $result	= mysql_query($query);
	// $nums	= @mysql_num_rows($result);

	// if(!$total_count){ $total_count = "10"; }

	// if ($page == ""){ $page = "1"; }
	// $url				= $PHP_SELF."?pno=$pno";
	// $total_page	= ceil($nums/$total_count);
	// $set_page 	= $total_count * ($page-1);
	// $list_page 	= 10;
	// $last 			= $page * $total_count;

	// $paging		= common_paging2($url,$nums,$page,$list_page,$total_count,$search,$keyword);
	// if ($last > $nums){ $last = $nums; }

// for paging
// $TOTAL = $nums;
// $req['pagenumber'] = $page;
// $page_limit   = 10;
// $page_block  = 5;
?>

</head>
<body>

<form name="extensionForm" method="post" action="../../html/mypage/order_extension.php" target="procFrame">
    <input type="hidden" name="mode" value="setExt">
    <input type="hidden" name="orderno" value="">
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

        <article class="cont cont1">
            <div class="inner">
                <div id="content">
                    <div class="__tab3">
                        <a href="<?=DIR?>/mypage/modify.php"><span>회원정보 수정</span></a>
                        <a href="<?=DIR?>/mypage/toy.php" class="active"><span>대여리스트</span></a>
                        <a href="<?=DIR?>/mypage/study.php"><span>온라인신청내역</span></a>
                        <a href="<?=DIR?>/mypage/leave.php"><span>회원탈퇴</span></a>
                    </div>

                    <div class="__tab">
                        <a href="<?=DIR?>/mypage/toy.php" class="active"><span>장난감 대여</span></a>
                        <a href="<?=DIR?>/mypage/book.php"><span>도서 대여</span></a>
                        <a href="<?=DIR?>/mypage/reserve.php"><span>예약목록</span></a>
                    </div>

                    <table class="__tblList respond3">
                        <caption>TABLE</caption>
                        <colgroup>
                            <col style="width:85px;">
                            <col>
                            <col style="width:150px;">
                            <col style="width:150px;">
                            <col style="width:150px;">
                            <col style="width:150px;">
                        </colgroup>
                        
                        <thead>
                            <tr>
                                <th scope="col" class="__p">번호</th>
                                <th scope="col">장난감명</th>
                                <th scope="col">대여일</th>
                                <th scope="col">반납예정일</th>
                                <th scope="col">반납일</th>
                                <th scope="col">상태</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?		
                                $no = $nums - $set_page;
                                if ($nums){
                                  for ($i = $set_page; $i < $last; $i++){
                                  @mysql_data_seek($result,$i);
                                  $row= mysql_fetch_array($result);		
                                  
                                  $state = $row[cm_nm];
                                  if( intval(strtotime(trim($row['edate1']))) <  intval(strtotime(date("Y-m-d"))) && $row['status'] == "RT03" ){
                                    $state = '&nbsp;<span class="__ico1 orange">연체중</span>';
                                    //$state .= "<FONT color=\"blue\" onClick=\"OrderExt(".$row['orderno'].")\" style=\"cursor:hand\">연장하기</FONT>";
                                  }elseif($row['status'] == "RT03" && $row['extention'] == "N" && $row['bcode'] == "TJ"){
                                    $state .= "&nbsp;연장불가";
                                  }else{
                                    if($row['status'] == "RT03" && $row['extention'] == "N"){
                  //										$state .= "&nbsp;<FONT color=\"blue\" onClick=\"OrderExt(".$row['orderno'].")\" style=\"cursor:hand\">연장하기</FONT>";
                                      //2024.03.13 $state .= '&nbsp;<span class="__ico1 blue" onClick="OrderExt('.$row['orderno'].')">연장하기</span>';
                                    }else{
                                      if($row['extention'] == "Y") $state .= "&nbsp;1회연장";
                                    }
                                  }
                                  $temp_scd = '';
                                  if($row[s_cd]=='01')
                                  {
                                    $temp_scd = '[답십리]';
                                  }
                                  else if($row[s_cd]=='02')
                                  {
                                    $temp_scd = '[제기]';
                                  }
                                  
                                  $temp_item = $temp_scd.$row[itemname];

                                  $view_url = "toy_view.php";
                                  $view_url .= "?pno=".$pno."&mode=view&orderno=".$row[orderno]."&page=".$page;
                            ?>
                            <tr>
                                <td data-th="번호" class="__p"><?=$no?></td>
                                <td data-th="장난감명" class="subject"><a href="<?=$view_url?>"><?=$temp_item?></a></td>
                                <td data-th="대여일"><?=$row[sdate]?></td>
                                <td data-th="반납예정일"><?=$row[edate1]?></td>
                                <td data-th="반납일"><?=$row[edate2]?$row[edate2]:"&nbsp;"?></td>
                                <td data-th="상태"><?=$state?$state:"&nbsp;"?></td>
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
    function OrderExt(orderno) {
        if (confirm("대여연장은 1회 7일만 하실 수 있습니다.\n연장하시겠습니까?")) {
            document.extensionForm.orderno.value = orderno;
            document
                .extensionForm
                .submit();
        }
    }
</script>
</html>