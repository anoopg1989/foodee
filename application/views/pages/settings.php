<?php include('header.php'); ?>


			<?php 
				$cnt = 1;
				foreach ($settings as $settings_item):
					if($cnt == 1) //bOnus Point
					{
						$bonus_pk_id = $settings_item['pk_id'];
						$bonus_rupees = $settings_item['s_value'];
					}
					if($cnt == 2)  // Coupon expiry 
					{
						$coupon_expiry_pk_id = $settings_item['pk_id'];
						$coupon_expiry_time = $settings_item['s_value'];
					}
					$cnt++;
				 endforeach 
		    ?>
			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Settings</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Settings</h2>
						<div class="box-icon">														
						
                        </div>
					</div>
					<div class="box-content">
						<ul class="nav nav-tabs" id="myTab">
							<li class="active"><a href="#bonus">Bonus Point</a></li>
							<li><a href="#coupon">Coupon</a></li>
							<li><a href="#messages">Something</a></li>
						</ul>
						 
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane active" id="bonus">
								
								<form class="form-horizontal" action="<?php echo base_url();?>settings/edit_bonus_point" method="post" id="bonus_update_form">
                                    <fieldset>
                                         <div class="alert alert-error error" id="Empty_bonus_error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            Enter Rupees and try submitting again.
                                        </div>  	  
                                      <div class="control-group">
                                        <label class="control-label span3"><dt>Bonus Point 1 = Rupees&nbsp;&nbsp;&nbsp;</dt></label>
                                        <div class="controls">
                            <input class="input-xlarge" id="pk_id_bonus" name="pk_id_bonus" type="hidden" value="<?php echo $bonus_pk_id ;?>" />
                                         <input class="input-xlarge" id="rupees" name="rupees" type="number" value="<?php echo $bonus_rupees ;?>" />
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" id="btn_bonus_update">Update</button>
                                        
                                      </div>
                                    </fieldset>
                                
                                </form>
                                
							</div>
							<div class="tab-pane" id="coupon">
								
								<form class="form-horizontal" action="<?php echo base_url();?>settings/edit_coupon_expiry" method="post" id="coupon_expiry_update_form">
                                    <fieldset>
                                         <div class="alert alert-error error" id="Empty_error">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            Enter all fields and try submitting again.
                                        </div>  	  
                                      <div class="control-group">
                                        <label class="control-label"><dt>Expiry Time in Hours</dt></label>
                                        <div class="controls">
                                         <input class="input-xlarge" id="pk_id_coupon" name="pk_id_coupon" type="hidden" value="<?= $coupon_expiry_pk_id; ?>" />
                                         <input class="input-xlarge" id="bonus" name="hours" type="number" value="<?= $coupon_expiry_time; ?>" />
                                        </div>
                                      </div>
                                      <div class="form-actions">
                                        <button type="submit" class="btn btn-primary" id="btn_coupon_expiry_update">Update</button>
                                        
                                      </div>
                                    </fieldset>
                                
                                </form>
							</div>
							<div class="tab-pane" id="messages">
								<h3>Something <small>small text</small></h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales at. Nulla tellus elit, varius non commodo eget, mattis vel eros. In sed ornare nulla. Donec consectetur, velit a pharetra ultricies, diam lorem lacinia risus, ac commodo orci erat eu massa. Sed sit amet nulla ipsum. Donec felis mauris, vulputate sed tempor at, aliquam a ligula. Pellentesque non pulvinar nisi.</p>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
