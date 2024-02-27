<?php 
 
    class Adresse extends CI_Model{
       
      
        private $province;
        private $references;
        private $ville;
        private $pays;
        public function __construct(){
          parent::__construct();
        }
        // les Getters et Setters nous permettent d'acceder aux attributs en lecture et ecriture
       

       
     
        public function getProvince(){
            return $this->province;
        }
        public function setProvince($province){
            $this->province=$province;
        }

        public function getReferences(){
            return $this->references;
        }
        public function setReferences($references){
            $this->references=$references;
        }
        public function getVille(){
            return $this->ville;
        }
        public function setVille($ville){
            $this->ville=$ville;
        }

        public function getPays(){
            return $this->pays;
        }
        public function setPays($pays){
            $this->pays=$pays;
        }



    }