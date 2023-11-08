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



</head>
<body>

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
          <li><a href="#about">CO JSME ZAČ?</a></li>
          <li><a href="#how">JAK TO FUGUJE?</a></li>
          <li><a href="#recenze">RECENZE</a></li>
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
    <div class="col-sm-8">
      <h3 id="about">Vítejte na webu Pár Pařmenů!</h3>
      <p>Váši průvodci do světa her všech druhů! Jsme váš spolehlivý zdroj pro recenze a zábavné pohledy na hry z různých žánrů. Bez ohledu na to, zda jste vášnivým hráčem, kterému nikdy nic neunikne, nebo jen občasným hráčem hledajícím zábavu, na našem webu najdete informace, které potřebujete.</p>
      <p>Naše vášeň pro hry nás spojuje, a my jsme tu, abychom vám pomohli najít ty nejlepší tituly a neustále rozšiřovat vaši herní obzory. Takže se pohodlně usaďte a připravte se na dobrodružství, které vás čeká na webu Pár Pařmenů!</p>
    </div>
    <div class="col-sm-4">
        <div class="login">
          <form action="/action_page.php" method="POST">
                <fieldset>
                  <legend><h3>Přihlaš se!</h3></legend>
                  <div class="user">
                    <input type="text" name="jmeno" id="jmeno" placeholder="Jméno">
                  </div>
                  <div class="pass">
                    <input type="password" name="heslo" id="heslo" placeholder="Heslo">
                  </div>
                <input class="btn btn-sub" type="submit" value="Přihlásit se">
                <input class="btn btn-res" type="reset" value="Smazat údaje">
          </div>        
                <h4>Nemáš ještě účet? Zaregistruj se <a href="registrace.php">ZDE</a>.</h4>

                </fieldset>
          </form>  
        </div>  
    </div>
  </div>
</div>

</body>
</html>
