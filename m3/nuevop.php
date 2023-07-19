<?php
session_start();
if(!$_SESSION['name']){
    header("location:index.php");
}elseif ($_SESSION['role']=='0') {
    echo '<script>alert("ACCESO SOLO PARA ADMINISTRADOR")</script>';
    echo "<script>location.href='../index2-2020.php'</script>";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Administración de usuarios</title>
       
    </head>
    <body>
        <header>
            <?php
            include('../includes/header2.php');
            ?>
        </header>
        <div>
            <?php
            include('../includes/menu2ad.php');
            ?>
        </div>
        <div>
            <div class="subtitle">
                <h2>Crea un Nuevo Proyecto</h2>
            </div>
            <br>
            <div id="registro">
                <h2>Nuevo Proyecto</h2>
                <form action="nuevopreg.php" method="POST">
                    <input type="text" name="project" placeholder="Escribe el nombre del Proyecto">
                    <input type="text" name="title" placeholder="Escribe el título del Proyecto">
                    <input type="date" name="deadline">
                    <input type="text" name="works" placeholder="Describe las tareas a realizar">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </body>
</html>
