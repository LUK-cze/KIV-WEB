<?php
// Načtení hlavičky ze souboru ZakladHTML

use kivweb\Views\ClassBased\TemplateBasics;

    TemplateBasics::getHTMLHeader("Úprava osobních údajů uživatele");

?>



<?php
    // Patička co je vytvořena v jiném soboru (viz. hlavička ⬆⬆⬆)
    TemplateBasics::getHTMLFooter();
?>