<?php session_start();
include "config.php";
include "funciones.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Reserva</title>
</head>

<body>
    <div class="container mt-5">
        <div class="container text-center mb-4">
            <h1>Formulario reserva</h1>
            <?php echo "Usuario: " . htmlspecialchars($_SESSION['correo']); ?>
            <?php 
            $sala_actual = $_GET['sala']; 
            $minimo = $_GET['minimo']; 
            $aforo = $_GET['aforo']; 
            ?>
        </div>
        <div>

            <body class="d-flex align-items-center">
                <div class="d-flex justify-content-center container formulario mt-5">
                    <form class="form" action="recibe_reserva.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="pagina_actual" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                        <div class="form-group">
                            <label for="nombre">Sala: </label>
                            <input class="align-content-right form-control" id="sala" name="sala" type="text" placeholder="Nombre" disabled value=<?php echo $sala_actual ?>>
                        </div>
                        <div class="form-group">
                            <label for="invitados">Invitados: </label>
                            <input class="align-content-right form-control" type="number" id="invitados" placeholder=<?php echo $minimo ?> name="invitados" min=<?php echo $minimo ?> max=<?php echo $aforo ?>>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de reserva</label>
                            <input class="align-content-right form-control" type="date" id="fecha" name="fecha">
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="submit btn btn-primary mt-3">Enviar</button>
                        </div>
                        <div class="d-flex justify-content-center">
                        <a href="inicio.php" class="btn btn-danger mt-3" tabindex="-1" role="button" aria-disabled="true">Volver</a>
                        </div>
                    </form>



                    </form>
                    <?php {


                        $base_de_datos = obtenerBaseDeDatos();
                        $sentencia = $base_de_datos->prepare("SELECT * FROM salas WHERE sala = ? ");
                        $sentencia->execute([$sala_actual]);
                        $contador = 0;

                        return $sentencia->fetchObject();

                        foreach ($base_de_datos->query($sentencia) as $row) {
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
                                                    <p>Aforo: <?php echo $aforo ?></p>
                                                    <p>Comensales mínimos: <?php echo $minimo ?>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

        <?php
                        }
                    }
        ?>
            </body>

</html>