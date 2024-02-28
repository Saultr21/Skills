<?php
session_start();
include_once "config.php";
include("funciones.php");
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header('Location: inicio.php');
    exit;
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Salas</title>
</head>

<body class="background-inicio">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Salas</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">

                    </li>
                </ul>
                <form class="d-flex">
                    <div class="pr-3 mt-2">
                        <?php if (isset($_SESSION['correo'])) : ?>
                            <span style="margin-right: 10px;"><?php echo "Usuario: " . htmlspecialchars($_SESSION['correo']); ?></span>
                            <form action="" method="POST" style="display: inline;">
                                <a class="btn btn-danger" href="logout.php">Cerrar sesión</a>
                            </form>
                        <?php elseif (!isset($_SESSION['correo'])) : ?>
                            <a href="login_form.php" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Iniciar sesión</a>
                        <?php endif; ?>
                </form>
            </div>
        </div>
    </nav>


    <div class="container d-flex justify-content-center mt-5">
        <div>
            <h1>Información de salas</h1>
        </div>
    </div>
    <br>
    <?php {
        $base_de_datos = obtenerBaseDeDatos();
        $sql = 'SELECT * FROM salas';
        $contador = 0;
        foreach ($base_de_datos->query($sql) as $row) {
            $sala = $row->sala;
            $nombre = $row->nombre;
            $aforo = $row->aforo;
            $minimo = $row->minimo;
            $imagen1 = $row->imagen1;
            $imagen2 = $row->imagen3;
            $imagen3 = $row->imagen3;
            $reservado = $row->reservado;
            $contador += 1; ?>
            <div class="d-flex justify-content-center mb-4  p-2">
                <div class="card fondo-tarjeta">
                    <div class="row g-4 ">
                        <div class="col-md-6">
                            <img src="datos/<?php echo $imagen1 ?>" class="img-fluid imagen" alt="...">
                        </div>
                        <div class="col-md-6 ">
                            <div class="card-body container ">
                                <div class="d-flex justify-content-center">
                                    <h5 class="card-text mt-1 mb-3"><?php echo $nombre ?></h5>
                                </div>
                                    <div>
                                    <p>Aforo: <?php echo $aforo?></p>
                                    <p>Comensales mínimos: <?php echo $minimo?>
                                    </div>
                                </div>
                                
                                <?php if (isset($_SESSION['correo']) && ($reservado==0)) : ?>
                                    <div class="d-flex justify-content-center boton-tarjeta mt-5 mb-2">
                                    <form class="d-flex">
                                        <a href="reserva.php<?php echo "?sala="."$sala"?>" class="btn btn-primary" tabindex="-1" role="button" aria-disabled="true">Reservar</a>
                                    </form>
                                </div>
                                <?php elseif (isset($_SESSION['correo']) && ($reservado==1)) : ?>
                                     <div class="d-flex justify-content-center boton-tarjeta mt-5 mb-2">
                                    <form class="d-flex">
                                        <a href="reserva.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Ya reservado</a>
                                    </form>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
    }
    ?>
    </div>
    </div>
    </div>
</body>

</html>


