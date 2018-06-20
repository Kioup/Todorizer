    --><main>
        <div class="entete">
            <form method="POST" action="">                            
                <input type="text" placeholder="Nom du projet" name="name" value="<?php echo $currentProject->getName() ?>" focus>
                <i class="fas fa-wrench"></i>
                <input type="hidden" name="ctrl" value="project">
                <input type="hidden" name="action" value="setName"> 
                <input type="submit" value="envoyer">                   
            </form>
        </div>
        <div class="list">
            <h2> Groupe de taches </h2>                
            <form method="POST" action="">
            <div class="form-block">
                <?php
                    foreach ($currentProject->getNodeList() as $node) {
                        echo "<div class='tache'><input type='text' value='".$node->getTitle()."'><span><i class='fas fa-thumbtack'></i></span><span class='trash'><i class='fas fa-trash'></i></span></div>";
                    }
                ?>
            </div>
            <div class="form-block">
                <input type="text" placeholder="Nouveau"><!--
                --><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
            </div>
                <input type="hidden" name="id_project" value="0">
                <input type="hidden" name="ctrl" value="node">
                <input type="hidden" name="action" value="add">
            <input type="submit" value="Valider">
            </form>              
        </div>
    </main>