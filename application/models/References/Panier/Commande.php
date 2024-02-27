<?php 
    namespace  models\Entity\Gestion;
   

    class Commande{


          /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
        private $idCommande;

         
        private $date;

          /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var string
         */
        private $modePaiement;

         /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var float
         */
         private  $montant;

       /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var string
       */
         private  $devise;

      /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var string
       */
      private  $statutLivraison;

        /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var bool
       */
     private $Autorisation;

      /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
     private  $Compte_idCompte ;

      /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
      private  $Livraison_idLivraison ;

        /* attribut associé au panier, car une commande est passé en fonction du panier
         * @var array
         
        private $panier;*/
           
       
      public function __construct(){
        
      } 
       
        

      
       public function getIdCommande(){return $this->idCommande;}
       function getDate(){return $this->date;}
       public function getModePaiement(){return $this->modePaiement;}
       //function getPanier(){return $this->panier;}
       function getLivraison(){return $this->Livraison_idLivraison;}
       function getCompte(){return $this->Compte_idCompte;}
       function getMontant(){return $this->montant;}
       function getDevise(){return $this->devise;}
       function getStatutLivraison(){return $this->statutLivraison;}
       function  getAutorisation(){return $this->Autorisation;}

       function setAutorisation($autorisation=false){$this->Autorisation=$autorisation;}
       function setStatutLivraison($statut){$this->statutLivraison=$statut;}
       function setMontant($montant){$this->montant=$montant;}
       function setDevise($devise){$this->devise=$devise;}
       function setDate($date){$this->date=$date;}
       function setModePaiement($modePaiement){$this->modePaiement=$modePaiement;}
       function setCompte($idCompte){$this->Compte_idCompte=$idCompte;}
       function setLivraison($idLivraison){$this->Livraison_idLivraison=$idLivraison;}
       function setIdCommande($id){$this->idCommande=$id;}

    }