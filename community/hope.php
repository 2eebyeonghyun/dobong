<?
$pno = "041001";
$view_url = "hope_view.php";
?>
<?
$_dep = array(5,9);
$_tit = array('커뮤니티','희망장난감/도서 신청');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
include $_SERVER["DOCUMENT_ROOT"]."/lib/class/board_class.php";

$BC = new BoardClass($page,$row_page['BD_LIST']);
$BC->table = $table;

$BC->search = trim($_REQUEST['search']);
$BC->keyword = trim($_REQUEST['keyword']);
$BC->page = $_REQUEST['page'];
$ArrKind = array( "장난감" , "도서");

if($ArrKind) {
	$BC->board_kind = $_REQUEST['board_kind'];
	if(count($ArrKind)>0) $BC->board_kinds = $ArrKind;
}

?>
<?
$BC->GetList();

// for paging
$TOTAL = $BC->total;
$req['pagenumber'] = $BC->page;
$page_limit   = 10;
$page_block  = 5;
?>
<script>
// 글보기
function _viewLink(frm,val,kind){
//fix.	event.cancelBubble = true;
	if( kind !="O" && kind == "N" ){alert('글 보기 권한이 없습니다.');return;}
	
	frm.board_idx.value = val;
	frm.action = "<?=$view_url?>";
	frm.submit();
}

// 비밀번호 입력
function _pwdChk(pno,idx,mode){
	url = "/skin/common/pwd_popup.php?pno="+pno+"&idx="+idx+"&mode="+mode;
	window.showModalDialog(url, window, "dialogWidth:454px; dialogHeight:160px;status:no;help:no");
}

function _pwdChk2(frm, idx){
	var pwd = prompt('비회원 게시글입니다. 본인 확인을 위하여 패스워드를 입력해주세요.', '');

	if(pwd) {		 
//fix.	event.cancelBubble = true;
		frm.board_idx.value = idx;

		 var field = document.createElement("input");
		 field.setAttribute("type", "hidden");
		 field.setAttribute("name", "pwd");
		 field.setAttribute("value", pwd);
		 frm.appendChild(field);

		 frm.action = "<?=$view_url?>";
		frm.submit();
	}
}
</script>
</head>
<body>

<form name="viewForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>" style="display:none">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="mode" value="view">
	<input type="hidden" name="board_idx">
	<input type="hidden" name="page" value="<?=$BC->page?>">
	<input type="hidden" name="board_kind" value="<?=$BC->board_kind?>">
	<input type="hidden" name="search" value="<?=$BC->search?>">
	<input type="hidden" name="keyword" value="<?=$BC->keyword?>">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit">
				<h2><img src="../images/icon/book_icon.png"><?=end($_tit)?></h2>
			</div>
			<div id="content">

				

				<!-- <div class="__greenHead2">
					<dl>
						<dt>마음톡톡은 동대문구육아종합지원센터 상담실의 또 다른 이름입니다.</dt>
						<dd>
							동대문구육아종합지원센터에서는 어린이집 운영프로그램, 자녀양육에 관한 다양한 상담을 자문위원을 통해 진행하고 있습니다. 궁금하신 사항을 작성해주시면 친철하고 전문적으로 상담해 드리겠습니다.
						</dd>
					</dl>
				</div> -->

				<form name="searchForm" method="get" action="<?=$_SERVER['PHP_SELF']?>">
				<input type="hidden" name='pno' value='<?=$pno?>'>
				<input type="hidden" name='board_kind' value='<?=$_REQUEST['board_kind']?>'>
				<input type="hidden" name='oldData' value="<?=$oldData?>">
				<div class="__topArea __mt50">
					<div class="lef">
						<div class="all">
							전체 <span class="__blue"><?=number_format($BC->total)?></span> 건
						</div>
					</div>
					<div class="rig">
						<div class="__search">
							<select name="search" id="search">
								<option value="board_subject" <?if($BC->search == "board_subject"){echo"selected";}?>>제목</option>
								<option value="board_content" <?if($BC->search == "board_content"){echo"selected";}?>>내용</option>
								<option value="board_plus" <?if($BC->search == "board_plus"){echo"selected";}?>>제목+내용</option>
							</select>
							<input type="text" name="keyword" value="<?=$BC->keyword?>" />
							<button type="submit"><i class="axi axi-search"></i></button>
						</div>
					</div>
				</div>
				</form>

				<table class="__tblList respond2">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;"/>
						<col style="width:150px;"/>
						<col />
						<col style="width:100px;"/>
						<!-- <col style="width:150px;"/> -->
						<!-- <col style="width:100px;"/> -->
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="__p">번호</th>
							<th scope="col">분류</th>
							<th scope="col">제목</th>
							<th scope="col">글쓴이</th>
							<!-- <th scope="col">등록일</th> -->
							<!-- <th scope="col">상태</th> -->
						</tr>
					</thead>
					<tbody>
							<?
								$BC->GetList();


								if (sizeof($BC->_list)) {
									foreach($BC->_list as $row){

										$attach_chk = "";
										if (strpos($row[board_subject],"icon_disk.gif")){
											$attach_chk = "<img src='/new/images/ico-file.gif' alt='FILE' />";
										};
										$lock_chk = "";
										if (strpos($row[board_subject],"icon_pass.gif")){
											$lock_chk = "<img src='/new/images/ico-lock.gif' alt='lock' />";
										};
										$new_chk = "";
										if (strpos($row[board_subject],"icon_new.gif")){
											$new_chk = "<img src='/new/images/ico-new.gif' alt='new' />";
										};

										// 글보기 권한
										$view_url= "javascript:onclick=_viewLink(document.viewForm,'".$row['board_idx']."','".$row['secretValue']."')";
										if( ($BC->table == 'ddm_board_opinion' || $BC->table == 'ddm_board_counsel' || $BC->table == 'ddm_hope') && $row['board_pwd'] && !$_SESSION[masterSession]) {
											if(empty($_SESSION[member_id])) {
												$view_url= "javascript:onclick=_pwdChk2(document.viewForm,'".$row['board_idx']."')";
											} else {
												$view_url= "javascript:onclick=alert('비회원이 작성한 글입니다. 로그아웃 후 확인할 수 있습니다.')";
											}
										}
//										$view_url .= "?pno=".$pno."&mode=view&board_idx=".$row[board_idx]."&page=".$BC->page."&board_kind=".$BC->board_kind."&search=".$BC->search."&keyword=".$BC->keyword;

										if($row['board_depth'] != "1") for($x=1;$x<$row['board_depth'];$x++) $_loop[$i]['board_subject'] .= "&nbsp;";

										$temp_status = '<span class="__ico1 green">준비중</span>';
										if($row['reCnt'] > 1) {
											$temp_status = '<span class="__ico1 white">답변완료</span>';
										}
										else
										{
											$temp_status = '<span class="__ico1 green">준비중</span>';
										}

										$abbreviation_name = substr($row[board_name],0,2)."ㅇㅇ";
							?>
						<tr>
							<td class="__p"><?=($row['board_notice']=="Y") ? $BC->icon_notice : $row[no]?></td>
							<td><!--<?=$row[board_kind]?>-->비공개</td>
							<td class="subject">
								<!--<a href="<?=$view_url?>"><?=$row['board_subject02']?></a>--> <a href="<?=$view_url?>">비공개 글입니다.<a>
								<?=$new_chk?>
								<?=$lock_chk?>
								<?=$attach_chk?>
							</td>
							<td><?=($abbreviation_name?$abbreviation_name:"&nbsp;")?></td>
							<!-- <td><?=date("Y-m-d", $row[board_regdate]);?></td> -->
							<!-- <td><?=$temp_status?></td> -->
						</tr>
							<?		
									}
								}
							?>
					</tbody>
				</table>

				<div class="__botArea">
					<div class="rig">
						<a href="./hope_write.php?pno=<?=$pno?>#wrap" class="__btn1">글쓰기</a>
					</div>
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