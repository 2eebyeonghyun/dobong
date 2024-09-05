<meta charset="euc-kr">
<?
include $_SERVER["DOCUMENT_ROOT"]."/include/global/config.php";
if($mode=="setExt"){
	$orderinfo = sqlRow("select * from ona_orderitem where orderno='$orderno'");
	if($orderinfo['extention']=="Y"){
		echo "<script>alert('이미 연장 되었습니다.');</script>";
		exit;
	}
	$cardinfo = sqlRow("select * from ona_member_family where memberno='$orderinfo[memberno]'");
	$iteminfo = sqlRow("select a.*, (select configtype from ona_init where configname='대여품목' and value1=a.itemtype) itemtype_nm from ona_item_barcode a where a.barcode='$orderinfo[barcode]'");
	$extdays = sqlRowOne("select value1 from ona_store_config where s_cd='$iteminfo[s_cd]' and configname='연장일수' and configtype1='$iteminfo[itemtype_nm]' and configtype2='$cardinfo[rent_grade]'");
	if(!$extdays){
		echo "<script>alert('정회원이 되시면 연장이 가능합니다.');</script>";
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
		echo "<script>alert('대여카드를 발급받아야 이용이 가능합니다.');</script>";
		exit;
	}
	// 운영시간에 벗어나는 예약시 제한 
	// 일시적으로 예약시간 변경
	/*if($s_cd == "01"){	// 답십리
		if(date("w",$sdate) == 6){ // 일요일
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 14.30){
			}else{
				echo "<script>alert('대여예약은 오전 9시30분부터 오후 2시반까지만 가능합니다.');</script>";
				exit;
			}
		}else if(date("w",$sdate) == 4){ // 목요일
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 19.30){
			}else{
				echo "<script>alert('대여예약은 오전 9시30분부터 오후 7시반까지만 가능합니다.');</script>";
				exit;
			}
		}else{ // 나머지평일
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 17.30){
			}else{
				echo "<script>alert('대여예약은 오전 9시30분부터 오후 5시반까지만 가능합니다.');</script>";
				exit;
			}
		}
	}else{	// 제기
		if(date("w",$edate) == 6){ // 일요일
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 14.30){
			}else{
				echo "<script>alert('대여예약은 오전 9시30분부터 오후 2시반까지만 가능합니다.');</script>";
				exit;
			}
		}else{ // 나머지평일
			if(date("H.i",$sdate)>=9.30 && date("H.i",$sdate) <= 17.30){
			}else{
				echo "<script>alert('대여예약은 오전 9시30분부터 오후 5시반까지만 가능합니다.');</script>";
				exit;
			}
		}
	}*/
//	if($yoil == '6'){
//		if( date("H.i",$sdate)>=10.00 && date("H.i",$sdate) <= 12.00){
//
//		}else{
//			echo "<script>alert('토요일 대여예약은 오전 10시부터 오후 1시까지만 가능합니다.');</script>";
//			exit;
//		}
//	} else {
		if( date("H.i",$sdate)<09.30 || date("H.i",$sdate) > 15.30){
			echo "<script>alert('대여예약은 오전 9시30분부터 오후 3시30분까지만 가능합니다.');</script>";
			exit;
		}		
//	}
//	$rentNumChk1 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('대여완료','예약완료') and b.s_cd='01' and a.regdate like '".$today."%'");
	$rentNumChk1 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('예약완료') and b.s_cd='01' and a.regdate like '".$today."%'");
	if($rentNumChk1>4 && $s_cd=='01'){
		echo "<script>alert('현재 장난감 예약접수가 마감되었습니다. 추후 다시 이용해 주시기 바랍니다.\\n자세한 사항은 센터로 문의해 주시기 바랍니다. Tel. 02)2237-5800');parent.loation.reload();</script>";
		exit;
	}

//	$rentNumChk2 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('대여완료','예약완료') and b.s_cd='02' and a.regdate like '".$today."%'");
	$rentNumChk2 = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item_barcode b on a.barcode=b.barcode where a.status in ('예약완료') and b.s_cd='02' and a.regdate like '".$today."%'");
	if($rentNumChk2>4 && $s_cd=='02'){
		echo "<script>alert('현재 장난감 예약접수가 마감되었습니다. 추후 다시 이용해 주시기 바랍니다.\\n자세한 사항은 센터로 문의해 주시기 바랍니다. Tel. 02)2237-5800');parent.loation.reload();</script>";
		exit;
	}
	
	$tmpChk = sqlRowOne("select count(*) from ona_item_reserve a left join ona_item b on a.itemcode=b.itemcode where a.userid='$userid' and a.memberno='$memberno' and a.edate>'$sdate' and a.status='예약완료' and b.s_cd='$s_cd' and b.itemtype!='C'");
	if($tmpChk){
		echo "<script>if(confirm('해당 카드번호는 이미 예약중인 상품이 있습니다.\\n마이페이지에서 예약중인 내역을 취소하시면 새로 예약을 하실수 있습니다.\\n예약내역을 확인하러 가시겠습니까?')) parent.location='/html/sub/index.php?pno=060203';</script>";
		exit;
	}

	$tmpChk2 = sqlRowOne("select * from ona_orderitem left join ona_item b on a.itemcode=b.itemcode where a.userid='$userid' and a.memberno='$memberno' and a.status = 'RT03' and b.s_cd='$s_cd' and b.itemtype!='C'and delete_yn = 'N'");
	if($tmpChk2) {
		echo "<script>if(confirm('해당 카드번호는 이미 대여중인 상품이 있습니다.\\n대여내역을 확인하러 가시겠습니까?')) parent.location='/html/sub/index.php?pno=060201';</script>";
		exit;
	}
	$barcodeinfo = sqlRow("select * from ona_item_barcode where barcode='$barcode'");
	if($barcodeinfo['status']!="LD01"){
		echo "<script>alert('예약이 불가능한 상태의 물품입니다.');parent.loation.reload();</script>";
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
		,status='예약완료'
		,regdate=now()
	";
	sqlExe($query);

	sqlExe("update ona_item_barcode set status='LD06' where barcode='$barcode'");

	// 이미 예약된경우...순서상 위에 chk에서 걸러줘야되나 동시에하는경우 쿼리속도에따라 순서대로 안되는경향이있음.
	// 로그기록보니 chk chk insert insert update update 되어있음.. 그래서 동시에 하는경우 insert 후에 count 체크 다시해서 되돌리는작업 필요..
	$tmpChk = sqlRowOne("select count(*) from ona_item_reserve where barcode='$barcode' and status='예약완료'");
	if($tmpChk > 1){
		//order by idx desc limit 1 로 가능하지만 왠지 찜찜한기분이... 그래서 그냥 넘긴데이터 받아서 처리.
		$reserveinfo_tmp = sqlRow("select * from ona_item_reserve where barcode='$barcode' and status='예약완료' order by idx asc limit 1");
		if($reserveinfo_tmp[memberno] != $memberno){
			sqlExe("delete from ona_item_reserve where barcode='$barcode' and sdate='$sdate' and edate='$edate' and status='예약완료' and memberno='$memberno' and userid='$userid'");

			echo "<script>alert('이미 예약이 되어있습니다. 자동 새로고침 됩니다.');parent.loation.reload();</script>";
			exit;
		}
	}

	echo "<script>alert('예약 되었습니다.');parent.location.reload();</script>";
	exit;
}

if($mode=="cancelReserve"){
	$reserveinfo = sqlRow("select * from ona_item_reserve where idx='$idx'");
	if($reserveinfo['status']!="예약완료"){
		echo "<script>alert('취소가 불가능한 상태입니다.');location.replace('reserve.php');</script>";
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
	sqlExe("update ona_item_reserve set status='예약취소',moddate=now() where idx='$idx'");
	echo "<script>alert('예약취소 되었습니다.');location.replace('reserve.php');</script>";
	exit;
}
?>