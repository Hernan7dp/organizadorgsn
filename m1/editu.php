<!DOCTYPE html>
<?php
    session_start();
    if(!$_SESSION['name']){
        header("location:../index.php");
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar datos</title>
    </head>
    <body>
        <header>
            <?php
            include("../includes/header2.php");
            ?>
        </header>
        <div>
            <?php
            include('../includes/menu2ad.php');
            ?>
        </div>
        <div>
            <div class="subtitle">
                <h2>Administración de usuarios registrados</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Edición de usuarios</h4>
            </div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");
            
            $sql="SELECT * FROM login WHERE id_u=$id_u";
                    $ressql= mysqli_query($mysqli, $sql);
                    while($row= mysqli_fetch_row($ressql)){
                        $id_u=$row[0];
                        $name=$row[1];
                        $email=$row[2];
                        $password=$row[3];
                        $role=$row[4];
                    }
            ?>
            <div id="registro">
                <form action="editureg.php" method="POST">
                ID<br>
                <input type="text" name="id_u" value="<?php echo $id_u ?>" readonly="readonly">
                <br>
                Nombre<br>
                <input type="text" name="name" value="<?php echo $name ?>">
                <br>
                Email<br>
                <input type="email" name="email" value="<?php echo $email ?>">
                <br>
                Contraseña<br>
                <input type="text" name="password" value="<?php echo $password ?>">
                <br>
                Rol<br>
                <input type="text" name="role" value="<?php echo $role ?>">
                <br>
                <input type="submit"value="Guardar">
            </form>
            </div>
        </div>
    </body>
</html>
