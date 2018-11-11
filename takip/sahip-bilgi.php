												
					<!-- Modal -->
								<div id="myModal<?php echo $row["id"]; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content" style="height:330px;">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Mal Sahibinin Bilgileri</h4>
									  </div>
									  <div class="modal-body" style="height:200px;">
										<p><p><div class="left col-xs-7">
														 <h2><?php echo $row["sahip_isim"]; ?></h2>
															
														 <ul class="list-unstyled">
															<li><i class="fa fa-building"></i> Address: </li>
															<li><i class="fa fa-phone"></i> Phone #: <?php echo $row["sahip_numara"]; ?> </li>
														 </ul>
												</div></p></p>
									  </div>
									  <div class="modal-footer" style="height:70px;">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									  </div>
									</div>
								  </div>
								</div>