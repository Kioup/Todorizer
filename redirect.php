<form id="redirectForm" action="http://todorizer.santhor.com" method="POST">
    <?php
        foreach ($_GET as $a => $b) {
            echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
        }
    ?>
</form>
<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>