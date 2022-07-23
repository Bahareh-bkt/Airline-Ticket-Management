<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
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
                            <li><a href="<?php echo base_url().'index.php/Site/aboutus' ?>">About us</a></li>
                            <li><a href="<?php echo base_url().'index.php/Site/searchTicket' ?>"class="active">Search</a></li>
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
                    <img src="<?php echo base_url()?>Assets/Site/img/chabahar.jpg" alt="Image" />
                </li>
            </ul>
        </div>
    </section>
<section>
<div>
    <?php $this->load->view('Layout/searchTab');?>
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
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap-datetimepicker.min.js"></script>
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/moment.js"></script>	
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>			<!-- flexslider js -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})
        });

		// Load Flexslider when everything is loaded.
		$(window).load(function() {
			// Vimeo API nonsense



//	For images only
		    $('.flexslider').flexslider({
			    controlNav: false
		    });


	  	});
	</script>
</script>
 </body>
 </html>
