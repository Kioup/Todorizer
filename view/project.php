<?php

    /** PROJECT (LOGGOUT ACCOUNT) **/ 

?>
-->
<main>
    <div class="entete">
        <form method="POST" action="">
            <span><i class="fas fa-folder-open"></i></span>
            
<?php
            
    echo '<input type="text" placeholder="Nom du projet" id="projectName" name="name" value="'.$currentProject->getName().'" focus>';
            
?>

            <input type="hidden" name="ctrl" value="project">
            <input type="hidden" name="action" value="setName">                
        </form> 
    </div>

    <div class="list">
        <h2 class="underline"> Votre liste : </h2>                
        <form method="POST" action="">
        <div class="form-block block-task" id="block-task">

<?php

                foreach ($currentProject->getNodeList() as $node){

                    $check = ($node->getProgress() == 10) ? 'checked' : '';

                    echo "<div class='tache'><label class='container'><input type='checkbox' ". $check ."><span class='checkmark'></span></label><input type='text' value='" . $node->getTitle() . "' data-type='title'><span class='deploi'><i class='fas fa-angle-down'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'>"  . $node->getDescription() . "</textarea></fieldset><div><span class='trash'><i class='fas fa-trash'></i></span><span class='pen'><i class='fas fa-pencil-alt'></i></span></div></div><input type='hidden' name='taskUpdate' value='" . $node->getId() . "'></div>";
                }

?>

        </div>

        <div class="form-block new">
            <input type="text" placeholder="Nouvelle tâche"><!--
            --><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
        </div>

            <input type="hidden" name="id_project" value="0">
            <input type="hidden" name="ctrl" value="node">
            <input type="hidden" name="action" value="add">
        </form>              
    </div>
</main>