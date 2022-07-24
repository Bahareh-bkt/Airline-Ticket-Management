<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>See Airlines</title>
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
        	<div class="main-form" style="height:550px;">
            	<div class="top" style="background-color:#f8c37d">
                	<ul>
                    	<li><p>Airlines</p><i class='fa fa-users'></i></li>
                        <li></li>
                    </ul>	
                </div>
                <div class="body show_table" style="background-color:#f8c37d">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right" style="border:4px solid rgba(49,128,138,0.1); border-radius:10px; margin-bottom:40px; background-color:rgba(20,57,154,0.10)">
                        <div class="result"><p></p></div>
	                       <table cellpadding="1" cellspacing="0" border="1" class="display table table-striped table-responsive table-hover table-bordered" id="example" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Manager Name</th>
                                            <th>Address</th>
                                            <th>Tell</th>
                                            <th>Cellphone</th>
                                            <th>Company Code</th>
                                            <th>Logo</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $CI=&get_instance();
                                    $data=$CI->Get_All_Airlines();
                                    ?>
                                    <?php
                                    $i=0;
                                    foreach ($data['get_all']->result() as $row){
                                        $i++;
                                        echo '
                                          <tr class="odd gradeX">
                                              <td> '.$i.' </td>
                                              <td> '.$row->airline_name.' </td>
                                              <td> '.$row->airline_managerName.' </td>
                                              <td> '.$row->airline_centralAddress.' </td>
                                              <td> '.$row->airline_tell.' </td>
                                              <td> '.$row->airline_managerMobile.' </td>
                                              <td> '.$row->airline_companyCode.' </td>
                                              <td><img src='.base_url().'Assets/uploads/'.$row->airline_logo.' style="width: 50px;height: 50px"></td>
                                               <td id="action_data">
                                                   <a href="#" data-action="delete" data-code="'.$row->airline_companyCode.'" >  
                                                   <i class="fa fa-trash"></i></a>
                                                   <a href="#" data-action="edit" data-code="'.$row->airline_companyCode.'" > 
                                                   <i class="fa fa-edit"></i></a>
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
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project | All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script src="<?php echo base_url() ?>Assets/Ajax/Airline/index.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').dataTable();
    } );
</script>
</body>
</html>