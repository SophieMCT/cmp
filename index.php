<?php
//activate strict mode for typing
declare(strict_types=1);

//Start the session
session_start();

//Include the ressources common of each route
include './utils/functions.php';
include './model/model_users.php';
include './manager/manager_user.php';
include './controler/controlerHeader.php';

//Create objects common to all routes
//Instantiate the header
$header = new ControlerHeader();

//Retrieve the URL entered by the user
$url = parse_url($_SERVER['REQUEST_URI']);

//Retrieve the page requested by the user
$path = (isset($url['path'])) ? $url['path'] : '/';

//Create the paths with switch
switch ($path) {
    // Home page
    case '/cmp/':
        //Include the controlerAccueil
        include './controler/accueil.php';
        //Instanciate the Controler
        $controlerAccueil = new ControlerAccueil();
        $header->displayNav();
        //Include the views
        include './view/view_header.php';
        include './view/view_accueil.php';
        break;

    // Menu page
    case '/cmp/menu':
        //Include the views
        include './view/view_header.php';
        include './view/view_menu.php';
        break;

    // History page
    case '/cmp/histoire':
        //Include the views
        include './view/view_header.php';
        include './view/view_histoire.php';
        break;

    // Geography page
    case '/cmp/geographie':
        //Include the views
        include './view/view_header.php';
        include './view/view_geographie.php';
        break;

    // Culture page
    case '/cmp/culture':
        //Include the views
        include './view/view_header.php';
        include './view/view_culture.php';
        break;

    // Events page
    case '/cmp/evenements':
        //Include the views
        include './view/view_header.php';
        include './view/view_evenements.php';
        break;

    // Tourism page
    case '/cmp/tourisme':
        //Include the views
        include './view/view_header.php';
        include './view/view_tourisme.php';
        break;

    // Incription page
    case '/cmp/inscription':
        //Include the controlerInscription
        include './controler/inscription.php';
        //Instanciate the Controler
        $controlerInscription = new ControlerInscription();
        $controlerInscription->dataTestInscription();
        $controlerInscription->registerUser();
        //Include the views
        $style='style_inscription';
        include './view/view_header.php';
        include './view/view_inscription.php';
        break;

    // Connexion page 
    case '/cmp/connexion':
        //J'inclus mon controlerAccueil
        include './controler/connexion.php';
        //Instanciate the Controler
        $controlerConnexion = new ControlerConnexion();
        $controlerConnexion->dataTestConnexion();
        $controlerConnexion->logInUser();
        //Include the views
        $style='style_connexion';
        include './view/view_header.php';
        include './view/view_connexion.php';
        break;

    //My account page
    case '/cmp/moncompte':
        //Include the controler
        include './controler/moncompte.php';
        //Instanciate an object moncompte
        $moncompte = new ControlerCompte();
        $moncompte->displayUserAccount();
        $header->displayNav();
        //Include the views
        include './view/view_header.php';
        include './view/view_moncompte.php';
        break;

    //Deconnexion page
    case '/cmp/deconnexion':
        include './controler/deconnexion.php';
        $deco = new Deconnexion();
        $deco->deco();
        break;

    //Pardefault page
    default:
        echo '404';
        break;
}

//Include footer in the end since its common to every pages
include './view/view_footer.php';

?>