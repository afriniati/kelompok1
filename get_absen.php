<?php
include "class.php";
$absen = new nilai();
$x = $_POST['id_nilai'];
$absen->hitungNilai($x);
?>