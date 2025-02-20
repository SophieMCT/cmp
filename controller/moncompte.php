<?php

class ControlerCompte
{
    //Attributs
    private ?string $login;
    private ?string $pseudo;

    //Constructor
    public function __construct()
    {
        //Declaration of display variables
        $this->login = "";
        $this->pseudo = "";
    }

    //GETTER and SETTER
    public function getLogin(): ?string
    {
        return $this->login;
    }
    public function setLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }
    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    //METHOD
    public function displayUserAccount()
    {
        //View user's data saved in session 
        //1st step : Check if there is a session registered
        if (isset($_SESSION['id_user'])) {
            //2nd step : transfer sessions' data to my display varables
            $this->setLogin($_SESSION['login_user']);
            $this->setPseudo($_SESSION['pseudo_user']);
        }
    }
}

?>