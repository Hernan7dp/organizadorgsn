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
        <div id="asignacion">
            <div class="subtitle">
                <h2>Gestión de Proyectos para Usuario</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Asignar proyecto a usuario</h4>
            </div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");
                    
            $sql2u="SELECT * FROM login";
            $query2u= mysqli_query($mysqli, $sql2u);
            
            $sql2p="SELECT * FROM projects";
            $query2p= mysqli_query($mysqli, $sql2p);
            
            $sql2a="SELECT assignment.project_id FROM assignment";
            $querya= mysqli_query($mysqli, $sql2a);
            
            ?>
            <div id="nuevo">
                <h2>Asignar Proyecto</h2>
                <form action="nuevagreg.php" method="POST">
                    <div class="subtitle2">
                        <h4>Usuarios</h4>
                    </div>
                    <?php
                    while($cole2u= mysqli_fetch_row($query2u)){
                        $id_u=$cole2u[0];
                        $name=$cole2u[1];
                        ?>
                            <input type="radio" name="radio_u[]" value="<?php echo $id_u ?>"><?php echo ' '.$name ?>
                        <br>
                    <?php
                    }
                    ?>
                    <div class="subtitle2">
                        <h4>Proyectos</h4>
                    </div>            
                    <?php
                        while($cole2p= mysqli_fetch_row($query2p)){
                            $id_p=$cole2p[0];
                            $title=$cole2p[1];
                    ?>
                            <input type="radio" name="radio_p[]" value="<?php echo $id_p ?>" <?php
                                while ($matriz=mysqli_fetch_array($querya)) {
                                    $id_passigned=$matriz[0];
                                }
                                if ($id_passigned==$id_p){ 
                                   echo 'disabled';
                                } 
                            ?>><?php echo ' '.$title ?>
                            <br>
                    <?php
                        }
                    ?>
                    <br>
                    <input type="submit" value="Asignar">
                </form>
            </div>
        </div>
    </body>
</html>
