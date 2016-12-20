<?php
include('session.php'); //includerar session.php som fixar kakan och ser till så man är inloggad eller kommer till inloggningssidan
include ('config.php');
include('meny.php');

// CONNECT TILL MYSQL
$connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);

if (!$connection) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

// EFTER KLICK PÅ SUMBMIT SKA DET HÄR LADDAS UPP. DVS BILDER MED VISSA EGENSKAPER.
if ( isset($_POST['submit']) ) {
	$file_name     = $_FILES['file']['name'];
	$file_type     = $_FILES['file']['type'];
	$file_size     = $_FILES['file']['size'];
	$max_file_size = $_POST['MAX_FILE_SIZE'];
	$file_tmp_name = $_FILES['file']['tmp_name'];
	$target_path   = "../gallery";
	$uploadOK = 0;

//KOLL OM DET ÄR RÄTT FILTYP OCH MAX STORLEK PÅ BILDEN
	if($file_type === 'image/jpeg' || $file_type === 'image/png' && $file_size <= $max_file_size) {
		$uploadOK = 1;
	}
	else { $error_msg = "Filen måste vara av typen JPG eller PNG och får inte vara större än 3 mb"; }

	if($uploadOK === 1) {
		if( move_uploaded_file($file_tmp_name, $target_path . "/" . $file_name) ) {

//LADDA UPP TILL MYSQL
			$sql = "INSERT INTO gallery
					(thumb_path, img_path)
				VALUES
					('/gallery/$file_name', '/gallery/$file_name')";

			if( mysqli_query($connection, $sql) ) {
				$messageOK = "Din bild är uppladdad!";
			} else {
			    echo "Fel: " . mysqli_error($connection);
			}
		}
		else {
			echo "Ett okänt fel inträffade vid uppladdning.";
			// exit;
		}
	}
	else {
		// if( isset($error_msg) ) { echo $error_msg; }
	}
}

// DELETE IMAGE
if( isset($_GET['delete']) ) {
	$id = $_GET['delete'];

	$sql = "DELETE FROM gallery WHERE id = $id";
	mysqli_query($connection, $sql);

	$messageOK = "Bild är borttagen!";
}

//SPARAR FRÅGAN I EN VARIABEL
$result = mysqli_query($connection, "SELECT * FROM gallery");

?>
		<div class="container">
			<?php
			if( isset($messageOK) ) {
				echo "
					<div class='alert alert-success' role='alert'>
						<p><span class='glyphicon glyphicon-check'></span> $messageOK</p>
					</div>
				";
			}

			if( isset($error_msg) ) {
				echo "
					<div class='alert alert-danger' role='alert'>
						<p><span class='glyphicon glyphicon-check'></span> $error_msg</p>
					</div>
				";
			}
			?>
			
<!--HTML FÖR ADMIN-SIDAN-->
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
				<div class="form-group">
          <br />
					<input type="file" class="form-control" name="file">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-success" name="submit" style="background-color:white; color:black;">Ladda upp</button>
				</div>
			</form>

<!--LOOPAR IGENOM DET SOM EFTERFRÅGATS, LAGRAR DET I EN VAR,-->
      	<div id="admin-gallery">
      		<?php
	      		while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
	      			$id    = $row['id'];
	      			$thumb = $row['thumb_path'];
	      			$img   = $row['img_path'];

					?>
					<div class="image-item col-lg-2 col-md-3 col-sm-4 col-xs-6">
						<div class="thumbnail">
							<img class="img-responsive gallery-thumb admin-gallery-thumb" src="..<?php echo $thumb; ?>" alt="">
							<a class="btn btn-xs btn-danger" style="background-color:white; color:black; border-width:0px;" 
                 href="?delete=<?php echo $id ?>"><span class="glyphicon glyphicon-remove" 
                 style="background-color:white; color:black;"></span> Ta bort</a>
						</div>
					</div>
					<?php
				}
      		?>
      	</div> <!-- #admin-gallery -->
		</div> <!-- .container -->


