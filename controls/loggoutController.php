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

    //Load project session
    if (isset($_SESSION['current_project'])) {
        
        $currentProject = unserialize($_SESSION['current_project']);

        if (isset($_POST['name'])) {            
            $currentProject->setName($_POST['name']);
        }  
    
    //Create new project
    } else {   
        $currentProject = $projectController->addProject(); // création d'un nouveau projet vide
    }



    //Node title
    if (isset($_POST['title'])) {
        
        //Update title
        if(isset($_POST['taskUpdate'])) {
            $id = $_POST['taskUpdate'];
            $updateNode = $currentProject->getNodeList()[$id];
            $updateNode->setTitle($_POST['title']);
            $currentProject = $projectController->updateNode($currentProject, $updateNode, $id);
        
        //New title -> new node
        } else {
            $newNode = $nodeController->CreateNode($currentProject);
            $newNode = $nodeController->setNode($newNode,$_SESSION['node_path']);
            $currentProject = $projectController->addNode($currentProject, $newNode);
            /* Variable PHP to js */
            if (isset($_POST['ajax'])) echo '_*_*_' . count($currentProject->getNodeList());
        }
    } 

    //Update description
    if (isset($_POST['description']) && isset($_POST['taskUpdate'])) {
        $id = $_POST['taskUpdate'];
        $updateNode = $currentProject->getNode($id);
        $updateNode->setDescription($_POST['description']);
        $currentProject = $projectController->updateNode($currentProject, $updateNode, $id);
    }

    if (isset($_POST['id_to_remove'])) {
        
    }

    //Save session project
    $_SESSION['current_project'] = serialize($currentProject);    


    if (!isset($_POST['ajax'])) $url->showHeader();
?>