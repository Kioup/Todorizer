
<li>
        <form method="POST" action="">
            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
            <input type="hidden" name="view" value="childNodeList">
            <input type="hidden" name="nodePath" value="<?php echo $node->getNodePath(); ?>">
            <a href="#" onclick="this.parentNode.submit()" >
                <span><?php echo $node->getTitle()." (". $node->getNodePath() . ")";?></span>
            </a> 
        </form>
</li>