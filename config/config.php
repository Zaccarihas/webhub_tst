<?php

// Error handling initiation
error_reporting(-1); // Report all types of errors
ini_set('display_errors', '1'); // Display all errors

// Activate autoload
require_once __DIR__.'/../vendor/autoload.php';

// Save current date to be used for presentation in different views
date_default_timezone_set('Europe/Stockholm');
$today = date('Y-m-d H:i:s');
$weekday = date('l');
