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
  <?php $this->load->view('layout/styles');?>

</head>
<body>
    <div class="se-pre-con"></div>
    <div class="main">

        <!-- HEADER START -->
      <?php $this->load->view('layout/header');?>


    	<div class="centerfix siteWrapper sitePage">
    	    <div class="centercontent">
    	        <div class="row">
    	            <div class="col-xs-9">
                    	<?php if(validation_errors()){ ?>
                            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
                        <?php } ?>
                		<div class="panel panel-default">
        					  	<div class="panel-heading">
        					  		<?php //echo $title; ?>
        					  	</div>

        					  	<div class="panel-body">
        					  		<form method="post">
        								    <div class="well">Üye Numarası: <strong><?php echo $row->Id; ?></strong></div>

                            <div class="form-group">
                                <label>Yeni Parola<sup class="text-danger"> * </sup></label>
                                <input type="password" class="form-control" name="new_password" value="<?php echo set_value('new_password'); ?>" />
                            </div>

                            <div class="form-group">
                                <label>Yeni Parola Tekrar</label>
                                <input type="password" class="form-control" name="re_password" value="<?php echo set_value('re_password'); ?>" />
                            </div>
                            <button type="submit" class="btn btn-success">Gönder</button>
                        </form>
                        <br/>
                        <p class="text-danger">(<sup> * </sup>) Parola en az bir büyük harf, bir küçük harf ve bir rakam içermelidir ve minimum 8 karekterden meydana gelmelidir.</p>

        					  	</div>
    					      </div>
    	            </div>
    	        </div>
    	    </div>
      </div>

      <?php $this->load->view('layout/footer');?>
      	<!-- FOOTER END -->
  </div>
  <?php $this->load->view('layout/scripts');?>
</body>
</html>
