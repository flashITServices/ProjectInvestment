<?php 
    require_once('Service.php');
    class ServiceLivraison extends Service{
        public function gererLivraison(){
            
        }

        public function getLivreur($id){

        }

        public function getLivraisonByLivreur($id){}
      
        public function getLivraisonByCommande($id){}
      
        public function getLivraisonByDate($date){}
    
        public function getLivraisonByDateAndLivreur($date,$id){}
        public function getLivraisonByDateAndCommande($date,$id){}
    
        public function getLivraisonByDateAndAgentAndLivreur($date,$idAgent,$idLivreur){}
        public function getLivraisonByDateAndAgentAndCommande($date,$idAgent,$idCommande){}
    
        
    }