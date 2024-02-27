<?php 


    class LigneFacture extends CI_Model{

         /** 
         * @var int
         */
        public  $idLigneFacture;

        /** 
         * @var string
         */
        public $designation;
        /**
         * @var float
         */
        public $prixUnitaire;

         /** 
         * @var int
         */
        public  $quantite;

         /**
         * @var float
         */
        public $prixTotalLigne;

          /** 
         * @var int
         */
        public $Facture_idFacture;
          /** 
         * @var int
         */
        public $Article_idArticle;
          /** 
         * @var string
         */
        public $devise;

        public function __construct(){
            parent::__construct();
        }

        function setDesignation($designation){$this->designation=$designation;}
        function setPrixUnitaire($prixUnitaire){$this->prixUnitaire=$prixUnitaire;}
        function setPrixTotalLigne($prixTotalLigne){$this->prixTotalLigne=$prixTotalLigne;}
        function setQuantite($quantite) {$this->quantite=$quantite;}
        function setDevise($devise) {$this->devise=$devise;}
        function setFactureIdFacture($idFacture) {$this->Facture_idFacture=$idFacture;}
        function setArticleIdArtice($idArticle) {$this->Article_idArticle=$idArticle;}

        
      /** 
       * @param mixed $order la fonction qui insere une commande dans la base de donnees
       * @return bool
       */
      public function insertLigne(LigneFacture $ligne){
      
         if($this->db->set($ligne)->insert(__CLASS__)){
            return true;
         }else{
            return false;
         }  
    }

    function getLigneFactureID($id){
        return $this->db->where(array('idLigneFacture'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
    }

    function getLignesByFacture($idFacture){
        return $this->db->where(array('Facture_idFacture'=>$idFacture))->get(__CLASS__)->custom_result_object(__CLASS__);
    }

    function totalSales(){
    $this->db->select('designation');
      $this->db->group_by('designation')->limit(20);

      return $this->db->get(__CLASS__)->result_object();
    }
   
    
     function getQuantitySold($designation){
             $this->db->select_sum('quantite')->from(__CLASS__)->where('designation',$designation);
           return $this->db->get()->result_object();
        
        }

          function getPriceSold($designation){
             $this->db->select_sum('prixTotalLigne')->from(__CLASS__)->where('designation',$designation);
           return $this->db->get()->result_object();
        
        }

}