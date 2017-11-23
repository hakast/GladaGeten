<!DOCTYPE html>
<html>
<head>
  <title>Den Glada Geten</title>
  <meta charset="utf-8" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css.css" />
  <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do|Poiret+One" rel="stylesheet" />
</head>

<body>
<br />
    <div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
                <div class="col-xs-8">

 <!---MENY-->
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

        <div class="container">

<!--LOGOTYPE-->
            <div class="row">
                <div class="col-xs-2">
                    <div>
                    </div>
                </div>
                <div class="col-xs-8">
                    <h1 style="text-align:right; font-size:2em;" id="googlePoiret">Välkommen till Hotell Glada Geten!</h1>
                </div>
            </div>
        </div>
        <br /><br />

<!--HÄR BÖRJAR BILD-KARUSELLEN-->
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-8">
                <div id="my-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#my-carousel" data-slide-to="1"></li>
                        <li data-target="#my-carousel" data-slide-to="2"></li>
                    </ol>
<!-- WRAPPER FÖR SLIDES -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img alt="First slide" src="images/karusell/hus.jpg">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Second slide" src="images/karusell/cykel.jpg">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="Third slide" src="images/karusell/rum.jpg">
                            <div class="carousel-caption">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>

<!-- KONTROLLER FÖR PILARNA VÄNSTER HÖGER I KARUSELLEN INDEX-SIDAN-->
                    <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div>
                <center>
                    <p id="konferens" style="width:90%">
                        <strong id="googlePoiret"><br />
                          Den glada geten ligger beläget i det natursköna området Tjärnholmen i
                          Norrbotten.
                        </strong><br /><br />
                      Utöver smakfullt inredda rum finns även aktiveter att boka in under din vistelse. Gården är en
                      gammal släktgård, som 2005 gjordes om till bed & breakfast och har sedan dess lockat besökare från hela Sverige och även
                      världen. På den glada geten har vi två ”husgetter”, Gösta och Selma, som håller till i en liten hage alldeles
                      bredvid gårdshuset. Kring gården finns även trevliga vandringsslingor och vågar min sig på ett dopp i älven
                      kan man boka bastu på den glada geten efter det svalkande doppet.
                    </p>
                </center>
            </div>
        </div>
    </div>
    <br />

    <!--HÄR HAR VI FOOTER-->
    <hr width="50%" />
    <footer>
        <p id="footer">
            Hotell Glada Geten • Olof Skötkonungs Gata 23 •
            120 64 Stockholm • 08 – 123 45 67 • 070-123 45 67 • <a href="mailto:hakast@gmail.com ">Maila oss!</a>
        </p>
    </footer>
    <br />
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
</body>
</html>
