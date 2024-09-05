<?
$pno = $_REQUEST['pno'];
if(!$pno) $pno = "03010307";
if(!$list_url) $list_url = "hwi3.php";
?>
<?
$_dep = array(3,1,6);
$_tit = array('양육지원','장난감대여사업');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
include $_SERVER["DOCUMENT_ROOT"]."/skin/myrent/reserve_check.php";
mysql_query("update ona_item set hit = hit + 1 where itemcode = '".$itemcode."'");
//답십리점
if($pno=="03010107"){
	$s_cd = "01";
}
//제기점
if($pno=="03010207"){
	$s_cd = "02";
}
//휘경점
if($pno=="03010307"){
	$s_cd = "03";
}



$query	= "SELECT 
					A.itemname, A.subitem1, A.subitem2, A.buyprice, A.itemimage, A.content, A.s_cd,
					ifnull(B.CNT,0) As CNT, D.bname, E.name As useage, F.CNT As ea
			 FROM ona_item As A
  LEFT OUTER JOIN ( SELECT itemcode, count(*) As CNT FROM ona_orderitem WHERE c_cd='".$INFO["C_CD"]."' && delete_yn='N' GROUP BY itemcode ) B ON B.itemcode=A.itemcode
  LEFT OUTER JOIN ( SELECT bcode, bname FROM ona_bcode WHERE c_cd='".$INFO["C_CD"]."' GROUP BY bcode ) As D ON D.bcode=A.bcode
  LEFT OUTER JOIN ona_useage As E ON E.idx=A.useage
  LEFT OUTER JOIN ( SELECT itemcode, count(*) As CNT FROM ona_item_barcode WHERE c_cd='".$INFO["C_CD"]."' and status not in ('LD05','LD99') GROUP BY itemcode ) F ON F.itemcode=A.itemcode
			WHERE A.itemcode='".$itemcode."'";

if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
	//echo $query;
}

$result	= mysql_query($query);
$row	 	= @mysql_fetch_array($result);

// 휴관일 목록
$holiday = sqlRowOne("select count(*) from ona_holiday where ho_date = curdate() and s_cd in( '$s_cd','00' )") ;

$itembarcode = sqlArray("select * from ona_item_barcode where itemcode='$itemcode' and status in ('LD01','LD02','LD03','LD04','LD06','LD95')");
$itemimage = $item['itemimage']?$INFO['rentUrl'].$item['itemimage']:"/images/sub02/noimg_02.gif";
if($_SESSION['member_id']) $membernoList = sqlArrayOne("select memberno from ona_member_family where userid='$_SESSION[member_id]' and memberno!='' and mbCard='Y' and s_cd='$s_cd' and curdate() between issdate and expdate order by memberno");

if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
	//echo "select memberno from ona_member_family where userid='$_SESSION[member_id]' and memberno!='' and mbCard='Y' and s_cd='$s_cd' and curdate() between issdate and expdate order by memberno";
}


$barcodeList = sqlArray("select barcode, status from ona_item_barcode where itemcode = '$itemcode' and status in ('LD01','LD02','LD03','LD04','LD95')");

echo "<script>console.log(\"$row\");</script>";

// 이미지					
if($row[itemimage]){
	$photoFile = $INFO[rentUrl].$row[itemimage];
	$fileConfirm="Y";
	//if(!is_file($photoFile)) $fileConfirm="N";
}						
if($fileConfirm!="Y") $photoFile = "../../images/sub04/no_img1.gif";					
?>

<script>
function chkFavorForm(form){
	if(!form.userid.value) {alert("로그인 후 이용하여 주세요.");location.href='../member/login.php';return false;}
	return true;
}
function chkReserveForm(k, barcode){
	try{
		var form = document.reserveForm;
		form.memberno.value = document.membernoSelectForm.membernoList.value;
		form.barcode.value = barcode;
		form.reservetime.value = document.getElementById('reservetime_'+k).value;
		if(!form.userid.value) {alert("로그인 후 이용하여 주세요.");location.href='../member/login.php';return false;}
		if(!form.memberno.value) {alert("대여카드를 발급받아야 이용이 가능합니다.");return false;}
		if(!form.reservetime.value){alert('예약시간을 선택해주세요.');form.reservetime.focus();return false;}
		form.submit();
	}
	catch(e){
		alert(e.message);
		return false;
	}
}
</script>
</head>
<body>

<form name="reserveForm" action="rent_proc.php" method="post">
<input type="hidden" name="mode" value="reserve">
<input type="hidden" name="userid" value="<?=$_SESSION['member_id']?>">
<input type="hidden" name="name" value="<?=$_SESSION['member_name']?>">
<input type="hidden" name="memberno" value="">
<input type="hidden" name="itemcode" value="<?=$itemcode?>">
<input type="hidden" name="s_cd" value="<?=$row['s_cd']?>">
<input type="hidden" name="barcode" value="">
<input type="hidden" name="reservetime" value="">
</form>

<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2><?=end($_tit)?></h2>
			</div>
			<div id="content">
<? include_once '../inc/tab3_view.php'; ?>
				<div class="__tit2">
					<h3>아이들에게 재미있는 <strong>장난감</strong>을 찾아주세요!</h3>
				</div>

				<div class="__rentHead">
					<div class="head">
						<div class="img"><img src="<?=$photoFile?>" alt="<?=$row[itemname]?>"></div>
						<div class="info __rendInfo">
							<dl class="wide">
								<dt>장난감명</dt>
								<dd><?=$row[itemname]?></dd>
							</dl>
							<dl>
								<dt>영역</dt>
								<dd><?=$row[bname]?></dd>
							</dl>
							<dl>
								<dt>연령</dt>
								<dd><?=$row[useage]?></dd>
							</dl>
							<dl>
								<dt>구성품</dt>
								<dd><?=$row[subitem1]?><br><?=$row[subitem2]?></dd>
							</dl>
							<dl>
								<dt>구입가격</dt>
								<dd><?=number_format($row[buyprice])?>원</dd>
							</dl>
							<dl>
								<dt>보유수량</dt>
								<dd><?=number_format($row[ea])?>개</dd>
							</dl>
							<dl>
								<dt>대여횟수</dt>
								<dd><?=number_format($row[CNT])?>회</dd>
							</dl>
							<dl class="wide">
								<dt>대여상태</dt>
								<dd>
												<?
												foreach($barcodeList as $v){
													$ingImage = "";
													if($v['status']=="LD01" ) $ingImage = '<span class="__ico1 orange" style="margin-top:2px;">대여가능</span>';
													if($v['status']=="LD02" ) $ingImage = '<span class="__ico1 green" style="margin-top:2px;">대여중</span>';
													if($v['status']=="LD03" ) $ingImage = '<span class="__ico1 blue" style="margin-top:2px;">세척중</span>';
													if($v['status']=="LD04" ) $ingImage = '<span class="__ico1" style="background:grey;margin-top:2px;">A/S 중</span>';
													if($v['status']=="LD06" ) $ingImage = '<span class="__ico1" style="background:brown;margin-top:2px;">예약중</span>';
													if($v['status']=="LD95" ) $ingImage = '<span class="__ico1 green" style="margin-top:2px;">구성품미반납</span>';
												?>
												<?=$v['barcode']?> 
												<?=$ingImage?><br>
												<?}?>
								</dd>
							</dl>
						</div>
					</div>
					<div class="bot">
						<?=nl2br($row[content])?>
					</div>
				</div>

				<div style="float:right;">
						<form name="membernoSelectForm" onsubmit="return false;">
	<?if($membernoList){?>
						회원카드
						<select name="membernoList">
		<?foreach($membernoList as $memberno){?>
						<option value="<?=$memberno?>"><?=$memberno?>
		<?}?>
						</select>
	<?}else{?>
						<input type="hidden" name="membernoList">
	<?}?>
						</form>
				</div>

				<div class="__tit1 __mt50">
					<h3>대여상태</h3>
				</div>
				<table class="__tblList respond3">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:85px;">
						<col>
						<col style="width:120px;">
						<col style="width:150px;">
						<col>
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="__p">번호</th>
							<th scope="col">등록번호</th>
							<th scope="col">대여상태</th>
							<th scope="col">반납예정일</th>
							<th scope="col">예정일</th>
						</tr>
					</thead>
					<tbody>
<?
$today_ = date("Ymd");

$no=1;
if($itembarcode) foreach($itembarcode as $k => $v){
	if($v['status']=="LD01") $icon = "rent_yes";
	if($v['status']=="LD02") $icon = "rent_ing";
	if($v['status']=="LD03") $icon = "rent_wash";
	if($v['status']=="LD04") $icon = "rent_as";
	if($v['status']=="LD06") $icon = "state_reserve";
	if($v['status']=="LD95") $icon = "rent_ing";

	$ingImage = "";
	if($v['status']=="LD01" ) $ingImage = '<span class="__ico1 orange">대여가능</span>';
	if($v['status']=="LD02" ) $ingImage = '<span class="__ico1 green">대여중</span>';
	if($v['status']=="LD03" ) $ingImage = '<span class="__ico1 blue">세척중</span>';
	if($v['status']=="LD04" ) $ingImage = '<span class="__ico1" style="background:grey">A/S 중</span>';
	if($v['status']=="LD06" ) $ingImage = '<span class="__ico1" style="background:brown">예약중</span>';
	if($v['status']=="LD95" ) $ingImage = '<span class="__ico1 green">구성품미반납</span>';


	$edate1 = "&nbsp;";
	if($v['status']=="LD02") $edate1 = sqlRowOne("select edate1 from ona_orderitem where delete_yn='N' and barcode = '$v[barcode]' and edate2='' order by orderno desc limit 1");
?>
						<tr>
							<td class="__p"><?=$no?></td>
							<td data-th="등록번호"><?=$v['barcode']?></td>
							<td data-th="대여상태"><?=$ingImage?></td>
							<td data-th="반납예정일"><?=$edate1?></td>
							<td data-th="예정일">
<?if($v['status']=='LD01'){?>
								<ul class="__form">
									<li>
										<select name="reservetime" id="reservetime_<?=$k?>">
										<option value="">예약시간을 선택해주세요.</option>
<? if($today_ < "20211026"){ ?>
									 	<option value="1800">30분 이내 방문합니다.</option>
<? } ?>
										<option value="3600">1시간 이내 방문합니다.</option>
										<option value="7200">2시간 이내 방문합니다.</option>
										</select>
									</li>
									<li class="space"></li>
									<li style="width:60px;">
							<? if($holiday > 0){ ?>
									<button type="button" class="__btn2 __w100p" onclick="alert('휴관일은 예약이 불가능합니다.')">예약</button>
							<? }else if(date("Y-m-d H:i") >= '2023-05-11 10:00' && date("Y-m-d H:i") < '2023-05-11 12:00'){ ?>
									<button type="button" class="__btn2 __w100p" onclick="alert('금일 오전 10시부터 12시까지는 예약이 불가능합니다.')">예약</button>
							<?}else if(date("Y-m-d H:i") >= '2024-03-14 10:00' && date("Y-m-d H:i") < '2024-03-14 12:00'){ ?>
									<button type="button" class="__btn2 __w100p" onclick="alert('금일 오전 10시부터 12시까지는 예약이 불가능합니다.')">예약</button>
							<?} else{ ?>
									<button type="button" class="__btn2 __w100p" onclick="chkReserveForm('<?=$k?>','<?=$v['barcode']?>');">예약</button>
							<? } ?>
									</li>
									
								</ul>
<?}?>
							</td>
						</tr>
<?
	$no++;
}
?>
					</tbody>
				</table>

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