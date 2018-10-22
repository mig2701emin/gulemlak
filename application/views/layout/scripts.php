<script src="<?php echo base_url('assets/');?>js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.downCount.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery-ui.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/fotorama.js"></script>
<script src="<?php echo base_url('assets/');?>js/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url('assets/');?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url('assets/');?>js/custom.js"></script>
<script src="<?php echo base_url('assets/');?>js/script.js"></script>
<script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
<?php if(flashdata()){ ?>
    <script type="text/javascript">
        generate(<?php echo flashdata(); ?>);
    </script>
<?php } ?>
