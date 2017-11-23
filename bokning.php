<!DOCTYPE html>
<html>
<head>
  <link type="text/css" rel="stylesheet" href="kalender.css">
  <link rel="stylesheet" type="text/css" href="css.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do|Poiret+One" rel="stylesheet" />

  <script type="text/javascript" src="kalender.js"></script>
  <script src="datepicker_sv.js"></script>

<!--TVÅ LÄNKAR SOM KRÄVS TILL DATEPICKER-->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
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
            </div>

<!--HTML TILL BOKNINGSFORMULÄRET-->
     <div class="container">
        <div class="row">
            <div class="col-xs-2">
                                  <div>
                        <img src="images/boka.JPG" alt="boka" style="width:100%" />
                    </div>
            </div>
                <div class="col-xs-8">
  <div id="container" >
    <h1 id="googlePoiret"><center>Bokning av rum</center></h1>
    <div>
      <select id="people">
        <option value="1">1 person</option>
        <option value="2">2 personer</option>
        <option value="3">3 personer</option>
        <option value="4">4 personer</option>
      </select>
	  <br />
    </div>
    <br />
    <div>
      <select id="room">
        <option value="Standard">Standardrum</option>
        <option value="Lyx">Lyxrum</option>
      </select>
	  <br />
    </div>
    <br />
    <div><input class="date inputBooking"  type="text" id="checkin" placeholder="Incheckningsdatum"></input></div><br /><br />
    <div><input class="date inputBooking" type="text"  id="checkout" placeholder="Utcheckningsdatum"></input></div><br />

    <h1 id="googlePoiret"><center>Dina uppgifter</center></h1>
    <div><input class='inputBooking'  type="text"  autocomplete="on" id="customerName" placeholder="För- och efternamn"></input></div><br /><br />
    <div><input class='inputBooking'  type="text" id="address" placeholder="Adress"></input></div><br /><br />
    <div><input class='inputBooking'  type="tel" id="zip" maxlength="5" placeholder="Postnummer"></input></div><br /><br />
    <div><input class='inputBooking'  type="text" id="city" placeholder="Postort"></input></div><br /><br />
    <div><input class='inputBooking'  type="text" id="mail" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" placeholder="Mailadress"></input></div><br /><br />
    <div><input class='inputBooking'  type="tel" id="mobil" placeholder="Mobilnummer"></input></div><br /><br />
    <br />

     <div class="row">
            <div class="col-xs-10"></div>
                <div class="col-xs-2">

	<div style='background-color:red;' id="bookNow"> Boka </div>
  </div>
  </div>
   </div>
  </div>
  </div>

  <!--FOOTER-->
  <hr width="50%" />
  <footer>
    <p id="footer">
      Hotell Glada Geten • Olof Skötkonungs Gata 23 •
      120 64 Stockholm • 08 – 123 45 67 • 070-123 45 67 • <a href="mailto:glada.geten@kyh.se ">Maila oss härifrån!</a>
    </p>
  </footer>
  <br />
  <script src="kalender.js"></script>
  <script type="text/javascript" src="js/script.js" charset="ISO-8859-1"></script>
</body>
</html>
