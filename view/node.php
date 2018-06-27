<?php                        
 $check = ($currentChildNode->getProgress() == 10) ? 'checked' : '';
 ?>

<div class="tache">
    <label class="container">
        <input type="checkbox" <?php echo $check; ?>>
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
    <input type="hidden" name="taskUpdate" class="taskUpdate" value="<?php echo $currentChildNode->getId(); ?>">

<?php

// affichage noeuds niveau 2:                  
    
        
        if ($currentChildNode->getNbChildren()){
            echo '<ul style="padding-left:5em;">';
            
            $childPath = $currentNode->getNodePath() . '.' . $id_child;
   
            //On parcours liste de noeuds
            foreach ($sortedNodeList as $childNodePath => $subChildNode) {
            
                $np = explode('.',$childNodePath);               

                if (!strpos($childNodePath, $childPath)){ 


                    if (count($np) == count($DecomposedNodePath)+2) {

                        $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $subChildNode->getNodePath() ;                     

                        $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $subChildNode->getNodePath() ; 

                        echo '
                       <div class="tache">
                           <a href="'. $childNodeListString .'" ><h2>'.$subChildNode->getTitle() .'</h2></a>                
                       </div>
                        ';
                    }
                }

               echo '</ul>';
            }
        }
    echo "</div>";
    /// fin niveau 2


?>