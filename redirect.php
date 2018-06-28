<form id="redirectForm" action="http://todorizer.santhor.com/" method="POST">
    <?php
        foreach ($_GET as $name => $value) {
            echo '<input type="hidden" name="'.htmlentities($name).'" value="'.htmlentities($value).'">';
        } 
    ?>
</form>
<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>