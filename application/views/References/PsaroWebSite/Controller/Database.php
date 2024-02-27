<?php
    namespace Database;
    require_once('MysqlDatabase.php');

use PDO;

    class Database extends \Database\MysqlDatabase{
        private $dbName;
        private $user;
        private $password;
        private $host;
        private $pdo;

        private static $_instance=null;

        public function getPDO(){
            if($this->pdo==null){
                $pdo=new PDO('mysql:dbname=hyperpsaro;host=localhost','root','');
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $this->pdo=$pdo;
            }
            return $this->pdo;
        }

        public function __construct($dbName='hyperpsaro',$user='root',$password='root',$host="localhost"){
            $this->dbName=$dbName;
            $this->user=$user;
            $this->password=$password;
            $this->host=$host;
        }

        /** function initialise et retourne l'instance de la classe
         * @return Database
         */
        public static function getInstance(){
            if(is_null(self::$_instance)){
                self::$_instance=new Database();
            }
            return self::$_instance;
        }

    }