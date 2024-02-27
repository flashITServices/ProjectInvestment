<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class Projet extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        /**
         * @var int
         */
        public $idProjet;

       
        public $date;

        /**
         * @var string
         */
        public $nature;
        /**
         * @var string
         */public $secteurActivite;

        /**
         * @var string
         */public $dureeExploitation;
         /**
         * @var string
         */public $nomEntreprise;

         /**
         * @var string
         */public $numero;

         /**
         * @var string
         */public $planExploitation;

     
         public $dateDebutActivite;
        /**
         * @var string
         */public $localisation;
        /**
         * @var int
         */public $Subvention_idSubvention;
         /**
         * @var int
         */public $Organisme_idOrganisme;

        function setLocalisation($localisation){$this->localisation=$localisation;}
        function setDateDebutActivite($date){$this->dateDebutActivite=$date;}
        function setPlanExploitation($plan){$this->planExploitation=$plan;}
        function setNomEntreprise($nomEntreprise){ $this->nomEntreprise=$nomEntreprise;}
        function setNumero($numero){$this->numero=$numero;}
        function setNature($nature){$this->nature=$nature;}
        function setsecteurActivite($secteurActivite){$this->secteurActivite=$secteurActivite;}
        function setDureeExploitation($periodicite){$this->dureeExploitation=$periodicite;}

        /**
         * Renvoi la un tableau d'objets de type Projet des tous nos projets
         *
         * @return array
         */
        function getProjects(){
            return $this->db->get(__CLASS__)->custom_result_object(__Class__);
        }


        /** 
       * @param mixed $order la fonction qui insere un projet dans la base de donnees
       * @return bool
       */
      public function insertCommande($projet){
        return $this->db->set($projet)->insert(__CLASS__);
    }

    /** 
       * @param int $id la fonction qui renvoi un table avec un seul Objet de type Projet
       * @return array
       */
      public function getCommandeByID($id){
        return $this->db->where(array($this->idProjet=>$id))->get(__CLASS__)->custom_result_object (__CLASS__);
      }

      /** 
       * @param int $id la fonction qui supprime un  Projet par son ID
       * @return bool
       */
    public function deleteProject($id){
        return  $this->db->where('idProjet', $id)->delete(__CLASS__);
    }


     /** 
       * @param int $id la fonction qui renvoie les projets appartenant à une startup
       * @return array
       */
      public function getProjectsByStartupID($id){
        $this->db->select('*');
        $this->db->from(__CLASS__);
        $this->db->where(array('Projet.Organisme_idOrganisme'=>$id));
        $this->db->join('Organisme', 'Organisme.idOrganisme = Projet.Organisme_idOrganisme');
        $this->db->join('Utilisateur', 'Utilisateur.idUtilisateur = Organisme.Utilisateur_idUtilisateur');         
        $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
      }

      function countProjectsByIDStartup($id){
            return $this->db->where(array('Organisme_idOrganisme'=>$id))->count_all_results(__CLASS__);
        }

        /** 
       * @param int $id la fonction qui met à Jour les infos sur un  Projet par son ID
       * @return bool
       */
        public function updateProject($id,$project){
            return $this->db->update(__CLASS__, $project,['idProjet'=>$id]);
        }
    }