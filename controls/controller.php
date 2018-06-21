<?php

    $projectList = [];

//    require_once('model/node.class.php');
//    require 'model/project.class.php';
//    require 'controls/projectController.class.php';
//    require 'controls/nodeController.class.php';
    require 'model/user.class.php';
    //require 'model/nodeManager.class.php';

//    $projectController = new ProjectController();
//    $nodeController = new NodeController();
/* 
    $nodeManager = new NodeManager();
    var_dump($nodeManager-> extract_all_test());
 */
    // temp debug: 

    $user = new User();
    $data = [];
    $data['id'] = 3;
    $date['name'] = "toto";
    $user->hydrate($data);
    /////

    if (isset($_POST) && isset($_POST['page'])) {
        switch ($_POST['page']) {
            case 'connect':
                $_SESSION['user'] = serialize($user);
                break;
            case 'deco':
                unset($_SESSION['user']);
                unset($_SESSION['projectList']);
                unset($_SESSION['node_path']);
                session_destroy();
                $page = 'project.php';
                break;
            default:
                $page = $_POST['page'];
        }
        if (in_array($_POST['page'], ['connect','deco'])) header('Location:index.php');
    }

    if (isset($_SESSION['user'])) {
        $user=unserialize($_SESSION['user'] );
        $id_user=$user->getId();

        require_once(__CONTROLROOT__ . 'loggedController.php');
        $loggedController=new LoggedController($id_user);

        if (isset($_POST['view'])){
            if ($_POST['view']=="nodeList"){                           
                $loggedController->displayProjectNodes($_POST['projectId'] );
            }        
        }
        else{
            $loggedController->displayAllProjects();
        } 

    } else {

        include_once(__CONTROLROOT__ . 'loggoutController.php');
    }




?>


    

    
