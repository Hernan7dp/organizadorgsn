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
            <div>
                <?php
                require('../conectar_bd.php');
                $sql3=("SELECT * FROM projects");
                
                $query= mysqli_query($mysqli, $sql3);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id</td>";
                        echo "<td>Proyecto</td>";
                        echo "<td>Título</td>";
                        echo "<td>Plazo</td>";
                        echo "<td>Tareas</td>";
                        echo "<td>Cumplimiento</td>";
                    echo "</tr>";
                    
                    while ($matrizp=mysqli_fetch_array($query)) {
                        echo "<tr class=''>";
                        echo "<td>$matrizp[0]</td>";
                        echo "<td>$matrizp[1]</td>";
                        echo "<td>$matrizp[2]</td>";
                        echo "<td>$matrizp[3]</td>";
                        echo "<td>$matrizp[4]</td>";
                        switch ($matrizp[5]){
                            case 2:
                                echo "<td>25%</td>";
                                break;
                            case 3:
                                echo "<td>50%</td>";
                                break;
                            case 4:
                                echo "<td>100%</td>";
                                break;
                            default:
                                echo "<td>0%</td>";
                                break;
                        }
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
