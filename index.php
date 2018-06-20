<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    if (isset($_SESSION['user'])) {
        $page = "index.php";
    } else {
        $page = "project.php";
    }


    

    include('controls/controller.php');
    
    
    include('assets/header.php');

    if (isset($_SESSION['user'])) {

        include('assets/aside.php');
        include('assets/header2.php');

    } else {

        include('assets/aside2.php');        
        include('assets/header3.php');

    }


?>

<div class="container" id="prout-<?php echo $page; ?>">
    
<?php

    include('view/' .$page);

?>
    
</div>

<?php

    include('assets/footer.php');

?>