
<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
  <!-- Basic Page Needs
    ================================================== -->


  <title>Ticaret Meclisi</title>
  <!-- SEO Meta
  ================================================== -->
  <?php $this->load->view('layout/metas');?>
  <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>css/style.css">
<style>
    html {
        min-height: 100%;
    }


    #list-tab,#list-tab>a{

        background-color:transparent;
        color:black;
        border:none;
        font-family:Poppins;

    }
    #list-tab>a:hover{
         background-color:#377dff;
          color:white;

    }


</style>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

    <div class="main">

        <?php $this->load->view('layout/newuserheader');?>
<div class="container" >

<style>
a{
    font-family: Poppins;

}
p{font-family: "Open Sans"}

h5{
    font-weight: bold;
    font-family:Poppins;
    color:#007bff;
}
.loader{
 position: absolute;
    height: 100%;
    width: 100%;
    background-color:#dde6e6;
    display: none;
    z-index: 9999999;
    padding-top: 50px;
}
</style>

    <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i>  Kategori</a> <br></div>
        <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;"> İlan Detay </a>	</div>
        <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
        <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div>
        <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
    </div>

    <div class="row" style="margin-top: 50px;margin-bottom:100px; ">

        <div class="col-12 col-md-4" style="border-right:solid 1px darkgray;">
          <div class="loader text-center ">
            <img id="preloader"  src="<?php echo base_url(); ?>assets/img/loading.gif" >
          </div>

            <div class="list-group" id="list-tab" role="tablist">


                <?php foreach ($anaKategoriler as $anaKategori): ?>
                  <a class="list-group-item list-group-item-action list-group-item-danger kategori" id="<?php echo $anaKategori->Id; ?>" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-caret-right"></i>  <?php echo $anaKategori->kategori_adi; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="abuziddin col-12 col-md-8 text-center" >
          <h5>Gerçek dünyadan projeler.</h5>

          <p>Daha da çok ilham almak için yaratıcı çalışmalardan oluşan
              bu Behance galerisini inceleyin Behance, yaratıcı projeleri tüm dünyaya sunabileceğiniz bir platformdur.
              Beceri seviyeniz ne olursa olsun, sizin için bir şeyler mutlaka vardır.</p>
              <a href="#">Daha fazla bilgi için</a>
          <img src="<?php echo base_url(); ?>assets/img/data-report-flat-concept-illustration.svg"/>
        </div>

    </div>

    </div>
    </div>

    <?php $this->load->view('layout/footer');?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<script type="text/javascript">

  $( ".kategori" ).on('click',function(){
    var Id = this.id;
    var yon="ileri";
    ajaxyukle(Id,yon);
  });
  function ajaxyukle(Id,yon) {
    $(".loader").fadeIn();
    /*alert(Id);*/
    $.ajax({

      type: "post",
      url: "<?php echo base_url('ajax/altkategoriler'); ?>",
      data: "Id=" + Id,
      dataType: 'json',
      success: function(json){
        $(".loader").fadeOut();
        if (json[1]=='overthemax') {
          $( ".list-group-item" ).remove();
          if (json[0].ust_kategori != -1) {
            var geriitms = $('<a class="list-group-item list-group-item-action list-group-item-danger kategori" style="font-weight: bold" id="' + json[0].ust_kategori + '" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-caret-left"></i>  Geri Üst Kategori</a>').on('click',function (){
              $(".abuziddin").html('<h5>Gerçek dünyadan projeler.</h5><p>Daha da çok ilham almak için yaratıcı çalışmalardan oluşan bu Behance galerisini inceleyin Behance, yaratıcı projeleri tüm dünyaya sunabileceğiniz bir platformdur. Beceri seviyeniz ne olursa olsun, sizin için bir şeyler mutlaka vardır.</p><a href="#">Daha fazla bilgi için</a><img src="<?php echo base_url(); ?>assets/img/data-report-flat-concept-illustration.svg"/>');
              ajaxyukle(json[0].ust_kategori,"geri");
            });
            $(".list-group").append(geriitms);
          }
          var satir='<div class="col-md-12 order-md-1 text-primary font-weight-bold mb-3"><p>Seçilen Kategoride;</p><h5>İlan Limiti Aşıldı.</h5><p>Ücretli İlan İle Devam Edebilirsiniz.</p></div><div> <a class="btn btn-success" style="min-width:300px;" href="<?php echo base_url(); ?>">Anasayfa <i class="fas fa-caret-right"></i></a></div>';
          $(".abuziddin").html(satir);
        }else if (json[1]=='completed') {
          $( ".list-group-item" ).remove();
          if (json[0].ust_kategori != -1) {
            var geriitms = $('<a class="list-group-item list-group-item-action list-group-item-danger kategori" style="font-weight: bold" id="' + json[0].ust_kategori + '" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-caret-left"></i>  Geri Üst Kategori</a>').on('click',function (){
              $(".abuziddin").html('<h5>Gerçek dünyadan projeler.</h5><p>Daha da çok ilham almak için yaratıcı çalışmalardan oluşan bu Behance galerisini inceleyin Behance, yaratıcı projeleri tüm dünyaya sunabileceğiniz bir platformdur. Beceri seviyeniz ne olursa olsun, sizin için bir şeyler mutlaka vardır.</p><a href="#">Daha fazla bilgi için</a><img src="<?php echo base_url(); ?>assets/img/data-report-flat-concept-illustration.svg"/>');
              ajaxyukle(json[0].ust_kategori,"geri");
            });
            $(".list-group").append(geriitms);
          }
          var satir = '<h3>Seçilen Kategori</h3>' +
          '<div class="col-md-12 order-md-1 text-primary font-weight-bold"' +
          ' style="margin-bottom:30px;">';
          for (var i = 0; i < json[2].length; i++) {
            if(i==json[2].length-1){
              satir = satir + '' + json[2][i];
            }
            else{
              satir = satir + '' + json[2][i] + ' <i class="fas fa-angle-double-right"></i>';
            }
          }
          satir = satir + '</div><div> <a class="btn btn-success" style="min-width:300px;" href="<?php echo base_url("ilanekle/detay"); ?>">  Devam et <i class="fas fa-caret-right"></i></a></div>';
          $(".abuziddin").html(satir);
        }else {
          $( ".list-group-item" ).remove();
          if (json[0].ust_kategori != -1) {
            var geriitms = $('<a class="list-group-item list-group-item-action list-group-item-danger kategori" style="font-weight:bold" id="' + json[0].ust_kategori + '" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-caret-left"></i> Geri Üst Kategori</a>').on('click',function (){
              ajaxyukle(json[0].ust_kategori,"geri");
            });
            $(".list-group").append(geriitms);
          }
          $(json[1]).each(function(index,item) {
            var itms = $('<a class="list-group-item list-group-item-action list-group-item-danger kategori"  id="' + item.Id + '" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="fas fa-caret-right"></i> ' + item.kategori_adi + '</a>').on('click',function (){
              ajaxyukle(item.Id,"ileri");
            });
            $(".list-group").append(itms);
          });
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
    });
  }
</script>



</body>
</html>
