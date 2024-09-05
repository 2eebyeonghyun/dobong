<?
$pno = "040701";
$view_url = "notice_view.php";
?>
<?
$_dep = array(5,7);
$_tit = array('커뮤니티','느티나무 갤러리');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
include $_SERVER["DOCUMENT_ROOT"]."/lib/class/board_class.php";

/*fix. 전체 보기 가능하게 변경 2021.03.09
	if(!$_SESSION['member_id']) {
			echo "<script>alert('로그인 후 보실 수 있습니다.');location.href='../member/login.php';</script>";
			exit;
	}
*/

$BC = new BoardClass($page,$row_page['BD_LIST']);
$BC->table = $table;
$BC->search = trim($_REQUEST['search']);
$BC->keyword = trim($_REQUEST['keyword']);
$BC->page = $_REQUEST['page'];
if($ArrKind) {
	$BC->board_kind = $_REQUEST['board_kind'];
	if(count($ArrKind)>0) $BC->board_kinds = $ArrKind;
}
?>
<?
$BC->listcnt = 8;
$BC->GetList();

// for paging
$TOTAL = $BC->total;
$req['pagenumber'] = $BC->page;
$page_limit   = 8;
$page_block  = 5;
?>
</head>
<body>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="mode" value="view">
	<input type="hidden" name="board_idx">
	<input type="hidden" name="page" value="<?=$BC->page?>">
	<input type="hidden" name="board_kind" value="<?=$BC->board_kind?>">
	<input type="hidden" name="search" value="<?=$BC->search?>">
	<input type="hidden" name="keyword" value="<?=$BC->keyword?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><img src="../images/icon/tree.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<form name="searchForm" method="get" action="<?=$_SERVER['PHP_SELF']?>">
				<input type="hidden" name='pno' value='<?=$pno?>'>
				<input type="hidden" name='board_kind' value='<?=$_REQUEST['board_kind']?>'>
				<input type="hidden" name='oldData' value="<?=$oldData?>">
				<div class="__topArea">
					<div class="lef">
						<div class="all">
							전체 <span class="__blue"><?=number_format($BC->total)?></span> 건
						</div>
					</div>
					<div class="rig">
						<div class="__search">
							<select name="search" id="search">
								<option value="board_subject" <?if($BC->search == "board_subject"){echo"selected";}?>>제목</option>
								<option value="board_content" <?if($BC->search == "board_content"){echo"selected";}?>>내용</option>
								<option value="board_plus" <?if($BC->search == "board_plus"){echo"selected";}?>>제목+내용</option>
							</select>
							<input type="text" name="keyword" value="<?=$BC->keyword?>" />
							<button type="submit"><i class="axi axi-search"></i></button>
						</div>
					</div>
				</div>
				</form>

				<div class="__galList type2">
							<?
								if (sizeof($BC->_list)) {
									foreach($BC->_list as $row){

										$attach_chk = "";
										if (strpos($row[board_subject],"icon_disk.gif")){
											$attach_chk = "<img src='/new/images/ico-file.gif' alt='FILE' />";
										};

										$new_chk = "";
										if (strpos($row[board_subject],"icon_new.gif")){
											$new_chk = "<img src='/new/images/ico-new.gif' alt='new' />";
										};

										$view_url = "notice_view.php";
										$view_url .= "?pno=".$pno."&mode=view&board_idx=".$row[board_idx]."&page=".$BC->page."&board_kind=".$BC->board_kind."&search=".$BC->search."&keyword=".$BC->keyword;

										//$row[board_subject] = preg_replace("(\<(/?[^\>]+)\>)", "", $row[board_subject]); 

										$file_url = "http://".$_SERVER['HTTP_HOST']."/upload/board/";
										$viewImg = $file_url.urlencode($row[board_file1]);
										$temp_img = $file_url.$row[board_file1];
							?>
					<div class="box">
						<a href="<?=$view_url?>" class="in">
							<div class="img"><span style="background-image:url(<?=$viewImg?>);"></span></div>
							<div class="info">
								<p class="subject"><?=$row['board_subject02']?><?=$new_chk?></p>
								<p class="date"><?=date("Y-m-d", $row[board_regdate]);?></p>
							</div>
						</a>
					</div>
							<?		
									}
								}
							?>
<!--
					<div class="box">
						<a href="./dab3_view.html" class="in">
							<div class="img"><span style="background-image:url(http://placehold.it/284x210/cccccc);"></span></div>
							<div class="info">
								<p class="subject">3단변신 스마트 드라이버</p>
								<p class="date">2020-10-12</p>
							</div>
						</a>
					</div>
-->
				</div>

				<div class="__botArea">
					<div class="cen">
						<? include('../inc/page.inc.php');?>
					</div>
				</div>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>