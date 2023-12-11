<?php
namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

?>

<?php

    $myDB = new DatabaseModel();

    // Data pro hry
    $hry = $myDB->getAllGames();

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
