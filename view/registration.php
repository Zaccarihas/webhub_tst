<?php 

    require('../config/config.php');
    require_once('../config/controller.php');
    require_once('../config/filestruct.php');
    
    // Check login status
    $logged_in = isset($_SESSION['loggedin']);

    $username = "Not Logged In";
    if($logged_in) {
        $username = $_SESSION['name'];
    }    
    
    // Set current page
    $page_url = 'index.md';

    // Get meta data for footer
    include('../config/pagemeta.php');    
    
    
    $theme = 'code';
    
    $loader = new \Twig\Loader\FilesystemLoader("../themes/$theme");
    $twig = new \Twig\Environment($loader, []);
    /*
    $twig = new \Twig\Environment($loader, [
        'cache' => 'themes/shared/templ_cache'
    ]);
    */ 

    // Generate navbar
    $list = get_folder('');
    $nav = generate_navbar_info($list);
    
    // Render view through twig-template
    echo $twig->render("registration.twig", [
        'loggedin' => $logged_in,
        'username' => $username,
        'loadtime' => $loadtime,
        'files' => $numfiles,
        'mem' => $mem,
        'selected' => $page_url,
        'title' =>  "Registration",
        'nav' => $nav
    ]);



