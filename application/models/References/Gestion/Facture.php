<?php 


    class Facture extends CI_Model{
        public $idFacture;
        public  $date;
        public $prixTotal;
        public $reduction;
        public $prixNet;
        public $devise;
        public $adresseFacturation;
       
        /** UNE FACTURE EST CONSTITUEE D'UNE OU PLUSIEURS LIGNES FACTURES
         * @var array
         */
        private  $ligneFactures;
      
        

        

        public function __construct(){
           parent::__construct();
           $this->load->model('Entity/Gestion/LigneFacture');
         
        }

        public function getIdFacture(){
            return $this->idFacture;
        }
        public function getDate(){
            return $this->date;
        }
        public function getPrixTotal(){
            return $this->prixTotal;
        }
        public function getReduction(){
            return $this->reduction;
        }
        public function getPrixNet(){
            return $this->prixNet;
        }
        public function getDevise(){
            return $this->devise;
        }
        function getAdresseFacturation(){return $this->adresseFacturation;}
        function setAdresseFacturation($adresse){$this->adresseFacturation=$adresse;}
        /**
         * RENVOIE LES LIGNES DE FACTURE POUR UNE FACTURE PRECISE
         * @return array
         */ 
        public function getFacture(){
            $this->ligneFactures=$this->LigneFacture->getLignesByFacture($this->idFacture);
            return $this->ligneFactures;
        }
      
        
        public function setIdFacture($id){
            $this->idFacture=$id;
        }
        public function setDate($date){
            $this->date=$date;
        }
        public function setPrixTotal($prixTotal){
            $this->prixTotal=$prixTotal;
        }
        public function setReduction($reduction){
            $this->reduction=$reduction;
        }
        public function setPrixNet($prixNet){
            $this->prixNet=$prixNet;
        }
        public function setDevise($devise){
            $this->devise=$devise;
        }
        public function setLigneFactures($ligneFactures){
            $this->ligneFactures=$ligneFactures;
        }
      
        public function addLigneFacture(LigneFacture $ligneFacture){
            $taille=sizeof($this->getFacture());
            $this->ligneFactures[$taille]=$ligneFacture;
        }

        public function getLastIDFacture(){
            $result= $this->db->select_max('idFacture')->from('Facture')->limit(1)->get(); //ON RECUPERE LA CLE D'UNE NOUVELLE FACTURE CREEE POUR L'ASSOCIE AUX LIGNES FACTURES
                            
            foreach ($result->result() as $row)
            {
                $idFacture=(int) $row->idFacture;
            }
            return $idFacture;
        }

        /**
         * @param Facture $facture
         * @return  bool
         */
        public function addFacture(Facture $facture){
            
           if($this->db->set($facture)->insert(__CLASS__)){
                return true;
           }else{
                return false;
           }
        }

        public function getInvoice($id){
              $this->db->select('*');
          $this->db->from(__CLASS__)->where(array('idFacture'=>$id));
           $this->db->join('LigneFacture', 'Facture.idFacture = LigneFacture.Facture_idFacture');
          $this->db->join('Article', 'ligneFacture.Article_idArticle = Article.idArticle');
          $this->db->join('Paiement', 'Paiement.facture_idFacture = Facture.idFacture');
          $this->db->join('Commande', 'paiement.commande_idCommande = commande.idCommande');
          $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
          $this->db->join('Utilisateur', 'Client.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
             $this->db->join('Livraison', 'Commande.Livraison_idLivraison = Livraison.idLivraison');         
          $query = $this->db->get()->custom_result_object(__CLASS__);        
          return $query;
        }

        public function getInvoices(){
               $this->db->select('*');
          $this->db->from(__CLASS__); 
          $this->db->join('Paiement', 'Paiement.facture_idFacture = Facture.idFacture');
          $this->db->join('Commande', 'paiement.commande_idCommande = commande.idCommande');
          $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
          $this->db->join('Utilisateur', 'Client.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');  
          $query = $this->db->get()->custom_result_object(__CLASS__);        
          return $query;
        }

        public function getUserInvoiceByID($id){
          $this->db->select('*');
        $this->db->from('Commande');
        $this->db->where(array('Client_idClient'=>$id));
           $this->db->join('Paiement', 'paiement.commande_idCommande = commande.idCommande');
          $this->db->join('Facture', 'paiement.facture_idFacture = Facture.idFacture');
        
          $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
        }

         function dateSold(){
    $this->db->select('date');
      $this->db->group_by('designation');
      return $this->db->get(__CLASS__)->result_object();
    }
      

    }