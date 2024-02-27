<?php 
    namespace  models\Entity\utilisateur;

use  models\Entity\Gestion\Adresse;

    interface InterfaceUser{
        public function getId();
        public function getEmail();

        public function getCompte();
        public function setId(int $id);
        public function setEmail(string $email);
        public function setCompte(Compte $compte);
        public function loggIn(string $email,string $password);
        public function loggOut();
        public function createCompte(string $email,string $password,bool $statutLogin);
        public function updateCompte(string $email,string $password);
        public function deleteCompte(int $id);
        public function createUtilisateur(string $email,string $telephone);
        public function updateUtilisateur(string $email,string $telephone);
        public function deleteUtilisateur(int $id);
        public function createAdresse(Adresse $adresse);
        public function updateAdresse($id,Adresse $adresse);
        public function deleteAdresse(int $id);


    }