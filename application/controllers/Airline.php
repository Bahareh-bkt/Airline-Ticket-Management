<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Airline extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Airline_Model');
    }
    function Register_Form(){
        $this->load->view('Airline/airline_register');
    }
    function Show_Airlines(){
        $this->load->view('Airline/airline_show');
    }
    function Register(){
        $form_validation=array(
            array(
                'field'=>'airline_name',
                'label'=>'airline_name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the company name'
                )
            ),
            array(
                'field'=>'airline_managerName',
                'label'=>'airline_managerName',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the name of the company manager',
                )
            ),
            array(
                'field'=>'airline_centralAddress',
                'label'=>'airline_centralAddress',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the main address of the company',
                )
            ),
            array(
                'field'=>'airline_tell',
                'label'=>'airline_tell',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the company phone number',
                )
            ),array(
                'field'=>'airline_managerMobile',
                'label'=>'airline_managerMobile',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the company mobile number',
                )
            ),array(
                'field'=>'airline_companyCode',
                'label'=>'airline_companyCode',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'Enter the company code',
                    'numeric'=>'Enter the company code numeric'
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Airline/airline_register');
        }else{
            $config['upload_path'] = "uploads/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 10000;
            $config['max_width'] = 2024;
            $config['max_height'] = 1768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('pic')) {
                $data_airline['register_result'] = "Image failed to upload";
            } else {
                $data_airline=$_POST;
                $data_airline['airline_logo']=$this->upload->data('file_name');
                $retrieve=$this->Airline_Model->Insert($data_airline);
                if($retrieve){
                    $data_airline['register_result']=" The details of the airline company were registered in the system";
                }else{
                    $data_airline['register_result']=" The details of the airline company were not registered in the system";
                }
            }
            $this->load->view('Airline/airline_register',$data_airline);
        }
    }
    function Get_All_Airlines(){
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_airline['delete_result']=$this->Airline_Model->Delete($code);
        echo $data_airline['delete_result'];
    }
    function Airline_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_airline['data_result']=$this->Airline_Model->Get_Single($code);
        foreach ($data_airline['data_result']->result() as $row_fetch){
            $this->session->set_userdata('airline_logo',$row_fetch->airline_logo);
            $this->session->set_userdata('airline_companyCode',$row_fetch->airline_companyCode);
        }
        $this->load->view('Airline/airline_edit',$data_airline);
    }
    function Update(){
        $companycode=$this->session->userdata('airline_companyCode');
        if(!empty($companycode)){
            $form_validation=array(
                array(
                    'field'=>'airline_name',
                    'label'=>'airline_name',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the company name'
                    )
                ),
                array(
                    'field'=>'airline_managerName',
                    'label'=>'airline_managerName',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the name of the company manager',
                    )
                ),
                array(
                    'field'=>'airline_centralAddress',
                    'label'=>'airline_centralAddress',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the main address of the company',
                    )
                ),
                array(
                    'field'=>'airline_tell',
                    'label'=>'airline_tell',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the company phone number',
                    )
                ),array(
                    'field'=>'airline_managerMobile',
                    'label'=>'airline_managerMobile',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the company mobile number',
                    )
                ),array(
                    'field'=>'airline_companyCode',
                    'label'=>'airline_companyCode',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'Enter the company code',
                        'numeric'=>'Enter the company code numeric'
                    )
                )
            );
            $this->form_validation->set_rules($form_validation);
            if($this->form_validation->run()==false){
                $this->Airline_Update($this->session->userdata('airline_companyCode'));
            }else{
                $airline_logo=$_FILES['pic']['name'];
                if(!empty($airline_logo)){
                    $config['upload_path'] = "uploads/";
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = 10000;
                    $config['max_width'] = 2024;
                    $config['max_height'] = 1768;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('pic')) {
                        $data_airline['register_result'] = "Image failed to upload";
                    } else {
                        $data_airline=$_POST;
                        $data_airline['airline_logo']=$this->upload->data('file_name');
                        $retrieve=$this->Airline_Model->Update($data_airline);
                        if($retrieve){
                            $data_airline['action_result']=" The details of the airline company were edited in the system";
                            unlink('uploads/'.$this->session->userdata('airline_logo'));
                        }else{
                            $data_airline['action_result']=" The details of the airline company were not edited in the system";
                        }
                    }
                    $this->load->view('Airline/airline_show',$data_airline);
                }else{
                    $data_airline=$_POST;
                    $data_airline['airline_logo']=$this->session->userdata('airline_logo');
                    $retrieve=$this->Airline_Model->Update($data_airline);
                    if($retrieve){
                        $data_airline['action_result']=" The details of the airline company were edited in the system";
                    }else{
                        $data_airline['action_result']=" The details of the airline company were not edited in the system";
                    }
                    $session_unset_array=array('airline_logo','airline_companyCode');
                    $this->session->unset_userdata($session_unset_array);
                    $this->load->view('Airline/airline_show',$data_airline);
                }
            }
        }else{
            redirect('Airline/Show_Airlines');
        }
    }
}