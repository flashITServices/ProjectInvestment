<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['home']='HomeController/index';
$route['Control/edit/(:any)']='FormController/editer/$1';
$route['user/create']='Control/home';
$route['user/login']='Control/login';
$route['user/home']='Control/loginAccess';
$route['user/userLogout']='Control/logout';
$route['panier/update']='LignePanier/update';
$route['panier/delete/(:any)']='LignePanier/delete/$1';
$route['site/acceuil']='Control/site';

$route['article/create']='ArticleController/add';

$route['Control/update/(:any)']='FormController/actualiser/$1';
$route['Control/delete/(:any)']='FormController/effacer/$1';
$route['Control/confirmdelete/(:any)']['DELETE']='FormController/effacer/$1';

$route['article/edit/(:any)']='ArticleController/editerArticle/$1';
$route['Article/edit'] ='ArticleController/edit';
$route['Article/create'] ='ArticleController/createArticle';
$route['rayon/create'] ='ArticleController/addRayon';
$route['categorie/create'] ='ArticleController/addCategorie';
$route['article/update/(:any)']='ArticleController/updateArticle/$1';
$route['Article/delete/(:any)']['DELETE'] ='ArticleController/delete/$1';
$route['Article/details/(:any)']='ArticleController/detailArticle/$1';
$route['Article/ProduitsMarche'] ='ArticleController/store';


$route['Catalogue/Createrayon'] ='ArticleController/createArticle';


$route['article/getArticleRayon/(:any)']='ArticleController/getArticleByRayonID/$1';

$route['Article/getArticle']= 'ArticleController/getArticle';
$route['user/profile']='UsersController/profile';
$route['user/update/(:any)']='UsersController/updateUser/$1';

$route['Catalogue/rayon']= 'Control/Catalogue';
$route['Livraison/Livreurs']= 'LivraisonController/getLivreurs';
$route['Meteo/Journalier']= 'LivraisonController/getMeteo';

$route['Facture/getFacture']= 'FacturationController/getFacture';
$route['Facture/getFactureClient/(:any)']= 'FacturationController/getFactureClient/$1';
$route['Facture/addFacture']= 'FacturationController/addFacture';
$route['Facture/viewFacture/(:any)']= 'FacturationController/view/$1';
$route['Facture/getPrix/(:any)']='FacturationController/getPricePostID/$1';
$route['Commande/getCommandes']= 'CommandeController/getOrder';
$route['Commande/getCommandesClient/(:any)']= 'CommandeController/getOrderCustomer/$1';
$route['EtatFinancier/TransactionClient/(:any)']= 'PaiementController/getPaiementClient/$1';
$route['Paiement/getPaimentClient/(:any)']= 'PaiementController/getCustomerPayment/$1';



$route['Grant/Order']='CommandeController/commander';
$route['Order/Granted/(:any)']='CommandeController/autoriser/$1';

$route['Grant/Deliver/(:any)']='LivraisonController/associer/$1';


$route['Commandes/States']= 'StatistiqueController/getOrderState';
$route['Overall/States']= 'StatistiqueController/getPaymentState';


$route['user/Agents'] = 'ServiceController/manageAgents';
$route['Agent/CreateAgent'] = 'ServiceController/addAgent';

$route['User/questions'] = 'UsersController/getQuestions';
$route['User/contacts'] = 'UsersController/getContacts';

$route['Order/viewOrder/(:any)']= 'CommandeController/view/$1';
//$route['Order/viewOrderByCustomer/(:any)']= 'CommandeController/viewByCustomer/$1';

$route['Livraison/States']= 'StatistiqueController/getDeleveryState';
$route['Livraison/CustomersDelivery']= 'LivraisonController/getDelevery';

$route['Google/Oauth']= 'OAuthController/index';
$route['Google/Oauth/redirect']= 'Controllers/OAuthController/redirect';

$route['Paiement/getPaiements']= 'CommandeController/getPayment';
$route['Client/getClients']= 'CommandeController/getCustomer';