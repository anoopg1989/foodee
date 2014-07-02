<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Users</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Users</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								  <th>Email</th>
								  <th>Phone</th>
								  <th>Status</th>
								  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php foreach ($users as $users_item): ?>
							<tr>
								<td><?php echo $users_item['s_name']?></td>
								<td class="center"><?php echo $users_item['s_email']?></td>
								<td class="center"><?php echo $users_item['s_phone']?></td>
								 <?php
									if($users_item['i_hide'] == 2)
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
									<a class="btn btn-tbl-more" href="<?php echo base_url();?>users/view_user/<?php echo $users_item['pk_id']?>">
										
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
