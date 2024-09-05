<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "040501";
if(!$list_url) $list_url = "job.php";
?>
<?
$_dep = array(5,6);
$_tit = array('커뮤니티','구인');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	//include "../../ddmMaster/common/admin_login_check2.php";
	include $_SERVER['DOCUMENT_ROOT']."/lib/class/Recruit.class.php";

	//REQUEST
	$search=($_POST['search']?$_POST['search']:$_GET['search']);
	$keyword=($_POST['keyword']?$_POST['keyword']:$_GET['keyword']);
	$sido=($_POST['sido']?$_POST['sido']:$_GET['sido']);
	$gugun=($_POST['gugun']?$_POST['gugun']:$_GET['gugun']);
	if (!$f_recruit_type) {$f_recruit_type="1";}

	switch ($f_recruit_type) {
		case "1":
			$page_recruit_type="구인";	
			break;
		case "2":
			$page_recruit_type="구직";
			break;
	}

	$RecruitClass=new RecruitClass();
	$RecruitClass->page=$page;
	$RecruitClass->total_count=10;

	//권한설정//
	if ($_SESSION['masterSession']) {
		$boardWriteBtn="1";
		$boardModifyBtn="1";
		$boardDeleteBtn="1";
	}
	//권한설정//

	$RecruitClass->recruit_idx=($_POST[recruit_idx]?$_POST[recruit_idx]:$_GET['recruit_idx']);
	$RecruitClass->GetData();
	$row=$RecruitClass->row;
	if (!$_SESSION['masterSession'] && $row[recruit_regid]<>$_SESSION['member_id']) {
	$boardModifyBtn="0";
	$boardDeleteBtn="0";
	}
	
	$RecruitClass->GetDataPrev();
	$prev_row=$RecruitClass->row;
	$RecruitClass->GetDataNext();
	$next_row=$RecruitClass->row;

	$RecruitClass->UpdateHit();

$list_url .= "?pno=".$pno."&page=".$page."&board_kind=".$board_kind."&search=".$search."&keyword=".$keyword;
?>
</head>
<body>
<iframe name='procFrame' src="about:blank" style='display:none;' width='0' height='0'></iframe>
<?
		$go_url = getListUrl(Array("mode"=>"list"));
		$go_url = str_replace("_view","",$go_url);		
?>
<form name="deleteForm" method="post" action="../../skin/job/proc.php" target="procFrame">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="boardName" value="<?=$table?>">
	<input type="hidden" name="send" value="delete">
	<input type="hidden" name="recruit_idx" value="<?=$row[recruit_idx]?>">
	<input type="hidden" name="returnUrl" value="<?=$go_url?>">
	<input type="hidden" name="board_id" value="<?=$_SESSION['member_id']?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><img src="../images/icon/job.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">


				<div class="__greenHead2 __mb30">
					<dl>
						<dt>어린이집에서 채용공고를 등재할 경우,</dt>
						<dd>
							기관 전화번호 외의 핸드폰번호는 개인정보보호법에 따라 기록할수 없습니다.<br>
						동대문구육아종합지원센터 기준에 적합한 경우만 구인 등록이 가능하오니 안내사항을 반드시 확인하시기 바랍니다.
						</dd>
					</dl>
				</div>

				<div class="__boardView">
					<div class="top">
								<?
								$td_recruit_status_img='';
								if ($row['recruit_status']=='Y' && time() < strtotime($row['recruit_enddate'])) {
									$td_recruit_status_img='<span class="__ico1 green">채용중</span>';
								} else {
									$td_recruit_status_img='<span class="__ico1 white">채용완료</span>';
								}
								?>
						<h3><?=$td_recruit_status_img?> <?=$row[recruit_name]?></h3>
						<p class="date">등록일 <?=$row[recruit_regdate]?></p>
						<div class="file">
							<p><?if($row[recruit_file1]) { echo $file_icon." <a href=\"../../include/global/download_recruit.php?file=$row[recruit_file1]\">".$row[recruit_file1]."</a>"; }else{echo"첨부파일이 없습니다.";}?></p>
						</div>
					</div>

					<div class="__rendInfo">
						<dl>
							<dt>시설명</dt>
							<dd><?=$row[recruit_orgname]?></dd>
						</dl>
						<dl>
							<dt>시설유형</dt>
							<dd><?=$row[recruit_orgtype]?></dd>
						</dl>
						<dl>
							<dt>시설장</dt>
							<dd><?=$row[recruit_orgjang]?></dd>
						</dl>
						<dl>
							<dt>아동정원</dt>
							<dd><?=$row[recruit_childnum]?>명</dd>
						</dl>
						<dl>
							<dt>모집직종</dt>
							<dd><?=$row[recruit_part]?></dd>
						</dl>
						<dl>
							<dt>모집인원</dt>
							<dd><?=$row[recruit_person]?>명</dd>
						</dl>
						<dl>
							<dt>연락처</dt>
							<dd><?=$row[recruit_tel]?></dd>
						</dl>
						<dl>
							<dt>이메일</dt>
							<dd><?=$row[recruit_email]?></dd>
						</dl>
						<dl class="wide">
							<dt>모집기간</dt>
							<dd><?=substr($row[recruit_startdate],0,10)?> ~ <?=substr($row[recruit_enddate],0,10)?></dd>
						</dl>
						<dl class="wide">
							<dt>주소</dt>
							<dd>[<?=$row[recruit_zip]?>] <?=$row[recruit_addr1]?> <?=$row[recruit_addr2]?></dd>
						</dl>
					</div>

					<div class="con">
						<?=$row[recruit_content]?>
					</div>

				</div>

				<div class="__botArea">
					<div class="cen">
					<?  if( $boardModifyBtn   ) { 
						$go_url = getListUrl(Array("mode"=>"modify"));
						$go_url = str_replace("_view","_write",$go_url);
					?>
						<a href="<?=$go_url?>"><img src='../../images/btn/btn_mody.gif' alt="수정" border="0" align="absmiddle"></a>
					<? } ?>
					<!-- 삭제 -->
					<? if( $boardDeleteBtn  ) { 
						$go_url = getListUrl(Array("mode"=>"list"));
						$go_url = str_replace("_view","",$go_url);					
					?>
						<img src='../../images/btn/btn_delete.gif' alt="삭제" border="0" align="absmiddle" style="cursor:pointer" onclick="if (confirm('삭제하시겠습니까?')) {deleteForm.submit();}">
					<? } ?>
						<a href="<?=$list_url?>" class="__btnList"><span>목록</span></a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>