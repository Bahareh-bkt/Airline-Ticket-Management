<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
  <link href="<?php echo base_url()?>Assets/Site/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/flexslider.css" rel="stylesheet">
  <link href="<?php echo base_url()?>Assets/Site/css/templatemo-style.css" rel="stylesheet">
  </head>
  <body class="tm-gray-bg">
  	<!-- Header -->
  	<div class="tm-header" dir="ltr">
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
                        	
                            <li><a href="<?php echo base_url().'index.php/Site/contactus' ?>">Contact us</a></li>
                            <li><a href="<?php echo base_url().'index.php/Site/aboutus' ?>"class="active">About us</a></li>
                           <li><a href="<?php echo base_url().'index.php/Site/searchTicket' ?>">Search</a></li>
                        </ul>
                    </nav>
                </div>
  			</div>
  		</div>	  	
  	</div>

    <section class="tm-banner">
        <!-- Flexslider -->
        <div class="flexslider flexslider-banner">
            <ul class="slides">
                <li>
                    <div class="tm-banner-inner">
                        <h1 class="tm-banner-title">Enjoy <span class="tm-yellow-text">booking a ticket</span> with us</h1>
                        <p class="tm-banner-subtitle">Bahar ticket booking site</p>
                    </div>
                    <img src="<?php echo base_url()?>Assets/Site/img/site_bg.jpg" alt="Image" />
                </li>
            </ul>
        </div>
    </section>

<div class="" style="margin: 20px 0px; direction: ltr; padding: 20px 30px; ">
    <p>       
        Although the history of commercial flights in Iran dates back to the years 1320 and 1330, it was on March 5, 1340 that a national commercial airline was established for the first time. This company with the international name of IRAN AIR and the title of Iran's national airline with the abbreviated name of "Homa" took over the facilities of other private companies that were operating in Iran before that date and thus the ups and downs history of Homa that Today, it has been going on for more than half a century. The familiar symbol of "Homa chicken" which was taken from the existing structure of this legendary bird in ancient Persepolis was designed by a young man named "Edward Zahrabian" in 1341, which has been used since then. It is one of the most beautiful designed signs and is considered one of the top international brands.
        "Huma" started its flights using Douglas DC3, DC6, Vickers and Everyork aircraft and became a full member of IATA in 1964.
    </p>
</div>
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
		});
		$(window).load(function(){
			// Flexsliders
		  	$('.flexslider.flexslider-banner').flexslider({
			    controlNav: false
		    });
		  	$('.flexslider').flexslider({
		    	animation: "slide",
		    	directionNav: false,
		    	slideshow: false
		  	});
		});
	</script>
 </body>
 </html>
