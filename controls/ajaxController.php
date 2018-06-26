<?php
define('__MODELROOT__', '../model/');
require_once(__MODELROOT__ .'projectManager.class.php');
require_once(__MODELROOT__ .'nodeManager.class.php');

$projectManager=new ProjectManager();


var_dump($_POST);

if (isset($_POST['ajax'])){

    switch($_POST['ajax']){

        case "nameProjectUpdate":
           $projectManager->update($_POST['projectId'], $_POST['name']);
            break;

        case "titleNodeUpdate":
            $projectManager->update($_POST['title'], $_POST['name']);
            break;
             
        case "descriptionNodeUpdate":
            $projectManager->update($_POST['description'], $_POST['name']);
            break;

    }


}

?>