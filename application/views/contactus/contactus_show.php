<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Recieved Emails</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/bootstrap/css/bootstrap-ltr.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/css.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>Assets/css/jquery.dataTables.css">
</head>
<body>
<div class="container" style="background-color: #ffffff">
	<div class="row">
        <?php
        $this->load->view('Layout/header');
        ?>
        <div class="row">
        	<div class="main-form" style="height:600px;background-color:#f8c37d">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                    	<li><i class='fa fa-users'></i><p>Recieved Emails</p></li>
                        <li></li>
                    </ul>	
                </div>
                <div class="body show_table" style="background-color:#f8c37d">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right" style="border:1px solid ; border-radius:10px; direction: ltr; margin-bottom:10px; background-color:#f8c37d">
                        <div class="result"><p></p></div>
	                       <table cellpadding="1" cellspacing="0" border="1" class="display table table-striped table-responsive table-hover table-bordered" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $CI=&get_instance();
                                    $data=$CI->Get_All_Contacte();
                                    ?>
                                    <?php
                                    $i=0;
                                    foreach ($data['get_all']->result() as $row){
                                        $i++;
                                        echo '
                                          <tr class="odd gradeX">
                                              <td> '.$i.' </td>
                                              <td> '.$row->name.' </td>
                                              <td> '.$row->email.' </td>
                                              <td> '.$row->subject.' </td>
                                              <td> '.$row->text.' </td>
                                          </tr>
                                        ';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12 bottom navbar-fixed-bottom" style="background-color:#ff6c00">
                <p style="color:#ffffff; float: left;">Airline Ticket Management System  |  Bahareh Bakhtiari 2022 All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script type="text/javascript" charset="utf-8"></script>

</body>
</html>