<?
$pno = "030804";

	//$c_cd = $INFO[c_cd];
	//$s_cd = $INFO[s_cd];

	if(substr($pno,0,6)=="020601") $s_cd = "00"; // ��������������
	if(substr($pno,0,6)=="030105") $s_cd = "01"; // ��ʸ�
	if(substr($pno,0,6)=="030204") $s_cd = "02"; // ������
	if(substr($pno,0,6)=="030803") $s_cd = "03"; // ���������
	if(substr($pno,0,6)=="030804") $s_cd = "04"; // ���2����
	if(substr($pno,0,6)=="030805") $s_cd = "05"; // ����2ȣ��
	if(substr($pno,0,6)=="030806") $s_cd = "06"; // ���1����
	if(substr($pno,0,6)=="030807") $s_cd = "07"; // ��ʸ�2ȣ��
	if(substr($pno,0,6)=="030808") $s_cd = "08"; // �����
	if(substr($pno,0,6)=="030809") $s_cd = "09"; // �ְ���
	if(substr($pno,0,6)=="030810") $s_cd = "10"; // û������

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,8);
$_tit = array('��������','���ڶ��������ƹ�');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
if(!$_SESSION['member_id']){
	echo "<script>";
	echo "alert('���ڶ��������ƹ� ��û�� ȸ���� �� �� �ֽ��ϴ�.');";
	echo "location.href='../member/login.php';";
	echo "</script>";
}

	$c_cd = 'DM';
	$job1 = sqlRowOne("select job1 from ona_member where userid = '".$_SESSION['member_id']."'");
	$memtype = sqlRowOne("select memtype1 from ona_member where userid = '".$_SESSION['member_id']."'");

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
		$arrSCH[$mDays]['gubun'] = array();
		$arrSCH[$mDays]['title'] = array();
		$arrSCH[$mDays]['eTime'] = array();
		$mDays++;
	}

	for($schDay = 1; $schDay <= $mLastDay; $schDay ++) {
		$arrSCH[$mDays]['day'] = $schDay;
		$arrSCH[$mDays]['gubun'] = array();
		$arrSCH[$mDays]['title'] = array();
		$arrSCH[$mDays]['eTime'] = array();
		$mDays++;
	}

	// ����� ���
	$mSetRows = ceil(($mDays) / 7 );

	//�ش糯�ڿ� ������ó��
	//$mWhere .= " where (from_unixtime(edu_sdate,'%Y')='$mYear' || from_unixtime(edu_edate,'%Y')='$mYear') && (from_unixtime(edu_sdate,'%m')='$mMonth' || from_unixtime(edu_edate,'%m')='$mMonth')";
	$mWhere .= " where from_unixtime(edu_sdate,'%Y')='$mYear' && from_unixtime(edu_sdate,'%m')='$mMonth'";
	if($sitem) $mWhere .= " && $sitem like '%$skey%'";

	if(substr($pno,0,6)=="020601") $gubun = "��������������"; // ��������������
	
	if(substr($pno,0,6)=="020601") {
		if($gubun) $mWhere .= " && (gubun='$gubun' || gubun='�����ü�����')";
	}
	else
	{
		if($gubun) $mWhere .= " && (gubun='$gubun')";
	}
	
	if($s_cd) $mWhere .= " && s_cd='$s_cd'";

	$mWhere .= " && WEEKDAY(FROM_UNIXTIME(edu_sdate)) != 0";
	$mWhere .= " && WEEKDAY(FROM_UNIXTIME(edu_sdate)) != 6";
	$mWhere .= " && left(FROM_UNIXTIME(edu_sdate),10) not in (select ho_date from ona_holiday where s_cd = '00')";

	$sql	= "SELECT idx,gubun,title,eTime,from_unixtime(edu_sdate,'%m') as smon,from_unixtime(edu_sdate,'%d') as sday,from_unixtime(edu_edate,'%m') as emon,";
	$sql .= " from_unixtime(edu_edate,'%d') as eday, sisul_yn FROM ddm_daynursery";
	
	// ���۱� ���� ��û�������� ����������������� 2018�� ���ı۸� ���̵��� ���� - 2019-02-22 ������
	if($_SESSION['masterSession']){
		$sql .= $mWhere;
	} else {
		if($_SESSION['member_level']=='���' || $job1 =='�����ü�������' || $memtype == '���') {
			$mWhere .= "  && sisul_yn = 'Y'";
		} else if($_SESSION['member_level']=='����' || $_SESSION['member_level']=='' || $memtype == '����') {
		// if($memtype == '����') {
		// 	$mWhere .= "  && sisul_yn = 'N'";
		// }else if($job1 =='�����ü�������' || $memtype == '���') {
			$mWhere .= "  && sisul_yn = 'N'";
		} 
		$sql .= $mWhere;//."and from_unixtime(edu_sdate, '%Y') >= '2018'";
	}

	$sql .= " group by smon,sday,eTime ORDER BY edu_sdate asc";
	
if($_SERVER['REMOTE_ADDR']=='1.209.234.24') {
//	echo $sql;
}

	$result = @mysql_query($sql);
	while($rs=@mysql_fetch_array($result)){
		$mArrDay = $mStartDay + $rs['sday'] -1;
		$arrSCH[$mArrDay]['gubun'][] = $rs['gubun'];
		$arrSCH[$mArrDay]['title'][] = $rs['title'];
		$arrSCH[$mArrDay]['eTime'][] = $rs['eTime'];
		$arrSCH[$mArrDay]['idx'][] = $rs['idx'];      //2010-8-10 ����
		$arrSCH[$mArrDay]['sisul_yn'][] = $rs['sisul_yn'];      //2010-8-10 ����
		/*
		if(($rs['smon'] != $rs['emon']) && ($rs['sday'] != $rs['eday'])){
			$mArrDay = $mStartDay + $rs['eday'] -1;
			$arrSCH[$mArrDay]['gubun'][] = "";
			$arrSCH[$mArrDay]['title'][] = "";
			$arrSCH[$mArrDay]['eTime'][] = "";
		}
		*/
	}
	//print_r($arrSCH);
?>
<script language="javascript">
<!--
	function msgposit_list(evt){
		if(navigator.appName == "Netscape"){
		   helpbox.style.left = evt.pageX + 10;
		   helpbox.style.top  = evt.pageY + 20;
		} else {
		   helpbox.style.posLeft = event.x + 10 + document.body.scrollLeft;
		   helpbox.style.posTop  = event.y + 20 + document.body.scrollTop;
		}
	 }

	 function msgset_list(v1,v2){
		  var text;
		  helpbox.style.visibility = "visible";
		  text = "<table width='200' border='0' cellspacing='0' cellpadding='0'>";
		  text +="	<tr>";
		  text +="		<td><img src='../../images/common/sche_box2_top.gif'></td>";
		  text +="	</tr>";
		  text +="	<tr>";
		  text +="		<td valign='top' background='../../images/common/sche_box2_bg.gif'>";
		  text +="			<table width='166' border='0' align='center' cellpadding='0' cellspacing='0'>";
		  text +="				<tr>";
		  text +="					<td width='9' style='vertical-align:top;padding:3 0 0 0;'><img src='../../images/common/dot_02.gif' ></td>";
		  text +="					<td width='157' class='text_01'>"+v1+"</td>";
		  text +="				</tr>";
		  text +="				<tr>";
		  text +="					<td>&nbsp;</td>";
		  text +="					<td valign='top' class='text_02' style='padding:3 0 0 0;'>"+v2+"</td>";
		  text +="				</tr>";
		  text +="			</table>";
		  text +="		</td>";
		  text +="	</tr>";
		  text +="	<tr>";
		  text +="		<td><img src='../../images/common/sche_box2_bottom.gif'></td>";
		  text +="	</tr>";
		  text +="</table>";
		  helpbox.innerHTML = text;
	 }

	 function msghide_list(){
		helpbox.style.visibility = "hidden";
	}
//-->
</script>
</head>
<body>
<div id="wrap" class="sub sub<?=$_dep[0];?> sub<?=$_dep[0].$_dep[1];?>">
	<?include_once PATH.'/inc/head.php';?>
	<?include_once PATH.'/inc/snb.php';?>
	<div id="sub">
		<div class="inner">
			<div id="tit_tab">
				<h2>���ڶ��������ƹ� ��û</h2>
			</div>
			<div id="content">
			<?include_once '../inc/tab2_8.php';?>

				<div class="__topArea">
					<div class="lef">
						<div class="__scheHead">
							<strong><?=$mYear?>�� <?=$mMonth?>��</strong>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mPrevMonth?>&mode=<?=$mode?>';" class="prev"><i class="axi axi-angle-left"></i></a>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mNextMonth?>&mode=<?=$mode?>'" class="next"><i class="axi axi-angle-right"></i></a>
						</div>
						<div style="float:right;vertical-align:middle;margin-top:20px;">
						
							<span style="display: inline-block;
							width: 12px;
							height: 12px;
							line-height: 24px;
							text-align: center;
							color: #fff;
							border-radius: 50%;
							background: #339adc;
							font-size: 14px;
							font-weight: 300;
							cursor: pointer;
							position: relative;"></span> ���&nbsp;&nbsp;
							<span style="
							display: inline-block;
							width: 12px;
							height: 12px;
							line-height: 24px;
							text-align: center;
							color: #fff;
							border-radius: 50%;
							background: #f3506b;
							font-size: 14px;
							font-weight: 300;
							cursor: pointer;
							position: relative;
							"></span> ����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<span style="
							display: inline-block;
							width: 12px;
							height: 12px;
							line-height: 24px;
							text-align: center;
							color: #fff;
							border-radius: 50%;
							background: #f3506b;
							font-size: 14px;
							font-weight: 300;
							cursor: pointer;
							position: relative;
							"></span> ���డ��&nbsp;&nbsp;
							<span style="display: inline-block;
							width: 12px;
							height: 12px;
							line-height: 24px;
							text-align: center;
							color: #fff;
							border-radius: 50%;
							background: #aaa;
							font-size: 14px;
							font-weight: 300;
							cursor: pointer;
							position: relative;"></span> ���ึ��
						</div>
					</div>
					
				</div>

				<div class="__scheTblWrap">
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
										DispCell($mDays,$mYear,$mMonth,$arrSCH[$mDays],$pno,$sitem,$skey,$page);    // ���� 2010-08-22
										$mDays++;
									}
									echo "</TR>";
								}
							?>
					</table>
<?
    function DispCell($mCellIdx,$mYear,$mMonth,$mSCH, $pno, $sitem, $skey, $mPage){  //���� 2010-08-10
		
		global $c_cd, $s_cd;

        if($mSCH['day'] == "&nbsp"){
            $mCellColor = 1;
        }else{
            $mWeek =  date( "w", mktime( 0, 0, 0, $mMonth, $mSCH['day'], $mYear));
            $dayClass = "normal";
            if($mWeek == 0) $dayClass = "sun";
            if($mWeek == 6) $dayClass = "sat";
        }

        $mEdu['1'] = "";
        $mEdu['2'] = "";
        $mEdu['3'] = "";
        $mEdu['4'] = "";
		$mEdu['5'] = "";
		$mEdu['6'] = "";

        for($i=0;$i<sizeof($mSCH['gubun']);$i++){           //���� 2010-08-10
			if($mSCH['gubun'][$i]=="�����ü�����") $tmpIcon = "/images/common/sche_icon03.gif";
			if($mSCH['gubun'][$i]=="������ȸ �������α׷�") $tmpIcon = "/images/sub07/icon2.gif";
			if($mSCH['gubun'][$i]=="�츮���� ����") $tmpIcon = "/images/sub07/icon4.gif";

			if($mSCH['gubun'][$i]=="�θ����") $tmpIcon = "/images/common/sche_icon01.gif";
			if($mSCH['gubun'][$i]=="���������α׷�") $tmpIcon = "/images/common/sche_icon02.gif";
			if($mSCH['gubun'][$i]=="��������������") $tmpIcon = "/images/common/sche_icon03.gif";

			if($_SESSION['masterSession']){
				$temp_index = 'admin_index.php';
			}
			else
			{
				$temp_index = 'index.php';
			}

//			$tmpEdu = " <A href= /html/sub/".$temp_index."?pno=".$pno."&mode=view&idx=".$mSCH['idx'][$i]."&toYear=".$mYear."&toMonth=".$mMonth."&sitem=".$sitem."&skey=".$skey."&page=".$mPage."><IMG src='".$tmpIcon."' onMouseMove='msgposit_list();' onMouseOver=\"msgset_list('".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."','".$mSCH['eTime'][$i]."');\" onMouseOut='msghide_list();'>";


			// fix. ������ ���� ��� ȸ�� ���׶�� ǥ��
			$idx = $mSCH['idx'][$i];
			$query = "select * from ddm_daynursery where idx=$idx";
			$rs = sqlRow($query);

			$thisTime = time();

			// �ش� �̺�Ʈ�� ������ �ο�
			$appInwon = 0; //��û�ο�
			$wappInwon = 0; //����û�ο�
			$all_child_count = 0; // �߰��ڳ��û�ο�
			$wall_child_count = 0; // �߰��ڳ����û�ο�
			$app_type = 0; // ���� ddm_edu_app �� child �÷� ������ ��뿩�� üũ

		/*fix.
			// ����û�ο������� ������ο��� ����
			if($rs[winwon] > 0){
				$del_yn = "";
			}else{
				$del_yn = "and del_yn='N'";
			}
		*/
			$del_yn = "and del_yn='N'";

			/* ��û�� �ο�ī���� */
			$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1=1 $del_yn";
			$applist = sqlArray($query);
			if($applist){
				foreach($applist as $k => $app){
					if($app[addInwon])	$appInwon += $app[addInwon]; // �߰��ο�
					if($app[applyStatus] != 'N'){
						$appInwon++;	// ����
					}	
					if($app[child]){
						$child		 = split('\|', $app[child]);
						$child_count = sizeof($child);
						$child_count = $child_count - 1;
						$all_child_count += $child_count;

						$app_type = 1; // ���� �����ʹ� child �� �־���µ�.. �̰� ���پ� �ֵ��� �ٲ��, ���� �����ʹ� �״�� �������� ������ ���� �߰�..
					}
				}
			}

			/* ����û�� �ο�ī���� */
			$query = "select * from ddm_daynursery_app where parent_idx = '$idx' and status1='3' and del_yn='N'";
			$wapplist = sqlArray($query);
			if($wapplist){
				foreach($wapplist as $k => $app){
					if($app[addInwon])	$wappInwon += $app[addInwon]; // �߰��ο�
					if($app[applyStatus] != 'N'){
						$wappInwon++;	// ����
					}	
					if($app[child]){
						$child		 = split('\|', $app[child]);
						$child_count = sizeof($child);
						$child_count = $child_count - 1;
						$wall_child_count += $child_count;
					}
				}
			}

			// ���� ���� �ο�
			if(!$app_type){
				$inwon_empty = $rs[inwon] - $appInwon;
				$winwon_empty = $rs[winwon] - $wappInwon;
			}
			else{
				$inwon_empty = $rs[inwon] - $all_child_count;
				$winwon_empty = $rs[winwon] - $wall_child_count;
			}

			if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
//				echo $mSCH['day'];
//				var_dump($inwon_empty); 
//				var_dump($winwon_empty);
//				echo "<br />";
			}

			$colorA = "blue";
			$colorB = "green";
			if($inwon_empty < 2){
				$colorA = "grey";
				$colorB = "grey";
			}


			$tmpEdu = " <A href=association4_view.php?pno=".$pno."&mode=view&idx=".$mSCH['idx'][$i]."&toYear=".$mYear."&toMonth=".$mMonth."&sitem=".$sitem."&skey=".$skey."&page=".$mPage." class='flt'>";

			if($inwon_empty < 2){
				$tmpEdu = " <A href=#none class='flt'>";
			}

			//����� ����� ������ ���, ������ ����� ������ �����
			if ( $mSCH['sisul_yn'][$i] == "Y" ) {
				if($mSCH['gubun'][$i]=="���ڶ��������ƹ�") $mEdu['1'] .= $tmpEdu."<span class='cir ".$colorA."'></span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			} else{
				if($mSCH['gubun'][$i]=="���ڶ��������ƹ�") $mEdu['1'] .= $tmpEdu."<span class='cir ".$colorB."'></span>
													<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
													</div>
												</div>
											</a>";
			}



			if(date("Ymd", time()) > $mYear.$mMonth.str_pad($mSCH['day'], 2, "0", STR_PAD_LEFT)) {
				$mEdu['1']  = "";
			}

			if(date("Ymd", strtotime("+2 week")) < $mYear.$mMonth.str_pad($mSCH['day'], 2, "0", STR_PAD_LEFT) && !$_SESSION['masterSession']) {
				$mEdu['1'] = "";
			}

			//fix. �ڷγ��� ���� ���ƹ� �ް� �Ⱓ ���� - 20210724
			$day_tmp = $mSCH['day'];
			if($mSCH['day']<10) $day_tmp = "0".$day_tmp;
			$chkDate =  $mYear.$mMonth.$day_tmp;
			$today_ = date("Ymd H");
			if($chkDate > "20230528 "){
				if($chkDate < "20230530") $mEdu['1'] = "";
			}
        }

		$wdate = $mYear."-".codeNumber($mMonth)."-".codeNumber($mSCH['day']);
		//echo $mSCH['day']>0?$wdate:"";
		$query	= "SELECT ho_name FROM ona_holiday WHERE ( ( c_cd='00' ) || ( c_cd='".$c_cd."' && (s_cd='".$s_cd."' || s_cd='00')) ) && ho_date='".$wdate."'";

		$result	= mysql_query($query);
		$row	 	= mysql_fetch_array($result);
?>
<td class="<?=$dayClass?>">

									<span class="num"><?=$mSCH['day']?></span>
						<?
							if($row[ho_name]){
								echo '<strong class="dateName">'.$row[ho_name].'</strong>';
							}
						?>
									<div class="cont tal">
										<?=$mEdu['1']?>
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

<div class="__popBasic popApp">
	<div class="inner">
		<div class="title">
			<h3>��� �� �������ƹ� ��û�ϱ�</h3>
			<button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
		</div>
		<div class="desc">
			<div class="__provisionHead type2">
				<h3>���ǻ���</h3>
				<div class="__txt15 __mt10">
					�Ʒ� �̿��Ģ�� ���ؼ� �����Ͻð�, ���� �ֹε��� �Բ� �̿��� �� �ֵ��� �̿��Ģ�� �� �����ֽñ� �ٶ��ϴ�.
				</div>
			</div>

			<table class="__tblView respond __mt30">
				<caption>TABLE</caption>
				<colgroup>
					<col style="width:140px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">��û�ڸ�</th>
						<td>
							ȫ�浿
						</td>
					</tr>
					<tr>
						<th scope="row">�ü���</th>
						<td>
							<input type="text" class="__inp __m-w100p" style="width:150px;">
						</td>
					</tr>
					<tr>
						<th scope="row">����ó</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<select name="" id="" class="__inp">
										<option value="">010</option>
									</select>
								</li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">�������</th>
						<td>
							2020-10-20
						</td>
					</tr>
					<tr>
						<th scope="row">����ð�</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<select name="" id="" class="__inp">
										<option value="">����</option>
									</select>
								</li>
								<li class="space"></li>
								<li><input type="text" class="__inp"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">�̿��ο�</th>
						<td>
							<input type="text" class="__inp __m-w30p" style="width:60px;"> ��
						</td>
					</tr>
					<tr>
						<th scope="row">�̿����</th>
						<td>
							<input type="text" class="__inp">
						</td>
					</tr>
					<tr>
						<th scope="row">�ܺξ�ü �湮</th>
						<td>
							<label><input type="radio"> ��</label>
							<label><input type="radio"> ��</label>
						</td>
					</tr>
					<tr>
						<th scope="row">��û��</th>
						<td>2020-10-20</td>
					</tr>
					<tr>
						<th scope="row">��Ÿ����</th>
						<td>
							<textarea name="" id="" class="__inp" style="height:80px;"></textarea>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="__botArea">
				<div class="cen">
					<button type="button" class="__btn1 gray" onclick="fadeOut($(this).closest('.__popBasic'));">���</button> &nbsp;
					<button type="submit" class="__btn1">Ȯ��</button>
				</div>
			</div>



		</div>
	</div>
	<div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>
</div>

</body>
</html>
<?
//if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
// ��������
// 	$day_res = date("Ymd", strtotime("+30 day"));
// // ��û��������
// 	$day_app = date("Ymd", strtotime("+14 day"));

// // �Ͽ���, ������ ����
// 	$day_w = date('w', strtotime($day_res));


// 	// �����,���2����
// 	$query = "INSERT INTO `ddm_daynursery` (`gubun`, `title`, `edu_sdate`, `edu_edate`, `req_sdate`, `req_edate`, `eTime`, `ePlace`, `inwon`, `winwon`, `money`, `content`, `status`, `bankinfo`, `sponsor`, `tel`, `e_file1`, `e_file2`, `hit`, `license`, `edu_code`, `s_cd`, `climit1`, `climit2`, `sisul_yn`) VALUES";
// 	if($day_w > 1){

// 	// 1Ÿ��
// 		$day_res_01_s = $day_res."1000";
// 		$day_res_01_e = $day_res."1200";
// 		$day_app_01_s = $day_app."0000";
// 		$day_app_01_e = $day_res."1000";

// 	// 2Ÿ��
// 		$day_res_02_s = $day_res."1300";
// 		$day_res_02_e = $day_res."1500";
// 		$day_app_02_s = $day_app."0000";
// 		$day_app_02_e = $day_res."1300";

// 	// 3Ÿ��
// 		$day_res_03_s = $day_res."1530";
// 		$day_res_03_e = $day_res."1730";
// 		$day_app_03_s = $day_app."0000";
// 		$day_app_03_e = $day_res."1530";

// 	// 4Ÿ�� (��ʸ��� - �����)
// 		$day_res_04_s = $day_res."1800";
// 		$day_res_04_e = $day_res."1930";
// 		$day_app_04_s = $day_app."0000";
// 		$day_app_04_e = $day_res."1600";

// 		// �ش糯¥�� ��ϵǾ� �ִ��� ���� Ȯ��
// 		$query_chk = "select count(idx) from `ddm_daynursery` where req_sdate = '".strtotime($day_app_01_s)."' and s_cd = '".$s_cd."' ";
// 		$result_chk = mysql_query($query_chk);
// 		$row_chk = mysql_fetch_array($result_chk);

// 		if($row_chk[0] < 1){

// 			if($day_w == 3){
// 				$query .= "('���ڶ��������ƹ�', '[���2ȣ��]���ڶ� �������ƹ�-1ȸ��(10:00~12:00)', '".strtotime($day_res_01_s)."', '".strtotime($day_res_01_e)."', '".strtotime($day_app_01_s)."', '".strtotime($day_app_01_e)."', '10:00~12:00', '���2ȣ��', 20, 0, '', '<!--StartFragment--><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿���</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">5</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�� ������ ������ �� ��ȣ��</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�ð�</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; [</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">����ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">]&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȭ����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">~</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">: 10:00~17:30</span></p><div><strong>&nbsp; [���ȸ��]: ������ 10:00~12:00</strong></div><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 1</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;10:00~12:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 2</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;13:00~15:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;3</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;15:30~17:30</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">�� </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȯ������ð�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\"> : 12:00~13:00, 15:00~15:30, 17:30~18:00 (</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�Ұ�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">)&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�ް���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;:&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�Ͽ���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span></p>
// 			<p class=\'0\' style=\'mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\'><span style=\'font-family: ����;color:red;font-weight:bold;\'>�� �ʵ��л� ����  �� ���� �Ұ�<br>�� ������ ���������� �����Ƿ�, ���߱��� �̿�ٶ� <br>�� �������ƹ� ���� ���۽ð� ���� ��� �� ���� ���� �� �ش����� �� �ְ� �̿� �� ����Ұ�(Ÿ������ ���� ����)</span></p>', '����', '', '', '', '', '', 0, 'N', '', '".$s_cd."', '', '', 'Y')";
// 			} else{
// 				$query .= "('���ڶ��������ƹ�', '[���2ȣ��]���ڶ� �������ƹ�-1ȸ��(10:00~12:00)', '".strtotime($day_res_01_s)."', '".strtotime($day_res_01_e)."', '".strtotime($day_app_01_s)."', '".strtotime($day_app_01_e)."', '10:00~12:00', '���2ȣ��', 20, 0, '', '<!--StartFragment--><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿���</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">5</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�� ������ ������ �� ��ȣ��</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�ð�</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; [</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">����ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">]&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȭ����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">~</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">: 10:00~17:30</span></p><div><strong>&nbsp; [���ȸ��]: ������ 10:00~12:00</strong></div><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 1</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;10:00~12:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 2</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;13:00~15:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;3</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;15:30~17:30</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">�� </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȯ������ð�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\"> : 12:00~13:00, 15:00~15:30, 17:30~18:00 (</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�Ұ�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">)&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�ް���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;:&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�Ͽ���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span></p>
// 			<p class=\'0\' style=\'mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\'><span style=\'font-family: ����;color:red;font-weight:bold;\'>�� �ʵ��л� ����  �� ���� �Ұ�<br>�� ������ ���������� �����Ƿ�, ���߱��� �̿�ٶ� <br>�� �������ƹ� ���� ���۽ð� ���� ��� �� ���� ���� �� �ش����� �� �ְ� �̿� �� ����Ұ�(Ÿ������ ���� ����)</span></p>', '����', '', '', '', '', '', 0, 'N', '', '".$s_cd."', '', '', 'N')";
// 			}		

// 			$query .= ",('���ڶ��������ƹ�', '[���2ȣ��]���ڶ� �������ƹ�-2ȸ��(13:00~15:00)', '".strtotime($day_res_02_s)."', '".strtotime($day_res_02_e)."', '".strtotime($day_app_02_s)."', '".strtotime($day_app_02_e)."', '13:00~15:00', '���2ȣ��', 20, 0, '', '<!--StartFragment--><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿���</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">5</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�� ������ ������ �� ��ȣ��</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�ð�</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; [</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">����ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">]&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȭ����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">~</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">: 10:00~17:30</span></p><div><strong>&nbsp; [���ȸ��]: ������ 10:00~12:00</strong></div><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 1</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;10:00~12:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 2</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;13:00~15:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;3</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;15:30~17:30</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">�� </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȯ������ð�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\"> : 12:00~13:00, 15:00~15:30, 17:30~18:00 (</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�Ұ�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">)&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�ް���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;:&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�Ͽ���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span></p>
// 			<p class=\'0\' style=\'mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\'><span style=\'font-family: ����;color:red;font-weight:bold;\'>�� �ʵ��л� ����  �� ���� �Ұ�<br>�� ������ ���������� �����Ƿ�, ���߱��� �̿�ٶ� <br>�� �������ƹ� ���� ���۽ð� ���� ��� �� ���� ���� �� �ش����� �� �ְ� �̿� �� ����Ұ�(Ÿ������ ���� ����)</span></p>', '����', '', '', '', '', '', 0, 'N', '', '".$s_cd."', '', '', 'N')";

// 			$query .= ",('���ڶ��������ƹ�', '[���2ȣ��]���ڶ� �������ƹ�-3ȸ��(15:30~17:30)', '".strtotime($day_res_03_s)."', '".strtotime($day_res_03_e)."', '".strtotime($day_app_03_s)."', '".strtotime($day_app_03_e)."', '15:30~17:30', '���2ȣ��', 20, 0, '', '<!--StartFragment--><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿���</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">5</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�� ������ ������ �� ��ȣ��</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�ð�</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; [</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">����ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">]&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȭ����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">~</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�����</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">: 10:00~17:30</span></p><div><strong>&nbsp; [���ȸ��]: ������ 10:00~12:00</strong></div><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 1</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;10:00~12:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp; 2</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;13:00~15:00</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;&nbsp;3</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ����;\"> </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȸ��</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;15:30~17:30</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">�� </span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">ȯ������ð�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\"> : 12:00~13:00, 15:00~15:30, 17:30~18:00 (</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�̿�Ұ�</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">)&nbsp;</span></p><p class=\"0\" style=\"mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\"><span style=\"letter-spacing: 0pt; font-family: ����; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-fareast-font-family: ����; mso-hansi-font-family: ����;\">��</span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�ް���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">&nbsp;:&nbsp;</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">�Ͽ���</span><span lang=\"EN-US\" style=\"font-weight: bold; mso-fareast-font-family: ���� ���;\"> </span><span lang=\"EN-US\" style=\"letter-spacing: 0pt; font-family: ���� ���; font-weight: bold; mso-font-width: 100%; mso-text-raise: 0pt; mso-ascii-font-family: ���� ���; mso-fareast-font-family: ���� ���;\">/</span><span style=\"font-family: ����; font-weight: bold; mso-fareast-font-family: ����;\">������</span></p>
// 			<p class=\'0\' style=\'mso-pagination: none; mso-padding-alt: 0pt 0pt 0pt 0pt;\'><span style=\'font-family: ����;color:red;font-weight:bold;\'>�� �ʵ��л� ����  �� ���� �Ұ�<br>�� ������ ���������� �����Ƿ�, ���߱��� �̿�ٶ� <br>�� �������ƹ� ���� ���۽ð� ���� ��� �� ���� ���� �� �ش����� �� �ְ� �̿� �� ����Ұ�(Ÿ������ ���� ����)</span></p>', '����', '', '', '', '', '', 0, 'N', '', '".$s_cd."', '', '', 'N');";

// 			// �ߺ� �ѹ��� üũ - �ش糯¥�� ��ϵǾ� �ִ��� ���� Ȯ��
// 			$query_chk = "select count(idx) from `ddm_daynursery` where req_sdate = '".strtotime($day_app_01_s)."' and s_cd = '".$s_cd."' ";
// 			$result_chk = mysql_query($query_chk);
// 			$row_chk = mysql_fetch_array($result_chk);

// 			if($row_chk[0] < 1){
// 				mysql_query($query);
// 			}
// 		}
// 	}
//}
?>