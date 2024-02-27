<?php 
    class StatistiqueController extends CI_Controller{
        public function __construct(){
            parent::__construct();
              $this->load->model('Entity/Utilisateur/ServiceClient');
              $this->load->model('Entity/Utilisateur/ServiceLivraison');
              $this->load->model('Entity/Utilisateur/ServiceMaintenance');
                $this->load->model('Entity/Catalogue/Article');
                  $this->load->model('Entity/Catalogue/Rayon');
                      $this->load->model('Entity/Gestion/LigneFacture');
        }

        public function getDeleveryState(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
             $data['etat']= ["Mange","citron","banane","litchi","orange","ananas","canne a sucre","fraise"];
            $data['donnee']= [70,45,67,26,90,57,120,89];
            $this->load->view('AdminPanel/StatistiquesLivraison',$data);
        }

        function getPaymentState(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
            $idRayon=(int) $this->Rayon-> getMaxID()[0]->idRayon;
             
          
            for ($id=1;$id<$idRayon;$id++){
                if($this->Article->getPostByRayon($id)){
                      $posts[] =$this->Article->getPostByRayon($id);
                       if(sizeof($this->Rayon->getRayonById($id)) !==0){
                    $rayons[]=$this->Rayon->getRayonById($id)[0]->designations;
                 }
                 
                }
               
                
            }

           //var_dump($this->Article->getQuantitySold());
           $postes=$this->LigneFacture->totalSales();
           foreach($postes as $des){
                $designation[]=$des->designation;
                $quantity[]=$this->LigneFacture->getQuantitySold($des->designation)[0]->quantite;
                $prices[]=number_format($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne,2,'.','');
                  $CAMV[]=$this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne-($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne*0.2);
                 $ProfitNet[]=($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne*0.2);
           }
          
            //var_dump($prices);
            //die();
          
            
              $somme=$this->ServiceClient->getSum();
        
            $moyenne=$this->ServiceClient->getAvg();
             
           $minimale=$this->ServiceClient->getMin();
             $maximale=$this->ServiceClient->getMax();
             $data['donnees']= [$moyenne,$somme,$maximale,$minimale];
           
                $data['etat']= ["Moyenne","Somme","Maximale","Minimale"];
                $data['quantites']=$posts;
                $data['etageres']=$rayons;
                $data['designations']=$designation;
                $data['quantity']=$quantity;
                 $data['prices']=$prices;
                 $data['CAMV']=$CAMV;
                $data['ProfitNet']=$ProfitNet;
             
            $this->load->view('AdminPanel/StatistiquesPaiement',$data);
        }

         public function getOrderState(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
            $commandes=$this->ServiceClient->getOrderByDate();
            
           foreach($commandes as $order){
                $labels[]=array($order->nom,$order->date);
                $sommes[]=$order->montant;
                $ventes[]=$order->montant;
                 $charges[]=$order->montant-($order->montant*0.2);
                 $benefices[]=($order->montant*0.2);
                $date[]=$order->date;
                  
           }
          
          
          
            $resultat=[$this->ServiceClient->count(),$this->ServiceClient->countOrderDelivered(),$this->ServiceClient->countOrderNotDelivered()];
            
            $data['etat']= ["Commandes Totale","Commandes Livraison Autorisé","Commanddes Livraison Non Autorisé"];
             $data['analyse']=$resultat;   
             $data['labels']=$labels;
             $data['sommes']=$sommes;  
                 $data['date']=$date;  
                 $data['ventes']=$ventes;
                 $data['charges']=$charges;
                    $data['benefices']=$benefices;
            $this->load->view('AdminPanel/StatistiquesCommandes',$data);
        }


        function getMaintenanceState(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
            $idRayon=(int) $this->Rayon-> getMaxID()[0]->idRayon;
             
          
            for ($id=1;$id<$idRayon;$id++){
                if($this->Article->getPostByRayon($id)){
                      $posts[] =$this->Article->getPostByRayon($id);
                       if(sizeof($this->Rayon->getRayonById($id)) !==0){
                    $rayons[]=$this->Rayon->getRayonById($id)[0]->designations;
                 }
                 
                }
               
                
            }

           //var_dump($this->Article->getQuantitySold());
           $postes=$this->LigneFacture->totalSales();
           foreach($postes as $des){
                $designation[]=$des->designation;
                $quantity[]=$this->LigneFacture->getQuantitySold($des->designation)[0]->quantite;
                $prices[]=number_format($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne,2,'.','');
                  $CAMV[]=$this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne-($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne*0.2);
                 $ProfitNet[]=($this->LigneFacture->getPriceSold($des->designation)[0]->prixTotalLigne*0.2);
           }
          
            //var_dump($prices);
            //die();
          
            
              $somme=$this->ServiceClient->getSum();
        
            $moyenne=$this->ServiceClient->getAvg();
             
           $minimale=$this->ServiceClient->getMin();
             $maximale=$this->ServiceClient->getMax();
             $data['donnees']= [$moyenne,$somme,$maximale,$minimale];
           
                $data['etat']= ["Moyenne","Somme","Maximale","Minimale"];
                $data['quantites']=$posts;
                $data['etageres']=$rayons;
                $data['designations']=$designation;
                $data['quantity']=$quantity;
                 $data['prices']=$prices;
                 $data['CAMV']=$CAMV;
                $data['ProfitNet']=$ProfitNet;
             
            $this->load->view('AdminPanel/StatistiquesMainteance',$data);
        }

    }