<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand brand" href="index.php"><img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Logo"
                class="logo-img"></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Hoteles</a></li>
                <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>

                <?php if (isset($_COOKIE["usuario"])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $_COOKIE["usuario"] ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item">Cerrar sesion</a></li> <!--  FALTA HACER LOGICA PARA CERRAR SESION -->

                            <?php // SI ES ADMIN
                            require_once '../bootstrap.php';
                            require_once PHP_URL . '/Clases/Usuario.php';
                            require_once PHP_URL . '/Clases/UsuarioRepository.php';

                            $usuario = $entityManager->getRepository('Usuario')
                                ->findBy(['tipo' => 'admin', 'username' => $_COOKIE["usuario"]]);

                            if ($usuario) :
                            ?>
                                <li><a class="dropdown-item" href="gestionUsuarios.php">Gestion usuarios</a></li>
                                <li><a class="dropdown-item" href="gestionHoteles.php">Gestion hoteles</a></li>
                            <?php endif ?>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item"><a class="nav-link" href="inicioSesion.php">Inicio sesion</a></li>
                <?php endif; ?>

                
            </ul>
            <button class="btn btn-danger ms-lg-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                Reservar
            </button>
        </div>
    </div>
</nav>