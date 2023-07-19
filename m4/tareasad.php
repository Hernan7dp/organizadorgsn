<!DOCTYPE html>

<?php
session_start();
if(!$_SESSION['name']){
    header("Location:index.php");
}
/*elseif ($_SESSION['role']=='0') {
    header("Location:index2-2020.php");
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
            include('../includes/header2.php');
            ?>
        </header>
        <div>
            <?php
            if ($_SESSION['role']=='1') {
            include('../includes/menu2ad.php');
            }else{
                include('../includes/menu2.php');
            }
            ?>
        </div>
        <div>
            <div class="subtitle">
                <h2>Tareas</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Tabla de tareas</h4>
            </div>
            <div id="new">
                <a href='../m4/nuevat.php'>Nueva tarea <img src='../images/n_tarea.png' alt="Nuevo" class=''></a>
            </div>
            <div>
                <?php
                require('../conectar_bd.php');
                
                        /*$sql4=("SELECT task_1, task_2, task_3, task_4 FROM tasks");
                $query2t= mysqli_query($mysqli, $sql4);*/
                
                $sql4="SELECT tasks.id_t, login.id_u, login.name, projects.id_p, projects.project, tasks.task_1, tasks.task_2, tasks.task_3, tasks.task_4 FROM tasks INNER JOIN login ON tasks.usert_id = login.id_u INNER JOIN projects ON tasks.projectt_id = projects.id_p";
                $query2t= mysqli_query($mysqli, $sql4);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id de Tarea</td>";
                        echo "<td>Nombre</td>";
                        echo "<td>Proyecto Asignado</td>";
                        echo "<td>Tarea 1</td>";
                        echo "<td>Tarea 2</td>";
                        echo "<td>Tarea 3</td>";
                        echo "<td>Tarea 4</td>";
                        echo "<td>Editar</td>";
                        echo "<td>Borrar</td>";
                    echo "</tr>";
                    
                    while ($matrizt=mysqli_fetch_array($query2t)) {
                        echo "<tr class=''>";
                        echo "<td>$matrizt[0]</td>";
                        echo "<td>$matrizt[2]</td>";
                        echo "<td>$matrizt[4]</td>";
                        echo "<td>$matrizt[5]</td>";
                        echo "<td>$matrizt[6]</td>";
                        echo "<td>$matrizt[7]</td>";
                        echo "<td>$matrizt[8]</td>";
                        echo "<td><a href='../m4/editt.php?id_t=$matrizt[0]'><img src='../images/actualizar.png' class=''></td>";
                        echo "<td><a href='../m4/tareasad.php?id_t=$matrizt[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                    extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM tasks WHERE id_t=$id_t";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("TAREA ELIMINADA")</script>';
                            echo "<script>location.href='../m4/tareasad.php'</script>";
                        }
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
