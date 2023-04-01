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
    require_once($CONFIG['controllers_folder'].'authorization.php');

    
    // Check login status
    $logged_in = isset($_SESSION['loggedin']);
    $username = $logged_in?$_SESSION['name']:"Not Logged In";   

    // Include meta data regarding the page
    include($CONFIG['controllers_folder']).'pagemeta.php';

    // Router
    $attributes = [
        'loggedin'   => $logged_in,
        'username'   => $username,
        'authpath'   => 'config/login.php',
        'regform'    => 'index.php?page=registration',
        'loadtime'   => $loadtime,
        'files'      => $numfiles,
        'mem'        => $mem,
        'stylesheet' => 'themes/'.$CONFIG['Theme'].'/style.css',
        'selected'   => $CONFIG['current_page'],
    ];
    
    switch($CONFIG['current_page']) {
        case 'registration':

            // The registration page is open for all users - no need for authorization

            $template = 'registration.twig';
            $attributes['title'] = 'Registration';
            $attributes['regpath'] = 'config/signup.php';
            break;

        case 'admin':
            
            // Set required role for this page
            $required_role = 'admin'; // Only users with the admin role can access the page
            
            // Check if user has the required role
            if(authorize_user($username, $required_role)) {
                $template = 'admin.twig';
                $attributes['title'] = 'Admin sidan';
            } else {
                header('Location: http://'.$_SESSION['site_url']);
            }

            break;

        default:

            $filename = $CONFIG['content_folder'].$CONFIG['current_page'];
            $file = file($filename);     // Read the file
            $yaml = extract_yaml($file); // Separate yaml from content
            $page = implode($file);      // Transform file content into a string
                
            // Set the required role for the page according to the yaml-settings.
            $required_role = $yaml['Role'] ?? '';

            // Check if user has the required role
            $authorized = true;
            if ($required_role != ''){
                $authorized = isset($_SESSION['loggedin']) && authorize_user($username, $required_role);
            }

            if ($authorized) {
                // Generate content from parsedown-file
                $parsedown = new ParsedownExtra();
                $content = $parsedown->text($page);
                
                $template = 'index.twig';
                $attributes['title'] = $yaml["Title"] ?? 'Unset';
                $attributes['nav'] = $nav;
                $attributes['side_nav'] = $side_nav;
                $attributes['content'] = $content;
            } else {
                $template = 'unauthorized.twig';
                $attributes['title'] = "Ej tillgänglig";
            }
    }

    echo $twig->render($template, $attributes);
