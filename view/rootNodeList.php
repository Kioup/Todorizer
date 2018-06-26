--><main>
<section>
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
           foreach ($project->getNodeList() as $node){ 

            // enfants niveau 1:
            if (strlen ($node->getNodePath())==3){
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
</section><section>
<div class="titre">
<h2>Notifications</h2>
</div>
</section>
</main>