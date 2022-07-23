<?php

class Flight_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('Flight',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('Flight');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('Flight_id',$data);
        $retrieve=$this->db->delete('Flight');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('Flight', array('Flight_id' => $data));
        return $retrieve;
    }
    function Get_Single_Code($data){
        $retrieve = $this->db->get_where('Flight', array('Flight_code' => $data));
        return $retrieve;
    }
    function Get_SingleFlight_WithCode($data){
        $retrieve = $this->db->get_where('Flight', array('Flight_code' => $data));
        return $retrieve;
    }
    function Update($data){
        $Flight_id=$this->session->userdata('Flight_id');
        $data=array(
            'Flight_origin'=>$data['Flight_origin'],
            'Flight_destination'=>$data['Flight_destination'],
            'Flight_capacity'=>$data['Flight_capacity'],
            'Flight_price'=>$data['Flight_price'],
            'Flight_date'=>$data['Flight_date'],
            'Flight_time'=>$data['Flight_time'],
            'Flight_airline'=>$data['Flight_airline'],
        );
        $this->db->where('Flight_id',$Flight_id);
        $query=$this->db->update('Flight',$data);
        return $query;
    }
    function Change_State($code,$state){
        $this->db->where('Flight_code',$code);
        $retrieve=$this->db->update('Flight',array('Flight_state'=>$state));
        return $retrieve;
    }
}