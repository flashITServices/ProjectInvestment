<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class TableControllers extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $query= $this->db->query("SELECT * FROM cotation ORDER BY nomEntreprise ASC");
        $data['cotation']=$query;
       
        $this->load->view('AdminPanel/tables-data');
      
    }

    public function tables(){
        $this->load->view('AdminPanel/tables-general');
    }

    public function pricing_tables(){
        $this->load->view('AdminPanel/users-profile');
    }
}