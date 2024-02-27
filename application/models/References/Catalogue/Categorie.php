<?php 
  
    class Categorie extends CI_Model{
        public $idCategorie;
       
        public $designation;

        public $Rayon_idRayon;
        public  $dateMiseAjour;
     
        private $produits;

        private $description;
        public function __construct(){
           parent::__construct();
           
        }
        public function getDesignation(){
            return $this->designation;
        }
        public function getIdCategorie(){
            return $this->idCategorie;
        }
        public function getDateMiseAjour(){
            return $this->dateMiseAjour;
        }

        public function getProduits(){
            return $this->produits;
        }
        public function setDesignation($designation){
            $this->designation=$designation;
        }
        public function setIdCategorie($idCategorie){
            $this->idCategorie=$idCategorie;
        }

        public function setDateMiseAjour($dateMiseAjour){
            $this->dateMiseAjour=$dateMiseAjour;
        }

        function getRayonId(){return $this->Rayon_idRayon;}
        function setRayonId($id){$this->Rayon_idRayon=$id;}

        public function getDescription($id){
            return $this->db->select('descriptionArticle')->from('descriptif')->where(array("Article_idArticle"=>$id))->get()->result_object();
        }

        public function setProduits($produits){
            $this->produits=$produits;
        }

        public function addProduit($produit){
            $this->produits[]=$produit;
        }

       public function getCategories(){
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
       }

       public function addCategorie(Categorie $categorie){
             return $this->db->set($categorie)->insert(__CLASS__);
       }
    }