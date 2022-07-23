<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
    }

    function index(){
        $this->load->view('Login/index');
    }
    function check(){
        $form_validation=array(
            array(
                'field'=>'admin_email',
                'label'=>'admin_email',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your Email'
                )
            ),
            array(
                'field'=>'admin_pass',
                'label'=>'admin_pass',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your Password'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Login/index');
        }else{
            $retrieve=$this->Login_Model->Login_Check($this->input->post('admin_email'),$this->input->post('admin_pass'));
            echo $retrieve;
        }
    }
    function LogOut(){
        $session_unset_array=array('admin_session_fname','admin_session_lname','admin_session_email','admin_session_pic');
        $this->session->unset_userdata($session_unset_array);
        redirect('');

    }
}
