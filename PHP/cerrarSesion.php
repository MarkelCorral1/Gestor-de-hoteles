<?php
require_once '../config/config.php';

setcookie("usuario", "", time() - 3600, "/");
header('Location: ' . PAGINAS_URL . '/index.php');