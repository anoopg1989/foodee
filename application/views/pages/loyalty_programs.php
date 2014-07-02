<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();  ?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Loyality Programs</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Loyality Programs</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/view/add_loyality" class="btn btn-add">ADD NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Image</th>
								  <th>Title</th>
								  <th>Redeem Points</th>
								 
                                  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($loyality as $loyality_item): ?>
							<tr>
								<td><img class="img82x132" src="<?php echo base_url();?>assets/uploads/<?php echo $loyality_item['s_img']?>" /></td>
								<td class="center address"><?php echo $loyality_item['s_name']?></td>
								<td class="center number"><?php echo $loyality_item['i_point']?></td>
								
                                <td class="center btn-td">
									<a class="btn btn-tbl-more" href="<?php echo base_url();  ?>loyality/delete_loyality/<?php echo $loyality_item['pk_id']?>">
										
										Delete                                          
									</a>
                                   <a class="btn btn-tbl-more" href="<?php echo base_url();  ?>pages/loyality_edit/<?php echo $loyality_item['pk_id']?>">
										
										Edit                                        
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
