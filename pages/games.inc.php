<?php
// Načtení hlavičky ze souboru ZakladHTML
    require_once("ZakladHTML.class.php");
    ZakladHTML::createHeader("Databáze našich her");



?>

<div class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Nazev hry</h1>
        </div>
        <div class="panel-body">
          <p><strong>zanr</strong> Lorem</p>
          <p><strong>Knĺikni zde pro hru</strong></p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <h4>per month</h4>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>     
  </div>
</div>

<?php
    // Patička co je vytvořena v jiném soboru (viz. hlavička ⬆⬆⬆)
    ZakladHTML::createFooter();
?>