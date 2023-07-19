<?php

//extract($_POST);
//var_dump($_POST);
echo "<br>";
require ("../conectar_bd.php");

//$name = $_POST['name'];
//$title = $_POST['title'];
/*$id_u= $_POST['id_u'];
$id_p= $_POST['id_p'];
settype($id_u, 'int'); 
$id_u2 = var_dump($id_u);
settype($id_p, 'int'); 
$id_p2 = var_dump($id_p);*/
//$id_u= intval('id_u');
//$id_p= intval('id_p');
$matriz_u= $_POST['checkbox_u'];
$matriz_p= $_POST['checkbox_p'];

foreach ($matriz_u as $mat_u) {
    $id_u = $mat_u;
    //echo $id_u."<br>";
}
foreach ($matriz_p as $mat_p) {
    $id_p = $mat_p;
    //echo $id_p."<br>";
}
//$sentencia1="DELETE assignament WHERE id_u=$id_u";
//$id_u="SELECT login.id_u WHERE name=$name";
//$id_p="SELECT projects.id_p WHERE title=$title";
//$sentencia2="INSERT INTO assignment (user_id, project_id) VALUES ($id_u, $id_p)";
$sentencia1="DELETE assignament WHERE id_u=$id_u";
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