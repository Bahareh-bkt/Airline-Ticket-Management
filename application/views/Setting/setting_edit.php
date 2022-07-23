<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Settings</title>
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
        	<div class="main-form" style="height:300px;background-color:#f8c37d">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                        <li><p> Setting: Edit password</p><i class='fa fa-plus'></i></li>
                        <li></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($result_change_pass)){
                                echo '<p>'.$result_change_pass.'</p>';
                            }
                            ?>
                        </li>
                    	
                    </ul>	
                </div>
                <div class="body">
					 <!-- <div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                    	<img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 560px ; height: 400px; position: relative; left: 170px;">
                    </div> --> 
                    <?php
                        $fname=$this->session->userdata('admin_session_fname');
                        $lname=$this->session->userdata('admin_session_lname');
                        $email=$this->session->userdata('admin_session_email');
                        $pic=$this->session->userdata('admin_session_pic');
                        echo form_open_multipart('Setting/Change_Pass');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                    
                    <div class="form_row">
                        <label> Email: <?php echo form_error('admin_email') ?></label>
                        <input type="email" name="admin_email" id="admin_email" value="<?=$email?>">
                    </div>
                    <div class="form_row">
                        <label>Current password: <?php echo form_error('current_pass') ?></label>
                        <input type="text" name="current_pass" id="current_pass">
                    </div>
                    <div class="form_row">
                        <label>New password: <?php echo form_error('admin_pass') ?></label>
                        <input type="text" name="admin_pass" id="admin_pass" >
                    </div>
                    <div class="form_row">
                        <label>Repeat the new password : <?php echo form_error('admin_pass_retype') ?> </label>
                        <input type="text" name="admin_pass_retype" id="admin_pass_retype">
                    </div>
                    

                    <div class="form_row">
						<input type="submit" value="Edit" style="background-color:#ff6c00">
                    </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="main-form" style="margin-top: -30px; background-color:#f8c37d">
                <div class="top" style="background-color:#f8c37d">
                    <ul>
                        <li><p> Setting: Edit personal information</p><i class='fa fa-plus'></i></li>
                        <li>
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        </li>
                        
                    </ul>
                </div>
                <div class="body" id="body2">
                    <?php
                    echo form_open_multipart('Setting/Change_Profile');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 right">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                        <div class="form_row">
                            <label>First name : <?php echo form_error('admin_fname');?></label>
                            <input type="text" name="admin_fname" id="name" value="<?=$fname?>">
                        </div>
                        <div class="form_row">
                            <label>Last name: <?php echo form_error('admin_lname') ?></label>
                            <input type="text" name="admin_lname" id="family" value="<?=$lname?>">
                        </div>
                        
                        
                        <div class="form_row">
                            <label>Image : </label>
                            <input type="file" name="pic">
                            <img style="width: 100px ; height: 100px; border: 1px dashed #0f0f0f; margin-top: 40px;" src="<?php echo base_url().'Assets/Admin_Pic/'.$pic ?>">
                        </div>
                        <div class="form_row">
                            <input type="submit" value="Edit" style="background-color:#ff6c00">
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
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project / All rights are reserved for Bahareh Bakhtiari</p>
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