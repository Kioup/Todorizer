<?php

    /** LOGIN FORM **/

?>
-->
<main>
    <section>
        
        <div class="titre">
            <h2 class="underline">Connexion</h2>
            <span><i class="fa fa-user"></i></span>
        </div>
        
        <div class="contenu">
            
            <div class="alert" style="display:<?php echo ((isset($error) && $error) ? 'block' : 'none'); ?>">
                <span><i class="fas fa-exclamation-triangle"></i></span>
                <p> Vous n'avez pas entré les bons identifiants. Veuillez réessayer !</p>
            </div>
            
            <form class="log"  method="POST" action="">
                <input type="hidden" value="login" name="page" required>
                
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Mot de passe" name="password" required>
                <label class="fill">Connexion
                    <input type="submit" value="connexion">
                </label>
                
            </form>
            
        </div>
        
        <div class="annexe">
            <a class="fill2" href="<?php $url->get('signup.php'); ?>">Inscription</a>
            <span>
                <a href="<?php $url->get('CGU.php'); ?>">
                    <i class="far fa-question-circle"></i>
                </a>
            </span>
        </div>
        
    </section>
</main>