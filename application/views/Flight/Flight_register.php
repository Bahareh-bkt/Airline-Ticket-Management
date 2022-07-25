<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>flight registration</title>
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
        <div class="row" >
        	<div class="main-form" style="height:550px;">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                        <li><i class='fa fa-plus'></i><p>Flight Registration</p></li>
                        <li></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        <li><a href="<?php echo base_url().'index.php/Home/index' ?>">back</a></li>
                        </li>
                    	
                    </ul>	
                </div>
                <div class="body" dir="ltr" style="background-color:#f8c37d; height:600px;">
					 <div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left" dir="ltr">
                    	<img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 1500px ; height: 580px; position: relative; ">
                    </div> 
                    <?php
                    $CI=&get_instance();
                    $data=$CI->Get_All_Airlines();
                    echo form_open_multipart('Flight/Register');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 left" >
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    
                    
                    <div class="form_row" dir="ltr">
                        <label>From: </label>
                        <select name="Flight_origin">
                            <option value="Tehran">Tehran</option>
                            <option value="Tabriz">Tabriz</option>
                            <option value="Shiraz">Shiraz</option>
                            <option value="Qom">Qom</option>
                            <option value="Mashhad">Mashhad</option>
                            <option value="Esfahan">Esfahan</option>
                            <option value="Orumieh">Orumieh</option>
                            <option value="Kish">Kish</option>
                            <option value="Ardabil">Ardabil</option>
                            <option value="Golestan">Golestan</option>
                            <option value="Mazandaran">Mazandaran</option>
                            <option value="Guilan">Guilan</option>
                            <option value="Sistan and Baluchestan">Sistan and Baluchestan</option>
                            <option value="Dezful">Dezful</option>
                            <option value="Zahedan">Zahedan</option>
                            <option value="Kermanshah">Kermanshah</option>
                        </select>
                    </div>
                    <div class="form_row">
                        <label>To: </label>
                        <select name="Flight_destination">
                            <option value="Tehran"> Tehran</option>
                            <option value="Tabriz"> Tabriz</option>
                            <option value="Shiraz"> Shiraz</option>
                            <option value="Qom"> Qom</option>
                            <option value="Mashhad"> Mashhad</option>
                            <option value="Esfahan"> Esfahan</option>
                            <option value="Orumieh"> Orumieh</option>
                            <option value="Kish"> Kish</option>
                            <option value="Ardabil"> Ardabil</option>
                            <option value="Golestan"> Golestan</option>
                            <option value="Mazandaran"> Mazandaran</option>
                            <option value="Guilan"> Guilan</option>
                            <option value="Sistan and Baluchestan"> Sistan and Baluchestan</option>
                            <option value="Dezful"> Dezful</option>
                            <option value="Zahedan"> Zahedan</option>
                            <option value="Kermanshah"> Kermanshah</option>
                        </select>                    
                    </div>
                    <div class="form_row">
                        <label>Capacity: <?php echo form_error('Flight_capacity') ?></label>
                        <input type="text" name="Flight_capacity" id="Flight_capacity">
                    </div>
                    <div class="form_row">
                        <label>Price per person: <?php echo form_error('Flight_price')?></label>
                        <input type="text" name="Flight_price" id="Flight_price" placeholder="Rial">
                    </div>
                    <div class="form_row">
                        <label>flight date: <?php echo form_error('Flight_date') ?></label>
                        <input type="date" name="Flight_date" id="Flight_date" placeholder="">
                    </div>
                    <div class="form_row">
                        <label>flight time:<?php echo form_error('Flight_time') ?></label>
                        <input type="time" name="Flight_time" id="Flight_time" placeholder="">
                    </div>
                    
                        <div class="form_row">
                            <label>Airline company: </label>
                            <select name="Flight_airline">
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
                        <input type="submit" value="Flight Register" style="background-color:#ff6c00">
                         </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" dir="ltr">
        	<div class="col-lg-12 bottom navbar-fixed-bottom" dir="ltr" style="background-color:#ff6c00">
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