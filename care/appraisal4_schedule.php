<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);


$pno = "020304";
$mode = "list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,1,4);
$_tit = array('��������','����','������ ���');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	
	if(!$_SESSION[member_id]){
		?>
			<script>
			alert('�α��� �� ��û�� �� �ֽ��ϴ�.');
		    location.href="/new/member/login.php?ret_url=<?=urlencode($ret_url)?>";
		    //history.back();
			</script>
		<?
	}
	//if($_SESSION[member_level] != '���' && $_SESSION[member_id]!='dietitian'){
		?>
			<script>
			//alert('���ȸ���� ��û�� �� �ֽ��ϴ�.');
		    //location.href="/html/sub/index.php?pno=020304";
		    //history.back();
			</script>
		<?
	//}

	$c_cd = $INFO[c_cd];
	$s_cd = $INFO[s_cd];

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
	/*$mPrevYear=$mYear-1;
	$mPrevMonth=($mMonth==1)?12:sprintf("%02d",($mMonth-1));
	$mNextYear=$mYear+1;
	$mNextMonth=( $mMonth == 12 )? 1 : sprintf("%02d",($mMonth + 1));*/

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
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2>����</h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>���� �ȳ�</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>���� �ü��</span></a>
					<a href="<?=DIR?>/care/appraisal3.php"><span>�����ڷ��</span></a>
					<a href="<?=DIR?>/care/appraisal4.php" class="active"><span>������ ���</span></a>
				</div>
				<div class="__topArea">
					<div class="lef">
						<div class="__scheHead">
							<strong><?=$mYear?>�� <?=$mMonth?>��</strong>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mPrevMonth?>&mode=<?=$mode?>';" class="prev"><i class="axi axi-angle-left"></i></a>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mNextMonth?>&mode=<?=$mode?>'" class="next"><i class="axi axi-angle-right"></i></a>
						</div>
					</div>
					<div class="rig">
						<div class="__txt14">�� �ش� ��¥�� Ŭ���Ͻø� ���� �湮 �������� ��û�Ͻ� �� �ֽ��ϴ�.</div>
					</div>
				</div>

				<div class="__scheTblWrap">

						<!----�޷�(s)--->
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
						<!----�޷�(e)--->
<?
	function holidayCheck($plusDate,$minusDate){
		global $c_cd, $s_cd;
		$h1Query	= "SELECT count(*) FROM ona_holiday WHERE ( ( c_cd='00' ) || ( c_cd='".$c_cd."' && s_cd='".$s_cd."') ) && ho_date='".date("Y-m-d",$plusDate)."'";
		$h1Result	= mysql_query($h1Query);
		$h1Row	= mysql_fetch_array($h1Result);

		if($h1Row[0]>0){
			if( date("w",$plusDate) >= 1 && date("w",$plusDate) <= 5 ){
				$plusDate += 86400;
				$minusDate += 1;
				$minusDate = holidayCheck($plusDate,$minusDate);
				return $minusDate;
			}
		}else{
			return $minusDate;
		}
	}

    function DispCell($mCellIdx,$mYear,$mMonth,$mSCH){
		
		global $pno, $c_cd, $s_cd;

        if($mSCH['day'] == "&nbsp"){
            $mCellColor = 1;
        }else{
            $mWeek =  date( "w", mktime( 0, 0, 0, $mMonth, $mSCH['day'], $mYear));
            $dayClass = "normal";
            if($mWeek == 0) $dayClass = "sun";
            if($mWeek == 6) $dayClass = "sat";
        }

		$wdate = $mYear."-".codeNumber($mMonth)."-".codeNumber($mSCH['day']);
		//echo $mSCH['day']>0?$wdate:"";

		// �ް���
		$hQuery	= "SELECT c_cd, ho_name FROM ona_holiday WHERE ( ( c_cd='00' ) || ( c_cd='".$c_cd."' && s_cd='".$s_cd."') ) && ho_date='".$wdate."'";
		$hResult	= mysql_query($hQuery);
		$hRow	 	= mysql_fetch_array($hResult);

		if($hRow[ho_name]){
			$classValue = "font_red";
		}else{
			$classValue = "font_gray2";
		}
?>
<td class="<?=$dayClass?>">
									<span class="num"><?=$mSCH['day']?></span>
									<strong class="dateName"><?if($mSCH['day']>=1 && $mWeek!=0 && $hRow[c_cd]!="00"){?><input type="checkbox" name="fcheck" value="<?=$wdate?>" style="display:none"><?}else{?>&nbsp;<?}?></strong>
									<div class="cont">
						<?
							if($hRow[ho_name]){
								echo '<strong class="dateName">'.$hRow[ho_name].'</strong>';
							}else{
								
								// ��û�Ⱓ ���� ��û�� - 1�� ��û�Ұ�
								$minusDate = 0;
								$appWeek = date("w",strtotime($wdate));
								if($appWeek=="1") $minusDate += 2;

								$plusDate = strtotime(date("Y-m-d"))+86400;
								$minusDate = holidayCheck($plusDate,$minusDate);
								if(strtotime(date("Y-m-d")) <= (strtotime($wdate)-(86400*(2+$minusDate)))) $YN = "Y";	

								$query	= "SELECT idx, kind, state FROM ddm_aid WHERE wdate='".$wdate."' ORDER BY kind";
								$result	= mysql_query($query);
								while($row = mysql_fetch_array($result)){					

									$appQuery	= "SELECT count(*) FROM ddm_aid_app WHERE pidx='".$row[idx]."'";
									$appResult	= mysql_query($appQuery);
									$appRow		= mysql_fetch_array($appResult);
									
									echo $row[kind]=="AM"?"1":"2";
									if($row[state]=="����") $fontStype = "font_orenge1";
									if($row[state]=="����" || !$YN ) $fontStype = "font_green1";									
									$state = $row[state];
									if($row[state]=="����" || !$YN ){
										echo "<a href=\"javascript:;\" onClick=\"alert('���� �Ǿ����ϴ�.');\" class=\"btn gray\">";
										$state = "����";
									}else{
										if($_SESSION[member_id]){
											// �ߺ���û üũ
											
											if($appRow[0]==0){
												echo "<a href=\"appraisal4_write.php?pno=".$pno."&mode=write&toYear=".$mYear."&toMonth=".codeNumber($mMonth)."&idx=".codeNumber($row['idx'])."\" class=\"btn red\">";
											}else{
												echo "<a href=\"javascript:;\" onClick=\"alert('�̹� ��û�Ͻ�ȸ���� �ֽ��ϴ�.');\" class=\"btn gray\">";
												$state="����";
											}
										}else{
											echo "<a href=\"javascript:;\" onClick=\"alert('ȸ���� ��û�� �� �ֽ��ϴ�.');location.href('/new/member/login.php?pno=050101&ret_url=".urlencode($_SERVER['REQUEST_URI'])."');\" class=\"btn red\">";
										}										
									}

// fix.									if($appRow[0] > 0){ $state = "����";  $fontStype = "gray";}
									echo $state."</a>";
								}
							}
						?>		
									</div>
</td>
<?
    }
?>
				</div>


			</div>
		</div>
	</div>
	<?include_once PATH.'/inc/foot.php';?>
</div>
</body>
</html>