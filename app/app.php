<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/..");
$dotenv->safeLoad(); // para que no mande error si noexisten variables de entorno
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/lib/helpers.php';
require_once __DIR__ . '/config/vite.php';