<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="locations.php">Locations</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Add Location</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Country</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>	  
                              <div class="control-group">
								<label class="control-label"><dt>Country :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" id="country" type="text" value="">
								</div>
							  </div>
                            
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add Country</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
                    
                    
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>State</h2>
						
					</div>
					
                    
                    <div class="box-content">
						<form class="form-horizontal">
							<fieldset>	  
                              <div class="control-group">
								<label class="control-label"><dt>Country :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectCountry" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                               <div class="control-group">
								<label class="control-label"><dt>State :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" id="state" type="text" value="">
								</div>
							  </div>
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add State</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
                    
                    
                    
				</div>
			</div>
            
             <div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>City</h2>
						
					</div>
					
                    
                    <div class="box-content">
						<form class="form-horizontal">
							<fieldset>	  
                              <div class="control-group">
								<label class="control-label"><dt>Country :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectCityCountry" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>State :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectCityState" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                               <div class="control-group">
								<label class="control-label"><dt>City :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" id="city" type="text" value="">
								</div>
							  </div>
                              
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add City</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
                    
                    
                    
				</div>
			</div>
            
            <div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Location</h2>
						
					</div>
					
                    
                    
                    <div class="box-content">
						<form class="form-horizontal">
							<fieldset>	  
                              <div class="control-group">
								<label class="control-label"><dt>Country :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectLocationCountry" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>State :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectLocationState" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>City :</dt></label>
								<div class="controls">
								 <select class="input-xlarge" id="selectLocationCity" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select>
								</div>
							  </div>
                               <div class="control-group">
								<label class="control-label"><dt>Location :</dt></label>
								<div class="controls">
								 <input class="input-xlarge" id="location" type="text" value="">
								</div>
							  </div>
                              
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add City</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
