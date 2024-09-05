<?
$pno = "020207";
$mode="list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,7);
$_tit = array('보육지원','대관신청');
include_once '../inc/pub.config.php';
include_once PATH.'/inc/common.php';
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
//답십리
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
			$mbCpName = '개인';
	    }
		else
	    {
			$mbCpName = $mbRow[cpName];
		}
	} else{
		?>
			<script>
			alert('로그인 후 신청할 수 있습니다.');
		    location.href="/new/member/login.php?ret_url=<?=urlencode($ret_url)?>";
			</script>
		<?
		exit;
	}
	//if($_SESSION[member_level] != '기관' && $_SESSION[member_id]!='dietitian'){
		?>
			<script>
			//alert('기관회원만 신청할 수 있습니다.');
		    //location.href="/html/sub/index.php?pno=020703";
		    //history.back();
			</script>
		<?


   if($type == 'mod')
   {
	   $listQuery		= "SELECT * FROM ddm_usecenter_app WHERE idx='".$idx."' ORDER BY idx DESC";
	   $listResult		= mysql_query($listQuery);
	   $mod_row         = mysql_fetch_array($listResult);

		//권한 체크
		if($_SESSION['member_id'] != $mod_row['userid']){
				echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
				exit;
		}

	   $time_check = sqlArrayone("select time from ddm_usecenter_app where wdate='".$mod_row['wdate']."' and userid != '".$mod_row['userid']."'" );
	   $use_date = $mod_row['wdate'];
	   $idx = $mod_row['idx'];
	   $mod_usercnt = $mod_row['usercnt'];
	   $mod_useobj = $mod_row['use_object'];
	   $mod_time = $mod_row['time'];
	   $useTime    = explode("-",$mod_row[usetime]);
	   $mod_memo = $mod_row['memo'];
	   $mod_cpname = $mod_row['ins_name'];
       
       
      /* if($mod_row['beam_project'] == 'Y')
	   {		   
		   $beam_chk = 'checked';
	   }*/
       

	   if($mod_row['beam_project'] == 'Y')
	   {		   
		   $beam_y = 'checked';
	   }else
       {
           $beam_n = 'checked';
       }
   
       
//	   if($mod_row['notebook'] == 'Y')
//	   {
//		   $note_chk = 'checked';
//	   }
       
	   if($mod_row['outside_business'] == 'Y')
	   {
		   $out_y = 'checked';
	   }else
	    {
		    $out_n = 'checked';
        }      
       
       
	}else
	{
		 $time_check = sqlArrayone("select time from ddm_usecenter_app where wdate='".$use_date."'");
		$out_n = 'checked';
       $beam_n = 'checked';
        
	}
?>
<?include_once PATH.'/inc/board_config.php';?>
<?
	
	$cyear = $cyear?$cyear:date("Y");
    $cmonth = $cmonth!=""?$cmonth:date("m");

    $usecount = sqlArrayOne("select count(*) from ddm_usecenter where left(wdate,7) = '$cyear-$cmonth'");
	

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
		$mDays++;
	}

	for($schDay = 1; $schDay <= $mLastDay; $schDay ++) {
		$arrSCH[$mDays]['day'] = $schDay;	
		$mDays++;
	}

	// 출력행 계산
	$mSetRows = ceil(($mDays) / 7 );
?>
<script language="javascript" src="../../include/js/choice.js"></script>
<script type="text/JavaScript">
<!--
	function input_check(f){
		var check_value = getChecked();

		if(confirm('등록 하시겠습니까?')){
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
			$("#time").text("오전");
		} else if(time==2){
			$("#time").text("오후");
		}

		fadeIn('.__popBasic.popApp');
	}

//-->
</script>
<script language="javascript">
function appCheck(f)
	{	
		if(document.frm.sisulName.value == '')
		{
			alert('시설명을 넣으세요');
			document.frm.sisulName.focus();
			return false;
		}
		if(document.frm.mbTel1.value == '')
		{
			alert('연락처를 넣으세요');
			document.frm.mbTel1.focus();
			return false;
		}
		if(document.frm.mbTel2.value == '')
		{
			alert('연락처를 넣으세요');
			document.frm.mbTel2.focus();
			return false;
		}
		if(document.frm.mbTel3.value == '')
		{
			alert('연락처를 넣으세요');
			document.frm.mbTel3.focus();
			return false;
		}
		if(document.frm.useTime1.value == '')
		{
			alert('이용시간을 넣으세요');
			document.frm.useTime1.focus();
			return false;
		}
		if(document.frm.useTime2.value == '')
		{
			alert('이용시간을 넣으세요');
			document.frm.useTime2.focus();
			return false;
		}
		if(document.frm.user_count.value == '')
		{
			alert('이용인원을 넣으세요');
			document.frm.user_count.focus();
			return false;
		}
		if(document.frm.use_object.value == '')
		{
			alert('이용목적을 넣으세요');
			document.frm.use_object.focus();
			return false;
		}

		if(!document.frm.agree01.checked || !document.frm.agree02.checked || !document.frm.agree03.checked || !document.frm.agree04.checked)
		{
			alert('감염병 예방 단계적 거리두기에 따른 준수사항에 모두 동의(체크)하셔야 합니다.');
			document.frm.agree01.focus();
			return false;
		}
		
		
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
				<h2>대관신청</h2>
			</div>
			<div id="content">

<div class="__tab3">
					<a href="<?=DIR?>/care/borrow.php" class="active"><span>답십리점 대관 신청하기</span></a>
					<a href="<?=DIR?>/care/borrow.php"><span>제기점 대관 신청하기</span></a>
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
<!--						<div class="__txt14">※ 대관신청시 참고하세요. (오전:10:00~12:00 / 오후: 12:00~18:00)</div>-->
<!--                        <div class="__txt14">※ 대관신청시 참고하세요. (오전:09:30~11:30 / 오후: 13:30~17:00)</div>-->
                <div class="__txt14">
<!--                (오전:09:30~11:30 / 오후: 13:30~17:00)-->
                
                    <ul class="dang __orange __txt15 __mt20">
                        <li>※ 센터 행사 및 사정에 따라 대관일과 시간은 제한 될 수 있습니다.</li>
                        <li>※ 오전과 오후 연이어 대관을 원하시는 경우 오전/오후 모두 대관 신청을 합니다. </li>
                        <li>※ 토요일은 유선으로만 문의 및 대관 신청 가능합니다. </li>
                    </ul>
                    </div>
					</div>
				</div>

				<div class="__scheTblWrap">

									<form name="listForm" method="post" onsubmit="return input_check(this);">
										<input type="hidden" name="choiceValue">
										<input type="hidden" name="mode">
										<input type="hidden" name="toYear" value="<?=$mYear?>">
										<input type="hidden" name="toMonth" value="<?=$mMonth?>">

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
<?
    function DispCell($mCellIdx,$mYear,$mMonth,$mSCH){

		global $pno, $c_cd, $s_cd;

        if($mSCH['day'] == "&nbsp"){
            $mCellColor = 1;
        }else{
            $mWeek =  date( "w", mktime( 0, 0, 0, $mMonth, $mSCH['day'], $mYear));
            $dayClass = "normal";
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

		// fix. 신청 가능 기간 체크
	   $temp_today = date("Y-m-d");
	   $temp_sdate = date("Y-m-d",strtotime ("-3 day $wdate"));
	   $temp_edate = date("Y-m-d",strtotime ("-30 day $wdate"));
   
		$wdate_chk = true;
	   if(($temp_today > $temp_sdate) || ($temp_today < $temp_edate) )
       {
		   $wdate_chk = false;
       }
?>
					<td>
<? if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
	echo $temp_sdate."<br />";
	echo $temp_edate."<br />";
	var_dump($wdate_chk);
} ?>
									<span class="num"><?=$mSCH['day']?></span>
									<strong class="dateName"><?=$row[ho_name]?></strong>
									<div class="cont">
					<? if($mSCH['day'] != "" && ($dayClass == "normal") && $row[ho_name] == '' ) 
						{
						if(($wdate <= date("Y-m-d") && $reg_count[0] == 0) ||( $wdate <= date("Y-m-d") && $my_count[0] == 0)) { ?>
						 <a href="#none" class="btn gray">오전 불가</a>
					 <? } else if($my_count[0] > 0) 
				       { ?> <a href="#none" class="btn green">오전 대관완료</a>
					<? }else if($use_count[0] > 0 && $reg_count[0] < 1)
	                    { ?>
								<? if($wdate_chk){ ?>
									<a href="javascript:go_write('<?=$wdate?>',1);" class="btn red">오전 가능</a>
								<? } else{ ?>
									<a href="javascript:alert('신청기간이 아닙니다.');" class="btn red">오전 가능</a>
								<? } ?>

					<? }else if($use_count[0] <= 0 || $reg_count[0] > 0) 
						{ ?> <a href="#none" class="btn gray">오전 불가</a>
                    
					<? } }  ?>
					
					<? if($mSCH['day'] != "" && ($dayClass == "normal") && $row[ho_name] == '' ) 
						{
						if(($wdate <= date("Y-m-d") && $reg_count2[0] == 0) ||( $wdate <= date("Y-m-d") && $my_count2[0] == 0)) { ?>
						 <a href="#none" class="btn gray">오후 불가</a>
					 <? } else if($my_count2[0] > 0) 
				       { ?> <a href="#none" class="btn green">오후 대관완료</a>
					<? }else if($use_count2[0] > 0 && $reg_count2[0] < 1)
	                    { ?>								
								<? if($wdate_chk){ ?>
									<a href="javascript:go_write('<?=$wdate?>',2);" class="btn red">오후 가능</a>
								<? } else{ ?>
									<a href="javascript:alert('신청기간이 아닙니다.');" class="btn red">오후 가능</a>
								<? } ?>

					<? }else if($use_count2[0] <= 0 || $reg_count2[0] > 0) 
						{ ?> <a href="#none" class="btn gray">오후 불가</a>
                    
					<? } }  ?>
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


<div class="__popBasic popApp">
	<div class="inner">
		<div class="title">
			<h3>답십리점 대관 신청하기</h3>
			<button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
		</div>
		<div class="desc">
			<div class="__provisionHead type2">
				<h3>유의사항</h3>
				<div class="__txt15 __mt10">
					이용 신청 내용 및 일정변경 및 대관 취소 시 담당자에게 연락바랍니다.
					<br />이용 신청완료 내용은 마이페이지에서 확인 가능합니다.
				</div>
			</div>

	<form name="frm" method="post" action="020207_proc.php" onSubmit="return appCheck(this);" >
		<input type="hidden" name="mbId" value="<?=$_SESSION[member_id]?>">
		<input type="hidden" name="mbName" value="<?=$mbRow[name]?>">
		<input type="hidden" name="use_date" value="<?=$use_date?>">
		<input type="hidden" name="time" value="<?=$time?>">
		<input type="hidden" name="idx" value="<?=$idx?>">
		<input type="hidden" name="type" value="<?=$type?>">

			<table class="__tblView respond __mt30">
				<caption>TABLE</caption>
				<colgroup>
					<col style="width:140px;">
					<col>
				</colgroup>
				<tbody>
					<tr>
						<th scope="row">신청자명</th>
						<td>
							<?=$mbRow[name]?>
						</td>
					</tr>
					<?
					  if($type == 'mod')
					  {
						  $temp_cpname = $mod_cpname;
					  }
					  else
					  {
						  $temp_cpname = $mbRow[cpName];
					  }
					?>
					<tr>
						<th scope="row">시설명</th>
						<td>
							<input type="text" class="__inp __m-w100p" style="width:150px;" name="sisulName" value="<?=$temp_cpname?>">
						</td>
					</tr>
					<tr>
						<th scope="row">연락처</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li><input type="text" class="__inp" name="mbTel1" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[0]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[2]?>"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">대관일자</th>
						<td>
							<span id="use_date"><span>
						</td>
					</tr>
					<tr>
						<th scope="row">대관시간</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li>
									<span id="time"><span>
								</li>
								<li class="space"></li>
								<li><input type="text" class="__inp" name="useTime1" maxlength=5 value="<?=$useTime[0]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="useTime2" maxlength=5 value="<?=$useTime[1]?>"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">이용인원</th>
						<td>
							<input type="text" class="__inp __m-w30p" style="width:60px;" name="user_count" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('숫자만 넣어주세요'); this.value = ''; this.focus(); return false; };" value="<?=$mod_usercnt?>"> 명
						</td>
					</tr>
					<tr>
						<th scope="row">이용목적</th>
						<td>
							<input type="text" class="__inp" name="use_object" value="<?=$mod_useobj?>">
						</td>
					</tr>
					<tr>
						<th scope="row">빔프로젝트 사용</th>
						<td>
							<label><input type="radio" name="beam" value="Y" <?=$beam_y?>> 유</label>
							<label><input type="radio" name="beam" value="N" <?=$beam_n?>> 무</label>
						</td>
					</tr>
					<tr>
						<th scope="row">외부업체 방문</th>
						<td>
							<label><input type="radio" name="out_business" value="Y" <?=$out_y?>> 유</label>
							<label><input type="radio" name="out_business" value="N" <?=$out_n?>> 무</label>
						</td>
					</tr>
					<tr>
						<th scope="row">신청일</th>
						<td><?=date("Y-m-d")?></td>
					</tr>
					<tr>
						<th scope="row">기타사항</th>
						<td>
							<textarea name="etc_memo" class="__inp" style="height:80px;"><?=$mod_memo?></textarea>
							<p>※ 감염병 예방에 따른 준수사항(해당 내용 동의 시 네모 박스에 체크)</p><br>
							<label class="checkbtn"><input type="checkbox" name="agree01" id="agree01"> 종이컵 사용 불가로 텀블러 지참</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree02" id="agree02"> 음식 섭취 금지</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree03" id="agree03"> 마스크 착용 필수</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree04" id="agree04"> 전체 인원 준수(방문자, 참석자, 진행자 포함 동시간대 최대 45명)</label><br><br>
							이를 어길 시 모든 방역지침에 대한 책임은 <span>대관 신청자</span>에게 있습니다.
						</td>
					</tr>
				</tbody>
			</table>

			<div class="__botArea">
				<div class="cen">
					<button type="button" class="__btn1 gray" onclick="fadeOut($(this).closest('.__popBasic'));">취소</button> &nbsp;
					<button type="submit" class="__btn1">확인</button>
				</div>
			</div>

	</form>

		</div>
	</div>
	<div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>

</div>

</body>
</html>