<?
$pno = "020207";
$mode="list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(3,7,1);
$_tit = array('��������','�������뿩���','������ ��û�ϱ�');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
//��ʸ�
   if($_SESSION[member_id]){
		$mbQuery	= "SELECT name
							, AES_DECRYPT(UNHEX(mobile),'DM') mobile
							, email
							, memtype1
							, memtype5
							, memtype3
							, cpName 
						FROM ona_member WHERE userid='$_SESSION[member_id]'";
		$mbResult	= mysql_query($mbQuery);
		$mbRow		= mysql_fetch_array($mbResult);
		$exMbTel    = explode("-",$mbRow[mobile]);
		$exMbEmail	= explode("@",$mbRow[email]);
		$mbCpName = '';
		if($mbRow[cpName] == '')
	    {
			$mbCpName = '����';
	    }
		else
	    {
			$mbCpName = $mbRow[cpName];
		}
	} else{
		?>
			<script>
			alert('�α��� �� ��û�� �� �ֽ��ϴ�.');
		    location.href="/new/member/login.php?ret_url=<?=urlencode($ret_url)?>";
			</script>
		<?
		exit;
	}
	//if($_SESSION[member_level] != '���' && $_SESSION[member_id]!='dietitian'){
?>
			<script>
			//alert('���ȸ���� ��û�� �� �ֽ��ϴ�.');
		    //location.href="/html/sub/index.php?pno=020703";
		    //history.back();
			</script>
<?
$s_cd = "02";
unset($membernoList);
if($_SESSION['member_id']) $membernoList = sqlArrayOne("select memberno from ona_member_family where userid='$_SESSION[member_id]' and memberno!='' and mbCard='Y' and s_cd='$s_cd' and curdate() between issdate and expdate order by memberno");
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	
	$cyear = $cyear?$cyear:date("Y");
    $cmonth = $cmonth!=""?$cmonth:date("m");


	/********** ����� ������ **********/
	$mStartYear=date("Y");
	$mEndYear=date("Y")+4;	

	/**********�Է°�**********/
	$mYear=($_GET['toYear'])?$_GET['toYear']:date("Y");
	$mMonth=($_GET['toMonth'])?$_GET['toMonth']:date("m");

	/**********��갪**********/
	$mktime=mktime(0,0,0,$mMonth,1,$mYear);//�ԷµȰ����γ�-��-01�������
	$mLastDay=date("t",$mktime);//������year��month����������ϼ����ؿ���
	$mStartDay=date("w",$mktime);//���ۿ��Ͼ˾Ƴ���	

	//�������ϼ����ϱ�
	$mPrevDayCount=date("t",mktime(0,0,0,$mMonth,0,$mYear))-$mStartDay+1;

	$mNowDayCount=1;//�̹�������ī����
	$mNextDayCount=1;//����������ī����

	//����,���������
	$mPrevYear		= $mYear-1;
	$mNextYear		= $mYear+1;
	/*
	$mPrevMonth	= sprintf("%02d",($mMonth-1));
	$mNextMonth	= sprintf("%02d",($mMonth+1));
	*/

	if( $mMonth < 1 ){
		$mYear		-= 1;
		$mMonth	= "12";	
	}
	
	if( $mMonth > 12 ){
		$mYear		+= 1;
		$mMonth	= "01";
	}

	$mPrevMonth= sprintf("%02d",($mMonth-1));
	$mNextMonth= sprintf("%02d",($mMonth+1));

	$mDays = 0;
	for($week = 0; $week < $mStartDay; $week ++) { // �ش���� ó�� ������ �Ǳ� �� ���� �߰�.
		$arrSCH[$mDays]['day'] = "&nbsp";
		$mDays++;
	}

	for($schDay = 1; $schDay <= $mLastDay; $schDay ++) {
		$arrSCH[$mDays]['day'] = $schDay;	
		$mDays++;
	}

	// ����� ���
	$mSetRows = ceil(($mDays) / 7 );
?>
<script language="javascript" src="../../include/js/choice.js"></script>
<script type="text/JavaScript">
<!--
	function input_check(f){
		var check_value = getChecked();

		if(confirm('��� �Ͻðڽ��ϱ�?')){
			f.choiceValue.value	= check_value;
			f.mode.value = 'save';
			return;
		}else{
			return false;	
		}
	}

	function go_write(use_date, time){
		var f = document.frm;

		f.use_date.value = use_date;
		f.time.value = time;
		f.type.value = "";

		$("#use_date").text(use_date);
		if(time==1){
			$("#time").text("����");
		} else if(time==2){
			$("#time").text("����");
		}

		fadeIn('.__popBasic.popApp');
	}

//-->
</script>
<script language="javascript">

	function app_check(barcode, sdate){

<?// if($membernoList){ ?>
<? if(true){ ?>
		if(confirm('�����û �Ͻðڽ��ϱ�?')){
			location.href='03010209_proc.php?pno=03010209&mode=proc&barcode='+barcode+'&sdate='+sdate+'&type=app';
			return true;
		}
<? } else{ ?>
	alert("�뿩ī�带 �߱޹޾ƾ� �̿��� �����մϴ�.");
<? } ?>

		return false;
	}

function back() 
{
	history.back();
}
		
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2>��������û</h2>
			</div>
			<div id="content">

<div class="__tab3">
					<a href="<?=DIR?>/raise/table01.html"><span>��ʸ��� ������ ��û</span></a>
					<a href="<?=DIR?>/raise/table02.html" class="active"><span>������ ������  ��û</span></a>
					<a href="<?=DIR?>/raise/table03.html"><span>�ְ��� ������  ��û</span></a>
				</div>

				<div class="__topArea">
					<div class="lef">
						<div class="__scheHead">
							<strong><?=$mYear?>�� <?=$mMonth?>��</strong>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mPrevMonth?>&mode=<?=$mode?>';" class="prev"><i class="axi axi-angle-left"></i></a>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mNextMonth?>&mode=<?=$mode?>'" class="next"><i class="axi axi-angle-right"></i></a>
						</div>
					</div>
<!--
					<div class="rig">
						<div class="__txt14">�� �����û�� �����ϼ���. (����:10:00~12:00 / ����: 12:00~18:00)</div>
					</div>
-->
				</div>

				<div class="__scheTblWrap">

									<form name="listForm" method="post" onsubmit="return input_check(this);">
										<input type="hidden" name="choiceValue">
										<input type="hidden" name="mode">
										<input type="hidden" name="toYear" value="<?=$mYear?>">
										<input type="hidden" name="toMonth" value="<?=$mMonth?>">

					<table class="__scheTbl">
						<caption>�޷�</caption>
						<thead>
							<tr>
								<th scope="col" class="sun">��</th>
								<th scope="col">��</th>
								<th scope="col">ȭ</th>
								<th scope="col">��</th>
								<th scope="col">��</th>
								<th scope="col">��</th>
								<th scope="col" class="sat">��</th>
							</tr>
						</thead>
									<?
										$mDays=0;
										for($mRows = 0;$mRows < $mSetRows;$mRows++){
											echo "<TR>";
											for($mCols = 1;$mCols < 8;$mCols++){
												DispCell($mDays,$mYear,$mMonth,$arrSCH[$mDays]);
												$mDays++;
											}
											echo "</TR>";
										}
									?>	
					</table>
<?
    function DispCell($mCellIdx,$mYear,$mMonth,$mSCH){

		global $pno, $c_cd, $s_cd;

        if($mSCH['day'] == "&nbsp"){
            $mCellColor = 1;
        }else{
            $mWeek =  date( "w", mktime( 0, 0, 0, $mMonth, $mSCH['day'], $mYear));

            $dayClass = "disable";
            if($mWeek == 3) $dayClass = "normal";

            if($mWeek == 0) $dayClass = "sun";
            if($mWeek == 6) $dayClass = "set";
        }
		
		$wdate = $mYear."-".codeNumber($mMonth)."-".codeNumber($mSCH['day']);
		//echo $mSCH['day']>0?$wdate:"";
		$query	= "SELECT c_cd, ho_name FROM ona_holiday WHERE ( ( s_cd='00' ) || ( c_cd='".$c_cd."' && s_cd='".$s_cd."') ) && ho_date='".$wdate."'";
		$result	= mysql_query($query);
		$row	 	= mysql_fetch_array($result);

		$use_count = sqlArrayOne("select count(*) from ddm_usecenter where left(wdate,10) = '".$wdate."' and usetime='1'");
		$use_count2 = sqlArrayOne("select count(*) from ddm_usecenter where left(wdate,10) = '".$wdate."' and usetime='2'");
		$reg_count = sqlArrayOne("select count(*) from ddm_usecenter_app where left(wdate,10) = '".$wdate."' and time='1'");
		$reg_count2 = sqlArrayOne("select count(*) from ddm_usecenter_app where left(wdate,10) = '".$wdate."' and time='2'");
		$my_count = sqlArrayOne("select count(*) from ddm_usecenter_app where left(wdate,10) = '".$wdate."' and time='1' and userid = '".$_SESSION[member_id]."'");
        $my_count2 = sqlArrayOne("select count(*) from ddm_usecenter_app where left(wdate,10) = '".$wdate."' and time='2' and userid = '".$_SESSION[member_id]."'");

		// fix. ��û ���� �Ⱓ üũ
	   $temp_today = date("Y-m-d");
	   $temp_sdate = date("Y-m-d",strtotime ("0 day $wdate"));
	   $temp_edate = date("Y-m-d",strtotime ("-60 day $wdate"));
   
		$wdate_chk = true;
	   if(($temp_today > $temp_sdate) || ($temp_today < $temp_edate) )
       {
		   $wdate_chk = false;
       }
	   // �̹���+�����޸� ��û���� ����
//		if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
			$dateM = date("Y-m");
			$resultDate = date('Y-m', strtotime('first day of +1 month', strtotime($dateM)));
			$dateM02 = $mYear."-".$mMonth;
			if($dateM02 > $resultDate) $wdate_chk = false;
//		}

	   $today_ = date("Y-m-d");
?>
					<td>
									<span class="num"><?=$mSCH['day']?></span>
									<strong class="dateName"><?=$row[ho_name]?></strong>
									<div class="cont">
<?
if($dayClass == 'normal' && trim($mSCH['day']) != "" && trim($row['ho_name'])=="") {
						$itemInfo = array(array('���������', 'DM02TG00000801'), array('���׸�������', 'DM02TG00001201'), array('����ö��������', 'DM02TG00001301'));
						for($i=0, $il=count($itemInfo); $i<$il; $i++) {

								$appCntQuery = "select count(*) from ona_htable_app where barcode = '".$itemInfo[$i][1]."' and sdate = '".$wdate."' and delete_yn = 'N' ";
								$app_count = sqlArrayOne($appCntQuery); 
								if($wdate < $today_ || !$wdate_chk) {

								} elseif($app_count[0]>0) {
									?>
									<a href="#none" class="btn gray"><?=$itemInfo[$i][0]?> �Ұ�</a>
									
									
									<?
								} else {
									if(date("Y-m-d", strtotime("+2 months")) >= $wdate) {
										?>
										<a href="javascript:app_check('<?=$itemInfo[$i][1]?>', '<?=$wdate?>');" class="btn red"><?=$itemInfo[$i][0]?> ����</a>
										<?
									}
								}

						}
}
?>
									</div>
					</td>

<?
    }
?>
									</form>

				</div>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>


</body>
</html>