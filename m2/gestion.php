<!DOCTYPE html>

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
        <title>Gestión de Proyectos para Usuario</title>
       
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
                <h2>Gestión de Proyectos para Usuario</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Tabla de Asignaciones</h4>
            </div>
            <div id="new">
                <a href='nuevag.php'>Nueva asignación <img src='../images/n_asignacion.png' alt="Nuevo" class=''></a>
            </div>
            
            <div>
                <?php
                require('../conectar_bd.php');
                $sql2="SELECT assignment.id_a, login.id_u, login.name, projects.id_p, projects.project FROM assignment INNER JOIN login ON assignment.user_id = login.id_u INNER JOIN projects ON assignment.project_id = projects.id_p";
                //FALTA QUE EN LA TABLA QUEDE ORDENADO POR ID DE ASIGNACIÓN Y NO POR ID DE PROYECTO
                $query= mysqli_query($mysqli, $sql2);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id de Asignación</td>";
                        echo "<td>Nombre</td>";
                        echo "<td>Proyecto Asignado</td>";
                        echo "<td>Borrar</td>";
                    echo "</tr>";
                    
                    while ($matriz=mysqli_fetch_array($query)) {
                        echo "<tr class=''>";
                        echo "<td>$matriz[0]</td>";
                        echo "<td>$matriz[2]</td>";
                        echo "<td>$matriz[4]</td>";
                        echo "<td><a href='../m2/gestion.php?id_a=$matriz[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                    
                        extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM assignment WHERE id_a=$id_a";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("ASIGNACIÓN ELIMINADA")</script>';
                            echo "<script>location.href='../m2/gestion.php'</script>";
                        }
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
