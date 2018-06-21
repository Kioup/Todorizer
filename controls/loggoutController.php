<?php
    
    //Start session to ajax call
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!defined('__MODELROOT__')) define('__MODELROOT__', '../model/');
    if (!defined('__CONTROLROOT__')) define('__CONTROLROOT__', '');

    require_once(__MODELROOT__ . 'node.class.php');
    require_once(__MODELROOT__ . 'project.class.php');
    require_once(__CONTROLROOT__ . 'projectController.class.php');
    require_once(__CONTROLROOT__ . 'nodeController.class.php');
    
    $projectController = new ProjectController();
    $nodeController = new NodeController();
    
    //var_dump($_POST);

    if (isset($_SESSION['current_project'])) {
      //  var_dump($_SESSION['current_project']);
        $currentProject = unserialize($_SESSION['current_project']);

        if (isset($_POST['name'])) {            
            $currentProject->setName($_POST['name']);
        }  
        
    } else {        
        $currentProject = $projectController->addProject(); // création d'un nouveau projet vide       
    }

    

    // debug:
    if (isset($_GET['node_path'])){
        $_SESSION['node_path']=$_GET['node_path'];
        echo $_SESSION['node_path'];
    } else {
        $_SESSION['node_path']=null;
    }

    if (isset($_POST['description']) && isset($_POST['taskUpdate'])) {
        echo "newDesc";
        $id = $_POST['taskUpdate'];
        $updateNode = $currentProject->getNode($id);
        $updateNode->setDescription($_POST['description']);
        $currentProject = $projectController->updateNode($currentProject, $updateNode, $id);
    }

    if (isset($_POST['title'])) {
        
        if(isset($_POST['taskUpdate'])) {
            echo "newTitle";
            $id = $_POST['taskUpdate'];
            $updateNode = $currentProject->getNodeList()[$id];
            $updateNode->setTitle($_POST['description']);
            $currentProject = $projectController->updateNode($currentProject, $updateNode, $id);
        } else {
            // création d'un nouveau noeud enfant:
            $newNode = $nodeController->CreateNode($currentProject);
            $newNode = $nodeController->setNode($newNode,$_SESSION['node_path']);
            $currentProject = $projectController->addNode($currentProject, $newNode);
            echo '_*_*_' . count($currentProject->getNodeList());
        }
     
        
        //var_dump($currentProject);
    } 

    $_SESSION['current_project'] = serialize($currentProject);    

    //$page = "project.php";

    $url->showHeader();
    
?>