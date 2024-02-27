<?php 
     require_once('Utilisateur.php');


    class Agent extends Utilisateur{
        public $matricule;
        public  $nom;
        public   $prenom;
        public   $Utilisateur_idUtilisateur;
        public $Service_codeService;
        public $service;
        public $fonction;
        public $dateRecrutement;
        public  $adresse;
        public  $genre;
        public function __construct(){
           parent::__construct();
        }

        public function getMatricule(){
            return $this->matricule;
        }

        public function getNom(){
            return $this->nom;
        }
       
        public function getService(){
            return $this->service;
        }
        public function getFonction(){
            return $this->fonction;
        }
        public function getDateRecrutement(){
            return $this->dateRecrutement;
        }
        public function getAdresse(){
            return $this->adresse;
        }
      
        public function setNom( $nomAgent){
            $this->nom=$nomAgent;
        }
        public function setMatricule($matricule){
            $this->matricule=$matricule;
        }
        public function setPrenomAgent( $prenomAgent){
            $this->prenom=$prenomAgent;
        }
        public function setService( $service){
            $this->service=$service;
        }

        public function setIdUser($id){
            $this->Utilisateur_idUtilisateur=$id;
        }

        public function getIdUser(){
            return $this->Utilisateur_idUtilisateur;
        }
        public function setFonction( $fonction){
            $this->fonction=$fonction;
        }
        public function setDateRecrutement( $dateRecrutement){
            $this->dateRecrutement=$dateRecrutement;
        }
        public function setAdresse($adresse){
            $this->adresse=$adresse;
        }

        function setGenre($genre){
            $this->genre=$genre;
        }

        function getPrenom(){
            return $this->prenom;
        }

        public function setCodeService($codeService){
            $this->Service_codeService=$codeService;
        }

        public function getCodeService(){
            return $this->Service_codeService;
        }
        public function addAgent(Agent $agent){
            return $this->db->set($agent)->insert(__CLASS__);
        }

        public function getAgentByID($id){
            $this->db->where(array('idAgent'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }

        public function getAgentByCodeService($codeService,$fonction){
              $this->db->where(array('Service_codeService'=>$codeService,'fonction'=>$fonction));
                 $this->db->join('Utilisateur', 'Agent.Utilisateur_idUtilisateur = Utilisateur.idUtilisateur');
              return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        
    
    }