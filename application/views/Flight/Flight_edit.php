<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit flight</title>
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
                        <li><i class='fa fa-plus'></i><p>Edit Flight</p></li>
                        <li></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        </li>
                    	<li><a href="<?php echo base_url().'index.php/Flight/Show_Flight' ?>">back</a></li>
                        
                       
                    </ul>	
                </div>
                <div class="body" style="background-color:#f8c37d; height:600px;">
					<div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                    	<img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 1500px ; height: 580px; position: relative; ">
                    </div>

                    <?php
                    $CI=&get_instance();
                    $data=$CI->Get_All_Airlines();

                    if(isset($data_result)){
                        foreach ($data_result->result() as $row){
                            $data['Flight_origin']=$row->Flight_origin;
                            $data['Flight_destination']=$row->Flight_destination;
                            $data['Flight_capacity']=$row->Flight_capacity;
                            $data['Flight_price']=$row->Flight_price;
                            $data['Flight_date']=$row->Flight_date;
                            $data['Flight_time']=$row->Flight_time;
                            $data['Flight_code']=$row->Flight_code;
                            $data['Flight_airline']=$row->Flight_airline;
                        }
                    }
                        echo form_open_multipart('Flight/Update');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 left">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                        <div class="form_row">
                            <label>From: </label>
                            <select name="Flight_origin">
                                <option value="<?=$data['Flight_origin']?>"><?=$data['Flight_origin']?></option>
                                <option value="Tehran"> Tehran</option>
                                <option value="Tabriz"> Tabriz</option>
                                <option value="Shiraz"> Shiraz</option>
                                <option value="Qom"> Qom</option>
                                <option value="Esfahan"> Esfahan</option>
                                <option value="Golestan"> Golestan</option>
                            </select>
                        </div>
                        <div class="form_row">
                            <label>To : </label>
                            <select name="Flight_destination">
                                <option value="<?=$data['Flight_destination']?>"><?=$data['Flight_destination']?></option>
                                <option value="Shiraz"> Shiraz</option>
                                <option value="Tabriz"> Tabriz</option>
                                <option value="Qom"> Qom</option>
                                <option value="Esfahan"> Esfahan</option>
                                <option value="Golestan"> Golestan</option>
                                <option value="Mazandaran">Mazandaran</option>
                                <option value="Ilam"> Ilam</option>
                                <option value="Ahvaz"> Ahvaz</option>
                                <option value="Kerman"> Kerman</option>
                            </select>                    </div>
                        <div class="form_row">
                            <label>Capacity: <?php echo form_error('Flight_capacity') ?></label>
                            <input type="text" name="Flight_capacity" value="<?=$data['Flight_capacity']?>">
                        </div>
                        <div class="form_row">
                            <label>Price per person: <?php echo form_error('Flight_price')?></label>
                            <input type="text" name="Flight_price" value="<?=$data['Flight_price']?>">
                        </div>
                        <div class="form_row">
                            <label>Flight date: <?php echo form_error('Flight_date') ?></label>
                            <input type="text" name="Flight_date" value="<?=$data['Flight_date']?>">
                        </div>
                        <div class="form_row">
                            <label>Flight time: <?php echo form_error('Flight_time') ?></label>
                            <input type="text" name="Flight_time" value="<?=$data['Flight_time']?>">
                        </div>
                        
                        <div class="form_row">
                            <label>Airline company: </label>
                            <select name="Flight_airline">
                            <option value="<?=$data['Flight_airline']?>"><?=$data['Flight_airline']?></option>
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
                            <input type="submit" value="Edit flight" style="background-color:#ff6c00">
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12 bottom navbar-fixed-bottom" style="background-color:#ff6c00">
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project / All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script src="<?php echo base_url() ?>Connector/Send/Contact/index.js"></script>
</body>
</html>