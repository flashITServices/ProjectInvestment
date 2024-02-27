<?php 
    namespace Table;
    use Database\MysqlDatabase; 
    class Tables{
        protected $table;

        protected $db;
                            //Injection des dependances
        public function __construct(MysqlDatabase $db){
            $this->db=$db; // on Instatie l'objet database depuis le constructeur
            if(is_null($this->table)){
                $parts = explode('\\',get_class($this));
                $class_name= end($parts);
                $this->table= strtolower(str_replace('Table','',$class_name).'s');
            }
        }

        public function all(){
            return $this->query('SELECT * FROM '.$this->table);
        }

        public function query($statement,$attributes=null,$one=false){
            if($attributes){
                return $this->db->prepare($statement,$attributes,str_replace('Table','Entity',get_class($this)),$one);
            }else{
                return $this->db->query($statement,str_replace('Table','Entity',get_class($this)),$one);
            }
        }

        public function find($id){
            return $this->query("SELECT * FROM {$this->table} WHERE id= ?", [$id],true);
        }

        public function findBycategorie($categorie){
            return $this->query("SELECT * FROM article WHERE categorie= ?", [$categorie]);
        }


        /**
         * recupere un enregistrement qu'elle renvoi sous forme d'une liste
         *
         * @param [type] $key
         * @param [type] $value
         * @return array
         */
        public function liste($key,$value){
            $records= $this->all();
            $returns=[];
            foreach($records as $v){
                $returns[$v->$key]=[$v->$value];
            }
            return $returns;
        }

        public function update($id,$fields){
            $sql_parts=  [];
            $attributes=[];
            foreach($fields as $key=> $val){
                $sql_parts[]="$key = ?";
                $attributes[]= "$val";
            }
            $attributes[]=$id;
            $sql_part=implode(',',$sql_parts);
            return $this->query("UPDATE {$this->table} SET $sql_part WHERE id= ?", $attributes,true);
        }

        public function delete($id){     
            return $this->query("DELETE FROM {$this->table}  WHERE id= ?", [$id],true);
        }

        public function create($fields){
            $sql_parts=  [];
            $attributes=[];
            foreach($fields as $key=> $val){
                $sql_parts[]="$key = ?";
                $attributes[]= "$val";
            }
            
            $sql_part=implode(',',$sql_parts);
            return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes,true);
        }
    }