<?php

    /** PROJECT EDIT POPUP **/ 

?>
-->
<main>
    
<?php $nodeUri="redirect.php?projectId=" . $project->getId() . "&view=rootNodeList"; ?>

    <div class="edit">
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
            </form> 
        </div>
        
        <a class="fill previousNode" href="<?php echo $nodeUri; ?>">
            <span>Retour</span>
        </a>
        
        <div class="contenu">
            <div>
                <span class="fill icons"><i class="far fa-image"></i><p>Icone du projet</p></span>
                <span class="fill colors"><i class="fas fa-palette"></i><p>Couleur du projet</p></span>
                <span class="fill CR"><i class="fas fa-print"></i><p>Compte rendu</p></span>
                <span class="fill drop"><i class="fas fa-trash"></i><p>Suppression projet</p></span>
            </div>
            
            <div id="projectDescription">
                <textarea placeholder="Entrez un texte descriptif"><?php echo $project->getDescription(); ?></textarea>
            </div>
        </div>
    </div>
</main>

<!--

--><div class="overlay"></div><!--

--><div class="popup">

    <span class="close">
        <i class="fas fa-times-circle"></i>
    </span>

    <div class="CR">
        <?php include 'view/printProject.php'; ?>
    </div>

    <div class="colors">
        <form action="redirect.php" method="GET">
            <input class="jscolor {onFineChange:'changeColor(this)'}" value="<?php echo substr($project->getIconColor(),1); ?>">

            <p>Selectionnez une couleur depuis la palette ci-dessus</p>

            <div>
                <p class="pickit" id="rect"><i class="<?php echo "fas fa-" . ((isset($project) && $project->getIcon()) ? $project->getIcon() : 'folder'); ?>"></i></p>
                <span id="roct"><i class="<?php echo "fas fa-" . ((isset($project) && $project->getIcon()) ? $project->getIcon() : 'folder'); ?>"></i></span>
            </div>

            <div>
                <label class="fillR">Valider
                    <input type="submit" value="Valider">
                </label>
            </div>

            <input type="hidden" name="projectColor" id="projectColor" value="<?php echo $project->getIconColor(); ?>">
            <input type="hidden" name="page" value="projectEdit.php">
            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>">
        </form>
    </div>

    <div class="icons">
        <form action="redirect.php" method="GET">
            <div>
                <span class="slide-left"></span>
                <div class="wrapper">
                    <div class="mini-slider">
                        <span>
                            <p>Café</p>
                            <i class="fas fa-coffee"></i>
                        </span><!--
                        --><span>
                            <p>Projet</p>
                            <i class="fas fa-project-diagram"></i>
                        </span><!--
                        --><span>
                            <p>Shopping</p>
                            <i class="fas fa-shopping-cart"></i>
                        </span><!--
                        --><span>
                            <p>Cadeau</p>
                            <i class="fas fa-gift"></i>
                        </span><!--
                        --><span>
                            <p>Liste</p>
                            <i class="fas fa-list-ul"></i>
                        </span><!--
                        --><span class="selected">
                            <p>Dossier</p>
                            <i class="fas fa-folder-open"></i>
                        </span><!--
                        --><span>
                            <p>Voyage</p>
                            <i class="fas fa-suitcase"></i>
                        </span><!--
                        --><span>
                            <p>Evenement</p>
                            <i class="far fa-calendar-alt"></i>
                        </span><!--
                        --><span>
                            <p>Brulant</p>
                            <i class="fas fa-burn"></i>
                        </span><!--
                        --><span>
                            <p>Idée</p>
                            <i class="far fa-lightbulb"></i>
                        </span>
                    </div>
                </div>
                <span class="slide-right"></span>
            </div>

            <div>
                <span class="display">
                    <i class="fas fa-folder-open"></i>
                </span>

                <input type="hidden" name="projectIcon" id="projectIcon" value="fas fa-folder-open">
                <input type="hidden" name="page" value="projectEdit.php">
                <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>">

            </div>
            <div>
                <label class="fillR">Valider
                    <input type="submit" value="Valider">
                </label>
            </div>
        </form>
    </div>

    <div class="drop">
        <form action="redirect.php" method="GET">
            <span>
                <i class="fas fa-exclamation-triangle"></i>
            </span>

            <p>La suppression du projet entrainera la perte de toutes les taches et des sous-projet associés</p>

            <p> Voulez vous vraiment continuer ? </p>

            <label class="fillR">Valider
                <input type="submit" value="Valider">
            </label>

            <input type="hidden" name="page" value="project.php">
            <input type="hidden" name="delete" value="true">
            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>">

        </form>
    </div>

    <div class="rien">
    </div>
</div>