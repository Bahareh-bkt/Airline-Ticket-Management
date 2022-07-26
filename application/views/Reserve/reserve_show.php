<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View reservations</title>
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
        	<div class="main-form" style="height:1000px;">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                    	<li><p>Reserved Flights</p><i class='fa fa-users'></i></li>
                        <li></li>
                    </ul>	
                </div>
                <div class="body show_table" style="background-color:#f8c37d">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left" style="border:4px solid rgba(49,128,138,0.1); border-radius:10px; margin-bottom:40px; background-color:#f8b257; height:1000px;">
                        <div class="result"><p></p></div>
	                       <table cellpadding="1" cellspacing="0" border="1" class="display table table-striped table-responsive table-hover table-bordered" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>National Code</th>
                                            <th>Cellphone</th>
                                            <th>Age</th>
                                            <th>Number of adults</th>
                                            <th>Number of children</th>
                                            <th>Single ticket price</th>
                                            <th>Total price</th>
                                            <th>flight code</th>
                                            <th>Reservation code</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $CI=&get_instance();
                                    $data=$CI->Get_All_Reserve();
                                    ?>
                                    <?php
                                    $i=0;
                                    foreach ($data['get_all']->result() as $row){
                                        $i++;
                                        echo '
                                          <tr class="odd gradeX">
                                              <td> '.$i.' </td>
                                              <td> '.$row->reserve_username.' </td>
                                              <td> '.$row->reserve_nationalCode.' </td>
                                              <td> '.$row->reserve_mobile.' </td>
                                              <td> '.$row->reserve_age.'  </td>
                                              <td> '.$row->reserve_adultCount.' </td>
                                              <td> '.$row->reserve_childCount.' </td>
                                              <td> '.number_format($row->Flight_price).' rial</td>
                                              <td> '.number_format($row->reserve_totalPrice).' rial</td>
                                              <td> '.$row->reserve_flightCode.' </td>
                                              <td> '.$row->reserve_Code.' </td>
                                              <td id="action_data">
                                                <a href="#" data-action="delete" data-code="'.$row->reserve_Code.'" >  
                                                <i class="fa fa-trash"></i></a>
                                                           
                                               </td>
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
        <div class="row" dir="ltr">
        	<div class="col-lg-12 bottom navbar-fixed-bottom" style="background-color:#ff6c00" >
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project | All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script src="<?php echo base_url() ?>Assets/Ajax/reserve/index.js"></script> 
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').dataTable();
    } );
</script>
</body>
</html>