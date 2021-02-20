<?php

ini_set('session.gc_maxlifetime', 7200);
session_start();

ini_set('display_errors', 'On');

// Directory constants
define('URL', __DIR__);

// AUTOLOADING
require_once __DIR__.'/Sql/sql.php';
require_once __DIR__.'/Cart/cart.php';
require_once __DIR__.'/Models/model.php';
require_once __DIR__.'/Controllers/controller.php';
require_once __DIR__.'/Views/view.php';
require_once __DIR__.'/ajax_calls.php';
