---
Title:         Things todo
Description:   Saker att göra på hemsidan
---
To Do
===================================================================================================

In progress
---------------------------------------------------------------------------------------------------
* Gör om till OOP och läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?)
    * Gör en klass för authorization.php
* Lägg över de specifika sidkontrollerna för dynamiska sidor till secure
* Flytta innehållsmappen och config-mappen till websecure


Backlog
---------------------------------------------------------------------------------------------------
* Fixa sidonavigeringen. Det måste vara möjligt att återgå till mappens index.md samt att hoppa upp till överställd mapps index.md
* Gör en named session istället för en unnamed.
* Fixa till styling för sidebar
* Skapa en RESTful router (jmf rewritetest-mappen på local)
* Sätt up en adminsida där man kan godkänna användare (active), ändra användaruppgifter, ta bort användare  och ändra lösenord.
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
* Gör en logg för varje användare över vilka ip de brukar ansluta från. Låt användaren bestämma om endast betrodda ip-nummer får användas för uppkoppling eller om användaren vill ha en varning med möjlighet till utloggning och spärr om inloggning sker från okänt ip-nummer.
* Se serien Udamy Clone på youtube
* Lyft över stylesheet-genereringen och npm till secure, men se till att resultatfilen hamnar under public så den kan laddas ner av webläsaren
* Gör ett helt nytt tema (mer modernt - utan klassiskt sidhuvud och sidfot) och testa att växla mellan de olika temorna
* Gör en profilsida för inloggad användare (kanske en privat (dold) och en publik).
* Lägg in funktionalitet för att ladda upp filer till servern
* Gör om todo-list till en databaslista som kan hanteras via hemsidan.
* Snygga till Registration form genom att använda 8pt-metoden för att sätta storleken på fält bl a.
* Fixa till en lösning för att presentera felmeddelanden från exempelvis en misslyckad registrering av användare (se signup.php)
    * Fixa till så att en misslyckad inloggning hamnar tillbaka på framsidan med ett felmeddelande.
    * Jämför flash-messages på nätet
* Fixa stylesheet så att kodrutor håller sig inom överställt objekt
* Göra nya sidan publik på webservern och ersätta Pico-varianten.
* Gör en anpassad sida för mobil
* Gör en anpassad sida för bredare skärmar som tar tillvara mer av ytan.
* Skapa en blogg funktion
* Skapa ett forum med PHP-forum
* Lägg in dbit
* Lägg in inventory
* Lägg in home maintenance
* Snygga till returen från authorize_user i authorization.php (inte snyggt med if-sats men jämförelsen med $pos misslyckades).
* Gör så att navigeringsmenyerna inte tar med sidor som man inte har tillgång till.
* Snygga till indikeringen för inloggad användare och logout-knappen
* Beskriv css-enheter så som em, ex, px, pt, %, vw, rem etc
* Beskriv de globala egenskapsvärdena inherit, initial, revert, revert-layer och unset
* Studera layoutmetoden float och beskriv den (inkl clearfix)
* Kolla upp layout-teknik med spalter och 16-delar och beskriv detta
* Studera verktygen för webdesign: Colorzilla, Figma och Adobe XD
* Studera Typography Handbook på nätet.
* Studera responsiv design via <https://web.dev/learn/design/>
* Läs och studera boken A beutiful webdesin som finns på nasen.
* Studera mer om grid layout för websidor
* Studera kryptering. vad är skillnaden mellan rsa, escd, etc. Hur fungerar ssh och keychain
* I ParseExtra i vendor-mappen används en utgången funktion mb_convert_encoding. Här: <https://stackoverflow.com/questions/11974008/alternative-to-mb-convert-encoding-with-html-entities-charset> beskrivs ett alternativt sätt men jag vet inte om jag vill uppdatera filer som jag installerat via composer `(htmlspecialchars_decode(utf8_decode(htmlentities($string, ENT_COMPAT, 'utf-8', false)));)`
* Testa drag and drop funktion på någon sida (ev en kanban-sida för uppgifter)


Done
---------------------------------------------------------------------------------------------------
### 2023-04-08
* Gör om till OOP och läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?)
    * Gör en abstrakt klass navigation som innehåller get_folder och låt cls_navbar ärva den abstrakta klassen.
    * Gör en cls_sidebar som också ärver navigation

### 2023-04-01
* Sätt upp en ny GIT för secure
* Fixa auktoriseringsproblemen för GIT på html/nav
* Flytta innehåll från nuvarande Pico-sida till den nya sidan.

### Tidigare
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
