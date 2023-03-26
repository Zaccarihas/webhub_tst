---
Title:         Things todo
Description:   Saker att göra på hemsidan
---
To Do
===================================================================================================

In progress
---------------------------------------------------------------------------------------------------
* Refactoring
    * Beskriv en bra struktur för content, assetts, views, models, themes, etc
    * Studera och implementera bättre lösning för sökvägar (jmf `__DIR__` etc)
    * Gå igenom index.php och stycka upp den i lämpliga funktioner och controllers
    * Gå igenom alla controllers under config-mappen och lägg dem i ny mapp controllers så att config blir ren config (yaml).

Backlog
---------------------------------------------------------------------------------------------------
* Lägg till inloggning och auktorisering
    * Skapa registration form
    * Begränsa tillgång till content via index.php
* Fixa till styling för sidebar
* Skapa en RESTful router
* Flytta innehållsmappen och config-mappen till websecure
* Skapa ett snyggt sidhuvud
    * Jämför med sidhuvudet på webhub men få det lite striktare och mindre likt ett amerikanskt collage lag
* Sätt up en adminsida
* Skapa en online md-editor
* Läs på mer om Twig envirenment och hur man använder cache
* Ändra storlek på ikonen 
* Gör om databaskopplingen i auth så den använder pdo-rutiner istället för mysqli
* Presentera anropande ip-nummer
* Fixa sidonavigeringen. Det måste vara möjligt att återgå till mappens index.md samt att hoppa upp till överställd mapps index.md
* Gör om till OO och läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?)
* Se serien Udamy Clone på youtube


Done
---------------------------------------------------------------------------------------------------
    * Fixa inloggningsformulär