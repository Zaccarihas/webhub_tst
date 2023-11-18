In progress
---------------------------------------------------------------------------------------------------  
* Refactor och skapa mer OOP i befintliga klasser
    * Strukturerar om routern så att man slipper registrera nya sidor på flera ställen i koden. (Kanske en funktionsmatris?)
    * Det borde gå att slå ihop __translate_url__ och __route__ i __cls_site__ till en procedure så man kan ha en switch-sats istället för två.



Backlog
---------------------------------------------------------------------------------------------------
### Version 1.0

#### Version 1.2 - User management

##### Version 1.2.1 - Admin page
* Gör en vy av alla sidor under content där man kan se varje sidas config data
* Sjösätt och testa i produktionsmiljön

##### Version 1.2.2 - Security update
* Skicka inte med databasuppgifterna i session. Uppkopplingsdata hårdkodas in i varje controller.
* Läs på mer om Twig enviroenment och hur man använder cache
~~~
$twig = new \Twig\Environment($loader, [
    'cache' => 'themes/shared/templ_cache'
]);
~~~
* Snygga till returen från authorize_user i authorization.php (inte snyggt med if-sats men jämförelsen med $pos misslyckades).

##### Version 1.2.3 - User page
* Gör en profilsida för inloggad användare (kanske en privat (dold) och en publik).
    * Gör så att profilsidorna visas via url __/user/username__
    * Gör en byline som kan visas vid dokument och inläggg som användaren har skapat
* Presentera anropande ip-nummer
* Gör en logg för varje användare över vilka ip de brukar ansluta från. 
    * Låt användaren bestämma om endast betrodda ip-nummer får användas för uppkoppling eller om användaren vill ha en varning med möjlighet till utloggning och spärr om inloggning sker från okänt ip-nummer.
* Gör så att redan inmatade fält i registration-form bevaras ifall man blir återkopplad efter en felaktig registrering. (ex om password confirmation inte fungerar.)
* Inför mer kontroller kring registrering av användare:
    * Kontrollera om fullständigt namn på ny användare har använts tidigare
    * kontrollera e-post mot reguljärt uttryck
    * Sätt minimum längd på lösenord
    * Kontrollera att lösenord innehåller varierande tecken (versaler, gemener, siffror, och specialtecken)

##### Version 1.2.4 - Improved messages and page meta data
* Styla flash-meddelanden så att olika typer presenteras på olika sätt.
    * Ändra stilmallen så inget utrymme tas upp på sidan avsett för flashmeddelanden om inget meddelanden ska visas.
* Presentera författare, status och role på varje sida

#### Version 1.3 - Adaptive
* Gör kursmoment desing 04 - Färg
* Gör kursmoment design 05 - Bild
* Studera picture-elementet
* Repetera kursmoment design 03 - Layout
* Kolla upp layout-teknik med spalter och 16-delar och beskriv detta
* Studera responsiv design via <https://web.dev/learn/design/>
* Anpassa sida för mobil
* Anpassa sida för bredare skärmar som tar tillvara mer av ytan.
* Gör en bättre första sida med lite nyheter och bilder

### Version 2.0
* Skapa en ny förgrening (fork) i git för version 2.0
* Se serien Udamy Clone på youtube

#### Version 2.1 - Filhantering
* Lägg in funktionalitet för att ladda upp filer till servern (jmf inventory)
* Lägg till fält för användarbild
    * Se till att bilden går att laddas upp från sidan
    * Använd användarbilden på profilsidorna och i byline
* Snygga till Registration form genom att använda 8pt-metoden för att sätta storleken på fält bl a.

#### Version 2.2 - Online editing
* Skapa en online md-editor
* Gör en flernivåslista för navigering där man kan expandera och navigera sig i ett träd.

#### Version 2.3 - Dynamiska sidor
* Utred hur dynamiska sidor ska hanteras. Ska de representeras av en md-fil med bara config-delen? Ska de ha en egen klass DynamicPage. Hur kan man nästla in statiska och dynamiska sidor i samma navigering.
* Utred hur man bäst kan göra generella navigeringsfunktioner
    * Kan man skapa menyer där man godtyckligt lägger in både statiska och dynamiska sidor
    * Kan man skapa menyer utifrån en viss filstruktur (som den struktur som nu finns men med begränsningar kanske)
    * Kan man skapa menyer utifrån meta-data om sidan (taxonomies exempelvis)
    * Kan man ha olika menyer för olika användare, eller att samma meny visar olika alternativ beroende på användare och behörigheter
* Gör en publik-struktur som inte innehåller 'Draft' sidor, och en privat struktur där användaren kan navigera bland publicerade och sina egna opublicerade sidor.
    * Om mappen är synlig (inget underscore) men index-filen är låst (Draft eller högre behörighets krav) så ska inte mappen heller visas.
* Gör om todo-list till en databaslista som kan hanteras via hemsidan.
* Skapa och implementera en fritext-sökning på sidan (kan man använda någon sökmotors api eller måste man skapa en egen?)

#### Version 2.4 - Security update
* Studera kryptering. vad är skillnaden mellan rsa, escd, etc. Hur fungerar ssh och keychain
    * Vad krävs för att sätta upp en vpn mot sidan
    * Hur fungerar mina https-certifikat
* Studera OAuth
* Studera two factor authentication

### Version 3.0 - New Design

#### Version 3.1 - Repackaging
* Strukturera om så att underlaget under secure kan användas för flera siter. Exempelvis lägg controllers under en shared-mapp och endast site unika controllers under site-mapparna. För att detta ska fungera måste new Site anropas med vilken site som ska skapas och mappar som exempelvis content_folder kan inte beräknas från Site-klassfilens fysiska position.
* Rensa bort siter som inte används från home.lofqivst.me och lägg dem på utvecklingsservern (BlueI5)
* Lägg över pdotest.php till en generell site (typ secure) och ta bort från huvudmappen (ingår inte i siten utan är ett generellt verktyg för att kontrollera databaskopplingen)
* I ParseExtra i vendor-mappen används en utgången funktion mb_convert_encoding. Här: <https://stackoverflow.com/questions/11974008/alternative-to-mb-convert-encoding-with-html-entities-charset> beskrivs ett alternativt sätt men jag vet inte om jag vill uppdatera filer som jag installerat via composer `(htmlspecialchars_decode(utf8_decode(htmlentities($string, ENT_COMPAT, 'utf-8', false)));)`. (Felmeddelandet dyker på sidan SQLite)

#### Version 3.2 - CSS
* Gör ett helt nytt tema (mer modernt - utan klassiskt sidhuvud och sidfot) och testa att växla mellan de olika temorna
    * Använd gärna lila och orange i temat
* Beskriv css-enheter så som em, ex, px, pt, %, vw, rem etc
* Beskriv de globala egenskapsvärdena (html/css) inherit, initial, revert, revert-layer och unset
* Studera layoutmetoden float och beskriv den (inkl clearfix)
* Studera verktygen för webdesign: Colorzilla, Figma och Adobe XD
* Studera Typography Handbook på nätet.* Länkar till assetts i templates är hårdtypade (ex logo), fixa så att de tas från config
* Läs och studera boken A beutiful webdesin som finns på nasen.
* Studera mer om grid layout för websidor
* Utvärdera och testa lite css-animationer och effekter till sidan

#### Version 3.3 - JS
* Gör kursmoment js 01 - Utvecklingsmiljö och grunder
* Gör kursmoment js 02 - moduler
* Gör kursmoment js 03 - DOM och events
* Gör kursmoment js 04 - webpack
* Gör kursmoment js 05 - WebAPI
* Gör kursmoment js 04 - Objekt
* Skapa javascript-funktioner så som softscroll på textsidorna.
* Gör en internet-tid-klocka till sidan.

### Version 4.0 - Functions

#### 4.1 - Inventory
* Lägg in inventory

#### 4.2 - Home Maintenance
* Lägg in home maintenance

#### 4.3 - Project
* Gör en pomodoro-klocka till hemsidan
* Testa drag and drop funktion på någon sida (ev en kanban-sida för uppgifter)
* Lägg in projektregistret på sidan
    * Gör så att varje användare kan göra sina egna projekt med fillagring och tasklistor

#### 4.4 - Site improvments
* Utred om man kan skapa taxonomies som sen kan ligga till grund för speciell navigering
* Utred hur man använder mail Chimp för att skapa en mailserver och vad som skulle krävas för att skapa en egen mailklient på sidan.

#### 4.5 - Blogg & Forum
* Skapa en blogg funktion
* Skapa ett forum med PHP-forum

#### 4.6 - DBit
* Lägg in dbit

Unplanned
---------------------------------------------------------------------------------------------------
* Studera följande HTML-element: datalist (verkar inte fungera i Firefox) och listproperty på en input, __input type="color/time"__, progressbar, open graph
* Studera meta-taggar för tillbaka länkar till siten så som facebooks og (open graph) och twitters twitter-property
* Studera template elementet
* Lägg meta-taggen som tar hänsyn till hur robots ska hantera sidan
* Lägg till så att sidor kan presenteras i olika mallar beroende på vilken template som angivits i yaml för sidan.
* Utred hur man kan textsöka bland filerna.
* Inför en javascript varning i användarformuläret som ber om bekräftelse när en användare håller på att tas bort.
* Gör så att en lång användarlista kan delas upp m h a limit, men att funktioner på admin-sidan fortfarande fungerar.
* Utveckla vyn på admin-sidan över statiska sidor, med att inkludera även dynamiska sidor.
* Studera HTML-elementet Dialog (modulär) och se hur det kan användas för att skapa popup-formulär för att ändra användardata (https://www.youtube.com/watch?v=ywtkJkxJsdg)
* Gör en ny typ av navigering för bloggen som sorterar inläggen i datumordning istället för på rubrik.
* Gör en egen sidmall för blogg-inlägg
    * Studera hur andra bloggar brukar vara stylade och strukturerade.
* Skapa sidor på sidan utifrån de noteringar som jag hittills lagt i OneNote
* Site objektet borde köra initieringen (starta autoloaders, error reporting och sessions) istället för direkt från index, för att minska kommunikationen mellan publik och säker yta.
* Se över vad som behöver läggas i session för att undvika risker vid session hijaaking (jmf Site / __construct)
* Jämför variablerna och egenskaperna: Site/nav, Site/path, Site/public_folder, Session/site_url, Session/public_folder. När och var används de. Kan någon reduceras bort?

Done
---------------------------------------------------------------------------------------------------
### 2023-11-13
* Lägg in så att man kan sätta en användares privilegier från userform.
    * Lägg till en ny privilegie
    * Ta bort en privilegie
    * Se till att privilegier raderas när användaren raderas.

### 2023-06-27
* Lägg in så att man kan sätta en användares privilegier från userform.
    * Visa nuvarande privilegier

### 2023-05-28
* Sätt upp en adminsida:
    * Lägg in funktionalitet som:
        * registrera nya användare
            * Se till att man kommer tillbaka till admin när man registrerar från admin och till frontpage när man registrerar via Register
        * ändra användaruppgifter
        * ändra lösenord
* Se till att man kan aktivera en användare från userform
* Lägg till en tillbaka knapp i userform som tar en tillbaka till adminsidan
* Gör så att active indikeringen i userlist inte går att ändra (ska vara bara en markering)

### 2023-05-19
* Sätt upp en adminsida:
    * Lägg in funktionalitet som:
        * ta bort användare
            * Skapa en knapp för att radera användaren

### 2023-05-17
* Sätt upp en adminsida:
    * Lägg in funktionalitet som:
        * ta bort användare
            * Gör ett userform
            * Länka samman userlist med userform via en länk och routing

### 2023-05-14
* Sätt upp en adminsida
    * Populera listan med verkliga data från db
    * Lägg in funktionalitet som:
        * godkänna användare (active),
            * Lägg in en sänd-knapp i formuläret och styla den med css
            * Gör en kontroller som hanterar uppdateringen
            * Återgå till admin-sidan 
* Lägg in navigering så att man kan ta sig tillbaka till första sidan åtminstone
* Styla sidan med CSS

### 2023-05-11
* Sätt upp en adminsida:
    * Sätt upp en rout med en dummy userlist

### 2023-05-07
* Gör nytt försök till att sjösätta sidan
* Dokumentera vilka delar som måste lyftas in manuellt när en ny site skapas (FA, composer install/update, npm update, etc)
* Gör en egen repository för den publicerade siten och fundera på hur man ska göra för att implementera ny versioner i framtiden.
    * Ska nog inte göra egen repository - måste fixa så att uppdateringar från git fungerar även på produktionsservern. Kan innebära att vissa inställningar måste ligga i config-filen på produktionsservern och sedan läsa in dessa.
* Sjösatt Version 1.0.1 - Packaging
* Utred varför jag behöver redirect controllers för login, logout och signup? Varför kan jag inte anropa de vanliga hanterarna direkt?
    - Eftersom man inte kan lägga in en sökväg till en fil som ligger utanför den publika delen av webservern, som form action för inloggningsformuläret.
* Uppdatera redirect-scripten så att de använder en generisk adress.
* Utred varför inte Code visas på produktionsservern fast än att den finns i contentmappen och är öppen.
* Gör så att hänsyn tas till sidans status, d v s om status inte är published så ska den inte visas för andra än författaren och admin
* Sjösätter Version 1.0.2 och därmed också Version 1.1

### 2023-05-06
* Länkar som sätts i bl a attributes-matrisen är hårdtypade till site-nament. Generalisera så att detta tas från config-filen istället.
* Länkar till assetts i templates är hårdtypade (ex logo), fixa så att de tas från config - Satte som attribut till mallen. (ej från config)
* Funktionen make_restful_url i nav-klassen hänvisar till hårdtypad sökväg /nav. Gör denna mer generell
* Rensa i index.php enligt inlagda kommentarer.

### 2023-05-01
* Läs på om autoloaders. (jmf med den autoloader som composer redan skapat i vendor. - Kan man ha flera autoloader eller måste jag lägga mina egna klasser under vendor. Kan jag modifiera autoloader under vendor så jag kan lägga mina egna klasser någon annanstans eller måste jag registrera mina klasser enlig paketen på packagist?) - Skapade en egen autoloader som jag registrerade. Det ska gå att använda Composers autoloader genom att lägga in sina egna namnutrymmen i composer.json men jag fick inte det att fungera.
* Sökvägen för required-satserna i index.php och i kontrollers måste hårdtypas in.Går det att göra detta på ett smidigare sätt genom att sökvägen till den säkra delen anges i någon form av config-fil eller löser det sig med autoloader?


### 2023-04-30
* Göra nya sidan publik på webservern och ersätt Pico-varianten.
    * Döp om Pico-sidan till något annat
    * Klona in webhub_tst
    * Installeras vendor på secure via composer
    * Installera node-paketen via package.json. Fick lägga in ny version av node och npm, men la in den globalt så för att köra npm och node så behöver man köra sudo. <https://www.freecodecamp.org/news/how-to-update-node-and-npm-to-the-latest-version/>
    * Fixa alla hårdtypade sökvägar i index.php och controllers på både publik och säker sida
    * Aktivera yaml i php och sen starta om servern
        * installera Yaml <http://bd808.com/pecl-file_formats-yaml/>
        * Uppdatera php.ini (/etc/php/apache2) lägg till raden __extension = yaml.so__
        * Starta om apache med __sudo service apache2 restart
    * Fixa in logo - Hårdtypad sökväg i twig template
    * Fixa in fa
        * Packa ihop fa630 mapp och webfonts-mapp på utvecklingsserver
        * Placera dem på prj
        * Lyft in dem i produktionsservern
    * Fixa navigeringen från navbar - Hårdtypad hänvisning till /nav i Nav-klassens funktion för att skapa restful url
    * Login - felaktig header till /local/homeport istället för bara /homeport
    * Logout - felaktig header
    * Register - felaktig header till /nav

* Published version 1.0 online

### 2023-04-29
* Begränsa tillgången till innehållssidorna genom att sätta attribut i config-delen av sidan
Satte in så att man döljer alla mappar som inleds med underscore

* Göra nya sidan publik på webservern och ersätt Pico-varianten.
    * Skapa en ny mapp 'secure' utanför webservern, och en undermapp "homeport"
    * Klona webhub_secure till den nya mappen
    * Skapa en content-mapp under models
        * Skapa ett bash-script som kopierar content från projekt-mappen på nas-en
        * Tanka in innehållet från projekt-mappen till den säkra delen av sidan
    * Sätt upp databasen på produktionsservern
    * Skapa en config-fil



### 2023-04-28
* Gör så att cls_site använder StaticPage-klassen för default-sidorna.
* Döp om sidan till webhub och hitta på en ny underrubrik

### 2023-04-27
* Inför mer kontroller kring registrering av användare:
    * Mandatory fields
    * Kontroller om användarnamn används tidigare
* Skicka flash-meddelande och visa dessa på formulärsidan ifall fält inte har fyllts i korrekt.
* Kontrollera att inga inmatningar kan innehålla sql-injections. (htmlentities etc)


### 2023-04-25
* Fixa till en lösning för att presentera felmeddelanden från exempelvis en misslyckad registrering av användare (se signup.php)
    * Fixa till så att en misslyckad inloggning hamnar tillbaka på framsidan med ett felmeddelande.
    * Jämför flash-messages på nätet

### 2023-04-24
* Gör om databaskopplingen så den använder pdo-rutiner istället för mysqli (authentication jmf med signup.php)
* Visa navbar i registration for

### 2023-04-23
* Skapa en RESTful router (jmf rewritetest-mappen på local)
    * Se till att navigeringen använder url istället för filsökvägar
        * backlink fungerar inte

### 2023-04-14
* Gör sidorna mer läsbara genom att justera typsnitt i exempelvis listor
* Fixa stylesheet så att kodrutor håller sig inom överställt objekt (jmf SQL lite sidan)
* Gör kursmoment webtec 06 - PHP, PDO och SQL

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
