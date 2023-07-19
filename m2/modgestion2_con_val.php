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

$sentencia1= "SELECT * FROM assignment";
$sentencia2= "INSERT INTO assignment (id_a, user_id, project_id) VALUES (NULL, $id_u, $id_p)";
$sentencia3= "SELECT MAX(id_a) FROM assignment";
$sentencia4= "DELETE MAX(id_a) FROM assignment";

$resent1= mysqli_query($mysqli, $sentencia1);
$resent2= mysqli_query($mysqli, $sentencia2);

if($resent2==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent2==null);
    echo "<script>location.href='../m2/gestion.php'</script>";
}else{
    $resent3= mysqli_query($mysqli, $sentencia3);
    if($resent1==$resent3){
    $resent4= mysqli_query($mysqli, $sentencia4);
    //exit();
    echo '<script>alert("ASIGNACIÓN YA REGISTRADA"</script>';
    echo "<script>location.href='../m2/gestion.php'</script>";
    }else{
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m2/gestion.php'</script>";
    }
}
?>