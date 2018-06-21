<?php
session_start();
$url = ((isset($_SESSION['env'])) && ($_SESSION['env'] == 'dev')) ? "http://localhost/todorizer/" : "http://todorizer2.santhor.com/";  
?>

<form id="redirectForm" action="<?php echo $url; ?>" method="POST">
    <?php
        foreach ($_GET as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
        } 
    ?>
</form>
<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>