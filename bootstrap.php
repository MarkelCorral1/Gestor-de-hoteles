<?php
require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$paths = array('./src');
$isDevMode = true;
$dbParams = array(
 'driver' => 'pdo_mysql',
 'user' => 'root',
 'password' => 'root',
 'dbname' => 'hoteles_schumacher',
 'host' => 'localhost',
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);