<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="dashboard.php">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Locations</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Locations</h2>
						<div class="box-icon">
							<a href="add_location.php" class="btn btn-add">ADD NEW</a>
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Country</th>
								  <th>States</th>
                                  <th>Cities</th>
                                  <th>Location</th>
								  
								  <th class="btn-th"></th>
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>Some Country</td>
								<td class="center">Some States</td>
                                <td class="center">Some Cities</td>
								<td class="center">Locationss</td>
								
								<td class="center btn-td">
									
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
                          </tbody>
                        </table>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
