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
        <div class="login">
          <form action="registrace.php" method="POST">
                <fieldset>
                  <legend><h3>Zaregistruj se</h3></legend>
                  <div class="email">
                    <input type="text" name="email" id="email" placeholder="E-mail" required>
                  </div>
                  <div class="row">
                    <div class="col-sm-6 jmeno">
                        <input type="text" name="jmeno" id="jmeno" placeholder="Jméno" required>
                    </div>
                    <div class="col-sm-6 prijmeni">
                        <input type="text" name="prijmeni" id="prijmeni" placeholder="Příjmení" required>
                    </div>
                  </div>
                  <br>
                  <div class="gamertag">
                    <input type="text" name="gamertag" id="gamertag" placeholder="Přezdívka" required>
                  </div>
                  <div class="pass">
                    <input type="password" name="heslo" id="heslo" placeholder="Heslo" required>
                  </div>
                <input class="btn btn-sub" type="submit" value="Registruj se">
                <input class="btn btn-res" type="reset" value="Smazat údaje">
          </div>        
                <h4>Maš už účet? Přihlaš se <a href="index.php">ZDE</a>.</h4>

                </fieldset>
          </form>  
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
