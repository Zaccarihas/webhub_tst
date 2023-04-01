---
Title:         Things todo
Description:   Saker att göra på hemsidan
---
To Do
===================================================================================================

In progress
---------------------------------------------------------------------------------------------------
* Gör om till OO och läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?)
* Lägg över de specifika sidkontrollerna för dynamiska sidor till secure
* Flytta innehållsmappen och config-mappen till websecure
* Flytta innehåll från nuvarande Pico-sida till den nya sidan.


Backlog
---------------------------------------------------------------------------------------------------
* Fixa till styling för sidebar
* Skapa en RESTful router
* Sätt up en adminsida där man kan godkänna användare (active), ändar användaruppgifter, ta bort användare  och ändra lösenord.
* Skapa en online md-editor
* Läs på mer om Twig envirenment och hur man använder cache
~~~
$twig = new \Twig\Environment($loader, [
    'cache' => 'themes/shared/templ_cache'
]);
~~~
* Ändra storlek på ikonen 
* Gör om databaskopplingen så den använder pdo-rutiner istället för mysqli (authentication jmf med signup.php)
* Presentera anropande ip-nummer
* Fixa sidonavigeringen. Det måste vara möjligt att återgå till mappens index.md samt att hoppa upp till överställd mapps index.md
* Se serien Udamy Clone på youtube
* Lyft över stylesheet-genereringen och npm till secure, men se till att resultatfilen hamnar under public så den kan laddas ner av webläsaren
* Gör ett helt nytt tema (mer modernt - utan klassiskt sidhuvud och sidfot) och testa att växla mellan de olika temorna
* Gör en profilsida för inloggad användare (kanske en privat (dold) och en publik).
* Lägg in funktionalitet för att ladda upp filer till servern
* Gör om todo-list till en databaslista som kan hanteras via hemsidan.
* Snygga till Registration form genom att använda 8pt-metoden för att sätta storleken på fält bl a.
* Fixa till en lösning för att presentera felmeddelanden från exempelvis en misslyckad registrering av användare (se signup.php)
    * Fixa till så att en misslyckad inloggning hamnar tillbaka på framsidan med ett felmeddelande.
* Lägg in dbit
* Lägg in inventory
* Snygga till returen från authorize_user i authorization.php (inte snyggt med if-sats men jämförelsen med $pos misslyckades).
* Gör så att navigeringsmenyerna inte tar med sidor som man inte har tillgång till.
* Snygga till indikeringen för inloggad användare och logout-knappen

Done
---------------------------------------------------------------------------------------------------
* Lägg till inloggning och auktorisering
    * Fixa inloggningsformulär
    * Skapa registration form
    * Begränsa tillgång till content via index.php
        * Begränsa till dynamiska sidor
        * Begränsa till statiska sidor där required roles tas från yaml-delen av sidan.

* Refactoring
    * Beskriv en bra struktur för content, assetts, views, models, themes, etc
    * Studera och implementera bättre lösning för sökvägar (jmf `__DIR__` etc)
    * Gå igenom index.php och stycka upp den i lämpliga funktioner och controllers
    * Gå igenom alla controllers under config-mappen och lägg dem i ny mapp controllers så att config blir ren config (yaml).

* Skapa ett snyggt sidhuvud
    * Jämför med sidhuvudet på webhub men få det lite striktare och mindre likt ett amerikanskt collage lag
