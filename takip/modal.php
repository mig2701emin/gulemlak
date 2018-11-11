<?php	session_start();		ob_start();		include_once('config.php');?><!DOCTYPE html>
<html>
<head>
</style>
  <!-- Don't forget to include jQuery ;) -->
  <script src="jquery.modal.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>

  <!-- Modal HTML embedded directly into document -->
  <div id="ex1" style="display:none;">
    <p>Thanks for clicking.  That felt good.  <a href="#" rel="modal:close">Close</a> or press ESC</p>
  </div>

  

</body>
</html>