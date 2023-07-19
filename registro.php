<?php




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

$name=$_REQUEST['nombre'];
$email=$_REQUEST['email'];
$password=$_REQUEST['pass'];
$repassword=$_REQUEST['repass'];

$to      = $email;
$subject = 'Te has registrado en nuestro sitio';
$message = 'Hola, $name. Te has registrado en nuestro sitio. ¡Saludos!';
$headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

require 'conectar_bd.php'; //con esto, traigo al objeto $mysqli
$email_en_base= mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email'");
$email_ya_reg= mysqli_num_rows($email_en_base);
$name_en_base= mysqli_query($mysqli,"SELECT * FROM login WHERE name='$name'");
$name_ya_reg= mysqli_num_rows($name_en_base);

//En la ventana de login se validara tanto un usuario como una contraseña válidos, los cuales se otorgara 3 oportunidades, sino se le re direccionara a una página 404. 
//CAPTCHA
//SI NO ESTÁ EL USUARIO, PIDE QUE SE REGISTRE

if($password==$repassword){//valido que ambas contraseñas sean iguales, si lo son, ejecuto código, sino digo que son incorrectas.
    if($email_ya_reg>0){//valido si el email ya ha sido registrado. Si no ha sido registrado,  voy al else y hago el registro.
        echo 'El email que ingresaste ya ha sido registrado por un usuario';
        echo '<script>alert("El email que ingresaste ya ha sido registrado por un usuario")</script>';
                    //echo "<script>location.href='index.php'</script>";
    } else {
        if($name_ya_reg>0){//valido si el usuario ya ha sido registrado. Si no ha sido registrado,  voy al else y hago el registro.
            echo 'El nombre de usuario que ingresaste ya ha sido registrado por un usuario';
            echo '<script>alert("El nombre de usuario que ingresaste ya ha sido registrado por un usuario")</script>';
                    //echo "<script>location.href='index.php'</script>";
            }else{
                mysqli_query($mysqli, "INSERT INTO login (name, email, password) VALUES ('$name', '$email', '$password')");
                mail($to, $subject, $message, $headers);
                mysqli_close($mysqli);
                echo '<script>alert("REGISTRO EXITOSO. YA PUEDE INICIAR SESIÓN")</script>';
                }
            }
} else {
           echo "Las contraseñas no coinciden";
       }
    echo "<script>location.href='index.php'</script>";
} else {
    echo '<script>alert("POR FAVOR, ACTIVA EL CAPTCHA PARA PODER REGISTRARTE.")</script>';
            echo "<script>location.href='index.php'</script>";
  }