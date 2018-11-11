<div class="container text-center">
<div class="modal fade bs-example-modal-lg<?php echo $row["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
   <div class="item active">
     <img  src="resimler/123.jpg"  >
      <div class="carousel-caption">
        One Image
      </div>
    </div>
	<?php $sorgu1=mysql_query("select * from fotograf where kategori='kiralik'");
								while($row1=mysql_fetch_array($sorgu1)){ ?>
    <div class="item">
     <img  src="resimler/<?php echo $row1["resimadi"]; ?>"  >
      <div class="carousel-caption">
        One Image
      </div>
    </div>
	<?php } ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
    </div>
  </div>
</div>
</div>