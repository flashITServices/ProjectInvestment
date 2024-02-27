<?php 
    class ServiceController extends CI_Controller{
         public function __construct(){
            parent::__construct();
            $this->load->model('Entity/Utilisateur/Agent');
            	$this->load->library('form_validation'); //library de codeIgneter dont les fonctions servent a verifier les valeurs que les champs renvoient afin d'eviter le Hacking ou tout autre attaque

        }

        public function manageAgents(){
            $this->load->view('AdminPanel/createAgent');
        }
        public function addAgent(){
             

        $this->form_validation->set_rules('firstname','"Firstname"','trim|required|min_length[3]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('lastname','"Lastname"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('email','"Email"','trim|required|min_length[5]|max_length[52]|encode_php_tags|valid_email');
		$this->form_validation->set_rules('phone','"Phone"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('matricule','"Matricule"','trim|required|min_length[5]|max_length[52]|encode_php_tags|is_unique[agent.matricule]');
	    $this->form_validation->set_rules('codeService','"Code Service"','trim|required|min_length[3]|max_length[70]|encode_php_tags');
		$this->form_validation->set_rules('adresse','"Adresse"','trim|required|min_length[5]|max_length[200]|encode_php_tags');
        $this->form_validation->set_rules('fonction','"Profession"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$this->form_validation->set_rules('nomService','"Nom Service"','trim|required|min_length[5]|max_length[100]|encode_php_tags');
		
        if($this->form_validation->run()){ 
            $firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$username = $this->input->post('matricule');
		$adresse = $this->input->post('adresse');
        $codeService=$this->input->post('codeService');
      
		$password =sha1($codeService); //cryptage du mot de pass
     
		$genre=$this->input->post('gender');
		$profession= $this->input->post('fonction');
        $date=$this->input->post('recrutement');
        $nomService=$this->input->post('nomService');

              $this->db->trans_begin();
			$user=array('email' => $email,'telephone'=> $phone);
			$this->db->insert('Utilisateur',$user);
			$result= $this->db->select_max('idUtilisateur')->from('Utilisateur')->limit(1)->get();
			foreach ($result->result() as $row)
			{
				$idUser=(int) $row->idUtilisateur;
			}
			$account=array('username'=>$username,'password'=>$password,'statutLogin'=>0,'Utilisateur_idUtilisateur'=>$idUser);
			$this->db->insert('Compte',$account);
            $agent=new Agent();
            $agent->setEmail($email);
            $agent->setDateRecrutement($date);
            $agent->setFonction($profession);
            $agent->setService($nomService);
            $agent->setMatricule($username);
            $agent->setAdresse($adresse);
            $agent->setNom($lastname);
            $agent->setPrenomAgent($firstname);
            $agent->setTelephone($phone);
            $agent->setCodeService($codeService);
            $agent->setGenre($genre);
            if(isset($idUser)){
                 $agent->setIdUser($idUser);
            }
            $this->Agent->addAgent($agent);
           
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
                  echo json_encode(array('statut'=>false));
			}
		   else{
			    $this->db->trans_commit();
                 echo json_encode(array('statut'=>true));
			}
           
            
           
        }else{
              echo json_encode(array('statut'=>false));
        }
		
           

        }

    }