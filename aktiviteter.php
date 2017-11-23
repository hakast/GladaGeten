<!DOCTYPE html>
<html>
<?php
      include('./admin/config.php');//Inkluderar config-filen som ligger en mapp upp i hierarkin.

//UPPKOPPLING, FRÅGA, HÄMTA SVARET.
      $connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);
      $query2 = mysqli_query($connection, "SELECT * FROM abouttext WHERE id=2");
      $about2 = mysqli_fetch_assoc($query2);
?>
<head>
    <title>Aktiviteter</title>
    <meta charset="utf-8" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css.css" />

</head>
<body>
  <br />
 <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
                <div class="col-xs-8">

<!--MENY-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid" style= "background-color:red;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="background-color:red">
                        <li><a href="index.php" style="color:white; font-size:14px;">Hem</a></li>
                        <li><a href="aktiviteter.php" style="color:white; font-size:14px;">Aktiviteter</a></li>
                        <li><a href="bokning.php" style="color:white; font-size:14px;">Boka</a></li>
                        <li><a href="bildspel.php" style="color:white; font-size:14px;">Bilder</a></li>
                    </ul>
                </div>
            </div>
        </nav>
               </div>
            </div>

      <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8">
         <img class="center-block" width=100% src="images/konferens.jpg">
      </div>
      </div>
      <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8">
    	          <?php
                        echo $about2["text"];
                  ?>
                    </div>
  </div>
  </div>
  </div>
  <br />
  <hr width="50%" />
  <footer>
    <p id="footer">
      Hotell Glada Geten • Olof Skötkonungs Gata 23 •
      120 64 Stockholm • 08 – 123 45 67 • 070-123 45 67 • <a href="mailto:glada.geten@kyh.se ">Maila oss härifrån!</a>
    </p>
  </footer><br />
</body>
</html>
