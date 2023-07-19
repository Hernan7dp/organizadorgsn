<?php
//require_once "includes/recaptchalib.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
        <link rel="stylesheet" href="css/estilos.css"/>
    </head>
    <body>
        <div id="background">
            <div id="contenedor">
                <div id="ingreso">
                    <h2>Conectate</h2>
                    <form action="validar.php" method="POST">
                        <input type="text" name="email" placeholder="Tu email">
                        <input type="password" name="pass" placeholder="Tu contraseña">
                        <div class="g-recaptcha" data-sitekey="6LcqHNEZAAAAAAVDBbetG3Q8a_6v-WhSUXw8LxQ2"></div>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
                <div id="registro">
                    <h2>Registrate</h2>
                    <form action="registro.php" method="POST">
                        <input type="text" name="nombre" placeholder="Escribe tu nombre completo">
                        <input type="email" name="email" placeholder="Escribe tu email">
                        <input type="password" name="pass" placeholder="Escribe una contraseña">
                        <input type="password" name="repass" placeholder="Repite la contraseña">
                        <div class="g-recaptcha" data-sitekey="6LcqHNEZAAAAAAVDBbetG3Q8a_6v-WhSUXw8LxQ2"></div>
                        <input type="submit" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
        <script src="js/prefixfree.min.js"></script>
        <script src="js/prefixfree.dynamic-dom.min.js"></script>
    </body>
</html>
