<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<style>
    .nav-item
    {
        min-width: 90px;
    }

</style>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">
        <img  alt="Ticaret Meclisi" src="<?php echo base_url('assets/');?>images/logo.png" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item active">
                <a class="nav-link" href="<?php //echo base_url(); ?>">Anasayfa <span class="sr-only">(current)</span></a>
            </li> -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   İlanlarım
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/anasayfa/aktif">Aktif İlanlarım</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/anasayfa/pasif">Pasif İlanlarım</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/anasayfa">Tüm İlanlarım</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Üyeliğim
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/bilgilerim">Üyelik Bilgilerim</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/sifredegistir">Şifre Değiştir</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ödemelerim
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/odemeler/bekleyen">Bekleyen Ödemelerim</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/odemeler/tamam">Tamamlanan Ödemelerim</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>hesabim/odemeler">Tüm Ödemelerim</a>
                </div>
            </li>
          <?php if (magaza_var_mi($this->session->userdata("userData")["userID"])): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Mağazam
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo base_url().magaza_username($this->session->userdata('userData')['userID']); ?>">Mağazamı Göster</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>magazam/magazam">Mağazamı Düzenle</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>magazam/magazakullanicilari">Mağaza Kullanıcıları</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>magazam/magazauseradd">Yeni Kullanıcı</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>magazam/magazailanlari">Mağaza İlanları</a>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>magazam/magazailanadd">Yeni Mağaza İlanı Ekle</a>

                </div>
            </li>
          <?php else: ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>magazaac">Mağaza aç</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>hesabim/favorilerim">Favori İlanlarım</a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Mesajlarım
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="">Gelen Mesajlar</a>
                  <a class="dropdown-item" href="">Gönderilen Mesajlar</a>

              </div>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Destek</a>
            </li>
        </ul>
        <form action="<?php echo base_url('cikis'); ?>"class="form-inline my-2 my-lg-0">

            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Güvenli Çıkış</button>
        </form>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
