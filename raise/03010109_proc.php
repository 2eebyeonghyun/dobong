<meta charset="euc-kr">
<?
    include "../../include/global/config.php";

	$type = $_GET['type'];
	$barcode = $_GET['barcode'];
	$sdate = $_GET['sdate'];

	/*
	$arr = get_defined_vars();
        
    foreach ( $arr as $vName => $value )
    {
        echo $vName." : ".$value."<br>";
    }
	*/

	/*
	echo var_dump($_GET);
	echo "<br>";
	echo var_dump($_SESSION);
	*/
	

	if($type == 'app') {
		$appCntQuery = "select count(*) from ona_htable_app where barcode = '".$barcode."' and sdate = '".$sdate."' and delete_yn = 'N' ";
		$app_count = sqlArrayOne($appCntQuery);

//		echo var_dump($app_count);


		if( $app_count[0]>0 ) {
			echo "<script>alert('�̹� ���� �� ��ǰ�Դϴ�.'); history.back();</script>";
			exit;
		} else {
			
			$sdate_exp = explode("-",$sdate);

			$appMemberCntQuery = "select count(*) from ona_htable_app where sdate between '".$sdate_exp[0]."-".$sdate_exp[1]."-01' and '".$sdate_exp[0]."-".$sdate_exp[1]."-31' and delete_yn='N' and userid='".$_SESSION[member_id]."'";
			
			$app_member_count = sqlArrayOne($appMemberCntQuery);
			
			if( $app_member_count[0]>0 ) {
				echo "<script>alert('ȸ���� �� 1ȸ�� ������ ���� �����մϴ�.'); history.back();</script>";
				exit;
			}

			$barcodeInfoQuery = "select * from ona_item_barcode where barcode = '".$barcode."'";
			
			$barcodeInfo = sqlArray($barcodeInfoQuery);
			$barcodeInfo = $barcodeInfo[0];

			$edate = date("Y-m-d", strtotime($sdate." +1 week"));

			$query = "insert ona_htable_app (
								c_cd,
								s_cd,	
								userid,
								barcode,
								itemname,
								sdate,
								edate,
								delete_yn,
								regid,
								regdate
							) values (
								'SC',
								'$barcodeInfo[s_cd]',
								'$_SESSION[member_id]',
								'$barcode',
								'$barcodeInfo[barcodename]',
								'$sdate',
								'$edate',
								'N',
								'$_SESSION[member_id]',
								now()
							) ";

			//echo $query;

			mysql_query($query);
			?>
              <script language="javascript">
				alert('����Ǿ����ϴ�.');
				location.href = '../mypage/table.php';
              </script>		
		   <?
		}
	}

?>

