
    --><main>
        <section>
            <div class="titre">
                <!-- <h2>Inscription</h2> -->
                <span><i class="fa fa-user"></i></span>
                <hr>
            </div>
            <div class="contenu">
                <form class="log">
                    <input type="text" placeholder="Prenom">
                    <input type="text" placeholder="Nom">
                    <input type="email" placeholder="Email">
                    <input type="password" placeholder="Mot de passe">
                    <input type="submit" value="connexion">
                </form>
            </div>
            <div class="annexe">
                <a href="<?php $url->get('connexion.php'); ?>">Connexion</a>
                <span>
                    <a href=""><i class="far fa-question-circle"></i></a>
                </span>
            </div>
        </section>
    </main>