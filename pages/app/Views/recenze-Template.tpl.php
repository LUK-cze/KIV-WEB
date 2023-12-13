<?php
namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

?>

<?php

    $myDB = new DatabaseModel();

    // Data pro hry
    $recenze = $myDB->getAllRecenze();

    if($myDB->isUserLogged()){
      // Získam data přihlášeného uživatele. Toto se hodí jen když chci vypsat zprávu, že uživatel je již přihlášen a registrovat se znovu nemůže.
  //$userData = $myDB->getLoggedUserData();
  }

    // Rozdělení her do skupin po třech
    $skupinyRecenzi = array_chunk($recenze, 3);



    
    // Nevyhazuje id uzivatele
    //PROZATIM
    
    var_dump($_SESSION);
  
  
    if ($_SESSION['id_pravo'] >= 3) {
      //if (5 <= 3) { //TODO: PROZATIMNI POTOM VYMAZ
        echo "Pro přídávání recenzí musíš být hodnosti alespoň autor.";
        ?>

        <div class="row">
            <div class="col-sm-4">
                <div class="login">
                <form action="" method="POST"> <!-- index.php?page=uprava -->
                        <fieldset>
                        <legend><h3>Napiš recenzi!</h3></legend>
                        <div class="gamertag">
                            <input type="text" name="nazevHry" id="nazevHry" placeholder="Název hry" required>
                        </div>
                        <div class="pass">
                            <input type="date" name="datum" id="datum" placeholder="Datum" required>
                        </div>
                        <div class="pass">
                            <input type="number" name="hodnoceni" id="hodnoceni" placeholder="Hodnocení (0 - 5)" min="0" max="5" required>
                        </div>
                        <button class="btn btn-sub" type="submit" name="action" value="login">Přihlásit se</button>
                        <button class="btn btn-res" type="reset">Smazat údaje</button>
                </div>        
                <h4>Nemáš ještě účet? Zaregistruj se <a href="index.php?page=registrace">ZDE</a>.</h4>

                        </fieldset>
                </form>  
            </div>
        </div>

        <?php      
    foreach ($skupinyRecenzi as $skupina) {
      echo '<div class="container-fluid">';
      echo '<div class="row">';

      foreach ($skupina as $r) {
    
        echo "
                <div class='col-sm-4 col-xs-12'>
                  <div class='panel panel-default text-center'>
                    <div class='panel-heading' style='background-image: url(../img/recenze_panel/recenze-banner.svg);'>
                      <h1 id='$r[nazev_hry]'> $r[nazev_hry] </h1>         
                      </div>
                      <div class='panel-body'>
                        <p class='zanr'><strong> $h[zanr] </strong></p>
                        <p class='popisek'> $h[popisek_hry] </p>
                      </div>
                    </div>      
                  </div>     
              ";

              
      }

      echo '</div>
        </div>';
  }

}
?>

