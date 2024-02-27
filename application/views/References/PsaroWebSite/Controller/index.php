<?php
     require('../Controller/Controller.php');
     $data=\Controller\Controller::getData('Viande');
     foreach($data as $article){
          echo $article[7].'<br>';
     }
