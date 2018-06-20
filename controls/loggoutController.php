<?php


    if (isset($_SESSION['current_project'])) {

        $currentProject = unserialize($_SESSION['current_project']);

        if (isset($_POST['name'])) {
            
            $currentProject->setName($_POST['name']);

        }  


        

    } else {
        
        $currentProject = $projectController->addProject(); // création d'un nouveau projet vide
       
    }
    // debug:
    if (isset($_GET['node_path'])){
        $_SESSION['node_path']=$currentProject->getName().$_GET['node_path'];
        echo $_SESSION['node_path'];
    }
    // fin debug

    if (isset($_SESSION['node_path'])) {
        
    } else {
        $_SESSION['node_path'] = $currentProject->getName();
    }
    

     if (isset($_POST['title'])) {
     
        // création d'un nouveau noeud enfant:
        $newNode=$nodeController->CreateNode($currentProject);
        $newNode=$nodeController->setNode($newNode,$_SESSION['node_path']);

        if ($_SESSION['node_path']>0){
            // ajout du noeud au noeud courant (si on est entré dans l'arborescence)
            $currentNode=$nodeController->addChildNode($currentNode,$newNode);
        }
        else{
            //ajout du noeud au projet courant (si on est à la racine du projet)
            $currentProject=$projectController->addRootNode($currentProject,$newNode);
        }

        $testList=$currentProject->getNodeList();    
        var_dump($testList);
    } 

    $_SESSION['current_project'] = serialize($currentProject);    

    //$page = "project.php";

?>