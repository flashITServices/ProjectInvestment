<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Admin extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->library('Grocery_CRUD');
            if(! $this->isAdmin())
                exit("Vous n'avez pas droit de voir cette page !!!");
        }

        public function activer_maintenance(){

        }

        public function deleteUser(int $id){

        }

        public function ajouterAgent(Agent $agent){

        }

        public  function isAdmin(){

        }
    }