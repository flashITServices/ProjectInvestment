<?php
    namespace Core\Database;
    /**
     * La classe Query sert de facade pour cacher la compexite de la requete
     */
    class Query{
        public static function __callStatic($method, $args){
            $query=new QueryBuilder();
            call_user_func_array([$query,$method],$args);
        }
    }