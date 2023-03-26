<?php 

    require('config/config.php');
    require_once('config/controller.php');
    require_once('config/filestruct.php');
    

    // Check login status
    $logged_in = isset($_SESSION['loggedin']);
    
    $username = "Not Logged In";
    if($logged_in) {
        $username = $_SESSION['name'];
    }
    
    $theme = 'code';

    $loader = new \Twig\Loader\FilesystemLoader("themes/$theme");
    $twig = new \Twig\Environment($loader, []);
    /*
    $twig = new \Twig\Environment($loader, [
        'cache' => 'themes/shared/templ_cache'
    ]);
    */ 

    // Generate navbar
    $list = get_folder('');
    $nav = generate_navbar_info($list);
    
    // Process the requested page
    
    $page_url = 'index.md';
    if (isset($_GET['page'])) {
        $page_url = htmlentities($_GET['page']);
    }
    


    
    $filename = CONTENT_ROOT.$page_url;
    
    $file = file($filename);     // Read the file
    $yaml = extract_yaml($file); // Separate yaml from content
    $page = implode($file);      // Transform file content into a string
        
    // Generate content from parsedown-file
    $parsedown = new ParsedownExtra();
    $content = $parsedown->text($page);

    // Generate sidebar navigation
    $side_nav = "";
    $sub_url = substr($page_url, 0, strrpos($page_url, "/"));
    
    if ($sub_url !== '') {

        $sub_url .= "/";
        // Find sublevel in list
        $sub_list = get_sub_level($list, $sub_url);
        $side_nav = generate_sidebar_info($sub_list, $sub_url);

    }

   

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


    // Render view through twig-template
    echo $twig->render("index.twig", [
        'loggedin' => $logged_in,
        'username' => $username,
        'loadtime' => $loadtime,
        'files' => $numfiles,
        'mem' => $mem,
        'selected' => $page_url,
        'title' =>  $yaml["Title"],
        'nav' => $nav,
        'side_nav' => $side_nav,
        'content' => $content
    ]);



