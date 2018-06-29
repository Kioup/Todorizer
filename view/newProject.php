<?php

    /** EMPTY PROJECT (LOGGED ACCOUNT) **/ 

?>
-->
<main>
    <div class="entete">
        <form method="POST" action="">
            <span>
                <i class="fas fa-folder-open"></i>
            </span>
            
<?php
    echo '<input type="text" placeholder="Nom du projet" id="projectName" name="name" value="'.$currentProject->getName().'" focus>';
?>
            
            <a href="<?php $url->get('projectEdit.php'); ?>"><span class="tool"><i class="fas fa-wrench"></i></span></a>

            <input type="hidden" name="ctrl" value="project">
            <input type="hidden" name="action" value="setName"> 
            
        </form> 
    </div>
    
    <div class="list">
        <h2 class="underline"> Groupe de taches </h2>                
        <form method="POST" action="">
            <div class="form-block block-task" id="block-task">
                
<?php
                
    foreach ($currentProject->getNodeList() as $node) {
        echo "<div class='tache'><label class='container'><input type='checkbox'><span class='checkmark'></span></label><input type='text' value='".$node->getTitle()."' data-type='title'><span class='deploi'><i class='fas fa-angle-down'></i></span><div class='develop'><fieldset><legend>description</legend><textarea row='4' placeholder='Entrez un texte descriptif' data-type='description'>"  . $node->getDescription() . "</textarea></fieldset><div><span class='trash'><i class='fas fa-trash'></i></span><span class='pen'><i class='fas fa-pencil-alt'></i></span></div></div><input type='hidden' name='taskUpdate' value='" . $node->getId() . "'></div>";
    }
                
?>
                
            </div>
            
            <div class="form-block new">
                <input type="text" placeholder="Nouveau"><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
            </div>
            
        </form>              
    </div>
</main>