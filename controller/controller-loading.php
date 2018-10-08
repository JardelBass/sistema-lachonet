<?php
    require_once "views/views-loading.php";
?>

<?php if($_SESSION['level'] == "admin"){ ?>
    <script language= "JavaScript">
        setTimeout("document.location = '?pagi=admin'",3000);
    </script>
<?php }else{ ?>
    <script language= "JavaScript">
        setTimeout("document.location = '?pagi=home'",3000);
    </script>
<?php } ?>