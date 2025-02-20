<main>
    <section class="<?php echo $header->getClass() ?>">
        <section class="bg-form">
            <h1>Inscription</h1>
            <section class="bg-form-content">
                <form action="" method="post">
                    <label for="input_container_pseudo">Pseudo :</label>
                    <div class="input_container_pseudo">
                        <input id="pseudo" class="input" type="name" name="pseudo_user" placeholder="Votre pseudo">
                    </div>
                    <label for="input_container_email">Adresse email :</label>
                    <div class="input_container_email">
                        <input type="email" class="input" id="email" name="login_user" placeholder="Votre email">
                    </div>
                    <div class="input_container_mdp">
                        <label for="input_container_mdp">Mot de passe :</label>
                        <input type="password" class="input" id="password" name="password_user"
                            placeholder="Votre mot de passe">
                    </div>
                    <div class="input_container_mdp_verif">
                        <label for="input_container_mdp_verif">Confirmez votre mot de passe :</label>
                        <input type="password" class="input" id="confirm_password" name="confirm_password_user"
                            placeholder="Votre mot de passe">
                    </div>
                    <button type="text" class="submit" name="inscription">Valider</button>
                </form>
                <a href="/cmp/connexion" class="connexion">Vous avez déjà un compte? Connectez-vous, en cliquant
                    ici.</a>
                <ul id="userMessage"></ul>
                <p><?php echo $controlerInscription->getMessage() ?></p>
            </section>
        </section>
    </section>
</main>
<script type="text/javascript" src="javascript/form.js"></script>

