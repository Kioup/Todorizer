<?php

    /** NODE (Vue d'une tâche) **/ 

?>
-->
<main>
    <div class="ariane">
        <span>
            <a href='<?php echo "redirect.php?projectId=" . $project->getId() . "&view=rootNodeList" ;?>'><?php echo $project->getName(); ?></a>
        </span>

<?php
    
    $editNodeLink = "redirect.php?projectId=" . $project->getId() . "&page=nodeEdit.php&nodePath=" . $currentNode->getNodePath(); 

    // fil d'ariane:       
    $DecomposedNodePath=explode('.', $currentNode->getNodePath());
    $first = true;    
    $FullNodePath = "";
        
    foreach ($DecomposedNodePath as $key=>$partOfPath){
    
        if ($first == true)  {      
            $FullNodePath = $partOfPath;
            $first = false;
        } else if ($key!=(count($DecomposedNodePath)-1)) {
            $FullNodePath .= ".".$partOfPath;
            $nodeLineString = "redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $FullNodePath ;  
            
            echo '
                <span>
                    <i class="fa fa-caret-right"></i>
                    <a href="'. $nodeLineString .'" style="color:white;">' . ($sortedNodeList[$FullNodePath])->getTitle() . '</a>
                </span>';
        }
    }
        
    /// fin du fil d'ariane
        
?> 
    </div>
    
   <div class="entete" style="border:none">
       
        <div class="tool"><a href="<?php echo $editNodeLink; ?>"><span><i class="fas fa-wrench"></i></span></a></div>
       
        <input type="hidden" name="ctrl" value="project">
        <input type="hidden" id="projectID" value="<?php echo $project->getId(); ?>">
        <input type="hidden" name="action" value="setName"> 
        <input type="hidden" id="projectRoot" value="0">
    </div>
    <div class="list nodeList">
        <form method="POST" action="">
            <div class="form-block block-task" id="block-task">
                <input type="hidden" id="nodeID" value="<?php echo $currentNode->getId(); ?>">

                <div class="tache maitre">
                    <input type="hidden" class="taskUpdate" value="<?php echo $currentNode->getId(); ?>">
                    <input type="text" value='<?php echo $currentNode->getTitle() ?>'  data-type="title">  
                </div>
                
                
<?php if ($currentNode->getDescription()) { ?>
                
                <div class="projectDescription">
                    <strong>Description : </strong>
                    <?php echo $currentNode->getDescription(); ?>    
                </div>

<?php } 
                   
                   
 /* DATE */    
                   
    if ($currentNode->getStartDate() || $currentNode->getEndDate()) 
        echo "
            <div class='date dateNode'>
                <span class='date1'>
                    " . $currentNode->getStartDate() . "
                </span><span class='date2'>
                    " . $currentNode->getEndDate() . "
                </span>
            </div>
        ";
                   
                   
    //Si enfants ?
    if ($currentNode->getNbChildren()){
        //On parcours liste de noeuds
        foreach ($sortedNodeList as $childNodePath => $currentChildNode) {                    
            $np = explode('.',$childNodePath);
            //Si le path enfant comporte le path parent
            if (!strpos($childNodePath,$currentNode->getNodePath())){
              //  $count=(count($DecomposedNodePath)+1);
                //Si l'enfant est un enfant direct
                if ((count($np) == count($DecomposedNodePath)+1)) {                            
                    $nodeListString="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentChildNode->getNodePath();                     
                    include 'view/node.php'; 
                }
            }
        }
    }

?>
                <div class="form-block new" id="nodeList">
                    <input type="text" placeholder="Nouvelle tâche"><!--
                    --><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
                </div>
            </div>
        </form>              
    </div>
</main>