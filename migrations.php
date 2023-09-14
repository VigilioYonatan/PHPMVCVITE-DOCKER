<?php
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); // para que no mande error si noexisten variables de entorno
require_once __DIR__ . '/app/config/config.php';
use App\Core\Database;

$app = new Database();

$app->applyMigrations();