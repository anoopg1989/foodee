<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/offers">Offers</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Offer View</a>
					</li>
				</ul>
			</div>
			
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Offers</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/offer_edit/<?php echo $offers['pk_id']?>" class="btn btn-add">EDIT</a>
                            <?php
								if($offers['i_hide'] == 2)
								{
							?>
                             		<a href="<?php echo base_url();?>offers/show_offer/<?php echo $offers['pk_id']?>" class="btn btn-add">UNBLOCK</a>
                             <?php
								}
							 	else
								{
							?>
                            		<a href="<?php echo base_url();?>offers/hide_offer/<?php echo $offers['pk_id']?>" class="btn btn-add">BLOCK</a>
                             <?php
								}
							?>
                            <a href="<?php echo base_url();?>offers/delete_offer/<?php echo $offers['pk_id']?>" class="btn btn-add">DELETE</a>
							
						</div>
					</div>
					<div class="box-content">
                    	<div class="row-fluid">
                            <div class="span4">
                            	<img src="<?php echo base_url();?>assets/uploads/<?php echo $offers['simage'] ;?>" />
                            </div>
                            <div class="span8">
                            	<table class="view_table">
                            		<tr>
                                    	<td class="title">Percentage</td>
                                        <td><?php echo $offers['f_precentage'] ;?></td>
                                    </tr>
                                  
                                    <tr>
                                    	<td class="title">Shop</td>
                                        <td><?php echo $offers['sname'] ;?></td>
                                    </tr>
                                   
                                    <tr>
                                    	<td class="title">Date from</td>
                                        <td><?php echo $offers['d_from'] ;?></td>
                                    </tr>
                                    <tr>
                                    	<td class="title">Date to</td>
                                        <td><?php echo $offers['d_to'] ;?></td>
                                    </tr>
                                   
                            	</table>
                            </div>
                        </div>
						
					  	<div class="clearfix"></div>
					</div>
				</div>
			</div>
					
			

		  
       
<?php include('footer.php'); ?>
