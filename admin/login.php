<?php
//DEN HÄR FILEN SYNS INTE I WEBBLÄSAREN

include ('config.php'); //Inkluderar databasinfo
session_start(); //Startar session
$error='';
if (isset($_POST['submit'])) {//Koll om submit klickats
  if (empty($_POST['username']) || empty($_POST['password'])) {//Saknas anv eller lösen?
    $error= "Användarnamn eller lösenord är ogiltigt";
  }
  else
  {
    //Hämta logininfo från databas
    $username=$_POST['username'];
    $password=$_POST['password'];

//ANSLUT TILL DATABAS
$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);

//FUNGERAR UPPKOPPLINIGEN? OM INTE FELMEDDELANDE.
if (!$connection) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
  }
//SKYDD MOT HACKARE
    $username = stripslashes($username); // Tar bort slash
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($connection, $username); //Tar bort skadliga stängar
    $password = mysqli_real_escape_string($connection, $password);


//FINNS LOGINUPPGIFTERNA I DATABASEN? SPARA I EN FRÅGA.
		$query = mysqli_query( $connection, "SELECT * FROM login WHERE password='$password' AND username='$username'");

//FICK FRÅGAN SVAR FRÅN DATABASEN?
		if (mysqli_num_rows($query) == 1) {
			$_SESSION['login_user'] = $username; //Sparar uppgifterna i en session
			header("location: profile.php"); //Vidarbefordra till denna sida om allt i sin ordning.
		}

		else
		{
			$error= "Användarnamn eller lösenord är ogiltigt";
		}
		mysqli_close($connection);
	}
}

?>
