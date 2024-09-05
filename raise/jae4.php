<?
$pno = "03010208";
$view_url = "jae4_view.php";
?>
<?
$_dep = array(3,2,2);
$_tit = array('양육지원','도서대여사업','제기점');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	if(substr($pno,0,6)=="030101") $s_cd = "01"; // 답십리
	if(substr($pno,0,6)=="030102") $s_cd = "02"; // 제기점

	$c_cd = 'DM';

	$whereAnd = " && A.itemtype='B'";
	if($bcode) $whereAnd .= " && A.bcode='$bcode'";
	if($useage) $whereAnd .= " && A.useage='$useage'";
	if($search && $keyword){
		if($search=="all"){
			$whereAnd .= " && ( A.itemname like '%$keyword%' || ( REPLACE(A.itemname,' ','') like '%$keyword%' ) || A.maker like '%$keyword%' || ( REPLACE(A.maker,' ','') like '%$keyword%' ) || A.writer like '%$keyword%' || ( REPLACE(A.writer,' ','') like '%$keyword%' ) )";
		}else{
			$attribute = "A.".$search;
			$whereAnd .= " && (( $attribute like '%$keyword%' ) || ( REPLACE($attribute,' ','') like '%$keyword%' ))";
		}
	}

	if ($page == ""){ $page = "1"; }
	$start_page = ($page-1)*12;
	$query = "select count(*) from ona_item A left join ona_bcode B on A.bcode = B.bcode where A.c_cd='".$c_cd."' && A.s_cd='".$s_cd."' && A.itemtype='B' && B.bname!='부모' && B.bname!='교사'";
	$TOY_TOTALCOUNT = mysql_fetch_array(mysql_query($query));
	$TOY_TOTALCOUNT = $TOY_TOTALCOUNT[0];

	$query_total	= "SELECT 
						A.itemcode, A.itemname, A.maker, A.writer
						, (select count(*) from ona_orderitem where delete_yn='N' and itemcode=A.itemcode) CNT
						, (select count(*) from ona_item_barcode where status='LD01' and itemcode=A.itemcode) As YN
						, D.bname
					FROM ona_item A
						LEFT OUTER JOIN ( SELECT bcode, bname FROM ona_bcode WHERE c_cd='".$c_cd."' GROUP BY bcode ) As D ON D.bcode=A.bcode
					WHERE A.c_cd='".$c_cd."' && A.s_cd='".$s_cd."' && A.stock > 0 $whereAnd 
					/*HAVING YN > 0*/
					ORDER BY A.itemname";	

	$query	= "SELECT 
						A.itemcode, A.itemname, A.maker, A.writer
						, (select count(*) from ona_orderitem where delete_yn='N' and itemcode=A.itemcode) CNT
						, (select count(*) from ona_item_barcode where status='LD01' and itemcode=A.itemcode) As YN
						, D.bname
					FROM ona_item A
						LEFT OUTER JOIN ( SELECT bcode, bname FROM ona_bcode WHERE c_cd='".$c_cd."' GROUP BY bcode ) As D ON D.bcode=A.bcode
					WHERE A.c_cd='".$c_cd."' && A.s_cd='".$s_cd."' && A.stock > 0 $whereAnd 
					/*HAVING YN > 0*/
					ORDER BY A.itemname limit ".$start_page.",12";	


if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
    //echo $query;
}
	
	$result_total	= mysql_query($query_total);
	$nums	= @mysql_num_rows($result_total);

	$result	= mysql_query($query);

	if(!$total_count){ $total_count = "12"; }

	if ($page == ""){ $page = "1"; }
	$url				= $_SERVER['SCRIPT_NAME']."?pno=$pno&bcode=$bcode&useage=$useage&search=$search&keyword=$keyword";
	$total_page	= ceil($nums/$total_count);
	$set_page 	= $total_count * ($page-1);
	$list_page 	= 10;
	$last 			= $page * $total_count;

	$paging		= common_paging2($url,$nums,$page,$list_page,$total_count,$search,$keyword);
	if ($last > $nums){ $last = $nums; }


// for paging
$TOTAL = $nums;
$req['pagenumber'] = $page;
$page_limit   = 12;
$page_block  = 5;
?>
<script language="javascript">
<!--
	// 부모, 교사 선택시 연령검색 안보임
	function bcodeChange(v1){
		if( v1 == "BC" || v1 == "BD" ){
			document.searchFrm.useage.value = "";
			document.getElementById("IdAge").style.display = "none";
		}else{
			document.getElementById("IdAge").style.display = "";
		}
	}
//-->
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><img src="../images/icon/book.gif"><?=($_tit[2])?></h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/raise/dab4.php"><span>답십리점</span></a>
					<a href="<?=DIR?>/raise/jae4.php" class="active"><span>제기점</span></a>
					<a href="<?=DIR?>/raise/info3.html"><span>이용안내</span></a>
				</div>


									<form method="post" action="<?=$_SERVER['SCRIPT_NAME'] ?>" name='viewForm'>
										<input type="hidden" name='pno' value='<?=$pno?>'>
										<input type="hidden" name="page" value="<?=$page?>">

				<div class="__search2">
					<ul>
						<li class="sel">
							<select name="bcode" class="__inp" onChange="bcodeChange(this.value)">
													<option value="">분류전체</option>
													<?
														$scQuery	= "SELECT bcode, bname FROM ona_bcode WHERE itemtype='B' ORDER BY bcode";
														$scResult	= mysql_query($scQuery);
														while($scRow = mysql_fetch_array($scResult)){
													?>
													<option value="<?=$scRow[bcode]?>" <?if($bcode==$scRow[bcode]) echo"selected";?>><?=$scRow[bname]?></option>
													<? } ?>
							</select>
						</li>
						<li class="sel">
							<select id="IdAge" name="useage" class="__inp">
													<option value="">연령전체</option>
													<?
														$scQuery	= "SELECT idx, name FROM ona_useage WHERE itemtype like '%B%' ORDER BY agesort, idx";
														$scResult	= mysql_query($scQuery);
														while($scRow = mysql_fetch_array($scResult)){
													?>
													<option value="<?=$scRow[idx]?>" <?if($useage==$scRow[idx]) echo"selected";?>><?=$scRow[name]?></option>
													<? } ?>
							</select>
						</li>
						<li class="sel">
							<select name="search" class="__inp">
													<option value="all">전체</option>
													<option value="itemname" <?if($search=="itemname") echo"selected";?>>도서명</option>
													<option value="maker" <?if($search=="maker") echo"selected";?>>출판사</option>
													<option value="writer" <?if($search=="writer") echo"selected";?>>저자명</option>
							</select>
						</li>
						<li class="inp">
							<input type="text" class="__inp" placeholder="도서명을 입력해주세요" name="keyword" value="<?=$keyword?>">
						</li>
						<li class="btn"><button type="submit" class="__btn2">검색</button></li>
					</ul>
				</div>

								</form>

				<div class="__topArea">
					<div class="lef">
						<div class="all" style="padding:10px 10px 10px 10px;">
							총 보유수량 <span class="__blue"><?=number_format($TOY_TOTALCOUNT)?></span> 개 / 검색결과 <span class="__orange"><?=number_format($nums)?></span> 개
						</div>
					</div>
				</div>

				<table class="__tblList respond3">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;">
						<col>
						<col style="width:180px;">
						<col style="width:180px;">
						<col style="width:150px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">분류</th>
							<th scope="col">도서명</th>
							<th scope="col">출판사</th>
							<th scope="col">저자명</th>
							<th scope="col">대여상태</th>
						</tr>
					</thead>
					<tbody>
							<?									
							if ($nums){
								for ($i = $set_page; $i < $last; $i++){
								//@mysql_data_seek($result,$i);
								mysqli_data_seek($result,$i);
								$row= mysql_fetch_array($result);

								$ingImage = ($row['YN']>0 )?"yes":"ing";

						$ingImage = "";
						if($row['YN']>0 ) $ingImage = '<span class="__ico1 orange">대여가능</span>';
						if($row['YN']<1 ) $ingImage = '<span class="__ico1 green">대여중</span>';
							?>		
						<tr>
							<td data-th="분류"><?=$row[bname]?$row[bname]:"&nbsp;"?></td>
							<td data-th="도서명" class="subject"><a href="<?=$view_url?>?pno=<?=$pno?>&mode=view&itemcode=<?=$row[itemcode]?>"><?=$row[itemname]?></a></td>
							<td data-th="출판사"><?=$row[maker]?></td>
							<td data-th="저자명"><span class="ovh"><?=$row[writer]?> </span></td>
							<td data-th="대여상태"><?=$ingImage?></td>
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