<?php

// Error reporting
error_reporting(E_ALL ^ E_NOTICE);

// MySQL
define('DB_HOST', 'localhost');
define('DB_NAME', 'webappdb');
define('DB_USERNAME', 'webappusr');
define('DB_PASSWORD', 'contrasenya');
define('DB_FREEZE', false);

// Debug
define('APP_DEBUG', false);

// Mobile Metadata
define('APP_NAME','To-Do App');
define('APP_AUTHOR','Rodrigo Polo');
define('APP_DESCRIPTION','Un app web de prueba.');
define('APP_THUMB','SMCard.jpg');
