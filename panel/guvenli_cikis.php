<?
include('header.php');
unset($_SESSION['admin_login']);
unset($_SESSION['admin_user']);
?>
<div class="alert alert-success" style="width:350px;margin:0 auto 5px auto"><button type="button" class="close" data-dismiss="alert">×</button>Güvenli Çıkış Yapıldı. 2 Saniye Sonra Yönlendirileceksiniz.</div>
<?
header("refresh: 2; url=../index.php");
include('footer.php');
?>
