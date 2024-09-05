<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "03010108";
if(!$list_url) $list_url = "dap4.php";
?>
<?
$_dep = array(3,1);
$_tit = array('양육지원','도서대여사업');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	
	$c_cd = 'DM';

	$query	= "SELECT 
						A.itemcode, A.itemname, A.writer, A.maker, A.buyprice, A.content, A.booktr1, A.booktr2, A.bookcall,
						ifnull(B.CNT,0) As CNT, ifnull(C.YN,0) As YN, D.bname, E.name As useage
					FROM ona_item As A
						LEFT OUTER JOIN ( SELECT itemcode, count(*) As CNT FROM ona_orderitem WHERE c_cd='".$c_cd."' GROUP BY itemcode ) B ON B.itemcode=A.itemcode
						LEFT OUTER JOIN ( SELECT itemcode, count(*) As YN FROM ona_item_barcode WHERE c_cd='".$c_cd."' && status='LD01' GROUP BY itemcode ) C ON C.itemcode=A.itemcode
						LEFT OUTER JOIN ( SELECT bcode, bname FROM ona_bcode WHERE c_cd='".$c_cd."' GROUP BY bcode ) As D ON D.bcode=A.bcode
						LEFT OUTER JOIN ona_useage As E ON E.idx=A.useage
					WHERE A.itemcode='".$itemcode."'";
	//echo $query;
	$result	= mysql_query($query);
	$row	 	= @mysql_fetch_array($result);
	$row['indate'] = sqlRowOne("select indate from ona_item_barcode where itemcode = '$itemcode' order by regdate asc limit 1");
	$row['stockarea'] = sqlRowOne("select stockarea from ona_item_barcode where itemcode = '$itemcode' order by regdate asc limit 1");

	$ingImage = ($row['YN']>0 )?"yes":"ing";

	$ingImage = "";
	if($row['YN']>0 ) $ingImage = '<span class="__ico1 orange">대여가능</span>';
	if($row['YN']<1 ) $ingImage = '<span class="__ico1 green">대여중</span>';
?>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/raise/dab4.php" class="active"><span>답십리점</span></a>
					<a href="<?=DIR?>/raise/jae4.php"><span>제기점</span></a>
					<a href="<?=DIR?>/raise/info3.html"><span>이용안내</span></a>
				</div>
				<div class="__tit2">
					<h3>부모와 아이들에게 <strong>유익한 책</strong>을 찾아주세요!</h3>
				</div>

				<div class="__rendInfo">
					<dl class="wide">
						<dt>도서명</dt>
						<dd><?=$row[itemname]?></dd>
					</dl>
					<dl>
						<dt>저자명</dt>
						<dd><?=$row[writer]?></dd>
					</dl>
					<dl>
						<dt>출판사</dt>
						<dd><?=$row[maker]?></dd>
					</dl>
					<dl>
						<dt>구입날짜</dt>
						<dd><?=$row[indate]?></dd>
					</dl>
					<dl>
						<dt>구입가격</dt>
						<dd><?=number_format($row[buyprice])?>원</dd>
					</dl>
					<dl>
						<dt>등록번호</dt>
						<dd><?=$row[itemcode]?></dd>
					</dl>
					<dl>
						<dt>청구기호</dt>
						<dd><?=$row[stockarea]?></dd>
					</dl>
					<dl>
						<dt>연령</dt>
						<dd><?=$row[useage]?></dd>
					</dl>
					<dl>
						<dt>대여상태</dt>
						<dd>
							<?=$ingImage?>
						</dd>
					</dl>
				</div>
				<div class="bot">
					<?=nl2br($row[content])?>
				</div>

				<div class="__botArea">
					<div class="cen">
						<a href="javascript:history.back();" class="__btnList"><span>목록</span></a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>