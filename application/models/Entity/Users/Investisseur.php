<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
   require_once('Organisme.php');
    class Investisseur extends Organisme{
        public $subventions = array() ;
        
        public function __construct(){
            parent::__construct();
        }
        public function get_subventions(){
            return $this->subventions;
        }
        public function set_subventions(array $subventions){
            $this->subventions = $subventions;
        }
        public function add_subvention($subvention){
            array_push($this->subventions,$subvention);
        }
        public function remove_subvention($subvention){
            $this->subventions = array_diff($this->subventions, [$subvention]);
        }
        public function remove_last_subention(){
            array_pop($this->subventions);
        }

    }