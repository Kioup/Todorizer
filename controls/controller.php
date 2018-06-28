<?php

    $projectList = [];

    require 'model/user.class.php';
    require 'model/userManager.class.php';
    $userManager = new UserManager();
    // Dev user: 
    $user = new User();
    $data = ['id' => 7, 'name' => 'tante germaine'];
    $user->hydrate($data);
    //**

    if (isset($_POST) && isset($_POST['page'])) {
        switch ($_POST['page']) {
            case 'inscription':
                $user->hydrate($userManager->create());
                $page = 'blank.php';
                break;
                
            // Dev User;
            case 'connect':
                $_SESSION['user'] = serialize($user);
                $page = 'blank.php';
                break;
            //**
                
            case 'suppCompte':
                $userManager->delete(unserialize($_SESSION['user'])->getId());
                
            case 'login' :
                if ($u = $userManager->connect()){
                    $user->hydrate($u);
                    $page = 'blank.php';
                    break;
                } else {
                    $error = true;
                }
                
            case 'deco':
                foreach(['user','projectList','node_path','project','currentProject'] as $sessionVar) unset($_SESSION[$sessionVar]);
                session_destroy();
                $page = 'connexion.php';
                break;
                
            case 'changePwd.php':
                
                if (isset($_POST['pwd1']) && isset($_POST['pwd2'])) {
                    $error = false;
                    if ($_POST['pwd1'] == $_POST['pwd2']) {
                        if ($userManager->updatePwd($_POST['pwd1'], unserialize($_SESSION['user'])->getId())) $error = true;
                    }
                }
                
            default:
                $page = $_POST['page'];
        }
    }

    //User controller
    if (isset($_SESSION['user'])) {
        
        $user = unserialize($_SESSION['user'] );
        $id_user = $user->getId();

        require_once(__CONTROLROOT__ . 'loggedController.php');
        $loggedController = new LoggedController($id_user);
        
        switch ($page) {
            
            case 'blank.php':
            case 'project.php':
                if (isset($_POST['delete']))                     
                    $loggedController->deleteProject($_POST['projectId']);
                
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
                $page='blank.php';
                break;
                
            case 'newProject.php':  
                $page='blank.php';
                $loggedController->createNewProject();
                break;
                
            case 'projectEdit.php':
                if (isset($_POST['projectIcon']))   $loggedController->updateProjectIcon($_POST['projectId'],$_POST['projectIcon']);
                if (isset($_POST['projectColor']))  $loggedController->updateProjectColor($_POST['projectId'],$_POST['projectColor']);
                $page='blank';
                $loggedController->editProject($_POST['projectId']);
                break;
                
            case 'nodeEdit.php':
                if (isset($_POST['start_date']))  $loggedController->update_start_dateNode($_POST['start_date'] ." ".$_POST['start_time'].":00", $_POST['nodeId']);  
                if (isset($_POST['end_date']))  $loggedController->update_end_dateNode($_POST['end_date'] ." ".$_POST['end_time'].":00", $_POST['nodeId']);                    
                $page='blank';
                $loggedController->editNode($_POST['projectId'], $_POST['nodePath']);
                break;


            case 'profil.php':
                if (isset($_POST['name'])) {
                    $user->hydrate($userManager->update($user));
                    $_SESSION['user'] = serialize($user);
                }

            default:
                $url->showHeaderCON();
    
        }
        
    //NoUser controller
    } else {
        include_once(__CONTROLROOT__ . 'loggoutController.php');
    }

?>
