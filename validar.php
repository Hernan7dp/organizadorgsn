<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}

require_once "includes/recaptchalib.php";

$secret = "6LcqHNEZAAAAALWF8JXsN0fa6t8zP3GaNqsXlbFp";
 $response = null;
 // comprueba la clave secreta
 $reCaptcha = new ReCaptcha($secret);

 if ($_POST["g-recaptcha-response"]) {
     $response = $reCaptcha->verifyResponse(
     $_SERVER["REMOTE_ADDR"],
     $_POST["g-recaptcha-response"]
     );
  }
 
 if ($response != null && $response->success) {

require("conectar_bd.php");

$email=$_POST['email'];
$password=$_POST['pass'];
    
$sql= mysqli_query($mysqli, "SELECT * FROM login WHERE email='$email'");
$m_login= mysqli_fetch_assoc($sql);

        if($password==$m_login['password'] && $email==$m_login['email']){
            $_SESSION['id_u']=$m_login['id_u'];
            $_SESSION['name']=$m_login['name'];
            $_SESSION['role']=$m_login['role'];
            if($m_login['role']=='1'){
                echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script>';
                echo "<script>location.href='index2.php'</script>";
            }else{
                header("location:index2.php");
            }
        }

if($_SESSION['count'] >= 2) {
   echo '<script>alert("HA INTENTADO INGRESAR 3 VECES SIN ÉXITO. VUELVE MÁS TARDE.")</script>';
   echo "<script>location.href='404.php'</script>";
}
else {
  if($email!=$m_login['email']){
            echo '<script>alert("ESTE USUARIO NO EXISTE. POR FAVOR, REGÍSTRESE PARA PODER INGRESAR")</script>';
            echo "<script>location.href='index.php'</script>";
        }elseif($password!=$m_login['password']){
            echo '<script>alert("CONTRASEÑA INCORRECTA")</script>';
            echo "<script>location.href='index.php'</script>";
        }  
} 
} else {
    echo '<script>alert("POR FAVOR, ACTIVA EL CAPTCHA PARA PODER INGRESAR.")</script>';
            echo "<script>location.href='index.php'</script>";
  }
