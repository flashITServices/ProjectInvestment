<?php

defined('BASEPATH') OR exit('No direct script access allowed');
use models\Entity\Utilisateur\Compte;

class Control extends CI_Controller {
	
	function ___construct()
	{
		parent:: __construct();
		$this->load->library('Grocery_CRUD');
		$this->load->helper(array('form', 'url'));
		$this->load->library('calendar'); // chargement des bibliotheques
		$this->load->model('userModel','userManager'); // chargement du modele et renomage
		$this->load->model('ArticleModel');
		$this->load->model('Entity/Catalogue/Rayon');

	}

	

	

	public function register(){
		$this->load->view('AdminPanel/pages-register');
	}

	public function contact(){
		if(!isset($_SESSION['username']))redirect();
		$this->load->view('AdminPanel/pages-contact');
	}

	public function login(){
		$this->load->view('AdminPanel/pages-login');
	}

	public function site(){
		$this->load->view('PsaroWebSite/index');
	}

	
	
	public function logout(){
		$this->session->sess_destroy();
		redirect();
	}

	
	public function home(){
		echo json_encode($_POST);
		echo json_encode("donnees recu avec success");
		
	}
	 	
	public function createAccount(){
		$this->load->library('form_validation'); //library de codeIgneter dont les fonctions servent a verifier les valeurs que les champs renvoient afin d'eviter le Hacking ou tout autre attaque
		
		
		/**
		 * form_validation->set_rules definissent les contraintes que tous champs ou inputs doivent
		 * imperativement remplir, dans le cas contraire une erreur est envoyée à l'Utilisateur en fonction
		 * du champ  input qui n'as pas rempli la condition
		 * set_rules prend 3 parametres, le nom du champs definit dans le formulaire avec l'attribut name, le nom 
		 * qui sera envoyé à l'utilisateur dans le message d'erreur et les regles ou conditions qu'un champ doit respecter
		 */
		
		$this->form_validation->set_rules('email','"Email"','trim|required|min_length[5]|max_length[52]|encode_php_tags|valid_email');
		$this->form_validation->set_rules('phone','"Phone"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		
		$this->form_validation->set_rules('username','"username"','trim|required|min_length[5]|max_length[52]|encode_php_tags|is_unique[compte.username]');
		$this->form_validation->set_rules('adresse','"Adresse"','trim|required|min_length[5]|max_length[200]|encode_php_tags');
		$this->form_validation->set_rules('password','"Password"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		//$this->form_validation->set_rules('username','"Username"','trim|required|min_length[5]|max_length[52]|encode_php_tags|is_unique[compte.username]'); 
		//$this->form_validation->set_rules('passConf','"Password"','trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|matches[mdp]');
	
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$username = $this->input->post('username');
		$adresse = $this->input->post('adresse');
		$password =sha1($this->input->post('password')); //cryptage du mot de pass
		$genre=$this->input->post('gender');
		$profession= $this->input->post('work');
		$state= $this->input->post('state');
		$city= $this->input->post('city');
		
		/**
		 * upload est une librarie qui est utilisee pour la gestion des fichiers qu'un User peut uploader sur le serveur
		 * afin d'eviter les eventuelles incidents, tout fini soumis doit passer un examen de regler
		 * il ne sera uploadé que s'il respecte les conditions, cela peut les photos de profiles ou images du catalogue en ligne
		 */
		$config['upload_path']          = './assets/vendorsAdmin/img/usersProfil/'; //le dossier où sera contenu les images
		$config['allowed_types']        = 'jpg|png|jpeg|webp'; //les extensions autorisées
		$config['max_size']             = 2048; //la taille maximale; dans notre cas c'est 2Mo
		$config['file_name']			=$username; //le nom qu'on soutaite donné au fichier afin d'éviter les confusions ou overwrites
		$picture='';
		$pathPhoto="assets/vendorsAdmin/img/usersProfil/ServiceProfile/user-properties.png";
		$this->load->library('upload', $config); // chargement de la bibliothe en fonction des conditions

		/**
		 * form_validation->run ne s'execute que si tous les inputs on remplis des conditions du set->rule
		 */
		if($this->form_validation->run()){ 

			if($this->upload->do_upload("profile")){ // le fonction qui copie de le fichier du User sur le serveur de l'applicatio
				$picture= $this->upload->data('full_path');
				$pathPhoto=substr($picture,30,100);
				//print_r(substr($picture,30,50));
			}else{
				$this->session->set_flashdata('upload',$this->upload->display_errors()); //les sessions nous aident garder les infos du User durant sa visite sur le site 
			}
			
			/**
			 * lorsqu'on cherche a excuter plusieurs SQL dans plusieurs tables à la fois, il est preferable de le faire dans une transaction
			 * le but de la transaction c'est que si une requete echoue, les autres requtes ne sauront pas prise en compte
			 * soit toute les reauetes sont executées avec success; soit aucune ne s'execute 
			 */
		    $this->db->trans_begin();
			$user=array('email' => $email,'telephone'=> $phone);
			$this->db->insert('Utilisateur',$user);
			$result= $this->db->select_max('idUtilisateur')->from('Utilisateur')->limit(1)->get();
			foreach ($result->result() as $row)
			{
				$idUser=(int) $row->idUtilisateur;
			}
			$account=array('username'=>$username,'password'=>$password,'statutLogin'=>1,'Utilisateur_idUtilisateur'=>$idUser);
			$this->db->insert('Compte',$account);
			$customer=array('prenom'=>$firstname,'nom'=>$lastname,'profession'=>$profession,'genre'=>$genre,'dateNaissance'=>$birthday,'adresses'=>$state.": ".$city.", ".$adresse,'photoProfile'=>$pathPhoto,'Utilisateur_idUtilisateur'=>$idUser);
			$this->db->insert('Client',$customer);
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
		   else{
			    $this->db->trans_commit();
			}
			$newdata = array(
				'username'  => $username,
				'firstname' =>$firstname,
				'lastname' => $lastname,
				'profession' =>$profession,
				'telephone' =>$phone,
				'email' =>$email,
				'dateNaissance' =>$birthday,
				'adresses' =>$state.": ".$city.", ".$adresse,
				'id_user'     => $idUser,
				'profile'	  => $pathPhoto,	
				'typeUser'	=> 'client',
				'logged_in' => TRUE,
			);               
			$this->session->set_userdata($newdata);	
			$json['status']=true;
			 //echo json_encode($json);
			$this->welcome();
		}else{
			 //Formulaire invalide ou vide
			 $this->register();
		}
	}

	public function sendEmail($email,$subject,$message){
		$config= Array('protocol'=>'smtp',
						'smtp_host'=>'ssl://smtp.googlemail.com',
						'smtp_port'=>465,
						'smtp_user'=>'marcelmusuyu9@gmail.com',
						'smtp_pass'=>'0326musuyu',
						'mailtype'=>'html',
						'charset'=>'iso-8859-1',
						'wordwrap'=>TRUE);
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('noreply');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send()){
			return true;
		}else{
			return false;
		}

	}

	public function loginAccess(){
			
		$this->load->library('form_validation');
		$this->load->model('Entity/Utilisateur/Compte');
		$this->load->model('Entity/Utilisateur/Utilisateur');
		$this->form_validation->set_rules('username','"Username"','trim|required|min_length[5]|max_length[52]|encode_php_tags', array('min_length[5]' => 'must least contain 5 caracters'));
		
		$this->form_validation->set_rules('password','"Password"','trim|required|min_length[5]|max_length[52]|encode_php_tags');
		$login = $this->input->post('username');
		$pass = $this->input->post('password');

		if(isset($login) && isset($pass)){
			$user=$this->Compte->getLogin($login,sha1($pass));
		}
	
		
		$typeUser='';
		
		
		//var_dump(hash_equals(hash('sha256','admin@ServiceMaintenance'),'7f1bc5e2ee40e551255b14d0710568ac8e2d24607f2f0c988c959c7281cc587f'));
		//var_dump(hash('sha256','7f1bc5e2ee40e551255b14d0710568ac8e2d24607f2f0c988c959c7281cc587f'));	
		if(isset($user[0]->Utilisateur_idUtilisateur)){
			$userId=(int) $user[0]->Utilisateur_idUtilisateur;
			$userPass= $user[0]->password;
		}else{
			 $this->session->set_flashdata('error', 'username/password incorrect');
			 $this->login();
		}
		 //recupere la cle etrangère associé au compte, pour recuperer le User concerné
		if(isset($login)){
			if(str_starts_with($login,'Service@')){ // la condition verifie si le login commmence par service@ afin de savoir si c'est un compte service ou client
				if(isset($userId)){
					$users=$this->Utilisateur->getServiceAccountById($userId); //on instantie un compte service si la condition reussie
					if($users[0]->codeService === 'service@psarolivraison'){
					$typeUser='livraison';
					}elseif($users[0]->codeService === 'service@psaroclient'){
						$typeUser='commande';
					}elseif($users[0]->codeService === 'service@psaromaintenance'){
						$typeUser='maintenance';
					}
				
				}else{
					 $this->session->set_flashdata('error', 'username/password incorrect');
			 		$this->login();
				}
				
				
			}
			elseif(isset($userId)){
				$users=$this->Utilisateur->getUserAccountById($userId); //on instantie un compte client si la condition echoue
				$typeUser='client';
			}
		if($this->form_validation->run()){
					
			if(!empty($user) && sha1($pass)=== $userPass){
				foreach($users as $user){
					if($typeUser==='client'){
						$newdata = array(
							'username'  => $user->username,
							'firstname' =>$user->prenom,
							'lastname' => $user->nom,
							'profession' =>$user->profession,
							'telephone' =>$user->getTelephone(),
							'email' =>$user->getEmail(),
							'dateNaissance' =>$user->dateNaissance,
							'adresses' =>$user->adresses,
							'id_user'     => $user->getIdUtilisateur(),
							'profile'	  => $user->photoProfile,	
							'typeUser'	  => $typeUser,		
							'logged_in' => TRUE,
							);
					}else{
						$newdata = array(
							'username'  => $user->username,
							'id_user'     => $user->getIdUtilisateur(),
							'telephone' => $user->getTelephone(),
							'nomService' => $user->nomService,
							'codeService' => $user->codeService,
							'company'	=>'HyperPsaro',
							'profile'	  => 'assets/vendorsAdmin/img/usersProfil/ServiceProfile/user.png',
							'email' => $user->getEmail(),
							'adresses' => 'SIEGE SOCIAL-RDC, Lubumbashi, N°17 Chaussées MZee Laurent Désiré Kabila- Provice du Haut Katanga',
							'typeUser'	  => $typeUser,		
							'logged_in' => TRUE,
							);
					}
					
				}               
				$this->session->set_userdata($newdata);	
				$this->welcome();
			   
			}else{
			 //Formulaire invalide ou vide
			 $this->session->set_flashdata('error', 'username/password incorrect');
			 $this->login();
			}
		
		}else{	
			$this->session->set_flashdata('error', 'username/password incorrect');
			
			$this->login();
		}
	}
}

	private function acceuil($data){
		if(!isset($_SESSION['username']))redirect();
		$this->load->view('AdminPanel/catalogue',$data);
	}
	public function welcome(){
		$this->load->view('AdminPanel/index');
	}

	public function catalogue(){
		if(!isset($_SESSION['username']))redirect();
		$this->load->model('ArticleModel','articles');
		$this->load->model('Entity/Catalogue/Rayon');
		$this->load->model('Entity/Catalogue/Article');
		$this->load->model('Entity/Catalogue/Categorie');
		$articles=$this->articles->getArticles();
		
		$data['articles']=$articles;
	
		$data['rayonsArticle']= $this->Rayon->getRayons();
		$categorie= $this->Categorie->getCategories();
		$data['categories']=$categorie;
		$this->acceuil($data);
	}


}
	