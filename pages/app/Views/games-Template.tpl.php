<?php
namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

?>
<script>
    function VypisZpravy(status, akce) {
        alert(status + ": Hra " + akce);
    }

    function VypisZpravyNahrani(status, akce) {
        alert(status + ": Fotka hry " + akce);
    }

</script>
<?php
    
// ---------- Výpis pro úpravy ----------
if (isset($_GET['message']) && $_GET['message'] == 'Pridana') {
    echo '<script>VypisZpravy("OK", "byla nahrána");</script>';
}
if (isset($_GET['message']) && $_GET['message'] == 'Nepridana') {
    echo '<script>VypisZpravy("ERROR", "nebyla přidána");</script>';
}
if (isset($_GET['message']) && $_GET['message'] == 'NeuplneAtributy') {
    echo '<script>VypisZpravy("ERROR", "nedostala plné atributy");</script>';
}

// ---------- KONEC Výpis pro úpravy KONEC----------

// ---------- Výpis pro nahrávání souboru ----------

if (isset($_GET['message']) && $_GET['message'] == 'UploadProsel') {
    echo '<script>VypisZpravyNahrani("OK", "byla nahrána");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'CastecnyUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána pouze z části");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'NoUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'ExtensionUploadERR') {
    echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána se špatnou příponou");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'CastecnyUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "byla nahrána pouze z části");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'MocVelkyUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "překročila stanovenou hranici 10 MB");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'SpatnyTypUploadu') {
    echo '<script>VypisZpravyNahrani("ERROR", "nebyla požadovaného formátu (gif, png, jpeg)");</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'ZadnyTMPAdresar') {
    echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána, protože se nedostala do TMP adresáře";</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'ZadnyTMPAdresar') {
    echo '<script>VypisZpravyNahrani("ERROR", "nebyla nahrána, protože se nedostala do TMP adresáře";</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'NesloZapsatUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "nešlo zapsat";</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'NesloPresunoutUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "nešlo přesunout";</script>';
}

if (isset($_GET['message']) && $_GET['message'] == 'DatabazeNeproslaUpload') {
    echo '<script>VypisZpravyNahrani("ERROR", "nešla nahrát do databáze";</script>';
}
// ---------- KONEC Výpis pro nahrávání souboru KONEC ----------


?>

<?php

    $myDB = new DatabaseModel();

    // Data pro hry
    $hry = $myDB->getAllGames();




if($myDB->isUserLogged()){
  
  
  if ($_SESSION['id_pravo'] >= 3) { 
      echo "Pro přídávání her musíš být hodnosti alespoň autor.";

  } else {

    ?>
      <div class="row">

      <div class="col-md-3">
      </div>

            <div class="col-md-6">
                <div class="login">
                <form action="" method="POST" enctype="multipart/form-data"> 
                        <fieldset>
                        <legend><h3>Přidej hru!</h3></legend>
                        <div class="gamertag">
                            <input type="text" name="nazev_hry" id="hra" placeholder="Název hry" required>
                        </div>

                        <div class="gamertag">
                            <input type="text" name="zanr" id="zanr" placeholder="Název žánru" required>
                        </div>

                        <div class="recenze">
                          <textarea name="popisek_hry" placeholder="Napiš text hry zde"></textarea>
                        </div>

                        <div class="center-tlacitka">
                          <button class="btn btn-sub" type="submit" name="PridejHru">Přidej hru</button>
                          <button class="btn btn-res" type="reset">Smazat údaje</button>
                        </div>
                       
                        </fieldset>
                </form>
            
    
    <div class="center-tlacitka">
      <div class="row">
        <div class="col-md-12">
        <h3>Nahraj Fotku pro hru:</h3>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">

          <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="GamePic" class="input-file"><br>

              <select name='hra'>
                <?php 
                foreach($tplData["gameData"] as $hra){ ?>
                  <option value="<?php echo $hra["id_hry"] ?>"><?php echo $hra["nazev_hry"] ?></option>
                <?php } 
                 ?>
              </select>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
            <button class="btn btn-checklg" type="submit" name="uploadFotoHry" value="GamePic"><img class="checklg" src="../img/icons/check-lg.svg" alt="fajfka"></button>
          </div>
      </div>
          </form>
          </div> 
      </div>
    </div>

    <div class="col-md-3">
    </div>


      

  </div>

        <?php




}
}

    // Rozdělení her do skupin po třech
    $skupinyHer = array_chunk($hry, 3);
    foreach ($skupinyHer as $skupina) {
      echo '<div class="container-fluid">';
      echo '<div class="row">';
    
      foreach ($skupina as $h) {
        $foto_hry = isset($h['foto_hry']) ? $h['foto_hry'] : "game-panel.svg";

        echo "
                <div class='col-sm-4 col-xs-12'>
                  <div class='panel panel-default text-center'>
                    <div class='panel-heading' style='background-image: url(../img/game_panel/$foto_hry);'>
                      <h1 id='$h[nazev_hry]'> $h[nazev_hry] </h1>         
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

?>
