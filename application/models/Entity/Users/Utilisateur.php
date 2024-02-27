<?php 
    class Utilisateur extends CI_Model{
        protected $idUtilisateur;
        protected $email;
        protected $telephone;
      

        public function __construct(){
            parent::__construct();
            $this->load->library('email');
         
        }
        public function getIdUtilisateur(){
            return $this->idUtilisateur;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getTelephone(){
            return $this->telephone;
        }
      
        public function setIdUtilisateur($id){
            $this->idUtilisateur=$id;
        }
        public function setEmail($email){
            $this->email=$email;
        }
        public function setTelephone($telephone){
            $this->telephone=$telephone;
        }
       
        
        public function sendEmail($to,$cc,$bcc,$subject,$message){
            $this->email->from($this->email, 'Name');
            $this->email->to($to);
            $this->email->cc($cc);
            $this->email->bcc($bcc);
            
            $this->email->subject($subject);
            $this->email->message($message);
            
            $this->email->send();
            
            echo $this->email->print_debugger();
             
        }

        public function getUserById($id){
            return $this->db->get_where(__CLASS__,array($this->idUtilisateur=>$id))->custom_result_object(__CLASS__);
        }
        public function getUserByEmail($mail){
            return $this->db->get_where(__CLASS__,array($this->email=>$mail))->custom_result_object(__CLASS__);
        }

        /**
         * la fonction  getUserAccountById renvoi un User associé à son compte utilisateur et associé au client
         * la relation entre Utilisateur et Compte est l'ASSOCIATIN, un User peut avoir un à plusieus comptes
         * et la relation Utilisateur et Client est l'HERITAGE, un Client est un Utilisateur qui possède un Compte
         */
        public function getUserAccountById($id){
          
              $this->db->select('*');
            $this->db->from(__CLASS__)->where(array(__CLASS__.'.idUtilisateur'=>$id,'Compte.Utilisateur_idUtilisateur'=>$id));
            $this->db->where(array('Client.Utilisateur_idUtilisateur'=>$id));
            $this->db->join('Compte', 'Compte.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
            $this->db->join('Client', 'Client.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
            $query = $this->db->limit(1)->get()->custom_result_object(__CLASS__);
            return $query;
         }

         public function getServiceAccountById($id){
          
            $this->db->select('*');
          $this->db->from(__CLASS__)->where(array(__CLASS__.'.idUtilisateur'=>$id,'Compte.Utilisateur_idUtilisateur'=>$id));
          $this->db->where(array('Service.Utilisateur_idUtilisateur'=>$id));
          $this->db->join('Compte', 'Compte.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
          $this->db->join('Service', 'Service.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
          $query = $this->db->limit(1)->get()->custom_result_object(__CLASS__);
          return $query;
       }

       public function updateUserByID($id,$user){
          return $this->db->update(__CLASS__, $user,['idUtilisateur'=>$id]);
       }

       /** createAccount fonction permettant de creer un Utilisateur et L'associe a UN Client
        * @param mixed $firstname,$lastname,$email,$phone,$username,$address,$password,$genre,$profession,$state,$city,$birthday
        * @return array  RETOURNE UN TABLE CONTENANT UN USER
        */
       public function createAccount($firstname,$lastname,$email,$phone,$username,$address,$password,$genre,$profession,$state,$city,$birthday){
        $config['upload_path']          = './assets/vendorsAdmin/img/usersProfil/'; //le dossier où sera contenu les images
        $config['allowed_types']        = 'jpg|png|jpeg|webp'; //les extensions autorisées
        $config['max_size']             = 2048; //la taille maximale; dans notre cas c'est 2Mo
        $config['file_name']			=$username; //le nom qu'on soutaite donné au fichier afin d'éviter les confusions ou overwrites
        $picture='';
        $pathPhoto="assets/vendorsAdmin/img/usersProfil/ServiceProfile/user-properties.png";
        $this->load->library('upload', $config); // chargement de la bibliothe en fonction des conditions
        if($this->upload->do_upload("profile")){ // le fonction qui copie de le fichier du User sur le serveur de l'applicatio
            $picture= $this->upload->data('full_path');
            $pathPhoto=substr($picture,30,100);
            //print_r(substr($picture,30,50));
        }else{
            $this->session->set_flashdata('upload',$this->upload->display_errors()); //les sessions nous aident garder les infos du User durant sa visite sur le site 
        }
        $this->db->trans_begin();
        $user=array('email' => $email,'telephone'=> $phone);
        $this->db->insert('Utilisateur',$user);
        $result= $this->db->select_max('idUtilisateur')->from('Utilisateur')->limit(1)->get();
        foreach ($result->result() as $row)
        {
            $idUser=(int) $row->idUtilisateur;
        }
        $account=array('username'=>$username,'password'=>sha1($password),'statutLogin'=>1,'Utilisateur_idUtilisateur'=>$idUser);
        $this->db->insert('Compte',$account);
        $customer=array('prenom'=>$firstname,'nom'=>$lastname,'profession'=>$profession,'genre'=>$genre,'dateNaissance'=>$birthday,'adresses'=>$state.": ".$city.", ".$address,'photoProfile'=>$pathPhoto,'Utilisateur_idUtilisateur'=>$idUser);
        $this->db->insert('Client',$customer);
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
       else{
            $this->db->trans_commit();
        }
        $newdata = array(
            'username'  => $username,
            'firstname' =>$firstname,
            'lastname' => $lastname,
            'profession' =>$profession,
            'telephone' =>$phone,
            'email' =>$email,
            'dateNaissance' =>$birthday,
            'adresses' =>$state.": ".$city.", ".$address,
            'id_user'     => $idUser,
            'profile'	  => $pathPhoto,	
            'typeUser'	=> 'client',
            'logged_in' => TRUE,
        );               
        $this->session->set_userdata($newdata);
        return $this->getUserAccountById($idUser);
    }

    }