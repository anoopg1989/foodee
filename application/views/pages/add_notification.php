<?php include('header.php'); ?>



			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();  ?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();  ?>pages/view/notifications">Notifications</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Push Notification</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Notifications</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="notification_form" action="<?php echo base_url();?>notifications/create_notification" method="post" enctype="multipart/form-data">
							<fieldset>	 
                            	<div class="alert alert-error error" id="Empty_error">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter all fields and try submitting again.
                            	</div>
                              <div class="alert alert-error error" id="error_cat">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a Category.
                            	</div> 
                              <div class="control-group">
								<label class="control-label"><dt>Category :</dt></label>
								<div class="controls">
								 	<select class="input-xlarge" name="cat_name" id="selectCategory" data-rel="chosen">
                                     <?php foreach ($category as $category_item): ?>
                                        <option value="<?= $category_item['pk_id'] ;?>"><?= $category_item['s_name'] ;?></option>
                                        
                                      <?php endforeach ?>
								  </select>
								</div>
							  </div>
                              <div class="alert alert-error error" id="error_shop">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Select a Shop.
                            	</div>
                              <div class="control-group">
								<label class="control-label"><dt>Shop :</dt></label>
								<div class="controls">
								   <select class="input-xlarge" name="shop" id="selectShop" data-rel="chosen">
									<option value="-1">Select a Shop</option>
									
								  </select>
								</div>
                              </div>
                              <div class="control-group">
								<label class="control-label"><dt>Description :</dt></label>
								<div class="controls">  
                                
								 <input class="input-xlarge" name="decription" type="text" value="">
								</div>
							  </div>
                              
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary" id="btn_add_notification">Push Notification</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
