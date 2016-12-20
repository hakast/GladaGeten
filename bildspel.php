
<!DOCTYPE html>
<html>
<head>
  <title>Bildspel</title>
  <meta charset="utf-8" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css.css" />

<!--CSS TILL BILDSPEL-->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />>
  <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<br />
<div class="container">
        <div class="row">
            <div class="col-xs-2"></div>
                <div class="col-xs-8">
                    
<!--MENY-->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid" style= "background-color:#000000;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="background-color:black">
                        <li><a href="index.php" style="color:white; font-size:14px;">Hem</a></li>
                        <li><a href="aktiviteter.php" style="color:white; font-size:14px;">Aktiviteter</a></li>
                        <li><a href="bokning.php" style="color:red; font-size:14px;">Boka</a></li>
                        <li><a href="bildspel.php" style="color:white; font-size:14px;">Bilder</a></li>
                    </ul>
                </div>
            </div>
        </nav>
               </div>
            </div>
      
      <?php
//Include ('admin/session.php');

include('admin/config.php');

//KOPPLING TILL DATABAS
$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);

if (!$connection) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

$result = mysqli_query($connection, "SELECT * FROM gallery");//Fråga

?>

<!--HTML FÖR DET SOM VISAS PÅ SIDAN-->
      <div class="container">
          <div id="gallery" class="row">

          <div class="col-xs-2"></div>
          
          <div class="col-xs-8">

          <a class="gallery-nav-btn gallery-nav-btn-left" href="#">
            <span class="glyphicon glyphicon-chevron-left"></span></a>

          <a class="gallery-nav-btn gallery-nav-btn-right " href="#">
            <span class="glyphicon glyphicon-chevron-right"></span></a>

          <?php
              while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
                    $id = $row['id'];
	      			$thumb = $row['thumb_path'];
	      			$img   = $row['img_path'];

             echo "<div class='image-item col-lg-3 col-md-4 col-xs-6'><a href='#' class='thumbnail'><img class='gallery-thumb' src='./$img' /></a></div>";
                }
        ?>
        </div>
      </div>
      </div>

<!--HÄR HAR VI FOOTER-->
    <hr width="50%" />
    <footer>
        <p id="footer">
            Hotell Glada Geten • Olof Skötkonungs Gata 23 •
            120 64 Stockholm • 08 – 123 45 67 • 070-123 45 67 • <a href="mailto:glada.geten@kyh.se ">Maila oss härifrån!</a>
        </p>
    </footer>
    <br />
    <script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>
