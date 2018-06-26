--><main>

<div class="entete">
    <form method="POST" action="">
    <span><i class="fas fa-folder-open"></i></span>
<?php
echo '<input type="text" placeholder="Nom du projet id="projectName" name="name" value="'.$project->getName().'" focus>';
?>
        <span class="tool"><i class="fas fa-wrench"></i></span>
        <input type="hidden" name="ctrl" value="project">
        <input type="hidden" id="projectID" value="<?php echo $project->getId(); ?>">
        <input type="hidden" name="action" value="setName"> 
        <input type="hidden" id="projectRoot" value="0">
    </form> 
</div>
<div class="list">
    <form method="POST" action="">
    <div class="form-block">
        <input type="hidden" id="nodeID" value="<?php echo $currentNode->getId(); ?>">
            <?php

            // fil d'ariane:       
            $DecomposedNodePath=explode('.', $currentNode->getNodePath());
            $first=TRUE;    
            $FullNodePath="";
            foreach ($DecomposedNodePath as $partOfPath){
                
                if ($first == TRUE)  {      
                    $FullNodePath=$partOfPath;
                    $first = FALSE;
                }
                else{
                    $FullNodePath=$FullNodePath.".".$partOfPath;
                    $nodeLineString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $FullNodePath ;                                         
                    echo ' <span style="padding:0.5em; color:white"> <i class="fa fa-caret-right"></i> ';
                    echo '<a href="'. $nodeLineString .'" style="color:white;">';
                    echo ($sortedNodeList[$FullNodePath])->getTitle()."(".$FullNodePath.")";
                    echo '</a></span>';
                } 
            }
            /// fin du fil d'ariane
            echo "<br><br><br><br>";

            echo "<h2>".$currentNode->getTitle()." (".$currentNode->getNodePath().")</h2>";               

            if ($nb_children){
                for ($i = 1; $i <= $nb_children; $i++) {
                    $currentChildNode=$sortedNodeList[$currentNodePath.".".$i];
                    $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath() ;                     
                    
                    include 'view/node.php';  
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