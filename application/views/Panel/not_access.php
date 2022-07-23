<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Access error</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-ltr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container" style="background-color: #ffffff">
	<div class="row">
    <?php include ("../function/header.php");?>
        <div class="row">
        	<div class="main-form" style="height:600px;">
            	<div class="top" style="background-color:rgba(20,57,154,0.50)">
                	<ul>
                    	<li><i class='fa fa-crosshairs'></i><p>Access error</p></li>
                        <li id="shortcut_toggle"><i class='fa fa-angle-double-down'></i></li>
                    </ul>	
                </div>
                <div class="body">
					<div class="box_not_access">
                    	<p>You do not have permission to access this page! &nbsp;&nbsp;&nbsp;<a href="index.php"> Return to main page</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="bottom navbar-fixed-bottom" style="background-color:rgba(20,57,154,1.00)">
            	<p style="color:#ffffff; float: left;"> All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
</body>
</html>