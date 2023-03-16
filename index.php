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
    
    $filename = (isset($_GET['page'])?'content/'.$_GET['page']:'content/index.md');
    $file = file($filename);
    $yaml = extract_yaml($file);
    $page = implode($file);

    // include('view/shared/header.php');
        
    // Generate content from parsedown-file
    $parsedown = new ParsedownExtra();
    $content = $parsedown->text($page);

    // Render view through twig-template
    echo $twig->render("index.twig", [
        'title' =>  $yaml["Title"],
        'nav' => $nav,
        'content' => $content,
    ])
    
?>

