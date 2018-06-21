
    --><main>
        <section>
            <div class="titre">
                <h2>Projets</h2>

                <ul>
                <?php
                    foreach ($projectList as $project){
                ?>
                    <li>
                        <form method="POST" action="">
                            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
                            <input type="hidden" name="view" value="nodeList">
                            <a href="#" onclick="this.parentNode.submit()" >
                                <span><?php echo $project->getName(); ?></span>
                                <span><i class="<?php echo ($project->getIcon) ?: 'fas fas-folder'; ?>"></i></span>                
                            </a> 
                        </form>
                    </li>
                
                
                
                    <!--echo "<br>".$project->getName();    
                    //echo "<br>".$project->getId();-->   
                <?php
                }

                ?>
                </ul>

            </div>
        </section><section>
            <div class="titre">
                <h2>Notifications</h2>
            </div>
        </section>
    </main>