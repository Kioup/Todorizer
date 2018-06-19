    --><main>
        <div class="entete">
            <form method="POST" action="">                            
                <input type="text" placeholder="Nom du projet" name="name" focus>
                <i class="fas fa-wrench"></i>
                <input type="hidden" name="ctrl">
                <input type="hidden" name="action"> 
                <input type="submit" value="envoyer">                   
            </form>
        </div>
        <div class="list">
            <h2> Groupe de taches </h2>                
            <form method="POST" action="">
            <div class="form-block">
                <input type="text" placeholder="Nouveau"><!--
                --><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
            </div>
                <input type="hidden" name="ctrl">
                <input type="hidden" name="action">
            <input type="submit" value="Valider">
            </form>              
        </div>
    </main>