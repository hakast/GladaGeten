<html>
    <head>
          <title>Admin</title>         
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!--<script type="text/javascript" src="../kalender.js"></script> -->         
    </head>
  <body>

<?php
include('session.php'); //inkluderar session.php som gör att man är fortsatt inloggad
include('meny.php');

//Inloggningsppgifter till databasen bokningar på Binero
//$dbhost = "booking-219308.mysql.binero.se";
//$dbusername = "219308_li66410";
//$dbpassword = "Augusti144";
//$dbdatabas = "219308-booking";
//$dbtable = "booking_records";

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbdatabas = "219308-booking";
$table = "booking_records";

$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);
if (isset($_POST['id'])) {
    $id = $_POST['id'];

//RADERAR BOKNING MED ETT SPECIELLT ID    
    $query = "DELETE FROM booking_records
    WHERE id = $id";
    
    mysqli_query($connection, $query);
}

//FRÅGA TILL ANGIVEN DB, ANGIVEN TABELL, SORTERAR FALLANDE, SPARAR ALLT I VARIBAL
mysqli_query($connection, "SET NAMES utf8");
$query = "SELECT id, people, room, checkin, checkout, name, address, zip, city, mail, mobil, creation_date, ip
FROM booking_records 
ORDER BY checkin DESC";
$result = mysqli_query($connection, $query);
?>

  <div class="container">

    <?php

//HÄMTAR RESULTATET, LOOPAR IGENOM DET, SPARAR I EN VAR    
while($row = mysqli_fetch_assoc($result)) {
    echo "<div >
    <div >

    </div>
    <div class='row'>
    <div col-md-6'>
    <h3 style='color:gray;'>Bokad gäst:</h3>
    <p>Period: {$row['checkin']} - - {$row['checkout']}</p>
    <p>{$row['name']} </p>
    <p>{$row['address']}</p>
    <p>{$row['zip']} {$row['city']}</p>
    <p>{$row['mobil']}</p>
    <p>{$row['mail']}</p>    

    </div>

    </div>
    <form method='post'>
    <input type='hidden' name='id' value='{$row['id']}'>
    <button type='submit' style='color:red; background-color:white; border-width: 0px;'>Radera bokning</button>
    </form>
    <hr>
    </div>";
}
?>

  </div>

  </body>

</html>