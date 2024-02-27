<?php 
 if(!defined('BASEPATH')) exit('No direct script access allowed');
  
    class Subvention extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
          /**
          * @var int
          */public $idSubvention;
          /**
          * @var string
          */public $motif;
         public $date;
          /**
          * @var float
          */public $capital;
         /**
          * @var float
          */ public $fraisDepot;
          /**
          * @var string
          */public $devise;
          /**
          * @var string
          */public $description;
          /**
          * @var string
          */public $statut;
         /**
          * @var string
          */ public $nomDemandeur;
          /**
          * @var string
          */public $functionDemandeur;
         /**
          * @var string
          */public $signatureDemandeur;

    }