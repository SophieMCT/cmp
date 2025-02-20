<?php

class ControlerAccueil
{
    //Attributes
    private ?string $class;
    private ?string $classNav;

    //Constructor
    public function __construct()
    {
        //Declaration of display variables
        $this->class = ""; // Display of the forms (connexion/Inscription)
        $this->classNav = "displayNone"; //I hide the link of my account and deconnexion

    }


}
?>