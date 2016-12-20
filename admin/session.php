<?php
include ('config.php');
//kopplar ihop med databasen genom att skicka servernamn och användarnamn och lösenord
$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);

session_start(); //starta sessionen

//sparar login_user från arrayen session i en lokal variabel
$user_check =$_SESSION['login_user'];

// SQL Query för att hämta user info
$ses_sql = mysqli_query($connection, "SELECT username FROM login WHERE username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['username'];
if (!isset($login_session)) {
	mysqli_close($connection);
	header('Location: index.php');
}
?>