--><main>
        <section>

            <?php
            echo '<div class="titre"><h2>';
            echo $project->getName()." (".$project->getId().") </h2>";
            echo '<ul>';
            foreach ($project->getNodeList() as $node){                
                // enfants niveau 1:
                if (strlen ($node->getNodePath())==3){
                   // echo "<BR> - ".$node->getTitle()." ".$node->getNodePath();
                    include 'view/rootNode.php';

                    // enfants niveau 2:
                    echo '<div style="padding-left:4em; font-size:0.9em;"><ul >';
                    foreach ($project->getNodeList() as $currentChildNode){                         
                         if( (strlen ($currentChildNode->getNodePath())==5) && (stripos($currentChildNode->getNodePath(), $node->getNodePath()) ===0) ){        
                            //echo "<BR> -----  ".$subNode->getTitle()." ".$subNode->getNodePath()." ".stripos($subNode->getNodePath(), $node->getNodePath());
                            include 'view/node.php';
                        }                         
                    }
                    echo "</ul></div>";
                }            
            } 
            echo "</ul>"; 
            echo '</div>';
?>


</section><section>
<div class="titre">
<h2>Notifications</h2>
</div>
</section>
</main>