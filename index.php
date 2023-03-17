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
    $loadtime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

    // Render view through twig-template
    echo $twig->render("index.twig", [
        'loadtime' => $loadtime,
        'selected' => $pagename,
        'title' =>  $yaml["Title"],
        'nav' => $nav,
        'content' => $content
    ])
    
?>

