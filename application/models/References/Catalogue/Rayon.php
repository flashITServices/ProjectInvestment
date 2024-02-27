<?php 
   
    class Rayon extends CI_Model{
        public  $idRayon;
        public  $designations;
        public  $description;
        public   $dateAjour;

        public  $categories =array();
        public function __construct(){
            parent::__construct();
           
        }
        public function getIdRayon(){
            return $this->idRayon;
        }

        public function getDesignations(){
            return $this->designations;
        }
        public function getDescription(){
            return $this->description;
        }

        public function getDateAjour(){
            return $this->dateAjour;
        }
        public function setId($id){
            $this->idRayon=$id;
        }

        public function setDateAjour($date){
             $this->dateAjour=$date;
        }

        public function setDesignation($designation){
            $this->designations=$designation;
        }
        public function setDescription($description){
            $this->description=$description;
        }

        public function setCategorie($categories){
            $this->categories=$categories;
        }

        public function addCategorie($categorie){
            $this->categories[]=$categorie;
        }
        public function getCategorie(){
            return $this->categories;
        }

        public function getRayons(){
            //return $this->db->select('idRayon,Designations')->from(__CLASS__)->get()->custom_result_object(__CLASS__);
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        public function getRayonById($id){
            return $this->db->where(array('idRayon'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        public function count (){
            return $this->db->count_all(__CLASS__);
        }

        public function addrayon(Rayon $rayon){
            return $this->db->set($rayon)->insert(__CLASS__);
        }

        public function getMaxID(){
            return $this->db->select_max('idRayon')->get(__CLASS__)->custom_result_object(__CLASS__);
        }
    }