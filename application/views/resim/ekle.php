<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.1.3/css/bootstrap.min.css'); ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/dropzone/min/dropzone.min.css'); ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>
  <style media="screen">
  .dropzone .dz-preview .dz-image {
    width: 240px;
    height: 135px;
  }
  </style>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/userheader');?>
    <div class="container">
      <div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Kategori</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> İlan Detay </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> Fotoğraf </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-search"></i>  Ön İzleme </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
      <div id="my-dropzone" class="dropzone">
        <!-- <div class="dz-message">
          <h3>Tıklayın!</h3> Ya da <br/><strong>Dosyaları Sürükleyip Bırakın!</strong>
        </div> -->
      </div>
      <hr class="mt-3"/>
      <div>
        <a  class="btn btn-info btn-block" href="<?php echo base_url('ilanekle/onizleme/'.$ilanId) ?>">Devam Et</a>
      </div>
  <?php $this->load->view('layout/footer');?>
    </div>
  </div>

  <script src="<?php echo base_url('assets/dropzone/min/dropzone.min.js'); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script type="text/javascript">
  Dropzone.autoDiscover = false;
  var myDropzone = new Dropzone("#my-dropzone", {
    url: "<?php echo base_url('resim/yukle/'.$ilanId) ?>",
    acceptedFiles: "image/*",
    dictDefaultMessage:"<h3>Tıklayın!</h3> Ya da <br/><strong>Dosyaları Sürükleyip Bırakın!</strong>",
    parallelUploads: 15,
    dictRemoveFile:"RESMİ SİL",
    maxFiles:15,
    thumbnailWidth: 240,
    thumbnailHeight: 135,
    resizeHeight: 900,
    resizeWidth: 1600,
    /*resizeMethod:"crop",*/
    addRemoveLinks: true,
    removedfile: function(file) {
      var name = file.name;

      $.ajax({
        type: "post",
        url: "<?php echo base_url('resim/sil/'.$ilanId) ?>",
        data: { file: name },
        dataType: 'html'
      });

      // remove the thumbnail
      var previewElement;
      return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
    },
    init: function() {
      var me = this;

      $.get("<?php echo base_url('resim/getir/'.$ilanId) ?>", function(data) {
        // if any files already in server show all here
        if (data.length > 0) {
          $.each(data, function(key, value) {
            var mockFile = value;
            me.emit("addedfile", mockFile);
            me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>photos/thumbnail/" + value.name);
            me.emit("complete", mockFile);
          });
        }
      });

    },

  });

  </script>
</body>
</html>
