<?php

    /** NODE ROOT (Sous-tâche racine) **/

    $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $node->getNodePath() ; 
    $check = ($node->getProgress() == 10) ? 'checked' : '';

?>
<div class="tache">
    <label class="container">
        <input type="checkbox" <?php echo $check; ?>>
        <span class="checkmark"></span>
    </label>
    
    <input type="text" value="<?php echo $node->getTitle(); ?>" data-type="title" >
    
    <span class="deploi">
        <i class="fas fa-angle-down"></i>
    </span>
    
    <div class="develop">
        <fieldset>
            <legend>Description</legend>
            <textarea row="4" placeholder="Entrez un texte descriptif" data-type="description"><?php echo $node->getDescription();  ?></textarea>
        </fieldset>
        
        <div>
            <span class="trash">
                <i class="fas fa-trash"></i>
            </span>
            <a href="<?php echo $nodeListString ?>" >
                <span class="pen">
                    <i class="fas fa-pencil-alt"></i>
                </span>
            </a>
        </div>
          
        
<?php
    
    if ($node->getStartDate() || $node->getEndDate()) 
    echo "
        <div class='date dateList'>
            <span class='date1'>
                " . $node->getStartDate() . "
            </span><span class='date2'>
                " . $node->getEndDate() . "
            </span>
        </div>
    ";
               
?>
      
 
    </div>
    
    <input type="hidden" name="taskUpdate" class="taskUpdate" value="<?php echo $node->getId(); ?>">

<?php

    //// niveau 2:
    
        echo '<a href="'. $nodeListString .'" ><div class="child">';

            foreach ($project->getNodeList() as $currentChildNode){       

                $ChildNodePathArray=explode('.', $currentChildNode->getNodePath());

                if( (count ($ChildNodePathArray)==3) && (stripos($currentChildNode->getNodePath(), $node->getNodePath()) ===0) ){        
                    
                    $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ; 
                    
                    echo '
                        <div class="tache">
                            <h2>'.$currentChildNode->getTitle() .'</h2>                
                        </div>
                    ';
                }      
            } 
            echo "</div></a>";
    
    /// fin niveau 2

echo "</div>";
    
?>

<!-- END ROOT NODE -->
