<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calédonie, mon pays</title>
    <link rel="stylesheet" href="style\style.css">
    <?php echo "<link rel='stylesheet' href='./style/{$style}.css'>"; ?>
    <!-- < ?php echo "<script src='./script/{$script}.js' defer></script> " ; ? >-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=location_on" />
</head>

<body>

    <header>
        <nav>
            <img src="images\logo\logo-caledonie-mon-pays-blanc.png" class="logo" label="logo de calédonie mon pays">
            <div class="navigation">
                <ul class="navigation-items">
                    <li><a href="/cmp/">Accueil</a></li>
                    <li><a href="/cmp/menu">Nos articles</a></li>
                    <li><a href="/cmp/connexion">Connexion</a></li>
                    <li>
                        <div class="search-container">
                            <form action="/action_page.php">
                                <input type="text" placeholder="Rechercher..." name="search">
                                <button type="submit"><i class="fa fa-search" style="color: #F8F9FA"></i></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="home">
            <img decoding="async" class="img-slide active"
                src="images\Header\carousel_header_accueil\histoire.jpg"></img>
            <img decoding="async" class="img-slide" src="images/Header/carousel_header_accueil/géographie.jpg"></img>
            <img decoding="async" class="img-slide" src="images\Header\carousel_header_accueil\culture.jpeg"></img>
            <img decoding="async" class="img-slide" src="images\Header\carousel_header_accueil\évènement.jpg"></img>
            <img decoding="async" class="img-slide" src="images\Header\carousel_header_accueil\tourisme.jpg"></img>

            <div class="content active">
                <h1><span class="material-symbols-outlined">location_on</span>Case de Deva - Bourail
                    <br>
                    <span>Histoire de la Nouvelle-Calédonie</span>
                </h1>
                <p>La Nouvelle-Calédonie, découverte par James Cook en 1774, est un territoire français d'outre-mer
                    depuis 1853. Marquée par des tensions entre les populations kanak et les colons européens, elle a
                    évolué vers une autonomie accrue après les accords de Matignon (1988) et de Nouméa (1998).</p>
                <ul class="listArticles">
                    <li><a href="#">Découverte de la NC</a></li>
                    <li><a href="#">Colonisation de la NC</a></li>
                    <li><a href="#">Les accords de Matignon</a></li>
                </ul>
            </div>
            <div class="content">
                <h1><span class="material-symbols-outlined">location_on</span>Thio
                    <br><span>Géographie de la Nouvelle-Calédonie</span>
                </h1>
                <p>La Nouvelle-Calédonie est un archipel du Pacifique Sud, composé de la Grande Terre, des îles Loyauté,
                    et d'autres petites îles. Elle se distingue par ses montagnes, ses lagons classés au patrimoine
                    mondial de l'UNESCO, et une biodiversité exceptionnelle, tant terrestre que marine.</p>
                <ul class="listArticles">
                    <li><a href="#">Cartograhie de la NC</a></li>
                    <li><a href="#">Faune endémique</a></li>
                    <li><a href="#">Flore endémique</a></li>
                </ul>
            </div>
            <div class="content">
                <h1><span class="material-symbols-outlined">location_on</span>Centre Jean-Marie Tjibaou - Nouméa
                    <br><span>Culture calédonienne</span>
                </h1>
                <p>La culture de la Nouvelle-Calédonie est un mélange unique des traditions kanak autochtones, des
                    influences françaises et des apports asiatiques et polynésiens. Elle se manifeste à travers l'art,
                    la musique, la danse, et les coutumes locales, reflétant la diversité et l'héritage multiculturel de
                    l'archipel.</p>
                <ul class="listArticles">
                    <li><a href="#">L'Art en Nouvelle-Calédonie</a></li>
                    <li><a href="#">Danse traditionnelle</a></li>
                    <li><a href="#">Spécialités culinaires</a></li>
                </ul>
            </div>
            <div class="content">
                <h1><span class="material-symbols-outlined">location_on</span>Festival Shaxhabign - Poum
                    <br><span>Les évènements en Nouvelle-Calédonie</span>
                </h1>
                <p>La Nouvelle-Calédonie organise divers événements, tels que le Festival du Yam, célébrant la culture
                    kanak, le Carnaval de Nouméa, et la Foire de Bourail. Ces fêtes reflètent la richesse culturelle de
                    l'archipel, marquée par la coexistence de traditions ancestrales et d'influences contemporaines.</p>
                <ul class="listArticles">
                    <li><a href="#">La foire de Bourail</a></li>
                    <li><a href="#">La fête de l'avocat à Maré</a></li>
                    <li><a href="#">L'omelette géante de Dumbéa</a></li>
                    <ul class="listArticles">
            </div>
            <div class="content">
                <h1><span class="material-symbols-outlined">location_on</span>Baie d'Oro - Île des Pins
                    <br><span>Tourisme en Nouvelle-Calédonie</span>
                </h1>
                <p>La Nouvelle-Calédonie offre des lieux touristiques spectaculaires, tels que le lagon turquoise de
                    l'Île des Pins, le Cœur de Voh, la plage de Poé, et les montagnes de la Chaîne centrale. Ses parcs
                    naturels, ses récifs coralliens, et ses sites culturels font de l'archipel une destination prisée.
                </p>
                <ul class="listArticles">
                    <li><a href="#">Phare Amédée</a></li>
                    <li><a href="#">Les Îles Loyautés</a></li>
                    <li><a href="#">L'Île des Pins</a></li>
                    <ul class="listArticles">
            </div>
            <div class="slider-navigation">
                <div class="nav-btn active"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
                <div class="nav-btn"></div>
            </div>
        </section>
    </header>
    <script type="text/javascript" src="javascript/header.js"></script>