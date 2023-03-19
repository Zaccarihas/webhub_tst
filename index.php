<?php 

    include('config/config.php');
    include('config/controller.php');

    $theme = 'code';

    $loader = new \Twig\Loader\FilesystemLoader("themes/$theme");
    $twig = new \Twig\Environment($loader, []);
    /*
    $twig = new \Twig\Environment($loader, [
        'cache' => 'themes/shared/templ_cache'
    ]);
    */
    
    // Generate navigation based on content
    $nav = generate_navbar_info();    

    // Separate yaml from markdown in sourcefile
    
    $pagename = 'index.md';
    if (isset($_GET['page'])) {
        $pagename = htmlentities($_GET['page']);
    }
    $filename = "content/$pagename";

    $file = file($filename);
    $yaml = extract_yaml($file);
    $page = implode($file);

    // include('view/shared/header.php');
        
    // Generate content from parsedown-file
    $parsedown = new ParsedownExtra();
    $content = $parsedown->text($page);

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
        'selected' => $pagename,
        'title' =>  $yaml["Title"],
        'nav' => $nav,
        'content' => $content
    ])
    
?>

