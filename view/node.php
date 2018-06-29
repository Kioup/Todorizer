<?php

/** NODE (Liste tâche, desceription et liste des sous-tâches) **/        

    $check = ($currentChildNode->getProgress() == 10) ? 'checked' : '';
    $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ; 

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
            <span class="trash">
                <i class="fas fa-trash"></i>
            </span>
            
            <a href="<?php echo $nodeListString ?>" >
                
                <span class="pen">
                    <i class="fas fa-pencil-alt"></i>
                </span>
                
<?
    
    if ($currentChildNode->getStartDate() || $currentChildNode->getEndDate()) 
        echo "
            <div class='date dateList'>
                <span class='date1'>
                    " . $currentChildNode->getStartDate() . "
                </span><span class='date2'>
                    " . $currentChildNode->getEndDate() . "
                </span>
            </div>
        ";
               
?>   
    
            </a>       
        </div>
    </div>
    
    <input type="hidden" name="taskUpdate" class="taskUpdate" value="<?php echo $currentChildNode->getId(); ?>">

<?php

// affichage noeuds niveau 2: 
    
    echo ' <a href="'. $childNodeListString .'" ><div class="child">';  
        
    if ($currentChildNode->getNbChildren()){

        $childPath = $currentNode->getNodePath() . '.' . $id_child;

        //On parcours liste de noeuds
        foreach ($sortedNodeList as $childNodePath => $subChildNode) {

            $np = explode('.',$childNodePath);               

            if (!strpos($childNodePath, $childPath)){ 

                if (count($np) == count($DecomposedNodePath)+2) {

                    echo '
                   <div class="tache">
                      <h2>'.$subChildNode->getTitle() .'</h2>               
                   </div>
                    ';
                }
            }
        }
    }
    
    echo "</div></a></div>";

/// fin niveau 2

?>