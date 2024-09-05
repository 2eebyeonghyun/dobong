<?
$pno = "030901";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(4,2);
$_tit = array('교육 및 행사','교육 및 행사');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	//$c_cd = $INFO[c_cd];
	//$s_cd = $INFO[s_cd];

	if(substr($pno,0,6)=="020601") $s_cd = "00"; // 보육교직원교육
	if(substr($pno,0,6)=="030901") $s_cd = "01"; // 답십리
	if(substr($pno,0,6)=="030902") $s_cd = "02"; // 제기점

	$c_cd = 'DM';


	/********** 사용자 설정값 **********/
	$mStartYear=date("Y");
	$mEndYear=date("Y")+4;

	/**********입력값**********/
	$mYear=($_GET['toYear'])?$_GET['toYear']:date("Y");
	$mMonth=($_GET['toMonth'])?$_GET['toMonth']:date("m");

	/**********계산값**********/
	$mktime=mktime(0,0,0,$mMonth,1,$mYear);//입력된값으로년-월-01을만든다
	$mLastDay=date("t",$mktime);//현재의year와month로현재달의일수구해오기
	$mStartDay=date("w",$mktime);//시작요일알아내기

	//지난달일수구하기
	$mPrevDayCount=date("t",mktime(0,0,0,$mMonth,0,$mYear))-$mStartDay+1;

	$mNowDayCount=1;//이번달일자카운팅
	$mNextDayCount=1;//다음달일자카운팅

	//이전,다음만들기
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
	for($week = 0; $week < $mStartDay; $week ++) { // 해당월의 처음 요일이 되기 전 공백 추가.
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

	// 출력행 계산
	$mSetRows = ceil(($mDays) / 7 );

	//해당날자에 스케쥴처리
	//$mWhere .= " where (from_unixtime(edu_sdate,'%Y')='$mYear' || from_unixtime(edu_edate,'%Y')='$mYear') && (from_unixtime(edu_sdate,'%m')='$mMonth' || from_unixtime(edu_edate,'%m')='$mMonth')";
	$mWhere .= " where from_unixtime(edu_sdate,'%Y')='$mYear' && from_unixtime(edu_sdate,'%m')='$mMonth'";
	if($sitem) $mWhere .= " && $sitem like '%$skey%'";

	if(substr($pno,0,6)=="020601") $gubun = "보육교직원교육"; // 보육교직원교육
	
	if(substr($pno,0,6)=="020601") {
		if($gubun) $mWhere .= " && (gubun='$gubun' || gubun='보육시설관련')";
	}
	else
	{
		if($gubun) $mWhere .= " && (gubun='$gubun')";
	}
	
	if($s_cd) $mWhere .= " && s_cd='$s_cd'";

	$sql	= "SELECT idx,gubun,title,eTime,from_unixtime(edu_sdate,'%m') as smon,from_unixtime(edu_sdate,'%d') as sday,from_unixtime(edu_edate,'%m') as emon,";
	$sql .= " from_unixtime(edu_edate,'%d') as eday FROM ddm_edu_main";
	
	// 저작권 관련 요청사항으로 사용자페이지에서는 2018년 이후글만 보이도록 수정 - 2019-02-22 박재현
	if($_SESSION['masterSession']){
		$sql .= $mWhere;
	} else {
		$sql .= $mWhere;//."and from_unixtime(edu_sdate, '%Y') >= '2018'";
	}
	$sql .= " ORDER BY edu_sdate asc";

	if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
		//echo $sql;
    }

	$result = @mysql_query($sql);
	while($rs=@mysql_fetch_array($result)){
		$mArrDay = $mStartDay + $rs['sday'] -1;
		$arrSCH[$mArrDay]['gubun'][] = $rs['gubun'];
		$arrSCH[$mArrDay]['title'][] = $rs['title'];
		$arrSCH[$mArrDay]['eTime'][] = $rs['eTime'];
		$arrSCH[$mArrDay]['idx'][] = $rs['idx'];      //2010-8-10 수정
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
				<h2><img src="../images/icon/study2.gif"><?=end($_tit)?></h2>
			</div>
			<div id="content">

				<div class="__tab5">
					<a href="<?=DIR?>/study/care.php"><span>보육지원</span></a>
					<a href="<?=DIR?>/study/raise.php" class="active"><span>양육지원</span></a>
				</div>

부모,영유아를 위한 교육 및 행사를 신청하실 수 있습니다.

				<div class="__tab __mt10">
					<a href="raise.php" class="active"><span>답십리점</span></a>
					<a href="raise_2.php"><span>제기점</span></a>
					<a href="../care/association.php" target="_blank"><span>꿈자람공동육아방</span></a>
				</div>


				<div class="tac __mb30">
					<div class="__scheHead">
							<strong><?=$mYear?>년 <?=$mMonth?>월</strong>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mPrevMonth?>&mode=<?=$mode?>';" class="prev"><i class="axi axi-angle-left"></i></a>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mNextMonth?>&mode=<?=$mode?>'" class="next"><i class="axi axi-angle-right"></i></a>
					</div>
					<div style="float:right">
					<br />
								<form method="post" action="<?=$PHP_SELF?>">
									<input type="hidden" name="pno" value="<?=$pno?>">
									<input type="hidden" name="toYear" value="<?=$toYear?>">
									<input type="hidden" name="toMonth" value="<?=$toMonth?>">
									<? if(substr($pno,0,6) != "020601") { ?>
									<select name="gubun" class="__inp" onChange="this.form.submit();">
										<option value="">+ 전체 +</option>
										<!--option value="보육시설관련" <?if($gubun=="보육시설관련"){echo"selected";}?>>보육시설관련</option-->
										<!--option value="지역사회 연계프로그램" <?if($gubun=="지역사회 연계프로그램"){echo"selected";}?>>지역사회 연계프로그램</option-->
										<option value="부모관련" <?if($gubun=="부모관련"){echo"selected";}?>>부모관련</option>
										<option value="우리아이 쑥쑥" <?if($gubun=="우리아이 쑥쑥"){echo"selected";}?>>우리아이 쑥쑥</option>
										<option value="영유아프로그램" <?if($gubun=="영유아프로그램"){echo"selected";}?>>영유아프로그램</option>
									</select>
									<? } ?>
								</form>
					</div>
				</div>

				<div class="__scheTblWrap">
					<table class="__scheTbl03">
						<caption>달력</caption>
						<thead>
							<tr>
								<th scope="col" class="sun">일</th>
								<th scope="col">월</th>
								<th scope="col">화</th>
								<th scope="col">수</th>
								<th scope="col">목</th>
								<th scope="col">금</th>
								<th scope="col" class="sat">토</th>
							</tr>
						</thead>
							<?
								$mDays=0;
								for($mRows = 0;$mRows < $mSetRows;$mRows++){
									echo "<TR>";
									for($mCols = 1;$mCols < 8;$mCols++){
										DispCell($mDays,$mYear,$mMonth,$arrSCH[$mDays],$pno,$sitem,$skey,$page);    // 수정 2010-08-22
										$mDays++;
									}
									echo "</TR>";
								}
							?>
					</table>
<?
    function DispCell($mCellIdx,$mYear,$mMonth,$mSCH, $pno, $sitem, $skey, $mPage){  //수정 2010-08-10
		
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

        for($i=0;$i<sizeof($mSCH['gubun']);$i++){           //수정 2010-08-10
			if($mSCH['gubun'][$i]=="보육시설관련") $tmpIcon = "/images/common/sche_icon03.gif";
			if($mSCH['gubun'][$i]=="지역사회 연계프로그램") $tmpIcon = "/images/sub07/icon2.gif";
			if($mSCH['gubun'][$i]=="우리아이 쑥쑥") $tmpIcon = "/images/sub07/icon4.gif";

			if($mSCH['gubun'][$i]=="부모관련") $tmpIcon = "/images/common/sche_icon01.gif";
			if($mSCH['gubun'][$i]=="영유아프로그램") $tmpIcon = "/images/common/sche_icon02.gif";
			if($mSCH['gubun'][$i]=="보육교직원교육") $tmpIcon = "/images/common/sche_icon03.gif";

			if($_SESSION['masterSession']){
				$temp_index = 'admin_index.php';
			}
			else
			{
				$temp_index = 'index.php';
			}

//			$tmpEdu = " <A href= /html/sub/".$temp_index."?pno=".$pno."&mode=view&idx=".$mSCH['idx'][$i]."&toYear=".$mYear."&toMonth=".$mMonth."&sitem=".$sitem."&skey=".$skey."&page=".$mPage."><IMG src='".$tmpIcon."' onMouseMove='msgposit_list();' onMouseOver=\"msgset_list('".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."','".$mSCH['eTime'][$i]."');\" onMouseOut='msghide_list();'>";

			$tmpEdu = " <A href=raise_view.php?pno=".$pno."&mode=view&idx=".$mSCH['idx'][$i]."&toYear=".$mYear."&toMonth=".$mMonth."&sitem=".$sitem."&skey=".$skey."&page=".$mPage." class='flt'>";

			if($mSCH['gubun'][$i]=="보육시설관련") $mEdu['1'] .= $tmpEdu."<span class='cir violet'>시</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			if($mSCH['gubun'][$i]=="지역사회 연계프로그램") $mEdu['2'] .= $tmpEdu."<span class='cir blue'>지</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			if($mSCH['gubun'][$i]=="부모관련") $mEdu['3'] .= $tmpEdu."<span class='cir red'>부</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			if($mSCH['gubun'][$i]=="우리아이 쑥쑥") $mEdu['4'] .= $tmpEdu."<span class='cir green'>쑥</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			if($mSCH['gubun'][$i]=="영유아프로그램") $mEdu['5'] .= $tmpEdu."<span class='cir orange'>영</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
			if($mSCH['gubun'][$i]=="보육교직원교육") $mEdu['6'] .= $tmpEdu."<span class='cir violet'>보</span>
												<div class='ov'><div class='in'><div class='suj'>".addslashes(htmlspecialchars($mSCH['title'][$i], NULL, 'ISO-8859-1'))."</div><p class='time'>".$mSCH['eTime'][$i]."</p>
												</div>
											</div>
										</a>";
        }

		$wdate = $mYear."-".codeNumber($mMonth)."-".codeNumber($mSCH['day']);
		//echo $mSCH['day']>0?$wdate:"";
		$query	= "SELECT ho_name FROM ona_holiday WHERE ( ( c_cd='00' ) || ( c_cd='".$c_cd."' && s_cd='".$s_cd."') ) && ho_date='".$wdate."'";
		$result	= mysql_query($query);
		$row	 	= mysql_fetch_array($result);

//		echo $query;
//		var_dump($row[ho_name]);
?>
<td class="<?=$dayClass?>">

									<span class="num"><?=$mSCH['day']?></span>
						<?
							if($row[ho_name]){
//								echo '<strong class="dateName">'.$row[ho_name].'</strong>';
							}
						?>
									<div class="cont tal">
										<?=$mEdu['1'].$mEdu['2'].$mEdu['3'].$mEdu['4'].$mEdu['5'].$mEdu['6']?>
									</div>
</td>
<?
    }
?>
				</div>

			<FORM name="viewForm" method="get" action="<?=$_SERVER['PHP_SELF']?>">
				<input type="hidden" name="pno" value="<?=$pno?>">
				<input type="hidden" name="page" value="<?=$page?>">
				<input type="hidden" name="toYear" value="<?=$mYear?>">
				<input type="hidden" name="toMonth" value="<?=$mMonth?>">
				<input type="hidden" name="gubun" value="<?=$gubun?>">
				<div class="__topArea __mt50">
					<div class="rig">
						<div class="__search">
							<select name="sitem">
								<OPTION value="title" <?if($sitem == "title")echo "selected"?>>제목</OPTION>
								<OPTION value="content" <?if($sitem == "content")echo "selected"?>>내용</OPTION>
							</select>
							<input type="text" name="skey" value="<?=$skey?>">
							<button type="submit"><i class="axi axi-search"></i></button>
						</div>
					</div>
				</div>
			</FORM>

				<table class="__tblList respond2">
					<caption>TABLE</caption>
					<colgroup>
						<col style="width:150px;">
						<col style="width:220px;">
						<col style="width:200px;">
						<col>
						<col style="width:220px;">
						<col style="width:100px;">
					</colgroup>
					<thead>
						<tr>
							<th scope="col" class="__p">구분</th>
							<th scope="col">교육일정</th>
							<th scope="col">접수기간</th>
							<th scope="col">교육 및 행사명</th>
							<th scope="col">신청/정원</th>
							<th scope="col" class="__p">상태</th>
						</tr>
					</thead>
					<tbody>
<?
    $num_per_page = 20;
    $list_page = 10;
    $url = $PHP_SELF."?pno=$pno&toYear=$mYear&toMonth=$mMonth&sitem=$sitem&skey=$skey";

    $mPage = $page;
    if(!$mPage){
        $mPage = 1;
        $first = 0;
    }else{
        $first = ($mPage-1) * $num_per_page;
    }
	
	// 저작권 관련 요청사항으로 사용자페이지에서는 2018년 이후글만 보이도록 수정 - 2019-02-22 박재현
	if($_SESSION['masterSession']){
		$sql = "select count(*) from ddm_edu_main" .$mWhere;
	} else {
		$sql = "select count(*) from ddm_edu_main" .$mWhere."and from_unixtime(edu_sdate,'%Y')>='2018'";
	}

    $result = mysql_query($sql);
    $total_count = @mysql_result($result,0,0);
    $page_count = ceil($total_record/$num_per_page);


    if ($total_count>0){

		$sql = "select * from ddm_edu_main" .$mWhere;
		$sql .= " order by edu_edate ";
		//$sql .= " order by idx desc "; 원래는 idx 순서 정렬이었으나, 요청에 의해 edu_edata 순서로 정렬
		$sql .= " limit $first,$num_per_page";
		
		if($_SERVER['REMOTE_ADDR']=='112.218.172.44') {
			//echo $sql;
		}

        $result = mysql_query($sql);
        $mCnt = 0;
		$no = $total_count - ($mPage * $num_per_page - $num_per_page);

		// for paging
		$TOTAL = $total_count;
		$req['pagenumber'] = $mPage;
		$page_limit   = 20;
		$page_block  = 5;

		while($rs = mysql_fetch_array($result)){

			$edu_sdate = date("Y-m-d",$rs['edu_sdate']);
			$edu_edate = date("Y-m-d",$rs['edu_edate']);

			$mEduDate = $edu_sdate;
			if($edu_sdate != $edu_edate) $mEduDate .= " ~ ".$edu_edate;

			$sql = "select ifnull(count(*),0) from ddm_edu_memlist where edu_idx=" . $rs['idx'];
			$mReqInwon = @mysql_result(mysql_query($sql),0,0);
			if(!$mReqInwon) $mReqInwon = 0;	
			if($_SESSION['masterSession']){
				$temp_index = 'admin_index.php';
			}
			else
			{
				$temp_index = 'index.php';
			}
			$temp_gubun='';
			switch($rs['s_cd'])
			{
				case '00':
					if($rs['gubun'] == '보육시설관련') 
					{
						$temp_gubun = '<span class="text11_violet bold">보육교직원교육</span>';
					}
					else
					{
						$temp_gubun = '<span class="text11_violet bold">'.$rs['gubun'].'</span>';
					}
					break;
				case '01':
					if($rs['gubun']=='부모관련'){
						$temp_gubun = '<span class="text11_pink bold">'.$rs['gubun'].'</span>';
					}
					else if($rs['gubun']=='영유아프로그램'){
						$temp_gubun = '<span class="text11_green bold">'.$rs['gubun'].'</span>';
					}
					else if($rs['gubun']=='우리아이 쑥쑥'){
						$temp_gubun = '<span class="text11_blue bold">'.$rs['gubun'].'</span>';
					}
					break;
				case '02':
					if($rs['gubun']=='부모관련'){
						$temp_gubun = '<span class="text11_pink bold">'.$rs['gubun'].'</span>';
					}
					else if($rs['gubun']=='영유아프로그램'){
						$temp_gubun = '<span class="text11_green bold">'.$rs['gubun'].'</span>';
					}
					else if($rs['gubun']=='우리아이 쑥쑥'){
						$temp_gubun = '<span class="text11_blue bold">'.$rs['gubun'].'</span>';
					}
					break;
				default:
					$temp_gubun = $rs['gubun'];
					break;
			}

			if(trim($temp_gubun) == '')
			{
				$temp_gubun = $rs['gubun'];
			}

			/* 신청자 인원카운팅 */
			$appInwon = 0;
			/* 대기자 인원카운팅 */
			$app2Inwon = 0;

			$idx = $rs[idx];
			// 대기신청인원없을시 취소자인원은 제외
			if($rs[winwon] > 0){
				$del_yn = "";
			}else{
				$del_yn = "and del_yn='N'";
			}

			$query = "select * from ddm_edu_app where parent_idx = '$idx' and status1=1 $del_yn";
			$query2 = "select * from ddm_edu_app where parent_idx = '$idx' and status1=3 $del_yn";
			$applist = sqlArray($query);
			if($applist){
				foreach($applist as $k => $app){
					if($app[addInwon])	$appInwon += $app[addInwon]; // 추가인원
					if($app[applyStatus] != 'N'){
						$appInwon++;	// 본인
					}	
					if($app[child]){
						$child		 = split('\|', $app[child]);
						$child_count = sizeof($child);
						$child_count = $child_count - 1;
						$all_child_count += $child_count;

						$app_type = 1; // 예전 데이터는 child 에 넣어놓는데.. 이거 한줄씩 넣도록 바꿨고, 기존 데이터는 그대로 보여지게 구분할 변수 추가..
					}
				}
			}

			$applist2 = sqlArray($query2);
			if($applist2){
				foreach($applist2 as $k => $app2){
					if($app2[addInwon])	$app2Inwon += $app2[addInwon]; // 추가인원
					if($app2[applyStatus] != 'N'){
						$app2Inwon++;	// 본인
					}	
				}
			}

			// 상태
			$status = "<span style='color:blue'>".$rs[status]."</span>";
			$inwon = $rs[inwon];
			$s_datetime = date("YmdH",$rs[req_sdate]);
			$e_datetime = date("YmdH",$rs[req_edate]);
			$todaytime = date("YmdH");
			$todaytime02 = date("Y-m-d H");


			if($todaytime < $s_datetime) $status = "<span style='color:green'>예정</span>";


//			if($appInwon >= $inwon || $todaytime > $e_datetime) $status = "<span style='color:grey'>마감</span>";
			$winwon = $rs[winwon];	// 대기인원
			if($winwon > 0){	// 대기인원 설정이 있는 경우
//fix. 220628 if($appInwon >= $inwon && $appInwon < ($inwon+$winwon))
				if($app2Inwon > 0 && $appInwon < ($inwon+$winwon)){
					$status = "<span style='color:blue'>대기</span>";
				} 
//fix. 220608 if($appInwon >= ($inwon+$winwon))
				elseif($appInwon >= ($inwon+$winwon) || $app2Inwon >= $winwon){
					$status = "<span style='color:grey'>마감</span>";
				}

			} else{
				if($appInwon >= $inwon) $status = "<span style='color:grey'>마감</span>";
			}
			if($todaytime > $e_datetime) $status = "<span style='color:grey'>마감</span>";


			if($todaytime02 > $edu_edate) $status = "<span style='color:red'>종료</span>";
?>
						<tr>
							<td class="__p"><?=$rs['gubun']?></td>
							<td><?=$mEduDate?></td>
							<td><?=date("Y-n-d H:00",$rs[req_sdate])."<br /> ~ ".date("Y-n-d H:00",$rs[req_edate])?></td>
							<td class="subject"><A href="raise_view.php?pno=<?=$pno?>&mode=view&idx=<?=$rs[idx]?>&toYear=<?=$mYear?>&toMonth=<?=$mMonth?>&sitem=<?=$sitem?>&skey=<?=$skey?>&page=<?=$mPage?>"><?=$rs[title]?></A></td>
							<td><?=number_format($appInwon)?> / <?=number_format($inwon)?></td>
							<td class="__p"><?=$status ?></td>
						</tr>
<?
			$no = $no-1;
		}
	}
?>
<!--
						<tr>
							<td class="__p">2020-10-06</td>
							<td>2020-10-06 ~ 2020-10-06</td>
							<td class="subject"><a href="./raise_view.html">[배봉산점] 꿈자람 공동육아방 - 1회차(10:00~11:30)</a></td>
							<td>320 / 120</td>
							<td class="__p"></td>
						</tr>
-->
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