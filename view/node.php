
<li>
    <form method="POST" action="">
        <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>"> 
        <input type="hidden" name="view" value="nodeList">
        <input type="hidden" name="nodePath" value="<?php echo $currentChildNode->getNodePath(); ?>">
        <a href="#" onclick="this.parentNode.submit()" >
            <span><?php echo "<BR>".$currentChildNode->getTitle() ." (".$currentChildNode->getNodePath(). ")";?></span>
        </a> 
    </form>
</li>