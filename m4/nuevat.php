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
        <div id="tarea">
            <div class="subtitle">
                <h2>Envío de Tareas</h2>
            </div>
            <br>
            <div class="subtitle2">
                <h4>Ingreso de Tarea por Proyecto</h4>
            </div>
            <?php
            extract($_GET);
            require("../conectar_bd.php");
            
            $sql3u="SELECT * FROM login";
            $query3u= mysqli_query($mysqli, $sql3u);
            $sql3p="SELECT * FROM projects";
            $query3p= mysqli_query($mysqli, $sql3p);
            ?>
            <div id="nuevo">
                <h2>Ingresar tarea</h2>
                <form action="nuevatreg.php" method="POST">
                    <div class="subtitle2">
                        <h4>Usuarios</h4>
                    </div>
                    <?php
                        while($cole3u= mysqli_fetch_row($query3u)){
                            $id_u=$cole3u[0];
                            $name=$cole3u[1];
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
                        while($cole3p= mysqli_fetch_row($query3p)){
                            $id_p=$cole3p[0];
                            $title=$cole3p[1];
                    ?>
                            <input type="radio" name="radio_p[]" value="<?php echo $id_p ?>"><?php echo ' '.$title ?>
                            <br>
                    <?php
                        }
                    ?>
                    <br>
                    <textarea name="task1" rows="4" cols="30" placeholder="Copia y pega aquí tu Tarea Nº 1"></textarea>
                    <textarea name="task2" rows="4" cols="30" placeholder="Copia y pega aquí tu Tarea Nº 2"></textarea>
                    <textarea name="task3" rows="4" cols="30" placeholder="Copia y pega aquí tu Tarea Nº 3"></textarea>
                    <textarea name="task4" rows="4" cols="30" placeholder="Copia y pega aquí tu Tarea Nº 4"></textarea>
                    <!--<input type="text" name="task1" placeholder="Copia y pega aquí tu Tarea Nº 1">
                    <input type="text" name="task2" placeholder="Copia y pega aquí tu Tarea Nº 2">
                    <input type="text" name="task3" placeholder="Copia y pega aquí tu Tarea Nº 3">
                    <input type="text" name="task4" placeholder="Copia y pega aquí tu Tarea Nº 4">-->
                    <br>
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </body>
</html>
