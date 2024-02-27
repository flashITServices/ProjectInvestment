<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Model{
    public function getByEtat(){
            //return $this->db->select('equipementBonEtat, equipementMoyenEtat, equipementMauvaisEtat')->get("jeux")->result();   
            $query = $this->db->select_sum('coursBas')
            ->select_sum('coursHaut')
            ->select_sum('coursOuverture')
            ->get('marcheboursier');
            
            return $query->result_array();
        }
}