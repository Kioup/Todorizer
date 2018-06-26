<?php
    $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $node->getNodePath() ; 
?>

<div class="tache">
    <label class="container">
        <input type="checkbox">
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
            <span class="trash"><i class="fas fa-trash"></i>
            </span>
            <a href="<?php echo $nodeListString ?>" >
                <span class="pen"><i class="fas fa-pencil-alt"></i>
                </span>
            </a>       
        </div>
    </div>
    <input type="hidden" name="taskUpdate" value="<?php echo $node->getId(); ?>">

<?php

    //// niveau 2:
        echo '<div style="padding-left:5em;">';

            foreach ($project->getNodeList() as $currentChildNode){       

                $ChildNodePathArray=explode('.', $currentChildNode->getNodePath());

                if( (count ($ChildNodePathArray)==3) && (stripos($currentChildNode->getNodePath(), $node->getNodePath()) ===0) ){        
                    
                    $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ; 
                    
                echo '
                <div class="tache">
                    <a href="'. $childNodeListString .'" ><h2>'.$currentChildNode->getTitle() .'</h2></a>                
                </div>
                ';
                }      
            } 
            echo "</div>";
    /// fin niveau 2

echo "</div>";
?>
