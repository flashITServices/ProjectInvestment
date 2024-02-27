<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class EtatsFinanciers extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

         /**
        * @var int
        */public $idEtatFinancier;
        public $date;
         /**
        * @var string
        */public $documentComptable;
         /**
        * @var string
        */public $bilanPrevisionel;
         /**
        * @var string
        */public $budgetTresorerie;
          /**
        * @var int
        */public $Subvention_idSubvention;
        /**
        * @var int
        */public $Organisme_idOrganisme;

    }