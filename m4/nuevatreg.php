<?php

echo "<br>";
require ("../conectar_bd.php");

$matriz_u= $_POST['radio_u'];
$matriz_p= $_POST['radio_p'];

foreach ($matriz_u as $mat_u) {
    $id_u = $mat_u;
}
foreach ($matriz_p as $mat_p) {
    $id_p = $mat_p;
}

$tarea1=$_REQUEST['task1'];
$tarea2=$_REQUEST['task2'];
$tarea3=$_REQUEST['task3'];
$tarea4=$_REQUEST['task4'];

$sentencia3="INSERT INTO tasks (id_t, usert_id, projectt_id, task_1, task_2, task_3, task_4) VALUES (NULL, $id_u, $id_p, '$tarea1', '$tarea2', '$tarea3', '$tarea4')";
$resent3= mysqli_query($mysqli, $sentencia3);

if($resent3==null){
    echo 'Error de procesamiento. La tarea no fue enviada';
    echo '<script>alert("ERROR EN PROCESAMIENTO. LA TAREA NO SE ENVIÓ")</script>';
    header($resent3==null);
    echo "<script>location.href='../m4/tareasad.php'</script>";
}else{
    echo '<script>alert("LA TAREA FUE ENVIADA."</script>';
    echo "<script>location.href='../m4/tareasad.php'</script>";
}