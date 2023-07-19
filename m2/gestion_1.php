<!DOCTYPE html>

<?php
session_start();
if(@!$_SESSION['name']){
    header("Location:index.php");
}elseif ($_SESSION['role']=='0') {
    header("Location:index2-2020.php");
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
            include('../includes/header.php');
            ?>
        </header>
        <div>
            <?php
            include('../includes/menu2.php');
            ?>
        </div>
        <div>
            <h2>Gestión de Proyectos para Usuario</h2>
            <br>
            <h4>Tabla de Asignaciones</h4>
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
                        echo "<td>$matriz[1]"." - "."$matriz[2]</td>";
                        echo "<td>$matriz[3]"." - "."$matriz[4]</td>";
                        echo "<td><a href='../m2/gestion.php?id_a=$matriz[0]&idborrar=2'><img src='../images/eliminar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                    
                    echo "<a href='./modgestion.php'>Nueva asignación<img src='../images/actualizar.png' class=''>";
                    
                        extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM assignment WHERE id_a=$id_a";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("REGISTRO ELIMINADO")</script>';
                            echo "<script>location.href='../m2/gestion.php'</script>";
                        }
                /*require('../conectar_bd.php');
                $sql=("SELECT * FROM login");
                
                $query= mysqli_query($mysqli, $sql);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id</td>";
                        echo "<td>Usuario</td>";
                        echo "<td>Nombre</td>";
                        echo "<td>Contraseña</td>";
                        echo "<td>Email</td>";
                        echo "<td>Rol</td>";
                        echo "<td>Editar</td>";
                        echo "<td>Borrar</td>";
                    echo "</tr>";
                    
                    while ($matriz=mysqli_fetch_array($query)) {
                        echo "<tr class=''>";
                        echo "<td>$matriz[0]</td>";
                        echo "<td>$matriz[1]</td>";
                        echo "<td>$matriz[2]</td>";
                        echo "<td>$matriz[3]</td>";
                        echo "<td>$matriz[4]</td>";
                        echo "<td>$matriz[5]</td>";
                        echo "<td><a href='./modgestion.php?id_u=$matriz[0]'><img src='../images/actualizar.png' class=''></td>";
                        echo "<td><a href='../m2/gestion.php?id_u=$matriz[0]&idborrar=2'><img src='../images/eliminar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                        extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM login WHERE id_u=$id_u";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("REGISTRO ELIMINADO")</script>';
                            echo "<script>location.href='../m2/gestion.php'</script>";
                        }*/
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
