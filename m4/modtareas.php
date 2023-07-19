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
                <h2>Gestión de proyectos</h2>
            </div>
            <br>
        </div>
        <div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");
            
            //QUEDA VER MENSAJES Y ESTATUS (PORCENTAJE COMPLETADO)
            $sql3="SELECT * FROM projects WHERE id_p=$id_p";
                    $ressql3= mysqli_query($mysqli, $sql3);
                    while($row= mysqli_fetch_row($ressql3)){
                        $id_p=$row[0];
                        $project=$row[1];
                        $title=$row[2];
                        $deadline=$row[3];
                        $works=$row[4];
                        $fulfillment=$row[5];
                    }
            ?>
            <div id="registro">
                <h2>Editar Proyecto</h2>
                <form action="modproyectos2.php" method="POST">
                    ID<br>
                    <input type="text" name="id_p" value="<?php echo $id_p ?>" readonly="readonly">
                    <br>
                    Proyecto<br>
                    <input type="text" name="project" value="<?php echo $project ?>">
                    <br>
                    Título<br>
                    <input type="text" name="title" value="<?php echo $title ?>">
                    <br>
                    Plazo<br>
                    <input type="date" name="deadline" value="<?php echo $deadline ?>">
                    <br>
                    Tareas<br>
                    <input type="text" name="works" value="<?php echo $works ?>">
                    <br>
                    Cumplimiento<br>
                    <input type="text" name="fulfillment" value="<?php echo $fulfillment ?>">
                    <br>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </body>
</html>
