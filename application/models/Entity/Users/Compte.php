<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Compte extends CI_Model{
        public $idCompte;
        public $username;
        public  $password;
        public $statutLogin;
        public $Utilisateur_idUtilisateur;
        public $last_login;

        public function __construct(){
            parent::__construct();
        }

        
        public function __set($name, $value){
            if ($name === 'last_login')
            {
                $this->last_login = DateTime::createFromFormat('U', $value);
            }
            else{
                $this->$name=$this->$value;
            }
        }

        public function getLogin($username,$password){
            return $this->db->limit(1)->get_where(__CLASS__,array('username'=>$username,'password'=>$password))->custom_result_object(__CLASS__);
         
         }

         public function getUserByUsername($username){
            return $this->db->limit(1)->get_where(__CLASS__,array('username'=>$username))->custom_result_object(__CLASS__);   
         }

    


        public function last_login($format){
            if(isset($format)){
                return $this->last_login->format($format);
            }
          
        }

        
      
    }