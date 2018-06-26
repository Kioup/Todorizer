<div class="tache">
    <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
    </label>
        <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
        <input type="hidden" name="view" value="nodeList">
        <input type="hidden" name="nodePath" value="<?php echo $currentChildNode->getNodePath(); ?>">
        <input type="text" value="<?php echo $currentChildNode->getTitle(); ?>" data-type="title" >
    <span class="deploi">
        <i class="fas fa-angle-down"></i>
    </span>
    <div class="develop">
        <fieldset>
        <legend>Description</legend>
        <textarea row="4" placeholder="Entrez un texte descriptif" data-type="description"><?php echo $currentChildNode->getDescription();  ?></textarea>
        </fieldset>
        <div>
            <span class="trash"><i class="fas fa-trash"></i>
            </span>
            <a href="<?php echo $nodeListString ?>" >
                <span class="pen"><i class="fas fa-pencil-alt"></i>
                </span>
            </a>       
        </div>
    </div>
    <input type="hidden" name="taskUpdate" value="<?php echo $currentChildNode->getId(); ?>">

<?php

// affichage noeuds niveau 2:                  
                    $nb_subChildren=$currentChildNode->getNbChildren();
               
                    if ($nb_subChildren){
                       echo '<ul style="padding-left:5em;">';
                       for ($j = 1; $j <= $nb_subChildren; $j++) {
                           $currentChildNode=$sortedNodeList[($currentNodePath.".".$i).".".$j];
                           $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ; 
                           
                       echo '
                       <div class="tache">
                           <a href="'. $childNodeListString .'" ><h2>'.$currentChildNode->getTitle() .'</h2></a>                
                       </div>
                       ';
                       }
                       echo '</ul>';
                    }
            echo "</div>";
    /// fin niveau 2

echo "</div>";
?>