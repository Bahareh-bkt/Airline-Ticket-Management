<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
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
							<li><a href="<?php echo base_url().'index.php/Site/index' ?>" class="active">Main Page</a></li>
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
					<h1 class="tm-banner-title">enjoy <span class="tm-yellow-text"> booking a ticket</span> with us</h1>
					<p class="tm-banner-subtitle">Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/site_bg.jpg" alt="Image" />
		    </li>
		    <li>
		    	<div class="tm-banner-inner">
					<h1 class="tm-banner-title">enjoy <span class="tm-yellow-text"> booking a ticket</span> with us</h1>
					<p class="tm-banner-subtitle">Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/Esfahan.jpeg" alt="Image" />
		    </li>
		    <li>
		    	<div class="tm-banner-inner">
					<h1 class="tm-banner-title">enjoy <span class="tm-yellow-text"> booking a ticket</span> with us</h1>
					<p class="tm-banner-subtitle">Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/yazd.jpg" alt="Image" />
		    </li>
		    <li>
		    	<div class="tm-banner-inner">
					<h1 class="tm-banner-title">enjoy <span class="tm-yellow-text"> booking a ticket</span> with us</h1>
					<p class="tm-banner-subtitle">Bahar ticket booking site</p>
				</div>
				<img src="<?php echo base_url()?>Assets/Site/img/kermanshah.jpg" alt="Image" />
		    </li>
		  </ul>
		</div>	
	</section>
	
		<div class="section-margin-top">
			
			<div class="row" style="padding-left: 10px;">
                <?php
                $CI=&get_instance();
                if(isset($fetch_data)){
                    foreach ($fetch_data->result() as $row){
                        echo form_open('Site/Reserve/'.$row->Flight_id);
                        echo'
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="width:300px;" >
                                <div class="tm-home-box-2" background-color: #f1d227 style="width:250px; padding-left: 60px;padding-right: 40px;">						
                                    <img src="'.base_url().'Assets/uploads/'.$data1=$CI->get_airline_image($row->Flight_airline).'" 
									class="img-responsive" style="width: 100px;height: 100px">
                                    <div class="info">
                                        <ul>
                                            <li><i class="fa fa-map-marker "></i><p>'.$row->Flight_origin.' </p></li>
                                            <li><i class="fa fa-plane"></i><p>'.$row->Flight_destination.'</p></li>
                                            <li><i class="fa fa-calendar-check-o"></i><p>'.$row->Flight_date.'</p> </li>
                                            <li><i class="fa fa-clock-o"></i><p>'.$row->Flight_time.'</p> </li>
                                            <li><i class="fa fa-euro"></i><p>'.number_format($row->Flight_price).'Rial </p> </li>                              

                                            <li><i class="fa fa-road"></i><p>'.$data=$CI->explode_airline($row->Flight_airline).'</p></li>
                                            <div class="tm-home-box-2-container" >
                                        	<input type="submit" value="Reserve" style="height:30px">
                                    		</div>
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                            ';
                        echo form_close();
                    }
                }
                ?>
				<div class="pagination">
                    <?php
                    echo $pagination;
                    ?>
				</div> 
		</div>
		
    </div>
	</section>
	<!-- white bg -->
	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2022  
                
                | Designed by Bahareh Bakhtiari</p>
			</div>
		</div>		
	</footer>
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery-1.11.2.min.js"></script>      		<!-- jQuery -->
  	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/moment.js"></script>							<!-- moment.js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap.min.js"></script>					<!-- bootstrap js -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/bootstrap-datetimepicker.min.js"></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/jquery.flexslider-min.js"></script>

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


<!--datepicker start-->
<link rel="stylesheet" href="<?php echo base_url()?>Assets/Site/datepicker/persian.css"/>
  <script src="<?php echo base_url()?>Assets/Site/datepicker/persian-date.js"></script>
  <script src="<?php echo base_url()?>Assets/Site/datepicker/persian-datepicker.js"></script>
	<script type="text/javascript">
  $(document).ready(function() {
    $(".example1").pDatepicker();
  });
</script>
<!--datepicker end-->
 </body>
 </html>