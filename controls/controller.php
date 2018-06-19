<?php

    $projectList=array();
    //var_dump($_SESSION);

    require 'model/node.class.php';
    require 'model/project.class.php';
    require 'controls/projectController.class.php';


    if (isset($_GET) && isset($_GET['co'])) {
        if ($_GET['co'] == 'true') $_SESSION['user'] = true;
        if ($_GET['co'] == 'false') {
            unset($_SESSION['user']);
            unset($_SESSION['projectList']);
        }
    }


    $projectController=new ProjectController();

    if (isset($_SESSION['projectList'])){
       // var_dump($_SESSION['projectList']);
        $projectList=unserialize($_SESSION['projectList']);   
        $projectName=$_POST['name'];
        $projectList[0]->setName($projectName);
        $projectController->updateProject($projectList[0]);     
    }
    else{
        $projectController->addProject(); // création d'un nouveau projet vide
        $projectList=[$projectController->getProject()];      
    }

    $_SESSION['projectList']=serialize($projectList);
    //var_dump($_SESSION);
    $projectController->testProject();

   // var_dump($projectController);
    $page="project.php";



?>


    

    
