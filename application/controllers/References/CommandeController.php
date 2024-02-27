<?php



    class CommandeController extends CI_Controller{
     
        public function __construct(){
            parent::__construct();
            $this->load->model('Entity/Gestion/Commande');
            $this->load->model('Entity/Gestion/Facture');
            $this->load->model('Entity/Gestion/LigneFacture');
            $this->load->model('Entity/Gestion/Adresse');
            $this->load->model('Entity/Gestion/Livraison');
            $this->load->model('Entity/Gestion/Paiement');
            $this->load->model('Entity/Utilisateur/Compte');
            $this->load->model('Entity/Utilisateur/Utilisateur');
             $this->load->model('Entity/Utilisateur/Client');
            $this->load->model('Entity/Catalogue/Article');
            $this->load->model('Entity/Utilisateur/Agent');
        }

        public function getOrder(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
            $data['Commande']=$this->Commande->getOrdersCustomers();

            $this->load->view("AdminPanel/listesCommande",$data);
        }

        public function  getOrderCustomer($id){
            if(!isset($_SESSION['username'])){
                redirect();
            }
          
            $client=$this->Client->getClientByUserID($id);
          
            $data['commandeClient']=$this->Commande->getCommandeByClientID($client[0]->getIdClient());
            
            $this->load->view("AdminPanel/listesCommandeClients",$data);
        }

          public function  getPayment($id){
            if(!isset($_SESSION['username'])){
                redirect();
            }
              $client=$this->Client->getClientByUserID($id);
               $data['paiementClient']=$this->Paiement->getPaymentByClientID($client[0]->getIdClient());
            $this->load->view("AdminPanel/listesPaiements",$data);
        }

          public function  getCustomer(){
            if(!isset($_SESSION['username'])){
                redirect();
  
            }
            $clients=$this->Client->getClients();
                
            foreach($clients as $customer){
                $nombreAchat[]=  $this->Commande->countOrdersByIDClient($customer->getIdClient());
            }
            
            $data['clients']=$clients;
            $data['commandesClient']=$nombreAchat;
          
            $this->load->view("AdminPanel/listesClients",$data);
        }

       

        public function view($id){

            if(!isset($_SESSION['username']))redirect();
            $data['details']=$this->Commande->getOrderById($id);
              $data['livreurs']=$this->Agent->getAgentByCodeService("service@psarolivraison","Livreur");
            $this->load->view('AdminPanel/detailsCommande',$data);
        }

        public function autoriser($id){
               if(!isset($_SESSION['username']))redirect();
               if($this->Commande->AutoriserLivraison($id)){
                    $this->session->set_flashdata('commande', 'Votre commande a été autorisée avec succès');
                    echo json_encode(array("statut"=>true));
               }else{
                     $this->session->set_flashdata('commande', ' Echec Autorisation commande');
                    echo json_encode(array("statut"=>false));
               }
        }

        

        public function commander(){
            $this->form_validation->set_rules('first-name','"Firstname"','trim|required|min_length[4]|max_length[52]|encode_php_tags');
            $this->form_validation->set_rules('last-name','"Lastname"','trim|required|min_length[4]|max_length[52]|encode_php_tags');
            $this->form_validation->set_rules('email','"Email"','trim|required|min_length[5]|max_length[52]|encode_php_tags|valid_email');
            
            $this->form_validation->set_rules('phone','"Phone"','trim|required|min_length[5]|max_length[52]');
            $this->form_validation->set_rules('address','"Address"','trim|required|min_length[5]|max_length[200]|encode_php_tags');
            $this->form_validation->set_rules('city','"City"','trim|required|min_length[4]|max_length[52]|encode_php_tags');
            $this->form_validation->set_rules('country','"Country"','trim|required|min_length[3]|max_length[200]|encode_php_tags');
            
            
           
           

            if($this->form_validation->run()){
                try{
                       $keys=[];
                       $productTab=[];
                        if(isset($_SESSION['panier'])){
                            $keys=array_keys($_SESSION['panier']);
                        }
                    
                        if(!empty($keys)){
                            $products= $this->db->select('*')->from('Article')->where_in('idArticle',$keys)->get()->result();
                           
                        }


                        if(empty($products)){
                            throw new Exception("Impossible de passer une commande car votre panier est vide,". "\n"."veullez remplir votre panier pour commander");
                        }


                    
                        $prixTotal=0;
                        $subTotal=0;
                        $count=0;
                        $lignesFacure=[];
                        $devise='CDF';
            
                        //Boucle pour calculer le total Facture
                        if(!empty($products)) foreach($products as $product){               
                            $devise= $product->devise;
                            $subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
                            $prixTotal+=$subTotal;                                
                        }
                        
                        $address=$this->input->post('address');
                        $state=$this->input->post('state');
                        $city=$this->input->post('city');
                        $country=$this->input->post('country');
                        $adresseFacturation= new Adresse();
                        $adresseFacturation->setReferences($address);
                        $adresseFacturation->setProvince($state);
                        $adresseFacturation->setVille($city);
                        $adresseFacturation->setPays($country);

                        $adresseLivraison=new Adresse(); //ADRESSE LIVRAISON
                        $adresseLivraison->setReferences($address);
                        $adresseLivraison->setPays($country);
                        $adresseLivraison->setVille($city);
                        $adresseLivraison->setProvince($state);
            
                      // DEBUT DE LA TRANSACTION
                        $this->db->trans_begin();
                            $facture =new Facture();  //ON INSERT D'ABORD UNE FACTURE ET ON RECUPERE SON ID POUR L'ASSOCIE AUX LIGNES FACTURES
                            $facture->setDate(date('Y-m-d'));
                            
                            $facture->setPrixTotal($prixTotal);
                            $facture->setReduction(0);
                            $facture->setPrixNet($prixTotal-$facture->getReduction());
                            $facture->setDevise($devise);
                            $facture->setAdresseFacturation($adresseFacturation->getPays().'-'.$adresseFacturation->getProvince().'-'.$adresseFacturation->getVille().'-'.$adresseFacturation->getReferences()); //ADRESSE FACTURATION
                            if($this->Facture->addFacture($facture)){
                                $idFacture=$this->Facture->getLastIDFacture();
                              
                          
                            }                  
                    
                            //Boucle pour lier les lignes de Facture à une Facture
                            if(!empty($products)) foreach($products as $product){
                                $idArticle=$product->idArticle;
                                $designation=$product->designation;
                                $quantite= $_SESSION['panier'][$product->idArticle];
                            
                                $prixUnitaire=$product->prix;
                                $devise= $product->devise;
                                $subTotal=$_SESSION['panier'][$product->idArticle]*$product->prix;
                               
                            
                                $ligne= new LigneFacture();
                                $ligne->setDesignation($designation);
                                $ligne->setDevise($devise);
                                $ligne->setPrixTotalLigne($subTotal);
                                $ligne->setQuantite($quantite);
                                $ligne->setPrixUnitaire($prixUnitaire);
                                $ligne->setFactureIdFacture($idFacture);
                                $ligne->setArticleIdArtice($idArticle);
                                $this->LigneFacture->insertLigne($ligne);
                                     $count++; 
                                  $productTab = [$idArticle => $quantite];                
                                //$this->Facture->addLigneFacture($ligne);
                                //$lignesFacure[$count]=$ligne;                
                                                                              
                            }
        
                            $password=$this->input->post('password');//INFORMATIONS POUR UN CLIENT QUI A UN COMPTE
                            $username=$this->input->post('username');
                            $firstname=$this->input->post('first-name'); 
                            $lastname=$this->input->post('last-name');
                            $idCustomer=0;
                            $modePaiement='';
                            if(isset($username) && isset($password) && !empty($username) && !empty($password)){
                                    $user=$this->Compte->getLogin($username,sha1($password));
                                   
                                    if((sizeof($user) !== 0)){
                                          $userId=(int) $user[0]->Utilisateur_idUtilisateur;
                                            $client=$this->Utilisateur->getUserAccountById($userId);
                                
                                        $idCustomer=(int) $client[0]->idClient;
                                    }else{
                                         $this->session->set_userdata('utilisateur', 'Username/password incorrect');
                                    }
                                  
                                    // LES INFOS QUI VONT NOUS AIDER POUR L'ADRESSE DE LIVRAISON ET FACTURATION
                                
                                    $email=$this->input->post('email');
                                    $address=$this->input->post('address');
                                    $state=$this->input->post('state');
                                    $city=$this->input->post('city');
                                    $country=$this->input->post('country');
                                    $tel=$this->input->post('phone');
                            
                                    $state=$this->input->post('state');
                                }else{   //INFORMATIONS POUR UN INTERNAUTE, QUI DOIT CREER UN COMPTE LORS DE LA COMMANDE
                                    $email=$this->input->post('emailA');
                                    $address=$this->input->post('addressA');
                                    $city=$this->input->post('cityA');
                                    $country=$this->input->post('countryA');
                                    $state=$this->input->post('stateA');
                                    $tel=$this->input->post('telephone');
                                    $gender=$this->input->post('genderA');
                                    $job=$this->input->post('job');
                                    $birthday=$this->input->post('birthday');
                                    $password=$this->input->post('passwordA');
                                    $username=$this->input->post('usernameA');
                                    $newUser= $this->Utilisateur->createAccount($firstname,$lastname,$email,$tel,$username,$address,$password,$gender,$job,$state,$city,$birthday);
                                    $idCustomer=(int) $newUser[0]->idClient;
                                    
                                }

                                // INFOS SERVANT A LA CREATION DU PAIEMENT 
                                $paymentNumber=$this->input->post('paymentNumber');
                                $carteBancaire=$this->input->post('carteBancaire');
                                $paypal=$this->input->post('paypal');
                                $chequeBancaire=$this->input->post('chequeBancaire');
                                if(!empty($paymentNumber)){
                                    $modePaiement='CinetPay';
                                }else if(!empty($carteBancaire)){
                                    $modePaiement='Carte Bancaire';
                                }else if(!empty($paypal)){
                                    $modePaiement='Paypal';
                                }
                                else if(!empty($chequeBancaire)){
                                    $modePaiement='Cheque Bancaire';
                                }
                            
                            //ces variables contiendront les infos pour Le Client qui veut qu'on livre sa commande à adresse differente
                            $shipAddress=$this->input->post('addressShip');
                            $shipState=$this->input->post('stateShip');
                            $shipCity=$this->input->post('cityShip');
                            $shipCountry=$this->input->post('countryShip');

                             if(isset($count) && isset($idCustomer) && isset($prixTotal) && isset($devise) && isset($modePaiement)){
                                        //CREATION DE LA LIVRAISON
                                        $livraison=new Livraison();
                                        $livraison->setDate(date('Y-m-d'));
                                        $livraison->setStatutLivraison("Livraison en cours de preparation");
                                        $livraison->setQuantiteArcle($count." Produits");
                                        $livraison->setDevise($devise);
                                        $livraison->setService_codeService('service@psarolivraison');
                                        $livraison->setClient_idClient($idCustomer);
                                        if(isset($shipAddress) && isset($shipState) && isset($shipCity) && isset($shipCountry)){
                                            //LORSQUE LE CLIENT VEUT QUE SA LIVRAISON SE PASSE A UNE AUTRE ADRESSE
                                              $livraison->setAdresseLivraison($shipCountry.'-'.$shipState.'-'.$shipCity.'-'.$shipAddress);
                                        }else{
                                              $livraison->setAdresseLivraison($adresseLivraison->getPays().'-'.$adresseLivraison->getProvince().'-'.$adresseLivraison->getVille().'-'.$adresseLivraison->getReferences());
                                        }
                                      
                                        
                                       
                                        if($this->Livraison->addDelivery($livraison)){ // VERIFIE SI L'AJOUT REUSSI
                                            $idLastLivraison=$this->Livraison-> getLastIdDelivery();// ON RECUPERE L'ID DE LA LIVRAISON ENRISTREE POUR CREER UNE ASSIOCIATION AVEC LA COMMANDE
                                            //ON CREE LA COMMANDE AFIN DE L'ASSOCIEE A LA LIVRAISON APARTIR DE L'IDlIVRAISON
                                         
                                            //A CHAQUE ACHAT D'UN ARTICLE ON DOIT METTRE A JOUR LA QUANTITE EN STOCK 
                                            if(isset($productTab)){
                                               
                                                foreach($productTab as $key => $value){
                                                   
                                                    $result=$this->Article->getQuantite($key);
                                                    $quantiteStock=$result[0]->quantiteEnVente;// on recupere la quantite du produit en stock
                                                    if($quantiteStock > $value){
                                                        $quantiteRestante=$quantiteStock-$value;
                                                        $this->Article->setQUantiteStock($key,$quantiteRestante);
                                                    }else{
                                                         $this->session->set_flashdata('commande', 'Veuillez saisir une Quantite inferieure à celle du Catalogue');
                                                    }      
                                                   
                                                }
                                            }
                                            $commande=new Commande();
                                            $commande->setMontant($prixTotal);
                                        
                                            $commande->setDate(date('Y-m-d'));
                                            $commande->setDevise($devise);
                                            $commande->setModePaiement($modePaiement);
                                            //UN CLIENT PEUT PASSER 0 A PLUSIEURS COMMANDE(S), LA CLE ASSOCIATIVE DOIT ETRE DANS LA COMMANDE
                                            $commande->setClient($idCustomer);// ON CREE UNE ASSOCIATION ENTRE LA COMMANDE ET LE CLIENT
                                            if(isset($idLastLivraison) && $idLastLivraison > 0){
                                                //ON CREE L'ASSOCIATION ENTRE LA COMMANDE ET LA PROCHAINE LIVRAISON
                                                $commande->setLivraison($idLastLivraison);

                                            }
                                        
                                            /**
                                            * LE SERVICE CLIENT DOIT AUTORISER LA LIVRAISON DE LA COMMANDE POUR CHANGER SON ETAT
                                            * LA COMMANDE SERA VISIBLE PAR LE SERVICE DE LIVRAISON SEULEMENT SI SON AUTORISATION EST TRUE
                                            **/ 
                                           $commande->setStatutLivraison("Livraison en Attente Autorisation");
                                            $commande->setAutorisation(false);

                                            //ON RECUPERE L'ID DE LA COMMANDE POUR L'ASSOCIE AU PAIEMENT
                                            if($this->Commande->insertCommande($commande)){
                                              
                                                $idCommande=(int) $this->Commande-> getLastIdOrder();
                                                $description=$this->input->post('description');
                                                $paiment=new Paiement();
                                                $paiment->setCommande($idCommande);
                                                $paiment->setDescription($description);
                                                $paiment->setDevise($devise);
                                                $paiment->setFacture($idFacture);
                                                $paiment->setMontantTransaction($prixTotal);
                                                $paiment->setTypePaiement($modePaiement);
                                                $paiment->setNumTelephone($paymentNumber);
                                                $paiment->setDate(date('Y-m-d'));
                                                $paiment->setStatut("Valide");
                                                $paiment->setNumeroTransaction($paymentNumber);
                                                $this->Paiement->addPaiement($paiment);
                                              
                                                
                                            }
                                        

                                }
                            }
                    
                    
                        if ($this->db->trans_status() === FALSE){ //SI LA TRANSACTION ECHOUE,
				            $this->db->trans_rollback(); //ON ANNULE LES MODIFICATIONS APPORTEES AUX TABLES DE LA BD
                        }else{
			                $this->db->trans_commit(); //  SI LA TRANSACTION REUSSOIE, ON GARDE LES MODIFICATION
                        }
                     
                        $this->session->set_flashdata('commande', 'Votre commande a été passée avec succès');
                       // echo json_encode(array("statut"=>true,"message"=>"merci de nous faire confiance","lien"=>"LignePanier/success"));
                        if(isset($idCustomer) && isset($idCommande)){
                             $this->success($idCustomer,$idCommande);
                        }
                       
        
                       
                    }catch(Exception $e){
                       // echo json_encode(array("statut"=>false,"message"=>$e->getMessage()));
                         $this->session->set_userdata('validation', "Impossible de passer une commande, veuillez renseigner les informations correctes");
                         $this->load->view('PsaroWebSite/checkout');
                    }

            }else{
               // echo json_encode(array("statut"=>false,"message"=>"echec de la commande, veuillez recommencer"));
                  $this->session->set_userdata('utilisateur', 'Veuillez Saisir les informations correctes');
                $this->load->view('PsaroWebSite/checkout');
            }
          
       
           //var_dump($commande);
           //var_dump($this->Commande->insertCommande($commande));
           //echo json_encode(array("statut"=>false,"message"=>"echec de la commande, veuillez recommencer"));
           //redirect(base_url('LignePanier/panier')); 
        }

        public function success($idClient,$idCommande){
             $data['newCustomerOrder']=$this->Commande->getLastOrderByClientID($idClient,$idCommande);

            $this->load->view('PsaroWebSite/success',$data);
          }
       
       
    }