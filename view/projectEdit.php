--><main>

<?php
echo $project->getName();
//$attachmentLink="redirect.php?projectId=" . $project->getId() . "&view=nodeList&nodePath=" . $subChildNode->getNodePath()

?>
        <div class="edit">
            <div class="entete">
            <form>
                <input type="text" value="nom du projet">
            </form>
            </div>
            <div class="contenu">
                <div>
                    <span class="fill PJ"><i class="fas fa-paperclip"></i><p>Pièce jointe</p></span>
                    <span class="fill colors"><i class="fas fa-palette"></i><p>Couleur du projet</p></span>
                    <span class="fill notif"><i class="fas fa-envelope"></i><p>Notifications</p></span>
                    <span class="fill CR"><i class="fas fa-print"></i><p>Compte rendu</p></span>
                </div>
                <form>
                    <textarea value="description longue et fastidieuse du projet">
                    </textarea>
                </form>
            </div>
        </div>
    </main><!--
--><div class="overlay"></div><!--
--><div class="popup">
<!--         <div class="color">
            <form method="POST" action="">
            <input class="jscolor {onFineChange:'changeColor(this)'}" value="ffffff">
            <p>Clickez sur le champs de texte pour le modifier</p>
            <div>
                <p class="pickit" id="rect"><i class="<?php echo "fas fa-" . ((isset($project) && $project->getIcon()) ? $project->getIcon() : 'folder'); ?>"></i></p>
                <span id="roct"><i class="<?php echo "fas fa-" . ((isset($project) && $project->getIcon()) ? $project->getIcon() : 'folder'); ?>"></i></span>
            </div>
            <div>
                <label class="fillR">Valider
                    <input type="submit" value="Valider">
                </label>
            </div>
            </form>
        </div> -->
        <div class="icons">
            <form method="POST" action="">
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
                <input type="hidden" value="">
            </div>
            <div>
                <label class="fillR">Valider
                    <input type="submit" value="Valider">
                </label>
            </div>
        </form>
        </div>
</div>