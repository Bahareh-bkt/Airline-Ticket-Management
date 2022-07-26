<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Holiday </title>
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
                    <a href="<?php echo base_url().'Site/index' ?>" class="tm-site-name">Bahar Reservation</a>
  				</div>
	  			<div class="col-lg-6 col-md-8 col-sm-9" dir="ltr">
	  				<div class="mobile-menu-icon">
		              <i class="fa fa-bars"></i>
		            </div>
                    <nav class="tm-nav">
                        <ul>
                        	<li><a href="<?php echo base_url().'index.php/Site/index' ?>">Main Page</a></li>
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
					<p class="tm-banner-subtitle">Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/yazd.jpg" alt="Image" />
		    </li>
		  </ul>
		</div>	
	</section>
	<section>
 			<div class="row">

	            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="margin-left: 300px">
					<div class="tm-home-box-2">
                        <img src="<?=base_url().'Assets/uploads/'.$airline_image?>" alt="image" class="img-responsive" style="width: 100px;height: 100px">
						<div class="info" style="width:200px">
							<ul>
								<li> <i class="fa fa-map-marker"></i><p><?=$Flight_origin?></p></li>
								<li> <i class="fa fa-plane"></i><p><?=$Flight_destination?></p></li>
								<li> <i class="fa fa-calendar-check-o"></i><p><?=$Flight_date?></p></li>
								<li> <i class="fa fa-clock-o"></i><p><?=$Flight_time?></p></li>
                                <li> <i class="fa fa-euro"></i><p><?=$Flight_price?>Rial</p></li> 
								<li> <i class="fa fa-road"></i><p><?=$Flight_airline?></p></li>
								<div class="tm-home-box-2-container">
							<p>Your Flight Info</p>
						</div>
							</ul>
						</div>
						
					</div>
				</div>

            <?php
                echo form_open('Site/Register_Reserve/'.$this->uri->segment(3))
            ?>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" >
					<div class="tm-home-box-2 user_info" style="width:350px; padding-left: 30px;padding-right: 30px;">						
						<img src="<?php echo base_url()?>Assets/image/Ticket_logo.png" alt="image" class="img-responsive" style="width: 150px;height: 100px">
						<div class="info" >
							<ul>
								<li><p>Your Name: </p><p1><?=$reserve_username?></p1></li>
								<li><p>National Code: </p> <p1><?=$reserve_nationalCode?></p1></li>
								<li><p>Cellphone: </p> <p1><?=$reserve_mobile?></p1></li>
								<li><p>Age: </p> <p1><?=$reserve_age?></p1></li>
								<li><p>Adult: </p> 
									<p1><?=$reserve_adultCount ?>person</p1>
								</li>
								<li><p>Children: </p> 
									 <p1><?=$reserve_childCount?>person</p1>
								</li>
	  							<li><p>single price: </p><p1><?=$Flight_price?>Rial</p1></li>
	  							<li><p>Total price: </p><p1><?=$reserve_totalPrice?>Rial</p1></li>  
	  							
							</ul>
							<div class="tm-home-box-2-container">
							<input type="submit" value="Click to complete your Reservation">
						    </div>
						</div>
						
					</div>
				</div>
				<?php
                echo form_close();
            ?>
		</div>
	
	</section>
	<!-- white bg -->
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2022 
                
                | Designed by Bahareh Bakhtairi</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/moment.js"></script>							
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap-datetimepicker.min.js"></script>	
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>
   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		
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
