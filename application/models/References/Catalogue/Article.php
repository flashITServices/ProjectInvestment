<?php 
    class Article extends CI_Model{
     
        public $idArticle;
        public $designation;
        public $quantiteEnVente;
        public $unites;
        public $prix;
        public $devise;     
        public $dateAjout;     
        public $categorie;
        public $Rayon_idRayon;
        public $imageArticle;

        public function __construct(){
           parent::__construct();
        }

        public function getIdArticle(){
            return $this->idArticle;
        }
        public function getDesignation(){
            return $this->designation;
        }
        public function getQuantiteEnVente(){
            return $this->quantiteEnVente;
        }
        public function getUnites(){
            return $this->unites;
        }
        public function getPrix(){
            return $this->prix;
        }
        public function getDevise(){
            return $this->devise;
        }
        public function getDateAjout(){
            return $this->dateAjout;
        }
        public function getCategorie(){
            return $this->categorie;
        }
        
        public function getIdRayon(){
            return $this->Rayon_idRayon;
        }
        public function getImageArticle(){
            return $this->imageArticle;
        }
     
        public function setIdRayon($idRayon){
            $this->Rayon_idRayon=$idRayon;
        }
        public function setIdArticle($idArticle){
            $this->idArticle=$idArticle;
        }
        public function setDesignation($designation){
            $this->designation=$designation;
        }
        public function setQuantiteEnVente($quantiteEnVente){
            $this->quantiteEnVente=$quantiteEnVente;
        }
        public function setUnites($unites){
            $this->unites=$unites;
        }
        public function setPrix($prix){
            $this->prix=$prix;
        }
        public function setDevise($devise){
            $this->devise=$devise;
        }
        public function setDateAjout($dateAjout){
            $this->dateAjout=$dateAjout;
        }
        public function setCategorie($categorie){
            $this->categorie=$categorie;
        }
        public function setImageArticle($imageArticle){
            $this->imageArticle=$imageArticle;
        }

        public function getArticleById($id){
            return $this->db->where(array('idArticle'=>$id))->get(__CLASS__)->custom_result_object(__CLASS__);
        }
        public function addArticle($article){
            if($this->db->insert(__CLASS__,$article)){
                $json['status']=true;
                echo json_encode($json);
                return true;
            }else{
                $json['status']=false;
                echo json_encode($json);
                return false;
            }
        }

       public function updateArticle($idArticle,$article){
           return $this->db->set($article)->where(array('idArticle'=>$idArticle))->update(__CLASS__);
           
       }
             
       public function getCategories(){
        $this->db->distinct();
       return  $this->db->group_by("categorie")->get(__CLASS__)->custom_result_object(__CLASS__);
    
    }
    public function deleteArticle($id){
        $this->db->where('idArticle', $id);
        return $this->db->delete(__CLASS__);
    }

    public function getArticleByRayon($idRayon){
        $this->db->select('*');
        $this->db->from(__CLASS__)->where(array(__CLASS__.'.Rayon_idRayon'=>$idRayon,'Rayon.idRayon'=>$idRayon));
        $this->db->join('Rayon', 'Article.Rayon_idRayon = Rayon.idRayon');
        $this->db->order_by('idArticle','DESC');
        $query = $this->db->get()->custom_result_object(__CLASS__);
        return $query;
        
    }

    public function getArticlesByName($name){
       
        return $this->db->like('designation',$name)->get(__CLASS__)->custom_result_object(__CLASS__);
    }
    public function getArticlesGroup($id){
        $this->db->where(array("Rayon_idRayon"=>$id));
        $this->db->from(__CLASS__);
       return $this->db->count_all_results();
       
    }

    public function getPostByName($idRayon,$name=null){
        if($name != null){
           
            return $this->db->like('designation',$name, 'both')->or_where(array('Rayon_idRayon'=>$idRayon))->get(__CLASS__)->custom_result_object(__CLASS__);   
        }else{
           return $this->db->where(array("Rayon_idRayon"=>$idRayon))->get(__CLASS__)->custom_result_object(__CLASS__);
                
        }
    
    }

    public function getArticles(){
        return $this->db->select('idArticle,Designation')
        ->from(__CLASS__)
        ->order_by('Designation','ASC')
        ->get()
        ->result();
    }

    public function getPrice($id){
        return $this->db->select('prix')
        ->from(__CLASS__)
        ->where(array('idArticle'=>$id))
        ->limit(1)
        ->get()
        ->result();
    }
     public function getQuantite($id){
        return $this->db->select('quantiteEnVente')
        ->from(__CLASS__)
        ->where(array('idArticle'=>$id))
        ->limit(1)
        ->get()
        ->result();
    }
    function setQUantiteStock($id,$valeur){
        $this->db->set('quantiteEnVente', $valeur, FALSE);
        $this->db->where('idArticle', $id);
        return $this->db->update(__CLASS__); 
    }

    public function getStore(){
         $this->db->order_by('idArticle','DESC');
        return $this->db->get(__CLASS__)->custom_result_object(__CLASS__);
    }
       function getPostByRayon($idRayon){
            return $this->db->where(array('Rayon_idRayon'=>$idRayon))->count_all_results(__CLASS__);
        }
       

        

    }