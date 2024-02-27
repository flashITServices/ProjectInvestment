<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class UsersController extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Entity/Utilisateur/Client');
            $this->load->model('Entity/Utilisateur/Service');
            $this->load->model('Entity/Utilisateur/Utilisateur');
        }

        public function profile(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
            $this->load->view('AdminPanel/users-profile');
        }

        function getQuestions(){
               if(!isset($_SESSION['username'])){
                redirect();
            }
            $this->load->view('AdminPanel/FAQ');
        }
        function getContacts(){
                if(!isset($_SESSION['username'])){
                redirect();
            }
            $this->load->view('AdminPanel/Contacts');
        }

        public function updateUser($id){
            
            $firstname = $this->input->post('firstname');
            $lastname=  $this->input->post('lastname');
            $job = $this->input->post('job');
            $adress = $this->input->post('address');
            $phone = $this->input->post('phone');
            $email=$this->input->post('email');
            $codeService= $this->input->post('codeService');

            $config['upload_path']          = './assets/vendorsAdmin/img/usersProfil/'; //le dossier où sera contenu les images
            $config['allowed_types']        = 'jpg|png|jpeg|webp'; //les extensions autorisées
            $config['max_size']             = 2048; //la taille maximale; dans notre cas c'est 2Mo
            $config['file_name']			=$firstname.$id; //le nom qu'on soutaite donné au fichier afin d'éviter les confusions ou overwrites
            $picture='';
            $this->load->library('upload', $config); // CHARGEMENT DE LA BIBLIOTHEQUE EN FONCTION DES CONDITIONS              
            if(empty($codeService)){ //on actualise la photo du profile seulement pour un Client
                   
                    $picture='';
                    $pathPhoto="assets/vendorsAdmin/img/usersProfil/ServiceProfile/user-properties.png";;
                    $image=substr($this->input->post('imageFile'),31,100);
                       
                    if($this->upload->do_upload("imageProfile")){ // LA FONCTION QUI RECUPERE LA PHOTO UPLOADEE ET LA COPIE SUR LE SERVEUR
                        $picture= $this->upload->data('full_path');
                        $pathPhoto=substr($picture,30,100);		
                        $this->session->set_flashdata('upload','image uploaded successfully');
                    }else{
                        //SI LE CLIENT NE VEUT PAS METTRE A JOUR SA PHOTO, ON GARDE L'ANCIENNCE
                        $pathPhoto=$image;
                        $this->session->set_flashdata('upload',$this->upload->display_errors()); //les sessions nous aident garder les infos du User durant sa visite sur le site 
                    }
                    $customer =array('prenom'=>$firstname,'nom'=>$lastname,'profession'=>$job,'adresses'=>$adress,'photoProfile'=>$pathPhoto);
                    $user= array('email'=>$email,'telephone'=>$phone);
                    $this->db->trans_begin();
                    $this->Client->updateUserByID($id,$user);
                    $this->Client->updateClient($id,$customer);
                  
                    if ($this->db->trans_status() === FALSE) // SI LA TRANSACTION ECHOUE
                        {
                            $this->db->trans_rollback(); // ON ANNULE TOUTES LES REQUETES
                            $json['message']="Profile update failed"; 
                            echo json_encode($json);
                        }
                    else{
                        $this->db->trans_commit(); // SI LA TRANSACTION REUSSIE, ON VALIDE LA MISE A JOUR
                        $json['message']="Profile updated successfully"; 
                        $user=$this->Utilisateur->getUserAccountById($id); // LA MISE A JOUR REUSSI, ON RECUPERE LES NOUVELLES DONNEES A JOUR POUR LES ACTUALISER SUR LES PAGES
                        foreach($user as $user){
                            $json['username'] = $user->username;
                            $json['firstname'] = $user->prenom;
                            $json['lastname'] = $user->nom;
                            $json['telephone'] = $user->getTelephone();
                            $json['profession'] = $user->profession;
                            $json['email'] = $user->getEmail();
                            $json['dateNaissance'] = $user->dateNaissance;
                            $json['adresses'] = $user->adresses;
                            $json['profile'] = $user->photoProfile;
                            $json['typeUser'] ='Client';
                            $newdata = array(                        
                                'profile'	  => $user->photoProfile,	                               
                                );
                           	
                        }	
                        $this->session->set_userdata($newdata);
                        echo json_encode($json);

                    }
            }else{ // SINON IL S'AGIT D'UN COMPTE SERVICE, QU'ON DOIT METTRE A JOUR
                    $service =array('codeService'=>$codeService,'nomService'=>$firstname);
                    $user= array('email'=>$email,'telephone'=>$phone);
    
                    $this->db->trans_begin();
                    $this->Service->updateUserByID($id,$user);
                    $this->Service->updateService($id,$service);
                    if ($this->db->trans_status() === FALSE)
                        {
                            $this->db->trans_rollback();
                            $json['message']="Profile update failed"; 
                            echo json_encode($json);
                        }
                    else{
                        $this->db->trans_commit();
                        $json['message']="Profile updated successfully"; 
                        $user=$this->Utilisateur->getServiceAccountById($id); // LA MISE A JOUR REUSSI, ON RECUPERE LES NOUVELLES DONNEES A JOUR POUR LES ACTUALISER SUR LES PAGES
                        foreach($user as $user){
                            $json['username'] =$user->username;
                            $json['nomService'] =$user->nomService;
                            $json['codeService'] =$user->codeService;
                            $json['profession'] =$user->profession;
                            $json['email'] =$user->getEmail();
                            $json['telephone'] =$user->getTelephone();
                            $json['company'] ='HyperPsaro';
                            $json['adresses'] = 'SIEGE SOCIAL-RDC, Lubumbashi, N°17 Chaussées MZee Laurent Désiré Kabila- Provice du Haut Katanga';
                            $json['profile'] = $user->photoProfile;
                            $json['typeUser'] = 'Service';
                        }
                        echo json_encode($json);
                    }
                
                }
            } 
      
}