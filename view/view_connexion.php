<main>
    <section class="<?php echo $header->getClass() ?>">
        <section class="bg-form">
            <h1>Connexion</h1>
            <section class="bg-form-content">
                <form action="" method="post">
                    <label for="input_container_email">Adresse email :</label>
                    <div class="input_container_email">
                        <!-- <i class="fa-regular fa-user" aria-hidden="true"></i> -->
                        <input id="email" class="input" type="email" name="loginCo" placeholder="Votre email">
                    </div>
                    <label for="input_container_mdp">Mot de passe :</label>
                    <div class="input_container_mdp">
                        <input type="password" class="input" name="passwordCo" placeholder="Votre mot de passe">
                    </div>
                    <a href="#" class="mdp-perdu">Mot de passe oublié ?</a>
                    <button type="text" class="submit" name="connexion">Valider</button>
                </form>
                <a href="/cmp/inscription" class="inscription">Vous n'avez pas de compte ? Créez en un, en cliquant
                    ici.</a>
                </div>
                <p><?php echo $controlerConnexion->getMessageCo() ?></p>
            </section>
        </section>
    </section>
</main>