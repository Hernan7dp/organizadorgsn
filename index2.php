<!DOCTYPE html>

<?php
session_start();
if(!$_SESSION['name']){
    header("location:index.php");
}
/*elseif ($_SESSION['role']==1) {
    header("location:usuarios.php");
}*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <header>
            <?php
            include("includes/header.php");
            ?>
        </header>
        <div id="main">
            <?php
            if ($_SESSION['role']=='1') {
            include('includes/menuad.php');
            include('includes/introad.php');
            }else{
                include('includes/menu.php');
                include('includes/intro.php');
            }
            ?>
        </div>
        
    </body>
</html>
