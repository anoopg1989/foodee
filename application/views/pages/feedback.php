<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Feedback</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Feedback</h2>
						<div class="box-icon">														
						
                        </div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>User</th>
                                  <th>Shop Name</th>
                                  <th>Bill ID</th>
								  <th>Bill Amt</th>
                                  <th>Bonus Points</th>
								  <th>Attachment</th>
								 
                                  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($feedbacks as $feedback_item): ?>
							<tr>
								<td class="center address"><?= $feedback_item['uname'];?></td>
                                <td class="center address"><?= $feedback_item['sname'].",".$feedback_item['lname'];?></td>
                                <td class="center number"><?= $feedback_item['s_bill_id'];?></td>
								<td class="center number"><?= $feedback_item['f_bill_amnt'];?></td>
                                <td class="center number"><?= $feedback_item['i_bonus'];?></td>
								<td><a href="<?php echo base_url();?>assets/uploads/<?= $feedback_item['s_attachment'];?>" target="_blank">View</a><!--<img class="img82x132" src="img/offer_image/offer_img1.jpg" />--></td>
								
                                <td class="center btn-td">
									<a class="btn btn-tbl-more" href="<?php echo base_url();?>feedback/verify_feedback/<?= $feedback_item['pk_id'];?>">										
										Verify                                          
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
