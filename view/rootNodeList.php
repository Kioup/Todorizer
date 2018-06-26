--><main>
<div class="entete">
    <form method="POST" action="">
<span><i class="<?php echo "fas fa-". ($project->getIcon() ?: 'folder'); ?>" style="color: <?php echo ($project->getIconColor() ?: "white") ?> "></i></span>
<?php
echo '<input type="text" placeholder="Nom du projet" id="projectName" name="name" value="'.$project->getName().'" focus>';
?>
        <span class="tool"><i class="fas fa-wrench"></i></span>
        <input type="hidden" id="projectID" value="<?php echo $project->getId(); ?>">
        <input type="hidden" name="ctrl" value="project">
        <input type="hidden" name="action" value="setName"> 
        <input type="hidden" id="projectRoot" value="1">
    </form> 
</div>
<div class="list">
    <form method="POST" action="">
    <div class="form-block block-task" id="block-task">
        <?php
           foreach ($project->getNodeList() as $node){ 

            // conversion du nodePath en tableau:
            $NodePathArray=explode('.', $node->getNodePath());
            
            // enfants niveau 1:
            // if (strlen ($node->getNodePath())==3){
            if (sizeof ($NodePathArray)==2){
                include 'view/rootNode.php';    
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