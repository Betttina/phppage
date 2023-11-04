Grundläggande bas för e-commerce webshop med databas

Skapat tabeller i TablePlus. 


Aktiverat Laragon för att köra min php-fil (index.php i dir=mittprojek)




Kopplat ihop php-filen med MySQL-databasen genom variabler
(Dessa inkluderar serverns namn (host), portnummer, databasens namn, användarnamnet och lösenordet.). 
Jag har skapat anslutningen databasen med hjälp av PHP:s “mysqli”-klass och sparar denna anslutning i en variabel som heter $connection. Denna anslutning används sedan för att skicka SQL-frågor till databasen.

$host = "localhost";  // Server där databasen körs, vanligtvis "localhost" på en lokal maskin
$port = 3306;         // Standardport för MySQL
$database = "databas1"; // Namnet på din databas
$username = "root";   // Användarnamnet för databasanvändaren, "root" är default för MySQL
$password = "";       // Lösenordet för databasanvändaren, ofta tomt i utvecklingsmiljöer



# phppage
php projekt webshop
