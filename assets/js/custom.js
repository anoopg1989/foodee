window.onload = function() { document.getElementById("add_shop_form").reset(); }
$(document).ready(function(){
	
	var cntry_val = "-1";
	var state_val = "-1";
	var city_val = "-1";
	//on click refresh list
	var site_url = "http://localhost/foodee/index.php/";
	$('.dashboard-list a#view_cntry').live('click',function(e)
	{
		cntry_val = $(this).data("value");
		var state_val = "-1";
		var city_val = "-1";
		$('.btn-addstate').show();
		$('.btn-addcity').hide();
		$('.btn-addlocation').hide();
		//alert(cntry_val);
		$('#state_list').empty();
		$('#location_list').empty();
		$('#city_list').empty();
		$.ajax({
					type: "POST",
					url: site_url+"location/view_state",
					data: {country : cntry_val},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							alert("Connection TimedOut Please Try Again Later");     
						}
						else {
							alert('An error occurred: ' + error + '');
							
						}
					},
					success: function(result) 
			 		{	
			 			var data = JSON.parse(result);
				
						
						 $.each(data.state, function(key,value)
						{
							//alert(value.s_name);
							$('#state_list').append('<li><a href="#" id="view_state"  title="Click to view City." data-rel="tooltip" data-value="'+value.pk_id+'">'+value.s_name+'</a><button class="btn btn-primary pull-right" id="edit_state" data-value="'+value.pk_id+'"><i class="icon-edit icon-white"></i></button></li>');
						});
							
					}
		});
		
	});
	$('.dashboard-list a#view_state').live('click',function(e)
	{
		
		state_val = $(this).data("value");
		$('.btn-addcity').show();
		$('.btn-addlocation').hide();
		//alert(cntry_val);
		var city_val = "-1";
		$('#city_list').empty();
		$('#location_list').empty();
		$.ajax({
					type: "POST",
					url: site_url+"location/view_city",
					data: {state : state_val},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							alert("Connection TimedOut Please Try Again Later");     
						}
						else {
							alert('An error occurred: ' + error + '');
							
						}
					},
					success: function(result) 
			 		{	
			 			var data = JSON.parse(result);
				
						
						 $.each(data.city, function(key,value)
						{
							//alert(value.s_name);
							$('#city_list').append('<li><a href="#" id="view_city"  title="Click to view City." data-rel="tooltip" data-value="'+value.pk_id+'">'+value.s_name+'</a><button class="btn btn-primary pull-right" id="edit_city" data-value="'+value.pk_id+'"><i class="icon-edit icon-white"></i></button></li>');
							
						});
							
					}
		});
		
	});
	$('.dashboard-list a#view_city').live('click',function(e)
	{
		$('.btn-addlocation').show();
		city_val = $(this).data("value");
		//alert(cntry_val);
		$('#location_list').empty();
		$.ajax({
					type: "POST",
					url: site_url+"location/view_location",
					data: {city : city_val},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							alert("Connection TimedOut Please Try Again Later");     
						}
						else {
							alert('An error occurred: ' + error + '');
							
						}
					},
					success: function(result) 
			 		{	
			 			var data = JSON.parse(result);
				
						
						 $.each(data.location, function(key,value)
						{
						
							
							$('#location_list').append('<li><a href="#" id="view_location"  title="Click to view City." data-rel="tooltip" data-value="'+value.pk_id+'">'+value.s_name+'</a><button class="btn btn-primary pull-right" id="edit_location" data-value="'+value.pk_id+'"><i class="icon-edit icon-white"></i></button></li>');
						});
							
					}
		});
		
	});

	// adding cntry
	
	$('#btn_add_cntry').on('click',function(e)
	{
		var cntry = $.trim($('#input_cntry').val());
		//var data_string = $(form).serialize(); // Collect data from form
		if(cntry == "")
		{
			$('#cntry_error').show();
			$('#cntry_error').delay(4000);
			$('#cntry_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
				$.ajax({
					type: "POST",
					url: site_url+"location/create_country",
					data: {country : cntry},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							$('#cntry_timeout').show(500);
							$('#cntry_timeout').delay(4000);
							$('#cntry_timeout').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
						}
						else {
							$('#cntry_state').slideDown('slow');
							$('#cntry_state').html('An error occurred: ' + error + '');
							$('#cntry_state').delay(4000);
							$('#cntry_state').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
							//alert(error);
						}
					},
					success: function(data) {
						
							location.reload();
					}
				});
	});
	
	///adding state
	$('#btn_add_state').on('click',function(e)
	{
		var cntry = cntry_val;
		var state_name = $.trim($('#input_state').val());
		//var data_string = $(form).serialize(); // Collect data from form
		if(state_name == "")
		{
			$('#state_error').show();
			$('#state_error').delay(4000);
			$('#state_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		if(cntry == "-1")
		{
			$('#cntry_click_error').show();
			$('#cntry_click_error').delay(4000);
			$('#cntry_click_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
				$.ajax({
					type: "POST",
					url: site_url+"location/create_state",
					data: {country : cntry,
							state : state_name},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							$('#state_timeout').show(500);
							$('#state_timeout').delay(4000);
							$('#state_timeout').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
						}
						else {
							$('#state_state').slideDown('slow');
							$('#state_state').html('An error occurred: ' + error + '');
							$('#state_state').delay(4000);
							$('#state_state').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
							//alert(error);
						}
					},
					success: function(data) {
						
						location.reload();
							///location.reload();
					}
				});
	});
	
	//adding city
	$('#btn_add_city').on('click',function(e)
	{
		var statev = state_val;
		var city_name = $.trim($('#input_city').val());
		//var data_string = $(form).serialize(); // Collect data from form
		if(city_name == "")
		{
			$('#city_error').show();
			$('#city_error').delay(4000);
			$('#city_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		if(statev == "-1")
		{
			$('#state_click_error').show();
			$('#state_click_error').delay(4000);
			$('#state_click_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
				$.ajax({
					type: "POST",
					url: site_url+"location/create_city",
					data: {state : statev,
							city : city_name},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							$('#city_timeout').show(500);
							$('#city_timeout').delay(4000);
							$('#city_timeout').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
						}
						else {
							$('#city_state').slideDown('slow');
							$('#city_state').html('An error occurred: ' + error + '');
							$('#city_state').delay(4000);
							$('#city_state').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
							//alert(error);
						}
					},
					success: function(data) {
						
						location.reload();
							///location.reload();
					}
				});
	});	
	
	//adding location
	$('#btn_add_loc').on('click',function(e)
	{
		var cityv = city_val;
		var loc_name = $.trim($('#input_location').val());
		//var data_string = $(form).serialize(); // Collect data from form
		if(loc_name == "")
		{
			$('#loc_error').show();
			$('#loc_error').delay(4000);
			$('#loc_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		if(cityv == "-1")
		{
			$('#loc_click_error').show();
			$('#loc_click_error').delay(4000);
			$('#loc_click_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
				$.ajax({
					type: "POST",
					url: site_url+"location/create_location",
					data: {city : cityv,
							location : loc_name},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							$('#loc_timeout').show(500);
							$('#loc_timeout').delay(4000);
							$('#loc_timeout').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
						}
						else {
							$('#loc_state').slideDown('slow');
							$('#loc_state').html('An error occurred: ' + error + '');
							$('#loc_state').delay(4000);
							$('#loc_state').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
							//alert(error);
						}
					},
					success: function(data) {
						
						location.reload();
							///location.reload();
					}
				});
	});	
	
	//Showing popup for editing.cntry
	$('#edit_cntry').live('click',function(e)
	{
		e.preventDefault();
		var pk_id = $(this).data('value');
		$('#edit_all').modal('show');
		
		$('#edit_all').load(site_url+'pages/loc_edit/1/'+pk_id);
	});
	
	//Showing popup for editing.state
	$('#edit_state').live('click',function(e)
	{
		e.preventDefault();
		var pk_id = $(this).data('value');
		$('#edit_all').modal('show');
		
		$('#edit_all').load(site_url+'pages/loc_edit/2/'+pk_id);
	});
	
	//Showing popup for editing.city
	$('#edit_city').live('click',function(e)
	{
		e.preventDefault();
		var pk_id = $(this).data('value');
		$('#edit_all').modal('show');
		
		$('#edit_all').load(site_url+'pages/loc_edit/3/'+pk_id);
	});
	
	//Showing popup for editing.loc
	$('#edit_location').live('click',function(e)
	{
		e.preventDefault();
		var pk_id = $(this).data('value');
		$('#edit_all').modal('show');
		
		$('#edit_all').load(site_url+'pages/loc_edit/4/'+pk_id);
	});
	
	//saving Editted value
	$('#btn_edit_loc').live('click',function(e)
	{
		e.preventDefault();
		var type_v = $.trim($('#input_type').val());
		var pk_id_v = $.trim($('#input_pk_id').val());
		var name_v = $.trim($('#input_edit_name').val());
		//var data_string = $(form).serialize(); // Collect data from form
		if(name_v == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
				$.ajax({
					type: "POST",
					url: site_url+"location/edit_location",
					data: {type : type_v,
							pk_id : pk_id_v,
							name : name_v},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							$('#Edit_timeout').show(500);
							$('#Edit_timeout').delay(4000);
							$('#Edit_timeout').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
						}
						else {
							$('#Edit_state').slideDown('slow');
							$('#Edit_state').html('An error occurred: ' + error + '');
							$('#Edit_state').delay(4000);
							$('#Edit_state').animate({
							  height: 'toggle'  
							}, 500, function() {
							  // Animation complete.
							});         
							//alert(error);
						}
					},
					success: function(data) {
						
						location.reload();
							///location.reload();
					}
				});
	});
	
	//adding Loyality
	$("#btn_add_loyality").on('click',function(e)
	{
		e.preventDefault();
		var name = $.trim($('#title').val());
		var point = $.trim($('#count').val());
		
		if(name == "" || point == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#loyality_form").submit();
		}
	});
	
	
	//editing Loyality
	$("#btn_edit_loyality").on('click',function(e)
	{
		e.preventDefault();
		var name = $.trim($('#title').val());
		var point = $.trim($('#count').val());
		
		if(name == "" || point == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#loyality_form").submit();
		}
	});
	
	//adding Category
	$("#btn_add_category").on('click',function(e)
	{
		e.preventDefault();
		var name = $.trim($('#name').val());
		
		if(name == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#category_form").submit();
		}
	});
	//edit Category
	$("#btn_edit_category").on('click',function(e)
	{
		e.preventDefault();
		var name = $.trim($('#name').val());
		
		if(name == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#category_edit_form").submit();
		}
	});
	
	//adding Offer
	$("#btn_add_offer").on('click',function(e)
	{
		e.preventDefault();
		var precentage = $.trim($('#precentage').val());
		var date_from = $.trim($('#date_frm').val());
		var date_to = $.trim($('#date_to').val());
		if(precentage == "" || date_from == "" || date_to == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#offer_form").submit();
		}
	});
	//edit Offer
	$("#btn_edit_offer").on('click',function(e)
	{
		e.preventDefault();
		var precentage = $.trim($('#precentage').val());
		var date_from = $.trim($('#date_frm').val());
		var date_to = $.trim($('#date_to').val());
		if(precentage == "" || date_from == "" || date_to == "")
		{
			$('#Empty_error').show();
			$('#Empty_error').delay(4000);
			$('#Empty_error').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#offer_edit_form").submit();
		}
	});
	
	//change location by selecting city in add shop page
	$("#shop_selectCity").on('change',function(e)
	{
		
		var pk_id_v = $(this).val();
		//alert(pk_id_v);
		$('#shop_selectLocation').empty();
		$("#shop_selectLocation").trigger("liszt:updated");
		$.ajax({
					type: "POST",
					url: site_url+"location/view_location",
					data: {city : pk_id_v},
					timeout: 6000,
					error: function(request,error) {
						
						if (error == "timeout") {
							alert("Connection TimedOut Please Try Again Later");     
						}
						else {
							alert('An error occurred: ' + error + '');
							
						}
					},
					success: function(result) 
			 		{	
			 			var data = JSON.parse(result);
				
						
						 $.each(data.location, function(key,value)
						{
							
							$('#shop_selectLocation').append('<option value="'+value.pk_id+'">'+value.s_name+'</option>');
							$("#shop_selectLocation").trigger("liszt:updated");
						});
							
					}
		});
		
	});
	
	//adding Shop
	$("#btn_add_shop").on('click',function(e)
	{
		e.preventDefault();
		
		var name = $.trim($('#name').val());
		//var logo = $.trim($('#fileInput_logo').val());
		//var cat = $.trim($('#selectCategory').val());
		var min_order = $.trim($('#min_order').val());
		var min_delivery = $.trim($('#min_delivery').val());
		
		var address = $.trim($('#address').val());
		
		var city = $.trim($('#shop_selectCity').val());
		
		var loc = $.trim($('#shop_selectLocation').val());
		//var lat = $.trim($('#lat').val());
		//var lon = $.trim($('#long').val());
		var loc_del = $.trim($('#shop_deliveryLocation').val());
		
		var cname = $.trim($('#cntct_name').val());
		//var email = $.trim($('#email').val()).toLowerCase(); // get the value of the input field
		//var email_compare = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/; // Syntax to compare against input
		
		var phone = $.trim($('#l_phone1').val());
		
		var mobile = $.trim($('#m_phone1').val());
		
		//var image = $.trim($('#fileInput').val());
		
		//var d_frm = $.trim($('#date_frm').val());
		//var d_to = $.trim($('#date_to').val());
		
		if(name == "")
		{
			$('#error_name').show();
			$('#error_name').delay(4000);
			$('#error_name').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(min_order == "")
		{
			$('#error_min_order').show();
			$('#error_min_order').delay(4000);
			$('#error_min_order').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(min_delivery == "")
		{
			$('#error_min_delivery').show();
			$('#error_min_delivery').delay(4000);
			$('#error_min_delivery').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(address == "")
		{
			$('#error_address').show();
			$('#error_address').delay(4000);
			$('#error_address').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		/*else if(logo == "")
		{
			$('#error_logo').show();
			$('#error_logo').delay(4000);
			$('#error_logo').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(cat == "" || cat == "-1")
		{
			$('#error_cat').show();
			$('#error_cat').delay(4000);
			$('#error_cat').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}*/
		else if(city == "" || city == "-1")
		{
			$('#error_city').show();
			$('#error_city').delay(4000);
			$('#error_city').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(loc == "" || loc == "-1")
		{
			$('#error_loc').show();
			$('#error_loc').delay(4000);
			$('#error_loc').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(loc_del == "")
		{
			$('#error_deliveryLocation').show();
			$('#error_deliveryLocation').delay(4000);
			$('#error_deliveryLocation').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		/*else if(lat == "")
		{
			$('#error_lat').show();
			$('#error_lat').delay(4000);
			$('#error_lat').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(lon == "")
		{
			$('#error_lon').show();
			$('#error_lon').delay(4000);
			$('#error_lon').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}*/
		else if(cname == "")
		{
			$('#error_cname').show();
			$('#error_cname').delay(4000);
			$('#error_cname').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		/*else if(email == "")
		{
			$('#error_email').show();
			$('#error_email').delay(4000);
			$('#error_email').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if (!email_compare.test(email)) { // if it's not empty check the format against our email_compare variable
		
				
				$('#error_email').show();
			$('#error_email').delay(4000);
			$('#error_email').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}*/
		else if(phone == "")
		{
			$('#error_l_phone1').show();
			$('#error_l_phone1').delay(4000);
			$('#error_l_phone1').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(mobile == "")
		{
			$('#error_m_phone1').show();
			$('#error_m_phone1').delay(4000);
			$('#error_m_phone1').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		
		/*else if(image == "")
		{
			$('#error_image').show();
			$('#error_image').delay(4000);
			$('#error_image').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(d_frm == "")
		{
			$('#error_d_frm').show();
			$('#error_d_frm').delay(4000);
			$('#error_d_frm').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(d_to == "")
		{
			$('#error_d_to').show();
			$('#error_d_to').delay(4000);
			$('#error_d_to').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}*/
		else
		{
			$("#add_shop_form").submit();
		}
	});
	//editing Shop
	$("#btn_edit_shop").on('click',function(e)
	{
		e.preventDefault();
		
		var name = $.trim($('#name').val());
		
		
		var cat = $.trim($('#selectCategory').val());
		var city = $.trim($('#shop_selectCity').val());
		
		var loc = $.trim($('#shop_selectLocation').val());
		var lat = $.trim($('#lat').val());
		var lon = $.trim($('#long').val());
		
		var cname = $.trim($('#cntct_name').val());
		var email = $.trim($('#email').val()).toLowerCase(); // get the value of the input field
		var email_compare = /^([a-z0-9_.-]+)@([da-z.-]+).([a-z.]{2,6})$/; // Syntax to compare against input
		var phone = $.trim($('#phone').val());
		
		var image = $.trim($('#fileInput').val());
		
		var d_frm = $.trim($('#date_frm').val());
		var d_to = $.trim($('#date_to').val());
		
		if(name == "")
		{
			$('#error_name').show();
			$('#error_name').delay(4000);
			$('#error_name').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(cat == "" || cat == "-1")
		{
			$('#error_cat').show();
			$('#error_cat').delay(4000);
			$('#error_cat').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(city == "" || city == "-1")
		{
			$('#error_city').show();
			$('#error_city').delay(4000);
			$('#error_city').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(loc == "" || loc == "-1")
		{
			$('#error_loc').show();
			$('#error_loc').delay(4000);
			$('#error_loc').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(lat == "")
		{
			$('#error_lat').show();
			$('#error_lat').delay(4000);
			$('#error_lat').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(lon == "")
		{
			$('#error_lon').show();
			$('#error_lon').delay(4000);
			$('#error_lon').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(cname == "")
		{
			$('#error_cname').show();
			$('#error_cname').delay(4000);
			$('#error_cname').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(email == "")
		{
			$('#error_email').show();
			$('#error_email').delay(4000);
			$('#error_email').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if (!email_compare.test(email)) { // if it's not empty check the format against our email_compare variable
		
				
				$('#error_email').show();
			$('#error_email').delay(4000);
			$('#error_email').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(phone == "")
		{
			$('#error_phone').show();
			$('#error_phone').delay(4000);
			$('#error_phone').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		
		
		else if(d_frm == "")
		{
			$('#error_d_frm').show();
			$('#error_d_frm').delay(4000);
			$('#error_d_frm').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else if(d_to == "")
		{
			$('#error_d_to').show();
			$('#error_d_to').delay(4000);
			$('#error_d_to').animate({
				  height: 'toggle'  
			}, 500, function() {
							  // Animation complete.
			});    
			return false;
		}
		else
		{
			$("#edit_shop_form").submit();
		}
	});
	
});