<?php
    require ("models/nav-class.php");
    $controllNavPagina = new navPegi();
      
    if(isset($_GET['pagi']) > 0){
        $controllNavPagina->nav($_GET['pagi']);
    }else{
        header("Location: ?pagi=login");
    }
 ?>   