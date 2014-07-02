<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Offers</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Offers</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/view/add_offer" class="btn btn-add">ADD NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Image</th>
								  <th>Shop Details</th>
								  <th>Offer Percentage</th>
								  
								  <th>Date (From-To)</th>
                                  <th>Status</th>
                                  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($offers as $offers_item): ?>
							<tr>
								<td><img class="img82x132" src="<?php echo base_url();?>assets/uploads/<?php echo $offers_item['simage']?>" /></td>
								<td class="center address"><?php echo $offers_item['sname']?><br/>
                               <?php echo $offers_item['lname']?><br/>
                                <?php echo $offers_item['cname']?>,<?php echo $offers_item['stname']?><br/>
                                <?php echo $offers_item['cntryname']?></td>
								<td class="center number"><?php echo $offers_item['f_precentage']?></td>
								
								<td class="center date">
									<span><?php echo $offers_item['d_from']?></span>
                                    TO
                                    <span><?php echo $offers_item['d_to']?></span>
								</td>
                                <?php
									if($offers_item['i_hide'] == 2)
									{
								?>
                                		<td class="center date">Hidden</td>
                                 <?php
									}
									else
									{
								?>	
                                		<td class="center date">Shown</td>
                                 <?php
									}
								 ?>
                                <td class="center btn-td">
									<a class="btn btn-tbl-more" href="<?php echo base_url();?>offers/view_offer/<?php echo $offers_item['pk_id']?>">
										
										More                                           
									</a>
								</td>
							</tr>
                             <?php endforeach ?>
                           
                            
                          </tbody>
                        </table>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
