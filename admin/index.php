<?php
//DET HÄR ÄR SIDAN MED INLOGGNINGSKNAPP

include('login.php'); //login filen

if(isset($_SESSION['login_user'])){
	header("location: profile.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Admin</title>
	</head>
<body>
	<div id="main" class="container">
		<div></div>
			<div class="row">
		  		<div class="col-md-offset-1 col-md-10">
					<div class="well index-well">
						<div class="text-center">
							<h1>Logga in</h1><br />
							<form action="" method="post">
								<label>Användarnamn</label>
								<br /><input type="text" name="username" placeholder="användarnamn = admin" id="användarnamn">
								<br /><br /><label>Lösenord: </label><br />
								<input type="password" name="password" placeholder="lösenord = admin"><BR />
								<input name="submit" type="submit" value=" Login ">
								<h3><?php echo $error; ?></h3>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</body>
</html>