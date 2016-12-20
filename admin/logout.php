<?php
session_start();
if (session_destroy()) { // stänger sessionen
	header("Location: index.php");// tillbaka till logga in-sidan
}
?>