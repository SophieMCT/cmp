<?php

class ControlerInscription
{
    //Attributes 
    private ?string $message;

    //Constructor
    public function __construct()
    {
        $this->message = "";
    }

    //Getter and Setter
    public function getMessage(): ?string
    {
        return $this->message;
    }
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    //METHOD
    //Function : test the datas from the inscription's form 
    //Param : void
    //Return : array['pseudo_user'=> string,'login_user' => string, 'password_user' => string, 'erreur' => string]
    public function dataTestInscription(): array
    {
        //1st step : Checks if required fields are empty
        if (empty($_POST["login_user"]) || empty($_POST["password_user"]) || empty($_POST["confirm_password_user"]) || empty($_POST["pseudo_user"])) {
            return ["pseudo_user" => '', "login_user" => '', "password_user" => '', "confirm_password_user" => '', "erreur" => '<div class="messages-err">Veuillez remplir tous les champs.</div>'];
        }
        //2nd step : clean data
        $pseudo_user = sanitize($_POST['pseudo_user']);
        $login_user = sanitize($_POST["login_user"]);
        $password_user = sanitize($_POST["password_user"]);
        $confirm_password_user  = sanitize($_POST["confirm_password_user"]); 

        //3rd step : Check that the data are in the correct format
        if (!filter_var($login_user, FILTER_VALIDATE_EMAIL)) {
            return ["pseudo_user" => '', "login_user" => '', "password_user" => '', "confirm_password_user" => '', "erreur" => '<div class="messages-err">L\'email n\'est pas au bon format.</div>'];
        }

        // Check if the passwords are matching
        if (($_POST["password_user"]) !== ($_POST["password_user_verif"])) {
            return ["pseudo_user" => '', "login_user" => '', "password_user" => '', "confirm_password_user" => '', "erreur" => '<div class="messages-err">Les mots de passe ne correspondent pas</div>'];
        }

        //4th step : hash password
        $password_user = password_hash($password_user, PASSWORD_BCRYPT);

        return ["pseudo_user" => $pseudo_user, "login_user" => $login_user, "password_user" => $password_user, "erreur" => ''];

    }

    //Method to verify that you receive a registration form, then launch the registration process if applicable
    public function registerUser(): void
    {
        // Test if the registration form was submitted
        if (isset($_POST["inscription"])) {
            // Validate the submitted data
            $tab = $this->dataTestInscription();

            // Check if there were any validation errors
            if ($tab['erreur'] != '') {
                $this->setMessage($tab['erreur']);
                return; // Exit early if validation failed
            }

            // Create user object from ManagerUser
            $user = new ManagerUser($tab['login_user']);
            $user->setPseudoUser($tab['pseudo_user'])
                ->setMdpUser($tab['password_user']);

            // Check both email and pseudo availability simultaneously
            $emailExists = !empty($user->readUserByLogin());
            $pseudoExists = !empty($user->readUserByPseudo());

            // Handle all possible availability scenarios
            if ($emailExists && $pseudoExists) {
                $this->setMessage(
                    '<div class="messages-err">Cette adresse email et ce pseudo sont déjà utilisés.</div>'
                );
            } else if ($emailExists) {
                $this->setMessage(
                    '<div class="messages-err">Cette adresse email est liée à un compte déjà existant.</div>'
                );
            } else if ($pseudoExists) {
                $this->setMessage(
                    '<div class="messages-err">Ce pseudo existe déjà.</div>'
                );
            } else {
                // Both email and pseudo are available, proceed with registration
                $this->setMessage($user->addUser());
            }
        }
    }
}


