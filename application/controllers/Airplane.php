<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Airplane extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Airplane_Model');
    }
    function Register_Form(){
        $this->load->view('Airplane/airplane_register');
    }
    function Show_Airplane(){
        $this->load->view('Airplane/airplane_show');
    }
    function Get_All_Airlines(){
        $this->load->model('Airline_Model');
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Get_All_Airplane(){
        $data_airline['get_all']=$this->Airplane_Model->Get_All();
        return $data_airline;
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_Airplane['delete_result']=$this->Airplane_Model->Delete($code);
        echo $data_Airplane['delete_result'];
    }
    function Airplane_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_Airplane['data_result']=$this->Airplane_Model->Get_Single($code);
        foreach ($data_Airplane['data_result']->result() as $row_fetch){
            $this->session->set_userdata('Airplane_id',$row_fetch->Airplane_id);
        }
        $this->load->view('Airplane/Airplane_edit',$data_Airplane);
    }
    function Update()
    {
        $form_validation = array(
            array(
                'field' => 'Airplane_name',
                'label' => 'Airplane_name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Enter the name of the airplane'
                )
            ),
            array(
                'field' => 'Airplane_Code',
                'label' => 'Airplane_Code',
                'rules' => 'required|numeric',
                'errors' => array(
                    'required' => 'Enter the flight code',
                    'numeric' => ' Enter the flight code numeric'
                )
            ),
        );
        $this->form_validation->set_rules($form_validation);
        if ($this->form_validation->run() == false) {
            $this->Airplane_Update($this->session->userdata('Airplane_id'));
        } else {
            $name_and_companyCode=explode('/',$_POST['Airplane_airlineName']);
            $data['Airplane_name']=$_POST['Airplane_name'];
            $data['Airplane_airlineName']=$name_and_companyCode[0];
            $data['Airplane_airlineCode']=$name_and_companyCode[1];
            $data['Airplane_Code']=$_POST['Airplane_Code'];
            $retrieve=$this->Airplane_Model->Update($data);
            if($retrieve){
                $data_Airplane['action_result']=" The plane was edited in the system";
            }else{
                $data_Airplane['action_result']=" The plane was not edited in the system";
            }
            $session_unset_array=array('Airplane_id');
            $this->session->unset_userdata($session_unset_array);
            $this->load->view('Airplane/Airplane_show',$data_Airplane);
        }
    }
    function Register(){
        $form_validation=array(
            array(
                'field'=>'Airplane_name',
                'label'=>'Airplane_name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the name of the airplane'
                )
            ),
            array(
                'field'=>'Airplane_Code',
                'label'=>'hAirplane_Code',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'Enter the flight code',
                    'numeric'=>' Enter the flight code numeric'
                )
            ),
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Airplane/Airplane_register');
        }else{
            $name_and_companyCode=explode('/',$_POST['Airplane_airlineName']);
            $data['Airplane_name']=$_POST['Airplane_name'];
            $data['Airplane_airlineName']=$name_and_companyCode[0];
            $data['Airplane_airlineCode']=$name_and_companyCode[1];
            $data['Airplane_Code']=$_POST['Airplane_Code'];
            $retrieve=$this->Airplane_Model->Insert($data);
            if($retrieve){
                $data_Airplane['register_result']=" The plane was registered in the system";
            }else{
                $data_Airplane['register_result']="The plane was not registered in the system";
            }
            $this->load->view('Airplane/Airplane_register',$data_Airplane);
        }
    }

}