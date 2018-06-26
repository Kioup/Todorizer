
    --><main>
        <section>
            <div class="titre">
                <h2 class="underline">Inscription</h2>
                <span><i class="fa fa-user"></i></span>
            </div>
            <div class="contenu">
                <form class="log">
                    <input type="text" placeholder="Prenom" name="prenom">
                    <input type="text" placeholder="Nom" name="nom">
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Mot de passe" name="password">
                    <label class="fill">Inscription
                    <input type="submit" value="connexion">
                    </label>
                </form>
            </div>
            <div class="annexe">
                <a class="fill2" href="<?php $url->get('connexion.php'); ?>">Connexion</a>
                <span>
                    <a href=""><i class="far fa-question-circle"></i></a>
                </span>
            </div>
        </section>
    </main>