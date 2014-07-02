<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();  ?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Redeems</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Redeems</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                              	  <th>Date</th>
                                  <th>User Name</th>
                                  <th>Loyality Name</th>
								  <th>Image</th>
								  <th>Redeem Points</th>
								 
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($redeems as $redeem_item): ?>
							<tr>
                            	<td class="center address"><?php echo $redeem_item['d_date']?></td>
                                <td class="center address"><?php echo $redeem_item['uname']?></td>
                                <td class="center address"><?php echo $redeem_item['loyalname']?></td>
								<td><img class="img82x132" src="<?php echo base_url();?>assets/uploads/<?php echo $redeem_item['loyalimage']?>" /></td>
								<td class="center number"><?php echo $redeem_item['loyalpoint']?></td>
								
                                
							</tr>
                            
                             <?php endforeach ?>
                          </tbody>
                        </table>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
