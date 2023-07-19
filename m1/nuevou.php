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
                <h2>Crea un Nuevo Usuario</h2>
            </div>
            <br>
            <div id="registro">
                <h2>Nuevo usuario</h2>
                <form action="nuevoureg.php" method="POST">
                    <input type="text" name="nombre" placeholder="Escribe el nombre completo">
                    <input type="email" name="email" placeholder="Escribe el email">
                    <input type="password" name="pass" placeholder="Escribe una contraseña">
                    <input type="password" name="repass" placeholder="Repite la contraseña">
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </body>
</html>
