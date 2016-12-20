<?php
//Inloggningsppgifter till databasen
//Inloggningsppgifter till databasen bokningar
//$servername = "booking-219308.mysql.binero.se";
//$username = "219308_li66410";
//$password = "Augusti144";
//$dbname = "219308-booking";
//$dbtable = "booking_records";

//hämta värden från javascript-filen
$checkin = $_POST ['checkin'];
$checkout = $_POST ['checkout'];
$roomType = $_POST ['roomType'];
$nrOfRoomsInTotal = 2;

//skickar in data i databasen
if (strlen($checkin)>3) {

    $connectToDb=mysqli_connect($servername,$username,$password,$dbname);
    if (mysqli_connect_errno()) {
        echo "Det gick inte att koppla till databasen, det här är varför: " . mysqli_connect_error();
    }

    $getNrOfBookedRooms = "SELECT * FROM booking_records WHERE room='$roomType' AND checkout > '$checkin'";
    $result=mysqli_query($connectToDb,$getNrOfBookedRooms);
    $nrOfBookedRooms=mysqli_num_rows($result);
    $nrOfAvaliableRooms=$nrOfRoomsInTotal-$nrOfBookedRooms;
    if($nrOfAvaliableRooms>0) {
        echo $nrOfAvaliableRooms;
    } else {
        echo 0;
    }
    mysqli_close($connectToDb);
}
else {
    echo "felaktig data angiven //php";
}




?>
