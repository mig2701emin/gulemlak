<!DOCTYPE html>
<html lang="tr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Resim Yükleme</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap-4.1.3/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/dropzone/min/dropzone.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"/>


  </head>
  <body>
    <div class="container">
      <div id="content">
          <div id="my-dropzone" class="dropzone">
      			<!-- <div class="dz-message">
      				<h3>Tıklayın!</h3> Ya da <br/><strong>Dosyaları Sürükleyip Bırakın!</strong>
      			</div> -->
      		</div>
          <button type="button" id="btn1" name="button">Gönder</button>

    	</div>
    </div>

    <script src="<?php echo base_url('assets/dropzone/min/dropzone.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-4.1.3/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/script.js'); ?>"></script>


    <script>

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
      url: "<?php echo base_url('account/upload_server') ?>",
      acceptedFiles: "image/*",
       parallelUploads: 15,
       resizeHeight: 500,
       resizeWidth: 800,
      addRemoveLinks: true,
      removedfile: function(file) {
        var name = file.name;

        $.ajax({
          type: "post",
          url: "<?php echo base_url('account/remove_image') ?>",
          data: { file: name },
          dataType: 'html'
        });

        // remove the thumbnail
        var previewElement;
        return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
      },
      init: function() {
        var me = this;

        $.get("<?php echo base_url('account/list_images') ?>", function(data) {
          // if any files already in server show all here
          if (data.length > 0) {
            $.each(data, function(key, value) {
              var mockFile = value;
              me.emit("addedfile", mockFile);
              me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>ilanlar/uploads/" + value.name);
              me.emit("complete", mockFile);
            });
          }
        });

      },
      autoProcessQueue:false
    });

    $("#btn1").click(function(){
      myDropzone.processQueue();
    });

    </script>

  </body>
</html>
