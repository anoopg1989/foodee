<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();  ?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Notifications</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Notifications</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/view/add_notification" class="btn btn-add">PUSH NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
                              	  <th>Date</th>
                                  <th>Shop Name</th>
                                  <th>Description</th>
								  <th class="btn-th"></th>
								 
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($notifications as $notification_item): ?>
							<tr>
                            	<td class="center address"><?php echo $notification_item['d_date']; ?></td>
                                <td class="center address"><?php echo $notification_item['sname'].",".$notification_item['lname']; ?></td>
                                <td class="center"><?php echo $notification_item['s_description']; ?></td>
								
								 <td class="center btn-td">
									<a class="btn btn-tbl-more" href="<?php echo base_url();  ?>loyality/delete_loyality/<?php echo $loyality_item['pk_id']?>">
										
										Delete                                          
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
