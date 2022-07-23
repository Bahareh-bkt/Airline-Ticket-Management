<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact us</title>
	<link href="<?php echo base_url()?>Assets/Site/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>Assets/Site/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>Assets/Site/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>Assets/Site/css/flexslider.css" rel="stylesheet">
	<link href="<?php echo base_url()?>Assets/Site/css/templatemo-style.css" rel="stylesheet">
</head>
<body>
	<!-- Header -->
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
                    <a href="<?php echo base_url().'Site/index' ?>" class="tm-site-name">Bahar Reservation</a>
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
                    <nav class="tm-nav">
                        <ul>
                        	 <li><a href="<?php echo base_url().'index.php/Site/index' ?>" >Main Page</a></li>
                        	
                        	<li><a href="<?php echo base_url().'index.php/Site/contactus' ?>"class="active">Contact us</a></li>
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
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title">Enjoy <span class="tm-yellow-text"> booking a ticket</span> with us</h1>
                        <p class="tm-banner-subtitle">Bahar ticket booking site</p>
                    </div>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/site_bg.jpg" alt="Banner 3" />
		    </li>
		  </ul>
		</div>
	</section><br>

	<!-- white bg -->
	<section class="section-padding-bottom">
		<div class="container">
			<div class="row">
				<!-- contact form -->
                <?php
                    echo form_open('Site/Register_Contact')
                ?>
					<div class="col-lg-6 col-md-6">
						<div id="google-map"></div>
                        <div dir="ltr" style="">
                            <?php
                            if(isset($register_result)){
                                echo '<p style="margin-top: 20px;font-size: 20px; color: #0c5460">'.$register_result.'</p>';
                            }
                            ?>

                        </div>
                    </div>
					<div class="col-lg-6 col-md-6 tm-contact-form-input" style="direction: ltr;">
						<div class="form-group">
                            <p><?php echo form_error('name') ?></p>
							<input type="text" id="contact_name" name="name" class="form-control" placeholder="Your Name" />
						</div>
						<div class="form-group">
                            <p><?php echo form_error('email') ?></p>
							<input type="email" id="contact_email" name="email" class="form-control" placeholder="Email" />
						</div>
						<div class="form-group">
                            <p><?php echo form_error('subject') ?></p>

                            <input type="text" id="contact_subject" name="subject" class="form-control" placeholder=" subject " />
						</div>
						<div class="form-group">
                            <p><?php echo form_error('text') ?></p>

                            <textarea id="contact_message" class="form-control" name="text" rows="6" placeholder="Your message"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Submit">
						</div>               
					</div>
                <?php
                echo form_close();
                ?>
			</div>			
		</div>
	</section>
	<footer class="tm-black-bg">
		<div class="container">
            <div class="row">
                <p class="tm-copyright-text">Copyright &copy; 2022 

                    | Designed by Bahareh Bakhtiari</p>
            </div>
		</div>		
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		/* Google map
      	------------------------------------------------*/
      	var map = '';
      	var center;

      	function initialize() {
	        var mapOptions = {
	          	zoom: 14,
	          	center: new google.maps.LatLng(37.769725, -122.462154),
	          	scrollwheel: false
        	};
        
	        map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

	        google.maps.event.addDomListener(map, 'idle', function() {
	          calculateCenter();
	        });
        
	        google.maps.event.addDomListener(window, 'resize', function() {
	          map.setCenter(center);
	        });
      	}

	    function calculateCenter() {
	        center = map.getCenter();
	    }

	    function loadGoogleMap(){
	        var script = document.createElement('script');
	        script.type = 'text/javascript';
	        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
	        document.body.appendChild(script);
	    }
	
      	// DOM is ready
		$(function() {

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

		  	// Flexslider
		  	$('.flexslider').flexslider({
		  		controlNav: false,
		  		directionNav: false
		  	});

		  	// Google Map
		  	loadGoogleMap();
		  });
	</script>
</body>
</html>
