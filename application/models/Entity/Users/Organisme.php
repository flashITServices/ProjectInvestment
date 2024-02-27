<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
   require_once('Utilisateur.php');
    class Organisme extends Utilisateur{

        /**
         * @var int
         */
        protected $idOrganisme;

         /**
         * @var string
         */
        protected $denomination;
        /**
         * @var string
         */
        protected $siegeSocial;
         /**
         * @var string
         */
        protected $siegeExploitation;
        /**
         * @var string
         */
        protected $RCCM;
        /**
         * @var string
         */
        protected $idNationale;
       /**
         * @var string
         */
        protected $numeroImpot;
        /**
         * @var string
         */
        protected $siteInternet;
        /**
         * @var string
         */
        protected $activitePrincipale;
        /**
         * @var string
         */
        protected $activiteSecondaire;
        /**
         * @var float
         */
        protected $capitalSocial;

        /**
         * @var string
         */
        protected $devise;
        /**
         * @var string
         */
        protected $typeOrganisme;
        
        protected $dateCreation;
        /**
         * @var string
         */
        protected $logo;
        /**
         * @var string
         */
        protected $formeJuridique;
        
        /**
         * @var int
         */
        protected $Utilisateur_idUtilisateur;

        public function __construct(){
            parent::__construct();
        }

        function setIdOrganisme($id){$this->idOrganisme =$id;}
       
        function setFormeJuridique($forme){$this->formeJuridique=$forme;}
        function setLogo($logo){$this->logo=$logo;}
        function setSiteInternet($domaine){$this->siteInternet=$domaine;}
        function setSiegeSocial($siege){$this->siegeSocial=$siege;}
        function setExploitation($siege){$this->siegeExploitation=$siege;}
        function setRCCM($numero){$this->RCCM=$numero;}
        function setDateCreation($date){$this->dateCreation=$date;}
        function setActivitePrincipale($primary){$this->activitePrincipale=$primary;}
        function setActiviteSecondaire($secondary){$this->activiteSecondaire=$secondary;}

        function getActiviteSecondaire() {return $this->activiteSecondaire;}
       function getIdOrganisme(){return $this->idOrganisme;}
       function getIdNationale(){return $this->idNationale;}
       function getRCCM(){return $this->RCCM;}


    }