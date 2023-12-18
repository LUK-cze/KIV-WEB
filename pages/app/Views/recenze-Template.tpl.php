<?php
namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

?>

<?php

    $myDB = new DatabaseModel();

    // Data pro hry
    $recenze = $tplData["AllRecenze"];
    $hry = $tplData["gameData"];

    ?>
    <script>
        function VypisZpravy(status, akce) {
            alert(status + ": Recenze " + akce);
        }
    
    </script>
    <?php
    

    if (isset($_GET['message']) && $_GET['message'] == 'HraPridana') {
      echo '<script>VypisZpravy("OK", "byla přidána");</script>';
  }

  if (isset($_GET['message']) && $_GET['message'] == 'HraNepridana') {
    echo '<script>VypisZpravy("ERROR", "nebyla přidána");</script>';
  }
  
  if (isset($_GET['message']) && $_GET['message'] == 'MaloAtributu') {
    echo '<script>VypisZpravy("ERROR", "nebyla přidána, protože jste nevyplnili všechny parametry");</script>';
  }



    if($myDB->isUserLogged()){
  
  
    if ($_SESSION['id_pravo'] >= 3) { 
        echo "Pro přídávání recenzí musíš být hodnosti alespoň autor.";

    } else {
      ?>
      
      <div class="row">
        <div class="col-md-3">
        </div>

            <div class="col-md-6">
                <div class="login">
                <form action="" method="POST"> <!-- index.php?page=uprava -->
                        <fieldset>
                        <legend><h3>Napiš recenzi!</h3></legend>
                        <select name='hra'>
                          <?php 
                          foreach($hry as $hra){ ?>
                            <option value="<?php echo $hra["nazev_hry"] ?>"><?php echo $hra["nazev_hry"] ?></option>
                      <?php } 
                      ?>
                        </select>
                        <input type="hidden" name="id_hry" value="<?php echo $hra["id_hry"] ?>">
                        <div class="recenze">
                          <textarea name="recenze_text" placeholder="Napiš text recenze zde"></textarea>
                        </div>

          <div class="row">
            <div class="col-md-12">
                <div class="hodnoceni">
                        <h3>Hodocení: </h3>
                          <input type="radio" name="hodnoceni" id="star1" value="1"><label for="star1" class="glyphicon glyph-hod glyphicon-star"></label>
                          <input type="radio" name="hodnoceni" id="star2" value="2"><label for="star2" class="glyphicon glyph-hod glyphicon-star"></label>
                          <input type="radio" name="hodnoceni" id="star3" value="3"><label for="star3" class="glyphicon glyph-hod glyphicon-star"></label>
                          <input type="radio" name="hodnoceni" id="star4" value="4"><label for="star4" class="glyphicon glyph-hod glyphicon-star"></label>
                          <input type="radio" name="hodnoceni" id="star5" value="5"><label for="star5" class="glyphicon glyph-hod glyphicon-star"></label>
              </div>
            </div>
          </div>
                        <div class="center-tlacitka">
                          <button class="btn btn-sub" type="submit" name="recenze">Přidej recenzi</button>
                          <button class="btn btn-res" type="reset">Smazat údaje</button>
                        </div>
                </div>        
                        </fieldset>
                </form>  
            </div>

        <div class="col-md-3">
      </div>
    </div>

        <?php
    }
}
?>

<?php  

    // Rozdělení her do skupin po třech
    $skupinyRecenzi = array_chunk($tplData["AllRecenze"], 3); 

    foreach ($skupinyRecenzi as $skupina) {
      echo '<div class="container-fluid">';
      echo '<div class="row">';

      foreach ($skupina as $r) {
        
        echo "
              <div class='col-sm-4'>
                  <div class='panel panel-default text-center'>
                    <div class='panel-heading' style='background-image: url(../img/recenze_panel/recenze-banner.svg);'>
                      <h1 id='$r[nazev_hry]'> $r[nazev_hry] </h1>        
                    </div>
                      <div class='panel-body'>
                      <p class='autor'><strong>Autora: $r[login] </strong></p>
                      <p class='hodnoceni'><strong>Datum přidání: </strong> $r[datum]</p>
                      <p class='hodnoceni'><strong>Hodnocení: </strong> $r[hodnoceni] z 5</p>
                      <p class='recenze_text'><strong>Recenze: </strong> $r[recenze_text]</p>      
                      </div> 
                  </div>
                </div>
              ";

              
      }

      echo ' </div>
      </div>';
  }
?>

