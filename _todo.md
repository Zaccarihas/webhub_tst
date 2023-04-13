---
Title:         Things todo
Description:   Saker att göra på hemsidan
---
To Do
===================================================================================================

In progress
---------------------------------------------------------------------------------------------------  

* Gör kursmoment webtec 06 - PHP, PDO och SQL
* Gör kursmoment desing 04 - Färg
* Gör kursmoment design 05 - Bild
* Repetera kursmoment design 03 - Layout
* Kolla upp layout-teknik med spalter och 16-delar och beskriv detta
* Fixa stylesheet så att kodrutor håller sig inom överställt objekt (jmf SQL lite sidan)
* Gör sidorna mer läsbara genom att justera typsnitt i exempelvis listor.
* Anpassa sida för mobil
* Anpassa sida för bredare skärmar som tar tillvara mer av ytan.


Backlog
---------------------------------------------------------------------------------------------------

### Published version 1.0 online
* Skapa en RESTful router (jmf rewritetest-mappen på local)
    * Se till att navigeringen använder url istället för filsökvägar
* Gör om databaskopplingen så den använder pdo-rutiner istället för mysqli (authentication jmf med signup.php)
* Fixa till en lösning för att presentera felmeddelanden från exempelvis en misslyckad registrering av användare (se signup.php)
    * Fixa till så att en misslyckad inloggning hamnar tillbaka på framsidan med ett felmeddelande.
    * Jämför flash-messages på nätet
* Gör så att cls_site använder StaticPage-klassen för default-sidorna.
* Läs på mer om Twig envirenment och hur man använder cache
~~~
$twig = new \Twig\Environment($loader, [
    'cache' => 'themes/shared/templ_cache'
]);
~~~
* Göra nya sidan publik på webservern och ersätta Pico-varianten.

### Version 1.1
* Sätt up en adminsida där man kan godkänna användare (active), ändra användaruppgifter, ta bort användare  och ändra lösenord.

### Version 1.2
* Skapa en online md-editor

### Version 2.0
* Skapa en ny förgrening (fork) i git för den nya versionen
* Utred hur dynamiska sidor ska hanteras. Ska de representeras av en md-fil med bara config-delen? Ska de ha en egen klass DynamicPage. Hur kan man nästla in statiska och dynamiska sidor i samma navigering.
* Läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?)
* Gör en flernivåslista för navigering där man kan expandera och navigera sig i ett träd.
* Gör om todo-list till en databaslista som kan hanteras via hemsidan.
* Snygga till Registration form genom att använda 8pt-metoden för att sätta storleken på fält bl a.
* Gör ett helt nytt tema (mer modernt - utan klassiskt sidhuvud och sidfot) och testa att växla mellan de olika temorna
* Gör en profilsida för inloggad användare (kanske en privat (dold) och en publik).
    * Gör en byline som kan visas vid dokument och inläggg som användaren har skapat
* Presentera anropande ip-nummer
* Gör en logg för varje användare över vilka ip de brukar ansluta från. 
    * Låt användaren bestämma om endast betrodda ip-nummer får användas för uppkoppling eller om användaren vill ha en varning med möjlighet till utloggning och spärr om inloggning sker från okänt ip-nummer.
* Se serien Udamy Clone på youtube
* Utred om man kan skapa taxonomies som sen kan ligga till grund för speciell navigering
* Skapa en blogg funktion
* Lägg in funktionalitet för att ladda upp filer till servern (jmf inventory)
* Skapa ett forum med PHP-forum
* Lägg in dbit
* Lägg in inventory
* Lägg in home maintenance
* Snygga till returen från authorize_user i authorization.php (inte snyggt med if-sats men jämförelsen med $pos misslyckades).
* Beskriv css-enheter så som em, ex, px, pt, %, vw, rem etc
* Beskriv de globala egenskapsvärdena inherit, initial, revert, revert-layer och unset
* Studera layoutmetoden float och beskriv den (inkl clearfix)
* Studera verktygen för webdesign: Colorzilla, Figma och Adobe XD
* Studera Typography Handbook på nätet.
* Studera responsiv design via <https://web.dev/learn/design/>
* Läs och studera boken A beutiful webdesin som finns på nasen.
* Studera mer om grid layout för websidor
* Studera kryptering. vad är skillnaden mellan rsa, escd, etc. Hur fungerar ssh och keychain
* I ParseExtra i vendor-mappen används en utgången funktion mb_convert_encoding. Här: <https://stackoverflow.com/questions/11974008/alternative-to-mb-convert-encoding-with-html-entities-charset> beskrivs ett alternativt sätt men jag vet inte om jag vill uppdatera filer som jag installerat via composer `(htmlspecialchars_decode(utf8_decode(htmlentities($string, ENT_COMPAT, 'utf-8', false)));)`. (Felmeddelandet dyker på sidan SQLite)
* Testa drag and drop funktion på någon sida (ev en kanban-sida för uppgifter)
* Utvärdera och testa lite css-animationer och effekter till sidan
* Lägg över pdotest.php till en generell site (typ secure) och ta bort från huvudmappen (ingår inte i siten utan är ett generellt verktyg för att kontrollera databaskopplingen)
* Gör en pomodoro-klocka till hemsidan
* Gör en internet-tid-klocka till sidan.
* Gör kursmoment js 01 - Utvecklingsmiljö och grunder
* Gör kursmoment js 02 - moduler
* Gör kursmoment js 03 - DOM och events
* Gör kursmoment js 04 - webpack
* Gör kursmoment js 05 - WebAPI
* Gör kursmoment js 04 - Objekt
* Strukturera om så att underlaget under secure kan användas för flera siter. Exempelvis lägg controllers under en shared-mapp och endast site unika controllers under site-mapparna. För att detta ska fungera måste new Site anropas med vilken site som ska skapas och mappar som exempelvis content_folder kan inte beräknas från Site-klassfilens fysiska position.

Done
---------------------------------------------------------------------------------------------------
### 2023-04-13
* Rensa bort klasser, filer och kod som inte används (ex cls_navbar och cls_sidebar)

### 2023-04-12
* Snygga till indikeringen för inloggad användare och logout-knappen
* Ändra storlek på ikonen 
* Gör så att navigeringsmenyerna inte tar med sidor som man inte har tillgång till.
* Fixa till styling för sidebar
    * Gör en hover-effekt på menyvalen
    * Fixa färgen på länkarna
    * Styla backlink på ett annat sätt
    * Styla summeringssidan (index.md) på ett annat sätt (understruken kanske)
* Gör så att menyn visas även på sidor som man inte är behörig till.

### 2023-04-11
* Fixa sidonavigeringen. Det måste vara möjligt att återgå till mappens index.md samt att hoppa upp till överställd mapps index.md

### 2023-04-09
* Lägg över de specifika sidkontrollerna för dynamiska sidor till secure
    * Signup fungerar inte. Registrering av nya användare fungerar men authorizer släpper inte igenom med deras lösenord. - Man måste atkivera användaren först
* Flytta innehållsmappen och config-mappen till websecure
* Lägg över vendor-mappen till secure    
    * Ta bort vendor mappen från public
* Lägg över templates-mappen till secure från themes-mappen
    * se till att det går att skapa CSS-filen i public
    * Lyft över SCSS-filerna till secure
    * Lyft över stylesheet-genereringen och npm till secure, men se till att resultatfilen hamnar under public så den kan laddas ner av webläsaren
    * Kolla så att den genererade CSS-filen hänvisar till webfonts. (Webfonts-mapparna måste troligtvis ligga kvar under public)
    * se till att det går att skapa twig-utskriften från secure
    * Ta bort templates-mappen under themes från public
    * Jag valde att ha kvar stilmallsgenereringen på public eftersom mycket av stilmallen ändå måste ligga kvar där. Twig-mallarna ligger dock under secure.
* Gör en named session istället för en unnamed.

### 2023-04-08
* Gör om till OOP
    * Gör en abstrakt klass navigation som innehåller get_folder och låt cls_navbar ärva den abstrakta klassen.
    * Gör en cls_sidebar som också ärver navigation* Flytta innehållsmappen och config-mappen till websecure
    * Gör en klass för authorization.php

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
