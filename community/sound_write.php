<?
$pno = $_REQUEST['pno'];
if(!is_numeric($pno)){
	echo "<script>history.back();</script>";
	exit;
}
if(!$list_url) $list_url = "sound.php";
?>
<?
$_dep = array(5,5);
$_tit = array('Ŀ�´�Ƽ','�Ҹ�����');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?require_once $_SERVER["DOCUMENT_ROOT"]."/include/cheditor/cheditor.php";?>
<?
include $_SERVER[DOCUMENT_ROOT]."/lib/class/board_class.php";


$CHEDITOR1 = new cheditorCLASS("board_content","100%","300px","thisForm");
$CHEDITOR1->SET("imgMaxWidth",567);
$BC = new BoardClass();
$BC->table = $table;
$BC->mode = $mode;
$BC->board_idx = $board_idx;
$row = $BC->GetData();
if($mode=="write" && $board_idx) $mode = "reply";
if($mode=="write"){ 
	$returnUrl = getListUrl(Array("mode"=>"list"),Array("board_idx","page","search","keyword"));
	$returnUrl = str_replace("_write.",".",$returnUrl);
}
if($mode=="reply") $returnUrl = getListUrl(Array("mode"=>"view"));
if($mode=="modify"){
	$returnUrl = getListUrl(Array("mode"=>"view"));
	// fix.
	$returnUrl = str_replace("_write","_view",$returnUrl);
}
if($mode=="amodify") $returnUrl = "/html/sub/admin_index.php?pno=040601&mode=view&board_idx=".$row[board_group];

$tmp_sub = 'return input_check(this);';
if($pno=='040601')
{
	$tmp_sub = 'return input_check2(this);';
}
if(!$_SESSION['member_id']) $tmp_sub = 'return input_check3(this);';
?>
<script>
// �۾���
function input_check(frm){
	if(!frm.board_subject.value){alert("������ �Է��Ͻʽÿ�!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("���񿡴� �ֵ���ǥ(\")�� �����Ǽ� �����ϴ�. Ȧ����ǥ(')�� �̿��Ͻðų� �ٸ� ��ȣ�� �̿��� �ּ���.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("������ �Է��Ͻʽÿ�!!");return false;}
	return;
}

function input_check2(frm){
	if(!frm.board_subject.value){alert("������ �Է��Ͻʽÿ�!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("���񿡴� �ֵ���ǥ(\")�� �����Ǽ� �����ϴ�. Ȧ����ǥ(')�� �̿��Ͻðų� �ٸ� ��ȣ�� �̿��� �ּ���.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("������ �Է��Ͻʽÿ�!!");return false;}
	if(!frm.hp2.value){alert("����ó�� �Է��Ͻʽÿ�!!");frm.hp2.focus();return false;}
	if(!frm.hp3.value){alert("����ó�� �Է��Ͻʽÿ�!!");frm.hp3.focus();return false;}
	return;
}

function input_check3(frm){
	if(!frm.board_name.value){alert("�̸��� �Է��Ͻʽÿ�!!");frm.board_name.focus();return false;}
	if(!frm.board_subject.value){alert("������ �Է��Ͻʽÿ�!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("���񿡴� �ֵ���ǥ(\")�� �����Ǽ� �����ϴ�. Ȧ����ǥ(')�� �̿��Ͻðų� �ٸ� ��ȣ�� �̿��� �ּ���.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("������ �Է��Ͻʽÿ�!!");return false;}
	if(!frm.hp2.value){alert("����ó�� �Է��Ͻʽÿ�!!");frm.hp2.focus();return false;}
	if(!frm.hp3.value){alert("����ó�� �Է��Ͻʽÿ�!!");frm.hp3.focus();return false;}
	if(!frm.board_pwd.value){alert("��й�ȣ�� �Է��Ͻʽÿ�!!");frm.board_pwd.focus();return false;}
	return;
}
</script>
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

				<div class="__greenHead2">
					<dl>
						<dt>�Ҹ������� ���빮������������������ �̿��� �Ҹ����� �� �ٸ� �̸��Դϴ�.</dt>
						<dd>
							���빮�����������������͸� �̿��ϸ鼭 �����ϰ� ���� �ǰ��̳� Ī���ϰ� ���� ���� �����Ű���?<br>�Ҹ������� ���� ���빮�����������������Ϳ����� �׻� �����а� �����Ͽ�, �� ���� ���񽺸� �����ص帳�ϴ�.
						</dd>
					</dl>
				</div>


				<div class="__caution type3 __mt20">
					<h3>����, �弳, ������� ������� ���� �����ڰ� �뺸���� �����մϴ�.</h3>
				</div>

<form name="thisForm" method="post" action="/skin/common/board_common_proc.php" enctype="multipart/form-data" onsubmit="<?=$tmp_sub?>" target="procFrame">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="boardName" value="<?=$table?>">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<input type="hidden" name="board_idx" value="<?=$board_idx?>">
	<input type="hidden" name="board_group" value="<?=$board_group?>">
	<input type="hidden" name="returnUrl" value="<?=$returnUrl?>">
	<input type="hidden" name="board_id" value="<?=$_SESSION['member_id']?>">
	<input type="hidden" name="boardSecu" value="<?=$boardSecu?>">
	<input type="hidden" name="boardFileNum" value="<?=$boardFileNum?>">
	<? if(!$_SESSION['member_id']) { ?>
		<input type="hidden" name="board_secret" value="Y">
	<? } ?>
	<? if( $row_page[BD_WRITE] != "9" && $_SESSION['member_id']){ ?>
		<input type="hidden" name="board_name" value="<?=$_SESSION['member_name']?>">
	<? } ?>

				<table class="__tblView respond __mt15">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:140px;">
						<col>
					</colgroup>
					<tbody>
<? if($_SESSION['member_id']) { ?>
						<tr>
							<th scope="row">��������</th>
							<td>
						<?if($pno=='040601' && ($row[board_idx] > 225 || $row[board_idx] == '')) {?>
								<label><input type="radio" name="board_secret" value="N" <? if( $row[board_secret] == "N" ){ echo"checked";} ?>> ����</label>
						<?}?>
								<label><input type="radio" name="board_secret" value="Y" <? if( !$row[board_secret] || $row[board_secret] == "Y" || $board_secret == "Y" ){ echo"checked";} ?>> �����</label>
							</td>
						</tr>
<? } ?>
				<?
				if($ArrKind){ // /include/global/inc_sub01.php ����
				?>
						<tr>
							<th scope="row">�з�</th>
							<td>
								<select name="board_kind" id="board_kind" class="__inp __m-w50p">
							<? 
								foreach($ArrKind As $k){
									$sel = ($k==$row[board_kind] || $k==$board_kind) ? "selected" : "";
							?>
									<option value="<?=$k?>"><?=$k?></option>
							<? } ?>		
								</select>
							</td>
						</tr>
					<? } ?>


				<? if(!$_SESSION['member_id']) { ?>
						<tr>
							<th scope="row">�̸�</td>
							<td><input name="board_name" type="text" value="<?=$row[board_name]?>" class="__inp" style="ime-mode:active;"></td>
						</tr>
				<? } ?>

						<tr>
							<th scope="row">����</th>
							<td><input name="board_subject" type="text" value="<?=$row[board_subject]?>" class="__inp"></td>
						</tr>
						<tr>
							<th scope="row">����</th>
							<td>
						<?
							// �亯�� ������
							if($mode=="reply"){
								$query	= "SELECT board_subject, board_content FROM $table WHERE board_idx='".$board_idx."'";
								$rs		= sqlRow($query);
						?>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>���� : <b><?=$rs[board_subject]?></b></td>
								</tr>
								<tr>
									<td height=""></td>
								</tr>
								<tr>
									<td><?=$rs[board_content]?></td>
								</tr>
							</table>
						<?
							}
						?>
								<?$CHEDITOR1->SHOW($row[board_content])?>
							</td>
						</tr>
						<?  if($pno=='040601' || ($pno=='040301' && !$_SESSION['member_id'])){
							$exHp		= explode("-", $row[board_phone]);	
						?>
						<tr>
							<th scope="row">����ó</td>
							<td>

								<ul class="__form __m-w100p" style="width:423px;">
									<li>
										<select name="hp1" id="" class="__inp">
											<option value="02" <?if($exHp[0] == "02"){ echo"selected"; }?>>02</option>
											<option value="010" <?if($exHp[0] == "010"){ echo"selected"; }?>>010</option>
											<option value="011" <?if($exHp[0] == "011"){ echo"selected"; }?>>011</option>
											<option value="016" <?if($exHp[0] == "016"){ echo"selected"; }?>>016</option>
											<option value="017" <?if($exHp[0] == "017"){ echo"selected"; }?>>017</option>
											<option value="018" <?if($exHp[0] == "018"){ echo"selected"; }?>>018</option>
											<option value="019" <?if($exHp[0] == "019"){ echo"selected"; }?>>019</option>
										</select>
									</li>
									<li class="dash">-</li>
									<li><input type="text" class="__inp"name="hp2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[1]?>"></li>
									<li class="dash">-</li>
									<li><input type="text" class="__inp"name="hp3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[2]?>"></li>
								</ul>

							</td>
						</tr>
						<? } ?>
						<? if($boardFileNum > 0){ ?>
						<tr>
							<th scope="row">÷������</th>
							<td>
						<?
							for ( $i = 1 ; $i <= $boardFileNum; $i++ ) {
								if( $i > 1 ) echo "<br>";
						?>
								<? if($row[board_file.$i]){ ?><input type="checkbox" name="fileDel<?=$i?>" value="Y"> <b><?=$row[board_file.$i]?></b> ���� ������ üũ�ϼ���<br><?}?>
								<? echo $BC->icon_file; ?>
								<input type="file" name="file<?=$i?>">
						<?
							}
						?>	
				<?
					if(empty($_SESSION[member_id]) && empty($row[board_id])){
				?>
						<tr>
							<th scope="row">��й�ȣ</td>
							<td><input name="board_pwd" type="password" class="__inp"></td>
						</tr>
				<?
					}
				?>
							</td>
						</tr>
						<? } ?>
					</tbody>
				</table>


				<div class="__botArea">
					<div class="cen">
						<a href="javascript:location.href='<?=$returnUrl?>';" class="__btn1 gray">���</a> &nbsp;
						<button type="submit" class="__btn1">Ȯ��</button>
					</div>
				</div>
</form>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>