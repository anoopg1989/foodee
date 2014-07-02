<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Locations</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Locations</h2>
						
					</div>
					<div class="box-content">
						<div class="row-fluid">
                        	<div class="box span3">
                                <div class="box-header well" data-original-title="">
                                    <h2>Country</h2>
                                    <div class="box-icon">
                                        <a href="#" class="btn btn-addcntry btn-add">ADD NEW</a>
                                       
                                    </div>
                                </div>
                                <div class="box-content">
                                      <ul class="dashboard-list">
                                      		<?php foreach ($country as $country_item): ?>
                                            <li>
                                                <a href="#"  title="Click to view states." data-rel="tooltip" id="view_cntry" data-value="<?php echo $country_item['pk_id'] ?>">
                                                    <?php echo $country_item['s_name'] ?>                                 
                                                </a>
                                                <button class="btn btn-primary pull-right" id="edit_cntry" data-value="<?php echo $country_item['pk_id'] ?>"><i class="icon-edit icon-white"></i></button>
                                            </li>
                                           <?php endforeach ?>
                                     </ul>               
                              	</div>
							</div>
                            
                            <div class="box span3">
                                <div class="box-header well" data-original-title="">
                                    <h2>States</h2>
                                    <div class="box-icon">
                                        <a href="#" class="btn btn-addstate btn-add error">ADD NEW</a>
                                       
                                    </div>
                                </div>
                                <div class="box-content">
                                      <ul class="dashboard-list" id="state_list">
                                           
                                          
                                     </ul>               
                              	</div>
							</div>
                            
                             <div class="box span3">
                                <div class="box-header well" data-original-title="">
                                    <h2>City</h2>
                                    <div class="box-icon">
                                        <a href="#" class="btn btn-addcity btn-add error">ADD NEW</a>
                                       
                                    </div>
                                </div>
                                <div class="box-content">
                                      <ul class="dashboard-list" id="city_list">
                                            
                                          
                                     </ul>               
                              	</div>
							</div>
                            
                            
                             <div class="box span3">
                                <div class="box-header well" data-original-title="">
                                    <h2>Location</h2>
                                    <div class="box-icon">
                                        <a href="#" class="btn btn-addlocation btn-add error">ADD NEW</a>
                                       
                                    </div>
                                </div>
                                <div class="box-content">
                                      <ul class="dashboard-list" id="location_list">
                                           
                                          
                                     </ul>               
                              	</div>
							</div>
                            
                            
                        </div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
            <!-- Pop up for add country -->		
			
			<div class="modal hide fade" id="addCountry">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add New Country</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    	<fieldset>
                        	<div class="alert alert-error error" id="cntry_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Enter a Country name and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="cntry_timeout">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               Connection Timed Out. Please wait and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="cntry_state">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               
                            </div>
                        	<div class="control-group">
								<label class="control-label" for="focusedInput">Country</label>
								<div class="controls">
								  <input class="input-xlarge" id="input_cntry" type="text" value="">
								</div>
							  </div>
                        	
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" id="btn_add_cntry">Save changes</a>
                </div>
            </div>
            
             <!-- Pop up for add state -->		
			
			<div class="modal hide fade" id="addState">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add New State</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    	<fieldset>
                        	
                            <div class="alert alert-error error" id="cntry_click_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Click a Country and try submitting again.
                            </div>
                        	<div class="alert alert-error error" id="state_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Enter a State name and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="state_timeout">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               Connection Timed Out. Please wait and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="state_state">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               
                            </div>
                        	<div class="control-group">
								<label class="control-label" for="focusedInput">State</label>
								<div class="controls">
								  <input class="input-xlarge" id="input_state" type="text" value="">
								</div>
							  </div>
                        	
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" id="btn_add_state">Save changes</a>
                </div>
            </div>
		  
          	 <!-- Pop up for add city -->		
			
			<div class="modal hide fade" id="addCity">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add New City</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    	<fieldset>
                        	<div class="alert alert-error error" id="city_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Enter a City name and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="city_timeout">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               Connection Timed Out. Please wait and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="city_state">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               
                            </div>
                        	<div class="control-group">
								<label class="control-label" for="focusedInput">City</label>
								<div class="controls">
								  <input class="input-xlarge" id="input_city" type="text" value="">
								</div>
							  </div>
                        	
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" id="btn_add_city">Save changes</a>
                </div>
            </div>
            
            
             <!-- Pop up for add location -->		
			
			<div class="modal hide fade" id="addLocation">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Add New Location</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                    	<fieldset>
                        	<div class="alert alert-error error" id="loc_error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                Enter a Location name and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="loc_timeout">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               Connection Timed Out. Please wait and try submitting again.
                            </div>
                            <div class="alert alert-error error" id="loc_state">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                               
                            </div>
                        	<div class="control-group">
								<label class="control-label" for="focusedInput">Location</label>
								<div class="controls">
								  <input class="input-xlarge" id="input_location" type="text" value="">
								</div>
							  </div>
                        	
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" id="btn_add_loc">Save changes</a>
                </div>
            </div>
            
            
            
             <!-- Pop up for Edit -->		
			
			<div class="modal hide fade" id="edit_all">
                <!-- load page using js -->
            </div>
       
<?php include('footer.php'); ?>
