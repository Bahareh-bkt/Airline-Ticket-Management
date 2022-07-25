<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Edit the airline</title>
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
                        <li><i class='fa fa-plus'></i><p>Edit the Airplane</p></li>
                        <li></li>
                        <li style="color: #97310e">
                            <?php
                            if(isset($register_result)){
                                echo '<p>'.$register_result.'</p>';
                            }
                            ?>
                        </li>
                    	<li><a href="<?php echo base_url().'index.php/Airplane/Show_Airplane' ?>">back</a></li>
                        
                    </ul>	
                </div>
                <div class="body" style="background-color:#f8c37d; height:600px">
					<div class="col-lg-6 col-md-5 col-sm-4 col-xs-12 left">
                    	<img src="<?php echo base_url()?>Assets/image/login_bg.jpg" style="width: 1500px ; height: 580px; position: relative; ">
                    </div>
                    <?php
                    $CI=&get_instance();
                    $data=$CI->Get_All_Airlines();

                    if(isset($data_result)){
                        foreach ($data_result->result() as $row){
                            $data['Airplane_name']=$row->Airplane_name;
                            $data['Airplane_airlineName']=$row->Airplane_airlineName;
                            $data['Airplane_airlineCode']=$row->Airplane_airlineCode;
                            $data['Airplane_Code']=$row->Airplane_Code;
                        }
                    }
                        echo form_open('Airplane/Update');
                    ?>
                    <div class="col-lg-6 col-md-7 col-sm-8 col-xs-12 left">
                        <div id="result_box">
                            <div class="result"><p></p></div>
                        </div>
                        
                        <div class="form_row">
                            <label>Name of the airline:</label>
                            <select name="Airplane_airlineName" id="Airplane_airlineName">
                            <option value="<?=$data['Airplane_airlineName']?>"><?=$data['Airplane_airlineName']?></option>
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
                            <input type="text" name="Airplane_name" value="<?=$data['Airplane_name']?>">
                        </div>
                        
                        <div class="form_row">
                            <label>Airplane code:<?php echo form_error('Airplane_Code') ?></label>
                            <input type="text" name="Airplane_Code" value="<?=$data['Airplane_Code']?>">
                        </div>
                        <div class="form_row" >
                        <input type="submit" value="Edit the Airplane" style="background-color:#ff6c00">
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
                <p style="color:#ffffff; float: left;">Airplane ticket management and reservation project | All rights reserved for Bahareh Bakhtiari</p>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo base_url() ?>Assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>Assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url() ?>Assets/js/js.js"></script>
<script>
    $(document).ready(function(e) {
        $("#Airplane_airlineName").val(<?php echo $data['Airplane_airlineName'].'/'.$data['Airplane_airlineCode'] ?>);
    });
</script>

</body>
</html>