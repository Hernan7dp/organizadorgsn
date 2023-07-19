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
            <div id="new">
                <!--<a href='../m4/nuevat.php'>Nueva tarea <img src='../images/n_tarea.png' alt="Nuevo" class=''></a>-->
            </div>
            <div>
                <?php
                require('../conectar_bd.php');
                
                        /*$sql4=("SELECT task_1, task_2, task_3, task_4 FROM tasks");
                $query2t= mysqli_query($mysqli, $sql4);*/
                
                $id_u=$_SESSION['id_u'];
                //echo $id_u;
                
                /*if ($_SESSION['role']=='1') {
                    $sql4="SELECT * FROM projects";
                }else{*/
                    //$sql4="SELECT projects.id_p, projects.project, projects.task_1, projects.task_2 FROM projects WHERE userp_id=$id_u";
                    $sql4="SELECT projects.id_p, projects.project, projects.title, projects.deadline, projects.fulfillment, projects.task_1, projects.task_2, projects.message, login.id_u, login.name FROM projects INNER JOIN login ON projects.userp_id = login.id_u";          

                $query2t= mysqli_query($mysqli, $sql4);
                
                    echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Proyecto Asignado</td>";
                        echo "<td>Tarea 1</td>";
                        echo "<td>Tarea 2</td>";
                        echo "<td>Añadir o Editar</td>";
                        echo "<td>Borrar Todas</td>";
                    echo "</tr>";
                    
                    while ($matrizt=mysqli_fetch_array($query2t)) {
                        echo "<tr class=''>";
                        echo "<td>$matrizt[1]</td>"; //project
                        if (!empty($matrizt[5])){
                            echo "<td><a href='../m4/viewt.php?id_p=$matrizt[0]'><img src='../images/tarealista.png' class=''></td>";
                        } else {
                            echo "<td><a href='../m4/editt.php?id_p=$matrizt[0]'><img src='../images/n_tarea.png' class=''></td>";
                        }
                        if (!empty($matrizt[6])){
                            echo "<td><a href='../m4/viewt.php?id_p=$matrizt[0]'><img src='../images/tarealista.png' class=''></td>";
                        } else {
                            echo "<td><a href='../m4/editt.php?id_p=$matrizt[0]'><img src='../images/n_tarea.png' class=''></td>";
                        }
                        echo "<td><a href='../m4/editt.php?id_p=$matrizt[0]'><img src='../images/actualizar.png' class=''></td>";
                        echo "<td><a href='../m4/tareas.php?id_p=$matrizt[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                        echo "</tr>";                
                    echo "<table>";
                    } 
                    extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="UPDATE projects SET task_1=NULL, task_2=NULL WHERE id_p=$id_p";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo "<script>location.href='../m4/tareas.php'</script>";
                        }
                
                /*if ($id_u!==$matrizt[8]) {
                    echo '<br><br><h3 style="color:#ffffff">No tienes tareas por hacer. Aún no se te ha asignado un proyecto.</h3>';
                } */
                
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
