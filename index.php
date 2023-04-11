<?php 
    
    // Configurate
    require_once('/var/www/secure/nav/controllers/init.php');
    require_once('/var/www/secure/nav/controllers/cls_site.php');
    $curpage = htmlentities($_GET['page'] ?? 'index.md');
    
    $hub = new Site(__DIR__, $curpage);

    // Rout and render requested page
    $hub->route($curpage);    
    