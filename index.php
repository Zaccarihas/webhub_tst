<?php 
    
    require_once 'controllers/secure_path.php';

    // Configurate
    $_PUBLIC_WEB_FOLDER = 'html';
    $_SECURE_WEB_FOLDER = 'secure';
    
    // Get the path for the secure part of the site
    $secure_path = get_secure_path($_PUBLIC_WEB_FOLDER, $_SECURE_WEB_FOLDER);

    // Initiate
    require_once($secure_path . '/controllers/init.php');

    // Create the Site-object and route to the requested page
    $hub = new Site(__DIR__, $_GET['page'] ?? 'index.md');
    $hub->route();
