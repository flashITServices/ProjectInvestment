<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class AutorisationOuverture extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

          /**
         * @var int
         */public $idAutorisationOuverture;
          /**
         * @var string
         */public $lieu;
          /**
         * @var string
         */public $statut;
        
         public $date;
          /**
         * @var string
         */public $pieceJointe;

        /**
         * @var int
         */public $Subvention_idSubvention;
        /**
        * @var int
        */public $Organisme_idOrganisme;

    }