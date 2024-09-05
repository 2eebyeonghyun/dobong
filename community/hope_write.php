
<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

$pno = $_REQUEST['pno'];


if(!is_numeric($pno)){
	echo "<script>history.back();</script>";
	exit;
}
if(!$list_url) $list_url = "hope.php";
?>

<?
$_dep = array(5,9);
$_tit = array('커뮤니티','희망장난감/도서 신청');
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
$mode = "write";
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
if($mode=="amodify") $returnUrl = "/html/sub/admin_index.php?pno=041001&mode=view&board_idx=".$row[board_group];

$tmp_sub = 'return input_check(this);';
if($pno=='041001')
{
	$tmp_sub = 'return input_check2(this);';
}
if(!$_SESSION['member_id']) $tmp_sub = 'return input_check3(this);';
?>
<script>
// 글쓰기
function input_check(frm){
	if(!frm.board_subject.value){alert("제목을 입력하십시오!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("제목에는 쌍따옴표(\")를 넣으실수 없습니다. 홀따옴표(')를 이용하시거나 다른 기호를 이용해 주세요.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("내용을 입력하십시오!!");return false;}
	return;
}

function input_check2(frm){
	if(!frm.board_subject.value){alert("제목을 입력하십시오!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("제목에는 쌍따옴표(\")를 넣으실수 없습니다. 홀따옴표(')를 이용하시거나 다른 기호를 이용해 주세요.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("내용을 입력하십시오!!");return false;}
	if(!frm.hp2.value){alert("연락처를 입력하십시오!!");frm.hp2.focus();return false;}
	if(!frm.hp3.value){alert("연락처를 입력하십시오!!");frm.hp3.focus();return false;}
	return;
}

function input_check3(frm){
	if(!frm.board_name.value){alert("이름을 입력하십시오!!");frm.board_name.focus();return false;}
	if(!frm.board_subject.value){alert("제목을 입력하십시오!!");frm.board_subject.focus();return false;}
	if(frm.board_subject.value.indexOf("\"")>-1){alert("제목에는 쌍따옴표(\")를 넣으실수 없습니다. 홀따옴표(')를 이용하시거나 다른 기호를 이용해 주세요.");frm.board_subject.focus();return false;}
	content = cheditor_board_content.outputBodyHTML();
	if (!content || content == "&nbsp;"){alert("내용을 입력하십시오!!");return false;}
	if(!frm.hp2.value){alert("연락처를 입력하십시오!!");frm.hp2.focus();return false;}
	if(!frm.hp3.value){alert("연락처를 입력하십시오!!");frm.hp3.focus();return false;}
	if(!frm.board_pwd.value){alert("비밀번호를 입력하십시오!!");frm.board_pwd.focus();return false;}
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
					<dl id="toy_description" style="<?=$row['board_kind'] !='도서' ? "display:block" : "display:none"?>">
						<dt>희망 장난감 신청</dt>
						<dd>
                            본 게시판은 구입을 희망하는 장난감 목록을 신청하는 공간입니다.<br>
                            희망하시는 장난감명, 제조사 등을 기록하시면 추후 장난감 구입 시 고려하여 반영하도록 하겠습니다.<br><br>
                            다만, 레고 등 구성물이 많은 장난감, 파손 발생률이 높은 변신 장난감, 안전 및 연령에 적합하지 않은 장난감은 신청 제한됩니다.<br><br>
                            <b>또한, 기존에 센터 내 보유하고 있는 장난감의 경우 구입이 제한되며, 센터 예산 상황에 따라 변동될 수 있습니다.<br><br>
                                영유아의 전인적 발달을 고려하여 연령에 적합한 놀잇감 및 교구를 구비하므로, 신청한 장난감이 모두 반영되지 않을 수 있습니다.<br><br>
                            <span style="color:red;">신청 장난감은 분기별 구입이 이루어질 예정이며<br>
                                신청한 장난감의 반영 여부는 구입 후 공지사항에 안내하겠습니다.</span></b>
						</dd>
					</dl><br><br>
					<dl id="book_description" style="<?=$row['board_kind'] =='도서' ? "display:block" : "display:none"?>">
						<dt>희망 도서 신청</dt>
						<dd>
                            본 게시판은 구입을 희망하는 도서 목록을 신청하는 공간입니다.<br>
                            희망하시는 도서명, 저자, 출판사 등을 기록하시면 추후 도서 구입 시 고려하여 반영하도록 하겠습니다.<br><br>
                            
                            다만, 문제집, 수험서, 참고서, 로맨스 판타지, 무협지, 엽기소설, 만화책, 신앙간증, 목회, 설교 등의 종교서 및 정치 관련 교양 도서, 전자책, 신문 및 잡지, 전집 등의 도서는 신청 제한됩니다.<br><br>
                            
                            <b>또한, 기존에 센터 내 보유하고 있는 도서의 경우 구입이 제한되며, 센터 예산 상황에 따라 변동될 수 있어 신청한 도서가 모두 반영되지 않을 수 있습니다.<br><br>
                            
                                <span style="color:red;">신청 도서는 매월 구입이 이루어질 예정이며<br>
                                    신청한 도서의 반영 여부는 구입 후 공지사항에 안내하겠습니다.</span></b>
						</dd>
					</dl>
					
				</div>


				<div class="__caution type3 __mt20">
					<h3>비방글, 욕설, 상업적인 내용등의 글은 관리자가 통보없이 삭제합니다.</h3>
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
							<th scope="row">공개설정</th>
							<td>
						<?if($pno=='' && ($row[board_idx] > 225 || $row[board_idx] == '')) {?>
								<label><input type="radio" name="board_secret" value="N" <? if( $row[board_secret] == "N" ){ echo"checked";} ?>> 공개</label>
						<?}?>
								<label><input type="radio" name="board_secret" value="Y" <? if( !$row[board_secret] || $row[board_secret] == "Y" || $board_secret == "Y" ){ echo"checked";} ?>> 비공개</label>
							</td>
						</tr>
<? } ?>
						<tr>
							<th scope="row">분류</th>
							<td>
								<select name="board_kind" id="board_kind" class="__inp __m-w50p">

								</select>
							</td>
						</tr>

                        <tr>
                            <th scope="row">지점</th>
                            <td>
                                <select name="board_area" id="board_area" class="__inp __m-w50p">
                                </select>
                            </td>
                        </tr>



				<? if(!$_SESSION['member_id']) { ?>
						<tr>
							<th scope="row">이름</td>
							<td><input name="board_name" type="text" value="<?=$row[board_name]?>" class="__inp" style="ime-mode:active;"></td>
						</tr>
				<? } ?>

						<tr>
							<th scope="row">제목</th>
							<td><input name="board_subject" type="text" value="<?=$row[board_subject]?>" class="__inp"></td>
						</tr>
						<tr>
							<th scope="row">내용</th>
							<td>
						<?
							// 답변시 질문글
							if($mode=="reply"){
								$query	= "SELECT board_subject, board_content FROM $table WHERE board_idx='".$board_idx."'";
								$rs		= sqlRow($query);
						?>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td>제목 : <b><?=$rs[board_subject]?></b></td>
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
						<!-- <?  if($pno=='041001' || $pno=='040601' || ($pno=='040301' && !$_SESSION['member_id'])){
							$exHp		= explode("-", $row[board_phone]);	
						?>
						<tr>
							<th scope="row">연락처</td>
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
									<li><input type="text" class="__inp"name="hp2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[1]?>"></li>
									<li class="dash">-</li>
									<li><input type="text" class="__inp"name="hp3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exHp[2]?>"></li>
								</ul>

							</td>
						</tr> -->
						<? } ?>
						<? if($boardFileNum > 0){ ?>
						<tr>
							<th scope="row">첨부파일</th>
							<td>
						<?
							for ( $i = 1 ; $i <= $boardFileNum; $i++ ) {
								if( $i > 1 ) echo "<br>";
						?>
								<? if($row[board_file.$i]){ ?><input type="checkbox" name="fileDel<?=$i?>" value="Y"> <b><?=$row[board_file.$i]?></b> 파일 삭제시 체크하세요<br><?}?>
								<? echo $BC->icon_file; ?>
								<input type="file" name="file<?=$i?>">
						<?
							}
						?>	
				<?
					if(empty($_SESSION[member_id]) && empty($row[board_id])){
				?>
						<tr>
							<th scope="row">비밀번호</td>
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
						<a href="javascript:location.href='<?=$returnUrl?>';" class="__btn1 gray">취소</a> &nbsp;
						<button type="submit" class="__btn1">확인</button>
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

<script>

    $(document).ready(function(){

        var board_kind = "<?=$row['board_kind']?>";
        var board_area = "<?=$row['board_area']?>";


        function setAreaOptions(board_kind) {

            if(board_kind === "장난감") {
                $("#board_area").html("<option value='답십리점'>답십리점</option><option value='제기점'>제기점</option><option value='휘경점'>휘경점</option>");
                $("#book_description").hide();
                $("#toy_description").show();
            } else if(board_kind === "도서") {
                $("#board_area").html("<option value='답십리점'>답십리점</option><option value='제기점'>제기점</option>");
                $("#book_description").show();
                $("#toy_description").hide();
            }

        }


        var boardKindOptions = ["장난감", "도서"];
        var $boardKind = $("#board_kind");
        $.each(boardKindOptions, function(index, value) {
            $boardKind.append("<option value='" + value + "'>" + value + "</option>");
        });


        $(document).on('change', '#board_kind', function() {
            var board_kind = $(this).children("option:selected").val();
            setAreaOptions(board_kind);
        });


        $boardKind.val(board_kind).change();
        if( board_area != "" ){
            $("#board_area").val(board_area).change();
        }

    });
</script>

