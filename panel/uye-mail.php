<?
include('header.php');
$action=guvenlik($_GET['action']);
$gonderilecekler=guvenlik($_POST['gonderilecekler']);
$konu=guvenlik($_POST['konu']);
$icerik=guvenlik($_POST['icerik'],1);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Üyelere Mail Gönder
					</li>
				</ul>
			</div>
<?if($action=='ok'){?>
<script>
$(document).ready(function(){
$.post("uye-mail-gonder.php", { gonderilecekler: "<?=base64_encode($gonderilecekler);?>", konu: "<?=base64_encode($konu);?>",icerik: "<?=base64_encode($icerik);?>" })
.done(function(data) {
  $("#finished").html(data);
});
});
</script>
<div class="progress progress-striped progress-success active">
<div class="bar" style="width: 100%">E-Mailler Gönderiliyor, Lütfen Bekleyiniz...</div>
						</div>
						<div id="finished"></div>
<?}?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Üyelere Mail Gönder</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Üyelere Mail Gönder</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Gönderilecekler</label>
							  <div class="controls">
								<select name="gonderilecekler" data-rel="chosen">
								<option value="1"<?if($gonderilecekler==1){?> selected<?}?>>Tüm Üyeler</option>
								<option value="2"<?if($gonderilecekler==2){?> selected<?}?>>Aktif Üyeler</option>
								<option value="3"<?if($gonderilecekler==3){?> selected<?}?>>Pasif Üyeler</option>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mail Konusu</label>
							  <div class="controls">
								<input name="konu" type="text" value="<?=$konu;?>"> * Site Adı Mesajın Konusuna Otomatik Olarak Eklenecektir.
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mail İçeriği</label>
							  <div class="controls">
								<textarea name="icerik" class="ckeditor"><?=$icerik;?></textarea>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Maili Gönder</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>