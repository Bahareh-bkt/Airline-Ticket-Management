<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Airplane registration</title>
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
        <div class="row" dir="ltr">
        	<div class="main-form" style="height:600px;">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                    <li><i class='fa fa-plus'></i><p>Airplane Registration</p></li>	
                        <li style="color: #97310e">
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        </li>
                        <li><a href="<?php echo base_url().'index.php/Home/index' ?>">back</a></li>                       
                    </ul>	
                </div>
                <div class="body" style="background-color:#f8c37d">
					 <div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                    	<img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 1500px ; height: 580px; position: relative; ">
                    </div> 
                    <?php
                    $CI=&get_instance();
                    $data=$CI->Get_All_Airlines();
                        echo form_open_multipart('Airplane/Register');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 left">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    
                    <div class="form_row">
                        <label>Name of the airline:</label>
                        <select name="Airplane_airlineName">
                            <?php
                                foreach ($data['get_all']->result() as $row) {
                                    echo'
                                        <option value="'.$row->airline_name."/".$row->airline_companyCode.'">'.$row->airline_name.'</option>
                                        ';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form_row">
                        <label>Name of the plane:<?php echo form_error('Airplane_name');?></label>
                        <input type="text" name="Airplane_name">
                    </div>
                    
                    <div class="form_row">
                        <label>AirPlane code:<?php echo form_error('Airplane_Code') ?></label>
                        <input type="text" name="Airplane_Code">
                    </div>
                    <div class="form_row">
                        <input type="submit" value="Airplane Register" style="background-color:#ff6c00">
                    </div>
                    
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" dir="ltr">
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
</body>
</html>