<?php

    $projectList = [];

    require 'model/user.class.php';



    // Dev user: 
    $user = new User();
    $data = ['id' => 3, 'name' => 'toto'];
    $user->hydrate($data);
    //**

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
        //if (in_array($_POST['page'], ['connect','deco'])) header('Location:index.php');
    }

    //User controller
    if (isset($_SESSION['user'])) {
        $user = unserialize($_SESSION['user'] );
        $id_user = $user->getId();

        require_once(__CONTROLROOT__ . 'loggedController.php');
        $loggedController=new LoggedController($id_user);

        if (isset($_POST['view'])){
            switch ($_POST['view']){
                case 'nodeList':
                    $loggedController->displayProjectNodes($_POST['projectId']);                  
                    break;
                case 'childNodeList':
                    $loggedController->displayChildNodes($_POST['projectId'], $_POST['nodePath']);
                    break;                             
            }       
        } else {
            $loggedController->displayAllProjects();
        } 

    //NoUser controller
    } else {
        include_once(__CONTROLROOT__ . 'loggoutController.php');
    }




?>


    

    
