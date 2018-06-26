nodeList:

--><main>
        <section> 

                <?php 
                
                    echo '<div class="titre"><h2 class="underline">';
            echo $project->getName()." (".$project->getId().") </h2>";
            echo '<ul>';               

                    if ($nb_children){
                        for ($i = 1; $i <= $nb_children; $i++) {
                            $currentChildNode=$sortedNodeList[$currentNodePath.".".$i];
                            include 'view/node.php';
                            
                            $nb_subChildren=$currentChildNode->getNbChildren();

                            if ($nb_subChildren){
                                echo '<ul style="padding-left:5em;">';
                                for ($j = 1; $j <= $nb_subChildren; $j++) {
                                    $currentChildNode=$sortedNodeList[($currentNodePath.".".$i).".".$j];
                                    include 'view/node.php';
                                }
                                echo '</ul>';
                            } 
                    

                        }
                    }   




                ?>
                
            </div>
        </section><section>
            <div class="titre">
                <h2 class="underline">Notifications</h2>
            </div>
        </section>
    </main>