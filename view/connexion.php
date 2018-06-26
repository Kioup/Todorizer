
    --><main>
        <section>
            <div class="titre">
                <h2 class="underline">Connexion</h2>
                <span><i class="fa fa-user"></i></span>
            </div>
            <div class="contenu">
                <form class="log"  method="POST" action="">
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="hidden" value="login" name="page" required>
                    <input type="password" placeholder="Mot de passe" name="password" required>
                    <label class="fill">Connexion
                        <input type="submit" value="connexion">
                    </label>
                </form>
            </div>
            <div class="annexe">
                <a class="fill2" href="<?php $url->get('signup.php'); ?>">Inscription</a>
                <span>
                    <a href=""><i class="far fa-question-circle"></i></a>
                </span>
            </div>
        </section>
    </main>