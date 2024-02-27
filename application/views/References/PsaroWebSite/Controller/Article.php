<?php 
    namespace Model;

use DateTime;

    class Article{
        /** 
         * @var int
         */
        private int $idArticle;
        private string $designation;
        private int $quantiteEnVente;
        private string $unites;
        private float $prix;
        private string $devise;
        private DateTime $dateAjout;

        private string $categorie;
        private string $imageArticle;

        public function __construct($idArticle,$designation,$quantiteEnVente,$unites,$prix,$devise,$dateAjout,$categorie,$imageArticle){
            $this->idArticle=$idArticle;
            $this->designation=$designation;
            $this->quantiteEnVente=$quantiteEnVente;
            $this->unites=$unites;
            $this->devise=$devise;
            $this->prix=$prix;
            $this->dateAjout=$dateAjout;
            $this->categorie=$categorie;
            $this->imageArticle=$imageArticle;
        }

        public function getIdArticle(){
            return $this->idArticle;
        }
        public function getDesignation(){
            return $this->designation;
        }
        public function getQuantiteEnVente(){
            return $this->getQuantiteEnVente();
        }
        public function getUnites(){
            return $this->unites;
        }
        public function getPrix(){
            return $this->prix;
        }

        public function getDateAjout(){
            return $this->dateAjout;
        }
        public function getImageArticle(){
            return $this->imageArticle;
        }


        public function getCategorie(){
            return $this->categorie;
        }








    }