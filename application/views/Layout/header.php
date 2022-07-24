<div class="row">
    <div class="top" style="background-color:#ff6c00" >
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 right">
            <ul>
                
                <li class="power_off"><a href="<?php echo base_url()?>index.php/Login/LogOut" target="_blank"><i class='fa fa-power-off' style="color:#ffffff"></i></a></li>
                <li class="setting"><a href="<?php echo base_url()?>index.php/Setting" target="_blank"><i class='fa fa-cog' style="color:#ffffff"></i></a></li>
                <li class="setting"><a href="<?php echo base_url()?>index.php/Site/Show_Contact" target="_blank"><i class='fa fa-envelope' style="color:#ffffff"></i></a></li>
                <li class="setting"><a href="<?php echo base_url()?>index.php/Site" target="_blank"><i class='fa fa-globe' style="color:#ffffff"></i></a></li>
                <li ><a href="<?php echo base_url()?>index.php/Home" target=""><i class='fa fa-home' style="color:#ffffff"></i></a></li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 left">
            <ul>
                <li><img style="width:50px; height:50px; border-radius:50%" 
                src="<?php echo base_url().'Assets/Admin_Pic/'.$this->session->userdata('admin_session_pic') ?>"></li>
                <li id="clock1" style="color:#ffffff"> </li>
                <li style="color:#ffffff"> <div class="box_info">
                <p>Hello <?php echo $this->session->userdata('admin_session_fname');?> , Wellcome Back !</p></div></li>
            </ul>
        </div>
        
    </div>
</div>