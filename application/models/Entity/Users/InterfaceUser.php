<?php 
   



    interface InterfaceUser{
        public function getId();
        public function getEmail();

        public function getCompte();
        public function setId( $id);
        public function setEmail( $email);
        public function setCompte( $compte);
        public function loggIn( $email, $password);
        public function loggOut();
        public function createCompte($email,$password,$statutLogin);
        public function updateCompte( $email, $password);
        public function deleteCompte($id);
        public function createUtilisateur($email,$telephone);
        public function updateUtilisateur($email,$telephone);
        public function deleteUtilisateur($id);
        public function createAdresse($adresse);
        public function updateAdresse($id,$adresse);
        public function deleteAdresse($id);


    }