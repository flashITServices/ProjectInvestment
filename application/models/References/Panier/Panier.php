<?php 
    namespace models\Entity\panier;
    use  models\Entity\Utilisateur\Compte;
    class Panier{
        private int $id;

         /** attribut associé au compte, car un panier est associé à un compte utilisateur, qui à son tour appartient à un client
         * @var Panier
         */
        private Compte $compte;

        /** notre table lignePanier, contiendra un ensemble des lignes d'un panier pour former notre panier
         * la relation entre panier et ligne panier est la composition, un panier est composé des lignes
        * @var array
        */
        private array $lignePanier;
        public function __construct($id,$compte,$lignePanier){
            $this->id=$id;
            $this->compte=$compte;
            $this->lignePanier=$lignePanier;
        }
        public function getId(){
            return $this->id;
        }
        public function getCompte(){
            return $this->compte;
        }
        public function getLignePanier(){
            return $this->lignePanier;
        }
        public function setId(int $id){
            $this->id=$id;
        }
        public function setCompte(Compte $compte){
            $this->compte=$compte;
        }
        public function setLignePanier(array $lignePanier){
            $this->lignePanier=$lignePanier;
        }
        public function addLignePanier(LignePanier $lignePanier){
            $this->lignePanier[]=$lignePanier;
        }

        
    }