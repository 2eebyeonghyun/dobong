<meta charset="euc-kr">
<?
    include "../../include/global/config.php";

	$regdate = time();
	$mbTel = $_POST[mbTel1]."-".$_POST[mbTel2]."-".$_POST[mbTel3];
	$mbTime = $_POST[useTime1]."-".$_POST[useTime2];

	//$mbEmail = $_POST[mbEmail1]."@".$_POST[mbEmail2];

	
	// insert �ϱ� ���� �ο� á���� �ٽ� Ȯ��

	// �ش����� ��û��

	if($type == 'mod')
	{
		$use_count = sqlArrayOne("select count(*) from ddm_usecenter_app2 where left(wdate,10) = '".$use_date."' and time = '".$time."' and userid !='".$mbId."'");
		if($use_count[0] > 0)
		{
			?>
			<script>
			alert('��û�� �����Ǿ����ϴ�. ��û ���� ���߿� �ٸ� �ü����� ���� �ð��� ��û�ϼ̽��ϴ�.');
		    location.href= '../care/borrow_schedule2.php?pno=020207&mode=list3';
			</script>
		 <?
		}
		else
		{
			$query = "UPDATE ddm_usecenter_app2 set 
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
	          alert('�����Ǿ����ϴ�.');
	          location.href = '../mypage/borrow2.php';
              </script>		
		   <?
		}
	}

	else
	{
	$use_count =  sqlArrayOne("select count(*) from ddm_usecenter_app2 where left(wdate,10) = '".$use_date."'");
	$time_check = sqlArrayOne("select time from ddm_usecenter_app2 where left(wdate,10) = '".$use_date."'");

	// ���� ���̵�� �Ѵ޿� 3�� �̻� ��û ����
	$use_date_month = substr($use_date,0,7);
	$use_count_month =  sqlArrayOne("select count(*) from ddm_usecenter_app2 where userid = '".$mbId."' and left(wdate,7) = '".$use_date_month."'");
	if($use_count_month[0] > 2){
		?>
		<script>
		alert('�Ѵ޿� 3�� �̻� ��û�Ͻ� �� �����ϴ�.');
		location.href= '../care/borrow_schedule2.php?pno=020207&mode=list3';
		</script>
		<?
		exit;
	}


	if($use_count[0] > 1){
		?>
		<script>
		alert('��û�� �����Ǿ����ϴ�. ��û ���� ���߿� �ٸ� �ü����� ��û�ϼ̽��ϴ�.');
		location.href= '../care/borrow_schedule2.php?pno=020207&mode=list3';
		</script>
		<?	
	}
	else
	{
		if($time_check[0] == $time) {
		?>
		    <script>
		alert('��û�� �����Ǿ����ϴ�. ��û ���� ���߿� �ٸ� �ü����� ���� �ð��� ��û�ϼ̽��ϴ�.');
		location.href= '../care/borrow_schedule2.php?pno=020207&mode=list3';
		</script>
		<? exit; } else {
		$query = "INSERT INTO ddm_usecenter_app2 (
							userid, name, ins_name, use_object, 
							tel, 
							wdate, usercnt, regdate, beam_project, outside_business, time, usetime, memo
						) VALUES ( 
							'$mbId', '$mbName', '$sisulName', '$use_object', 
							HEX(AES_ENCRYPT('$mbTel','DM')),
							'$use_date', '$user_count', now(), '$beam', '$out_business', '$time', '$mbTime', '$etc_memo'
						)";
		mysql_query($query);
		//echo $query;
		}
?>

<script language="javascript">
	alert('��û�Ǿ����ϴ�.');
	location.href = '../mypage/borrow2.php';
</script>		

		<?
	}
	}
?>
