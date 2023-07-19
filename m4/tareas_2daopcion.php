<!DOCTYPE html>

<?php
session_start();
if (!$_SESSION['name']) {
    header("Location:index.php");
}
/* elseif ($_SESSION['role']=='0') {
  header("Location:index2-2020.php");
  } */
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
        <div id="main2">
            <?php
            include('../includes/menu2.php');
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
            <?php
            if ($_SESSION['role'] == '1') {
                ?>
                <!--<div id="new">
                    <a href='nuevot.php'>Nueva tarea <img src='../images/n_tarea.png' alt="Nuevo" class=''></a>
                </div>-->
                <?php
            } else {
                
            }
            ?>

            <div>
                <?php
                require('../conectar_bd.php');

                /* $sql3=("SELECT * FROM projects");
                  $query1t= mysqli_query($mysqli, $sql3); */

                $sql2 = "(SELECT projects.id_p, projects.project, projects.title, projects.deadline, projects.fulfillment, projects.task_1, projects.task_2, projects.message, login.id_u, login.name FROM projects INNER JOIN login ON projects.userp_id = login.id_u)";
                $query2t = mysqli_query($mysqli, $sql2);

                $sql3 = "(SELECT projects.id_p, projects.project, projects.title, projects.deadline, projects.fulfillment, projects.task_1, projects.task_2, projects.message, login.id_u, login.name FROM projects INNER JOIN login ON projects.userp_id = login.id_u)";
                $query1t = mysqli_query($mysqli, $sql3);

                while ($matrizp2 = mysqli_fetch_array($query2t)) {
                    if ($_SESSION['name'] == $matrizp2[9]) {
                        $userwh = $matrizp2[9];
                        //$userwh='nnn';
                        echo $userwh;
                        if ($userwh == $_SESSION['name'] || $_SESSION['role'] == '1') {
                            echo "<table border='1'; class='';>";
                            echo "<tr>";
                            echo "<td>Proyecto Asignado</td>";
                            echo "<td>Tarea 1</td>";
                            echo "<td>Tarea 2</td>";
                            echo "<td>Editar Todas</td>";
                            echo "<td>Borrar Todas</td>";
                            echo "</tr>";

                            while ($matrizp = mysqli_fetch_array($query1t)) {
                                if ($_SESSION['name'] == $matrizp[9] || $_SESSION['role'] == '1') {
                                    echo "<tr class=''>";
                                    // PROYECTO ASIGNADO
                                    echo "<td>$matrizp[1]</td>";
                                    //TAREA 1
                                    if (!empty($matrizp[5])) {
                                        echo "<td><a href='../m4/viewt.php?id_p=$matrizp[0]'><img src='../images/tarea.png' class=''></td>";
                                    } else {
                                        echo "<td><a href='../m4/editt.php?id_p=$matrizp[0]'><img src='../images/n_tarea.png' class=''></td>";
                                    }
                                    //TAREA 2
                                    if (!empty($matrizp[6])) {
                                        echo "<td><a href='../m4/viewt.php?id_p=$matrizp[0]'><img src='../images/tarea.png' class=''></td>";
                                    } else {
                                        echo "<td><a href='../m4/editt.php?id_p=$matrizp[0]'><img src='../images/n_tarea.png' class=''></td>";
                                    }
                                    //EDITAR TAREAS
                                    echo "<td><a href='../m4/editt.php?id_p=$matrizp[0]'><img src='../images/actualizar.png' class=''></td>";
                                    //BORRAR TAREAS
                                    echo "<td><a href='../m4/tareas.php?id_p=$matrizp[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                                    echo "</tr>";
                                }
                            }
                            echo "<table>";
                        } else {
                            echo "<br><br><h3 style=\"color:#ffffff;\">NO TIENES TAREAS PORQUE NO SE TE HA ASIGNADO UN PROYECTO</h3>";
                        }
                    }
                }
                extract($_GET);
                if (@$idborrar == 2) {
                    $sqlborrar = "UPDATE projects SET task_1=NULL, task_2=NULL WHERE id_p=$id_p";
                    $resborrar = mysqli_query($mysqli, $sqlborrar);
                    echo "<script>location.href='../m4/tareas.php'</script>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
