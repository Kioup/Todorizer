<?php

    require 'model/manager.php'; 
    require 'model/db.class.php'; 

    $connection = new Connection();

    $db = $connection->get_connection();
    

    $m = new Manager();

    if (isset($_GET) && isset($_GET['co'])) {
        if ($_GET['co'] == 'true') $_SESSION['user'] = true;
        if ($_GET['co'] == 'false') unset($_SESSION['user']);
    }

?>


    

    
