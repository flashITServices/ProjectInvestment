<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
   require_once('Organisme.php');
    class Investisseur extends Organisme{
        public $typeStartup;
        public $projets=array();
        public $subventionsEncours=array();
        public function __construct(){
            parent::__construct();
        }

        public function get_subventions(){
            return $this->subventionsEncours;
        }
        public function set_subventions(array $subventions){
            $this->subventionsEncours = $subventions;
        }
        public function add_subvention($subvention){
            array_push($this->subventionsEncours,$subvention);
        }
        public function remove_subvention($subvention){
            $this->subventionsEncours = array_diff($this->subventionsEncours, [$subvention]);
        }
        public function remove_last_subention(){
            array_pop($this->subventionsEncours);
        }

        public function get_prjects(){
            return $this->projets;
        }
        public function set_projects(array $projets){
            $this->projets = $projets;
        }
        public function add_project($projet){
            array_push($this->projets,$projet);
        }
        public function remove_project($projet){
            $this->projets = array_diff($this->projets, [$projet]);
        }
        public function remove_last_project(){
            array_pop($this->projets);
        }

    }