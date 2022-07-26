<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
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
	<section class="container">
    	<div class="row" >
            <?php
            if($this->uri->segment(3)=="NOtCapacity" || $this->uri->segment(3)=="NOtUpdateCapacity" || $this->uri->segment(3)=="NOtReserve"){
            echo'   <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="margin-left: 40px" dir="ltr">
					<div class="tm-home-box-2">						
						<img src="'.base_url().'Assets/Site/img/ticket-icon.jpg'.'" alt="image" style="width: 150px;height: 150px" class="img-responsive">
						<div class="info" dir="ltr">
							<ul>
								<li><p>Name: </p> <p1>'.$this->session->userdata('reserve_username').'</p1></li>
								<li><p>National Code: </p> <p1>'.$this->session->userdata('reserve_nationalCode').'</p1></li>
								<li><p>Condition: </p> <p1> The reservation was not made</p1></li>
							</ul>
						</div>
                        <div class="tm-home-box-2-container">
                            <p></p>
                        </div>
					</div>
				    </div>
';
            }else {
                $CI =&get_instance();
                $data = $CI->Get_Single_Reserve($this->uri->segment(3) , $this->uri->segment(4)); 
               
                if (isset($data['result_data'])) {
                    foreach ($data['result_data']->result() as $row) {
                        $Flight_code['code'] = $row->reserve_flightCode;
                        echo '
                		<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" >
						<div class="tm-home-box-2" style="width:250px">						
						<img src="'.base_url().'Assets/image/ticket_logo.png'.'" alt="image" class="img-responsive" style="width: 150px;height: 150px">
						<div class="info" dir="ltr">
							<ul>
								<li><p>Name: </p><p style="color: #ba1318">'.$row->reserve_username.'</p></li>
								<li><p>National Code: </p><p style="color: #ba1318">'.$row->reserve_nationalCode.'</p></li>
								<li><p>Cellphone:</p><p style="color: #ba1318">'.$row->reserve_mobile.'</p></li>
								<li><p>Age:</p><p style="color: #ba1318">'.$row->reserve_age.'</p></li>
								<li><p>Adult: </p><p style="color: #ba1318">'.$row->reserve_adultCount.'</p></li>
								<li><p>Children: </p><p style="color: #ba1318">'.$row->reserve_childCount.'</p></li>
	                            <li><p>single price: </p><p style="color: #ba1318">'.number_format($row->Flight_price).'Rial</p></li>
	  							<li><p>Total price: </p><p style="color: #ba1318">'.number_format($row->reserve_totalPrice).'Rial</p></li>
	  							<li><p style="width: 150px;">Your reservation code:</p><p style="color: #ba1318">'.$row->reserve_Code.'</p></li>
							</ul>
						</div>
                        <div class="tm-home-box-2-container" >
                            <p>Your Reservation Info</p>
                        </div>
					</div>
				    </div>
                ';
                    }
                    $data = $CI->Get_SingleFlight_WithCode($Flight_code['code']);
                    if (isset($data['result_data'])) {
                        foreach ($data['result_data']->result() as $row) {
                            echo '
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" dir="ltr">
                                <div class="tm-home-box-2" style="width:250px">						
                                    <img src="' . base_url() . 'Assets/uploads/' . $data1 = $CI->get_airline_image($row->Flight_airline) . '" alt="' . $data1 = $CI->get_airline_image($row->Flight_airline) . '" class="img-responsive" style="width: 100px;height: 100px">
                                    <div class="info" dir="ltr">
                                        <ul>
                                            <li> <i class="fa fa-map-marker"></i><p>' . $row->Flight_origin . '</p></li>
                                            <li> <i class="fa fa-plane"></i><p>' . $row->Flight_destination . '</p></li>
                                            <li> <i class="fa fa-calendar-check-o"></i><p>
                                            '.$row->Flight_date.'</p></li>
                                            <li> <i class="fa fa-clock-o"></i><p>' . $row->Flight_time . '</p></li>
                                            <li> <i class="fa fa-euro"></i><p>' . number_format($row->Flight_price) . ' Rial</p></li>
                                            <li> <i class="fa fa-road"></i><p>' . $data = $CI->explode_airline($row->Flight_airline) . '</p></li>
                                            <div class="tm-home-box-2-container">
			                           		 <p>Your Flight Info</p>
			                        		</div>
                                        </ul>
                                    </div>
			                        
                        		</div>
                       		</div>

                        ';
                        }
                    }
                    
                }};

//                 if($data['result_data']=0){
//                     echo'                	
//                 	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12" style="margin-left: 40px" dir="ltr">
// 					<div class="tm-home-box-2">						
// 						<img src="'.base_url().'Assets/Site/img/ticket-icon.jpg'.'" alt="image" class="img-responsive">
// 						<div class="info" dir="ltr">
// 							<ul>
// 								<li><p>Name: </p> <p1></p1></li>
// 								<li><p>National Code: </p> <p1></p1></li>
// 								<li><p>Condition: </p> <p1>The reservation was not made</p1></li>
// 							</ul>
// 						</div>
//                         <div class="tm-home-box-2-container">
//                             <p> There is no ticket with this number or national code!  </p>
//                         </div>
// 					</div>
// 				    </div>
// ';

//                 }
            

            ?>
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
	<script type="text/javascript" src="<?php echo base_url()?>Assets/Site/js/templatemo-script.js"></script>
   	<script type="text/javascript" src="js/templatemo-script.js"></script>      		<!-- Templatemo Script -->
	<script>
		// HTML document is loaded. DOM is ready.
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

        	$('.date').datetimepicker({
            	format: 'DD/MM/YYYY'
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