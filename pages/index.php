<?php  

/*

╔══════════════════════════════════╗
║                                  ║
║               INDEX              ║
║                                  ║
╚══════════════════════════════════╝

*/

// Načítání nastavení
require_once("settings.inc.php");

require_once("MyDatabase.class.php");
$myDB = new MyDatabase();



// Mám správnou hodnotu na vstupu nebo nastavím default
if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
    $pageId = $_GET["page"]; // Nastavení požadované stánky

} else {
    $pageId = WEB_PAGE_DEFAULT_KEY; // Přesměrování na defaultní webpage(nastaveno v settings)
}

// Vypsání zvolené stránky
require_once(WEB_PAGES[$pageId]);

/*
    // DEBUG ---------------------------------
    $users = $myDB->getAllUsers();
    var_dump($users);
    // DEBUG ---------------------------------
*/
?>
