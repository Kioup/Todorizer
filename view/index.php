
    --><main>
        <section>
            <div class="titre">
                <h2>Projets</h2>

                <?php


                    echo "<br>".$project->getName();
                    foreach ($project->getNodeList() as $node){
                        echo "<br>- ".$node->getTitle();    
                    }

                ?>

            </div>
        </section>
        <section>
            <div class="titre">
                <h2>Notifications</h2>
            </div>
        </section>
    </main>