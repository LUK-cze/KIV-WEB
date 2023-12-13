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

    // Rozdělení her do skupin po třech
    $skupinyrecenzi = array_chunk($recenze, 3);

    var_dump($_SESSION);
    die;

    if (!$_SESSION['id_pravo'] <= 3) {
        echo "Pro přídávání recenzí musíš být hodnosti alespoň autor.";
    } else {
        ?>

        <div class="row">
            <div class="col-sm-4">
                <div class="login">
                <form action="" method="POST"> <!-- index.php?page=uprava -->
                        <fieldset>
                        <legend><h3>Napiš recenzi!</h3></legend>
                        <?php 
                        ?>
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
    }
?>


<!-- TODO: Kdyztak smaz
<h3>Recenze her</h3>
  -->
<?php

/* TODO: Kdyztak smaž
    foreach ($skupinyHer as $skupina) {
      echo '<div class="container-fluid">';
      echo '<div class="row">';

      foreach ($skupina as $h) {
          
        echo "
                <div class='col-sm-4 col-xs-12'>
                  <div class='panel panel-default text-center'>
                    <div class='panel-heading'>
                      <h1 id='$h[id_uzivatel]'> $h[id_uzivatel] </h1>         
                      </div>
                      <div class='panel-body'>
                        <p class='hodnoceni'><strong> $h[hodnoceni] </strong></p>
                        <p class='datum'><strong> $h[datum] </strong></p>
                        <p class='recenze_text'> $h[recenze_text] </p>
                      </div>
                    </div>      
                  </div>     
              ";

              
      }

      echo '</div>
        </div>';
  }
  */

?>
