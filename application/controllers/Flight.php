<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Flight extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Flight_Model');
    }
    function Register_Form(){
        $this->load->view('Flight/Flight_register');
    }
    function Get_All_Airlines(){
        $this->load->model('Airline_Model');
        $data_airline['get_all']=$this->Airline_Model->Get_All();
        return $data_airline;
    }
    function Show_Flight(){
        $this->load->view('Flight/Flight_show');
    }
    function Get_All_Flight(){
        $data_Flight['get_all']=$this->Flight_Model->Get_All();
        return $data_Flight;
    }

    function Register(){
        $form_validation=array(
            array(
                'field'=>'Flight_capacity',
                'label'=>'Flight_capacity',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'Please enter the capacity',
                    'numeric'=>'Enter the capacity as a number'
                )
            ),
            array(
                'field'=>'Flight_price',
                'label'=>'Flight_price',
                'rules'=>'required|numeric',
                'errors'=>array(
                    'required'=>'Please enter the price',
                    'numeric'=>' Enter the flight price numerically'
                )
            ),
            array(
                'field'=>'Flight_date',
                'label'=>'Flight_date',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the flight date',
                )
            ),
            array(
                'field'=>'Flight_time',
                'label'=>'Flight_time',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter the flight time',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Flight/Flight_register');
        }else{
            $name_and_companyCode=explode('/',$_POST['Flight_airline']);
            $data['Flight_origin']=$_POST['Flight_origin'];
            $data['Flight_destination']=$_POST['Flight_destination'];
            $data['Flight_capacity']=$_POST['Flight_capacity'];
            $data['Flight_price']=$_POST['Flight_price'];
            $data['Flight_date']=$_POST['Flight_date'];
            $data['Flight_time']=$_POST['Flight_time'];
            $data['Flight_airline']=$name_and_companyCode[0]."/".$name_and_companyCode[1];
            $data['Flight_state']="0";
            $data['Flight_code']=mt_rand();

            $retrieve=$this->Flight_Model->Insert($data);
            if($retrieve){
                $data_Flight['register_result']="The flight was registered in the system";
            }else{
                $data_Flight['register_result']="The flight was not registered in the system";
            }
            $this->load->view('Flight/Flight_register',$data_Flight);

        }
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_Flight['delete_result']=$this->Flight_Model->Delete($code);
        echo $data_Flight['delete_result'];
    }
    function Flight_Update($data){
        $code=$this->uri->segment('3');
        if(isset($data)){
            $code=$data;
        }
        $data_Flight['data_result']=$this->Flight_Model->Get_Single($code);
        foreach ($data_Flight['data_result']->result() as $row_fetch){
            $this->session->set_userdata('Flight_id',$row_fetch->Flight_id);
        }
        $this->load->view('Flight/Flight_edit',$data_Flight);
    }
    function Update(){
        $Flight_id=$this->session->userdata('Flight_id');
        if(!empty($Flight_id)){
            $form_validation=array(
                array(
                    'field'=>'Flight_capacity',
                    'label'=>'Flight_capacity',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'Please enter the capacity',
                        'numeric'=>' Enter the capacity as a number'
                    )
                ),
                array(
                    'field'=>'Flight_price',
                    'label'=>'Flight_price',
                    'rules'=>'required|numeric',
                    'errors'=>array(
                        'required'=>'Please enter the price',
                        'numeric'=>' Enter the flight price numerically'
                    )
                ),
                array(
                    'field'=>'Flight_date',
                    'label'=>'Flight_date',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the flight date',
                    )
                ),
                array(
                    'field'=>'Flight_time',
                    'label'=>'Flight_time',
                    'rules'=>'required',
                    'errors'=>array(
                        'required'=>'Enter the flight time',
                    )
                )
            );
            $this->form_validation->set_rules($form_validation);
            if($this->form_validation->run()==false){
                $this->Flight_Update($this->session->userdata('Flight_id'));
            }else{
                $name_and_companyCode=explode('/',$_POST['Flight_airline']);
                $data['Flight_origin']=$_POST['Flight_origin'];
                $data['Flight_destination']=$_POST['Flight_destination'];
                $data['Flight_capacity']=$_POST['Flight_capacity'];
                $data['Flight_price']=$_POST['Flight_price'];
                $data['Flight_date']=$_POST['Flight_date'];
                $data['Flight_time']=$_POST['Flight_time'];
                $data['Flight_airline']=$name_and_companyCode[0]."/".$name_and_companyCode[1];
                $retrieve=$this->Flight_Model->Update($data);
                if($retrieve){
                    $data_Flight['action_result']="The flight was edited in the system";
                }else{
                    $data_Flight['action_result']="The flight was not edited in the system";
                }
                $session_unset_array=array('Flight_id');
                $this->session->unset_userdata($session_unset_array);
                $this->load->view('Flight/Flight_show',$data_Flight);

            }
        }else{
            redirect('Airline/Show_Airlines');
        }
    }
    function Change_State(){
        $code=$this->input->post('code');
        $state=$this->input->post('state');
        if($state=="3")
            $state="0";
        else
            $state++;
        $retrieve=$this->Flight_Model->Change_State($code,$state);
        if($retrieve)
            echo "1";
        else
            echo "0";
    }
}
