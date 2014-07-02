<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/offers.php">Offers</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Edit Offer</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Offer</h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo base_url();?>offers/edit_offer" method="post" id="offer_edit_form">
							<fieldset>	  
                            	 <div class="alert alert-error error" id="Empty_error">
                                	<button type="button" class="close" data-dismiss="alert">×</button>
                                	Enter all fields and try submitting again.
                            	</div>  
                              <div class="control-group">
								<label class="control-label"><dt>Precentage :</dt></label>
								<div class="controls">
                                <input class="input-xlarge" name="input_pk_id" type="hidden" value="<?php echo $edit_offer['pk_id'] ;?>">
								 <input class="input-xlarge" id="precentage" name="precentage" type="number" value="<?php echo $edit_offer['f_precentage'] ;?>">
								</div>
							  </div>
                              
                            
							  
                               <div class="control-group">
								<label class="control-label"><dt>Shop :</dt></label>
								<div class="controls">
								   <select class="input-xlarge" id="selectShop" name="shop" data-rel="chosen">
                                   <?php foreach ($offer_shops as $shop_item): ?>
                                   		<?php
											if($shop_item['sid'] == $edit_offer['fk_i_shop'])
											{	
										?>
												<option selected value="<?php echo $shop_item['sid'];?>"><?php echo $shop_item['sname'].",".$shop_item['lname'] ; ?></option>
                                        <?php
											}
											else
											{
										?>
                                        		<option value="<?php echo $shop_item['sid'];?>"><?php echo $shop_item['sname'].",".$shop_item['lname'] ; ?></option>
                                        <?php
											}
											
										?>
									<?php endforeach ?>
								  </select>
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>Date from :</dt></label>
								<div class="controls">
                                	<?php
										$date_from = $edit_offer['d_from'] ;
										$date_to = $edit_offer['d_to'] ;
										$f_date = date('m/d/Y',strtotime($date_from));
										$t_date = date('m/d/Y',strtotime($date_to));
									?>
								  <input type="text" class="input-xlarge datepicker" id="date_frm" name="f_date" value="<?= $f_date ?>">
								</div>
							  </div>
                              <div class="control-group">
								<label class="control-label"><dt>Date to :</dt></label>
								<div class="controls">
								  <input type="text" class="input-xlarge datepicker" id="date_to" name="t_date" value="<?= $t_date ?>">
								</div>
							  </div>
                             
                              <div class="form-actions">
								<button type="submit" class="btn btn-primary" id="btn_edit_offer">Update offer</button>
								<button class="btn">Cancel</button>
							  </div>
                            </fieldset>
                        </form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
