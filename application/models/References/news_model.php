<?php 

 if(!defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model{

    protected $table='news';
    
    /**
     * Ajouter news
     * @param String $auteur L'auteur de la news
     * @param String $titre Le titre de la news
     * @param String $contenu Le contenu de la news
     * @param bool le resultat de la requete
     */
    
     public function ajouter_news($auteur,$titre,$contenu){

        //ces donnees seront automatiquement echappees

        $this->db->set('auteur',$auteur);
        $this->db->set('titre',$titre);
        $this->db->set('contenu',$contenu);

        //ces donnees ne seront pas echappees

        $this->db->set('date_ajout','NOW()',false);
        $this->db->set('date_modif','NOW()',false);

        //requete d'insertion
        return $this->db->insert($this->table);
     }

     /**
      * Editer news existantes
        *@param integer $id L'id du news à modifier
        * @param String $titre Le titre de la news
        * @param String $contenu Le contenu de la news
        * @param bool le resultat de la requete
      */

      public function editer_news($id,$titre=null,$contenu=null){
        //il n'y a rien a editer
        if($titre == null AND $contenu == null){
            return false;
        } 
        //donnees seront echappees
        if($titre != null){
            $this->db->set('titre',$titre);
        }
        if($contenu != null){
            $this->db->set('contenu',$contenu);
        }
          //ces donnees ne seront pas echappees
          $this->db->set('date_modif','NOW()',false);

          //la condition
          $this->db->where('id', (int)$id);
          return $this->db->update($this->table);
      }

      /**
       * Supprimer news
       * @param integer $id L'id du news à supprimer
        * @param bool le resultat de la requete
       */

       public function supprimer_news($id){
       
        return  $this->db->where('id', (int)$id)
                    ->delete($this->table);
       }

       /**
       * Supprimer news
       * @param integer $id L'id du news à recuperer
        * @param array le resultat de la requete
       */

      public function obtenir_news($id){
       
        return  $this->db->select('*')
                    ->from($this->table)
                    ->where('id', (int)$id)
                    ->limit(1)
                    ->get()
                    ->result();
       }

       /**
        *  Retourne les nombres de news
            * @param array tableau associatif permettant de definir les conditions
            * @param integer le resultat de la requete
        */
        public function count($where=array()){
            return (int) $this->db->where($where)
            ->count_all_results($this->table);
        }

        /**
         * Retourne la liste de news de n dernieres news
         * @param integer $nb nombre des news
         * @param integer $debut Nombre des news a sauter
         * @return object la liste de news
         */
        public function liste_news($nb=10,$debut=0){
           return $this->db->select('*')
                        ->from($this->table)
                        ->limit($nb,$debut)
                        ->order_by('id','desc')
                        ->get()
                        ->result();
        }

}