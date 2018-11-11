<?php
session_start();
		ob_start();
		include_once('config.php');
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	
	if(!isset($_SESSION["login"]) || $_SESSION["uye_id"] != 1){
    header("location: login.php");
}
 


 
ob_end_flush();
?>