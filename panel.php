<?php
include 'bd.php';
session_start();

if (isset($_SESSION['usuario'])) {
    $msg = "";
    $usuario = $_SESSION['usuario'];
    if (isset($_POST['btnCrearWeb'])) {
        $web = $_POST['txtWeb'];
        $nombreWeb = $usuario->idUsuario . $web;
        $vw = verificarWeb($nombreWeb);
        if ($vw->errno == 202) {
            registerWeb($usuario->idUsuario, $nombreWeb);
            shell_exec("./wix.sh $nombreWeb");
            shell_exec("chmod 777 $nombreWeb");
            shell_exec("zip -r $nombreWeb $nombreWeb");
        } else {
            $msg = "el dominio  existe";

        }
    }
} else {
    header('Location:login.php');
}
$link = links($usuario->idUsuario);

if (isset($_POST['btnEliminar'])) {
    $dom = $_POST['id'];
    Eliminar($dom);
    shell_exec("rm -r $dom");
    shell_exec("rm -r $dom.zip");
  
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

            <h1>Bienvenido a tu panel</h1>
            Cerrar Sesion de <?php echo $usuario->idUsuario ?> <a href="logout.php" class="lnk">Logout.</a>




            <form action="panel.php" method="POST">
                <h3>Generar Web de <input class="txt" type="text" id="txtWeb" name="txtWeb" required></h3>
                <p></p>

                <!-- <label class="lbl" for="txtContraseña">Contraseña:</label>
                <input class="txt" type="password" id="txtContraseña" name="txtContraseña" required>
                <p></p>

                <label class="lbl" for="txtContraseña">Repite Contraseña:</label>
                <input class="txt" type="password" id="txtContraseñaRp" name="txtContraseñaRp" required> -->

                <h6>
                    <?php

                    echo $msg;

                    ?>
                </h6>


                <div class="window_control"><input type="submit" class="btn" id="btnCrearWeb" name="btnCrearWeb" value="Crear Web"></div>
            </form>


            <form action="panel.php" method="POST">
                <h2>LINKS A TUS PAGINAS </h2>
                <h3>
                    <?php

                    echo $link;

                    ?>
                </h3>
            </form>

        </center>
    </content>