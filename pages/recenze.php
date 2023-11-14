<html lang="en">
<head>
  <title>Pár Pařmenů</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Bootstrap favikony ze stránky https://icons.getbootstrap.com/ -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

  <link rel="icon" href="../icons/controller.svg" sizes="any" type="image/svg+xml">

  <link rel="stylesheet" href="../css/css.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/login.css">



</head>
<body data-spy="scroll" data-target=".navbar">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand glyphicon glyphicon-tower" href="#myPage" alt="logo" width="30" height="30"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">ZPĚT NA ÚVOD</a></li>
          <li><a href="registrace.php">ZAREGISTRUJ SE</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="hero jumbotron text-center">
  <h1>Pár Pařmenů</h1>
  <h3>Recenze video her.</h3> 
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-12">
        <h1>Recenze</h1>
        <p>Zde si můžete vybrat titul a prohlédnout si jeho hodnocení a základní informace. Po přihlášní můžete hodnit i vy.</p>
        <br>
        <h3>Vyhledej si hru:</h3>
            <div class="vyhledat">
                <input type="text" name="vyhledavani" id="vyhledavani" placeholder="VYHLEDEJ SI HRU">
            </div>
        </div>
  </div>

  <div id="how" class="container gray mt-5">
    <div class="row">
      <div class="col-sm-12">
        <h1>Jak to funguje?</h1>
          <p>Uživatelé na naší stránce mají různé role, které udělují různé pravomoce. </p>
        <h3>Nepřihlášený uživatel <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"><span class="glyphicon glyphicon-star-empty"></h3>
          <p>V případě ne přihlášeného uživatele jsou dostupné pouze základní funkce. Máte možnost prohlížet si recenzováné hry a získávat informace o nabídce. Nicméně, abyste mohl/a využívat pokročilejších možností, jako je přidání hodnocení, vidět seznam svých hodnocení nebo správa uživatelského účtu, je nezbytné se registrovat nebo přihlásit.</p>
          <p>Takže, až se rozhodnete vstoupit do svého účtu, čekají na vás rozšířené možnosti a lepší uživatelská zkušenost.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h3>Hráč <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star-empty"></span></h3>
          <p>Pro přihlášeného uživatele s hodností "Hráč" se otevírají dveře k rozsáhlejším možnostem správy hodnocení. Jako hráč můžete procházet a sledovat recenze ostatních uživatelů. Co však dělá vaši zkušenost ještě osobnější, je možnost přidávat, upravovat nebo dokonce mazat svá vlastní hodnocení. Tato pravomoc vám umožňuje nejen sdílet své dojmy s ostatními, ale také aktivně ovlivňovat a spravovat obsah na platformě.</p>
          <p>Takže, až budete mít novou hru na seznamu nebo budete chtít aktualizovat své hodnocení oblíbeného titulu, jako hráč s hodností "Hráč" máte plnou kontrolu nad tím, co se zobrazuje ve vašem seznamu hodnocení.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h3>Správce <span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"><span class="glyphicon glyphicon-star"></span></h3>
          <p>Pro uživatele s hodností "Správce" se otevírá široká škála možností pro aktivní správu obsahu a uživatelských interakcí. Kromě schopnosti prohlížet, přidávat, upravovat a mazat vlastní hodnocení, máte také pravomoc přidávat samotné hry do systému. Tímto způsobem můžete obohatit nabídku a zajistit, že komunita má přístup k co nejširšímu spektru her. Jako správce máte také kontrolu nad všemi uživateli na platformě. Můžete spravovat jejich účty, sledovat jejich aktivitu a schvalovat či zamítat jejich hodnocení. Tato pravomoc vám dává možnost udržovat kvalitu obsahu a zabezpečit, aby komunita byla informována o nejlepších hrách.</p>
          <p>Kromě toho můžete povolovat zobrazení hodnocení od ostatních uživatelů, což přispívá k transparentnosti a důvěře ve vaší herní komunitě. Existuje i mýtická a legendární role Super-správce a Super-administrátora, ale je jen pro vyvolené.</p>
      </div>
    </div>
    
  </div>
</div>

<div class="footer">
    <h3>Autor: Matěj Putík</h3>
    <h3>KIV/WEB</h3>
    <h3>Osobní E-mail: DUKEczech@seznam.cz</h3>
  </div>

</body>
</html>
