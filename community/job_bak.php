<?
$pno = "040501";
$view_url = "job_view.php";
?>
<?
$_dep = array(5,6);
$_tit = array('커뮤니티','구인공고');
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
			$page_recruit_type="구인";	
			break;
		case "2":
			$page_recruit_type="구직";
			break;
	}

	$RecruitClass=new RecruitClass();
	$RecruitClass->page=$page;
	$RecruitClass->total_count=10;

	//권한설정//
	if ($_SESSION['masterSession']) {
		$boardWriteBtn="1";
		$boardModifyBtn="1";
		$boardDeleteBtn="1";
	}
	//권한설정//


	$RecruitClass->limit="2";
	$RecruitClass->where_arr=array($search=>$keyword);
	$RecruitClass->keyword=$keyword;
	$RecruitClass->f_recruit_type=$f_recruit_type;
	$RecruitClass->f_recruit_orgtype=$f_recruit_orgtype;
	$RecruitClass->f_recruit_part=$f_recruit_part;
	$RecruitClass->GetList();
	$_list=$RecruitClass->_list;
	//리스트가져오기//

	//페이징생성//
	$nums=$RecruitClass->nums;
	$page=$RecruitClass->page;
	$list_page=$RecruitClass->list_page;
	$total_count=$RecruitClass->total_count;

	$url = $PHP_SELF."?pno=$pno&search=$search&keyword=$keyword&f_recruit_part=$f_recruit_part&f_recruit_orgtype=$f_recruit_orgtype";
	$paging		= common_paging2($url,$nums,$page,$list_page,$total_count,$search,$keyword);
	$now_http_url=$_SERVER['PHP_SELF']."?pno=".$_GET['pno'];

// for paging
$TOTAL = $nums;
$req['pagenumber'] = $page;
$page_limit   = 10;
$page_block  = 5;
?>
</head>
<body>

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
						<dt>어린이집에서 채용공고를 등재할 경우,</dt>
						<dd>
							기관 전화번호 외의 핸드폰번호는 개인정보보호법에 따라 기록할수 없습니다.<br>
						동대문구육아종합지원센터 기준에 적합한 경우만 구인 등록이 가능하오니 안내사항을 반드시 확인하시기 바랍니다.
						</dd>
					</dl>
				</div>


				<div class="__tab2">
					<a href="./job.php" class="active"><span>어린이집 구인</span></a>
					<a href="./job2.php"><span>기관 구인</span></a>
				</div>

			<form method="get" action="<?=$_SERVER['PHP_SELF']?>">
				<input type="hidden" name="pno" value="040501">	

				<div class="__topArea">
					<div class="lef">
						<div class="selbox">
							<select name="f_recruit_part" onChange="this.form.submit();">
								<option value="">-희망직종-</option>
								<option value="보육교사" <?=$f_recruit_part=="보육교사"?"selected":""?>>보육교사</option>
								<option value="시설장" <?=$f_recruit_part=="시설장"?"selected":""?>>시설장</option>
								<option value="간호사" <?=$f_recruit_part=="간호사"?"selected":""?>>간호사</option>
								<option value="영양사" <?=$f_recruit_part=="영양사"?"selected":""?>>영양사</option>
								<option value="취사원" <?=$f_recruit_part=="취사원"?"selected":""?>>취사원</option>
								<option value="사무원" <?=$f_recruit_part=="사무원"?"selected":""?>>사무원</option>
								<option value="관리인" <?=$f_recruit_part=="관리인"?"selected":""?>>관리인</option>
								<option value="특기교사" <?=$f_recruit_part=="특기교사"?"selected":""?>>특기교사</option>
								<option value="대체교사" <?=$f_recruit_part=="대체교사"?"selected":""?>>대체교사</option>
								<option value="특수교사" <?=$f_recruit_part=="특수교사"?"selected":""?>>특수교사</option>
								<option value="방과후교사" <?=$f_recruit_part=="방과후교사"?"selected":""?>>방과후교사</option>
								<option value="비상근교사" <?=$f_recruit_part=="비상근교사"?"selected":""?>>비상근교사</option>
								<option value="야간교사" <?=$f_recruit_part=="야간교사"?"selected":""?>>야간교사</option>
								<option value="기타" <?=$f_recruit_part=="기타"?"selected":""?>>기타</option>
							</select>
							<select name="f_recruit_orgtype" onChange="this.form.submit();">
								<option value="">-시설유형-</option>
								<option value="국공립" <?=$f_recruit_orgtype=="국공립"?"selected":""?>>국공립</option>
								<option value="사회복지법인" <?=$f_recruit_orgtype=="사회복지법인"?"selected":""?>>사회복지법인</option>
								<option value="법인·단체 등" <?=$f_recruit_orgtype=="법인·단체 등"?"selected":""?>>법인·단체 등</option>
								<option value="민간" <?=$f_recruit_orgtype=="민간"?"selected":""?>>민간</option>
								<option value="가정" <?=$f_recruit_orgtype=="가정"?"selected":""?>>가정</option>
								<option value="직장" <?=$f_recruit_orgtype=="직장"?"selected":""?>>직장</option>
								<option value="협동" <?=$f_recruit_orgtype=="협동"?"selected":""?>>협동</option>
							</select>
						</div>
					</div>
					<form name="searchForm" method="get" action="<?=$_SERVER['PHP_SELF']?>">
					<input type="hidden" name='pno' value='<?=$pno?>'>
					<input type="hidden" name='board_kind' value='<?=$_REQUEST['board_kind']?>'>
					<input type="hidden" name='oldData' value="<?=$oldData?>">
					<div class="rig">
						<div class="__search">
							<select name="search" id="search">
								<option value="recruit_name" <?if($search == "recruit_name"){echo"selected";}?>>제목</option>
								<option value="recruit_content" <?if($search == "recruit_content"){echo"selected";}?>>내용</option>
								<option value="recruit_name+recruit_content" <?if($search == "recruit_name+recruit_content"){echo"selected";}?>>제목+내용</option>
							</select>
							<input type="text" name="keyword" value="<?=$keyword?>" />
							<button type="submit"><i class="axi axi-search"></i></button>
						</div>
					</div>
					</form>

				</div>



				<table class="__tblList respond2">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;"/>
						<col />
						<col style="width:150px;"/>
						<col style="width:100px;"/>
						<col style="width:120px;"/>
						<col style="width:150px;"/>
						<col style="width:100px;"/>
					</colgroup>
					<thead>
						<tr>
							<th scope="col">번호</th>
							<th scope="col">제목</th>
							<th scope="col">시설명</th>
							<th scope="col">시설유형</th>
							<th scope="col">모집직종</th>
							<th scope="col">등록일</th>
							<th scope="col">채용여부</th>
						</tr>
					</thead>
					<tbody>
						<?
						if (sizeof($_list)) {
							$i=0;
							foreach($_list as $row) {
								$td_value=array();
								$idx=$row['idx'];
								$i++;
								$td_num=$row['num'];
								$td_recruit_idx=$row['recruit_idx'];
								$td_recruit_type=$row['recruit_type'];
								$td_recruit_seq=$row['recruit_seq'];
								$td_recruit_name=$row['recruit_name'];
								$td_recruit_orgname=$row['recruit_orgname'];
								$td_recruit_orgtype=$row['recruit_orgtype'];
								$td_recruit_part=$row['recruit_part'];
								$td_recruit_regdate=substr($row['recruit_regdate'],0,10);
								$arr_recruit_addr=explode(" ",$row['recruit_addr']);
								$td_hit=$row['recruit_hit'];
								
								if(strtotime($row['recruit_enddate'])){
								}

								if ($row['recruit_status']=='Y' && time() < strtotime($row['recruit_enddate'])) {
									$td_recruit_status_img='<span class="__ico1 green">채용중</span>';
								} else {
									$td_recruit_status_img='<span class="__ico1 white">채용완료</span>';
								}
						?>
						<tr>
							<td class="__p"><?=$td_num?></td>
							<td class="subject"><a href="javascript:_viewLink('<?=$td_recruit_idx?>','<?=$secretValue?>');"><?=$td_recruit_name?></a></td>
							<td><?=$td_recruit_orgname?></td>
							<td><?=$td_recruit_orgtype?></td>
							<td><?=$td_recruit_part?></td>
							<td><?=$td_recruit_regdate?></td>
							<td><?=$td_recruit_status_img?></td>
						</tr>
						<?
							}
						}
						?>
<!--
						<tr>
							<td class="__p">1829</td>
							<td class="subject"><a href="./job_view.html">유비무환(有備無患) 사전에 준비하는 평가제 유비무환(有備無患) 사전에 준비하는 평가제 유비무환(有備無患) 사전에 준비하는 평가제</a></td>
							<td>예든어린이집</td>
							<td>가정</td>
							<td>보육교사</td>
							<td>2020-10-14</td>
							<td><span class="__ico1 white">채용완료</span></td>
						</tr>
-->
					</tbody>
				</table>

</form>

				<div class="__botArea">
					<div class="rig">
<?// if($_SESSION['member_id'] && $_SESSION['member_level']=="기관"){ ?>
<? if($_SESSION['member_id']){ ?>
						<a href="./job_write.php?pno=<?=$pno?>" class="__btn1">등록하기</a>
<? } ?>
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

<script language="javascript" type="text/javascript"> 
<!--

	function SearchFrm(form) {
		if (checkForm(form))
		{
			return true;
		}	
		return false;
	}
	function _viewLink(v){
		f = document.viewForm;	
		f.recruit_idx.value = v;

		f.action = "<?=$view_url?>";
		f.submit();
	}
//-->
</script>
<form name="viewForm" method="get" action="<?=$_SERVER['PHP_SELF']?>">
	<input type="hidden" name="pno" value="<?=$pno?>">
	<input type="hidden" name="mode" value="view">
	<input type="hidden" name="recruit_idx">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type='hidden' name='f_recruit_type' value='<?=$f_recruit_type?>'>
	<input type='hidden' name='f_recruit_part' value='<?=$f_recruit_part?>'>
	<input type='hidden' name='f_recruit_orgtype' value='<?=$f_recruit_orgtype?>'>
	<input type="hidden" name="search" value="<?=$search?>">
	<input type="hidden" name="keyword" value="<?=$keyword?>">
</form>

</body>
</html>