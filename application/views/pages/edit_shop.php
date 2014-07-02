<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/shops">Shops</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Edit Shop</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Shop</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="edit_shop_form" method="post" action="<?php echo base_url();?>shops/edit_shop" enctype="multipart/form-data">
                        	<?php
									if(isset($error_img))
										echo $error_img;
								?> 

							<fieldset>	  
                            	<div class="alert alert-error error" id="error_name">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter a Shop Name.
                            	</div>  
                              <div class="control-group">
								<label class="control-label"><dt>Name :</dt></label>
								<div class="controls">  
                                <input class="input-xlarge" name="input_pk_id" type="hidden" value="<?php echo $edit_shop['pk_id'] ;?>">
								 <input class="input-xlarge" name="sname" id="name" type="text" value="<?php echo $edit_shop['s_name'] ;?>">
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>Description :</dt></label>
								<div class="controls">  
                                
								 <input class="input-xlarge" name="decription" type="text" value="<?php echo $edit_shop['s_decription'] ;?>">
								</div>
							  </div>
                               <script>
							   		function onLogoSelected(event) {
		
									  var selectedFile = event.target.files[0];
									  var reader = new FileReader();
										var image  = new Image();
									  var imgtag = document.getElementById("logo_img");
									  imgtag.title = selectedFile.name;
									
									  reader.onload = function(event) {
										
										imgtag.src = event.target.result;
										image.src = event.target.result;
										image.onload = function() {
											var w = this.width,
												h = this.height;
												if(w != 100 || h != 100)
													alert("Optimal Image size is 100px X 100px")
										};
									  };
									
									  reader.readAsDataURL(selectedFile);
									}
							   </script>
                             <div class="control-group">
								<label class="control-label"><dt>Logo :</dt></label>
								<div class="controls">
								 <img class="img98x86" id="logo_img" src="<?php echo base_url();?>assets/uploads/<?php echo $edit_shop['s_logo'] ;?>" alt="select"/>
                                   <input class="input-file " onchange="onLogoSelected(event)" name="s_logo" id="fileInput_logo" type="file"/>
                                   <span class="inline">100px X 100px</span>
								</div>
							  </div>
                              
                              <div class="alert alert-error error" id="error_cat">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a Category.
                            	</div> 
                              <div class="control-group">
								<label class="control-label"><dt>Category :</dt></label>
								<div class="controls">
								 	<select class="input-xlarge" name="cat_name" id="selectCategory" data-rel="chosen">
                                     <?php foreach ($category as $category_item): 
									 
									 	if($category_item['pk_id'] == $edit_shop['fk_i_category'])
										{
									 ?>
                                     	   <option selected value="<?= $category_item['pk_id'] ;?>"><?= $category_item['s_name'] ;?></option>
                                        <?php
											}
											else
											{
										?>
                                        	<option value="<?= $category_item['pk_id'] ;?>"><?= $category_item['s_name'] ;?></option>
                                      <?php 
											}
										endforeach ?>
								  </select>
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_city">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a City.
                            	</div>
                              <div class="control-group">
								<label class="control-label"><dt>City :</dt></label>
								<div class="controls">
								   <select class="input-xlarge" name="city" id="shop_selectCity" data-rel="chosen">
                                   <option value="-1" selected>Select a City</option>
									<?php foreach ($city as $city_item): 
									if($city_item['pk_id'] == $edit_shop['cpid'])
										{
									 ?>
                                     	   <option selected value="<?= $city_item['pk_id'] ;?>"><?= $city_item['s_name'] ;?></option>
                                        <?php
											}
											else
											{
										?>
                                        	 <option value="<?= $city_item['pk_id'] ;?>"><?= $city_item['s_name'] ;?></option>
                                      <?php 
											}
                                        endforeach ?>
								  </select>
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_loc">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a Location.
                            	</div>
                              <div class="control-group">
								<label class="control-label"><dt>Location :</dt></label>
								<div class="controls">
								   <select class="input-xlarge" name="location" id="shop_selectLocation" data-rel="chosen">
                                   
									<option value="-1">Select a Location</option>
                                    <?php foreach ($location as $location_item): 
									if($location_item['pk_id'] == $edit_shop['fk_i_location'])
										{
									 ?>
                                     	   <option selected value="<?= $location_item['pk_id'] ;?>"><?= $location_item['s_name'] ;?></option>
                                        <?php
											}
											else
											{
										?>
                                        	 <option value="<?= $location_item['pk_id'] ;?>"><?= $location_item['s_name'] ;?></option>
                                      <?php 
											}
                                        endforeach ?>
									
								  </select>
								</div>
							  </div>
                              </fieldset>
                              	<fieldset class="gllpLatlonPicker">
                                   <div class="gllpMap">Google Maps</div>
                                   <br/>
                                    <div class="alert alert-error error" id="error_lat">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Lattitude.
                                    </div>
                                   <div class="control-group">
                                        <label class="control-label"><dt>Lattitude :</dt></label>
                                        <div class="controls">
                                            <input class="input-xlarge gllpLatitude" name="lat" id="lat" type="text" value="<?php echo $edit_shop['dec_lat'] ;?>">
                                        </div>
                                    </div>
                                    <div class="alert alert-error error" id="error_lon">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Longitude.
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label"><dt>Longitude :</dt></label>
                                        <div class="controls">
                                            <input class="input-xlarge gllpLongitude" name="long" id="long" type="text" value="<?php echo $edit_shop['dec_lng'] ;?>">
                                        </div>
                                     </div>
                                    
                                    
                            	</fieldset>
                            
                              <fieldset>
                              
                              <div class="alert alert-error error" id="error_cname">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Contact Name.
                                </div>
                               <div class="control-group">
								<label class="control-label"><dt>Contact Name :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" name="cntct_name" id="cntct_name" type="text" value="<?php echo $edit_shop['s_cname'] ;?>">
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_email">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Email.
                               </div>
                              <div class="control-group">
								<label class="control-label"><dt>Email :</dt></label>
								<div class="controls">
								  
                                   <input class="input-xlarge" name="email" id="email" type="text" value="<?php echo $edit_shop['s_email'] ;?>">
								</div>
							  </div>
                               <div class="alert alert-error error" id="error_phone">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Phone.
                               </div>
                              <div class="control-group">
								<label class="control-label"><dt>Phone :</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="phone" id="phone" type="text" value="<?php echo $edit_shop['s_phone'] ;?>">
								</div>
							  </div>
                               <div class="alert alert-error error" id="error_image">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Select a Image.
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
								 	 <img class="img82x132" id="myimage" src="<?php echo base_url();?>assets/uploads/<?php echo $edit_shop['s_image'] ;?>" alt=""/>
                                     <!--<input type="hidden" name="org_img" value="<?php echo $edit_shop['s_image'] ;?>" />-->
                                   <input class="input-file " onchange="onFileSelected(event)" name="s_image" id="fileInput" type="file"/>
								</div>
							  </div>
                             
                             <div class="control-group">
								<label class="control-label"><dt>Video :</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="video" id="video" type="text" value="<?php echo $edit_shop['s_video'] ;?>" >
								</div>
							  </div>
                               <div class="control-group">
								<label class="control-label"><dt>Notification 1 :</dt></label>
								<div class="controls">
								 
                                   <textarea class="input-xlarge" name="notification1"><?php echo $edit_shop['s_notification1'] ;?></textarea>
								</div>
							  </div>
                               <div class="control-group">
								<label class="control-label"><dt>Notification 2 :</dt></label>
								<div class="controls">
								 
                                  <textarea class="input-xlarge" name="notification2"><?php echo $edit_shop['s_notification2'] ;?></textarea>
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_d_frm">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Select a from Date.
                               </div>
                               <div class="control-group">
								<label class="control-label"><dt>Date From :</dt></label>
								<div class="controls">
                                <?php
										$date_from =$edit_shop['d_from'] ;
										$date_to = $edit_shop['d_to'] ;
										$f_date = date('m/d/Y',strtotime($date_from));
										$t_date = date('m/d/Y',strtotime($date_to));
									?>
								
                                   <input type="text" class="input-xlarge datepicker" name="date_frm" id="date_frm" value=" <?php echo $f_date ;?>">
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_d_to">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Select a to Date.
                               </div>
                               <div class="control-group">
								<label class="control-label"><dt>Date To :</dt></label>
								<div class="controls">
								 
                                   <input type="text" class="input-xlarge datepicker" name="date_to" id="date_to" value="<?php echo  $t_date;?>">
								</div>
							  </div>
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary" id="btn_edit_shop">Add shop</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
