<?php 
   
    class Livraison extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        public $idLivraison;
        public $delais;
        public $date;
        public $quantiteArticle;
        public $fraisLivraison;
        public $devise;
        public $adresseLivraison;
        public $statutLivraison;
        public $Service_codeService;
        public $Client_idClient;
        public $matriculeLivreur;

        function setDelais($delais){ $this->delais=$delais;}
        function  setDate($date) {$this->date=$date;}
        function setFraisLivraison($frais) {$this->fraisLivraison=$frais;}
        function setMatriculeLivreur($matricule) {$this->matriculeLivreur=$matricule;}
        function setStatutLivraison($statut) {$this->statutLivraison=$statut;}
        function getIdLivraison(){return $this->idLivraison;}
        function  getDelais() {return $this->delais;}
        function getDate() {return $this->date;}
        function getQuantiteArticle() {return $this->quantiteArticle;}
        function getFraisLivraison() {return $this->fraisLivraison;}
        function setDevise($devise){$this->devise=$devise;}
        function setQuantiteArcle($quantite){
            $this->quantiteArticle=$quantite;
        }
        function setService_codeService($service){$this->Service_codeService=$service;}
        function setClient_idClient($idClient){ $this->Client_idClient=$idClient;}
        function getDevise() {return $this->devise;}
        function getClient() {return $this->Client_idClient;}
        function getMatriculeLivreur() {return $this->matriculeLivreur;}

        function addDelivery(Livraison $livraison){
            return $this->db->set($livraison)->insert(__CLASS__);
        }

        function getAdresseLivraison(){return $this->adresseLivraison;}
        function setAdresseLivraison($adresse){$this->adresseLivraison=$adresse;}

      
        function updateDelivery($id,Livraison $livraison){
            return $this->db->where('idLivraison',$id)->update(__CLASS__,$livraison);
        }

        function getLastIdDelivery(){
            
            $result= $this->db->select_max('idLivraison')->from(__CLASS__)->limit(1)->get(); //ON RECUPERE LA CLE D'UNE NOUVELLE FACTURE CREEE POUR L'ASSOCIE AUX LIGNES FACTURES
                
            foreach ($result->result() as $row)
            {
                $idLivraison=(int) $row->idLivraison;
            }
            return $idLivraison;
        }

        function getDeliveries(){
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }

        function deleteDelivery($id){
           return  $this->db->where('idLivraison', $id)->delete(__CLASS__);
          
        }
        public function getDeleryById($id){
            return $this->db->where(array('idLivraison'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }

        

       

    }