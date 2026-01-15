<?php
if (isset($_COOKIE["usuario"])) {
    header('Location: index.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Schumacher Hotels</title>
</head>

<body class="inicioSesion vh-100"> 
    <div class="container-session border rounded shadow-sm justify-content-center align-items-center p-4 mt-5">
        <h3 class="text-center mb-4">Registro</h3>
        <form class="session" id="sessionStart">

            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password-1" name="password-1" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label"> Confirmar Contraseña</label>
                <input type="password" class="form-control" id="password-2" name="password-2" required>
            </div>

            <div class=" text-center mb-4">
                <button type="submit" class="btn btn-dark">Registrarse</button>
            </div>

        </form>
        <div class="d-flex justify-content-center mt-4">
            <img src="../images/Logo/Logo.png" class="rounded" alt="Logotipo" width="60">
        </div>
        <div id="respuesta-form" class="text-center bg-opacity-25 rounded"></div>
    </div>
    <script src="../JS/registro.js"></script>
</body>

</html>