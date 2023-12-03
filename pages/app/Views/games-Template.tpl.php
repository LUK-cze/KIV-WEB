<?php
// Načtení hlavičky ze souboru ZakladHTML
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Databáze našich her");



?>



<?php
    // Patička co je vytvořena v jiném soboru (viz. hlavička ⬆⬆⬆)
    ZakladHTML::createFooter();
?>