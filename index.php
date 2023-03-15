<?php 
    //require __DIR__.'/vendor/autoload.php';

    include('config/config.php');
    include('config/controller.php');    
        
    // Generate navigation based on content
    $nav = generate_navbar();    

    // Separate yaml from markdown in sourcefile
    
    $filename = (isset($_GET['page'])?'content/'.$_GET['page']:'content/index.md');
    $file = file($filename);
    $yaml = extract_yaml($file);
    $page = implode($file);

    include('view/shared/header.php');
        
    $parsedown = new ParsedownExtra();
    
?>

<aside class="sidebar"></aside>
<main class="grid page_content">
    
    <div class="top-left">
        Ett huvud för artikeln
    </div>
    <div class="top-right">
        En fot för artikeln
    </div>
    <div class="bottom">
        <?= $parsedown->text($page) ?>
    </div>    
    
</main>

<?php include('view/shared/footer.php') ?>
