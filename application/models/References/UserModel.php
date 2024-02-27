<?php 

 if(!defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model{
    
    protected $table='user';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_Users(){
        $query= $this->db->query("SELECT * FROM user ORDER BY login ASC");
        return  $query;
    }

    public function get_IT(){
        $query= $this->db->query("SELECT DISTINCT technicien FROM intervention ORDER BY technicien ASC");
        return  $query;
    }

    public function get_Tickets(){
        $query= $this->db->query("SELECT * FROM ticket ORDER BY date_creation ASC");
        return  $query;
    }

    public function getUser($login,$pass){
        return $this->db->select('iduser,login,pass')
                ->from('user')
                ->where('pass',$pass,'login',$login)
                ->limit(1)
                ->get()
                ->result();
    }

    public function insertTicket($data){
        return $this->db->insert('ticket',$data);
    }

    public function getTicketById($id){
        $query=$this->db->get_where('ticket',['id_ticket'=>$id]);
        return $query->row();
    }

    public function updateTicket($data,$id){
        return $this->db->update('ticket',$data,['id_ticket'=>$id]);
    }
    public function deleteTicket($id){
        return $this->db->delete('ticket',['id_ticket'=>$id]);
    }

}