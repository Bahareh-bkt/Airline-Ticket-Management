<?php

class Site_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function Get_All($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('Flight_state','0');
        $retrieve =$this->db->get('Flight');
        return $retrieve ;
    }
    public function Get_All_Mashhad($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('Flight_destination','Mashhad');
        $this->db->where('Flight_state','0');
        $retrieve =$this->db->get('Flight');
        return $retrieve ;
    }
    public function Get_All_Search($limit,$start,$destination,$date){
        $this->db->limit($limit,$start);
        $this->db->where('Flight_destination',$destination);
        $this->db->where('Flight_date',$date);
        $this->db->where('Flight_state','0');
        $retrieve =$this->db->get('Flight');
        return $retrieve ;
    }
    public function Get_All_Kish($limit,$start){
        $this->db->limit($limit,$start);
        $this->db->where('Flight_destination','Kish');
        $this->db->where('Flight_state','0');
        $retrieve =$this->db->get('Flight');
        return $retrieve ;
    }
    public function Update_FlightReservedCount($Code,$NCount){
        $this->db->where('Flight_code',$Code);
        $retrieve=$this->db->update('Flight',array('Flight_reserved_count'=>$NCount+1));
        return $retrieve;
    }
    public function Reserve_Register($data){
        $retrieve=$this->db->insert('reserve',$data);
        return $retrieve;
        $this->load->view('Site/show_reserve,$data_reserve');
    }
    public function Update_FlightState($Code){
        $this->db->where('Flight_code',$Code);
        $retrieve=$this->db->update('Flight',array('Flight_state'=>1));
        return $retrieve;
    }
    public function Get_Single_Reserve($Code,$nationalCode){
        $this->db->where(array('reserve_Code'=>$Code,'reserve_nationalCode'=>$nationalCode));
        $retrieve=$this->db->get('reserve');
        return $retrieve;
    }
    function Get_All_Reserve(){
        $retrieve=$this->db->get('reserve');
        return $retrieve;
    }
    function Get_All_Contact(){
        $retrieve=$this->db->get('contact');
        return $retrieve;
    }
    function Delete($code){
        $this->db->where('reserve_Code',$code);
        $retrieve=$this->db->delete('reserve');
        return $retrieve;
    }
    function Register_Contact($data){
        return $this->db->insert('contact',$data);
    }
    // function Update(){
    //     $companycode=$this->session->userdata('airline_companyCode');
    //     if(!empty($companycode)){
    //         $form_validation=array(
    //             array(
    //                 'field'=>'airline_name',
    //                 'label'=>'airline_name',
    //                 'rules'=>'required',
    //                 'errors'=>array(
    //                     'required'=>'Enter the company name'
    //                 )
    //             ),
    //             array(
    //                 'field'=>'airline_managerName',
    //                 'label'=>'airline_managerName',
    //                 'rules'=>'required',
    //                 'errors'=>array(
    //                     'required'=>'Enter the name of the company manager',
    //                 )
    //             ),
    //             array(
    //                 'field'=>'airline_centralAddress',
    //                 'label'=>'airline_centralAddress',
    //                 'rules'=>'required',
    //                 'errors'=>array(
    //                     'required'=>'Enter the main address of the company',
    //                 )
    //             ),
    //             array(
    //                 'field'=>'airline_tell',
    //                 'label'=>'airline_tell',
    //                 'rules'=>'required',
    //                 'errors'=>array(
    //                     'required'=>'Enter the company phone number',
    //                 )
    //             ),array(
    //                 'field'=>'airline_managerMobile',
    //                 'label'=>'airline_managerMobile',
    //                 'rules'=>'required',
    //                 'errors'=>array(
    //                     'required'=>'Enter the company mobile number',
    //                 )
    //             ),array(
    //                 'field'=>'airline_companyCode',
    //                 'label'=>'airline_companyCode',
    //                 'rules'=>'required|numeric',
    //                 'errors'=>array(
    //                     'required'=>'Enter the company code',
    //                     'numeric'=>'Enter the company code numeric'
    //                 )
    //             )
    //         );
    //         $this->form_validation->set_rules($form_validation);
    //         if($this->form_validation->run()==false){
    //             $this->Airline_Update($this->session->userdata('airline_companyCode'));
    //         }else{
    //             $airline_logo=$_FILES['pic']['name'];
    //             if(!empty($airline_logo)){
    //                 $config['upload_path'] = "uploads/";
    //                 $config['allowed_types'] = 'gif|jpg|png|jpeg';
    //                 $config['max_size'] = 10000;
    //                 $config['max_width'] = 2024;
    //                 $config['max_height'] = 1768;

    //                 $this->load->library('upload', $config);

    //                 if (!$this->upload->do_upload('pic')) {
    //                     $data_airline['register_result'] = "Image failed to upload";
    //                 } else {
    //                     $data_airline=$_POST;
    //                     $data_airline['airline_logo']=$this->upload->data('file_name');
    //                     $retrieve=$this->Airline_Model->Update($data_airline);
    //                     if($retrieve){
    //                         $data_airline['action_result']=" The details of the airline company were edited in the system";
    //                         unlink('uploads/'.$this->session->userdata('airline_logo'));
    //                     }else{
    //                         $data_airline['action_result']=" The details of the airline company were not edited in the system";
    //                     }
    //                 }
    //                 $this->load->view('Airline/airline_show',$data_airline);
    //             }else{
    //                 $data_airline=$_POST;
    //                 $data_airline['airline_logo']=$this->session->userdata('airline_logo');
    //                 $retrieve=$this->Airline_Model->Update($data_airline);
    //                 if($retrieve){
    //                     $data_airline['action_result']=" The details of the airline company were edited in the system";
    //                 }else{
    //                     $data_airline['action_result']=" The details of the airline company were not edited in the system";
    //                 }
    //                 $session_unset_array=array('airline_logo','airline_companyCode');
    //                 $this->session->unset_userdata($session_unset_array);
    //                 $this->load->view('Airline/airline_show',$data_airline);
    //             }
    //         }
    //     }else{
    //         redirect('Airline/Show_Airlines');
    //     }
    // }
}