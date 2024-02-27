<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Livreor extends CI_Controller{
    const NB_COMMENT=15;
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper(array('url','assets'));
        $this->load->model('livreor_model','livreorManager');
    }

    public function index($g_nb_comment=1){
        $this->voir($g_nb_comment);
    }
    public function voir($g_nb_comment){
      $this->load->library('pagination');
      $data=array();
    
      $nb_comment_total=$this->livreorManager->count();
      if($g_nb_comment>1){
        // On verifie la coherence de la variable $_GET
        if($g_nb_comment <= $nb_comment_total){
            /**
             * s'il ya asset des commentaires dans la BD
             * alors la variable $_GET est valide
             */
            $nb_comment=intval($g_nb_comment);
        }else{
            //il n' y a pas asset des comments
            $nb_comment=1;
        }
      }else{
        $nb_comment=1; //la variable $_GET est erronee
      }

      //Mise en page de la pagination
      $this->pagination->initialize(array('base_url'=>base_url().'index.php/livreor/voir/',
                                        'total_row'=>$nb_comment_total,
                                        'per_page'=>self::NB_COMMENT));
        $data['pagination']=$this->pagination->create_links();
        $data['nb_commentaires']= $nb_comment_total;
        $data['messages']=$this->livreorManager->get_comments(self::NB_COMMENT,$nb_comment-1);
        $this->load->view('livreor/afficher_commentaires',$data);    

        
    }

    public function ecrire(){
        //La page qui permet d'ecrire les commentaires
    }

}