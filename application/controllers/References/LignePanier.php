<?php 
   
    class LignePanier extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Panier');
            if(isset($_GET['delete'])){
                $this->delete();
            }

        }
       public $json= array('error'=> true);

        public function addPanier(){
         
          
            if(isset($_GET['id'])){
                $this->load->model('ArticleModel');
                $product=$this->ArticleModel->getArticleByID($_GET['id']);
                if(empty($product)){
                    $this->json['message']="ce produit n'existe pas";
                }
               
                $this->Panier->add($product[0]->idArticle);
                $this->json['error']=false;
                $this->json['message']="Le produit a ete bien ajouté dans votre panier"; 
                $this->json['total'] =number_format($this->Panier->total(),2,',',' ');
                $this->json['count'] =$this->Panier->count();            
            }else{
                $this->json['message']="Vous n'avez pas choisi un produit à ajouter dans votre panier";  
            }
            echo json_encode( $this->json);
        }
        public function panier(){
            $this->load->view('PsaroWebSite/panier');
        }

        public function delete($id){
            if(isset($id)){
                $this->Panier->deletePost($id);
                $json['error']=false;
                $json['message']="Le produit a ete bien retiré du panier";
                $json['total'] =number_format($this->Panier->total(),2,',',' ');
                $json['count'] =$this->Panier->count();
                header('Content-Type: application/json');
                
                echo json_encode($json);
            }
        }

        public function deletePanier(){
            $this->Panier->deletePost($_GET['id']);
            
         }

         public function update(){  
           
            $this->Panier->recalculer();
            $this->Panier();
             
          /* $json['error']=false;
            $json['message']="Le produit a ete bien mis à jour du panier";
            $json['total'] =number_format($this->Panier->total(),2,',',' ');
            $json['count'] =$this->Panier->count();
            header('Content-Type: application/json');
            
            echo json_encode($json);*/
            $this->panier();
         }

         public function chechout(){
            $this->load->view('PsaroWebSite/checkout');
         }

         public function success(){
            $this->load->view('PsaroWebSite/success');
         }
    }
  