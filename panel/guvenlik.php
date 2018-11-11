<?
if($_SESSION['admin_login']!='ok' or $_SESSION['admin_user']==''){
	exit(header ( "location: login.html" ));
}
?>