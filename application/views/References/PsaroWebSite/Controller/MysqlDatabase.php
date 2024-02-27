<?php 
    namespace Database;

use PDO;

    class MysqlDatabase {
        private $db_name;
        private $db_user;
        private $db_pass;
        private $db_host;
        private $pdo;
        public function __construct($db_name,$db_user='root',$db_pass='',$db_host='localhost'){
            $this->db_name=$db_name;
            $this->db_user=$db_user;
            $this->db_pass=$db_pass;
            $this->db_host=$db_host;
        }
        private function getPDO(){
            if($this->pdo== null){
                //unitialise l'object PDO une fois seulement s'il est nul sinon il renvoi l'objet deja unitialise
                $pdo=new PDO('mysql:dbname=hyperpsaro;host=localhost','root','');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo=$pdo;
            }
           
            return $this->pdo; 
        }

        public function query($statement,$class_name=null,$one=false){
            $result=$this->getPDO()->query($statement);
            if(strpos($statement,'UPDATE')=== 0 || strpos($statement,'INSERT')=== 0 || strpos($statement,'UPDATE')=== 0){
                // la fonction strpos, renvoi true si le deuxieme param est contenu dans le premier param à la position initiate
                // dans la condition on verifie si la requete correspond à ces 3 operations, on renvoi seulement le resultat de l'opération
                return $result;
            }
            if($class_name === null){
                $result->setFetchMode(PDO::FETCH_OBJ);
            }else{
                $result->setFetchMode(PDO::FETCH_CLASS,$class_name);
            }         
            if($one){
                $data=$result->fetch();
            }else{
                $data=$result->fetchAll();
            }
            return $data;
        }

        public function prepare($statement,$attributes,$class_name=null,$one=false){
            $req=$this->getPDO()->prepare($statement);
            $res=$req->execute($attributes);
            if(strpos($statement,'UPDATE')=== 0 || strpos($statement,'INSERT')=== 0 || strpos($statement,'UPDATE')=== 0){
                // la fonction strpos, renvoi true si le deuxieme param est contenu dans le premier param à la position initiate
                // dans la condition on verifie si la requete correspond à ces 3 operations, on renvoi seulement le resultat de l'opération
                return $res;
            }
            if($class_name === null){
                $req->setFetchMode(PDO::FETCH_OBJ);
            }      
            if($one){
                $data=$req->fetch();
            }else{
                $data=$req->fetchAll();
            }
            return $data;
        }

        public function lastInsertId(){
            return $this->getPDO()->lastInsertId(); // lastInsertId une fonction inclue de PDO qui retourne l'ID du denier enregistrement
        }

    }

    //$count=$pdo->exec('INSERT INTO articles SET titre="MonTitre",date="'.date('Y-m-d H:i:s'). '"' );

  
   
?>