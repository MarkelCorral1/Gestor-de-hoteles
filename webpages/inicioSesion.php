<?php
if ($_COOKIE["usuario"]) {
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

<body class="inicioSesion">
    <div class="container-session d-flex justify-content-center align-items-center min-vh-100">
        <form class="session p-4 border rounded shadow-sm" id="sessionStart" action="../PHP/iniciarSesion.php" method="post">
            <h3 class="text-center mb-4">Iniciar Sesión</h3>

            <div class="mb-3">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class=" text-center mb-4">
                <button type="submit" class="btn btn-dark">Inicio Sesión</button>
                <button type="submit" class="btn btn-dark">Registrarse</button>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                <img src="../images/Logo/Logo.png" class="rounded" alt="Logotipo" width="60">
            </div>
        </form>
    </div>
</body>

</html>