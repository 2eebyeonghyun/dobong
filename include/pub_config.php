<?php
define('DIR','https://lbh6154.cafe24.com/dobong');

function pubGnb($str){
	global $_dep;
	$exp = explode(',',$str);
	$exp_count = count($exp);
	$act = 0;
	for($i=0;$i<count($exp);$i++){
		if($_dep[$i] == $exp[$i]){
			$act ++;
		}
	}
	if($act==$exp_count){
		echo 'active';
	}
}
?>