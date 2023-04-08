<?php 
    include('../config/config.php');
    include('../config/controller.php');
    $nav = generate_navbar();    
    $title = "Löfqvist Info Repository | Frontpage";
    include('../view/header.php')
?>

<div class="two-col-layout">
    <main class="main">
        <article class="article">    
            <header>
                <h1>Om mig själv</h1>
                <p class="author">Skriven av Anders Löfqvist, uppdaterad <time datetime="2023-03-02">2023-03-02</time>.</p>
            </header>

            <figure class="figure right">
                <img src="img/babyanders.jpg" width="300" alt="Mini-me">
                <figcaption>Anders Löfqvist</figcaption>
            </figure>

            <p>Jag är en glad sill på 53 jordsnurr som gillar mat och långa promenader.</p>

            <footer class="byline">
                <figure class="figure left">
                    <img src="img/andersprofile.jpg" width="100" alt="Anders Löfqvist">
                    <figcaption>Anders Löfqvist</figcaption>
                </figure>
                <p>
                    Anders Löfqvist, jobbar som Obsolescence Manager på BAE Systems Hägglunds. Han har en dataingenjörsutbildning i grunden 
                    och är även examinerad maskiningenjör. I sitt CV så har Anders bl a arbetslivserfarenhet från elektroniskpublicering och 
                    utveckling av webplatser med kopplingar mot share point.
                </p>
            </footer>

        </article>
    </main>
    <aside>
        <p>Innehållet i sidokolumnen</p>
    </aside>
</div>
<?php include('../view/footer.php') ?>
