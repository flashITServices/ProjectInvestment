<?php 
        require_once('Service.php');
        class ServiceClient extends Service{
        public function autoriserLivraison($id){
            
        }
        public function refuserLivraison($id){
            
        }
        public function consulterPaiement($id){
            
        }
        public function getPaiments(){
            
        }
        public function getPaiment($id){
            
        }

        public function getSum(){
            return $this->db->select_sum('montant')->get('commande')->result_object()[0]->montant;
        }
         public function getAvg(){
            return $this->db->select_avg('montant')->get('commande')->result_object()[0]->montant;
        }

         public function getMin(){
            return $this->db->select_min('montant')->get('commande')->result_object()[0]->montant;
        }
         public function getMax(){
            return $this->db->select_max('montant')->get('commande')->result_object()[0]->montant;
        }

        function count(){
            return $this->db->count_all('commande');
        }
        function countByDate($date){
            return $this->db->where(array('date'=>$date))->count_all_results('commande');
        }
        function countByMonth($month){
            return $this->db->where(array('month(date)'=>$month))->count_all_results('commande');
        }

        function countByDelivery($id){
            return $this->db->where(array('Livraison_idLivraison'=>$id))->count_all_results('commande');
        }

        function countOrderDelivered(){
            return $this->db->where(array('Autorisation'=>true))->count_all_results('commande');
        }

        function countOrderNotDelivered(){
            return $this->db->where(array('Autorisation'=>false))->count_all_results('commande');
        }

        public function getOrderByDate(){
            $this->db->group_by(array("montant"))->order_by('date','DESC');
              $this->db->join('Client', 'commande.Client_idClient = Client.idClient');
            
           return $this->db->get('commande')->result_object(); 
        }

     

    }