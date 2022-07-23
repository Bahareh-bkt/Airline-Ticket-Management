<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Management Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>Assets/login/css/main.css">

</head>
<body>
	<div class="container-login100" style="background-image: url('<?php echo base_url()?>Assets/image/Login_bg.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
				<span class="login100-form-title p-b-37">
					Management Panel
				</span>
            <?php
                echo form_open('Login/check');
            ?>
            <div class="" style="text-align:left; "><?php
               echo form_error('admin_email','<b style="color: #ba1b26">','</b>');
                ?></div>

            <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email" >
					<input class="input100" type="text" name="admin_email" placeholder="Email" style="text-align:left;color:#908991;">
					<span class="focus-input100"></span>
				</div>
            <div class=""style="text-align:left;"><?php
                echo form_error('admin_pass','<b style="color: #ba1b26">','</b>');
                ?></div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="admin_pass" placeholder="Password" style="text-align:left;color: #908991;">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<input type="submit" class="submit" value="Login">
				</div>
            <?php
            echo form_close();
            ?>
        </div>
	</div>
</body>
</html>