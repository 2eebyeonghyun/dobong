<?
$pno = "02030302";
$view_url = "appraisal3_view.php";
?>
<?
$_dep = array(2,1,3);
$_tit = array('보육지원','평가제','관련자료실');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
include $_SERVER["DOCUMENT_ROOT"]."/lib/class/board_class.php";
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
$BC->GetList();

// for paging
$TOTAL = $BC->total;
$req['pagenumber'] = $BC->page;
$page_limit   = 10;
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
			<div id="tit_tab">
				<h2><img src="../images/icon/appraisal.gif">평가제</h2>
			</div>
			<div id="content">
				
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>평가제 안내</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>평가제 운영체계</span></a>
					<a href="<?=DIR?>/care/appraisal3.php" class="active"><span>관련자료실</span></a>
					<a href="<?=DIR?>/care/appraisal4.php"><span>컨설팅 사업</span></a>
				</div>

				<div class="__tab">
					<a href="appraisal3.php" class="active"><span>평가 메뉴얼 안내서</span></a>
				</div>

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

				<table class="__tblList respond2">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;"/>
						<col />
						<col style="width:85px;"/>
						<col style="width:150px;"/>
						<col style="width:70px;"/>
					</colgroup>
					<thead>
						<tr>
							<th scope="col">번호</th>
							<th scope="col">제목</th>
							<th scope="col">첨부</th>
							<th scope="col">등록일</th>
							<th scope="col">조회</th>
						</tr>
					</thead>
					<tbody>
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

										$view_url = "appraisal3_view.php";
										$view_url .= "?pno=".$pno."&mode=view&board_idx=".$row[board_idx]."&page=".$BC->page."&board_kind=".$BC->board_kind."&search=".$BC->search."&keyword=".$BC->keyword;

										//$row[board_subject] = preg_replace("(\<(/?[^\>]+)\>)", "", $row[board_subject]); 
							?>
						<tr <? if($row['board_notice']=="Y"){ ?>class="notice"<? } ?>>
							<td><?=($row['board_notice']=="Y") ? "<span class='__icoNotice'>공지</span>" : $row[no]?></td>
							<td class="subject"><a href="<?=$view_url?>"><?=$row['board_subject02']?></a><?=$new_chk?></td>
							<td><?=$attach_chk?></td>
							<td><?=date("Y-m-d", $row[board_regdate]);?></td>
							<td><?=number_format($row[board_hit])?></td>
						</tr>
							<?		
									}
								}
							?>
					</tbody>
				</table>

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