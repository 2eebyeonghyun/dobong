<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "040501";
if(!$list_url) $list_url = "job.php";
?>
<?
$_dep = array(5,6);
$_tit = array('Ŀ�´�Ƽ','����');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	//include "../../ddmMaster/common/admin_login_check2.php";
	include $_SERVER['DOCUMENT_ROOT']."/lib/class/Recruit.class.php";

	//REQUEST
	$search=($_POST['search']?$_POST['search']:$_GET['search']);
	$keyword=($_POST['keyword']?$_POST['keyword']:$_GET['keyword']);
	$sido=($_POST['sido']?$_POST['sido']:$_GET['sido']);
	$gugun=($_POST['gugun']?$_POST['gugun']:$_GET['gugun']);
	if (!$f_recruit_type) {$f_recruit_type="1";}

	switch ($f_recruit_type) {
		case "1":
			$page_recruit_type="����";	
			break;
		case "2":
			$page_recruit_type="����";
			break;
	}

	$RecruitClass=new RecruitClass();
	$RecruitClass->page=$page;
	$RecruitClass->total_count=10;

	//���Ѽ���//
	if ($_SESSION['masterSession']) {
		$boardWriteBtn="1";
		$boardModifyBtn="1";
		$boardDeleteBtn="1";
	}
	//���Ѽ���//

	$RecruitClass->recruit_idx=($_POST[recruit_idx]?$_POST[recruit_idx]:$_GET['recruit_idx']);
	$RecruitClass->GetData();
	$row=$RecruitClass->row;
	if (!$_SESSION['masterSession'] && $row[recruit_regid]<>$_SESSION['member_id']) {
	$boardModifyBtn="0";
	$boardDeleteBtn="0";
	}
	
	$RecruitClass->GetDataPrev();
	$prev_row=$RecruitClass->row;
	$RecruitClass->GetDataNext();
	$next_row=$RecruitClass->row;

	$RecruitClass->UpdateHit();

$list_url .= "?pno=".$pno."&page=".$page."&board_kind=".$board_kind."&search=".$search."&keyword=".$keyword;
?>
</head>
<body>
<iframe name='procFrame' src="about:blank" style='display:none;' width='0' height='0'></iframe>
<?
		$go_url = getListUrl(Array("mode"=>"list"));
		$go_url = str_replace("_view","",$go_url);		
?>
<form name="deleteForm" method="post" action="../../skin/job/proc.php" target="procFrame">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="boardName" value="<?=$table?>">
	<input type="hidden" name="send" value="delete">
	<input type="hidden" name="recruit_idx" value="<?=$row[recruit_idx]?>">
	<input type="hidden" name="returnUrl" value="<?=$go_url?>">
	<input type="hidden" name="board_id" value="<?=$_SESSION['member_id']?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><img src="../images/icon/job.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">


				<div class="__greenHead2 __mb30">
					<dl>
						<dt>��������� ä����� ������ ���,</dt>
						<dd>
							��� ��ȭ��ȣ ���� �ڵ�����ȣ�� ����������ȣ���� ���� ����Ҽ� �����ϴ�.<br>
						���빮������������������ ���ؿ� ������ ��츸 ���� ����� �����Ͽ��� �ȳ������� �ݵ�� Ȯ���Ͻñ� �ٶ��ϴ�.
						</dd>
					</dl>
				</div>

				<div class="__boardView">
					<div class="top">
								<?
								$td_recruit_status_img='';
								if ($row['recruit_status']=='Y' && time() < strtotime($row['recruit_enddate'])) {
									$td_recruit_status_img='<span class="__ico1 green">ä����</span>';
								} else {
									$td_recruit_status_img='<span class="__ico1 white">ä��Ϸ�</span>';
								}
								?>
						<h3><?=$td_recruit_status_img?> <?=$row[recruit_name]?></h3>
						<p class="date">����� <?=$row[recruit_regdate]?></p>
						<div class="file">
							<p><?if($row[recruit_file1]) { echo $file_icon." <a href=\"../../include/global/download_recruit.php?file=$row[recruit_file1]\">".$row[recruit_file1]."</a>"; }else{echo"÷�������� �����ϴ�.";}?></p>
						</div>
					</div>

					<div class="__rendInfo">
						<dl>
							<dt>�ü���</dt>
							<dd><?=$row[recruit_orgname]?></dd>
						</dl>
						<dl>
							<dt>�ü�����</dt>
							<dd><?=$row[recruit_orgtype]?></dd>
						</dl>
						<dl>
							<dt>�ü���</dt>
							<dd><?=$row[recruit_orgjang]?></dd>
						</dl>
						<dl>
							<dt>�Ƶ�����</dt>
							<dd><?=$row[recruit_childnum]?>��</dd>
						</dl>
						<dl>
							<dt>��������</dt>
							<dd><?=$row[recruit_part]?></dd>
						</dl>
						<dl>
							<dt>�����ο�</dt>
							<dd><?=$row[recruit_person]?>��</dd>
						</dl>
						<dl>
							<dt>����ó</dt>
							<dd><?=$row[recruit_tel]?></dd>
						</dl>
						<dl>
							<dt>�̸���</dt>
							<dd><?=$row[recruit_email]?></dd>
						</dl>
						<dl class="wide">
							<dt>�����Ⱓ</dt>
							<dd><?=substr($row[recruit_startdate],0,10)?> ~ <?=substr($row[recruit_enddate],0,10)?></dd>
						</dl>
						<dl class="wide">
							<dt>�ּ�</dt>
							<dd>[<?=$row[recruit_zip]?>] <?=$row[recruit_addr1]?> <?=$row[recruit_addr2]?></dd>
						</dl>
					</div>

					<div class="con">
						<?=$row[recruit_content]?>
					</div>

				</div>

				<div class="__botArea">
					<div class="cen">
					<?  if( $boardModifyBtn   ) { 
						$go_url = getListUrl(Array("mode"=>"modify"));
						$go_url = str_replace("_view","_write",$go_url);
					?>
						<a href="<?=$go_url?>"><img src='../../images/btn/btn_mody.gif' alt="����" border="0" align="absmiddle"></a>
					<? } ?>
					<!-- ���� -->
					<? if( $boardDeleteBtn  ) { 
						$go_url = getListUrl(Array("mode"=>"list"));
						$go_url = str_replace("_view","",$go_url);					
					?>
						<img src='../../images/btn/btn_delete.gif' alt="����" border="0" align="absmiddle" style="cursor:pointer" onclick="if (confirm('�����Ͻðڽ��ϱ�?')) {deleteForm.submit();}">
					<? } ?>
						<a href="<?=$list_url?>" class="__btnList"><span>���</span></a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>