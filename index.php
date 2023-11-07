<html lang="en">
<head>
  <title>Pár Pařmenů</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">

  <link rel="icon" href="icons/controller.svg" sizes="any" type="image/svg+xml">

  <link rel="stylesheet" href="css/css.css">
  <link rel="stylesheet" href="css/navbar.css">



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
          <li><a href="#recenze">RECENZE</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="hero jumbotron text-center">
  <h1>Pár Pařmenů</h1>
  <p>Recenze video her.</p> 
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-8">
      <h3 id="about">Vítej!</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit... Lorem ipsum dolor sit amet, 
        consectetur adipisicing elit Lorem ipsum dolor sit amet, consectetur adipisicing elit 
        Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
    <div class="login">
      <form action="/action_page.php">
        <form autocomplete="off" action="vystup.php" target="_blank" method="POST"> <!-- _blank = otevre to na novy strance -->
              <fieldset>
                  <legend><h3>Registruj se!</h3></legend>
                  <table>
                      <tr>
                          <td>
                              <label for="jm">Jméno:</label>
                          </td>
                          <td>
                              <input type="text" name="jmeno" id="jm">
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <label for="pr">Příjmení:</label>
                          </td>
                          <td>
                              <input type="text" name="prijmeni" id="pr">
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <label for="em">E-mail:</label>
                          </td>
                          <td>
                              <input type="email" name="email" id="em">
                          </td>
                      </tr>             
                      <tr>
                        <td>
                            <input class="btn btn-sub" type="submit" value="Odeslat formulář">
                        </td>  
                        <td>    
                            <input class="btn btn-res" type="reset" value="Smazat formulář">
                        </td>
                      </tr>
                </fieldset>
          </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
