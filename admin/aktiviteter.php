<html>
  <head>
          <title>Admin</title>         
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">          
  </head>
  <body>
</body>
  </html>

<?php
    include('session.php');
    include('config.php');
    include('meny.php');

//KOPPLING TILL DB, FRÅGA, HÄMTA SVAR, SORTERA UT EN KOLUMN I TABELLEN
    $connection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbdatabas);
    $query2 = mysqli_query($connection, "SELECT * FROM abouttext WHERE id=2");
    $about2 = mysqli_fetch_assoc($query2);
    $aboutText2 = $about2["text"];

    if (isset($_POST['save2'])) {//Vid klick på knapp med namn 'save2'
      $aboutText2 = $_POST["text2"];//sparas text i text2 i en variabel
      mysqli_query($connection, "UPDATE abouttext 
      SET text = '$aboutText2' WHERE id=2");//Texten uppdateras
    }
?>

<!--html som visar textaren på adminsidan-->
<div class="container">
    <div>
        <div class="row">
            <div class="col-md-6">
               <h1 style='color:gray'>Ändra texten</h1> 
                <form method="post" enctype="multipart/form-data"> </br>
                    <textarea name="text2" type="textarea" cols="120" rows="20"><?php echo $aboutText2; ?></textarea>                  
                    <br></br>
                  <input type="submit" style="background-color: white; color: black; font-size:33px"  name="save2" value="Spara">
              </form>
                <p>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
