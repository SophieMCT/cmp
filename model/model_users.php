<?php
class ModelUser{
    //Attributes
    private ?int $idUser;
    private ?string $pseudoUser;
    private ?string $loginUser;
    private ?string $mdpUser;
    private ?string $mdpUserVerif;

    //Constructor
    public function __construct(?string $login){
        $this->loginUser = $login;
    }

    //GETTER and SETTER
    public function getIdUser(): ?int{
        return $this->idUser;
    }
    public function getPseudoUser(): ?string{
        return $this-> pseudoUser;
    }
    public function getLoginUser(): ?string{
        return $this->loginUser;
    }
    public function getMdpUser(): ?string{
        return $this->mdpUser;
    }
    public function getMdpUserVerif(): ?string{
        return $this->mdpUserVerif;
    }
    public function setIdUser(?int $idUser): ModelUser{
        $this->idUser= $idUser;
        return $this;
    }
    public function setPseudoUser(?string $pseudoUser): ModelUser{
        $this->pseudoUser = $pseudoUser;
        return $this;
    }
    public function setLoginUser(?string $loginUser): ModelUser{
        $this->loginUser = $loginUser;
        return $this;
    }
    public function setMdpUser(?string $mdpUser): ModelUser{
        $this->mdpUser = $mdpUser;
        return $this;
    }
    public function setMdpUserVerif(?string $mdpUserVerif): ModelUser{
        $this->mdpUserVerif = $mdpUserVerif;
        return $this;
    }
}
?>