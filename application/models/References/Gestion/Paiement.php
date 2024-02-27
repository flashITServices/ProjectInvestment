<?php 
   

    class Paiement extends CI_Model{
        public $idPaiement;
        public $date;
        public  $numeroTransaction;
        public  $numTelephone;
        public  $montantTransaction;
       
          /** un paiement est specifique pour une Facture X donnée
         * @var int
         */
        public $Facture_idFacture;

        /** un paiement est associé à une commande
         * @var int
         */
        public $Commande_idCommande;
        public  $description;
        public $typePaiement;

        public  $statut;
      
        public $devise;
    
     
         

        public function __construct(){
           parent::__construct();
        }

        public function getIdPaiment(){
            return $this->idPaiement;
        }
        public function getDate(){
            return $this->date;
        }
        public function getNumeroTransaction(){
            return $this->numeroTransaction;
        }
        public function getNumTelephone(){
            return $this->numTelephone;
        }
        public function getMontantTransaction(){
            return $this->montantTransaction;
        }
        public function getDevise(){
            return $this->devise;
        }
        public function getTypePaiement(){
            return $this->typePaiement;
        }
        public function getStatut(){
            return $this->statut;
        }
        public function getFacture(){
            return $this->facture;
        }
        public function getCommande(){
            return $this->commande;
        }
        public function getDescription(){
            return $this->description;
        }
        public function setId($id){
            $this->idPaiement=$id;
        }
        public function setDate($date){
            $this->date=$date;
        }
        public function setNumeroTransaction($numeroTransaction){
            $this->numeroTransaction=$numeroTransaction;
        }
        public function setNumTelephone($numTelephone){
            $this->numTelephone=$numTelephone;
        }
        public function setMontantTransaction($montantTransaction){
            $this->montantTransaction=$montantTransaction;
        }
        public function setDevise($devise){
            $this->devise=$devise;
        }
        public function setTypePaiement($typePaiement){
            $this->typePaiement=$typePaiement;
        }
        public function setStatut($statut){
            $this->statut=$statut;
        }
        public function setFacture($facture){
            $this->Facture_idFacture=$facture;
        }
        public function setCommande($commande){
            $this->Commande_idCommande=$commande;
        }
        public function setDescription($description){
            $this->description=$description;
        }


        public function addPaiement(Paiement $paiement){
            return $this->db->set($paiement)->insert(__CLASS__);
        }

        public function getPaiements(){
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        public function updatePaiement($id,$paiement){
            return $this->db->where(array("idPaiement"=>$id))->insert($paiement);
        }

        function getPaiement($id){
            $this->db->select('*')->from('Commande')->where("Client_idClient",$id);
               $this->db->join(__CLASS__, 'paiement.commande_idCommande = commande.idCommande');

           return $this->db->get()->custom_result_object(__CLASS__);
        }
        
        


    }