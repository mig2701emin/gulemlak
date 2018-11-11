<?php	
	session_start();
	ob_start();
	include_once('config.php');				

		if(!isset($_SESSION["login"])){
    header("location: login.php");
}

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	function yukle(){
		
		
	}
	
	function sil(){
		$id = @$_GET["id"];
		$query = mysql_fetch_array(mysql_query("select * from resimler where resimid ='$id'"));
		$resim = $query["resimadi"];
		unlink("resimler/".$resim);
		$delete = mysql_query("delete from resimler where resimid = '$id'");
		if($delete){
			header("location:daire-ekle.php");
		}else{
			echo('Resim Silinemedi Kardeşim Zorla mı?');
			header("refresh:2;url=daire-ekle.php");
		}
	}
?>