<?php

	@mysql_connect("localhost","ticaretm_takip","Ticaret27") or die ("veri tabanına bağlanılamadı");
	mysql_select_db("ticaretm_takip") or die ("veri tabanı hatası");
	mysql_query('SET NAMES UTF8');
	
	error_reporting(0); 
?>