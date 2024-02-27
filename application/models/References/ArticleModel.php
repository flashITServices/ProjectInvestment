<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class ArticleModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library('calendar');
    }
  
    public function getArticles(){
        return $this->db->select('*')
        ->from('article')
        ->order_by('idArticle','DESC')
        ->get()
        ->result();
    }
    public function getArticleByID($id){
        return $this->db->select('*')
        ->from('article')
        ->where('idArticle',$id)
        
        ->limit(1)
        ->get()
        ->result_object();
    }

    public function addArticle($article){
        if($this->db->insert('Article',$article)){
            return true;
        }else{
            return false;
        }
    }
    
  
}