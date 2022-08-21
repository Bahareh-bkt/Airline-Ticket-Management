<?php
$CI=&get_instance();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flight Reservation</title>
  <link href="<?php echo base_url()?>Assets/Site/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/templatemo-style.css" rel="stylesheet">
  </head>
  <body class="tm-gray-bg">
  	<!-- Header -->
  	<div class="tm-header">
  		<div class="container">
  			<div class="row">
  				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
                    <a href="<?php echo base_url().'Site/index' ?>" class="tm-site-name">Ticket Reservation</a>
  				</div>
	  			<div class="col-lg-6 col-md-8 col-sm-9">
	  				<div class="mobile-menu-icon">
		              <i class="fa fa-bars"></i>
		            </div>
                    <nav class="tm-nav">
                        <ul>
                        	<li><a href="<?php echo base_url().'index.php/Site/index' ?>" >Main Page</a></li>
                        	<li><a href="<?php echo base_url().'index.php/Site/contactus' ?>">Contact us</a></li>
                        	 <li><a href="<?php echo base_url().'index.php/Site/aboutus' ?>">About us</a></li>
                            <li><a href="<?php echo base_url().'index.php/Site/searchTicket' ?>">Search</a></li>
                           
                            
                        </ul>
                    </nav>
                </div>
  			</div>
  		</div>
  	</div>

	<!-- Banner -->
	<section class="tm-banner">
		<!-- Flexslider -->
		<div class="flexslider flexslider-banner">
		  <ul class="slides">
		    <li>
			    <div class="tm-banner-inner">
					<h1 class="tm-banner-title">Enjoy <span class="tm-yellow-text">booking a ticket</span> with us</h1>
					<p class="tm-banner-subtitle"> Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/Esfahan.jpeg" alt="Image" />
		    </li>
		  </ul>
		</div>
	</section>

    <section>
    	<div class="row" >
    	<div style="margin-left: 300px;">
            <?php
            $data=$CI->Get_Single($this->uri->segment(3));
            if(isset($data['result_data'])) {
                foreach ($data['result_data']->result() as $row) {
                    $id=$row->Flight_id;
                    echo '	
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" >
					<div class="tm-home-box-2" style="width:250px; padding-left: 60px;padding-right: 40px;">						
						<img src="'.base_url().'Assets/uploads/'.$data1=$CI->get_airline_image($row->Flight_airline).'" alt="'.$data1=$CI->get_airline_image($row->Flight_airline).'" alt="image" class="img-responsive" style="width: 100px;height: 100px">
						<div class="info" >
							<ul>
								<li> <i class="fa fa-map-marker"></i><p>'.$row->Flight_origin.'</p></li>
								<li> <i class="fa fa-plane"></i><p>'.$row->Flight_destination.'</p></li>
								<li> <i class="fa fa-calendar-check-o"></i><p>'.$row->Flight_date.'</p></li>
								<li> <i class="fa fa-clock-o"></i><p>'.$row->Flight_time.'</p></li>
								<li> <i class="fa fa-euro"></i><p>'.number_format($row->Flight_price).' Rial </p> </li> 
								<li> <i class="fa fa-road"></i><p>'.$data=$CI->explode_airline($row->Flight_airline).'</p></li>
								
							</ul>
							<div class="tm-home-box-2-container" >
								<p>Your Flight information</p>
								</div>
						</div>
							
					</div>
				</div>
                    ';
                }
            }
            ?>
			
			<?php echo form_open('Site/Reserve_Final/'.$id); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="width:300px">
                <div class="tm-home-box-2 user_info" style="width:350px; padding-left: 30px;padding-right: 30px;">
                    <img src="<?php echo base_url()?>Assets/image/Ticket_logo.png" alt="image" class="img-responsive" 
					style="width: 250px;height: 150px; padding-left: 60px;">
                    <div class="info" style="width:300px">
                        <ul>
                            <p><?php echo form_error('reserve_username')?></p>
                            <li> <p>Full Name: </p><input type="text" name="reserve_username"></li>
                            <p><?php echo form_error('reserve_nationalCode')?></p>
                            <li><p>National Code: </p><input type="text" name="reserve_nationalCode"></li>
                            <p><?php echo form_error('reserve_mobile')?></p>
                            <li><p>Cellphone: </p><input type="text" name="reserve_mobile"> </li>
                            <p><?php echo form_error('reserve_age')?></p>
                            <li><p>Age: </p><input type="text" name="reserve_age"></li>
                            <li>
                            	<p>Adult: </p>
                                <select name="reserve_adultCount">
                                    <option value="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
									<option value="5"> 5 </option>
									<option value="6"> 6 </option>
									<option value="7"> 7 </option>
									<option value="8"> 8 </option>
									<option value="9"> 9 </option>
									<option value="10"> 10 </option>
                                </select>                               
                            </li>
                            <li>
                            	<p>Children: </p>
                                <select name="reserve_childCount">
                                	<option value="0"> 0 </option>
                                    <option value="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                </select>                               
                            </li>	
	  						<div class="tm-home-box-2-container">
                        <input type="submit" value="Reserve">
                    </div>
                        </ul>
                    </div>
                    
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
	</div>
	</section>

	<!-- white bg -->
	<footer class="tm-black-bg">
		<div class="container">
            <div dir="ltr" class="row">
                <p class="tm-copyright-text">Copyright &copy; 2022 

                    | Designed by Bahareh Bakhtiari</p>
            </div>
		</div>
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/moment.js"></script>							
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap-datetimepicker.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>

   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

        	$('.date').datetimepicker({
            	format: 'MM/DD/YYYY'
            });
            $('.date-time').datetimepicker();

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
		  	$('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
		  	});
		});
		
		// Load Flexslider when everything is loaded.
		$(window).load(function() {	  		
			// Vimeo API nonagese

//	For images only
		    $('.flexslider').flexslider({
			    controlNav: false
		    });


	  	});
	</script>
 </body>
 </html>