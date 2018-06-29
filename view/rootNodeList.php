<?php
 
    /** NODE ROOT (Tâches racine) **/

?>
-->
<main>
    <div class="ariane"></div>
    
    
<?php
    $editProjectLink="redirect.php?projectId=" . $project->getId() . "&page=projectEdit.php"; 
?>

    
    <div class="entete">
        <form method="POST" action="">
            <span>
                <i class="<?php echo "fas fa-". ($project->getIcon() ?: 'folder'); ?>" style="color: <?php echo ($project->getIconColor() ?: "white") ?> "></i>
            </span>
            
<?php
    echo '<input type="text" placeholder="Nom du projet" id="projectName" name="name" value="'.$project->getName().'" focus>';
?>
            
            <input type="hidden" id="projectID" value="<?php echo $project->getId(); ?>">
            <input type="hidden" name="ctrl" value="project">
            <input type="hidden" name="action" value="setName"> 
            <input type="hidden" id="projectRoot" value="1">

            <div class="tool">
                <a href="<?php echo $editProjectLink; ?>">
                    <span>
                        <i class="fas fa-wrench"></i>
                    </span>
                </a>
            </div>
        </form> 
    </div>
    
    
<?php if ($project->getDescription()) { ?>
    
    <div class="projectDescription">
        <strong>Description : </strong>
        <?php echo $project->getDescription(); ?>    
    </div>

<?php } ?>

    
    
    <div class="list node">
        <form method="POST" action="">
            <div class="form-block block-task" id="block-task">
            
            
<?php
            
    foreach ($project->getNodeList() as $node){ 

        // conversion du nodePath en tableau:
        $NodePathArray=explode('.', $node->getNodePath());

        // enfants niveau 1:
        if (count ($NodePathArray)==2) include 'view/rootNode.php';    
    }
            
?>
    
            </div>

            <div class="form-block new" id="rootNodeList">
                <input type="text" placeholder="Nouvelle tâche"><a href="#" class="newPro"><i class="fas fa-plus-square"></i></a>  
            </div>

            <input type="hidden" name="id_project" value="0">
            <input type="hidden" name="ctrl" value="node">
            <input type="hidden" name="action" value="add">
            
        </form>              
    </div>
</main>