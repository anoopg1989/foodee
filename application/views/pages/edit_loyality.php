<?php include('header.php'); ?>



			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();  ?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();  ?>pages/view/loyalty_programs.php">Loyality Programms</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Edit Loyality Programms</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Loyality Programms</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="loyality_form" action="<?php echo base_url();?>loyality/edit_loyality" method="post" enctype="multipart/form-data">
							<fieldset>	 
                            	<?php
									if(isset($error_img))
										echo $error_img;
								?> 
                                 <div class="alert alert-error error" id="Empty_error">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter all fields and try submitting again.
                            	</div>
                              <div class="control-group">
								<label class="control-label"><dt>Title :</dt></label>
								<div class="controls">
                                 <input class="input-xlarge" id="input_pk_id" name="input_pk_id" type="hidden" value="<?php echo $edit_loyal['pk_id'] ;?>">
								 <input class="input-xlarge" id="title" type="text" name="l_name" value="<?php echo $edit_loyal['s_name'] ;?>">
								</div>
							  </div>
                              <script>
							   		function onFileSelected(event) {
		
									  var selectedFile = event.target.files[0];
									  var reader = new FileReader();
									
									  var imgtag = document.getElementById("myimage");
									  imgtag.title = selectedFile.name;
									
									  reader.onload = function(event) {
										imgtag.src = event.target.result;
									  };
									
									  reader.readAsDataURL(selectedFile);
									}
							   </script>
                              <div class="control-group">
								<label class="control-label"><dt>Image :</dt></label>
								<div class="controls">
                                
                                	<img class="img82x132" id="myimage" src="<?php echo base_url();?>assets/uploads/<?php echo $edit_loyal['s_img'] ;?>" width="150" height="150" />
								  <input class="input-file " onchange="onFileSelected(event)" name="l_image" id="fileInput" type="file" />
                                  
								</div>
							  </div>
                             
                            
                              <div class="control-group">
								<label class="control-label"><dt>Redeem Points :</dt></label>
								<div class="controls">
								  <input class="input-xlarge" id="count" type="number" name="r_point" value="<?php echo $edit_loyal['i_point'] ;?>">
								</div>
							  </div>
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary" id="btn_edit_loyality">Update Loyality</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
