<?php
// Activate autoload
require '../vendor/autoload.php';

// Report all types of errors
error_reporting(-1);

// Display all errors
ini_set('display_errors', '1');

// Save current date to be used for presentation in different views
date_default_timezone_set('Europe/Stockholm');
$today = date('Y-m-d H:i:s');
$weekday = date('l');