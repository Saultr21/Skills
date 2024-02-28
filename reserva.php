<?php session_start(); ?>
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