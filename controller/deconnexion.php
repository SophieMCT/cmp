<?php
class Deconnexion{
    public function deco(){
        //Destroy the session
        session_destroy();

        //Redirect to the landing page : index.php
        header('Location:/cmp');
        exit;
    }
}


?>