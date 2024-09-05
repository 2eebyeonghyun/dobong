<meta charset="euc-kr">
<?
    include "../../include/global/config.php";

	$regdate = time();
	$mbTel = $_POST[mbTel1]."-".$_POST[mbTel2]."-".$_POST[mbTel3];
	$mbTime = $_POST[useTime1]."-".$_POST[useTime2];

	//$mbEmail = $_POST[mbEmail1]."@".$_POST[mbEmail2];

	
	// insert 하기 전에 인원 찼는지 다시 확인

	// 해당일의 신청자

	if($type == 'mod')
	{
		$use_count = sqlArrayOne("select count(*) from ddm_usecenter_app3 where left(wdate,10) = '".$use_date."' and time = '".$time."' and userid !='".$mbId."' and scd ='".$scd."'");
		if($use_count[0] > 0)
		{
			?>
			<script>
			alert('신청이 마감되었습니다. 신청 절차 도중에 다른 시설에서 같은 시간에 신청하셨습니다.');
			location.href= '../care/association_schedule2.php?pno=020207&mode=list4&scd=02';
			</script>
		 <?
		}
		else
		{
			$query = "UPDATE ddm_usecenter_app3 set 
									ins_name = '$sisulName'
									, use_object = '$use_object'
									, tel = HEX(AES_ENCRYPT('$mbTel','DM'))
									, usercnt = '$user_count'
									, beam_project = '$beam'
									, outside_business = '$out_business'
									, time = '$time'
									, usetime = '$mbTime'
									, memo = '$etc_memo' 
									where idx='$idx'";
			mysql_query($query);
			
			?>
              <script language="javascript">
	          alert('수정되었습니다.');
			  location.href = '../mypage/borrow2_assoc.php';
              </script>		
		   <?
		}
	}

	else
	{
	$use_count =  sqlArrayOne("select count(*) from ddm_usecenter_app3 where left(wdate,10) = '".$use_date."' and scd ='".$scd."'");
	$time_check = sqlArrayOne("select time from ddm_usecenter_app3 where left(wdate,10) = '".$use_date."' and scd ='".$scd."'");

	if($use_count[0] > 1){
		?>
		<script>
		alert('신청이 마감되었습니다. 신청 절차 도중에 다른 시설에서 신청하셨습니다.');
		location.href= '../care/association_schedule2.php?pno=020207&mode=list4&scd=02';
		</script>
		<?	
	}
	else
	{
		if($time_check[0] == $time) {
		?>
		    <script>
		alert('신청이 마감되었습니다. 신청 절차 도중에 다른 시설에서 같은 시간에 신청하셨습니다.');
		location.href= '../care/association_schedule2.php?pno=020207&mode=list4&scd=02';
		</script>
		<? exit; } else {
		$query = "INSERT INTO ddm_usecenter_app3 (
							userid, name, ins_name, use_object, 
							tel, 
							wdate, usercnt, regdate, beam_project, outside_business, time, usetime, memo, scd
						) VALUES ( 
							'$mbId', '$mbName', '$sisulName', '$use_object', 
							HEX(AES_ENCRYPT('$mbTel','DM')),
							'$use_date', '$user_count', now(), '$beam', '$out_business', '$time', '$mbTime', '$etc_memo', '$scd'
						)";
		mysql_query($query);
		//echo $query;
		}
?>

<script language="javascript">
	alert('신청되었습니다.');
	location.href = '../mypage/borrow2_assoc.php';
</script>		

		<?
	}
	}
?>
