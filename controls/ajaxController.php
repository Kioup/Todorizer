<?php
session_start();
define('__MODELROOT__', '../model/');
define('__CONTROLROOT__', '');

require_once(__MODELROOT__ . 'projectManager.class.php');
require_once(__MODELROOT__ . 'nodeManager.class.php');
require_once(__CONTROLROOT__ . 'nodeController.class.php');

$projectManager=new ProjectManager();
$nodeManager=new NodeManager();
$nodeController=new NodeController();

//var_dump($_POST);


if (isset($_POST['ajax'])){
    //$_SESSION['project']=false;    
    switch($_POST['ajax']){
        case "nameProjectUpdate":
           $projectManager->update($_POST['id_project'], $_POST['name']);
            break;

        case "titleNodeUpdate":
            echo "VALUE: ". $_POST['value'];
            $nodeManager->update_title($_POST['value'], $_POST['nodeId']);
            break;
             
        case "descriptionNodeUpdate":
            $nodeManager->update_description($_POST['value'], $_POST['nodeId']);
            break;

        case "deleteNode":            
            $nodeToDel=$nodeManager->getNode($_POST['nodeId']);
            if ($id_parent=$nodeToDel->getIdParent()){
                $nb_Brothers=$nodeManager->getNode($id_parent)->getNbChildren();
                $nodeManager->update_nb_children($id_parent,$nb_Brothers,-1);                
            }
            $nodeManager->delete_node($_POST['nodeId']);
            break;

        case "addNode":
            $newNode=$nodeController->createNode();            
            var_dump($_POST);
            $id_project=$_POST['id_project'];

            if (!isset($_POST['id_parent'])){
                $nb_brothers=reset($nodeManager->findRootBrothers($id_project));
                $newId_child=$nb_brothers+1;
                $newNodePath = $id_project.".".$newId_child;

            }
            else{                
                $id_parent=$_POST['id_parent'];
                $parentNode=$nodeManager->getNode($id_parent);               
                $parentNodePath=$parentNode->getNodePath();
                $max_id_children=reset($nodeManager->findBrothers($id_parent));
                $newNodePath=$parentNodePath.".".($max_id_children+1);               
                $nb_Brothers=$parentNode->getNbChildren();
                $nodeManager->update_nb_children($id_parent,$nb_Brothers,1);
            }
            $newNode=$nodeController->setNode($newNode,$newNodePath);
            $newId = $nodeManager->insert($newNode);
            
            //Very important, NO REMOVE!
            echo "_*_*_" . $newId . ":" . $newNodePath;
            break;
      
    }
echo "##### ". $_POST['id_project'];
    $project=$projectManager->extract_Project($_POST['id_project']);
    $nodeList=$nodeManager->extract_ProjectNodes($project);

    $sortedNodeList=array();
    foreach ($nodeList as $node){
        $sortedNodeList[$node->getNodePath()]=$node;
    }
    $project->setNodeList($sortedNodeList);
    $_SESSION['project']=serialize($project);

}


?>