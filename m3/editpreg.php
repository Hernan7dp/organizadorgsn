<?php

extract($_POST);
require ("../conectar_bd.php");
$sentencia="UPDATE projects set project='$project', title='$title', deadline='$deadline', works='$works', fulfillment='$fulfillment' WHERE id_p='$id_p'";
$resent= mysqli_query($mysqli, $sentencia);
if($resent==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent==null);
    
    echo "<script>location.href='../m3/proyectosad.php'</script>";
}else{
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m3/proyectosad.php'</script>";
}
?>