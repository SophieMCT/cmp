<?php
class ManagerUser extends ModelUser {
    //Method
    //Function to insert data to the data base 
    //Param : string $login_user, string $password_user, optionnal string $name_user, optionel string first_name_user
    //Return : string
    function addUser():string{
        //1st step : Instantiate the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=cmp','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Récupération des données de l'objet
        $pseudo_user = $this->getPseudoUser();
        $login_user = $this->getLoginUser();
        $password_user = $this->getMdpUser();

        //Try...Catch
        try{
            //2nd step : Prepare my request INSERT INTO
            $req = $bdd->prepare('INSERT INTO utilisateurs (pseudo, mail, mot_de_passe) VALUES (?,?,?)');

            //3rd step: Binding of Parameter to link each ? to his data
            $req->bindParam(1,$pseudo_user,PDO::PARAM_STR);
            $req->bindParam(2,$login_user,PDO::PARAM_STR);
            $req->bindParam(3,$password_user,PDO::PARAM_STR);

            //4th step : execution of the request
            $req->execute();

            //5th step : Returns a confirmation message
            return "$pseudo_user a été enregistré avec succès !";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //Function to fetch users from the database
    //Param : void
    //Return : array | string
    function readUsers():array | string{
        //1st step : Instantiate the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=cmp','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Try...Catch
        try{
            //2nd step : Prepare my request SELECT
            $req = $bdd->prepare('SELECT id_utilisateurs, pseudo, mail, mot_de_passe FROM utilisateurs');

            //3rd step : execution of the request
            $req->execute();

            //4th step : Retrieves responses from the database
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //5th step: Return of the $data
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //Function to retrieve a user in database according to a specific login
    //Param : string
    //Return : array | string
    function readUserByLogin():array | string{
        //1st step : Instantiate the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=cmp','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Retrieving the login from the object
        $login_user = $this->getLoginUser();

        //Try...Catch
        try{
            //2nd step : Prepare my request SELECT
            $req = $bdd->prepare('SELECT id_utilisateurs, pseudo, mail, mot_de_passe FROM utilisateurs WHERE mail = ?');

            //3rd step : introduce the user login into my request with Parameter Binding
            $req->bindParam(1,$login_user,PDO::PARAM_STR);

            //4th step : execution of the request
            $req->execute();

            //5th step: Retrieves responses from the database
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //6th step : Return of the $data
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //Function to retrieve a user in database according to a specific pseudo
    //Param : string
    //Return : array | string
    function readUserByPseudo():array | string{
        //1st step : Instantiate the PDO connection object
        $bdd = new PDO('mysql:host=localhost;dbname=cmp','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Retrieving the pseudo from the object
        $pseudo_user = $this->getPseudoUser();

        //Try...Catch
        try{
            //2nd step : Prepare my request SELECT
            $req = $bdd->prepare('SELECT id_utilisateurs, pseudo, mail, mot_de_passe FROM utilisateurs WHERE pseudo = ?');

            //3rd step : introduce the user login into my request with Parameter Binding
            $req->bindParam(1,$pseudo_user,PDO::PARAM_STR);

            //4th step : execution of the request
            $req->execute();

            //5th step: Retrieves responses from the database
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //6th step : Return of the $data
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}

?>