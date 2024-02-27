<?php
namespace Controller;
require('Database.php');
require('Tables.php');

use Database\Database;
use Model\Article;

class Controller{
    
    public static function getData($categorie){
        $data=Database::getInstance();
        $table=new \Table\Tables($data);
        $result=$table->findBycategorie($categorie);
        return $result;

    }
}