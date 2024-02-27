<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
class Panier extends CI_Model{
    public function __construct(){
        parent::__construct();
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){ //la durée de vie d'un panier est fonction de la durée de vie de la session de l'utilisateur
            $_SESSION['panier']=array(); //si l'utlisateur se deconnecte du site, le panier sera detruit en meme temp que la session
        }
        if(isset($_POST['panier']['quantity'])){
            $this->recalculer();
        }
       
    }

    /**
     * la fonction recalculer, parcour les articles de la session associé au panier, 
     * recupere les nouvelles quantités du champ input dont le name correspond à Panier['quantite'][$product->idArticle]
     * repasse ces nouvelles quantités à la session pour etre recalculées
     */
    public function recalculer(){
        foreach($_SESSION['panier'] as $product_id=>$quantity){
            if(isset($_POST['panier']['quantity'][$product_id])){
                $_SESSION['panier'][$product_id]=$_POST['panier']['quantity'][$product_id];
            }
        }   
    }

    /** La fonction Add, lorsqu'on click sur le bouton AddPanier, recupere l'ID de l'article
     * et l'ajout à la session, si cette id existe deja dans la session, il incremente sa valeur
     *@param mixed $product_id
     *@return void
     */
    public static function add($product_id){
        if(isset( $_SESSION['panier'][$product_id])){
            $_SESSION['panier'][$product_id]++; //si id existe deja dans le panier, et que l'on cliquer sur plusieurs fois sur le meme produit
                                                //cela va incrementer sa valeur en session
        }else{
            $_SESSION['panier'][$product_id]=1;
        }
     
    }

    /** la fonction delete supprime un produit de la session, lorsque l'utilisateur retire un produit
     * @param mixed $product_id
     * 
     */
    public static function deletePost($product_id){
        unset($_SESSION['panier'][$product_id]);
    }

    /** getData renvoi les articles de la base de données dont les id correspondent  aux clés qui sont en session
     * @param mixed $keys
     */
   public function getData($keys){
    $this->db->select('*')
    ->from('article')
    ->where_in('idArticle',$keys)
    ->get()
    ->result();
   }

   /**
    * la foncion count, calcule la quantié des articles qui sont en session
    */
   public function count(){
     return array_sum($_SESSION['panier']);
   }

   /**
    * la fonction total renvoi la somme totale des articles en fonction de la quantite
    */
   public function total(){
        $total =0;
        $ids=array_keys($_SESSION['panier']);
        if(empty($ids)){
            $products=array();
        }else{
            $products= $this->db->select('*')->from('Article')->where_in('idArticle',$ids)->get()->result();
        }
        foreach($products as $product){
            $total +=$_SESSION['panier'][$product->idArticle]*$product->prix;
        }
     return $total;
        
   }

}