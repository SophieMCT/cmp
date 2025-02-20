<?php

class ControlerConnexion
{
    //Attributes
    private ?string $messageCo;

    //Constructor
    public function __construct()
    {
        $this->messageCo = "";
    }

    //Getter and Setter
    public function getMessageCo(): ?string
    {
        return $this->messageCo;
    }
    public function setMessageCo(?string $messageCo): self
    {
        $this->messageCo = $messageCo;
        return $this;
    }


    //Function to test login's form data
    //Param : void
    //Return : array['loginCo' => string, 'passwordCo' => string, 'erreur' => string]
    public function dataTestConnexion(): array
    {
        //1st step : checks if required fields are empty
        if (empty($_POST["loginCo"]) || empty($_POST["passwordCo"])) {
            return ["loginCo" => '', "passwordCo" => '', "erreur" => '<div class="messages-err">Veuillez remplir tout les champs.</div>'];
        }

        //2nd step : clean the data
        $loginCo = sanitize($_POST["loginCo"]);
        $passwordCo = sanitize($_POST["passwordCo"]);

        //3rd step : Check that the data are in the correct format
        if (!filter_var($loginCo, FILTER_VALIDATE_EMAIL)) {
            return ["loginCo" => '', "passwordCo" => '', "erreur" => '<div class="messages-err">L\'adresse email n\'est pas au bon format.</div>'];
        }

        return ["loginCo" => $loginCo, "passwordCo" => $passwordCo, "erreur" => ''];
    }

    //Function to format a user profile
    //Param : array["id_user" => INT,"pseudo_user" => string, "login_user" => string, "mdp_user" => string]
    //Return : string
    public function cardUser(?array $profil): string
    {
        return "<article style='border-bottom : 3px solid black'>
            <h2>Login : {$profil['login_user']}</h2>
            <p>Pseudo : {$profil['pseudo_user']}</p>
        </article>";
    }

    //Method that tests receipt of a login form, and launches the login process if so
    public function logInUser(): void
    {
        //Test if the connection form is sent to me
        if (isset($_POST['connexion'])) {
            //test the connection's data sent
            $tab = $this->dataTestConnexion();

            //Checking if i'm in a error's case
            if ($tab['erreur'] != '') {
                //if so : display error
                $this->setMessageCo($tab['erreur']);
            } else {
                //if not : Creating my $user object from the ManagerUser
                $user = new ManagerUser($tab['loginCo']);

                //Query the database to retrieve user data from the login entered
                $data = $user->readUserByLogin();

                //Test if there is an error (communication problem with the database)
                //If so, I get a string, if everything is fine I get an array
                if (gettype($data) == 'string') {
                    $this->setMessageCo($data);
                } else {
                    //Check if the response from the database is empty or not
                    //If empty: then the login doesn't exit in the DB => display an error message
                    if (empty($data)) {
                        $this->setMessageCo('<div class="messages-err">Erreur d\adresse email et/ou de mot de passe</div>');
                    } else {
                        //If the login exist in the DB
                        //We check if the passwords are matching
                        if (!password_verify($tab['passwordCo'], $data[0]['mot_de_passe'])) {
                            //if passwords are not matching then => display an error message
                            $this->setMessageCo('<div class="messages-err">Erreur d\adresse email et/ou de mot de passe</div>');
                        } else {
                            //if passwords are matching then => save the user data in session, and display a confirmation message
                            $_SESSION['id_user'] = $data[0]['id_utilisateurs'];
                            $_SESSION['pseudo_user'] = $data[0]['pseudo'];
                            $_SESSION['login_user'] = $data[0]['mail'];

                            $this->setMessageCo("{$_SESSION['pseudo_user']} est connecté avec succés !");
                        }
                    }
                }
            }
        }
    }

}
?>

