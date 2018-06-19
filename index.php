<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $page = "index.php";

    include_once('controls/controlleur.php');
    
    include_once('assets/header.php');

    include_once('assets/aside.php');

    if (isset($_SESSION['user'])) {

        include_once('assets/header2.php');

    } else {

        include_once('assets/header3.php');

    }


?>
        
<div class="container">
    
<?php

    include_once('view/' .$page);

?>
    
</div>

<?php

    include_once('assets/footer.php');

?>