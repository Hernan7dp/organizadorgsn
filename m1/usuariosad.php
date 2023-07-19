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
            include('../includes/menu2ad.php');
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
            <div id="new">
                <a href='./nuevou.php'>Nuevo usuario <img src='../images/n_usuario.png' alt="Nuevo" class=''></a>
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
                        echo "<td>Contraseña</td>";
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
                        if($matriz[4]==1){
                            echo "<td>Administrador</td>";
                        }else{
                            echo "<td>Usuario</td>";
                        }
                        echo "<td><a href='./editu.php?id_u=$matriz[0]'><img src='../images/actualizar.png' class=''></td>";
                        echo "<td><a href='./usuariosad.php?id_u=$matriz[0]&idborrar=2'><img src='../images/borrar.png' class=''></td>";
                        echo "</tr>";
                        
                    }                       
                    echo "<table>";
                        extract($_GET);
                        if(@$idborrar==2){
                            $sqlborrar="DELETE FROM login WHERE id_u=$id_u";
                            $resborrar= mysqli_query($mysqli, $sqlborrar);
                            echo '<script>alert("REGISTRO ELIMINADO")</script>';
                            echo "<script>location.href='../m1/usuariosad.php'</script>";
                        }
                ?>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
