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
                <h2>Proyectos</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Tabla de proyectos</h4>
            </div>
            <div id="new">
                <a href='nuevop.php'>Nuevo proyecto <img src='../images/n_proyecto.png' alt="Nuevo" class=''></a>
            </div>
            <div>
                <?php
                require('../conectar_bd.php');
                
                $sql3=("SELECT * FROM projects");
                $query1t= mysqli_query($mysqli, $sql3);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id</td>";
                        echo "<td>Proyecto</td>";
                        echo "<td>Título</td>";
                        echo "<td>Plazo</td>";
                        echo "<td>Tareas</td>";
                        echo "<td>Cumplimiento</td>";
                        echo "<td>Editar</td>";
                        echo "<td>Borrar</td>";
                    echo "</tr>";
                    
                    while ($matrizp=mysqli_fetch_array($query1t)) {
                        echo "<tr class=''>";
                        echo "<td>$matrizp[0]</td>";
                        echo "<td>$matrizp[1]</td>";
                        echo "<td>$matrizp[2]</td>";
                        echo "<td>$matrizp[3]</td>";
                        echo "<td>$matrizp[4]</td>";
                        echo "<td>$matrizp[5]</td>";
                        echo "<td><a href='./editp.php?id_p=$matrizp[0]'><img src='../images/actualizar.png' class=''></td>";
                        echo "<td><a href='../m3/proyectosad.php?id_p=$matrizp[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                        extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM projects WHERE id_p=$id_p";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("PROYECTO ELIMINADO")</script>';
                            echo "<script>location.href='../m3/proyectosad.php'</script>";
                        }

                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
