<?php 

    // Configurate
    $public_folder = __DIR__;
    require_once('/var/www/secure/nav/controllers/init.php');

    // Set up Twig template generator
    $loader = new \Twig\Loader\FilesystemLoader($CONFIG['themes_folder'].$CONFIG['Theme']);
    $twig = new \Twig\Environment($loader, []);

    // Controllers (exchange with autoloader)
    require_once($CONFIG['controllers_folder'].'transform.php');
    require_once($CONFIG['controllers_folder'].'navigation.php');
    
    // Check login status
    $logged_in = isset($_SESSION['loggedin']);
    $username = $logged_in?$_SESSION['name']:"Not Logged In";   

    // Include meta data regarding the page
    include($CONFIG['controllers_folder']).'pagemeta.php';

    // Router
    $attributes = [
        'loggedin'   => $logged_in,
        'username'   => $username,
        'authpath'   => 'config/authenticate.php',
        'regform'    => 'index.php?page=registration',
        'loadtime'   => $loadtime,
        'files'      => $numfiles,
        'mem'        => $mem,
        'stylesheet' => 'themes/'.$CONFIG['Theme'].'/style.css',
        'selected'   => $CONFIG['current_page'],
    ];
    
    switch($CONFIG['current_page']) {
        case 'registration':
            $template = 'registration.twig';
            $attributes['title'] = 'Registration';
            $attributes['regpath'] = 'index.php';
            break;

        default:

            $filename = $CONFIG['content_folder'].$CONFIG['current_page'];
            $file = file($filename);     // Read the file
            $yaml = extract_yaml($file); // Separate yaml from content
            $page = implode($file);      // Transform file content into a string
                
            // Generate content from parsedown-file
            $parsedown = new ParsedownExtra();
            $content = $parsedown->text($page);
            
            $template = 'index.twig';
            $attributes['title'] = $yaml["Title"];
            $attributes['nav'] = $nav;
            $attributes['side_nav'] = $side_nav;
            $attributes['content'] = $content;
    }

    echo $twig->render($template, $attributes);

    // Process the requested page
    //include($CONFIG['controllers_folder']).'process_content_page.php';
