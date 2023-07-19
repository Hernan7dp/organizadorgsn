<?php

extract($_POST);
require ("../conectar_bd.php");
$sentencia8="UPDATE tasks set usert_id='$usert_id', projectt_id='$projectt_id', task_1='$task_1', task_2='$task_2', task_3='$task_3', task_4='$task_4' WHERE id_t='$id_t'";
$resent8= mysqli_query($mysqli, $sentencia8);
if($resent8==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent8==null);
    
    echo "<script>location.href='../m4/tareasad.php'</script>";
}else{
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m4/tareasad.php'</script>";
}
?>