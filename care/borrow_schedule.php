<?
$pno = "020207";
$mode="list2";

$ret_url = "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>
<?
$_dep = array(2,7);
$_tit = array('��������','�����û');
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


   if($type == 'mod')
   {
	   $listQuery		= "SELECT * FROM ddm_usecenter_app WHERE idx='".$idx."' ORDER BY idx DESC";
	   $listResult		= mysql_query($listQuery);
	   $mod_row         = mysql_fetch_array($listResult);

		//���� üũ
		if($_SESSION['member_id'] != $mod_row['userid']){
				echo "<script>alert('�߸��� �����Դϴ�.');history.back();</script>";
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
function appCheck(f)
	{	
		if(document.frm.sisulName.value == '')
		{
			alert('�ü����� ��������');
			document.frm.sisulName.focus();
			return false;
		}
		if(document.frm.mbTel1.value == '')
		{
			alert('����ó�� ��������');
			document.frm.mbTel1.focus();
			return false;
		}
		if(document.frm.mbTel2.value == '')
		{
			alert('����ó�� ��������');
			document.frm.mbTel2.focus();
			return false;
		}
		if(document.frm.mbTel3.value == '')
		{
			alert('����ó�� ��������');
			document.frm.mbTel3.focus();
			return false;
		}
		if(document.frm.useTime1.value == '')
		{
			alert('�̿�ð��� ��������');
			document.frm.useTime1.focus();
			return false;
		}
		if(document.frm.useTime2.value == '')
		{
			alert('�̿�ð��� ��������');
			document.frm.useTime2.focus();
			return false;
		}
		if(document.frm.user_count.value == '')
		{
			alert('�̿��ο��� ��������');
			document.frm.user_count.focus();
			return false;
		}
		if(document.frm.use_object.value == '')
		{
			alert('�̿������ ��������');
			document.frm.use_object.focus();
			return false;
		}

		if(!document.frm.agree01.checked || !document.frm.agree02.checked || !document.frm.agree03.checked || !document.frm.agree04.checked)
		{
			alert('������ ���� �ܰ��� �Ÿ��α⿡ ���� �ؼ����׿� ��� ����(üũ)�ϼž� �մϴ�.');
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
				<h2>�����û</h2>
			</div>
			<div id="content">

<div class="__tab3">
					<a href="<?=DIR?>/care/borrow.php" class="active"><span>��ʸ��� ��� ��û�ϱ�</span></a>
					<a href="<?=DIR?>/care/borrow.php"><span>������ ��� ��û�ϱ�</span></a>
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
<!--						<div class="__txt14">�� �����û�� �����ϼ���. (����:10:00~12:00 / ����: 12:00~18:00)</div>-->
<!--                        <div class="__txt14">�� �����û�� �����ϼ���. (����:09:30~11:30 / ����: 13:30~17:00)</div>-->
                <div class="__txt14">
<!--                (����:09:30~11:30 / ����: 13:30~17:00)-->
                
                    <ul class="dang __orange __txt15 __mt20">
                        <li>�� ���� ��� �� ������ ���� ����ϰ� �ð��� ���� �� �� �ֽ��ϴ�.</li>
                        <li>�� ������ ���� ���̾� ����� ���Ͻô� ��� ����/���� ��� ��� ��û�� �մϴ�. </li>
                        <li>�� ������� �������θ� ���� �� ��� ��û �����մϴ�. </li>
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

		// fix. ��û ���� �Ⱓ üũ
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
						 <a href="#none" class="btn gray">���� �Ұ�</a>
					 <? } else if($my_count[0] > 0) 
				       { ?> <a href="#none" class="btn green">���� ����Ϸ�</a>
					<? }else if($use_count[0] > 0 && $reg_count[0] < 1)
	                    { ?>
								<? if($wdate_chk){ ?>
									<a href="javascript:go_write('<?=$wdate?>',1);" class="btn red">���� ����</a>
								<? } else{ ?>
									<a href="javascript:alert('��û�Ⱓ�� �ƴմϴ�.');" class="btn red">���� ����</a>
								<? } ?>

					<? }else if($use_count[0] <= 0 || $reg_count[0] > 0) 
						{ ?> <a href="#none" class="btn gray">���� �Ұ�</a>
                    
					<? } }  ?>
					
					<? if($mSCH['day'] != "" && ($dayClass == "normal") && $row[ho_name] == '' ) 
						{
						if(($wdate <= date("Y-m-d") && $reg_count2[0] == 0) ||( $wdate <= date("Y-m-d") && $my_count2[0] == 0)) { ?>
						 <a href="#none" class="btn gray">���� �Ұ�</a>
					 <? } else if($my_count2[0] > 0) 
				       { ?> <a href="#none" class="btn green">���� ����Ϸ�</a>
					<? }else if($use_count2[0] > 0 && $reg_count2[0] < 1)
	                    { ?>								
								<? if($wdate_chk){ ?>
									<a href="javascript:go_write('<?=$wdate?>',2);" class="btn red">���� ����</a>
								<? } else{ ?>
									<a href="javascript:alert('��û�Ⱓ�� �ƴմϴ�.');" class="btn red">���� ����</a>
								<? } ?>

					<? }else if($use_count2[0] <= 0 || $reg_count2[0] > 0) 
						{ ?> <a href="#none" class="btn gray">���� �Ұ�</a>
                    
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
			<h3>��ʸ��� ��� ��û�ϱ�</h3>
			<button type="button" class="close _close" onclick="fadeOut($(this).closest('.__popBasic'));"><i class="axi axi-close"></i></button>
		</div>
		<div class="desc">
			<div class="__provisionHead type2">
				<h3>���ǻ���</h3>
				<div class="__txt15 __mt10">
					�̿� ��û ���� �� �������� �� ��� ��� �� ����ڿ��� �����ٶ��ϴ�.
					<br />�̿� ��û�Ϸ� ������ �������������� Ȯ�� �����մϴ�.
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
						<th scope="row">��û�ڸ�</th>
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
						<th scope="row">�ü���</th>
						<td>
							<input type="text" class="__inp __m-w100p" style="width:150px;" name="sisulName" value="<?=$temp_cpname?>">
						</td>
					</tr>
					<tr>
						<th scope="row">����ó</th>
						<td>
							<ul class="__form __m-w100p" style="width:280px;">
								<li><input type="text" class="__inp" name="mbTel1" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[0]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel2" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[1]?>"></li>
								<li class="dash">-</li>
								<li><input type="text" class="__inp" name="mbTel3" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$exMbTel[2]?>"></li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">�������</th>
						<td>
							<span id="use_date"><span>
						</td>
					</tr>
					<tr>
						<th scope="row">����ð�</th>
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
						<th scope="row">�̿��ο�</th>
						<td>
							<input type="text" class="__inp __m-w30p" style="width:60px;" name="user_count" maxlength=4 onKeyUp="if(this.value.match(/[^0-9]/)) { alert('���ڸ� �־��ּ���'); this.value = ''; this.focus(); return false; };" value="<?=$mod_usercnt?>"> ��
						</td>
					</tr>
					<tr>
						<th scope="row">�̿����</th>
						<td>
							<input type="text" class="__inp" name="use_object" value="<?=$mod_useobj?>">
						</td>
					</tr>
					<tr>
						<th scope="row">��������Ʈ ���</th>
						<td>
							<label><input type="radio" name="beam" value="Y" <?=$beam_y?>> ��</label>
							<label><input type="radio" name="beam" value="N" <?=$beam_n?>> ��</label>
						</td>
					</tr>
					<tr>
						<th scope="row">�ܺξ�ü �湮</th>
						<td>
							<label><input type="radio" name="out_business" value="Y" <?=$out_y?>> ��</label>
							<label><input type="radio" name="out_business" value="N" <?=$out_n?>> ��</label>
						</td>
					</tr>
					<tr>
						<th scope="row">��û��</th>
						<td><?=date("Y-m-d")?></td>
					</tr>
					<tr>
						<th scope="row">��Ÿ����</th>
						<td>
							<textarea name="etc_memo" class="__inp" style="height:80px;"><?=$mod_memo?></textarea>
							<p>�� ������ ���濡 ���� �ؼ�����(�ش� ���� ���� �� �׸� �ڽ��� üũ)</p><br>
							<label class="checkbtn"><input type="checkbox" name="agree01" id="agree01"> ������ ��� �Ұ��� �Һ� ����</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree02" id="agree02"> ���� ���� ����</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree03" id="agree03"> ����ũ ���� �ʼ�</label><br>
							<label class="checkbtn"><input type="checkbox" name="agree04" id="agree04"> ��ü �ο� �ؼ�(�湮��, ������, ������ ���� ���ð��� �ִ� 45��)</label><br><br>
							�̸� ��� �� ��� �濪��ħ�� ���� å���� <span>��� ��û��</span>���� �ֽ��ϴ�.
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

	</form>

		</div>
	</div>
	<div class="bg _close" onclick="fadeOut($(this).closest('.__popBasic'));"></div>

</div>

</body>
</html>