<?php

extract($_POST);
require ("../conectar_bd.php");

$sentencia1="UPDATE login set name='$name', email='$email', password='$password', role='$role' WHERE id_u='$id_u'";
$resent1= mysqli_query($mysqli, $sentencia1);
if($resent1==null){
    echo 'Error de procesamiento. No se actualizó';
    echo '<script>alert("ERROR EN PROCESAMIENTO")</script>';
    header($resent1==null);
    
    echo "<script>location.href='../m1/usuariosad.php'</script>";
}else{
    echo '<script>alert("REGISTRO ACTUALIZADO"</script>';
    echo "<script>location.href='../m1/usuariosad.php'</script>";

}
?>