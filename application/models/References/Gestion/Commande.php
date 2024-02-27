<?php   
    class Commande extends CI_Model{
      
      public function __construct(){
         parent::__construct();
     }

        /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
        public $idCommande;

         
        public $date;

          /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var string
         */
        public $modePaiement;

         /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var float
         */
         public  $montant;

       /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var string
       */
         public  $devise;

      /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var string
       */
      public  $statutLivraison;

        /** attribut associé au panier, car une commande est passé en fonction du panier
       * @var bool
       */
     public $Autorisation;

      /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
     public  $Client_idClient ;

      /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var int
         */
      public  $Livraison_idLivraison ;

        /** attribut associé au panier, car une commande est passé en fonction du panier
         * @var array
         */
        private $panier;
           
      
       public function getIdCommande(){return $this->idCommande;}
       function getDate(){return $this->date;}
       public function getModePaiement(){return $this->modePaiement;}
       function getPanier(){return $this->panier;}
       function getLivraison(){return $this->Livraison_idLivraison;}
       function getClient(){return $this->Client_idClient;}
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
       function setClient($idClient){$this->Client_idClient=$idClient;}
       function setLivraison($idLivraison){$this->Livraison_idLivraison=$idLivraison;}
       function setIdCommande($id){$this->idCommande=$id;}


       function getLastIdOrder(){
            
         $result= $this->db->select_max('idCommande')->from(__CLASS__)->limit(1)->get(); //ON RECUPERE LA CLE D'UNE NOUVELLE FACTURE CREEE POUR L'ASSOCIE AUX LIGNES FACTURES
             
         foreach ($result->result() as $row)
         {
             $idCommande=(int) $row->idCommande;
         }
         return $idCommande;
     }


      /** 
       * @param mixed $order la fonction qui insere une commande dans la base de donnees
       * @return bool
       */
      public function insertCommande(Commande $order){
          return $this->db->set($order)->insert(__CLASS__);
      }


      /** la fonction qui renvoi un table d'objets de type Commande
       * @return array
       */
      public function getCommandes(){
         return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
      }

      /** 
       * @param int $id la fonction qui renvoi un table avec un seul Objet de type Commande
       * @return array
       */
      public function getCommandeByID($id){
        return $this->db->where(array('idCommande'=>$id))->get(__CLASS__)->custom_result_object (__CLASS__);
      }



       /** 
       * @param int $id la fonction qui renvoie les commandes appartenant à un client
       * @return array
       */
      public function getCommandeByClientID($id){
        $this->db->select('*');
        $this->db->from(__CLASS__);
        $this->db->where(array('commande.Client_idClient'=>$id));
         
          $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
      }


        public function getLastOrderByClientID($idClient,$idCommande){
        $this->db->select('*');
        $this->db->from(__CLASS__);
        $this->db->where(array('Client_idClient'=>$idClient,'idCommande'=>$idCommande));
         $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
          $this->db->join('Utilisateur', 'Utilisateur.idUtilisateur = Client.Utilisateur_idUtilisateur');
        
           $this->db->join('Paiement', 'paiement.commande_idCommande = commande.idCommande');
          $this->db->join('Facture', 'paiement.facture_idFacture = Facture.idFacture');
          $this->db->join('ligneFacture', 'ligneFacture.Facture_idFacture = Facture.idFacture');
            $this->db->join('Article', 'ligneFacture.Article_idArticle = Article.idArticle');
          $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
      }


      public function AutoriserLivraison($id){
         $commande=$this->getCommandeByID($id);
         $order=$commande[0];
         $order->setAutorisation(true);
         $order->setStatutLivraison("Commande Autorisée pour la livraison");
         
         return $this->db->set($order)->where(array('idCommande'=>$order->getIdCommande()))->update(__CLASS__);
      }

        public function getOrdersCustomers(){ 
          $this->db->select('*');

          $this->db->from(__CLASS__);
          $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
          $query = $this->db->get()->custom_result_object(__CLASS__);
          return $query;
       }

       public function getOrderById($id){
     
          $this->db->select('*');
     
          $this->db->from(__CLASS__);
             $this->db->where(array('idCommande'=>$id));
          $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
          $this->db->join('Utilisateur', 'Utilisateur.idUtilisateur = Client.Utilisateur_idUtilisateur');
          $this->db->join('Livraison', 'Commande.Livraison_idLivraison = Livraison.idLivraison');
         $this->db->join('Paiement', 'paiement.commande_idCommande = commande.idCommande');

          $this->db->join('Facture', 'paiement.facture_idFacture = Facture.idFacture');
            $this->db->join('LigneFacture', 'Facture.idFacture = LigneFacture.Facture_idFacture');
             
            $this->db->join('Article', 'Article.idArticle = ligneFacture.Article_idArticle');
         
          $query = $this->db->get()->custom_result_object(__CLASS__);
         
          
          return $query;
       }


        function getDeliveryByOrder(){
            
          $this->db->select('*');
     
          $this->db->from(__CLASS__);
             $this->db->where(array('Autorisation'=>true));
               $this->db->join('Paiement', 'paiement.commande_idCommande = commande.idCommande');
             $this->db->join('Livraison', 'Commande.Livraison_idLivraison = Livraison.idLivraison');
            $this->db->join('Client', 'Livraison.Client_idClient = Client.idClient');
          $this->db->join('Utilisateur', 'Utilisateur.idUtilisateur = Client.Utilisateur_idUtilisateur');
      
       

          $this->db->join('Facture', 'paiement.facture_idFacture = Facture.idFacture');
            //$this->db->join('LigneFacture', 'Facture.idFacture = LigneFacture.Facture_idFacture');
             
            //$this->db->join('Article', 'Article.idArticle = ligneFacture.Article_idArticle');
         
          $query = $this->db->get()->custom_result_object(__CLASS__);
       
          
          return $query;
        }

          function countOrdersByIDClient($id){
            return $this->db->where(array('Client_idClient'=>$id))->count_all_results(__CLASS__);
        }
    }