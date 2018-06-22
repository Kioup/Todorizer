<li>
        <form method="POST" action="">
            <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
            <input type="hidden" name="view" value="childNodeList">
            <input type="hidden" name="nodePath" value="<?php echo $subNode->getNodePath(); ?>">
            <a href="#" onclick="this.parentNode.submit()" >
                <span><?php echo $subNode->getTitle()." (". $subNode->getNodePath() . ")";?></span>
            </a> 
        </form>
</li>