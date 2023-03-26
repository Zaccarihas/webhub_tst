<?php

// Check time to load
$loadtime = round((microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"])*1000,3);

// Get included files
$numfiles = count(get_included_files());

// Get Memory usage
$mem = [
    'max' => memory_get_peak_usage(),
    'current' => memory_get_usage(),
    'limit' => ini_get("memory_limit")
];

