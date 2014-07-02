<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/categories.php">Categories</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Add Category</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Categories</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="category_form" action="<?php echo base_url();?>category/create_category" method="post" enctype="multipart/form-data">
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
								<label class="control-label"><dt>Name :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" id="name" name="c_name" type="text" value="">
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
                                <img class="img82x132" id="myimage" src="" alt="select"/>
								  <input class="input-file " onchange="onFileSelected(event)" name="c_image" id="fileInput" type="file"/>
								</div>
							  </div>
                              
                              <div class="form-actions">
								<button type="submit" id="btn_add_category" class="btn btn-primary">Add Category</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
