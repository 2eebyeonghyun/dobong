<?
$pno = "03010307";
$view_url = "hwi3_view.php";

	// fix.
	if(isset($_SERVER["HTTPS"]))
	{
		  header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
		  exit;
	}

?>
<?
$_dep = array(3,1,6);
$_tit = array('양육지원','장난감대여사업','휘경점 장난감검색');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	include $_SERVER["DOCUMENT_ROOT"]."/skin/myrent/reserve_check.php";
	
	if(substr($pno,0,6)=="030101") $s_cd = "01"; // 답십리
	if(substr($pno,0,6)=="030102") $s_cd = "02"; // 제기점
	if(substr($pno,0,6)=="030103") $s_cd = "03"; // 휘경점

	$whereAnd = " && B.itemtype='T'";
	if($bcode) $whereAnd .= " && B.bcode='$bcode'";
	if($useage) $whereAnd .= " && B.useage='$useage'";
	if($keyword) $whereAnd .= " && B.itemname like '%$keyword%'";
	IF($s_cd) $whereAnd .= " && B.s_cd='$s_cd'";

	if($rentstat != 'All'){
		if($rentstat == ''){
			$rentstat = "LD01";
			$whereAnd .= "&& A.status='$rentstat'";
		} else{
			if($rentstat) $whereAnd .= "&& A.status='$rentstat'";
		}
	}

	if ($page == ""){ $page = "1"; }
	$start_page = ($page-1)*12;
	$query = "select count(*) from ona_item_barcode where itemtype='T' and status in ('LD01','LD02','LD03','LD04','LD06','LD95') and s_cd = '".$s_cd."'";
	$TOY_TOTALCOUNT = sqlRowOne($query);
	$query_total	= "SELECT 
						A.barcode, A.itemcode, B.useage, B.itemimage, B.itemname, (select count(*) from ona_orderitem where barcode=A.barcode and delete_yn='N') as rentcnt, A.status
					FROM ona_item_barcode A left join ona_item B on A.itemcode=B.itemcode
					WHERE A.status in ('LD01','LD02','LD03','LD04','LD06','LD95') $whereAnd ORDER BY B.itemname";	
	
	$query	= "SELECT 
						A.barcode, A.itemcode, B.useage, B.itemimage, B.itemname, (select count(*) from ona_orderitem where barcode=A.barcode and delete_yn='N') as rentcnt, A.status
					FROM ona_item_barcode A left join ona_item B on A.itemcode=B.itemcode
					WHERE A.status in ('LD01','LD02','LD03','LD04','LD06','LD95') $whereAnd ORDER BY B.itemname limit ".$start_page.",12";	
//	echo $query;
	if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
		echo $query;
	}
	$result_total	= mysql_query($query_total);
	$nums	= @mysql_num_rows($result_total);

	$result	= mysql_query($query);

	if(!$total_count){ $total_count = "12"; }

	if ($page == ""){ $page = "1"; }
	$url				= $_SERVER['SCRIPT_NAME']."?pno=$pno&bcode=$bcode&useage=$useage&keyword=$keyword&rentstat=$rentstat";
	
	$total_page	= ceil($nums/$total_count);
	$set_page 	= $total_count * ($page-1);
	$list_page 	= 10;
	$last 			= $page * $total_count;

	$paging		= common_paging2($url,$nums,$page,$list_page,$total_count);
	if ($last > $nums){ $last = $nums; }


// for paging
$TOTAL = $nums;
$req['pagenumber'] = $page;
$page_limit   = 12;
$page_block  = 5;
?>
<script>
	function tsearch()
	{
		document.searchform.submit();
	}
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/toy.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">

			<? include_once '../inc/tab3.php'; ?>

									
									<form method="get" action="<?=$_SERVER['SCRIPT_NAME'] ?>" name='viewForm'>
										<input type="hidden" name='pno' value='<?=$pno?>'>
										<input type="hidden" name="page" value="<?=$page?>">
										<?
											$temp_op = '';
											if($s_cd == '01')
											{
												$temp_op = '답십리전체';
											}
											else if($s_cd == '02')
											{
												$temp_op = '제기전체';
                                            }
                                            else if($s_cd == '03')
											{
												$temp_op = '휘경전체';
											}
										?>
				<div class="__search2">
					<ul>
						<li class="sel">
							<select name="bcode" class="__inp">
								<option value=""><?=$temp_op?></option>
													<?
														$scQuery	= "SELECT bcode, bname FROM ona_bcode WHERE itemtype='T' ORDER BY bcode";
														$scResult	= mysql_query($scQuery);
														while($scRow = mysql_fetch_array($scResult)){
													?>
													<option value="<?=$scRow[bcode]?>" <?if($bcode==$scRow[bcode]) echo"selected";?>><?=$scRow[bname]?></option>
													<? } ?>
							</select>
						</li>
						<li class="sel">
							<select name="useage" class="__inp">
								<option value="">연령전체</option>
													<?
														$scQuery	= "SELECT idx, name FROM ona_useage WHERE itemtype like '%T%' ORDER BY agesort, idx";
														$scResult	= mysql_query($scQuery);
														while($scRow = mysql_fetch_array($scResult)){
													?>
													<option value="<?=$scRow[idx]?>" <?if($useage==$scRow[idx]) echo"selected";?>><?=$scRow[name]?></option>
													<? } ?>
							</select>
						</li>
						<li class="sel02" style="vertical-align: middle;">
								<label><input type='radio' name='rentstat' value='All' <?if($rentstat=='All'){?>checked<?}?> onclick='tsearch();'> 전체</label>
								<label><input type='radio' name='rentstat' value='LD02' <?if($rentstat=='LD02'){?>checked<?}?> onclick='tsearch();'> 대여중</label>
								<label><input type='radio' name='rentstat' value='LD01' <?if($rentstat=='LD01'){?>checked<?}?> onclick='tsearch();'> 대여가능</label>
								<label><input type='radio' name='rentstat' value='LD06' <?if($rentstat=='LD06'){?>checked<?}?> onclick='tsearch();'> 예약중</label>
								
						
						</li>
						<li class="inp">
							<input type="text" class="__inp" placeholder="장난감명을 입력해주세요" name="keyword" value="<?=$keyword?>">
						</li>
						<li class="btn"><button type="submit" class="__btn2">검색</button></li>
					</ul>
				</div>

				<div class="__topArea">
					<div class="lef">
						<div class="all">
							총 보유수량 <span class="__blue"><?=number_format($TOY_TOTALCOUNT)?></span> 개 / 검색결과 <span class="__orange"><?=number_format($nums)?></span> 개
						</div>
					</div>
					<div class="rig"><!--
						<div class="lab">
								<input type='radio' name='rentstat' value='' <?if($rentstat==''){?>checked<?}?> onclick='tsearch();'> 전체
								<input type='radio' name='rentstat' value='LD02' <?if($rentstat=='LD02'){?>checked<?}?> onclick='tsearch();'> 대여중
								<input type='radio' name='rentstat' value='LD01' <?if($rentstat=='LD01'){?>checked<?}?> onclick='tsearch();'> 대여가능
								<input type='radio' name='rentstat' value='LD06' <?if($rentstat=='LD06'){?>checked<?}?> onclick='tsearch();'> 예약중
						</div>-->
					</div>
				</div>

								</form>


				<div class="__galList">
					<?
					if ($nums){
						for ($i = $set_page; $i < $last; $i++){
						@mysqli_data_seek($result,$i);
						$row= mysql_fetch_array($result);

						// 이미지					
						if($row[itemimage]){
							$photoFile = $INFO[rentUrl].$row[itemimage];
//fix.							$photoFile = str_replace("http://","https://",$photoFile);
							$fileConfirm="Y";
							//if(!is_file($photoFile)) $fileConfirm="N";
						}	
						if($fileConfirm!="Y") $photoFile = "../../images/sub03/no_img.gif";					
						$ingImage = "";
						if($row['status']=="LD01" ) $ingImage = '<span class="__ico1 orange">대여가능</span>';
						if($row['status']=="LD02" ) $ingImage = '<span class="__ico1 green">대여중</span>';
						if($row['status']=="LD03" ) $ingImage = '<span class="__ico1 blue">세척중</span>';
						if($row['status']=="LD04" ) $ingImage = '<span class="__ico1" style="background:grey">A/S 중</span>';
						if($row['status']=="LD06" ) $ingImage = '<span class="__ico1" style="background:brown">예약중</span>';
						if($row['status']=="LD95" ) $ingImage = '<span class="__ico1 green">구성품미반납</span>';

						$useage = "";
						if($row[useage]==1){
							$useage = "1개월 이상";
						} elseif($row[useage]==23){
							$useage = "3개월 이상";
						} elseif($row[useage]==2){
							$useage = "6개월 이상";
						} elseif($row[useage]==3){
							$useage = "9개월 이상";
						} elseif($row[useage]==24){
							$useage = "10개월 이상";
						} elseif($row[useage]==4){
							$useage = "12개월 이상";
						} elseif($row[useage]==5){
							$useage = "18개월 이상";
						} elseif($row[useage]==6){
							$useage = "24개월 이상";
						} elseif($row[useage]==7){
							$useage = "36개월 이상";
						} elseif($row[useage]==25){
							$useage = "37개월 이상";
						} elseif($row[useage]==8){
							$useage = "4세 이상";
						} elseif($row[useage]==9){
							$useage = "6세 이상";
						} elseif($row[useage]==20){
							$useage = "5세 이상";
						} 
					?>
					<div class="box">
						<a href="<?=$view_url?>?pno=<?=$pno?>&mode=view&itemcode=<?=$row[itemcode]?>" class="in">
							<div class="img"><span style="background-image:url(<?=$photoFile?>);"></span></div>
							<div class="info">
								<p class="subject"><?=$row[itemname]?></p>
								<p class="count"><font color='darkblue'>연령:</font> <?=$useage?>&nbsp;&nbsp;&nbsp;<font color='darkblue'>대여횟수:</font> <?=number_format($row[rentcnt])?>회</p>
								<p class="ico">
									<?=$ingImage?>
								</p>
							</div>
						</a>
					</div>
					<?
							}
						}
					?>

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

	<script>
		document.reday(function(){
			one(function(){
				alert('1');
			})
		})
	</script>
</div>
</body>
</html>