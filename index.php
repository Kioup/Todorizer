<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //define('__ENV__','prod');
    define('__CONTROLROOT__', 'controls/');
    define('__MODELROOT__', 'model/');

    require_once(__MODELROOT__ . 'url.class.php');
    $url = new Url();

    if (isset($_SESSION['user'])) {
        $page = "blank.php";
    } else {
        $page = "project.php";
    }

    include(__CONTROLROOT__ . 'controller.php');

    include('view/' .$page);

    include('assets/footer.php');

?>