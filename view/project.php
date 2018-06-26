    --><main>
        <div class="entete">
            <form method="POST" action="">
            <span><i class="fas fa-folder-open"></i></span>
<?php
    echo '<input type="text" placeholder="Nom du projet"';
    echo (isset($_SESSION['user'])) ? '' : ' id="projectName"';
    echo ' name="name" value="'.$currentProject->getName().'" focus>';
?>
                <span class="tool"><i class="fas fa-wrench"></i></span>

                <input class="jscolor" onchange="changeColor(this.jscolor)">
                <input type="hidden" name="ctrl" value="project">
                <input type="hidden" name="action" value="setName"> 
                <input type="submit" value="Changer couleur (no work)p">                   
            </form> 
        </div>
        <div class="list">
            <h2 class="underline"> Groupe de taches </h2>                
            <form method="POST" action="">
            <div class="form-block">
                <?php
                    foreach ($currentProject->getNodeList() as $node) {
                        echo "<div class='tache'><label class='container'><input type='checkbox'><span class='checkmark'></span></label><input type='text' value='".$node->getTitle()."' data-type='title'><span class='deploi'><i class='fas fa-angle-down'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'></textarea></fieldset><div><span class='trash'><i class='fas fa-trash'></i></span><span class='pen'><i class='fas fa-pencil-alt'></i></span></div></div><input type='hidden' name='taskUpdate' value='" . $node->getId() . "'></div>";
                    }
                ?>
            </div>
            <div class="form-block new">
                <input type="text" placeholder="Nouveau"><!--
                --><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
            </div>
                <input type="hidden" name="id_project" value="0">
                <input type="hidden" name="ctrl" value="node">
                <input type="hidden" name="action" value="add">
            </form>              
        </div>
    </main>