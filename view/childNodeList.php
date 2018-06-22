--><main>
        <section>
            <div class="titre">
                <h2> <?php echo $currentNode->getTitle()." (".$currentNode->getNodePath().")"; ?></h2>
 
                <?php
                    if ($nb_children){
                        for ($i = 1; $i <= $nb_children; $i++) {
                            $currentChildNode=$sortedNodeList[$currentNodePath.".".$i];
                ?> 
                <ul>
                    <li>
                        <form method="POST" action="">
                            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
                            <input type="hidden" name="view" value="childNodeList">
                            <input type="hidden" name="nodePath" value="<?php echo $currentChildNode->getNodePath(); ?>">
                            <a href="#" onclick="this.parentNode.submit()" >
                                <span><?php echo "<BR>----- ".$currentChildNode->getTitle() ." (".$currentChildNode->getNodePath(). ")";?></span>
                            </a> 
                        </form>
                    </li>
                
                <?php
                        }
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