<!DOCTYPE html>
<html lang="en">
<head>
	<!--
		Charisma v1.0.0

		Copyright 2012 Muhammad Usman
		Licensed under the Apache License v2.0
		http://www.apache.org/licenses/LICENSE-2.0

		http://usman.it
		http://twitter.com/halalit_usman
	-->
	<meta charset="utf-8">
	<title>Foodee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- The styles -->
	<?php echo link_tag('assets/css/bootstrap-cerulean.css'); ?>
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
    
	<?php echo link_tag('assets/css/bootstrap-responsive.css'); ?>
    
   	<?php echo link_tag('assets/css/charisma-app.css'); ?>
	<?php echo link_tag('assets/css/jquery-ui-1.8.21.custom.css'); ?>
	<?php echo link_tag('assets/css/fullcalendar.css'); ?>
	<?php echo link_tag('assets/css/fullcalendar.print.css'); ?>
	<?php echo link_tag('assets/css/chosen.css'); ?>
	<?php echo link_tag('assets/css/uniform.default.css'); ?>
	<?php echo link_tag('assets/css/colorbox.css'); ?>
	<?php echo link_tag('assets/css/jquery.cleditor.css'); ?>
	<?php echo link_tag('assets/css/jquery.noty.css'); ?>
	<?php echo link_tag('assets/css/noty_theme_default.css'); ?>
	<?php echo link_tag('assets/css/elfinder.min.css'); ?>
	<?php echo link_tag('assets/css/elfinder.theme.css'); ?>
	<?php echo link_tag('assets/css/jquery.iphone.toggle.css'); ?>
	<?php echo link_tag('assets/css/opa-icons.css'); ?>
	<?php echo link_tag('assets/css/uploadify.css'); ?>
	<?php echo link_tag('assets/css/jquery-gmaps-latlon-picker.css'); ?>
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		<script src="<?php echo base_url();?>assets/js/jquery-1.7.2.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
		<script src="<?php echo base_url();?>assets/js/jquery-gmaps-latlon-picker.js"></script>

</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img alt="foodee Logo" src="img/logo_main.png" /></a>
				
				
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i><span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="<?php echo base_url();  ?>login/logout">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
				
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main</li>
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/dashboard"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/users"><i class="icon-edit"></i><span class="hidden-tablet"> Users</span></a></li>
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/shops"><i class="icon-list-alt"></i><span class="hidden-tablet"> Shops</span></a></li>
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/analytics"><i class="icon-font"></i><span class="hidden-tablet"> Analytics</span></a></li>
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/locations"><i class="icon-picture"></i><span class="hidden-tablet"> Locations</span></a></li>
						
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/categories"><i class="icon-align-justify"></i><span class="hidden-tablet"> Categories</span></a></li>
                        <li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/offers"><i class="icon-eye-open"></i><span class="hidden-tablet"> Food Deals</span></a></li>
                        
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/loyalty_programs"><i class="icon-calendar"></i><span class="hidden-tablet"> Foodons</span></a></li>
                        <li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/feedback"><i class="icon-th"></i><span class="hidden-tablet"> Feedbacks</span></a></li>
                        <li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/redeems"><i class="icon-calendar"></i><span class="hidden-tablet"> Redeems</span></a></li>
                        <!--<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/notifications"><i class="icon-th"></i><span class="hidden-tablet"> Notifications</span></a></li>-->
						<li><a class="ajax-link" href="<?php echo base_url();  ?>pages/view/settings"><i class="icon-th"></i><span class="hidden-tablet"> Settings</span></a></li>
					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>
