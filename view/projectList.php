
    --><main>
    <section>
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
                            <span><?php echo $project->getName(); ?></span>
                            <span><i class="<?php echo ($project->getIcon) ?: 'fas fas-folder'; ?>"></i></span>                
                        </a> 
                    </form>
                </li>
            
      
            <?php
            }

            ?>
            </ul>

        </div>
    </section><section>
        <div class="titre">
            <h2 class="underline">Notifications</h2>
        </div>
    </section>
</main>