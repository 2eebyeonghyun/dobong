<?
$pno = "060301";
$view_url = "study_view.php";
?>

<?
$_dep = array(8,3,1);
$_tit = array('마이페이지','온라인신청내역','교육 및 행사');
include $_SERVER['DOCUMENT_ROOT']."/dobong/include/common.php";
?>

<?include_once PATH.'/inc/board_config.php';?>

<?
// 	$listQuery		= "SELECT 
// 								A.*, B.title As emTitle, B.edu_sdate, B.edu_edate, B.license
// 							FROM ddm_edu_app As A
// 								LEFT OUTER JOIN ddm_edu_main As B ON B.idx=A.parent_idx
// 							WHERE mbId='".$_SESSION['member_id']."' && del_yn='N' ORDER BY idx DESC";
// 	$listResult		= mysql_query($listQuery);
// 	$list_num		= @mysql_num_rows($listResult);	

	

// 	if(!$total_count){ $total_count = 10; }

// 	if ($page == ""){ $page = "1"; }				
// 	$url				= $PHP_SELF."?pno=$pno";
// 	$total_page	= ceil($list_num/$total_count);
// 	$set_page 	= 10 * ($page-1);
// 	$list_page 	= 10;
// 	$last 			= $page * $total_count;

// if($_SERVER['REMOTE_ADDR']=='211.54.23.48') {
//    var_dump($set_page);
// }

// 	$paging		= common_paging2($url,$list_num,$page,$list_page,$total_count);
// 	if ($last > $list_num){ $last = $list_num; }


// // for paging
// $TOTAL = $list_num;
// $req['pagenumber'] = $page;
// $page_limit   = 10;
// $page_block  = 5;


// 	// 신청자 참석여부
// 	$appStatus	= $_POST[applyStatus];
?>
</head>
<body>

<form name="procFrm" method="post" action="060301_proc.php" target="procFrame">
    <input type="hidden" name="send" value="del">
    <input type="hidden" name="idx" value="">	
    <input type="hidden" name="parent_idx" value="">	
    <input type="hidden" name="idx_add" value="">	
</form>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
	  <input type="hidden" name="pno" value="<?=$pno?>">
	  <input type="hidden" name="mode" value="view">
	  <input type="hidden" name="orderno">
	  <input type="hidden" name="page" value="<?=$page?>">
</form>

<div id="wrap" class="wrap">
    <? include $_SERVER['DOCUMENT_ROOT']."/dobong/include/header.php"; ?>

    <section class="section member-page study-page">
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
                        <a href="<?=DIR?>/mypage/study.php" class="active"><span>교육 및 행사</span></a>
                        <a href="<?=DIR?>/mypage/program.php"><span>컨설팅 프로그램</span></a>
                        <a href="<?=DIR?>/mypage/borrow.php"><span>대관신청</span></a>
                        <!-- <a href="<?=DIR?>/mypage/table.php"><span>상차림신청</span></a> -->
                        <a href="<?=DIR?>/mypage/association.php"><span>사전확인증</span></a>
                    </div>

                    <div class="__provisionHead type3 __mb50">
                        <h3>
                            프로그램은 공문과 홈페이지를 통해 공지, <br class="__p">
                            <strong class="__orange">인터넷 접수</strong>로 신청됩니다.
                        </h3>
                        <div class="__txt15 __mt10">
                            프로그램 수강료는 현금 및 신용카드로 납부하여 주시기 바랍니다.<br>
                            프로그램 신청완료는 홈페이지에서 확인할 수 있습니다.
                        </div>
                        <div class="img"><img src="<?=DIR?>/images/study-process.gif" alt=""></div>
                    </div>

                    <table class="__tblList respond3">
                        <caption>TABLE</caption>
                        <colgroup>
                            <col style="width:85px;">
                            <col>
                            <col style="width:200px;">
                            <col style="width:150px;">
                            <col style="width:120px;">
                            <col style="width:250px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th scope="col">번호</th>
                                <th scope="col">교육 및 행사명</th>
                                <th scope="col">행사기간</th>
                                <th scope="col">신청일</th>
                                <th scope="col">상태</th>
                                <th scope="col">예약변경</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <!-- 예시 -->
                            <tr>
                                <td data-th="번호" class="__p">1</td>
                                <td data-th="교육 및 행사명" class="subject"><a href="<?=DIR?>/study/care_view.php">[방학센터] 체험프로그램 - 1회차(10:00~11:30)</a></td>
                                <td data-th="행사기간">2024-06-02</td>
                                <td data-th="신청일">2024-05-31</td>
                                <td data-th="상태"><span class="__ico1 green">신청완료</span></td>
                                <td data-th="예약변경">
                                    <a href="<?=DIR?>/study/care1_frm.php" class="__ico1 white">예약변경</a>
                                    <a href="#none" class="__ico1 orange" onclick="choiceDel()">예약취소</a>
                                </td>
                            </tr>

                            <!-- 예시 끝 -->


                            <?
                            $no = $list_num - $set_page;
                            if($_SERVER['REMOTE_ADDR']=='211.54.23.48') {
                                var_dump($set_page);
                              }
                              
                              if ($list_num){
                                  for ($i = $set_page; $i < $last; $i++){
                                      @mysql_data_seek($listResult,$i);						
                                      $row= mysql_fetch_array($listResult);
                                      $onlineCk = $row['onlineCk']=="N"?"no":"yes";
                                      
                                      $status1 = '<span class="__ico1 orange">대기</span>';
                                      if($row['status1']==1) $status1 = '<span class="__ico1 green">신청완료</span>';
                            ?>
                            <tr>
                                <td data-th="번호" class="__p"><?=$no?></td>
                                <td data-th="교육 및 행사명" class="subject"><?=$row[emTitle]?></td>
                                <td data-th="행사기간"><?=date('Y.m.d',$row[edu_sdate])?> ~ <?=date('Y.m.d',$row[edu_edate])?></td>
                                <td data-th="신청일"><?=date("Y-m-d",$row['regdate'])?></td>
                                <td data-th="상태"><?=$status1?></td>
                                <td data-th="예약변경">
                                    <!-- a href="#" class="__ico1 white">예약변경</a -->
                                    <?if($row['status1']==1){?>
                                        <?
                                            if($row['applyStatus'] == 'N')	{echo '신청자 미참석';}
                                            else if($row['attendance'] == 'Y') {?><img src="../../images/common/state_money_attend.gif" alt='출석' ><?} 
                                            else if($row['attendance'] == 'N') {?><img src="../../images/common/state_money_absent.gif" alt='결석' ><?} 
                                            else if($row['attendance'] == '') {?><img src="../../images/common/state_money_no2.gif" alt='미이수' ><?}
                                        ?>
                                        
                                        <?
                                            $log_chk = sqlRowOne("select count(*) from 060301_poll where board_id='".$_SESSION['member_id']."' and board_pidx='".$row['parent_idx']."'");
                                        ?>
                                        
                                        <?
                                            // if($log_chk == '0' && $row['license'] == 'Y' && $row['applyStatus'] != 'N' && $row['attendance'] == 'Y'){
                                            if($log_chk == '0' && $row['license'] == 'Y' && $row['applyStatus'] != 'N'){
                                        ?>											
                                        
                                        <? if ($row['edu_sdate'] && $row['edu_sdate'] <= time()){ ?>
                                          
                                        <?if ($row['edu_sdate'] - (86400 * 1) <= time()){ ?>
                                          
                                        <!-- <?if ($log_chk > 0) {?>
                                        <br><img src="../../images/common/icon_qna_230620.gif" alt='만족도조사완료'>
                                        <?} else {?>
                                          <br><img src='../../images/common/icon_qna_230417.gif' alt='만족도조사' style='cursor:pointer' onClick="agreement_poll(800,920,'<?=$row['parent_idx']?>');">
                                        <?}?> -->
                                          <br><img src='../../images/common/icon_qna_230417.gif' alt='만족도조사' style='cursor:pointer' onClick="agreement_poll(800,920,'<?=$row['parent_idx']?>');">
                                      <? }?>
                                    <?}?>
                                  <?}else if($log_chk != '0' && $row['license'] == 'Y' && $row['applyStatus'] != 'N' && $row['attendance'] == 'Y'){?>		
                                    <br><img src="../../images/common/icon_qna_230620.gif" alt='만족도조사완료' >									
                                    <br><img src="../../images/common/icon_edu.gif" alt='이수증출력' style='cursor:pointer' onClick="pop_print_license(650,920,'<?=$row['parent_idx']?>')">
                  
                                  <?}?>
                                  
                                  <?  if($row['addInwon'] > 0)
                                    {
                                      $temp_query = "select * from ddm_edu_app where add_idx = '".$row[idx]."'";
                                      $temp_list	= mysql_query($temp_query);
                                      $log_chk = sqlRowOne("select count(*) from 060301_poll where board_id='".$_SESSION['member_id']."' and board_pidx='".$row['parent_idx']."'");
                                        while($rs = mysql_fetch_array($temp_list)){
                                          //if($rs['attendance'] == 'Y'){
                                            if($log_chk == '0' ){?>
                                              <br>(<?=$rs['mbName']?>)<img src="../../images/common/icon_qna_230417.gif" alt='만족도조사' style='cursor:pointer' onClick="agreement_poll(800,920,'<?=$row['parent_idx']?>');">										

                                            <?}else {
                                  ?>
                                            <br>(<?=$rs['mbName']?>)<img src="../../images/common/icon_edu.gif" alt='이수증출력' style='cursor:pointer' onClick="pop_print_license2(650,920,'<?=$rs['idx']?>','<?=$row['parent_idx']?>')">												
                                  <?					}
                                          //}
                                        }
                                    }
                                  ?>
                                  

                                  <? if($row['edu_sdate'] - (86400*1)>time()) { ?>
                                  <br><img src="../../images/common/btn_reserve.gif" alt="취소" style='cursor:pointer' onclick="choiceDel('<?=$row[idx]?>','<?=$row[parent_idx]?>')">
                                  <? } ?>					
                                <?}else{?>
                                  <? if($row['edu_sdate'] - (86400*1)>time()) { ?>
                                  <img src="../../images/common/btn_reserve.gif" alt="취소" style='cursor:pointer' onclick="choiceDel('<?=$row[idx]?>','<?=$row[parent_idx]?>')">
                                  <? } ?>					
                                <?}?>
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
<script>
    function pop_print_license(w, h, edu_idx) { //이수증
        x = (screen.availWidth - w) / 2;
        y = (screen.availHeight - h) / 2;
        window.open(
            "/skin/educare/license.php?idx=" + edu_idx,
            "",
            "width=" + w + ",height=" + h + ",left=" + x + ",top=" + y
        );
    }
    function pop_print_license2(w, h, idx, edu_idx) { //이수증
        x = (screen.availWidth - w) / 2;
        y = (screen.availHeight - h) / 2;
        window.open(
            "/skin/educare/license2.php?idx=" + idx + "&edu_idx=" + edu_idx,
            "",
            "width=" + w + ",height=" + h + ",left=" + x + ",top=" + y
        );
    }
    function agreement_poll(w, h, edu_idx) { //설문지
        x = (screen.availWidth - w) / 2;
        y = (screen.availHeight - h) / 2;
        window.open(
            "/html/sub06/060301_poll_2021.php?idx=" + edu_idx,
            "",
            "width=" + w + ",height=" + h + ",left=" + x + ",top=" + y + ",scrollbars=1"
        );
        // fix.	window.open("/html/sub06/060301_poll.php?idx="+edu_idx,"","width="+w+"
        // ,height="+h+",left="+x+",top="+y+",scrollbars=1");
    }
</script>
<script>
    <!--
    function choiceDel(idx, parent_idx) {
        frm = document.procFrm;
        if (confirm('정말 취소하시겠습니까?')) {
            document
                .getElementsByName('idx')[0]
                .value = idx;
            frm.parent_idx.value = parent_idx;
            frm.submit();
        }
    }

    -->
</script>
</html>