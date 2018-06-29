<?php

    /** NODE DATES EDIT **/ 

    $startD = false;
    $startT = false;
    $endD = false;
    $endT = false;
    if ($d = $currentNode->getStartDate()) {
        $startD = substr($d,0,10);
        $startT = substr($d,11,16);
    }
    if ($d = $currentNode->getEndDate()) {
        $endD = substr($d,0,10);
        $endT = substr($d,11,16);
    }

?>

<h3>Configuration des échéances pour <i> <?php echo $currentNode->getTitle() ; ?> </i></h3>

<br>
<br>
<br>

<div style="width:100%; align:center;">

    <form action="redirect.php" method="GET">
        
        <p>DEBUT:</p>
        <br>
        
        <p> &nbsp Date: <input  type="date" name="start_date"  value="<?php echo $startD ?: ''; ?>"></p>    
        <p> &nbsp heure: <input type="time" name="start_time" value="<?php echo $startT ?: '00:00'; ?>"> </p>

        <br><br><br>

        <p>FIN:</p>
        <br>
        
        <p> &nbsp Date: <input  type="date" name="end_date"  value="<?php echo $endD ?: ''; ?>"></p>    
        <p> &nbsp heure: <input type="time" name="end_time"  value="<?php echo $endT ?: '00:00'; ?>"> </p>

        <br><br><br>

        <div>
            <label class="fillR">Valider
                <input type="submit" value="Valider" style="display:none">
            </label>
        </div>

        <input type="hidden" name="nodeDate" id="nodeDate">
        <input type="hidden" name="page" value="nodeEdit.php">
        <input type="hidden" name="nodeId" value="<?php echo $currentNode->getId(); ?>">
        <input type="hidden" name="nodePath" value="<?php echo $currentNode->getNodePath(); ?>">
        <input type="hidden" name="projectId" value="<?php echo $project->getId(); ?>">

    </form>
</div>
