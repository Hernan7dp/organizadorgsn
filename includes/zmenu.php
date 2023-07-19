<!DOCTYPE html>

        <div id="navbar">
            <ul class="horizontal">
                <li><a href="index2.php">Principio</a></li>
                <li><a href="m1/usuarios.php">Usuarios</a></li>
                <li><a href="m3/proyectos.php">Proyectos</a></li>
                <li><a href="m4/tareas.php">Tareas</a></li>
            </ul>
        </div>
        <div id="conexion">
            <ul class="horizontal">
                <li>Bienvenido,<strong><?php echo " " . $_SESSION['name'];?></strong></li>
                <li><a href="desconectar.php"><img src="images/salir.png" alt="Cerrar Sesión" class=''></a></li>
            </ul>
        </div>

</html>