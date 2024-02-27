<?php 
   
    interface IClient{
        public function consulterPaiement($id);
        public function getPaiments();
        public function getPaiment($id);
        public function getCommandes();
        public function infosCommande($id);
        public function passerCommande($commande);
        public function annulerCommande($id);
        public function setProfil($compte);
        public function getProfil($id);
        public function getArticles();
        public function getArticle($id);
        public function getPanier();
        public function ajouterArticlePanier($article,$quantite);
        public function modifierArticlePanier($article,$quantite);
        public function supprimerArticlePanier($article);
        public function viderPanier();
        public function validerPanier();
        public function getFactures();
        public function getFacture($id);
        public function getLivraisons();
        public function getLivraison($id);
        public function getAdresses();
        public function getAdresse($id);
        public function ajouterAdresse($adresse);
        public function modifierAdresse($adresse);

    }