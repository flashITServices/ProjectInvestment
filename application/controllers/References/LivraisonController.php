<?php 
    class LivraisonController extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Entity/Utilisateur/ServiceLivraison');
              $this->load->model('Entity/Utilisateur/Agent');
               $this->load->model('Entity/Gestion/Commande');
            $this->load->model('Entity/Gestion/Facture');
            $this->load->model('Entity/Gestion/LigneFacture');
            $this->load->model('Entity/Gestion/Adresse');
            $this->load->model('Entity/Gestion/Livraison');
            $this->load->model('Entity/Gestion/Paiement');

        }

        public function getLivreurs(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
           
            $data['livreurs']=$this->Agent->getAgentByCodeService("service@psarolivraison","Livreur");
            $this->load->view('AdminPanel/livreurs',$data);
        }

      function getMeteo(){
          if(!isset($_SESSION['username'])){
                redirect();
            }
          $this->load->view('AdminPanel/Meteo');
       
      }

      function getDelevery(){
          if(!isset($_SESSION['username'])){
                redirect();
            }
            $data['livraisons']=$this->Commande->getDeliveryByOrder();
               $this->load->view('AdminPanel/LivraisonsClient',$data);
      }

       public function associer($id){
            $matricule=$this->input->post('matricule');
           $livraison= $this->Livraison->getDeleryById($id)[0];
           $livraison->setMatriculeLivreur($matricule);
           if($this->Livraison->updateDelivery($id,$livraison)){
                 echo json_encode(array("statut"=>true));
           }else{
                 echo json_encode(array("statut"=>false));
           }
          
           
        }
       
       
      
        public function getDeliveryByDeliver($id){
            $this->ServiceLivraison->getLivraisonByLivreur($id);
        }

        public function getDeliverByOrder($id){
            $this->ServiceLivraison->getLivraisonByCommande($id);
        }

       public function getDeliverByDate($date){
            $this->ServiceLivraison-> getLivraisonByDate($date);
        }

        public function getDeliverByDateAndDeliver($date,$id){
            $this->ServiceLivraison-> getLivraisonByDateAndLivreur($date,$id);
        }

        public function getDeliverByDateAndOrder($date,$id){
            $this->ServiceLivraison-> getLivraisonByDateAndCommande($date,$id);
        }

        public function getDeliverByDateAndOrderAndDeliver($date,$idDeliver,$idOrder){
            $this->ServiceLivraison-> getLivraisonByDateAndAgentAndCommande($date,$idDeliver,$idOrder);
        }

    }