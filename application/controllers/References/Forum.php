<?php 
    
    class Forum extends CI_Controller{

        private $titre_defaut;

        public function __construct()
        {
            parent::__construct(); // constructeur de la classe mere toujours obligatoire si vous heriter une classe
            //$this->output->enable_profiler(TRUE); charge le profile de suivi des codes
            $this->load->helper('url'); // pour charger le helper des url
            $this->load->helper('assets');  // pour charger le helper definit manuellement Assets
            $this->load->library('table');
            $this->load->model('userModel','userManager'); // chargement du modele et renomage
           
            
        }


    

        public function index(){
            $this->load->model('Entity/Catalogue/Article');
            $this->load->model('Entity/Catalogue/Rayon');
            $articles=$this->Article->getArticleByRayon(1);
            $count=21;
            for($i=1;$i<=$count;$i++){
                $data['Article'.$i]=$this->Article->getArticleByRayon($i);
            }
          
            $data['count']=$count;
    
            $this->load->view('PsaroWebSite/index',$data);    
        }

        public function logIn(){
              
            $this->load->view('production/login');    
        }
      

        public function maintenance(){
            if($this->session->id_user){
                echo "ici c'est la maintenance !!!-->".$this->session->id_user;
            } 
           
        }

        //public function _remap($method){
           // show_404();}

        public function add(){
            $this->load->model('news_model','newsManager'); // chargement du modele et renomage
           // $this->load->model('passwordhashmodel','hashpassword');
            //$hashed = new PasswordHashModel(10, FALSE);
          
            //on lance une requete
           $resultat=$this->newsManager->ajouter_news("sharlock",'Legend of Halo','la legende des spartanes');
          
           $this->load->library('encryption');
           $key = bin2hex($this->encryption->create_key(16));

           $this->encryption->initialize(
            array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => $key
            ));
            $this->encryption->initialize(array('driver' => 'mcrypt'));

            // Switch back to the OpenSSL driver
            $this->encryption->initialize(array('driver' => 'openssl'));

            $plain_text = 'This is a plain-text message!';
            $ciphertext = $this->encryption->encrypt($plain_text);

            // Outputs: This is a plain-text message!
            echo $this->encryption->decrypt($ciphertext);

            //on inclut la vue
           var_dump($ciphertext);

        }

        public function update(){
            $this->load->model('news_model','newsManager'); // chargement du modele et renomage
           
            //on lance une requete
           $resultat=$this->newsManager->editer_news(3,'Legend of gods','la legende des dieux grecs');
            //on inclut la vue
           var_dump($resultat);

        }

        public function getAccount(){
            $this->load->model('news_model','newsManager'); // chargement du modele et renomage
           
            //on lance une requete
           $resultat=$this->newsManager->count(array('auteur'=>'Korra'));
            //on inclut la vue
            //force_download('assets/vendors/images/img2.jpg', NULL);
           var_dump($resultat);
        }

        public function getLogin($login,$pass){
          
          //on lance une requete
           $resultat=$this->userManager->getUser($login,$pass);;
            //on inclut la vue
           var_dump($resultat);
        }


        
        public function getObject(){
            $this->load->model('news_model','newsManager'); // chargement du modele et renomage
           
            //on lance une requete
           $resultat=$this->newsManager->obtenir_news(6);
           if($resultat!=null){
            var_dump($resultat);
           }else{
            $err=new ErrorException("object not existed", 404);
                show_error("News not found !!!",500,"Missed object");
           }
          
            //on inclut la vue
           
        }

        public function deconnexion(){
            $this->session->sess_destroy();
            redirect();
        }

        public function sendMail(){
           
            $this->load->library('email');
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('marcelmusuyu9@gmail.com','marcel musuyu');
            $this->email->to('18nm408@esisalama.org');
            $this->email->set_header("Reference","HK2546");
            $this->email->set_priority(1);
            $this->email->attach('assets/vendors/images/product-2.jpg');
            $this->email->subject('test sending mail');
            $this->email->message('good morning Sir we are happy to send you this message about sales');
            if( $this->email->send()){
                var_dump("Success send !!!");
            }else{
                var_dump("Failed sending");
            }
           
        }

        public function contacts(){
            if(!isset($_SESSION['username'])){
                redirect();
            }
             //on lance une requete
           $resultat=$this->userManager->get_Users();
           $data['user']=$resultat;
            $this->load->view('production/contacts',$data);
        }

        public function connexion(){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','"Username"','trim|required|min_length[5]|max_length[52]');
            $this->form_validation->set_rules('pass','"Password"','trim|required|min_length[3]|max_length[52]|encode_php_tags');
            //$this->form_validation->set_rules('passConf','"Password"','trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags|matches[mdp]');
            $login = $this->input->post('name');
		    $pass = $this->input->post('pass');
            

            if($this->form_validation->run()){
                
                //Connexion reussie
                $resultat=$this->userManager->getUser($login,$pass);
               
                if(count($resultat)>0){

                    $newdata = array(
                        'username'  => $resultat[0]->login,
                        'id_user'     => $resultat[0]->iduser,
                        'logged_in' => TRUE);               
                        $this->session->set_userdata($newdata);
                    $this->acceuil();                  
                }else{
                    $this->logIn();
                }

            }else{
                 //Formulaire invalide ou vide
                 $this->logIn();
            }
        }
    }