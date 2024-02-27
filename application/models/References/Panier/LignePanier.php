<?php 
    namespace models\Entity\Panier;

use  models\Entity\Catalogue\Article;

    class LignePanier{
        private int $id;
        private int $quantite;
        private Article $article;
        private float $prixTotalLigne ;
        public function __construct($id,$quantite,$article){
            $this->id=$id;
            $this->quantite=$quantite;
            $this->article=$article;
            $this->prixTotalLigne=$this->quantite*$this->article->getPrix();
        }
        public function getId(){
            return $this->id;
        }

        public function getQuantite(){
            return $this->quantite;
        }
        public function getArticle(){
            return $this->article;
        }
        public function getPrixTotalLigne(){
            return $this->prixTotalLigne;
        }
        public function setId(int $id){
            $this->id=$id;
        }
        public function setQuantite(int $quantite){
            $this->quantite=$quantite;
        }
        public function setArticle(Article $article){
            $this->article=$article;
        }
        public function setPrixTotalLigne(float $prixTotalLigne){
            $this->prixTotalLigne=$prixTotalLigne;
        }
        

    }