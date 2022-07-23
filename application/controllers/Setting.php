<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Setting_Model');
    }
    function index(){
        $this->load->view('Setting/setting_edit');
    }
    function Change_Pass(){
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
                'field'=>'current_pass',
                'label'=>'current_pass',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your previous password'
                )
            ),
            array(
                'field'=>'admin_pass',
                'label'=>'admin_pass',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your new password'
                )
            ),
            array(
                'field'=>'admin_pass_retype',
                'label'=>'admin_pass_retype',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please reenter your new password'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Setting/setting_edit');
        }else{
            if($_POST['current_pass']==$this->session->userdata('admin_session_pass')){
                if($_POST['admin_pass']==$_POST['admin_pass_retype']){
                    $data['admin_email']=$_POST['admin_email'];
                    $data['admin_pass']=$_POST['admin_pass'];
                    $retrieve=$this->Setting_Model->Update($data);
                    if($retrieve){
                        $admin_session=array(
                            'admin_session_email'=>$_POST['admin_email'],
                            'admin_session_pass'=>$_POST['admin_pass'],
                        );
                        $this->session->set_userdata($admin_session);
                        $data['result_change_pass']=" Your information has been edited successfully, please log out of the panel and log in again";
                        $this->load->view('Setting/setting_edit',$data);
                    }else{
                        $data['result_change_pass']=" Your information was not edited";
                        $this->load->view('Setting/setting_edit',$data);
                    }
                }else{
                    $data['result_change_pass']=" Your new password does not match the previous one";
                    $this->load->view('Setting/setting_edit',$data);
                }
            }
            else{
                $data['result_change_pass']=" You entered your current password incorrectly";
                $this->load->view('Setting/setting_edit',$data);
            }
        }
    }
    function Change_Profile(){
        $form_validation=array(
            array(
                'field'=>'admin_fname',
                'label'=>'admin_fname',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your name'
                )
            ),
            array(
                'field'=>'admin_lname',
                'label'=>'admin_lname',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your last name'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Setting/setting_edit');
        }else{
            $config['upload_path'] = "Admin_Pic/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 2024;
            $config['max_height'] = 1768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pic')) {
                $data['result_change_pass'] = "Image failed to upload";
            } else {
                $data['admin_pic']=$this->upload->data('file_name');
                $data['admin_fname']=$_POST['admin_fname'];
                $data['admin_lname']=$_POST['admin_lname'];
                $retrieve=$this->Setting_Model->Update_Profile($data);
                if($retrieve){
                    unlink('Admin_Pic/'.$this->session->userdata('admin_session_pic'));
                    $admin_session=array(
                        'admin_session_fname'=>$_POST['admin_fname'],
                        'admin_session_lname'=>$_POST['admin_lname'],
                        'admin_session_pic'=>$this->upload->data('file_name'),
                    );
                    $this->session->set_userdata($admin_session);

                    $data['result_change_pass']=" Your information has been edited";
                }else{
                    $data['result_change_pass']=" Your information was not edited";
                }
            }
            $this->load->view('Setting/setting_edit',$data);

        }
    }
}