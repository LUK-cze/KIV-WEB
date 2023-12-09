<?php

namespace kivweb\Views;

use kivweb\Models\DatabaseModel;
use kivweb\Views\TemplateBasics;
use kivweb\Views\IView;

    $myDB = new DatabaseModel();

     // Data pro hry
     $hry = $myDB->getAllGames();


    foreach ($hry as $h) {

        echo "
            <div class='container-fluid'>
              <div class='row'>
                <div class='col-sm-4 col-xs-12'>
                  <div class='panel panel-default text-center'>
                    <div class='panel-heading'>
                      <h1> $h[nazev_hry] </h1>
                    </div>
                    <div class='panel-body'>
                      <p><strong> $h[zanr] </strong></p>
                      <p><strong> $h[popisek_hry]</strong></p>
                      <p><strong> $h[foto_hry] </strong></p>
                    </div>
                  </div>      
                </div>     
              </div>
            </div>
            ";
    }

?>
