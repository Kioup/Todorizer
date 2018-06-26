--><main>

<div class="entete">
    <form method="POST" action="">
    <span><i class="fas fa-folder-open"></i></span>
<?php
echo '<input type="text" placeholder="Nom du projet"';
echo (isset($_SESSION['user'])) ? '' : ' id="projectName"';
echo ' name="name" value="'.$project->getName().'" focus>';
?>
        <span class="tool"><i class="fas fa-wrench"></i></span>
        <input type="hidden" name="ctrl" value="project">
        <input type="hidden" name="action" value="setName">                   
    </form> 
</div>
<div class="list">
    <h2 class="underline"> Groupe de taches </h2>                
    <form method="POST" action="">
    <div class="form-block">
        <?php

echo "<h2>".$currentNode->getTitle()." (".$currentNode->getNodePath().")</h2>";               



            if ($nb_children){
                for ($i = 1; $i <= $nb_children; $i++) {
                    $currentChildNode=$sortedNodeList[$currentNodePath.".".$i];
                    include 'view/node.php';  
                    $nb_subChildren=$currentChildNode->getNbChildren();
                
                    if ($nb_subChildren){
                        echo '<ul style="padding-left:5em;">';
                        for ($j = 1; $j <= $nb_subChildren; $j++) {
                            $currentChildNode=$sortedNodeList[($currentNodePath.".".$i).".".$j];




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






                          //  include 'view/node.php';
                        }
                        echo '</ul>';
                    } 
                }
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