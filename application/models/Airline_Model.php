<?php

class Airline_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('airline',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('airline');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('airline_companyCode',$data);
        $retrieve=$this->db->delete('airline');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('airline', array('airline_companyCode' => $data));
        return $retrieve;
    }
    function Update($data){
        $airline_companyCode=$this->session->userdata('airline_companyCode');
        $data=array(
            'airline_name'=>$data['airline_name'],
            'airline_managerName'=>$data['airline_managerName'],
            'airline_centralAddress'=>$data['airline_centralAddress'],
            'airline_tell'=>$data['airline_tell'],
            'airline_managerMobile'=>$data['airline_managerMobile'],
            'airline_companyCode'=>$data['airline_companyCode'],
            'airline_logo'=>$data['airline_logo'],
        );
        $this->db->where('airline_companyCode',$airline_companyCode);
        $query=$this->db->update('airline',$data);
        return $query;

    }
}