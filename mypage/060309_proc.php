<meta charset="euc-kr">
<?
    include "../../include/global/config.php";
	include $_SERVER["DOCUMENT_ROOT"]."/lib/class/class.sms.php";

	extract($_GET);
	extract($_POST);

	if($_POST[send]=="del_add" && $_POST[idx_add])
	{
		$query = "UPDATE ddm_daynursery_app SET del_yn='Y', delDate='".time()."' WHERE idx='".$_POST[idx_add]."'";	
		mysql_query($query);

		$query = "select addInwon FROM ddm_daynursery_app WHERE idx='".$_POST[idx]."'";
		$parent_app = mysql_fetch_array(mysql_query($query));
		$new_add_inwon = $parent_app[0] - 1;

		$query = "update ddm_daynursery_app set addInwon = '$new_add_inwon' WHERE idx='".$_POST[idx]."'";
		mysql_query($query);
		
		echo "<script language='javascript'>
					 alert('�ش� �ο��� ��ҵǾ����ϴ�.');
					 parent.location.reload();
				  </script>";

	}

	else if($_POST[send]=="del" && $_POST[idx])
	{
		$eduinfo = sqlRow("select * from ddm_daynursery where idx='$parent_idx'");
		$appinfo = sqlRow("select *, AES_DECRYPT(UNHEX(mbHP), 'DM') tel from ddm_daynursery_app where idx='".$_POST[idx]."'");

		if($eduinfo['edu_sdate'] >time()) {	
		}else{
			echo "<script>alert('�������� �������� ��Ұ� �����մϴ�.\\n�ڼ��� ������ ���ͷ� ������ �ֽñ� �ٶ��ϴ�.\\nTel. 02)2237-5800');</script>";
			exit;
		}
		$query = "update ddm_daynursery_app set del_yn='Y', delDate='".time()."' WHERE idx='".$_POST[idx]."'";	


		if($appinfo[smsyn] == "Y") {
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
			$send_name = $appinfo[mbName];

//			$eduYmd = date('Y�� m�� d��', $eduinfo[edu_sdate]);
			$eduYmd = date('m�� d��', $eduinfo[edu_sdate]);
			$timeCnt = 0;
			if( $eduinfo[eTime] == "10:00~12:00" || $eduinfo[eTime] == "10:00~11:30" ) $timeCnt = 1;
			if( $eduinfo[eTime] == "13:00~15:00" || $eduinfo[eTime] == "14:00~15:30" ) $timeCnt = 2;
			if( $eduinfo[eTime] == "15:30~17:30" || $eduinfo[eTime] == "16:00~17:30" ) $timeCnt = 3;
			if( $eduinfo[eTime] == "18:00~19:30" ) $timeCnt = 4;

			$eduinfo[ePlace] = str_replace("���빮������������������","",$eduinfo[ePlace]);
			$eduinfo[ePlace] = str_replace("�������ƹ�","",$eduinfo[ePlace]);
			$eduinfo[ePlace] = str_replace(" ","",$eduinfo[ePlace]);
			$msgbox = '���ڶ��������ƹ� '.$eduinfo[ePlace].' '.$eduYmd.' '.$timeCnt.'ȸ��('.$eduinfo[eTime].') ��ҵǾ����ϴ�';

			if(!($objsms->sendPhoneNumberCheck($sendnumber))){
				//�߽��ڹ�ȣ ������ ���ڹ߼� �ȵ�
			} else {
				$v = $appinfo[tel];
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

		mysql_query($query);

/* fix.
		echo "<script language='javascript'>
					 alert('��ҵǾ����ϴ�.');
					 parent.location.href='../sub/index.php?pno=060309';
				  </script>";
*/
		echo "<script language='javascript'>
					 alert('��ҵǾ����ϴ�.');
					 location.replace('association.php');
				  </script>";
	}
	else if($_POST[send]=="apply_y" && $_POST[idx])
	{
		$query = "update ddm_daynursery_app set applyStatus = '' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('��û�� ���� ó���Ͽ����ϴ�.');
					 parent.location.reload();
				  </script>";
	}
	else if($_POST[send]=="apply_n" && $_POST[idx])
	{
		$query = "update ddm_daynursery_app set applyStatus = 'N' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('��û�� ������ ó���Ͽ����ϴ�.');
					 parent.location.reload();
				  </script>";
	}
	exit;
?>