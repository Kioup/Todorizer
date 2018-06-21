
--><main>
        <section>
            <div class="titre">
                <h2> <?php echo $project->getName(); ?></h2>

                <?php
                    foreach ($project->getNodeList() as $node){
                        echo "<BR>".$node->getTitle();
                    }
                ?>

            </div>
        </section><section>
            <div class="titre">
                <h2>Notifications</h2>
            </div>
        </section>
    </main>