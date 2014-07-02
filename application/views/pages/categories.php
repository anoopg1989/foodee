<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">categories</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>categories</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/view/add_category" class="btn btn-add">ADD NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Name</th>
								   <th>Image</th>
								   <th>Status</th>
								 <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
                          	<?php foreach ($category as $category_item): ?>
							<tr>
								<td><?php echo $category_item['s_name']?></td>
								<td><img class="img82x132" src="<?php echo base_url();?>assets/uploads/<?php echo $category_item['s_img']?>" /></td>
                               	<?php
									 if($category_item['i_hide'] != 2)
									 {
								?>
                                <td>Shown</td>
                                <?php
									 }
									else
									{
								?>
                                 <td>Hidden</td>
                                <?php
									}
								?>
								<td class="center btn-td">
									
                                    
									<a class="btn btn-tbl-more" href="<?php echo base_url();  ?>pages/category_edit/<?php echo $category_item['pk_id']?>">
										
										Edit                                            
									</a>
									<a class="btn btn-tbl-more" href="<?php echo base_url();  ?>category/delete_category/<?php echo $category_item['pk_id']?>">
										
										Delete
									</a>
                                    
                                    <?php
									 if($category_item['i_hide'] == 0)
									 {
								?>
                                <a class="btn btn-tbl-more" href="<?php echo base_url();  ?>category/hide_category/<?php echo $category_item['pk_id']?>">
										
										Hide                                      
                                    </a>
                                <?php
									 }
									else
									{
								?>
                                 <a class="btn btn-tbl-more" href="<?php echo base_url();  ?>category/show_category/<?php echo $category_item['pk_id']?>">
										
										Show                                     
                                    </a>
                                <?php
									}
								?>
                                    
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
