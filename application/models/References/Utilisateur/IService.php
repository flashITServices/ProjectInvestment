<?php
 interface Iservice{
    public function consulterStatistique();
    
    public function addAgent(Agent $agent);

    public function getCommandes();
    public function infosCommande($id);
    public function getAgents();
    public function getAgent($id);
    

 }