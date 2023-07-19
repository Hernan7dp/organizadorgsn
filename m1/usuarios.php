<!DOCTYPE html>

<?php
session_start();
if(!$_SESSION['name']){
    header("location:index.php");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Administración de usuarios</title>
       
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
                <h2>Administración de usuarios registrados</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Tabla de usuarios</h4>
            </div>
            <div>
                <?php
                require('../conectar_bd.php');
                $sql=("SELECT * FROM login");
                
                $query= mysqli_query($mysqli, $sql);
                
                echo "<table border='1'; class='';>";
                    echo "<tr>";
                        echo "<td>Id</td>";
                        echo "<td>Nombre</td>";
                        echo "<td>Email</td>";
                        echo "<td>Rol</td>";
                    echo "</tr>";
                    
                    while ($matriz=mysqli_fetch_array($query)) {
                        echo "<tr class=''>";
                        echo "<td>$matriz[0]</td>";
                        echo "<td>$matriz[1]</td>";
                        echo "<td>$matriz[2]</td>";
                        if($matriz[4]==1){
                            echo "<td>Administrador</td>";
                        }else{
                            echo "<td>Usuario</td>";
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
