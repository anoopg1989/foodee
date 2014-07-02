<?php include('header.php'); ?>


			<div>
				<ul class="breadcrumb">
					
					<li>
						<a href="<?php echo base_url();?>pages/view/dashboard">Dashboard</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="<?php echo base_url();?>pages/view/shops">Shops</a> <span class="divider">/</span>
					</li>
                    <li>
						<a href="#">Shop View</a>
					</li>
				</ul>
			</div>
			
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header well">
						<h2>Shop</h2>
						<div class="box-icon">
							<a href="<?php echo base_url();?>pages/shop_edit/<?php echo $shops['pk_id']?>" class="btn btn-add">EDIT</a>
                             <?php
								if($shops['i_hide'] == 2)
								{
							?>
                             		<a href="<?php echo base_url();?>shops/show_shop/<?php echo $shops['pk_id']?>" class="btn btn-add">UNBLOCK</a>
                             <?php
								}
							 	else
								{
							?>
                            		<a href="<?php echo base_url();?>shops/hide_shop/<?php echo $shops['pk_id']?>" class="btn btn-add">BLOCK</a>
                             <?php
								}
							?>
                            <a href="<?php echo base_url();?>shops/delete_shop/<?php echo $shops['pk_id']?>" class="btn btn-add">DELETE</a>
							
						</div>
					</div>
					<div class="box-content shop_details">
                    	<div class="row-fluid">
                            <div class="span2">
                                <img src="<?php echo base_url();?>assets/uploads/<?php echo $shops['s_logo'] ;?>" />
                             </div>
                             <div class="span3">
                                <dl>
                                  <dt>RESTURENT NAME</dt>
                                  	<dd><?php echo $shops['s_name']?></dd>
                                  <dt>Address</dt>
                                  	<dd><?php echo $shops['s_address']?></dd>
                                 
                                  <dt>Minimum order quantity</dt>
                                  	<dd><?php echo $shops['f_min_order_quantity']?></dd>
                                    
                                   <dt>Minimum Delivery Times</dt>
                                  	<dd><?php echo $shops['i_min_delivery_time']?></dd>
                                  	
                                </dl>
                             </div>
                             <div class="span3">
                                 <dl>
                                  <dt>Description</dt>
                                  	<dd><?php echo $shops['s_description']?></dd>
                                  <dt>location</dt>
                                  	<dd><?php echo $shops['lname'] ;?>,<?php echo $shops['cname'] ;?>,<?php echo $shops['stname'] ;?>,<?php echo $shops['cntryname'] ;?></dd>
                                  <dt>Detailed Description</dt>
                                  	<dd><?php echo $shops['s_detail_description']?></dd>
                                  <dt>Delivery Areas</dt>
                                  	<?php foreach ($delivery_areas as $delivery_areas_item): ?>
                                    	<dd><?php echo $delivery_areas_item['s_name']?></dd>
                                    <?php endforeach ?>
                                </dl>
                             </div>
                             <div class="span4">
                                <dl>
                                  <dt>Primary Contact</dt>
                                  	<dd><?php echo $shops['s_conatct_name_1']?>&nbsp;:&nbsp;<?php echo $shops['s_contact_num_3']?></dd>
                                  <dt>Secondary Contact</dt>
                                    <dd><?php echo $shops['s_conatct_name_2']?>&nbsp;:&nbsp;<?php echo $shops['s_contact_num_4']?></dd>
                                  <dt>Shop Contacts</dt>
                                    <dd><?php echo $shops['s_contact_num_1']?>&nbsp;,&nbsp;<?php echo $shops['s_contact_num_2']?>&nbsp;,&nbsp;<?php echo $shops['s_contact_num_5']?></dd>
                                </dl>
                             </div>
                         </div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
            
            
			
					
			

		  
       
<?php include('footer.php'); ?>
