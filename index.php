<?php 

    require('config/config.php');
    require_once('config/controller.php');
    require_once('config/filestruct.php');

    $theme = 'code';

    $loader = new \Twig\Loader\FilesystemLoader("themes/$theme");
    $twig = new \Twig\Environment($loader, []);
    /*
    $twig = new \Twig\Environment($loader, [
        'cache' => 'themes/shared/templ_cache'
    ]);
    */ 
    
    // Process the requested page
    
    $page_url = 'index.md';
    if (isset($_GET['page'])) {
        $page_url = htmlentities($_GET['page']);
    }
    //$filename = "content/$page_url";
    $filename = CONTENT_ROOT.$page_url;
    
    $file = file($filename);     // Read the file
    $yaml = extract_yaml($file); // Separate yaml from content
    $page = implode($file);      // Transform file content into a string
        
    // Generate content from parsedown-file
    $parsedown = new ParsedownExtra();
    $content = $parsedown->text($page);

    // Generate navigation based on current page
    $nav = generate_navbar_info();
    
    $sub_url = substr($page_url, 0, strrpos($page_url, "/"));
    
    $side_nav = '';
    if ($sub_url !== '') {
        $side_nav = generate_navbar_info("$sub_url/");
    }

    // Filestruct solution
    /*
    $list = get_folder('');
    $tree = create_tree($list);
    */

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
        'loadtime' => $loadtime,
        'files' => $numfiles,
        'mem' => $mem,
        'selected' => $page_url,
        'title' =>  $yaml["Title"],
        'nav' => $nav,
        'side_nav' => $side_nav,
        'content' => $content
    ]);



