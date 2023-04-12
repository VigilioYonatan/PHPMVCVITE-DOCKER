<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); // para que no mande error si noexisten variables de entorno
require_once __DIR__ . '/config/helpers.php';
require_once __DIR__ . '/config/vite.php';
use App\Config\Database;
use App\Core\Model;

/*Instanciar conexion database*/

$cnx  = new Database();
$cnx->connect();
Model::setDb($cnx->pdo);