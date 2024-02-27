<?php
   


    class Catalogue extends CI_Model{

        public function __construct(){
            parent::___construct();
        }
      
      
        private  $dateAjour;

        /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var array
         */
        private $rayons;


    

        public function getDateAjour(){
            return $this->dateAjour;
        }
       
      
        public function setRayon($rayons){
            $this->rayons=$rayons;
        }
        public function addRayon(Rayon $rayon){
            $taille=sizeof($this->getRayon());
            $this->rayons[$taille]=$rayon;
        }

        
        /** @name getRayon renvoie tous les rayons
         * @return array
         */
        public function getRayon(){
            return $this->rayons;
        }
        
    }