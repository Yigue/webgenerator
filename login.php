<?php
include 'bd.php';
session_start();



if (isset($_SESSION['usuario'])) {

    header('Location:panel.php');
}

$msg = "";


if (isset($_POST['btnLogin'])) {



    $email = $_POST['txtEmail'];
    $pass = $_POST['txtContraseña'];


    $usuario=verificarUsuario($email,$pass);
    // var_dump($usuario);

    if ($usuario->errno == 200) {

        $_SESSION['usuario'] = $usuario;
        


        header('Location:panel.php');
    } else { // El usuario y/o contraseña no son validos 
        $msg = "Usuario y/o contraseña invalido/s.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webgenerator Guillermo Riedel</title>

</head>

<body>

    <content>
        <center>

            <h1>Webgenerator Guillermo Riedel</h1>
            <form action="login.php" method="POST">
                <label class="lbl" for="txtEmail">Email:</label>

                <input class="txt" type="text" id="txtEmail" name="txtEmail" required>
                <p></p>

                <label class="lbl" for="txtContraseña">Contraseña:</label>
                <input class="txt" type="password" id="txtContraseña" name="txtContraseña" required>
                <!-- ERROR PARA CUANDO TENGAMOS BASE DE DATOS  -->
                <div class="window_error">
                    <h6>
                        <?php

                        echo $msg;

                        ?>
                    </h6>
                </div>


                <div class="window_control"><input type="submit" class="btn" id="btnLogin" name="btnLogin" value="Login"></div>

                <div class="window_options">
                    ¿No tienes cuenta? <a href="register.php" class="lnk">Registrate.</a>
                </div>
            </form>


        </center>
    </content>