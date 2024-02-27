<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class FactureFournisseur extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

         /** 
        * @var int
        */public $idFactureFournisseur;
        public $date;
         /** 
        * @var string
        */public $nomFournisseur;
         /** 
        * @var string
        */public $telephone;
         /** 
        * @var string
        */public $email;
        /** 
        * @var string
        */public $pieceJointe;
       /**
        * @var int
        */public $Subvention_idSubvention;
       /**
        * @var int
        */public $Organisme_idOrganisme;

        /**
         * @return array
         */
        public function getFactures(){
            return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
        }

        public function getFactureByID($id){
            return $this->db->where('idFactureFournisseur',$id)->get(__CLASS__)->custom_result_object(__CLASS__);
        }

         /** 
       * @param int $id la fonction qui renvoie les projets appartenant à une startup
       * @return array
       */
      public function getBillByStartupID($id){
        $this->db->select('*');
        $this->db->from(__CLASS__);
        $this->db->where(array('FactureFournisseur.Organisme_idOrganisme'=>$id));
        $this->db->join('Organisme', 'Organisme.idOrganisme = FactureFournisseur.Organisme_idOrganisme');
        $this->db->join('Utilisateur', 'Utilisateur.idUtilisateur = Organisme.Utilisateur_idUtilisateur');         
        $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
      }
    }

    