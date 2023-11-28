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


/*
// DEBUG ---------------------------------
require_once("MyDatabase.class.php");
$myDB = new MyDatabase();

$users = $myDB->getAllUsers();
var_dump($users);
// DEBUG ---------------------------------
*/

// Zde kontroluji jestli maám v URL adrese parametr page a pokud ano 
// zkontroluji jestli jeho hodnotu mám v poli WEB_PAGES
if(isset($_GET["page"]) && array_key_exists($_GET["page"], WEB_PAGES)){
    $pageId = $_GET["page"]; // Zobrazení požadované stránky

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
