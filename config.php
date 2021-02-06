<?php

ini_set('session.gc_maxlifetime', 7200);
session_start();

ini_set('display_errors', 'On');

// setting error logging to be active
ini_set("log_errors", TRUE);

// setting the logging file in php.ini
ini_set('error_log', "./my-errors.log");

// Directory constants
define('URL', 'TEST');

// AUTOLOADING
require_once __DIR__.'/Sql/sql.php';
require_once __DIR__.'/Models/model.php';
require_once __DIR__.'/Controllers/controller.php';
require_once __DIR__.'/Views/view.php';
require_once __DIR__.'/Builder/builder.php';
