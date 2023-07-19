<?php

extract($_POST);
require ("../conectar_bd.php");
$sentencia = "UPDATE projects set project='$project', title='$title', deadline='$deadline', fulfillment='$fulfillment', task_1='$task_1', task_2='$task_2', task_3='$task_3', userp_id='$userp_id'  WHERE id_p='$id_p'";
$resent = mysqli_query($mysqli, $sentencia);
if ($resent == null) {
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent == null);

    echo "<script>location.href='../m2/gestion.php'</script>";
} else {
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m2/gestion.php'</script>";
}
?>