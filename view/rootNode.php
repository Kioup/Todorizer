<!-- <li>
        <form method="POST" action="">
            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
            <input type="hidden" name="view" value="nodeList">
            <input type="hidden" name="nodePath" value="<?php echo $node->getNodePath(); ?>">
            <a href="#" onclick="this.parentNode.submit()" >
                <span><?php echo $node->getTitle()." (". $node->getNodePath() . ")";?></span>
            </a> 
        </form>
</li> -->


<?php
    $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $node->getNodePath() ; 
?>

<div class="tache">
    <label class="container">
        <input type="checkbox">
        <span class="checkmark"></span>
    </label>
    <input type="text" value="<?php echo $node->getTitle(); ?> " data-type="title" >
    <span class="deploi">
        <i class="fas fa-angle-down"></i>
    </span>
    <div class="develop">
        <fieldset>
        <legend>description</legend>
        <textarea row="4" placeholder="Entrez un texte descriptif" data-type="description">
        </textarea>
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
    <input type="hidden" name="taskUpdate" value=" . $node->getId() . ">

<?php

    //// niveau 2:
        echo '<div style="padding-left:5em;">';
            foreach ($project->getNodeList() as $currentChildNode){                         
                if( (strlen ($currentChildNode->getNodePath())==5) && (stripos($currentChildNode->getNodePath(), $node->getNodePath()) ===0) ){        
                    
                    $childNodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ; 
                    
                echo '
                <div class="tache">
                   <h2> '.$currentChildNode->getTitle() .'</h2>                
                        <div>
                            <a href="'. $childNodeListString .'" >
                                <span class="pen"><i class="fas fa-pencil-alt"></i></span>
                            </a> 
                        </div>
                </div>
                ';







                   // include 'view/node.php';
                }      
            } 
            echo "</div>";
    /// fin niveau 2


echo "</div>";
?>
