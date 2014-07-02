<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>LIVE ORDER MANAGEMENT</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>SL NO</th>
								  <th>TIME& DATE</th>
								  <th>CUSTOMER NAME</th>
								  <th>HOTEL NAME</th>
								  <th>DELIVERY TIME</th>
                                  <th>ORDER STATUS</th>
                                  <th>ACTIONS</th>
                                  
							  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>101</td>
								<td class="center">12.15 pm</td>
								<td class="center">sam john</td>
								<td class="center">Kettuvallam</td>
								<td class="center">3. PM</td>
                                <td class="center">
									<div class="btn-group">
                                        <button class="btn btn-large">PASSED</button>
                                        <button class="btn btn-large dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">PENDING</a></li>
                                            <li><a href="#">PASSED</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div>
								</td>
								<td class="center">
									<a class="btn btn-success" href="live_order_view.php">
										<i class="icon-zoom-in icon-white"></i>  
										View                                            
									</a>
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
