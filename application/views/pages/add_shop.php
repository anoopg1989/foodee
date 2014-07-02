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
						<a href="#">Add Shop</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Shop</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="add_shop_form" method="post" action="<?php echo base_url();?>shops/create_shop" enctype="multipart/form-data">
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
								 <input class="input-xlarge" name="sname" id="name" type="text" value="">
								</div>
							  </div>
                              
                              <!--<div class="alert alert-error error" id="error_logo">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Select a Image.
                               </div>-->
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
								 <img class="img98x86" id="logo_img" src="" alt="select"/>
                                   <input class="input-file " onchange="onLogoSelected(event)" name="s_logo" id="fileInput_logo" type="file"/>
                                   <span class="inline">100px X 100px</span>
								</div>
							  </div>
                              
                               <div class="control-group">
								<label class="control-label"><dt>Description :</dt></label>
								<div class="controls">  
                                
								 <input class="input-xlarge" name="decription" type="text" value="">
								</div>
							  </div>
                               
                               <div class="control-group">
								<label class="control-label"><dt>Detail Description :</dt></label>
								<div class="controls">
								 
                                   <textarea class="input-xlarge" name="detail_description"></textarea>
								</div>
							  </div>
                              
                              
                              
                              <div class="alert alert-error error" id="error_min_order">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter Minimum Order Quantity.
                            	</div>  
                              <div class="control-group">
								<label class="control-label"><dt>Minimum Order Quantity :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" name="min_order" id="min_order" type="number" value="">
								</div>
							  </div>
                              
                              <div class="alert alert-error error" id="error_min_delivery">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter Minimum Delivery time.
                            	</div>  
                              <div class="control-group">
								<label class="control-label"><dt>Minimum Delivery Time(In minutes) :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" name="min_delivery" id="min_delivery" type="number" value="">
								</div>
							  </div>
                              
                               <div class="alert alert-error error" id="error_address">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter a Address.
                            	</div> 
                               <div class="control-group">
								<label class="control-label"><dt>Address :</dt></label>
								<div class="controls">
								 
                                   <textarea class="input-xlarge" name="address" id="address"></textarea>
								</div>
							  </div>
                              
                             
                              <!--<div class="alert alert-error error" id="error_cat">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a Category.
                            	</div> 
                              <div class="control-group">
								<label class="control-label"><dt>Category :</dt></label>
								<div class="controls">
								 	<select class="input-xlarge" name="cat_name" id="selectCategory" data-rel="chosen">
                                     <?php /*?><?php foreach ($category as $category_item): ?>
                                        <option value="<?= $category_item['pk_id'] ;?>"><?= $category_item['s_name'] ;?></option>
                                        
                                      <?php endforeach ?><?php */?>
								  </select>
								</div>
							  </div>-->
                              <div class="alert alert-error error" id="error_city">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a City.
                            	</div>
                              <div class="control-group">
								<label class="control-label"><dt>City :</dt></label>
								<div class="controls">
								   <select class="input-xlarge" name="city" id="shop_selectCity" data-rel="chosen">
                                   <option value="-1" selected>Select a City</option>
									<?php foreach ($city as $city_item): ?>
                                        <option value="<?= $city_item['pk_id'] ;?>"><?= $city_item['s_name'] ;?></option>
                                        
                                      <?php endforeach ?>
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
								   <select class="input-xlarge" name="shop_selectLocation" id="shop_selectLocation" data-rel="chosen">
									<option value="-1">Select a Location</option>
									
								  </select>
								</div>
							  </div>
                               <div class="alert alert-error error" id="error_deliveryLocation">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select Locations.
                            	</div>
                               <div class="control-group">
								<label class="control-label"><dt>Delivery Locations :</dt></label>
								<div class="controls">
								 
                                   <select id="shop_deliveryLocation" name="shop_deliveryLocation[]" class="input-xlarge" multiple data-rel="chosen">
                                   <?php foreach ($locations as $location_item): ?>
                                        <option value="<?= $location_item['pk_id'] ;?>"><?= $location_item['s_name'] ;?></option>
                                        
                                      <?php endforeach ?>
									
								  </select>
								</div>
							  </div>
                              </fieldset>
                              	<fieldset class="gllpLatlonPicker">
                                   <div class="gllpMap">Google Maps</div>
                                   <br/>
                                    <!--<div class="alert alert-error error" id="error_lat">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Lattitude.
                                    </div>-->
                                   <div class="control-group">
                                        <label class="control-label"><dt>Lattitude :</dt></label>
                                        <div class="controls">
                                            <input class="input-xlarge gllpLatitude" name="lat" id="lat" type="number" value="">
                                        </div>
                                    </div>
                                    <!--<div class="alert alert-error error" id="error_lon">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Longitude.
                                    </div>-->
                                    <div class="control-group">
                                        <label class="control-label"><dt>Longitude :</dt></label>
                                        <div class="controls">
                                            <input class="input-xlarge gllpLongitude" name="long" id="long" type="number" value="">
                                        </div>
                                     </div>
                                    
                                    
                            	</fieldset>
                            
                              <fieldset>
                              
                              <div class="alert alert-error error" id="error_cname">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Contact Name.
                                </div>
                               <div class="control-group">
								<label class="control-label"><dt>First Contact Name :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" name="cntct_name" id="cntct_name" type="text" value="">
								</div>
							  </div>
                              
                                <div class="alert alert-error error" id="error_m_phone1">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Mobile Number.
                               </div>
                              <div class="control-group">
								<label class="control-label"><dt>Mobile Phone 1:</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="m_phone1" id="m_phone1" type="text" value="">
								</div>
							  </div>
                              
                             
                               <div class="control-group">
								<label class="control-label"><dt>Second Contact Name :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" name="scnd_cntct_name" id="scnd_cntct_name" type="text" value="">
								</div>
							  </div>
                              
                               <div class="control-group">
								<label class="control-label"><dt>Mobile Phone 2:</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="m_phone2" id="m_phone2" type="text" value="">
								</div>
							  </div>
                              
                              <div class="alert alert-error error" id="error_l_phone1">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        Enter a Phone Land Line Number.
                               </div>
                              <div class="control-group">
								<label class="control-label"><dt>Land Phone 1 :</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="l_phone1" id="l_phone1" type="text" value="">
								</div>
							  </div>
                              
                             
                              <div class="control-group">
								<label class="control-label"><dt>Land Phone 2:</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="l_phone2" id="l_phone2" type="text" value="">
								</div>
							  </div>
                              
                            	 <div class="control-group">
								<label class="control-label"><dt>Mobile Phone 3:</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="m_phone3" id="m_phone3" type="text" value="">
								</div>
							  </div>
                              
                             
                             
                              
                             
                             
                              <!-- <div class="alert alert-error error" id="error_image">
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
								 <img class="img82x132" id="myimage" src="" alt="select"/>
                                   <input class="input-file " onchange="onFileSelected(event)" name="s_image" id="fileInput" type="file"/>
								</div>
							  </div>
                             
                             <div class="control-group">
								<label class="control-label"><dt>Video :</dt></label>
								<div class="controls">
								 
                                   <input class="input-xlarge" name="video" id="video" type="text" value="http://" >
								</div>
							  </div>-->
                               
                              
                             
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary" id="btn_add_shop">Add shop</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
