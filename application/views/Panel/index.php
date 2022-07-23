<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Airline Ticket Management System</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-ltr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href=".<?php echo base_url() ?>Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container" style="background-color: #ffffff">
	<div class="row">
        <?php
        $this->load->view('Layout/header');
        ?>
        <div class="row" dir="ltr">
        	<div class="main-form" style="height:600px;" dir="ltr">
            	<div class="top" style="background-color:#f8c37d" dir="ltr">
                	<ul>
                    	<li><p>Main Panel</p><i class='fa fa-crosshairs'></i></li>
                        <li></li>
                    </ul>	
                </div>
                <div class="body" style="background-color:#f8c37d;height:600px" dir="ltr">
                      	<ul>

                         <li>
                            <div class="box" style="width:300px; height:300px;border-width: 15px;border-color:#ff6c00 ; border-radius:10%; padding-top: 30px; padding-right: 30px; padding-left: 30px;background-color:#fad7a9">
                                <div class="top_shortcut">
                                    <ul>
                                        <li><a href="<?php echo base_url()?>index.php/Airline/Show_Airlines" target="_blank">
                                            View</a></li>
                                        <li><a href="<?php echo base_url()?>index.php/Airline/Register_Form" target="_blank">
                                            Add</a></li>
                                        <li><p>Airlines</p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                    <img src="<?php echo base_url() ?>Assets/image/Airlines_logo.png" style="width: 200px;height: 200px;">
                                </div>
                            </div>
                        </li>   
                        
                        <li>
                            <div class="box" style="width:300px; height:300px; border-width: 15px;border-color:#ff6c00 ;border-radius:10%; padding-top: 30px; padding-right: 30px; padding-left: 30px;background-color:#fad7a9">
                                <div class="top_shortcut">
                                    <ul>
                                        <li><a href="<?php echo base_url()?>index.php/Airplane/Show_Airplane" target="_blank">View</a></li>
                                        <li><a href="<?php echo base_url()?>index.php/Airplane/Register_Form" target="_blank">Add</a></li>
                                        <li><p>Airplanes</p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                    <img src="<?php echo base_url() ?>Assets/image/Airplanes_logo.png" style="width: 200px;height: 200px;">
                                </div>
                            </div>
                        </li>
						<li>
                            <div class="box" style="width:300px; height:300px; border-width: 15px;border-color:#ff6c00 ;border-radius:10%; padding-top: 30px; padding-right: 30px; padding-left: 30px;background-color:#fad7a9">
                                <div class="top_shortcut">
                                    <ul>
                                        <li><a href="<?php echo base_url()?>index.php/Flight/Show_Flight" target="_blank">View</a></li>
                                        <li><a href="<?php echo base_url()?>index.php/Flight/Register_Form" target="_blank">Add</a></li>
                                        <li><p>Flights</p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                    <img src="<?php echo base_url() ?>Assets/image/Flights_logo.png" style="width: 200px;height: 200px;">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="box" style="width:300px; height:300px;border-width: 15px;border-color:#ff6c00 ; border-radius:10%; padding-top: 30px; padding-right: 30px; padding-left: 30px;background-color:#fad7a9">
                                <div class="top_shortcut">
                                    <ul>
                                        <li><a href="<?php echo base_url()?>index.php/Reserve/Show_Reserves" target="_blank">
                                            View</a></li>
                                        <li><p>Reserved Flights</p></li>
                                    </ul>
                                </div>
                                <div class="icon">
                                    <img src="<?php echo base_url() ?>Assets/image/Ticket_logo.png" style="width: 200px;height: 200px;">
                                </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="bottom navbar-fixed-bottom" style="background-color:#ff6c00">
            	<p style="color:#ffffff; float: left;">Airline Ticket Management System | Bahareh Bakhtiari 2022 | All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
</body>
</html>