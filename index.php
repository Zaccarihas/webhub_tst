<?php 
    
    // Configurate
    $_PUBLIC_WEB_FOLDER = 'html';
    $_SECURE_WEB_FOLDER = 'secure';
    $secure_path = str_replace($_PUBLIC_WEB_FOLDER,$_SECURE_WEB_FOLDER,__DIR__);
    require_once($secure_path . '/controllers/init.php');

    // Create the Site-object and route to the requested page
    $hub = new Site(__DIR__, $_GET['page'] ?? 'index.md');
    $hub->route();
