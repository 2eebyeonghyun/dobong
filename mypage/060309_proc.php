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
					 alert('해당 인원이 취소되었습니다.');
					 parent.location.reload();
				  </script>";

	}

	else if($_POST[send]=="del" && $_POST[idx])
	{
		$eduinfo = sqlRow("select * from ddm_daynursery where idx='$parent_idx'");
		$appinfo = sqlRow("select *, AES_DECRYPT(UNHEX(mbHP), 'DM') tel from ddm_daynursery_app where idx='".$_POST[idx]."'");

		if($eduinfo['edu_sdate'] >time()) {	
		}else{
			echo "<script>alert('교육시작 전까지만 취소가 가능합니다.\\n자세한 사항은 센터로 문의해 주시기 바랍니다.\\nTel. 02)2237-5800');</script>";
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
				$sendnumber = '02-2212-1975'; //배봉산점
			} else if($eduinfo[s_cd] == '04') {
				$sendnumber = '02-2212-5844'; //장안2동점
			}
			//fix. 발신번호 고정
			$sendnumber = '02-2237-5800';
			$send_name = $appinfo[mbName];

//			$eduYmd = date('Y년 m월 d일', $eduinfo[edu_sdate]);
			$eduYmd = date('m월 d일', $eduinfo[edu_sdate]);
			$timeCnt = 0;
			if( $eduinfo[eTime] == "10:00~12:00" || $eduinfo[eTime] == "10:00~11:30" ) $timeCnt = 1;
			if( $eduinfo[eTime] == "13:00~15:00" || $eduinfo[eTime] == "14:00~15:30" ) $timeCnt = 2;
			if( $eduinfo[eTime] == "15:30~17:30" || $eduinfo[eTime] == "16:00~17:30" ) $timeCnt = 3;
			if( $eduinfo[eTime] == "18:00~19:30" ) $timeCnt = 4;

			$eduinfo[ePlace] = str_replace("동대문구육아종합지원센터","",$eduinfo[ePlace]);
			$eduinfo[ePlace] = str_replace("공동육아방","",$eduinfo[ePlace]);
			$eduinfo[ePlace] = str_replace(" ","",$eduinfo[ePlace]);
			$msgbox = '꿈자람공동육아방 '.$eduinfo[ePlace].' '.$eduYmd.' '.$timeCnt.'회차('.$eduinfo[eTime].') 취소되었습니다';

			if(!($objsms->sendPhoneNumberCheck($sendnumber))){
				//발신자번호 오류로 문자발송 안됨
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
					 alert('취소되었습니다.');
					 parent.location.href='../sub/index.php?pno=060309';
				  </script>";
*/
		echo "<script language='javascript'>
					 alert('취소되었습니다.');
					 location.replace('association.php');
				  </script>";
	}
	else if($_POST[send]=="apply_y" && $_POST[idx])
	{
		$query = "update ddm_daynursery_app set applyStatus = '' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('신청자 참석 처리하였습니다.');
					 parent.location.reload();
				  </script>";
	}
	else if($_POST[send]=="apply_n" && $_POST[idx])
	{
		$query = "update ddm_daynursery_app set applyStatus = 'N' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('신청자 미참석 처리하였습니다.');
					 parent.location.reload();
				  </script>";
	}
	exit;
?>