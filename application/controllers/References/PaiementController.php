<?php 
    class PaiementController extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Entity/Catalogue/Article');
            $this->load->model('Entity/Gestion/Facture');
            $this->load->model('Entity/Gestion/LigneFacture');
              $this->load->model('Entity/Utilisateur/Utilisateur');
             $this->load->model('Entity/Utilisateur/Client');
            $this->load->model('Entity/Gestion/Paiement');     

        }

         /** 
         * Affichage des factures specifiques pour le client
         */
        public function getFacture(){
            if(!isset($_SESSION['username']))redirect();
               $factures=$this->Facture->getInvoices();
              
            $data['factures']=$factures;
            $this->load->view('AdminPanel/listesFactures',$data);
        }

        /** 
         * Affichage des factures specifiques à tous les clients
         */
        public function getPaiementClient($id){
            if(!isset($_SESSION['username']))redirect();
             //$client=$this->Client->getClientByUserID($id);
           
           //$factures=$this->Facture->getUserInvoiceByID($client[0]->getIdClient());
          // $data['facturesClient']=$factures;
            $this->load->view('AdminPanel/EtatFinanciers');
        }

        function getCustomerPayment($id){
              if(!isset($_SESSION['username']))redirect();
                  $client=$this->Client->getClientByUserID($id);
                 
               $data['CustomerPayment']=$this->Paiement->getPaiement($client[0]->getIdClient());
                  $this->load->view('AdminPanel/MesPaiment',$data);
        }

        public function addFacture(){
            if(!isset($_SESSION['username']))redirect();
            $article= $this->Article->getArticles();
            $data['article']=$article;
            $this->load->view('AdminPanel/newFacture',$data);
        }

        public function view($id){
            if(!isset($_SESSION['username']))redirect();
            $factures=$this->Facture->getInvoice($id);
            $data['factures']=$factures;
            $this->load->view('AdminPanel/detailsFacture',$data);
        }

        public function getPricePostID($id){
            $price= $this->Article->getPrice($id);
            $price=$price[0]->prix;
            echo $price;
        }

        public function export(){
            
        }
    }