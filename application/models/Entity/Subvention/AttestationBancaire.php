<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class AttestationBancaire extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        /**
         * @var int
         */public $idAttestationBancaire;
         /**
         * @var string
         */public $nomBancaire;
       /**
         * @var string
         */public $numeroCompte;
         /**
         * @var string
         */public $intituleCompte;
         /**
         * @var string
         */public $montant;
         /**
         * @var string
         */public $devise;
         /**
         * @var string
         */public $dateCreation;
         /**
         * @var string
         */ public $pieceJointe;
         
         /**
         * @var int
         */public $Subvention_idSubvention;
         /**
         * @var int
         */public $Organisme_idOrganisme;


    }