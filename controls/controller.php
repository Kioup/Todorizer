<?php

    $projectList = [];

    require 'model/node.class.php';
    require 'model/project.class.php';
    require 'controls/projectController.class.php';
    require 'controls/nodeController.class.php';

    $projectController = new ProjectController();
    $nodeController = new NodeController();


    if (isset($_POST) && isset($_POST['page'])) {
        //var_dump($_POST);
        switch ($_POST['page']) {
            case 'connect':
                $_SESSION['user'] = true;
                break;
            case 'deco':
                unset($_SESSION['user']);
                unset($_SESSION['projectList']);
                session_destroy();
                session_start();
                $page = 'project.php';
                break;
            default:
                $page = $_POST['page'];
        }
    }

    if (isset($_SESSION['user'])) {
        include_once('./controls/loggedController.php');
    } else {
        include_once('./controls/loggoutController.php');
    }


?>


    

    
