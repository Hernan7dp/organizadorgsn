<!DOCTYPE html>
<?php
session_start();
if (!$_SESSION['name']) {
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
        <div id="main">
            <?php
            include('../includes/menu2.php');
            ?>
        </div>
        <div>
            <div class="subtitle">
                <h2>Edición de proyectos</h2>
            </div>
            <br>
        </div>
        <div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");

            //QUEDA VER MENSAJES Y ESTATUS (PORCENTAJE COMPLETADO)
            $sql3 = "SELECT * FROM projects WHERE id_p=$id_p";
            $ressql3 = mysqli_query($mysqli, $sql3);
            while ($row = mysqli_fetch_row($ressql3)) {
                $id_p = $row[0];
                $project = $row[1];
                $title = $row[2];
                $deadline = $row[3];
                $fulfillment = $row[4];
                $task_1 = $row[5];
                $task_2 = $row[6];
                $task_3 = $row[7];
                $userp_id = $row[8];
            }
            ?>
            <div id="registro">
                <h2>Editar Proyecto</h2>
                <form action="editareg.php" method="POST">
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
                    Cumplimiento<br>
                    <input type="text" name="fulfillment" value="<?php echo $fulfillment ?>">
                    <br>
                    Tarea 1<br>
                    <input type="text" name="task_1" value="<?php echo $task_1 ?>">
                    <br>
                    Tarea 2<br>
                    <input type="text" name="task_2" value="<?php echo $task_2 ?>">
                    <br>
                    Tarea 3<br>
                    <input type="text" name="task_3" value="<?php echo $task_3 ?>">
                    <br>
                    Usuario<br>
                    <input type="text" name="userp_id" value="<?php echo $userp_id ?>">
                    <br>

                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </body>
</html>
