<?php 

    require_once('Utilisateur.php');
    class Client extends Utilisateur{
        private $idClient;
        private $prenom;
        private $nom;
        private $profession;
        private $genre;
        private $dateNaissance;
        private $adresse;
        
        private $photoProfile;
        

        /** le constructeur nous permet d'Instancier ou de creer un Objet
         */
        public function __construct(){
            parent::__construct();
        }
	
        public function setPhotoProfile($photoProfile){
            $this->photoProfile = $photoProfile;
        }
        public function setAdresse($adresse){
            $this->adresse = $adresse;
        }
        public function setGenre($genre){
            $this->genre = $genre;
        }
        public function setProfession($profession){
            $this->profession = $profession;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }
        public function setDateNaissance($dateNaissance){
            $this->dateNaissance = $dateNaissance;
        }

        
        public function getPhotoProfile(){
            return $this->photoProfile;
        }
        public function getAdresse(){
            return $this->adresse;
        }
       
        public function getIdClient(){
            return $this->idClient;
        }

        public function getPrenom(){
            return $this->prenom;
        }
        public function getProfession(){
            return $this->profession;
        }

        public function getNom(){
            return $this->nom;
        }

        public function getDateNaissance(){
        }

        public function getClientByUserID($id){
            return $this->db->where(array('Utilisateur_idUtilisateur'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        public function updateClient($idUser,$user){
            return $this->db->update(__CLASS__, $user,['Utilisateur_idUtilisateur'=>$idUser]);
        }
        public function getClients(){
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }

   
}