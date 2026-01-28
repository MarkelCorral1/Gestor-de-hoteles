<?php require_once '../config/config.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand brand" href="<?= PAGINAS_URL ?>/index.php"><img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Logo"
                class="logo-img"></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="<?= PAGINAS_URL ?>/index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= PAGINAS_URL ?>/dashboard.php">Hoteles</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= PAGINAS_URL ?>/contacto.php">Contacto</a></li>
            </ul>
            <?php if (isset($_COOKIE["usuario"])): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" data-bs-toggle="dropdown"
                        role="button" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4 1 1 1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                        <span class="text-white">
                            <?= $_COOKIE["usuario"] ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item" href="<?= PAGINAS_URL ?>/misReservas.php">Mis reservas</a></li>
                        <li><a class="dropdown-item" href="<?= PHP_URL ?>/cerrarSesion.php">Cerrar sesion</a></li>

                        <?php // SI ES ADMIN
                            require_once '../bootstrap.php';
                            require_once PHP_PATH . '/Clases/Usuario.php';
                            require_once PHP_PATH . '/Clases/UsuarioRepository.php';

                            $usuario = $entityManager->getRepository('Usuario')
                                ->findBy(['tipo' => 'admin', 'username' => $_COOKIE["usuario"]]);

                            if ($usuario):
                                ?>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <h6 class="dropdown-header">Admin</h6>
                            </li>
                            <li><a class="dropdown-item" href="<?= PAGINAS_URL ?>/gestionUsuarios.php">Gestion usuarios</a></li>
                            <li><a class="dropdown-item" href="<?= PAGINAS_URL ?>/gestionHoteles.php">Gestion hoteles</a></li>
                            <li><a class="dropdown-item" href="<?= PAGINAS_URL ?>/admin_contacto.php">Ver mensajes</a></li>
                        <?php endif ?>
                    </ul>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= PAGINAS_URL?>/inicioSesion.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            class="bi bi-person text-white" viewBox="0 0 16 16">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
        </div>
    </div>
</nav>