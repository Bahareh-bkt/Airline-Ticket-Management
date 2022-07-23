<?php

class Airplane_Model extends CI_Model{
    function __construct()
    {
        parent::__construct();
    }
    function Insert($data){
        $retrieve=$this->db->insert('Airplane',$data);
        return $retrieve;
    }
    function Get_All(){
        $retrieve=$this->db->get('Airplane');
        return $retrieve;
    }
    function Delete($data){
        $this->db->where('Airplane_id',$data);
        $retrieve=$this->db->delete('Airplane');
        return $retrieve;
    }
    function Get_Single($data){
        $retrieve = $this->db->get_where('Airplane', array('Airplane_id' => $data));
        return $retrieve;
    }
    function Update($data){
        $Airplane_id=$this->session->userdata('Airplane_id');
        $data=array(
            'Airplane_name'=>$data['Airplane_name'],
            'Airplane_airlineName'=>$data['Airplane_airlineName'],
            'Airplane_airlineCode'=>$data['Airplane_airlineCode'],
            'Airplane_Code'=>$data['Airplane_Code'],
        );
        $this->db->where('Airplane_id',$Airplane_id);
        $query=$this->db->update('Airplane',$data);
        return $query;

    }
}