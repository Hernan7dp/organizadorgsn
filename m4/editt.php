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
                <h2>Edición de tareas</h2>
            </div>
            <br>
        </div>
        <div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");
            
            $sql7="SELECT * FROM tasks WHERE id_t=$id_t";
                    $ressql7= mysqli_query($mysqli, $sql7);
                    while($row= mysqli_fetch_row($ressql7)){
                        $id_t=$row[0];
                        $usert_id=$row[1];
                        $projectt_id=$row[2];
                        $task_1=$row[3];
                        $task_2=$row[4];
                        $task_3=$row[5];
                        $task_4=$row[5];
                    }
            ?>
            <div id="registro">
                <h2>Editar Tarea</h2>
                <form action="edittreg.php" method="POST">
                    ID<br>
                    <input type="text" name="id_t" value="<?php echo $id_t ?>" readonly="readonly">
                    <br>
                    Usuario<br>
                    <input type="text" name="usert_id" value="<?php echo $usert_id ?>">
                    <br>
                    Proyecto<br>
                    <input type="text" name="projectt_id" value="<?php echo $projectt_id ?>">
                    <br>
                    Tarea 1<br>
                    <textarea name="task_1" rows="4" cols="30"><?php echo $task_1 ?></textarea>
                    <br>
                    Tarea 2<br>
                    <textarea name="task_2" rows="4" cols="30"><?php echo $task_2 ?></textarea>
                    <br>
                    Tarea 3<br>
                    <textarea name="task_3" rows="4" cols="30"><?php echo $task_3 ?></textarea>
                    <br>
                    Tarea 4<br>
                    <textarea name="task_4" rows="4" cols="30"><?php echo $task_4 ?></textarea>
                    <br>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </body>
</html>
