	<meta charset="euc-kr">
	<?
    include "../../include/global/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/lib/class/class.sms.php";

	$regdate = time();
	$mbTel = $_POST[mbTel4]."-".$_POST[mbTel5]."-".$_POST[mbTel6];
	$mbHp = $_POST[mbTel1]."-".$_POST[mbTel2]."-".$_POST[mbTel3];

	$smsyn = $_POST[smsyn];
	$pname = $_POST[pname];
	$addr = $_POST[addr1]." ".$_POST[addr2]." ".$_POST[addr3];

	// ��û�� ��������
	$appStatus	= $_POST[applyStatus];	

	// �߰��ο�
	$addInwon	= $_POST[addInwon];
		
	$addDetail	= $_POST[addDetail];

	// �߰��Ƶ�
	$child			= $_POST[child];

	$gubun			= $_POST[gubun];
	$child_count	= $_POST[child_count];

	// �������ƹ��� ��� �Ƶ��߰� �ʼ�
//	if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
//		var_dump($child);
//		var_dump($child_count);
//		var_dump($gubun);

		if($gubun=="���ڶ��������ƹ�" && $child_count < 1){
			echo "<script>alert('���ڶ��������ƹ� ��û�� �߰� �Ƶ� 1���̻� ������ �ʼ��Դϴ�.');history.back();</script>";
			exit;
		} elseif($gubun=="���ڶ��������ƹ�"){
			$addInwon = $child_count;
		}

//	}


	switch($gubun){
		case "�θ����":
			if($jobh!="�θ�"){
				$sisulName = "";
				$sisulType = "";
				$job = $jobh;
			}else{
				$childName = "";
			}
		break;

		case "���ڶ��������ƹ�":
			$childName = "";
		break;

		case "���������α׷�":
			$childName = "";
		break;

		case "����������":
			$sisulName = "";
			$sisulType = "";
			$job = $jobh;
		break;

		default:
			
		break;
	}

	$query = "select * from ddm_daynursery where idx = '$_POST[parent_idx]'";
	$eduinfo = sqlRow($query);
	
	/****
		*	��û���� üũ
		*/
	//$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx='$parent_idx' && mbId='$mbId' and del_yn='N'";
	$query	= "SELECT count(*) FROM ddm_daynursery_app WHERE parent_idx in(select idx from ddm_daynursery where left(FROM_UNIXTIME(edu_sdate), 13) = (select left(FROM_UNIXTIME(edu_sdate), 13) from ddm_daynursery where idx = '$parent_idx')) && mbId='$mbId' and del_yn='N'";

if($_SERVER['REMOTE_ADDR']=="14.6.27.174"){
//	echo $query;
//	exit;
}

		//echo "<script>alert(\"$query\");</script>";
	$appchk = sqlRowOne($query);
	if($appchk > 0){
		echo "<script>alert('���� ��û�� 1�� 1ȸ�� �����մϴ�. �ش����� �̹� ��û�Ǿ����ϴ�.');location.href = 'association.php';</script>";
		exit;
	}

	/****
		*	��û��¥ ����
		*/
//	������ ��� �Ⱓ üũ x
//	if($regdate < $eduinfo[edu_edate]){ // ���Ⱓ üũ
		if($eduinfo[req_sdate] < $regdate && $regdate < $eduinfo[req_edate]){ // �����Ⱓ üũ	
		}else{
			echo "<script>alert('���� �����Ⱓ�� �ƴմϴ�.');</script>";
			exit;
		}
//	}else{
//		echo "<script>alert('���� �� ���Ⱓ�� �������ϴ�.');</script>";
//		exit;
//	}

	// insert �ϱ� ���� �ο� á���� �ٽ� Ȯ��
	/*** 
	   *	��û�ο��� count���� del_yn �� ����
	   *	�����ο��� ������ ����ο��� ������,
	   *	�����ο��� ��Ұ� �߻��ع����� ���� ��û�� ����ο����� ���߿� ��û�� �ο��� �����ο����� �� ��찡 �߻��ع����� ������
	   *	����ο��� �����ο����� �̵��� �����ڰ� ���� ����
	   */


	// �ش� �̺�Ʈ�� �����ο�
	$inwon = $eduinfo[inwon]; //��û�����ο�
	$winwon = $eduinfo[winwon]; //����û�����ο�

	// �ش� �̺�Ʈ�� ������ �ο�
	$appInwon = 0; //��û�ο�
	$wappInwon = 0; //����û�ο�
	$all_child_count = 0; // �߰��ڳ��û�ο�
	$wall_child_count = 0; // �߰��ڳ����û�ο�
	$app_type = 0; // ���� ddm_edu_app �� child �÷� ������ ��뿩�� üũ

	// ����û�ο������� ������ο��� ����
/*
	if($winwon > 0){
		$del_yn = "";
	}else{
		$del_yn = "and del_yn='N'";
	}
*/
	$del_yn = "and del_yn='N'";

	/* ��û�� �ο�ī���� */
	$query = "select * from ddm_daynursery_app where parent_idx = '$_POST[parent_idx]' and status1=1 $del_yn";
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
	$query = "select * from ddm_daynursery_app where parent_idx = '$_POST[parent_idx]' and status1=3 and del_yn='N'";
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
		$inwon_empty = $inwon - $appInwon;
		$winwon_empty = $winwon - $wappInwon;
	}
	else{
		$inwon_empty = $inwon - $all_child_count;
		$winwon_empty = $winwon - $wall_child_count;
	}
	
	
	
	// ���� ���� ���� Ȯ��
	if($_REQUEST[applyStatus] == 'N') {$self_count = 0;} else {$self_count = 1;}
	//$self_count = 0;

	if($gubun == '�θ����'){
		$temp_inwon = 1;
		$temp_winwon = 1;
	}
	else{
		$temp_inwon = $addInwon + $self_count;
		$temp_winwon = $addInwon + $self_count;
	}

	// ������ �ο��� ���Ͽ� ��û����
	if(!$winwon){ // ����û�� ������
		if($temp_inwon > $inwon_empty){
			echo "<script>alert('��û�ο��� �ʰ��Ǿ����ϴ�. ��û�����ο��� ".$inwon_empty."�� �Դϴ�.');history.back();</script>";
			exit;
		}else{
			$status1 = 1; //��û
		}
	}else{	// ����û�� ������
		if($temp_inwon > $inwon_empty){ // ��û�ο��� ��á�����
			if($temp_winwon > $winwon_empty){ // ����ο��� ��á�����
				echo "<script>alert('��û�ο��� ����û�ο��� �ʰ��Ǿ����ϴ�.\\n��û�����ο�:".$inwon_empty."��, ��û��Ⱑ���ο�:".$winwon_empty."�� �Դϴ�.\\n\\n �� ��û�� ����û �Ѵ� ����Ҽ��� ������, ������ �ο��� �°� �ο������ٽ��� �� ��û���ּ���.');</script>";
//				echo "<script>alert('�����ο��� �����Ǿ����ϴ�.\\n����ڷ� ��û�Ǿ�����, �ڼ��� ������ ���ͷ� ������ �ֽñ� �ٶ��ϴ�.\\nTel. 02)2237-5800\\n\\n �� ��û�� ��⸦ ���ÿ� ������ �� ������, ������ �ο��� �°� ������ �� �ٽ� ��û���ּ���.');</script>";
				echo "<script>history.back();</script>";
				exit;
			}else{
				
				$status1 = 3; //���
				if($inwon_empty > 0){ // ��û�ο��� ���������� ���� ��û�� �ο��� ��û�ο����� Ŭ ��� ����ο����� ��ȯ������
									  // �ο�üũ�� ��û�ο����� ��ȯ�Ҽ��ְ� �ȳ�
?>
<script>
/*
if(confirm("���� ��û�����ο��� <?=$inwon_empty?>�� �̹Ƿ� ����ο����� ���ϴ�.\n����ο����� ��û�� ���Ͻø� [Ȯ��] ��ư�� �����ּ���.")){
		<?$tmp_check = true;?>
	}else{
		<?$tmp_check = false;?>
	}
*/
alert("���� ��û�����ο��� <?=$inwon_empty?>�� �̹Ƿ� ����ο����� ���ϴ�.\n����û ��Ҹ� ���Ͻø� [����������-�¶��ν�û����-���ڶ��������ƹ��û] �޴����� �����մϴ�.");
</script>
<?	
/*
					if(!$tmp_check){
						echo "<script>history.back();</script>";
						exit;
					}
*/
				}
			}
		}else{
			$status1 = 1; //��û
		}
	}

	// ��û���Ѻκ� ����� ��û

	if(trim($mbId) == '' || trim($mbName) == '') {
?>
<script>
		alert('������ ����Ǿ����ϴ�.');
</script>
<?	
		exit;
	}

	if($eduinfo['climit1'] && $eduinfo['climit2']) $tmp_type = 1; // �����̻�~��������
	if($eduinfo['climit1'] && !$eduinfo['climit2']) $tmp_type = 2; // �����̻�
	if(!$eduinfo['climit1'] && $eduinfo['climit2']) $tmp_type = 3; // ��������
	if(!$eduinfo['climit1'] && !$eduinfo['climit2']) $tmp_type = 4; // �����������

	/***
	   * �츮���� ����, ���������α׷��ϰ�� childbirth ��� 
	   * ���������� ������ �Ƶ�������� �����Ϳ� ���Ͽ� �������� üũ
	***/

	if($childbirth){

		$chk_birth = split('\|', $childbirth);	//�ڳ�Ƶ� ������
		$tmp_sdate = date("Ymd",$eduinfo['edu_sdate']);	//���� ������¥
		
		for($i=1; $i<count($chk_birth);$i++){
			$tmp_now_m = sqlRowOne("SELECT 
									Floor(
										TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") + DATEDIFF(".$tmp_sdate.", ".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") MONTH) 
										/
										DATEDIFF(".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") + 1 MONTH, ".$chk_birth[$i]." + INTERVAL TIMESTAMPDIFF(MONTH, ".$chk_birth[$i].", ".$tmp_sdate.") MONTH) 
										) tmp_month");

			if($tmp_type == 1){
				if($tmp_now_m >= $eduinfo[climit1] && $tmp_now_m <= $eduinfo[climit2]){
				}else{
					echo "<script>alert('".($i)."��° �߰��Ƶ��� ��������� �������ѿ� ���� �ʽ��ϴ�.\\n(���簳����:".$tmp_now_m."����)');</script>";
					exit;
				}
			}
			
			if($tmp_type == 2){
				if($tmp_now_m >= $eduinfo[climit1]){
				}else{
					echo "<script>alert('".($i)."��° �߰��Ƶ��� ��������� �������ѿ� ���� �ʽ��ϴ�.\\n(���簳����:".$tmp_now_m."����)');</script>";
					exit;
				}
			}

			if($tmp_type == 3){
				if($tmp_now_m <= $eduinfo[climit2]){
				}else{
					echo "<script>alert('".($i)."��° �߰��Ƶ��� ��������� �������ѿ� ���� �ʽ��ϴ�.\\n(���簳����:".$tmp_now_m."����)');</script>";
					exit;
				}
			}

			if($tmp_type == 4){
				// �����������
			}
//				echo "<script>alert('".$tmp_now_m."����');</script>";
		}
	}


	


	$query = "INSERT INTO ddm_daynursery_app SET 
						parent_idx = '$_POST[parent_idx]'
						, mbId = '$_POST[mbId]'
						, mbName = '$_POST[mbName]'
						, sisulName = '$sisulName'
						, sisulType = '$sisulType'
						, job = '$job'
						, childName = '$childName'
						, mbTel = HEX(AES_ENCRYPT('$mbTel','DM'))
						, mbHp = HEX(AES_ENCRYPT('$mbHp','DM'))
						, smsyn = '$smsyn'
						, pname = '$pname'
						, addr = '$addr'
						, regdate = '$regdate'
						, status1 = '$status1'
						, addInwon = '$addInwon'
						, applyStatus = '$applyStatus'
						";

	//echo "<script>alert(\"$query\");</script>";
	//exit;

	mysql_query($query);

	// �߰��ο� insert �ϱ�(�⺻���� 5���ʵ�� add_idx�� ��û�� idx �� �����Ѵ�.)
	$detail = preg_split('/\|/', $addDetail);
	
	$idx = mysql_insert_id();
	
	for($i = 0; $i < $addInwon; $i++){
		if($gubun == '��������������'){
			$mbName		= $detail[$i*4 + 1];
			$sisulName	= $detail[$i*4 + 2];
			$sisulType	= $detail[$i*4 + 3];
			$job		= $detail[$i*4 + 4];

			$query = "insert into ddm_daynursery_app SET
						mbName = '$mbName'
						, sisulName = '$sisulName'
						, sisulType = '$sisulType'
						, job = '$job'
						, status1 = '$status1'
						, add_idx = '$idx'
				 ";
		}else{
			$mbName		= $detail[$i*2 + 1];
			$mbBirth		= $detail[$i*2 + 2];

			$query = "insert into ddm_daynursery_app SET
						mbName = '$mbName'
						, status1 = '$status1'
						, add_idx = '$idx'
						, childbirth = '$mbBirth'
				 ";
		}
		mysql_query($query);
	}
	

	if($smsyn == "Y" && $status1 == 1) {
		$objsms = new SMS_CLASS($DBSMS,$INFO);

		if(!$objsms->status=="readytosend"){
			echo "<script>alert('".$objsms->errmsg."');</script>";
			exit;
		}

		$sucess_cnt = 0;
		$fail_cnt = 0;
		$pass_cnt = 0;

		$sendnumber = '02-2212-1975';
		if($eduinfo[s_cd] == '03') {
			$sendnumber = '02-2212-1975'; //�������
		} else if($eduinfo[s_cd] == '04') {
			$sendnumber = '02-2212-5844'; //���2����
		}
		//fix. �߽Ź�ȣ ����
		$sendnumber = '02-2237-5800';
		$send_name = $_POST[mbName];

		//$eduYmd = date('Y�� m�� d��', $eduinfo[edu_sdate]);
		$eduYmd = date('m�� d��', $eduinfo[edu_sdate]);
		$timeCnt = 0;
		if( $eduinfo[eTime] == "10:00~12:00" || $eduinfo[eTime] == "10:00~11:30" ) $timeCnt = 1;
		if( $eduinfo[eTime] == "13:00~15:00" || $eduinfo[eTime] == "14:00~15:30" ) $timeCnt = 2;
		if( $eduinfo[eTime] == "15:30~17:30" || $eduinfo[eTime] == "16:00~17:30" ) $timeCnt = 3;
		if( $eduinfo[eTime] == "18:00~19:30" ) $timeCnt = 4;

		$eduinfo[ePlace] = str_replace("���빮������������������","",$eduinfo[ePlace]);
		$eduinfo[ePlace] = str_replace("�������ƹ�","",$eduinfo[ePlace]);
		$eduinfo[ePlace] = str_replace(" ","",$eduinfo[ePlace]);
		$msgbox = '���ڶ��������ƹ� '.$eduinfo[ePlace].' '.$eduYmd.' '.$timeCnt.'ȸ��('.$eduinfo[eTime].') ��û�Ǿ����ϴ�(�����Ұ�)';

		if(!($objsms->sendPhoneNumberCheck($sendnumber))){
			//�߽��ڹ�ȣ ������ ���ڹ߼� �ȵ�
		} else {
			$v = $mbHp;
			$v = trim($v);
			$v = str_replace(" ","",$v);
			$v = str_replace("-","",$v);
			$rtn = false;

			if($v) $rtn = $objsms->send($v,$sendnumber,$msgbox,$send_name,"N");
			if($rtn){
				$sucess_cnt++;
			}
			else $fail_cnt++;
		}
	}



	$status_name = $status1 == 1 ? "��û":"����û";
	echo "<script>alert('".$status_name." �Ǿ����ϴ�.');location.href = '../mypage/association.php';</script>";
	exit;
?>