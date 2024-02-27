<?php 
 require_once('Utilisateur.php');
 require_once('IService.php');
    class Service extends Utilisateur implements Iservice {
        private $codeService;
        private $nomService;
       
        public function __construct(){
            parent::__construct();
           
        }
        public function getCodeService(){
            return $this->codeService;
        }
        public function getNomService(){
            return $this->nomService;
        }
        public function setCodeService($codeService){
            $this->codeService=$codeService;
        }
        public function setNomService($nomService){
            $this->nomService=$nomService;
        }
        public function consulterStatistique(){
            
        }
        public function addAgent(Agent $agent){}

        public function getCommandes(){}
        public function infosCommande($id){}
        public function getAgents(){}
        public function getAgent($id){}

        public function getServiceByUserID($id){
            return $this->db->where(array('Utilisateur_idUtilisateur'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }

        public function updateService($idUser,$service){
            return $this->db->update(__CLASS__, $service,['Utilisateur_idUtilisateur'=>$idUser]);
        }


    }