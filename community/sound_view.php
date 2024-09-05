<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "040601";
if(!$list_url) $list_url = "sound.php";
?>
<?
$_dep = array(5,5);
$_tit = array('커뮤니티','소리톡톡');
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
$row2 = $BC->GetADate();
$returnUrl = getListUrl(Array("mode"=>"list"),Array("board_idx"));
// fix.
$returnUrl = str_replace("_view.",".",$returnUrl);

$list_url .= "?pno=".$pno."&page=".$page."&board_kind=".$board_kind."&search=".$search."&keyword=".$keyword;


$temp_status = '<span class="__ico1 green">준비중</span>';
if($row['reCnt'] > 1) {
	$temp_status = '<span class="__ico1 white">답변완료</span>';
}
else
{
	$temp_status = '<span class="__ico1 green">준비중</span>';
}

// fix.
$uploadPath = "";
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

function jsDownload_abs(v1){
	if(!document.downloadFrame){
		document.body.insertAdjacentHTML("beforeEnd","<iframe name='downloadFrame' src='about:blank' style='display:none'></iframe><form name='downloadForm' method='post' target='downloadFrame' action='/include/global/download_board.php'><input type='hidden' name='file'></form>");
	}
	document.downloadForm.file.value = v1;
	document.downloadForm.submit();
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
			<div id="tit">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<div class="__greenHead2">
					<dl>
						<dt>소리톡톡은 동대문구육아종합지원센터 이용자 소리함의 또 다른 이름입니다.</dt>
						<dd>
							동대문구육아종합지원센터를 이용하면서 제안하고 싶은 의견이나 칭찬하고 싶은 점은 없으신가요?<br>소리톡톡을 통해 동대문구육아종합지원센터에서는 항상 여러분과 소통하여, 더 나은 서비스를 제공해드립니다.
						</dd>
					</dl>
				</div>


				<div class="__boardView __mt50">
					<div class="top">
						<h3><?=$temp_status?> <?=$row[board_subject]?></h3>
						<ul class="sumt">
							<li>
								<strong>글쓴이</strong>
								<span>
												<?=substr($row[board_name],0,2)."ㅇㅇ"?>
												<? if( $table == "ddm_board_opinion" && $_SESSION[masterSession]){?>
													(<?=$row[board_name]?>)
												<? } ?>
								</span>
							</li>
									<? if( ($table == "ddm_board_opinion" || $table == "ddm_board_counsel") && $_SESSION[masterSession]){?>
							<li>
								<strong>연락처</strong>
								<span><?=$row[board_phone]?></span>
							</li>
									<? } ?>
							<li>
								<strong>등록일</strong>
								<span><?=date("Y-m-d", $row[board_regdate])?></span>
							</li>
						</ul>
						<div class="file">
											<? if($row[board_file1]||$row[board_file2]||$row[board_file3]||$row[board_file4]||$row[board_file5]){ 
												for($n=1;$n<=5;$n++){ 
													if($row["board_file".$n]) { 					
														echo $file_icon." <a href=\"javascript:;\" onclick=\"jsDownload_abs('".str_replace(" ","_",$uploadPath.$row["board_file".$n])."');return false;\">".$BC->icon_file." ".str_replace(" ","_",$row["board_file".$n])."</a> ";
													} 
												}
											  } 
											  else
											  {
												  echo "첨부파일이 없습니다.";
											  }
											?>
						</div>
					</div>
					<div class="con">
						<dl class="faq q">
							<dt>
								<em>질문내용</em>
							</dt>
							<dd>
												<?					
													for( $n=1; $n<=5; $n++ ){
														$tmpImg = $BC->GetPhoto($row['board_file'.$n],"board_file".$n,$board_idx,"","","530","",true);
														if($tmpImg) echo "<center>".$tmpImg."</center><br><br>";
													}
													echo $row[board_content];
												?>
							</dd>
						</dl>

<?if($row2){?>
						<dl class="faq a">
							<dt>
								<em>답변내용</em>
								<strong><?=$row2[board_subject]?></strong>
								<span>등록일  <?=date("Y.m.d", $row2[board_regdate])?></span>
							</dt>
							<dd>
								<?=$row2[board_content]?>
							</dd>
						</dl>
<?}?>
					</div>
				</div>

				<div class="__botArea">
					<?//=$BC->GetMigration_new("N")?>
					<?//=$BC->GetMigration_new("R")?>
					<div class="cen">
			<?

			$modify_url = getListUrl(Array("mode"=>"modify"));
			$modify_url = str_replace("_view.","_write.",$modify_url);
			
			if( ($pwd == $row['board_pwd']&&$row['board_pwd']!='') || ($boardModifyBtn && ( $row[board_id] == $_SESSION[member_id] || $_SESSION[masterSession] ))){?>&nbsp;<!-- 수정 --><a href="<?=$modify_url?>"><img src='../../images/btn/btn_mody.gif' alt="수정" border="0" align="absmiddle"></a><?}?>
			<?if( ($pwd == $row['board_pwd']&&$row['board_pwd']!='') || ($boardDeleteBtn && ( $row[board_id] == $_SESSION[member_id] || $_SESSION[masterSession] ))){?>&nbsp;<!-- 삭제 --><img src='../../images/btn/btn_delete.gif' alt="삭제" border="0" align="absmiddle" style="cursor:pointer" style="cursor:pointer;" onclick="if(confirm('삭제하시겠습니까?')) deleteForm.submit()"><?}?>
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