<?php
$projectId=$project->getId();
$nodeId=$currentNode->getId();
?>

<h3>Configuration des échéances pour <i> <?php echo $currentNode->getTitle() ; ?> </i></h3>

<br>
<br>
<br>

<div style="width:100%; align:center;">

<form action="redirect.php" method="GET">
<p>DEBUT:</p>
    <p> &nbsp Date: <input  type="date" name="start_date"></p>    
    <p> &nbsp heure: <input type="time" name="start_time" value="00:00"> </p>

    <br><br><br>
    
    <p>FIN:</p>
    <p> &nbsp Date: <input  type="date" name="end_date"></p>    
    <p> &nbsp heure: <input type="time" name="end_time" value="00:00"> </p>

    <br><br><br>

    <div>
        <label class="fillR">Valider
            <input type="submit" value="Valider" style="display:none">
        </label>
    </div>
    
    <input type="hidden" name="nodeDate" id="nodeDate">
    <input type="hidden" name="page" value="nodeEdit.php">
    <input type="hidden" name="nodeId" value="<?php echo $nodeId; ?>">
    <input type="hidden" name="nodePath" value="<?php echo $currentNode->getNodePath(); ?>">
    <input type="hidden" name="projectId" value="<?php echo $projectId; ?>">


</form>
</div>
