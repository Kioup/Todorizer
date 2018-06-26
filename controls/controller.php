<?php

    $projectList = [];

    require 'model/user.class.php';
    require 'model/userManager.class.php';
    $userManager = new UserManager();
    // Dev user: 
    $user = new User();
    $data = ['id' => 3, 'name' => 'toto'];
    $user->hydrate($data);
    //**

    if (isset($_POST) && isset($_POST['page'])) {
        switch ($_POST['page']) {
            case 'inscription':
                $user->hydrate($userManager->create());
                $page = 'blank.php';
                break;
            case 'login' :
                $user->hydrate($userManager->connect());
                $page = 'blank.php';
                break;
            case 'connect':
                $_SESSION['user'] = serialize($user);
                $page = 'blank.php';
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
        $loggedController = new LoggedController($id_user);

        if (in_array($page,['blank.php', 'project.php'])) {
            if (isset($_POST['view'])) {
                switch ($_POST['view']){
                    case 'rootNodeList':
                        $loggedController->displayRootNodes($_POST['projectId']);                  
                        break;
                    case 'nodeList':
                        $loggedController->displayNodes($_POST['projectId'], $_POST['nodePath']);
                        break;                             
                }       
            } else {
                $loggedController->displayAllProjects();
            }
            
        } else {
            
            $url->showHeaderCON();
            
        }
    //NoUser controller
    } else {
        include_once(__CONTROLROOT__ . 'loggoutController.php');
    }




?>


    

    
