
    --><main>
    <section class="dash-mobile">
        <div class="titre">
            <h2 class="underline">Projets</h2>
            </div>
            <div class="contenu dashboard">
            <ul>
            <?php
                foreach ($projectList as $project){
            ?>
                <li>
                    <form method="POST" action="">
                        <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
                        <input type="hidden" name="view" value="rootNodeList">
                        <a href="#" onclick="this.parentNode.submit()" >
                            <p><?php echo $project->getName(); ?></p>
                            <span class="background-icon" style="background: <?php echo ($project->getIconColor() ?: "white") ?> "></span>
                            <span><i class="<?php echo "fas fa-". ($project->getIcon() ?: 'folder'); ?>"></i></span>                
                        </a> 
                    </form>
                </li>
            
      
            <?php
                }
            ?>
                <li  class="new">
                    <form method="POST" action="">
                        <input type="hidden" id="projectRoot" value="0">
                        <a href="#" onclick="this.parentNode.submit()" >
                            <p>Nouveau</p>
                            <span><i class="fas fa-folder"></i></span>
                            <span><i class="fas fa-plus-circle"></i></span>
                        </a>
                    </form>
                </li>
            </ul>

        </div>
    </section><section>
        <div class="titre">
            <h2 class="underline">Notifications</h2>
        </div>
    </section>
</main>