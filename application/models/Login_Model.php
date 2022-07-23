<?php
class Login_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function Login_Check($email,$password){
        $retrieve=$this->db->get_where('admin',array('admin_email'=>$email,'admin_pass'=>$password));
        $count=$retrieve->num_rows();
        if($count > 0) {
            $admin_session=array(
                'admin_session_fname'=>$retrieve->row(0)->admin_fname,
                'admin_session_lname'=>$retrieve->row(0)->admin_lname,
                'admin_session_email'=>$retrieve->row(0)->admin_email,
                'admin_session_pic'=>$retrieve->row(0)->admin_pic,
                'admin_session_pass'=>$retrieve->row(0)->admin_pass,
            );
            $this->session->set_userdata($admin_session);
            redirect('Home/index');
        }else{
            redirect('Login/index');
        }
    }
}