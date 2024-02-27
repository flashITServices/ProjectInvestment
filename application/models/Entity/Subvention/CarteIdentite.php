<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class CarteIdentite extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        /**
         * @var int
         */public $idCarteIdentite;
        /**
         * @var string
         */public $type;
        public $dateCreation;
        /**
         * @var string
         */public $dureeValidite;
        /**
         * @var string
         */public $nomsProprietaire;
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