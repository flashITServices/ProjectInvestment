<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
   require_once('Organisme.php');
    class Incubateur extends Organisme{
        public $projets=array();
        public $subventions=array();

        public function __construct(){
            parent::__construct();
        }
        public function getDemandesSubventions(){

        }
        public function getProjets(){

        }

        public function getProjetByID($id){

        }
        public function getSubventionsByMontant($montant){

        }

        public function getSubventionByNatureProjet($nature){

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