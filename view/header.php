<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="referrer" content="unsafe-url">
        <meta name="viewport" content="width=device-width; initial-scale=1">

        <title><?= $yaml["Title"] ?></title>

        <link rel="shortcut icon" href="img/favicon.ico"/>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--
        <nav>
            <ul>
                <li><a href="home.php">Framsidan</a></li>
                <li><a href="code.php">Programmering</a></li>
                <li><a href="computers.php">Datorer</a></li>
            </ul>
        </nav>
        -->        
        <header class="header">
            <img class="logo" src="../public/img/favicon.png">
            <span class="title">InfoRepo</span>
            <span class="subtitle">Min informationsportal</span>
        </header>
        <?= $nav ?>