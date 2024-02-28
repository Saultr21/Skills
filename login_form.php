<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center mb-4">
            <h1>Login</h1>
        </div>
        <div class="d-flex justify-content-center ">
            <form action="login.php" method="post">

               
                <label for="validationCorreo" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" id="validationCorreo" id="correo" required>
                <div class="valid-tooltip">
                    Correcto
                </div>
                <br>
                <label for="validationPass" class="form-label">Contraseña</label>
                <input type="password" name="palabra_secreta" class="form-control" id="validationPass" id="password" required>
                <div class="valid-tooltip">
                    Correcto
                </div>



                <br><br>
        </div>
        <div class="justify-content-center d-flex">
            <input class="btn btn-primary " type="submit" value="Iniciar sesión">
        </div>
        </form>

    </div>
    <div class="container d-flex justify-content-center mt-5">
        <a href="registro.html">Registrarme</a>
    </div>
</body>

</html>