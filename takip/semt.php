<?php
	
	session_start();
	ob_start();
	include_once('config.php');

		if(!isset($_SESSION["login"]) || $_SESSION["uye_id"] != 1){
    header("location: login.php");
}

	mysql_select_db("iller2") or die ("veri tabanı hatası");
	mysql_unbuffered_query('SET NAMES UTF8');
	
	
	$semt=$_POST["semt"];
	
	$dizi=array();
	$sorgu=mysql_query("select * from semt where ILCE_ID='$semt' ");
	$geridon="";
	while($row=mysql_fetch_array($sorgu)){
		$geridon.=' <option value="'.$row["SEMT_ID"].'">'.$row["SEMT_ADI"].'</option>';
	}
	$dizi["basari"]=$geridon;
	echo json_encode($dizi);
	
	
		
		
	
	
?>