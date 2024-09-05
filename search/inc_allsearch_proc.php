<meta charset="euc-kr">
<?
include "../../include/global/config.php";

if($sword){
	$h_query = str_replace(",","",$h_query);
	$h_query = str_replace("false"," ",$h_query);
	
	$query = $sword;

	$qry_search="SELECT * FROM ddm_allSearch WHERE searchword='$query'";
	$resul=mysql_query($qry_search);
	$result=mysql_num_rows($resul);

	if($result == 0){
		$sql_search = "INSERT INTO ddm_allSearch (searchword,cjj_word,tot) VALUES ('$query','$h_query','0')";
		$result=mysql_query($sql_search);
	}else{
		$sql_update = "UPDATE ddm_allSearch SET tot=tot+1 WHERE searchword='$query'";
		$resul_update=mysql_query($sql_update);
	}

	if(empty($sear)){
		$searchword .= " and (sgname LIKE '%$sword%' OR sg_code LIKE '%$sword%' OR userid LIKE '%$sword%')";
	}else{
		$searchword .= " and $sear LIKE '%$sword%'";
	}
}

echo"<script>
		 <!--
			location.href('index.php?pno=090101&sch_gb=$sear&sch_nm=$sword');
		 //-->
		 </script>";
?>