<meta charset="euc-kr">
<?
include $_SERVER["DOCUMENT_ROOT"]."/include/global/config.php";
if($mode=="setExt"){
	$orderinfo = sqlRow("select * from ona_orderitem where orderno='$orderno'");
	if($orderinfo['extention']=="Y"){
		echo "<script>alert('�̹� ���� �Ǿ����ϴ�.');</script>";
		exit;
	}
	$cardinfo = sqlRow("select * from ona_member_family where memberno='$orderinfo[memberno]'");
	$iteminfo = sqlRow("select a.*, (select configtype from ona_init where configname='�뿩ǰ��' and value1=a.itemtype) itemtype_nm from ona_item_barcode a where a.barcode='$orderinfo[barcode]'");
	$extdays = sqlRowOne("select value1 from ona_store_config where s_cd='$iteminfo[s_cd]' and configname='�����ϼ�' and configtype1='$iteminfo[itemtype_nm]' and configtype2='$cardinfo[rent_grade]'");
	if(!$extdays){
		echo "<script>alert('��ȸ���� �ǽø� ������ �����մϴ�.');</script>";
		exit;
	}
	$edate1 = sqlRowOne("select date_add('$orderinfo[edate1]',interval $extdays day)");
	$chkholiday = sqlRowOne("select count(*) from ona_holiday where s_cd in ('00','$iteminfo[s_cd]') and ho_date='$edate1'");
	while($chkholiday){
		$edate1 = sqlRowOne("select date_add('$edate1',interval 1 day)");
		$chkholiday = sqlRowOne("select count(*) from ona_holiday where s_cd in ('00','$iteminfo[s_cd]') and ho_date='$edate1'");
	}
	sqlExe("update ona_orderitem set edate1='$edate1', extention='Y', modid='".$_SESSION['member_id']."', moddate=now(), modip='".$_SERVER["REMOTE_ADDR"]."' where orderno='$orderno'");
	echo "<script>parent.location.reload();</script>";
	exit;
}

if($mode=="reserve"){
	$sdate = time();
	$today = date("Y-m-d",$sdate);
	$edate = $sdate+$reservetime;
	$yoil = date('w');
	if(!trim($memberno)){
		echo "<script>alert('�뿩ī�带 �߱޹޾ƾ� �̿��� �����մϴ�.');</script>";
		exit;
	}
	// ��ð��� ����� ����� ���� 
	// �Ͻ������� ����ð� ����
	/*if($s_cd == "01"){	// ��ʸ�
		if(date("w",$sdate) == 6){ // �Ͽ���
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 14.30){
			}else{
				echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 2�ùݱ����� �����մϴ�.');</script>";
				exit;
			}
		}else if(date("w",$sdate) == 4){ // �����
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 19.30){
			}else{
				echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 7�ùݱ����� �����մϴ�.');</script>";
				exit;
			}
		}else{ // ����������
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 17.30){
			}else{
				echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 5�ùݱ����� �����մϴ�.');</script>";
				exit;
			}
		}
	}else{	// ����
		if(date("w",$edate) == 6){ // �Ͽ���
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 14.30){
			}else{
				echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 2�ùݱ����� �����մϴ�.');</script>";
				exit;
			}
		}else{ // ����������
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 17.30){
			}else{
				echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 5�ùݱ����� �����մϴ�.');</script>";
				exit;
			}
		}
	}*/
//	if($yoil == '6'){
//		if( date("H.i",$sdate)>=10.00 && date("H.i",$sdate) <= 12.00){
//
//		}else{
//			echo "<script>alert('����� �뿩������ ���� 10�ú��� ���� 1�ñ����� �����մϴ�.');</script>";
//			exit;
//		}
//	} else {
		if( date("H.i",$sdate)<09.30 || date("H.i",$sdate) > 15.30){
			echo "<script>alert('�뿩������ ���� 9��30�к��� ���� 3��30�б����� �����մϴ�.');</script>";
			exit;
		}		
//	}
//	$rentNumChk1 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('�뿩�Ϸ�','����Ϸ�') and b.s_cd='01' and a.regdate like '".$today."%'");
	$rentNumChk1 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('����Ϸ�') and b.s_cd='01' and a.regdate like '".$today."%'");
	if($rentNumChk1>4 && $s_cd=='01'){
		echo "<script>alert('���� �峭�� ���������� �����Ǿ����ϴ�. ���� �ٽ� �̿��� �ֽñ� �ٶ��ϴ�.\\n�ڼ��� ������ ���ͷ� ������ �ֽñ� �ٶ��ϴ�. Tel. 02)2237-5800');parent.loation.reload();</script>";
		exit;
	}

//	$rentNumChk2 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('�뿩�Ϸ�','����Ϸ�') and b.s_cd='02' and a.regdate like '".$today."%'");
	$rentNumChk2 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('����Ϸ�') and b.s_cd='02' and a.regdate like '".$today."%'");
	if($rentNumChk2>4 && $s_cd=='02'){
		echo "<script>alert('���� �峭�� ���������� �����Ǿ����ϴ�. ���� �ٽ� �̿��� �ֽñ� �ٶ��ϴ�.\\n�ڼ��� ������ ���ͷ� ������ �ֽñ� �ٶ��ϴ�. Tel. 02)2237-5800');parent.loation.reload();</script>";
		exit;
	}
	
	$tmpChk = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item b on a.itemcode=b.itemcode where a.userid='$userid' and a.memberno='$memberno' and a.edate>'$sdate' and a.status='����Ϸ�' and b.s_cd='$s_cd' and b.itemtype!='C'");
	if($tmpChk){
		echo "<script>if(confirm('�ش� ī���ȣ�� �̹� �������� ��ǰ�� �ֽ��ϴ�.\\n�������������� �������� ������ ����Ͻø� ���� ������ �ϽǼ� �ֽ��ϴ�.\\n���೻���� Ȯ���Ϸ� ���ðڽ��ϱ�?')) parent.location='/html/sub/index.php?pno=060203';</script>";
		exit;
	}

	$tmpChk2 = sqlRowOne("select * from ona_orderitem left join ona_item b on a.itemcode=b.itemcode where a.userid='$userid' and a.memberno='$memberno' and a.status = 'RT03' and b.s_cd='$s_cd' and b.itemtype!='C'and delete_yn = 'N'");
	if($tmpChk2) {
		echo "<script>if(confirm('�ش� ī���ȣ�� �̹� �뿩���� ��ǰ�� �ֽ��ϴ�.\\n�뿩������ Ȯ���Ϸ� ���ðڽ��ϱ�?')) parent.location='/html/sub/index.php?pno=060201';</script>";
		exit;
	}
	$barcodeinfo = sqlRow("select * from ona_item_barcode where barcode='$barcode'");
	if($barcodeinfo['status']!="LD01"){
		echo "<script>alert('������ �Ұ����� ������ ��ǰ�Դϴ�.');parent.loation.reload();</script>";
		exit;
	}
	
	$query = "insert into ona_item_barcode_status_history set 
		itemcode='".$barcodeinfo['itemcode']."'
		,itemname='".addslashes($barcodeinfo['itemname'])."'
		,barcode='".$barcodeinfo['barcode']."'
		,status_before='".$barcodeinfo['status']."'
		,status_after='LD06'
		,regdate=now()
	";
	sqlExe($query);
	$query = "insert into ona_item_reserve set 
		userid='$userid' 
		,memberno='$memberno'
		,itemcode='$itemcode'
		,barcode='$barcode'
		,sdate='$sdate'
		,edate='$edate'
		,status='����Ϸ�'
		,regdate=now()
	";
	sqlExe($query);

	sqlExe("update ona_item_barcode set status='LD06' where barcode='$barcode'");

	// �̹� ����Ȱ��...������ ���� chk���� �ɷ���ߵǳ� ���ÿ��ϴ°�� �����ӵ������� ������� �ȵǴ°���������.
	// �αױ�Ϻ��� chk chk insert insert update update �Ǿ�����.. �׷��� ���ÿ� �ϴ°�� insert �Ŀ� count üũ �ٽ��ؼ� �ǵ������۾� �ʿ�..
	$tmpChk = sqlRowOne("select count(*) from ona_item_reserve where barcode='$barcode' and status='����Ϸ�'");
	if($tmpChk > 1){
		//order by idx desc limit 1 �� ���������� ���� �����ѱ����... �׷��� �׳� �ѱ䵥���� �޾Ƽ� ó��.
		$reserveinfo_tmp = sqlRow("select * from ona_item_reserve where barcode='$barcode' and status='����Ϸ�' order by idx asc limit 1");
		if($reserveinfo_tmp[memberno] != $memberno){
			sqlExe("delete from ona_item_reserve where barcode='$barcode' and sdate='$sdate' and edate='$edate' and status='����Ϸ�' and memberno='$memberno' and userid='$userid'");

			echo "<script>alert('�̹� ������ �Ǿ��ֽ��ϴ�. �ڵ� ���ΰ�ħ �˴ϴ�.');parent.loation.reload();</script>";
			exit;
		}
	}

	echo "<script>alert('���� �Ǿ����ϴ�.');parent.location.reload();</script>";
	exit;
}

if($mode=="cancelReserve"){
	$reserveinfo = sqlRow("select * from ona_item_reserve where idx='$idx'");
	if($reserveinfo['status']!="����Ϸ�"){
		echo "<script>alert('��Ұ� �Ұ����� �����Դϴ�.');location.replace('reserve.php');</script>";
		exit;
	}
	$barcodeinfo = sqlRow("select * from ona_item_barcode where barcode='".$reserveinfo['barcode']."'");
	if($barcodeinfo['status']=="LD06"){
		$query = "insert into ona_item_barcode_status_history set 
			itemcode='".$barcodeinfo['itemcode']."'
			,itemname='".addslashes($barcodeinfo['itemname'])."'
			,barcode='".$barcodeinfo['barcode']."'
			,status_before='".$barcodeinfo['status']."'
			,status_after='LD01'
			,regdate=now()
		";
		sqlExe($query);
		sqlExe("update ona_item_barcode set status='LD01' where barcode='".$barcodeinfo['barcode']."'");
	}
	sqlExe("update ona_item_reserve set status='�������',moddate=now() where idx='$idx'");
	echo "<script>alert('������� �Ǿ����ϴ�.');location.replace('reserve.php');</script>";
	exit;
}
?>