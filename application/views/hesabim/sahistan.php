<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="centerfix siteWrapper sitePage">
          <div class="centercontent">
              <div class="row">
                  <div class="col-xs-9">
                      <?php if(validation_errors()){ ?>
                            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                        <?php } ?>
                    <div class="panel panel-default">
                      <div class="panel-heading">

                        <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>Şifre Yenileme</strong></div>
                      </div>

                      <div class="panel-body">
                        <form method="post">
                            <div class="well">Kullanıcı: <strong><?php echo $user->ad." ".$user->soyad; ?></strong></div>
                            <hr/>
                            <div class="form-group">
                                <label>URL yi giriniz..</label>
                                <input type="text" class="form-control" name="url"/>
                            </div>

                            <button type="submit" class="btn btn-success">Gönder</button>
                        </form>
                        <br/>

                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>

    </div>
    <?php $this->load->view('layout/footer');?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
</body>
</html>
