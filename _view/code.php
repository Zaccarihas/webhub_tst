<?php 
    include('../config/config.php');
    $title = "Löfqvist Info Repository | Code";
    include('../view/header.php');

    $parsedown = new Parsedown();
    $page = file_get_contents('content/test.md');
?>

<main>
    <?= $parsedown->text($page) ?>
</main>

<?php include('../view/footer.php') ?>