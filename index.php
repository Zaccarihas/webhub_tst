<?php 
    include('config/config.php');
    //include('controllers/controller.php');
    
        
    // Generate navigation based on content
    //$nav = generate_navbar();    

    // Separate yaml from markdown in sourcefile
    /*
    $filename = (isset($_GET['page'])?'../../secure/nav/content/'.$_GET['page']:'../../secure/nav/content/index.md');
    $file = file($filename);
    $yaml = extract_yaml($file);
    $page = implode($file);

    include('view/shared/header.php');
        
    $parsedown = new Parsedown();
    
?>

<main>
    <?= $parsedown->text($page) ?>
</main>

<?php include('view/shared/footer.php') ?>
*/