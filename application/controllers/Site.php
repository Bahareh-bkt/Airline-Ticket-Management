<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
    
    public $destination_Flight;
    public $date_Flight;
     function __construct()
    {
        parent::__construct();
        $this->load->model('Site_Model');
    }
    function index(){
        $config['base_url'] = base_url().'Site/index/page/';
        $config['total_rows'] = $this->CountAll();
        $config['per_page'] = 12;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);


        $data['fetch_data']=$this->Site_Model->Get_All($config['per_page'],$page);
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
    }
    // function explode_date($date){
    //     $data=explode('/',$date);
    //     switch ($data[1]){
    //         case "1":
    //             $month="January";
    //             break;
    //         case "2":
    //             $month="February";
    //             break;
    //         case "3":
    //             $month="March";
    //             break;
    //         case "4":
    //             $month="April";
    //             break;
    //         case "5":
    //             $month="May";
    //             break;
    //         case "6":
    //             $month="June";
    //             break;
    //         case "7":
    //             $month="July";
    //             break;
    //         case "8":
    //             $month="August";
    //             break;
    //         case "9":
    //             $month="September";
    //             break;
    //         case "10":
    //             $month="October";
    //             break;
    //         case "11":
    //             $month="November";
    //             break;
    //         case "12":
    //             $month="December";
    //             break;
    //     }
    //     return $data[2]." ".$month." ".$data[0];
    // }
    function explode_airline($data){
        $data=explode('/',$data);
        return $data[0];
    }
    function get_airline_image($data){
        $data=explode('/',$data);
        $this->load->model('Airline_Model');
        $data_airline['data_result']=$this->Airline_Model->Get_Single($data[1]);
        foreach ($data_airline['data_result']->result() as $row){
            return $row->airline_logo;
        }
    }
    
    function Search(){
        if(isset($_POST['Flight_destination'])){
            $this->session->set_userdata('Flight_destination_search',$_POST['Flight_destination']);
        }
        if(isset($_POST['Flight_date'])){
            $this->session->set_userdata('Flight_date_search',$_POST['Flight_date']);
        }
        $config['base_url'] = base_url().'Site/Search/page/';
        $config['total_rows'] = $this->CountAll_Search();
        $config['per_page'] = 4;
        $config['uri_segment']=4;
        $page=($this->uri->segment(4))?$this->uri->segment(4):0;
        $this->pagination->initialize($config);
        $data['fetch_data']=$this->Site_Model->Get_All_Search($config['per_page'],$page,$this->session->userdata('Flight_destination_search'),$this->session->userdata('Flight_date_search'));
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('Site/index',$data);
        
    }
    public function CountAll_Search(){
        return $this->db->where(array('Flight_state'=>'0','Flight_destination'=>$this->session->userdata('Flight_destination_search'),'Flight_date'=>$this->session->userdata('Flight_date_search')))->count_all_results('Flight');
    }
    public function CountAll(){
        return $this->db->where(array('Flight_state'=>'0'))->count_all_results('Flight');
    }

    public function Reserve(){
        $this->load->view('Site/reserve');
    }
    public function Get_Single($ID){
        $this->load->model('Flight_Model');
        $Flight_data['result_data']=$this->Flight_Model->Get_Single($ID);
        return $Flight_data;
    }
    public function Reserve_Final(){
        $form_validation=array(
            array(
                'field'=>'reserve_username',
                'label'=>'reserve_username',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter your name'
                )
            ),
            array(
                'field'=>'reserve_nationalCode',
                'label'=>'reserve_nationalCode',
                'rules'=>'required|exact_length[10]',
                'errors'=>array(
                    'required'=>'Enter your national Code',
                    'exact_length'=>'The national Code is 10 digits!',
                )
            ),
            array(
                'field'=>'reserve_mobile',
                'label'=>'reserve_mobile',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter your mobile phone',
                )
            ),
            array(
                'field'=>'reserve_age',
                'label'=>'reserve_age',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter your age',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->Reserve();
            // $this->load->view('Site/index');
        }else{
             $ID=$this->uri->segment(3);
             $data_Flight=$this->Get_Single($ID);
             foreach($data_Flight['result_data']->result() as $row){
                 $data_Flight['Flight_origin']=$row->Flight_origin;
                 $data_Flight['Flight_destination']=$row->Flight_destination;
                 // $data_Flight['Flight_Capacity']=$row->Flight_Capacity;
                 $data_Flight['Flight_reserved_count']=$row->Flight_reserved_count;
                 // $data_Flight['Flight_Price']=$row->Flight_Price;
                 $data_Flight['Flight_date']=$row->Flight_date;
                 $data_Flight['Flight_time']=$row->Flight_time;
                 $data_Flight['Flight_airline']=$row->Flight_airline;
             }
            $data_Flight['Flight_date']=$data_Flight['Flight_date'];
            $data_Flight['airline_image']=$this->get_airline_image($data_Flight['Flight_airline']);
            $data_Flight['Flight_airline']=$this->explode_airline($data_Flight['Flight_airline']);
            $data_Flight['reserve_username']=$_POST['reserve_username'];
            $data_Flight['reserve_nationalCode']=$_POST['reserve_nationalCode'];
            $data_Flight['reserve_mobile']=$_POST['reserve_mobile'];
            $data_Flight['reserve_age']=$_POST['reserve_age'];
            $data_Flight['reserve_adultCount']=$_POST['reserve_adultCount'];
            $data_Flight['reserve_childCount']=$_POST['reserve_childCount'];
            // $data_Flight['Flight_Price']=$data_Flight['Flight_Price'];
            // $data_Flight['Flight_Capacity']=$data_Flight['Flight_Capacity'];

            $array_user=array(
                'reserve_username'=>$data_Flight['reserve_username'],
                'reserve_nationalCode'=>$data_Flight['reserve_nationalCode'],
                'reserve_mobile'=>$data_Flight['reserve_mobile'],
                'reserve_age'=>$data_Flight['reserve_age'],
                'reserve_adultCount'=>$data_Flight['reserve_adultCount'],
                'reserve_childCount'=>$data_Flight['reserve_childCount'],

            );
            $this->session->set_userdata($array_user);
             $this->load->view('Site/reserve-final',$data_Flight);
        }
    }
    function Register_Reserve(){
        $ID=$this->uri->segment(3);
        $data_Flight=$this->Get_Single($ID);
        foreach($data_Flight['result_data']->result() as $row){
            $data_Flight['Flight_origin']=$row->Flight_origin;
            $data_Flight['Flight_destination']=$row->Flight_destination;
            $data_Flight['Flight_capacity']=$row->Flight_capacity;
            $data_Flight['Flight_reserved_count']=$row->Flight_reserved_count;
            $data_Flight['Flight_price']=$row->Flight_price;
            $data_Flight['Flight_date']=$row->Flight_date;
            $data_Flight['Flight_time']=$row->Flight_time;
            $data_Flight['Flight_airline']=$row->Flight_airline;
            $data_Flight['Flight_code']=$row->Flight_code;
        }
        if($data_Flight['Flight_reserved_count'] < $data_Flight['Flight_capacity']){
            $retrieve=$this->Site_Model->Update_FlightReservedCount($data_Flight['Flight_code'],$data_Flight['Flight_reserved_count']);
             if($retrieve){
                if($data_Flight['Flight_capacity']==$data_Flight['Flight_reserved_count']+1){
                    $this->Site_Model->Update_FlightState($data_Flight['Flight_code']);
                }
                $data_reserve['reserve_username']=$this->session->userdata('reserve_username');
                $data_reserve['reserve_nationalCode']=$this->session->userdata('reserve_nationalCode');
                $data_reserve['reserve_mobile']=$this->session->userdata('reserve_mobile');
                $data_reserve['reserve_age']=$this->session->userdata('reserve_age');
                $data_reserve['reserve_adultCount']=$this->session->userdata('reserve_adultCount');
                $data_reserve['reserve_childCount']=$this->session->userdata('reserve_childCount');
                $data_reserve['reserve_singlePrice']=$data_Flight['Flight_price'];
                $data_reserve['reserve_totalPrice']=($data_Flight['Flight_price'] * ($data_reserve['reserve_childCount'] + $data_reserve['reserve_adultCount'])) ;
                $data_reserve['reserve_FlightCode']=$data_Flight['Flight_code'];
                $data_reserve['reserve_Code']=mt_rand();
                 // $this->load->view('Site/show_reserve,$data_reserve');
                $retrieve=$this->Site_Model->Reserve_Register($data_reserve);
                if($retrieve){

                    redirect(base_url().'index.php/Site/Show_Reserve/'.$data_reserve['reserve_Code'].'/'.$data_reserve['reserve_nationalCode']);
                }else{
                    redirect(base_url().'Site/Show_Reserve/NOtReserve');
                }
            }else{
                redirect(base_url().'Site/Show_Reserve/NOtUpdateCapacity');
            }
        }else{
            redirect(base_url().'Site/Show_Reserve/NOtCapacity');
         }
    }


    public function Show_Reserve(){
        $this->load->view('Site/show_reserve');
    }
    public function Get_Single_Reserve($Code,$nationalCode){
        $Reserve_data['result_data']=$this->Site_Model->Get_Single_Reserve($Code,$nationalCode);
        return $Reserve_data;
    }
    public function Get_SingleFlight_WithCode($Code){
        $this->load->model('Flight_Model');
        $Flight_data['result_data']=$this->Flight_Model->Get_SingleFlight_WithCode($Code);
        return $Flight_data;
    }
    public function Follow_up(){
        $form_validation=array(
            array(
                'field'=>'nationalCode',
                'label'=>'nationalCode',
                'rules'=>'required|exact_length[10]',
                'errors'=>array(
                    'required'=>'Enter your national Code',
                    'exact_length'=>'The national Code is 10 digits!',
                )
            ),
            array(
                'field'=>'ReserveCode',
                'label'=>'ReserveCode',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Enter your Reserved Code',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            //$this->Follow_up();
            $this->load->view('Site/search');
        }else{

        redirect (base_url().'index.php/Site/Show_Reserve/'.$_POST['ReserveCode'].'/'.$_POST['nationalCode']);
        }}




    function Get_All_Reserve(){
        $data_reserve['get_all']=$this->Site_Model->Get_All_Reserve();
        return $data_reserve;
    }
    function Delete(){
        $code=$this->input->post('code');
        $data_reserve['delete_result']=$this->Site_Model->Delete($code);
        echo $data_reserve['delete_result'];
    }
    function contactus(){
        $this->load->view('Site/contact');
    }
    function Register_Contact(){
        $form_validation=array(
            array(
                'field'=>'name',
                'label'=>'name',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your full name',
                )
            ),
            array(
                'field'=>'email',
                'label'=>'email',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your Email',
                )
            ),
            array(
                'field'=>'subject',
                'label'=>'subject',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please enter your subject',
                )
            ),
            array(
                'field'=>'text',
                'label'=>'text',
                'rules'=>'required',
                'errors'=>array(
                    'required'=>'Please write your message',
                )
            )
        );
        $this->form_validation->set_rules($form_validation);
        if($this->form_validation->run()==false){
            $this->load->view('Site/contact');
        }else{
            $data=$_POST;
            $retrieve=$this->Site_Model->Register_Contact($data);
            if($retrieve){
                $data_contact['register_result']="Your message has been successfully registerd";
            }else{
                $data_contact['register_result']="Your message not registerd";
            }
            $this->load->view('Site/contact',$data_contact);
        }
    }
    function aboutus(){
        $this->load->view('Site/about');
    }
    function searchTicket(){
        $this->load->view('Site/search');
    }
    function Show_Contact(){
        $this->load->view('contactus/contactus_show');
    }
    function Get_All_Contacte(){
        $data_contact['get_all']=$this->Site_Model->Get_All_Contact();
        return $data_contact;
    }
}
