<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ArticleController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ArticleModel', 'articles');
        $this->load->model('Entity/Catalogue/Rayon');
        $this->load->model('Entity/Catalogue/Article');
        $this->load->model('Entity/Catalogue/Categorie');
    }

    public function addRayon()
    {
        $this->form_validation->set_rules('nomRayon', '"Designation"', 'trim|required|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('description', '"Description"', 'trim|required|min_length[10]|max_length[200]');
        if ($this->form_validation->run()) {
            $designation = $this->input->post('nomRayon');
            $date = $this->input->post('date');
            $description = $this->input->post('description');
            $rayon = new Rayon();
            $rayon->setDesignation($designation);
            $rayon->setDateAjour($date);
            $rayon->setDescription($description);

            if ($this->Rayon->addrayon($rayon)) {

                $this->session->set_flashdata('status', 'Rayon crée avec succès');

                echo json_encode(array("statut" => true, "message" => "Rayon crée avec succès"));
            } else {
                $this->session->set_flashdata('status', 'Echec création Rayon');

                echo json_encode(array("statut" => false, "message" => "Echec création Rayon"));
            }
        } else {
            $this->session->set_flashdata('status', 'Echec création Rayon');

            echo json_encode(array("statut" => false, "message" => "Echec création Rayon"));
        }
    }


    public function addCategorie()
    {
        $this->form_validation->set_rules('designation', '"Designation"', 'trim|required|min_length[5]|max_length[150]');

        if ($this->form_validation->run()) {
            $designation = $this->input->post('designation');
            $date = $this->input->post('date');
            $idRayon = $this->input->post('idRayon');

            $categorie = new Categorie();
            $categorie->setDesignation($designation);
            $categorie->setDateMiseAjour($date);
            $categorie->setRayonId($idRayon);
       
            if ($this->Categorie->addCategorie($categorie)) {

                $this->session->set_flashdata('status', 'Categorie crée avec succès');

                echo json_encode(array("statut" => true, "message" => "Categorie crée avec succès"));
            } else {
                $this->session->set_flashdata('status', 'Echec création Categorie');

                echo json_encode(array("statut" => false, "message" => "Echec création Categorie"));
            }
        } else {
            $this->session->set_flashdata('status', 'Echec création Categorie');

            echo json_encode(array("statut" => false, "message" => "Echec création Categorie"));
        }
    }
    public function detailArticle($id)
    {

        $article = $this->Article->getArticleById($id);
        $others = $this->Article->getArticlesByName(substr($article[0]->getDesignation(), 1, 5));

        $rayonid = (int) $article[0]->getIdRayon();


        if (!empty($this->Rayon->getRayonById($rayonid))) {
            $rayons = $this->Rayon->getRayonById($rayonid);
        }
        $idArticle = (int) $article[0]->getIdArticle();
        $des = $this->Categorie->getDescription(53);
        $description = $des[0]->descriptionArticle;
        $data['article'] = $article;
        $data['rayonArticle'] = $rayons[0]->getDesignations();
        $data['others'] = $others;
        $data['description'] = $description;
        $this->load->view('PsaroWebSite/product', $data);
    }

    public function getArticle()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('product', '"Article saisit"', 'trim|min_length[3]|max_length[52]|encode_php_tags|alpha_numeric_spaces');
        $articles = [];
        $idRayon = (int) $this->input->post('rayonID');
        if ($this->form_validation->run()) {

            $productName = $this->input->post('product');

            $articles = $this->Article->getPostByName($idRayon, $productName);
        }

        $data['articles'] = $articles;
        $this->load->view('PsaroWebSite/store', $data);
    }


    public function store(){
          if (!isset($_SESSION['username'])) {
            redirect();
        }
          $data['postes'] =$this->Article->getStore();
        $this->load->view('AdminPanel/NosArticles',$data);
    }
    public function editerArticle($id)
    {
        if (!isset($_SESSION['username'])) {
            redirect();
        }

        $article = $this->Article->getArticleById($id);

        $rayonid = (int) $article[0]->getIdRayon();

        if (!empty($this->Rayon->getRayonById($rayonid))) {
            $rayons = $this->Rayon->getRayonById($rayonid);
        }

        $data['article'] = $article;
        $data['rayonsArt'] = $rayons[0]->getDesignations();
        $data['rayonsSelect'] = $this->Rayon->getRayons();

        $this->load->view('AdminPanel/editArticle', $data);
    }

    public function edit()
    {
        if (!isset($_SESSION['username'])) {
            redirect();
        }
        $this->load->view('AdminPanel/editArticle');
    }
    public function createArticle()
    {
        if (!isset($_SESSION['username'])) {
            redirect();
        }
        $data['Rayon'] = $this->Rayon->getRayons();
        $data['Categorie'] = $this->Categorie->getCategories();

        $this->load->view('AdminPanel/createArticle', $data);
    }

    public function updateArticle($id)
    {
        $this->form_validation->set_rules('designation', '"Designation"', 'trim|required|min_length[4]|max_length[52]');
        $this->form_validation->set_rules('quantite', '"Quantite"', 'trim|required|integer');
        $this->form_validation->set_rules('unite', '"Unite de mesure"', 'trim|required|min_length[3]|max_length[52]');
        $this->form_validation->set_rules('prix', '"Prix Article"', 'trim|required');

        $this->form_validation->set_rules('devise', '"Devise"', 'trim|required|min_length[2]|max_length[52]');

        $designation = $this->input->post('designation');
        $quantite = $this->input->post('quantite');
        $unite = $this->input->post('unite');
        $prix = $this->input->post('prix');
        $devise = $this->input->post('devise');
        $date = $this->input->post('date');
        $categorie = $this->input->post('categorie');
        $rayon = $this->input->post('rayon');
        $config['upload_path'] = './assets/vendors/img/Articles/';


        if (str_starts_with($rayon, "appareils-ménagers")) {
            $config['upload_path']          = './assets/vendors/img/Articles/appareils-menagers';
        } elseif (str_starts_with($rayon, "Boissons")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Boissons';
        } elseif (str_starts_with($rayon, "Boulangerie")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Boulangerie';
        } elseif (str_starts_with($rayon, "Fruit")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Fruits';
        } elseif (str_starts_with($rayon, "Super")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Divers';
        } elseif (str_starts_with($rayon, "Alimentation Fine")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Fines';
        } elseif (str_starts_with($rayon, "Poissons")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Poissons';
        } elseif (str_starts_with($rayon, "Boucherie")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Viandes';
        } elseif (str_starts_with($rayon, "Repas Chaud")) {
            $config['upload_path']          = './assets/vendors/img/Articles/RepasChauds';
        } elseif (str_starts_with($rayon, "Legume")) {
            $config['upload_path']          = './assets/vendors/img/Articles/Legumes';
        }elseif (str_starts_with($rayon, "Cosmetiques et Super deal")) {
            $config['upload_path']          = './assets/vendors/img/Articles/cosmetiques';
        }

        //le dossier où sera contenu les images
        $config['allowed_types']        = 'jpg|png|jpeg|webp'; //les extensions autorisées
        $config['max_size']             = 2048; //la taille maximale; dans notre cas c'est 2Mo
        $config['file_name']            = $designation; //le nom qu'on soutaite donné au fichier afin d'éviter les confusions ou overwrites

        $this->load->library('upload', $config); // chargement de la bibliothe en fonction des conditions
        $picture = '';
        $pathPhoto = '';
        $image = substr($this->input->post('imageFile'), 31, 100);

        /**
         * form_validation->run ne s'execute que si tous les inputs on remplis des conditions du set->rule
         */
        if ($this->form_validation->run()) {
            if ($this->upload->do_upload("image")) { // le fonction qui copie de le fichier du User sur le serveur de l'applicatio
                $picture = $this->upload->data('full_path');
                $pathPhoto = substr($picture, 30, 100);
            } else {
                $pathPhoto = $image;
                $this->session->set_flashdata('upload', $this->upload->display_errors() . ' keep old one'); //les sessions nous aident garder les infos du User durant sa visite sur le site 
            }
            $article = array('designation' => $designation, 'quantiteEnVente' => $quantite, 'Unites' => $unite, 'prix' => $prix, 'devise' => $devise, 'dateAjout' => $date, 'categorie' => $categorie, 'imageArticle' => $pathPhoto, 'createdBy' => 'Service maintenance');

            if ($this->Article->updateArticle($id, $article)) {
                $this->session->set_flashdata('status', 'Article Mis à jour avec succes');
                // redirect(base_url('Catalogue/rayon'));
                echo json_encode(array("statut" => true, "message" => "Article mis à jour avec success"));
            } else {
                $this->session->set_flashdata('status', 'Echec de mise à jour');
                $this->editerArticle($id);
                //redirect(base_url('Catalogue/rayon'));
                echo json_encode(array("statut" => false, "message" => "Echec de la mise à jour"));
            }
        } else {
            redirect(base_url('Catalogue/rayon'));
        }
    }


    public function getArticleByRayonID($id)
    {
        $articles = $this->Article->getPostByName($id);
        $balide = '';
        foreach ($articles as $article) {
            $balide = '<div class="col-md-4 col-xs-6">
        <div class="product" id="productChild">
            <div class="product-img">
                <img style="width: 270px;height:270px" src="' . base_url($article->getImageArticle()) . '" alt="">
                <div class="product-label">
                    <span class="sale">-30%</span>
                    <span class="new">NEW</span>
                </div>
            </div>
            <div class="product-body">
                <p class="product-category">' . $article->getCategorie() . '</p>
                <h3 class="product-name"><a href="#">' . $article->getDesignation() . '</a></h3>
                <h4 class="product-price">' . $article->getDevise() . '&emsp14;' . $article->getPrix() . '<del class="product-old-price">' . $article->getPrix() + (0.05 * $article->getPrix()) . '</del></h4>
                <h4 class="product-price">' . $article->getQuantiteEnVente() . '&emsp14;' . $article->getUnites() . ' &emsp14;</del></h4>
                <div class="product-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                    <button class="quick-view"><a class="add" href="' . base_url("Article/details/" . $article->getIdArticle()) . '"><i class="fa fa-eye"></i></a><span class="tooltipp">quick view</span></button>
                </div>
            </div>
            <div class="add-to-cart">
            <a class="add addPanier" href="' . site_url("LignePanier/addPanier") . '?id=' . $article->getIdArticle() . '"><button class="add-to-cart-btn panier" ><i class="fa fa-shopping-cart"></i> add to cart</button></a>
            </div>
        </div>
    </div>';
            echo $balide;
        }
    }

    public function delete($id)
    {
        if (!isset($_SESSION['username'])) {
            redirect();
        }
        if ($this->Article->deleteArticle($id)) {
            $this->session->set_flashdata('status', 'Data Deleted Successfully');
        } else {
            $this->session->set_flashdata('status', 'Failed to delete data');
        }
    }

    public function add()
    {
        if (!isset($_SESSION['username'])) {
            redirect();
        }
        $this->load->library('form_validation'); //library de codeIgneter dont les fonctions servent a verifier les valeurs que les champs renvoient afin d'eviter le Hacking ou tout autre attaque

        $this->form_validation->set_rules('designation', '"Designation"', 'trim|required|min_length[4]|max_length[52]');
        $this->form_validation->set_rules('quantite', '"Quantite"', 'trim|required|integer');
        $this->form_validation->set_rules('unite', '"Unite de mesure"', 'trim|required|min_length[3]|max_length[52]');
        $this->form_validation->set_rules('prix', '"Prix Article"', 'trim|required');

        $this->form_validation->set_rules('devise', '"Devise"', 'trim|required|min_length[2]|max_length[52]');

        $designation = $this->input->post('designation');
        $quantite = $this->input->post('quantite');
        $unite = $this->input->post('unite');
        $prix = $this->input->post('prix');
        $devise = $this->input->post('devise');
        $date = $this->input->post('date');
        $categorie = $this->input->post('categorie');
        $rayonId = (int) $this->input->post('rayon');
        $rayon = $this->Rayon->getRayonById($rayonId);
        if (str_starts_with($rayon[0]->getDesignations(), 'appareils-ménagers')) {
            $config['upload_path']          = './assets/vendors/img/Articles/appareils-menagers';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Boissons')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Boissons';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Boulangerie')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Boulangerie';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Fruit')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Fruits';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Alimentation Fine')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Fines';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Super')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Divers';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Poissons')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Poissons';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Boucherie')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Viandes';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Repas Chaud')) {
            $config['upload_path']          = './assets/vendors/img/Articles/RepasChauds';
        } elseif (str_starts_with($rayon[0]->getDesignations(), 'Legume')) {
            $config['upload_path']          = './assets/vendors/img/Articles/Legumes';
        }elseif (str_starts_with($rayon, "Cosmetiques et Super deal")) {
            $config['upload_path']          = './assets/vendors/img/Articles/cosmetiques';
        }

        //le dossier où sera contenu les images
        $config['allowed_types']        = 'jpg|png|jpeg|webp'; //les extensions autorisées
        $config['max_size']             = 2048; //la taille maximale; dans notre cas c'est 2Mo
        $config['file_name']            = $designation; //le nom qu'on soutaite donné au fichier afin d'éviter les confusions ou overwrites

        $this->load->library('upload', $config); // chargement de la bibliothe en fonction des conditions
        $picture = '';
        $pathPhoto = '';

        /**
         * form_validation->run ne s'execute que si tous les inputs on remplis des conditions du set->rule
         */
        if ($this->form_validation->run()) {
            if ($this->upload->do_upload("image")) { // le fonction qui copie de le fichier du User sur le serveur de l'applicatio
                $picture = $this->upload->data('full_path');
                $pathPhoto = substr($picture, 30, 100);
            } else {
                $this->session->set_flashdata('upload', $this->upload->display_errors()); //les sessions nous aident garder les infos du User durant sa visite sur le site 
            }

            $article = array('designation' => $designation, 'quantiteEnVente' => $quantite, 'Unites' => $unite, 'prix' => $prix, 'devise' => $devise, 'dateAjout' => $date, 'categorie' => $categorie, 'Rayon_idRayon' => $rayonId, 'imageArticle' => $pathPhoto, 'createdBy' => 'Service maintenance');

            if ($this->articles->addArticle($article)) {
                $this->session->set_flashdata('status', 'Article crée avec succes');
                echo json_encode(array("statut" => true, "message" => "Article crée avec success"));
                //redirect(base_url('Catalogue/rayon'));
            } else {
                $this->session->set_flashdata('status', 'Echec de création');
                //redirect(base_url('Catalogue/rayon'));
                echo json_encode(array("statut" => false, "message" => "Echec création"));
            }
        } else {
            $this->session->set_flashdata('status', 'Echec de création');
            redirect(base_url('Catalogue/rayon'));
        }
    }
}