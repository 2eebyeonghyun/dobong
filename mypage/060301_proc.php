<meta charset="euc-kr">
<?
    include "../../include/global/config.php";

	extract($_GET);
	extract($_POST);

	if($_POST[send]=="del_add" && $_POST[idx_add])
	{
		$query = "UPDATE ddm_edu_app SET del_yn='Y', delDate='".time()."' WHERE idx='".$_POST[idx_add]."'";	
		mysql_query($query);

		$query = "select addInwon FROM ddm_edu_app WHERE idx='".$_POST[idx]."'";
		$parent_app = mysql_fetch_array(mysql_query($query));
		$new_add_inwon = $parent_app[0] - 1;

		$query = "update ddm_edu_app set addInwon = '$new_add_inwon' WHERE idx='".$_POST[idx]."'";
		mysql_query($query);
		
		echo "<script language='javascript'>
					 alert('�ش� �ο��� ��ҵǾ����ϴ�.');
					 location.replace('study.php');
				  </script>";

	}

	else if($_POST[send]=="del" && $_POST[idx])
	{
		$eduinfo = sqlRow("select * from ddm_edu_main where idx='$parent_idx'");

		if($eduinfo['edu_sdate'] - (86400*1)>time()) {	
		}else{
			echo "<script>alert('�������� ���������� ��Ұ� �����մϴ�.\\n�ڼ��� ������ ���ͷ� ������ �ֽñ� �ٶ��ϴ�.\\nTel. 02)2237-5800');</script>";
			exit;
		}
		$query = "update ddm_edu_app set del_yn='Y', delDate='".time()."' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('��ҵǾ����ϴ�.');
					 location.replace('study.php');
				  </script>";
	}
	else if($_POST[send]=="apply_y" && $_POST[idx])
	{
		$query = "update ddm_edu_app set applyStatus = '' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('��û�� ���� ó���Ͽ����ϴ�.');
					 location.replace('study.php');
				  </script>";
	}
	else if($_POST[send]=="apply_n" && $_POST[idx])
	{
		$query = "update ddm_edu_app set applyStatus = 'N' WHERE idx='".$_POST[idx]."'";	
		mysql_query($query);
		echo "<script language='javascript'>
					 alert('��û�� ������ ó���Ͽ����ϴ�.');
					 location.replace('study.php');
				  </script>";
	}
	exit;
?>