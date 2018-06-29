<?php

    /** NODE EDIT POPUP **/ 

?>
-->
<main>

<?php $nodeUri="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $currentNode->getNodePath() ; ?>

    <div class="edit">
        <div class="entete">
            <div class="tache maitre">
                <input type="hidden" class="taskUpdate" value="<?php echo $currentNode->getId(); ?>">
                <input type="hidden" id="projectID" value="<?php echo $project->getId(); ?>">
                <input type="text" value='<?php echo $currentNode->getTitle() ?>'  data-type="title">  
            </div>
        </div>
        <a class="previousNode fill" href="<?php echo $nodeUri; ?>"><span>Retour</span></a>
        <div class="contenu">
            <div>
                <span class="fill date">
                    <i class="far fa-calendar-alt"></i>
                    <p>Dates</p>
                </span>
            </div>
            
            <div>
                
                
<?php

//Date
                
    if ($currentNode->getStartDate() || $currentNode->getEndDate()) 
        echo "
            <div class='date dateEdit'>
                <span class='date1'>
                    " . $currentNode->getStartDate() . "
                </span><span class='date2'>
                    " . $currentNode->getEndDate() . "
                </span>
            </div>
        ";

?>  

            </div>
            
            <div class="tache">
                <input type="hidden" class="taskUpdate" value="<?php echo $currentNode->getId(); ?>">
                <textarea row="4" placeholder="Entrez un texte descriptif" data-type="description"><?php echo $currentNode->getDescription();  ?></textarea>
            </div>
            
        </div>
    </div>
</main><!--

--><div class="overlay"></div><!--
--><div class="popup">
        <span class="close">
            <i class="fas fa-times-circle"></i>
        </span>    

        <div class="rien"></div>

        <div class="date">
            <?php include 'view/edit_Piaf.php'; ?>
        </div>
    </div>