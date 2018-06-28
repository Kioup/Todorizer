
    --><main>
        <section>
            <div class="titre">
                <h2 class="underline">Projets</h2>
            </div>
            <div class="contenu dashboard">
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
                <h2 class="underline">Notification</h2>
            </div>
        </section>
    </main>