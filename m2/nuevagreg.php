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

$sentencia2="INSERT INTO assignment (id_a, user_id, project_id) VALUES (NULL, $id_u, $id_p)";
$resent2= mysqli_query($mysqli, $sentencia2);

if($resent2==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent2==null);
    echo "<script>location.href='../m2/gestion.php'</script>";
}else{
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m2/gestion.php'</script>";
}
?>