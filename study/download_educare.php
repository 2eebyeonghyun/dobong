<?
	include $_SERVER[DOCUMENT_ROOT]."/include/global/config.php"; 

	$file_url = $_SERVER[DOCUMENT_ROOT]."/upload/education/";
	if(!is_file($file_url.$file)){
		echo "<script>alert('".$file_url.$file."파일을 찾을수 없습니다.');</script>";
		exit;
	}
	header("Cache-control: private");	
	if (eregi("(MSIE 5.5|MSIE 6.0)", $HTTP_USER_AGENT)) {
			Header("Content-type:application/octet-stream"); 
			Header("Content-Length:".filesize($file_url.$file));
			Header("Content-Disposition:attachment;filename=".$file);
			Header("Content-Transfer-Encoding:binary"); 
			Header("Pragma:no-cache"); 
			Header("Expires:0"); 
	} else {
			Header("Content-type:file/unknown"); 
			Header("Content-Length:".filesize($file_url.$file));
			Header("Content-Disposition:attachment;filename=".$file);
			Header("Content-Description:PHP3 Generated Data"); 
			Header("Pragma: no-cache"); 
			Header("Expires: 0"); 
	}

	$fp = fopen($file_url.$file, "rb"); 
	if (!fpassthru($fp)) fclose($fp); 
	clearstatcache();
?>