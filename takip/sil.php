<?php

	session_start();
		ob_start();
		include_once('config.php');
		
		
	if(!isset($_SESSION["login"])){
    header("location: login.php");
}	

	
	$mahalle		=	$_GET["mahalle"];
	
	$idarsa			=	$_GET["idarsa"];
	$idrehber			=	$_GET["idrehber"];
	$idkira			=	$_GET["idkira"];
	$idsat			=	$_GET["idsat"];
	
	$idkiraisyeri			=	$_GET["idkiraisyeri"];
	$idsatisyeri			=	$_GET["idsatisyeri"];
	
	$idarsa2		=	$_GET["idarsa2"];
	$idkira2		=	$_GET["idkira2"];
	$idsat2			=	$_GET["idsat2"];
	
	$idkiraisyeri2		=	$_GET["idkiraisyeri2"];
	$idsatisyeri2			=	$_GET["idsatisyeri2"];
	
	$idarsa3		=	$_GET["idarsa3"];
	$idkira3		=	$_GET["idkira3"];
	$idsat3			=	$_GET["idsat3"];
	
	$idkiraisyeri3		=	$_GET["idkiraisyeri3"];
	$idsatisyeri3			=	$_GET["idsatisyeri3"];

	$idsilarsa		=	$_GET["idsilarsa"];
	$idsilkira		=	$_GET["idsilkira"];
	$idsilsat		=	$_GET["idsilsat"];
	
	$idsilkiraisyeri		=	$_GET["idsilkiraisyeri"];
	$idsilsatisyeri		=	$_GET["idsilsatisyeri"];
	
		$idtalep		=	$_GET["idtalep"];
		$idtalepsil		=	$_GET["idtalepsil"];
		$idtalepaktif		=	$_GET["idtalepaktif"];
		
	$iduye					=	$_GET["iduye"];
	$idsiluye		=	$_GET["idsiluye"];
	
	if(isset($idarsa3)){
		$guncelle=mysql_query("update satilik_arsa set
									durum	=	0 where id='$idarsa3'");
		header("location:sonuc-arsa.php?mahid=".$mahalle);
	}
	
	if(isset($idkira3)){
		$guncelle=mysql_query("update kiralik_daire set
									durum	=	0 where id='$idkira3'");
		header("location:sonuc-kira.php?mahid=".$mahalle);
	}
	
	if(isset($idsat3)){
		$guncelle=mysql_query("update satilik_daire set
									durum	=	0 where id='$idsat3'");
		header("location:sonuc.php?mahid=".$mahalle);
	}
	
	
	if(isset($idkiraisyeri3)){
		$guncelle=mysql_query("update kiralik_isyeri set
									durum	=	0 where id='$idkiraisyeri3'");
		header("location:sonuc-is-yeri-kira.php?mahid=".$mahalle);
	}
	
	if(isset($idsatisyeri3)){
		$guncelle=mysql_query("update satilik_isyeri set
									durum	=	0 where id='$idsatisyeri3'");
		header("location:sonuc-is-yeri-sat.php?mahid=".$mahalle);
	}
	
	//hepsi

	if(isset($idarsa)){
		$guncelle=mysql_query("update satilik_arsa set
									durum	=	0 where id='$idarsa'");
		header("location:sonuc-arsa-hepsi.php");
	}
	
	if(isset($idkira)){
		$guncelle=mysql_query("update kiralik_daire set
									durum	=	0 where id='$idkira'");
		header("location:sonuc-kira-hepsi.php");
	}
	
	if(isset($idsat)){
		$guncelle=mysql_query("update satilik_daire set
									durum	=	0 where id='$idsat'");
		header("location:sonuc-sat-hepsi.php");
	}
	
	if(isset($idkiraisyeri)){
		$guncelle=mysql_query("update kiralik_isyeri set
									durum	=	0 where id='$idkiraisyeri'");
		header("location:sonuc-is-yeri-kira-hepsi.php");
	}
	
	if(isset($idsatisyeri)){
		$guncelle=mysql_query("update satilik_isyeri set
									durum	=	0 where id='$idsatisyeri'");
		header("location:sonuc-is-yeri-sat-hepsi.php");
	}
	
	if(isset($iduye)){
		$guncelle=mysql_query("update yonetici set
									durum	=	0 where yonetici_id='$iduye'");
		header("location:sonuc-uye.php");
	}
	
	//hepsi son
	
	//hepsi deaktif
	
	
	if(isset($idarsa2)){
		$guncelle=mysql_query("update satilik_arsa set
									durum	=	1 where id='$idarsa2'");
		header("location:sonuc-arsa-hepsi-deaktif.php");
	}
	
	if(isset($idkira2)){
		$guncelle=mysql_query("update kiralik_daire set
									durum	=	1 where id='$idkira2'");
		header("location:sonuc-kira-hepsi-deaktif.php");
	}
	
	if(isset($idsat2)){
		$guncelle=mysql_query("update satilik_daire set
									durum	=	1 where id='$idsat2'");
		header("location:sonuc-sat-hepsi-deaktif.php");
	}
	
	if(isset($idkiraisyeri2)){
		$guncelle=mysql_query("update kiralik_isyeri set
									durum	=	1 where id='$idkiraisyeri2'");
		header("location:sonuc-is-yeri-kira-hepsi-deaktif.php");
	}
	
	if(isset($idsatisyeri2)){
		$guncelle=mysql_query("update satilik_isyeri set
									durum	=	1 where id='$idsatisyeri2'");
		header("location:sonuc-is-yeri-sat-hepsi-deaktif.php");
	}
	
	
	
	//hepsi deaktif sil
	
	if(isset($idsilsat)){
		$silsat=mysql_query("DELETE FROM satilik_daire WHERE id='$idsilsat'");
		header("location:sonuc-sat-hepsi-deaktif.php");
	}
	
	if(isset($idsilkira)){
		$silkira=mysql_query("delete from kiralik_daire where id='$idsilkira'");
		header("location:sonuc-kira-hepsi-deaktif.php");
	}
	
	if(isset($idsilarsa)){
		$silarsa=mysql_query("delete from satilik_arsa where id='$idsilarsa'");
		header("location:sonuc-arsa-hepsi-deaktif.php");
	}
	
	if(isset($idrehber)){
		$silarsa=mysql_query("delete from rehber where ids='$idrehber'");
		header("location:rehber-listele.php");
	}
	
	if(isset($idsilsatisyeri)){
		$silsat=mysql_query("DELETE FROM satilik_isyeri WHERE id='$idsilsatisyeri'");
		header("location:sonuc-is-yeri-sat-hepsi-deaktif.php");
	}
	
	if(isset($idsilkiraisyeri)){
		$silkira=mysql_query("delete from kiralik_isyeri where id='$idsilkiraisyeri'");
		header("location:sonuc-is-yeri-kira-hepsi-deaktif.php");
	}
	
	if(isset($idsiluye)){
		$siluye=mysql_query("delete from yonetici where yonetici_id='$idsiluye'");
		header("location:sonuc-uye-deaktif.php");
	}
	
	//hepsi deaktif sil son
	if(isset($idtalep)){
		$siltalep2=mysql_query("update talepler set
									durum	=	0 where id='$idtalep'");
		header("location:sonuc-talep.php");
	}
	
	if(isset($idtalepaktif)){
		$siltalep3=mysql_query("update talepler set
									durum	=	1 where id='$idtalepaktif'");
		header("location:sonuc-talep-deaktif.php");
	}
	
	if(isset($idtalepsil)){
		$siltalep=mysql_query("delete from talepler where id='$idtalepsil'");
		header("location:sonuc-talep-deaktif.php");	
	}
?>