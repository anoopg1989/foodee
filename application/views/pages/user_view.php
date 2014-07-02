<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/users">Users</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">User View</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>User</h2>
						<div class="box-icon">
							
                            <?php
								if($users['i_hide'] == 2)
								{
							?>
                             		<a href="<?php echo base_url();?>users/show_user/<?php echo $users['pk_id']?>" class="btn btn-add">UNBLOCK</a>
                             <?php
								}
							 	else
								{
							?>
                            		<a href="<?php echo base_url();?>users/hide_user/<?php echo $users['pk_id']?>" class="btn btn-add">BLOCK</a>
                             <?php
								}
							?>
                            <a href="<?php echo base_url();?>users/delete_user/<?php echo $users['pk_id']?>" class="btn btn-add">DELETE</a>
							
						</div>
					</div>
					<div class="box-content">
                    	<table class="view_table">
                        			<tr>
                                    	<td class="title">Type</td>
                                        <td><?php echo $users['type'] ;?></td>
                                    </tr>
                            		<tr>
                                    	<td class="title">Name</td>
                                        <td><?php echo $users['s_name'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Email</td>
                                        <td><?php echo $users['s_email'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Phone</td>
                                         <td><?php echo $users['s_phone'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Credits Balance</td>
                                         <td><?php echo $users['f_credit'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Redeemed</td>
                                         <td><?php echo $users['f_redeemed'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Status</td>
                                         <?php
											if($users['i_hide'] == 2)
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
                                        
                                    </tr>
                                    
                            	</table>
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
