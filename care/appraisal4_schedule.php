<?
//error_reporting(E_ALL);
//ini_set("display_errors", 1);


$pno = "020304";
$mode = "list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,1,4);
$_tit = array('보육지원','평가제','컨설팅 사업');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	
	if(!$_SESSION[member_id]){
		?>
			<script>
			alert('로그인 후 신청할 수 있습니다.');
		    location.href="/new/member/login.php?ret_url=<?=urlencode($ret_url)?>";
		    //history.back();
			</script>
		<?
	}
	//if($_SESSION[member_level] != '기관' && $_SESSION[member_id]!='dietitian'){
		?>
			<script>
			//alert('기관회원만 신청할 수 있습니다.');
		    //location.href="/html/sub/index.php?pno=020304";
		    //history.back();
			</script>
		<?
	//}

	$c_cd = $INFO[c_cd];
	$s_cd = $INFO[s_cd];

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
	/*$mPrevYear=$mYear-1;
	$mPrevMonth=($mMonth==1)?12:sprintf("%02d",($mMonth-1));
	$mNextYear=$mYear+1;
	$mNextMonth=( $mMonth == 12 )? 1 : sprintf("%02d",($mMonth + 1));*/

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
		$mDays++;
	}

	for($schDay = 1; $schDay <= $mLastDay; $schDay ++) {
		$arrSCH[$mDays]['day'] = $schDay;	
		$mDays++;
	}

	// 출력행 계산
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
				<h2>평가제</h2>
			</div>
			<div id="content">
<div class="__tab3">
					<a href="<?=DIR?>/care/appraisal.php"><span>평가제 안내</span></a>
					<a href="<?=DIR?>/care/appraisal2.php"><span>평가제 운영체계</span></a>
					<a href="<?=DIR?>/care/appraisal3.php"><span>관련자료실</span></a>
					<a href="<?=DIR?>/care/appraisal4.php" class="active"><span>컨설팅 사업</span></a>
				</div>
				<div class="__topArea">
					<div class="lef">
						<div class="__scheHead">
							<strong><?=$mYear?>년 <?=$mMonth?>월</strong>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mPrevMonth?>&mode=<?=$mode?>';" class="prev"><i class="axi axi-angle-left"></i></a>
							<a href="javascript:location.href='<?=$_SERVER['PHP_SELF']?>?pno=<?=$pno?>&toYear=<?=$mYear?>&toMonth=<?=$mNextMonth?>&mode=<?=$mode?>'" class="next"><i class="axi axi-angle-right"></i></a>
						</div>
					</div>
					<div class="rig">
						<div class="__txt14">※ 해당 날짜를 클릭하시면 현장 방문 컨설팅을 신청하실 수 있습니다.</div>
					</div>
				</div>

				<div class="__scheTblWrap">

						<!----달력(s)--->
						<table class="__scheTbl">
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
										DispCell($mDays,$mYear,$mMonth,$arrSCH[$mDays]);
										$mDays++;
									}
									echo "</TR>";
								}
							?>							
						</table>
						<!----달력(e)--->
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

		// 휴관일
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
								
								// 신청기간 설정 신청일 - 1일 신청불가
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
									if($row[state]=="가능") $fontStype = "font_orenge1";
									if($row[state]=="마감" || !$YN ) $fontStype = "font_green1";									
									$state = $row[state];
									if($row[state]=="마감" || !$YN ){
										echo "<a href=\"javascript:;\" onClick=\"alert('마감 되었습니다.');\" class=\"btn gray\">";
										$state = "마감";
									}else{
										if($_SESSION[member_id]){
											// 중복신청 체크
											
											if($appRow[0]==0){
												echo "<a href=\"appraisal4_write.php?pno=".$pno."&mode=write&toYear=".$mYear."&toMonth=".codeNumber($mMonth)."&idx=".codeNumber($row['idx'])."\" class=\"btn red\">";
											}else{
												echo "<a href=\"javascript:;\" onClick=\"alert('이미 신청하신회원이 있습니다.');\" class=\"btn gray\">";
												$state="마감";
											}
										}else{
											echo "<a href=\"javascript:;\" onClick=\"alert('회원만 신청할 수 있습니다.');location.href('/new/member/login.php?pno=050101&ret_url=".urlencode($_SERVER['REQUEST_URI'])."');\" class=\"btn red\">";
										}										
									}

// fix.									if($appRow[0] > 0){ $state = "마감";  $fontStype = "gray";}
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