
<?php

//Inloggningsppgifter till databasen
//$servername = "booking-219308.mysql.binero.se";
//$username = "219308_li66410";
//$password = "Augusti144";
//$dbname = "219308-booking";
//$dbtable = "booking_records";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "219308-booking";
$dbtable = "booking_records";


//DATABASKOPPLINGEN
$connectToDb = mysqli_connect($servername, $username, $password, $dbname);
if (!$connectToDb) { die("Det gick inte att ansluta till databasen. Orsak: " . mysqli_connect_error()); }

//HÄMTA VÄRDEN FRÅN JAVASCRIPT-FILEN
$people = $_POST['people'];
$roomType = $_POST['room'];
$checkin = $_POST ['checkin'];
$checkout = $_POST ['checkout'];
$name = $_POST['name'];
$address = $_POST['address'];
$zip = $_POST['zip'];
$city = $_POST['city'];
$mail = $_POST['mail'];
$mobil = $_POST['mobil'];


//ANGER SKAPARDATUM OCH ID
$creation_date = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

//SKICKAR IN DATA I DATABASEN
if (strlen($name)>4) {
    $sql = "INSERT INTO booking_records (id, people, room, checkin, checkout, name, address, zip, city, mail, mobil, creation_date, ip)
  VALUES (DEFAULT, $people, '$roomType', '$checkin', '$checkout', '$name', '$address', $zip, '$city', '$mail', '$mobil', '$creation_date ', '$ip')";
}
else {
    echo "Ange ditt för- och efternamn";
}

//TESTAR FÖR ATT SE HUR DET GICK
if ($connectToDb->multi_query($sql) === TRUE) {
    echo "Bokning genomförd!";
} else {
    echo "Databasuppdateringen misslyckades, det här är varför: " . $sql . $connectToDb->error;
}

$connectToDb->close();



?>
