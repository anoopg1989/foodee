<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Shops</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Shops</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/view/add_shop.php" class="btn btn-add">ADD NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
                                  <th>City</th>
								  <th>Location</th>
                                  <th>Status</th>
								  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($shops as $shops_item): ?>
							<tr>
								<td><?php echo $shops_item['sname']?></td>
                                <td class="center"><?php echo $shops_item['cityname']?></td>
								<td class="center"><?php echo $shops_item['lname']?></td>
								 <?php
									if($shops_item['i_hide'] == 2)
									{
								?>
                                		<td class="center">Hidden</td>
                                 <?php
									}
									else
									{
								?>	
                                		<td class="center">Shown</td>
                                 <?php
									}
								 ?>
                               
                                <td class="center btn-td">
									<a class="btn btn-tbl-more" href="<?php echo base_url();?>shops/view_shop/<?php echo $shops_item['sid']?>">
										
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
