<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$host= "localhost";
$puerto= "3306";
$base= "final2020";
$usuario= "user2020";
$clave= "her2020";
//$tabla= "login";

if(!($link = mysqli_connect($host . ":" . $puerto, $usuario, $clave))){ //Valida si no son correctos el host, el puerto, el usuario y la clave
    echo "Error al conectarse a la base de datos.";
    exit();
}

if (!mysqli_select_db($link, $base)){ //Valida si no son correctos el enlace y la base de datos
    echo 'Error al conectarse a la base de datos';
    exit();
}

$mysqli = new mysqli($host . ":" . $puerto, $usuario, $clave, $base);

if($mysqli->connect_errno){ //Si hay un error al conectar a la base de datos, sale y muestra el error
    die("Falló la conexión a MySQL: (" . $mysqli->mysqli_connect_errno() . ")" . $mysqli->mysqli_connect_error());
}
?>