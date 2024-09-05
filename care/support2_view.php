<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "020103";
if(!$list_url) $list_url = "support2.php";
?>
<?
$_dep = array(2,6,2);
$_tit = array('보육지원','보육행정 및 어린이집 지원','관계법령');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
$query = "UPDATE $table SET board_hit=board_hit+1 WHERE board_idx='".$board_idx."'";
mysql_query($query);

include $_SERVER[DOCUMENT_ROOT]."/lib/class/board_class.php";
$BC = new BoardClass();	
$BC->table = $table;
$BC->board_idx = $board_idx;
$row = $BC->getData();
$returnUrl = getListUrl(Array("mode"=>"list"),Array("board_idx"));

$list_url .= "?pno=".$pno."&page=".$page."&board_kind=".$board_kind."&search=".$search."&keyword=".$keyword;
?>
<script>
	function jsDownload(v1){
		var window_left = screen.width;
		var window_top = screen.height;
 
		var w = 200;
		var h	 = 100;
 
		var t = (screen.height/2) - (h/2)-100;
		var l = (screen.width/2) - (w/2);
 
		open_popup("../../include/global/download_board.php?file="+v1,'DL', 'DL', l,t,w,h );
}
</script>
<script language="javascript" src="/include/js/popup.js" type="text/javascript"></script>
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

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2>보육행정 및 어린이집 지원</h2>
			</div>
			<div id="content">

			<div class="__tab3">
					<a href="<?=DIR?>/care/support.php"><span>보육사업 안내</span></a>
					<a href="<?=DIR?>/care/support2.php" class="active"><span>관계법령</span></a>
				</div>

				<div class="__boardView">
					<div class="top">
						<h3><?=$row[board_subject]?></h3>
						<p class="date">등록일 <?=date("Y-m-d", $row[board_regdate])?></p>
						<div class="file">
<? if($row[board_file1]||$row[board_file2]||$row[board_file3]||$row[board_file4]||$row[board_file5]){ ?>
								<? 
									for($n=1;$n<=5;$n++){ 
										if($row["board_file".$n]) { 					
											//echo $file_icon." <a href='#' onclick=\"jsDownload_abs('".$uploadPath.str_replace(" ","_",$row["board_file".$n])."');return false;\">".$BC->icon_file." ".str_replace(" ","_",$row["board_file".$n])."</a> ";
											echo $file_icon." <a href='#' onclick=\"jsDownload('".$row["board_file".$n]."');return false;\">".$BC->icon_file." ".str_replace(" ","_",$row["board_file".$n])."</a> ";
										} 
									}
								?>
<? } else{ ?>
							첨부파일이 없습니다.
<? } ?>
						</div>
					</div>
					<div class="con">
<? if($pno=="040701"){ ?>
									<?
										for( $n=1; $n<=5; $n++ ){
											if($row[board_file.$n]){
												$file_url = '../../upload/board/';

												$viewFile	= htmlspecialchars($row[board_file.$n], NULL, 'ISO-8859-1');
												$img_size	= @GetImageSize("$file_url$viewFile");
												$fileWidth	= $img_size[0]; 
												$fileHeight	= $img_size[1];
												

												if ( $fileWidth > 640 ) $fileWidth = 640;
												$tmpImg = "<img src='".$file_url.urlencode($row[board_file.$n])."' width='".$fileWidth."' align='absmiddle'>";
												if($tmpImg) echo "<center>".$tmpImg."</center><br><br>";
											}
										}
									?>
<? } ?>
						<?=$row[board_content];?>
					</div>
				</div>
				<div class="__botArea">

					<?=$BC->GetMigration_new("N")?>
					<?=$BC->GetMigration_new("R")?>

					<div class="cen">
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