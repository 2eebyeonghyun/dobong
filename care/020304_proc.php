
<meta charset="euc-kr"><?
	include $_SERVER['DOCUMENT_ROOT']."/include/global/config.php";

	$regdate	= time();	
	$send		= $_POST['send'];
	$mbid		= $_POST['mbid'];
	$tel			= $_POST['mbTel1']."-".$_POST['mbTel2']."-".$_POST['mbTel3'];	
//	$post		= $_POST['homezipcode1']."-".$_POST['homezipcode2'];
	$post		= $_POST['homezipcode'];
	$addr1		= $_POST['homeaddress'];
	$addr2		= $_POST['homeaddress2'];
	$kind2		= $_POST['imKind2'];
	$childinfo	= $_POST['imChild'];
	$staffinfo	= $_POST['imStaff'];

	$valuation1 = $_POST['valuation1'];
	$valuation2 = $_POST['valuation2'];
	$valuation3 = $_POST['valuation3'];
	$valuation4 = $_POST['valuation4'];
 
	if($valuation=="미신청"){
		$vNumber	 = "";
		$period		 = "";
	}

	$tvaluation = "";

	if($valuation1 == 'N')
	{
		$tvaluation = $valuation2; 
	}
	else if($valuation1 == 'R')
	{
		$tvaluation = $valuation3; 
	}


	switch($send){
		case "write":
			$query = "INSERT INTO ddm_aid_app(
								pidx, mbId, cpName, cpJang, wdate, kind, 
								tel, 
								post, addr1, addr2, valuation, 
								vNumber, period, kind1, kind2, childinfo, 
								staffinfo, memo, state, regdate, valuation1, valuation2, valuation3
							) VALUES (
								'$pidx', '$mbid', '$jangname', '$cpJang', '$wdate', '$kind', 
								HEX(AES_ENCRYPT('$tel','DM')), 
								'$post', '$addr1', '$addr2', '$valuation', 
								'$vNumber', '$period', '$kind1', '$kind2', '$childinfo', 
								'$staffinfo', '$memo', '신청', '$regdate', '$valuation1', '$tvaluation', '$valuation4'
							)";	
			//echo $query;
			//die;
		
			mysql_query($query);
			
			$t_idx = mysql_insert_id();

			for($i = 1; $i < 11; $i++) 
			{
				$temp = 'tr_name_'.$i;
				$temp2 = 'tr_job_'.$i;
				$temp3 = 'tr_date_'.$i;

				if(trim($_POST[$temp]) != '')
				{
					$query2 = "INSERT INTO ddm_aid_app_sub(
									pidx, name, job, sdate, regdate
								) VALUES (
									'$t_idx', '$_POST[$temp]', '$_POST[$temp2]', '$_POST[$temp3]', '$regdate'
								)";
					mysql_query($query2);
				}
					
			}
			echo "<script language='javascript'>
						 alert('신청 되었습니다.');
					 	 location.replace('appraisal.php');
					  </script>";
			exit;
			break;
	}
?>