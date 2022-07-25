<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View flights</title>
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
        	<div class="main-form" style="height:800px;background-color:#f8c37d">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                        <li><i class='fa fa-users'></i><p>Show Flights</p></li>
                        
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
                <div class="body show_table" style="background-color:#f8c37d">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right" style="border:1px solid rgba(49,128,138,0.1); border-radius:10px; margin-bottom:40px; background-color:#f8b257">
                        <div class="result"><p></p></div>
	                           <table cellpadding="1" cellspacing="0" border="1" class="display table table-striped table-responsive table-hover table-bordered" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>From</th>
                                            <th>to</th>
                                            <th>Capacity</th>
                                            <th>Reservation number</th>
                                            <th>Price</th>
                                            <th>flight date</th>
                                            <th>flight time</th>
                                            <th>Airline company</th>
                                            <th>flight code</th>
                                            <th>flight status</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $CI=&get_instance();
                                    $data=$CI->Get_All_Flight();
                                    ?>
                                    <?php
                                    $i=0;
                                    foreach ($data['get_all']->result() as $row){
                                        $i++;
                                        echo '
                                          <tr class="odd gradeX">
                                              <td> '.$i.' </td>
                                              <td> '.$row->Flight_origin.' </td>
                                              <td> '.$row->Flight_destination.' </td>
                                              <td> '.$row->Flight_capacity.' </td>
                                              <td> '.$row->Flight_reserved_count.' </td>
                                              <td> '.number_format($row->Flight_price).'Rials</td>
                                              <td> '.$row->Flight_date.' </td>
                                              <td> '.$row->Flight_time.' </td>
                                              <td> '.$row->Flight_airline.' </td>
                                              <td> '.$row->Flight_code.' </td>
                                              <td id="action_change" style="cursor: pointer">
                                              ';
                                                if($row->Flight_state==0){
                                                    echo'<div data-action="change" data-code="'.$row->Flight_code.'" data-state="'.$row->Flight_state.'"   
                                                    class="Flight_state" id="Flight_state" style="background-color: #ff6c00 ;padding: 9px 1px; box-shadow: 0px 0px 3px #17b2ff ;border: 0px solid ">
                                                        <p>The capacity is not filled</p>
                                                        </div>
';
                                                }elseif ($row->Flight_state==1){
                                                    echo' 
                                                    <div data-action="change" data-code="'.$row->Flight_code.'" data-state="'.$row->Flight_state.'" 
                                                    class="Flight_state" id="Flight_state" style="background-color: #ff6c00 ;padding: 9px 1px; box-shadow: 0px 0px 3px #17b2ff ;border: 0px solid ">
                                                    <p>Capacity filled</p>
                                                    </div>
';
                                                }elseif ($row->Flight_state==2){
                                                    echo'                                              
                                                    <div data-action="change" data-code="'.$row->Flight_code.'" data-state="'.$row->Flight_state.'" 
                                                    class="Flight_state" id="Flight_state" style="background-color: #ff6c00 ;padding: 9px 1px; box-shadow: 0px 0px 3px #17b2ff ;border: 0px solid ">
                                                    <p>flight done</p>
                                                    </div>
';
                                                }else{
                                                    echo'
                                                    <div data-action="change" data-code="'.$row->Flight_code.'" data-state="'.$row->Flight_state.'" 
                                                    class="Flight_state" id="Flight_state" style="background-color: #ff6c00 ;padding: 9px 1px; box-shadow: 0px 0px 3px #17b2ff ;border: 0px solid ">
                                                    <p>The flight did not take place</p>
                                                    </div>
            ';
                                                            }
                                                            echo'
                                                          </td>
                                                            <td id="action_data">
                                                           <a href="#" data-action="delete" data-code="'.$row->Flight_id.'" >  <i class="fa fa-trash"></i> </a>
                                                           <a href="#" data-action="edit" data-code="'.$row->Flight_id.'" > <i class="fa fa-edit"></i> </a>
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
<script src="<?php echo base_url() ?>Assets/Ajax/Flight/index.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').dataTable();
    } );
</script>
</body>
</html>
