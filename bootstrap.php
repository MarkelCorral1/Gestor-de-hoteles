<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$paths = array('./src');
$isDevMode = true;
$dbParams = array(
 'driver' => 'pdo_mysql',
 'user' => $_ENV['DB_USER'],
 'password' => $_ENV['DB_PASSWORD'],
 'dbname' => $_ENV['DB_NAME'],
 'host' => $_ENV['DB_HOST'],
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);
