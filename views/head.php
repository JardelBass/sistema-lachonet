<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="public/stylesheets/materialize.min.css"  media="screen,projection"/>
        <!--Q-Snack application style-->
        <?php if(isset($_SESSION['level']) && $_SESSION['level'] == "admin"){ ?>
          <link type="text/css" rel="stylesheet" href="public/stylesheets/admin.css" media="screen,projection"/>
        <?php }else{ ?>
          <link type="text/css" rel="stylesheet" href="public/stylesheets/styles.css" media="screen,projection"/>
        <?php }?>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>