<?php  

/*

╔══════════════════════════════════╗
║                                  ║
║               INDEX              ║
║                                  ║
╚══════════════════════════════════╝

*/

// nactu zakladni nastaveni
require_once("settings.inc.php");

require_once("MyDatabase.class.php");
$myDB = new MyDatabase();


// DEBUG ---------------------------------
$users = $myDB->getAllUsers();
var_dump($users);
// DEBUG ---------------------------------


// mam spravnou hodnotu na vstupu nebo nastavim default
if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
    $pageId = $_GET["page"]; // nastavim pozadovane

} else {
    $pageId = WEB_PAGE_DEFAULT_KEY; // Přesměrování na defaultní webpage(nastaveno v settings)
}

// Vypsání zvolené stránky
require_once(WEB_PAGES[$pageId]);

    // DEBUG ---------------------------------
    $users = $myDB->getAllUsers();
    var_dump($users);
    // DEBUG ---------------------------------

?>
