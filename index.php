<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }



    $page = "index.php";


    if (isset($_POST) && isset($_POST['page'])) $page = $_POST['page'];

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
        
<div class="container">
    
<?php

    include('view/' .$page);

?>
    
</div>

<?php

    include('assets/footer.php');

?>