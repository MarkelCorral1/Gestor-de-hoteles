<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('BASE_URL', $_ENV['BASE_URL']);
define('IMAGES_URL', BASE_URL . '/images');
define('CSS_URL', BASE_URL . '/scss/main.css'); 
define('JS_URL', BASE_URL . '/JS');
define('PAGINAS_URL', BASE_URL . '/webpages');
define('PHP_URL', BASE_URL . '/PHP');

define('ROOT_PATH', dirname(__DIR__)); 
define('INCLUDES_PATH', ROOT_PATH . '/includes');
define('PHP_PATH', ROOT_PATH . '/PHP');