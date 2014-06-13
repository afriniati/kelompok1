<?php

if (isset($_GET['off']))
{
	session_start();
	session_destroy();
	header("Location: index.php");
}
else
{
	include "class.php";
	$id = $_POST['nama'];
	$pass = $_POST['pass'];
	//$status = $_POST['status'];
	$dosen = new user();
	$dosen->cekUser($id,$pass);


}

?>