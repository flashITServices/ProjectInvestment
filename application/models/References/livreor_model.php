<?php
    class Livreor_model extends CI_Model{
        private $table = 'livreor_commentaires';
        public function add_comment($pseudo,$message){
            if(!is_string($pseudo) OR !is_string($message) OR empty($pseudo) OR empty($message)){
                return false;
            }
            return $this->db->set('pseudo',$pseudo)
                            ->set('message',$message)
                            ->set('dates','NOW()',false)
                            ->insert($this->table);
        }

        public function count(){
            return $this->db->count_all($this->table);
        }

        public function get_comments($nb,$debut=0){
           if(! is_integer($nb) OR $nb <1 OR ! is_integer($debut) OR $debut<0){
                return false;
           }
           return $this->db->select('id,pseudo,message,dates')
                            ->from($this->table)
                            ->order_by('id','desc')
                            ->limit($nb,$debut)
                            ->get()
                            ->result();

        }
    } 

?>