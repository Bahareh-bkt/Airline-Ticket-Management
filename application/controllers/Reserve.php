<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Reserve extends CI_Controller {
    function __construct()
    {
        parent::__construct();
      
        $this->load->model('Site_Model');
    }
    function Show_Reserves(){
        $this->load->view('Reserve/reserve_show');
    }
    function Get_All_Reserve(){
        $data_reserve['get_all']=$this->Site_Model->Get_All_Reserve();
        return $data_reserve;
    }
    
    function Delete(){
        $code=$this->input->post('code');
        $data_reserve['delete_result']=$this->Site_Model->Delete($code);
        echo $data_reserve['delete_result'];
    }
    function Update($data){
        $reserve_Code=$this->session->userdata('reserve_Code');
        $data=array(
            'reserve_username'=>$data['reserve_username'],
            'reserve_nationalCode'=>$data['reserve_nationalCode'],
            'reserve_mobile'=>$data['reserve_mobile'],
            'reserve_age'=>$data['reserve_age'],
            'reserve_adultCount'=>$data['reserve_adultCount'],
            'reserve_singlePrice'=>$data['reserve_singlePrice'],
            'reserve_totalPrice'=>$data['reserve_totalPrice'],
            'reserve_childCount'=>$data['reserve_childCount'],
            'reserve_flightCode'=>$data['reserve_flightCode'],
            'reserve_Code'=>$data['reserve_Code'],
        );
        $this->db->where('reserve_Code',$reserve_Code);
        $query=$this->db->update('reserve',$data);
        return $query;

    }
   }