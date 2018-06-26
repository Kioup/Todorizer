
    --><main>
        <section>
            <div class="titre">
                <h2 class="underline">Profil</h2>
                <span><i class="fa fa-user"></i></span>
            </div>
            <div class="contenu">
                <form class="log">
                    <input type="text" placeholder="Prenom">
                    <input type="text" placeholder="Nom">
                    <input type="email" placeholder="Email">
                    <label class="fill">Modifier
                        <input type="submit" value="Inscription">
                    </label>
                </form>
            </div>
            <div class="annexe">
                <a class="fill2" href="<?php $url->get('supprCompte.php'); ?>">Supprimer <span><i class="fas fa-trash"></i></span></a>
                <a class="fill2" href="<?php $url->get('CGU.php'); ?>">CGU <span><i class="far fa-question-circle"></i></span></a>
            </div>
        </section>
    </main>