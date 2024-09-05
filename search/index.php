<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$pno = "090101";

$arSchCode= Array("040101","040901","040201","040601");
$arSchName=Array("공지사항","비대면지원","정보톡톡(육아정보)","소리톡톡");
?>
<?
$_dep = array(9,1);
$_tit = array('통합검색','통합검색');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	if($sword) $sch_nm = $sword;
?>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<div class="__search3">
			<form name="searchForm" method="get" action='<?=$PHP_SELF?>'>
			<input type="hidden" name="pno" value='<?=$pno?>'>
					<select name="sch_gb">
						<option value="">+ 통합검색 +</option>		
						  <?
							echo_combo_option($arSchCode, $arSchName, $sch_gb );
						  ?>
					</select>
					<input type="text" name="sch_nm" value="<?=$sch_nm?>">
					<button type="submit"><i class="axi axi-search"></i></button>
			</form>
				</div>

				<div class="__searchTxt __mb50">
					‘<span class="__orange"><?=$sch_nm?></span>’에 대한 검색 결과<!-- 총 <strong>45</strong>개-->
				</div>

				<div class="__searchList">
			<? 
				for( $i = 0 ; $i < count($arSchCode) ; $i++ ) {

					if( $sch_gb && $arSchCode[$i] != $sch_gb ) continue;

					$sch_code = $arSchCode[$i ];
					$SchName = $arSchName[$i ];

					$list_url = "../community/notice.php";
					$view_url = "../community/notice_view.php";
					if($sch_code=="040101"){
						$list_url = "../community/notice.php";
						$view_url .= "?pno=".$sch_code;
					} else if($sch_code=="040901"){
						$list_url = "../community/untact.php";
						$view_url .= "?pno=".$sch_code;
					} else if($sch_code=="040201"){
						$list_url = "../community/info.php";
						$view_url .= "?pno=".$sch_code;
					} else if($sch_code=="040601"){
						$list_url = "../community/sound.php";
						$view_url .= "?pno=".$sch_code;
					} else if($sch_code=="040501"){
						$list_url = "../community/job.php";
						$view_url .= "?pno=".$sch_code;
					}
					$list_url .= "?&search=board_plus&keyword=".urlencode($sword);

					if( $sch_code ) {
						if( !is_numeric( $sch_code ) ) exit;
					}

					## Board 정보 ##
					$query = "SELECT pno, cate1, cate2, cate3, tblName
									FROM BOARD_MANAGER WHERE pno = '$sch_code' && last_yn='Y' && use_yn='Y' ";
					$result = mysql_query( $query );

					$row_bd= mysql_fetch_array( $result );
					if( !$row_bd) exit;

					$sch_Title = " <span class='text_gray1'>$row_bd[cate1]</span> "; 
					if( ! $row_bd[cate3] ) $sch_Title  .="&gt; <span class='text_gray1'>$row_bd[cate2]</span>";
					else						 $sch_Title  .="&gt; <span class='text_gray1'>$row_bd[cate2]</span> &gt; <span class='text_gray1'>$row_bd[cate3]</span>";	

					$list_num = 0;

					## 검색 ##
					if( $sch_nm ) {
						$query = "SELECT * FROM $row_bd[tblName] 
										WHERE board_subject like '%$sch_nm%' or board_content like '%$sch_nm%' order by board_regdate desc ";
						$result = mysql_query( $query );
						$list_num	= @mysql_num_rows($result);	
						if(!$total_count){ $total_count = 5; } 	

						if ($page == ""){ $page = "1"; }				
						$url				= "$PHP_SELF?sch_code=$sch_code&sch_nm=$sch_nm";
						$total_page	= ceil($list_num/$total_count);
						$set_page 	= $total_count * ($page-1);
						$list_page 	= 10;
						$last 			= $page * $total_count;
						$option1		= $search;
						$option2		= $keyword;

						$paging		= common_paging2( $url,$list_num,$page,$list_page,$total_count);

						if ($last > $list_num){ $last = $list_num; }
					}
			?>
					<div class="area">
						<div class="head">
							<strong><?=$SchName?></strong> 에서 검색한 결과 [총 <?=number_format($list_num)?>건] 
						</div>	
						<div class="con">
<?
			$last = 5;
			if ($list_num){
				for ($j = 0; $j < $last; $j++){
					$ea = $ea + 1;
					@mysql_data_seek($result,$j);
					$row= mysql_fetch_array($result);

					if(!$row) continue;

					$subj = $row[board_subject];
					$board_content = strip_tags($row[board_content]);
					$board_content = trim_text( $board_content, 250 );

					$view_url .= "&mode=view&board_idx=".$row[board_idx];
?>
							<div class="box">
								<div class="subject">
									<a href="<?=$view_url?>"><?=$subj?></a>
									<span class="date"><?=date("Y-m-d", $row[board_regdate])?></span>
								</div>
								<div class="sum">
									<?=$board_content?>
								</div>
							</div>
<?
				} 
			} else{
?>
							<div class="box">
								<div class="subject">
									<a href="#">검색 결과가 없습니다.</a>
								</div>
							</div>
<?
			}
?>
						</div>
						<div class="more">
							<a href="<?=$list_url?>"><span>더보기</span> <i class="axi axi-plus-circle"></i></a>
						</div>
					</div>
<?
	} 
?>

				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>