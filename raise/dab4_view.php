<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "03010108";
if(!$list_url) $list_url = "dap4.php";
?>
<?
$_dep = array(3,1);
$_tit = array('��������','�����뿩���');
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
	if($row['YN']>0 ) $ingImage = '<span class="__ico1 orange">�뿩����</span>';
	if($row['YN']<1 ) $ingImage = '<span class="__ico1 green">�뿩��</span>';
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
					<a href="<?=DIR?>/raise/dab4.php" class="active"><span>��ʸ���</span></a>
					<a href="<?=DIR?>/raise/jae4.php"><span>������</span></a>
					<a href="<?=DIR?>/raise/info3.html"><span>�̿�ȳ�</span></a>
				</div>
				<div class="__tit2">
					<h3>�θ�� ���̵鿡�� <strong>������ å</strong>�� ã���ּ���!</h3>
				</div>

				<div class="__rendInfo">
					<dl class="wide">
						<dt>������</dt>
						<dd><?=$row[itemname]?></dd>
					</dl>
					<dl>
						<dt>���ڸ�</dt>
						<dd><?=$row[writer]?></dd>
					</dl>
					<dl>
						<dt>���ǻ�</dt>
						<dd><?=$row[maker]?></dd>
					</dl>
					<dl>
						<dt>���Գ�¥</dt>
						<dd><?=$row[indate]?></dd>
					</dl>
					<dl>
						<dt>���԰���</dt>
						<dd><?=number_format($row[buyprice])?>��</dd>
					</dl>
					<dl>
						<dt>��Ϲ�ȣ</dt>
						<dd><?=$row[itemcode]?></dd>
					</dl>
					<dl>
						<dt>û����ȣ</dt>
						<dd><?=$row[stockarea]?></dd>
					</dl>
					<dl>
						<dt>����</dt>
						<dd><?=$row[useage]?></dd>
					</dl>
					<dl>
						<dt>�뿩����</dt>
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
						<a href="javascript:history.back();" class="__btnList"><span>���</span></a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>