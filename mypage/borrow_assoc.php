<?
$pno = "060305";
$view_url = "borrow_view.php";
?>
<?
$_dep = array(7,3,4);
$_tit = array('����������','�¶��ν�û����','�������ƹ��û');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	// ����
	if($_POST[send]=="delete" && $_POST[idx]){
		mysql_query("delete from ddm_usecenter_app3 where idx = '".$_POST[idx]."'");
		echo "<script language='javascript'>
					 location.href('/html/sub/index.php?pno=".$pno."&page=".$page."&state=".$state."');
				  </script>";
	}

	$listQuery		= "SELECT * FROM ddm_usecenter_app3 WHERE userid='".$_SESSION['member_id']."' and scd ='01' ORDER BY idx DESC";
	$listResult		= mysql_query($listQuery);
	$list_num		= @mysql_num_rows($listResult);	

	if(!$total_count){ $total_count = 10; }

	if ($page == ""){ $page = "1"; }				
	$url				= $PHP_SELF."?pno=$pno";
	$total_page	= ceil($list_num/$total_count);
	$set_page 	= $total_count * ($page-1);
	$list_page 	= 10;
	$last 			= $page * $total_count;

	$paging		= common_paging2($url,$list_num,$page,$list_page,$total_count);
	if ($last > $list_num){ $last = $list_num; }


// for paging
$TOTAL = $list_num;
$req['pagenumber'] = $page;
$page_limit   = 10;
$page_block  = 5;
?>

<script language="JavaScript">
<!--
	function del(v1){
		if(confirm('���� ����Ͻðڽ��ϱ�?')){
			f = document.frm;
			f.idx.value = v1;
			f.submit();
		}
	}
	function view_print(v){
		window.open('../../html/sub06/print.php?idx='+v,'com','width=830,height=750,menubar=no,location=no,resizable=no,status=no,scrollbars=no');
	}
//-->
</script>
</head>
<body>

<form name="frm" method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="idx">
	<input type="hidden" name="send" value="delete">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="state" value="<?=$state?>">
</form>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="mode" value="view">
	<input type="hidden" name="orderno">
	<input type="hidden" name="page" value="<?=$page?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2>����������</h2>
			</div>
			<div id="content">

				<div class="__tab3">
					<a href="<?=DIR?>/mypage/modify.php"><span>ȸ������ ����</span></a>
					<a href="<?=DIR?>/mypage/toy.php"><span>�뿩����Ʈ</span></a>
					<a href="<?=DIR?>/mypage/study.php" class="active"><span>�¶��ν�û����</span></a>
					<a href="<?=DIR?>/mypage/leave.php"><span>ȸ��Ż��</span></a>
				</div>

				<div class="__tab">
					<a href="study.php"><span>���� �� ���</span></a>
					<a href="program.php"><span>������ ���α׷�</span></a>
					<a href="borrow.php"><span>�����û</span></a>
					<a href="borrow_assoc.php" class="active"><span>�������ƹ��û</span></a>
					<a href="association.php"><span>���ڶ��������ƹ��û</span></a>
				</div>

				<div class="__tab2">
					<a href="./borrow_assoc.php" class="active"><span>��ʸ� �����û</span></a>
					<a href="./borrow2_assoc.php"><span>������ �����û</span></a>
				</div>

				<table class="__tblList respond3 __mb50">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;">
						<col>
						<col style="width:150px;">
						<col style="width:120px;">
						<col style="width:200px;">
						<col style="width:120px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col">��ȣ</th>
							<th scope="col">��û�Ͻ�</th>
							<th scope="col">��û�ð�</th>
							<th scope="col">��û�ο�</th>
							<th scope="col">�����</th>
							<th scope="col">�������</th>
						</tr>
					</thead>
					<tbody>
							<?	
							$no = $list_num - $set_page;
							if ($list_num){
								for ($i = $set_page; $i < $last; $i++){
									@mysql_data_seek($listResult,$i);						
									$row= mysql_fetch_array($listResult);
									//$stateIMG = $row['state']=="�Ϸ�"?"icon_end":"icon_ing";
							?>
						<tr>
							<td data-th="��ȣ" class="__p"><?=$no?></td>
							<td data-th="��û�Ͻ�"><!--fix. A href="/html/sub/?pno=020207&mode=write&type=mod&idx=<?=$row[idx]?>"--><?=$row[wdate]?><!--/a--></td>
							<td data-th="��û�ð�">
								<?
									if($row['time']=="1") { echo "����"; } else if($row['time']=='2') { echo "����"; } echo "&nbsp".$row[usetime];
								?>
							</td>
							<td data-th="��û�ο�"><?=$row[usercnt]?></td>
							<td data-th="�����"><?=$row[regdate]?></td>
							<td data-th="�������"><img src="../../images/common/icon_dae_end.gif" onclick="view_print('<?=$row[idx]?>')" style="cursor:pointer">
								                         
								<?
									$temp_today = date("Y-m-d");
                                    $temp_sdate = date("Y-m-d",strtotime ("-7 day $row[wdate]"));

									if($temp_sdate >= $temp_today)
									{
								?>
								         <img src="../../images/common/icon_cancel.gif" onclick="del('<?=$row[idx]?>')" style="cursor:pointer">
						        <?
									}
								?>
								</td>
						</tr>
							<?						
								$no = $no-1; 
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