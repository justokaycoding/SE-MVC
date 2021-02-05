<?php
// PHP code for logging error into a given file

// error message to be logged
$error_message = "This is an error message!";

// path of the log file where errors need to be logged
$log_file = "./my-errors.log";

// setting error logging to be active
ini_set("log_errors", TRUE);

// setting the logging file in php.ini
ini_set('error_log', $log_file);

// logging the error
error_log($error_message);

?>
