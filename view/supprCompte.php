<?php

    /** REMOVE ACCOUNT CONFIRMATION **/

?>
-->
<main>
    <section>
        <div class="contenu">
            <form class="log suppr" action="redirect.php" method="GET">
                <input type="hidden" value="suppCompte" name="page">
                
                <span>
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                
                <p>La suppression de votre compte entrainera la perte irréversible de toutes vos données et effacera toutes vos potentielles collaborations à un projet crée sur Todorizer.com seront effacées. Voulez vous effacer toutes vos données et supprimer votre compte ?</p> 
                
                <label class="fill">Confirmer
                    <input type="submit" value="confirmer">
                </label>
                
                <div class="annexe">
                    <a class="fill2" href="<?php $url->get('profil.php'); ?>">Annuler</a>
                </div>
            </form>
        </div>
    </section>
</main>