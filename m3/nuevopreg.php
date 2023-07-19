<?php
extract($_POST);
require ("../conectar_bd.php");
$sentencia="INSERT INTO projects (id_p, project, title, deadline, works) VALUES (NULL, '$project', '$title', '$deadline', '$works')";
$resent= mysqli_query($mysqli, $sentencia);
if($resent==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent==null);
    
    echo "<script>location.href='../m3/proyectosad.php'</script>";
}else{
    echo "<script>alert('PROYECTO CREADO'</script>";
    echo "<script>location.href='../m3/proyectosad.php'</script>";
}



//$sentencia3="INSERT INTO tasks (id_t, usert_id, projectt_id, task_1, task_2, task_3, task_4) VALUES (NULL, $id_u, $id_p, '$tarea1', '$tarea2', '$tarea3', '$tarea4')";

