 
    --><main>
        <section>
            <div class="titre">
                <h2 class="underline">Changer mot de passe</h2>
                <span><i class="fas fa-key"></i></span>
            </div>
            <div class="contenu">
                <?php if (isset($error)) { 
                    if ($error == false) { ?> 
                        <div class="alert">
                            <span><i class="fas fa-exclamation-triangle"></i></span>
                            <p> Les mots de passe ne correspondent pas. Veuillez réessayer !</p>
                        </div>
                    <?php } else { ?>
                    <div class="success">
                        <span><i class="fas fa-check-circle"></i></span>
                        <p>Les mots de passe ont bien été changé</p>
                    </div>
                <?php } } ?>
                <form class="log" method="GET" action="redirect.php">
                    <input type="password" placeholder="Nouveau mot de passe" name="pwd1" required value="">
                    <input type="password" placeholder="Confirmer mot de passe" name="pwd2" required value="">
                    <input type="hidden" name="page" value="changePwd.php">
                    <label class="fill">Modifier
                        <input type="submit" value="Changer">
                    </label>
                </form>
            </div>
        </section>
    </main>
