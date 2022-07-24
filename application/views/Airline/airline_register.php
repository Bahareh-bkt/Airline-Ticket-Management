<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width= device-width, initial-scale=1">
<title>Airline registration</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-ltr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container" style="background-color: #ffffff">
	<div class="row">
        <?php
        $this->load->view('Layout/header');
        ?>
        <div class="row">
        	<div class="main-form" style="height:550px;">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                        <li><p>Airline registration</p><i class='fa fa-plus'></i></li>
                        <li></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                                
                            }
                            ?>
                        </li>
                    	
                    </ul>	
                </div>
                <div class="body" style="background-color:#f8c37d; height:600px;">
					<div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                         
                        <img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 1490px ; height: 580px; position: relative; ">
                    </div>
                    <?php
                        echo form_open_multipart('Airline/Register');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 left">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    <div class="form_row">
                        <label>Company Name :<?php echo form_error('airline_name');?></label>
                        <input type="text" name="airline_name" id="name">
                    </div>
                    <div class="form_row">
                        <label>Name of the company manager: <?php echo form_error('airline_managerName') ?></label>
                        <input type="text" name="airline_managerName" id="family">
                    </div>
                    
                    <div class="form_row">
                        <label> The address of the company:<?php echo form_error('airline_centralAddress') ?></label>
                        <input type="text" name="airline_centralAddress" id="tell1">
                    </div>
                    <div class="form_row">
                        <label>Company phone:<?php echo form_error('airline_tell')?></label>
                        <input type="text" name="airline_tell" id="tell2">
                    </div>
                    <div class="form_row">
                        <label> Manager's mobile number:<?php echo form_error('airline_managerMobile') ?></label>
                        <input type="text" name="airline_managerMobile" id="mob2">
                    </div>
                    <div class="form_row">
                        <label>Company code: <?php echo form_error('airline_companyCode') ?></label>
                        <input type="text" name="airline_companyCode" id="fax">
                    </div>
                    <div class="form_row">
                        <label>Company logo:<?php echo form_error('pic') ?></label>
                        <input type="file" name="pic">
                    </div>
                    <div class="form_row">
                        <input type="submit" value="Company register" style="background-color:#ff6c00">
                    </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" >
        	<div class="col-lg-12 bottom navbar-fixed-bottom" style="background-color:#ff6c00">
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project | All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<!-- <script src="<?php echo base_url() ?>Connector/Send/Contact/index.js"></script> -->
</body>
</html>