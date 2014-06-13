<!DOCTYPE html>
<HTML>
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="jquery/jquery-ui.css" />
	<script src="jquery/jquery-1.9.1.js"></script>
	<script src="jquery/jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery/style.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<script>
	$(document).ready(function()
	{
		$("#option").hide();
		$("#masuk").click(function()
		{
			$("#option").slideToggle();
		});
		$("#r").click(function()
		{
			$("#show").load("aslab.php");
		});
		
	});
  </script>
	
<head><title>Aplikasi Pratikum</title>
</head>
<body>	
		<!-- Home -->
		
			<div class="content">
				<form action="tes.php?aksi=tampil" method="POST">
Pilih Matkul:<select name="jadwal" id="idj"><option value=""></option>
<?php
include 'class.php';
$dosen = new jadwal();
$dosen->tampiljd($id);
?>
</select>
<input type=submit value='submit'>
</form>
</div>


<?
if($_GET['aksi']=='tampil'){
$jadwal=$_POST['jadwal'];
$db= new mahasiswa();
$daftar=$db->tampilCoba($jadwal);
echo"<table border=1><tr><td>NIM</td><td>Nama</td><td>Tempat/Tanggal Lahir</td><td>Jenis Kelamin</td><td>Jadwal Praktikum</td><td>Jurusan</td><td>Alamat</td><td>No HP</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_mhs']."</td><td>".$data['nama_mhs']."</td><td>".$data['tempat_lhr']."/".$data['ttl']."</td><td>".$data['gender']."</td><td>".$data['hari']."/".$data['shift']."</td><td>".$data['jurusan']."</td><td>".$data['alamat']."</td><td>".$data['no_hp']."</td></tr>";
}

}
?>
</div>
			</div>
		
		
	
		<!-- Header with Navigation -->
		<div id="header">
			<h1><center><img src="images/praktikum.jpg" width="160" ></center></h1>
			<ul id="navigation">
				<li><a id="" href="#">Home</a></li>
				<li><a  href="nilai.php">Input Nilai</a></li>
				<li><a href="log.php?off=1">Log Out</a></li>
				
			</ul>
			<!-- Demo Nav -->
			
			<nav id="codrops-demos1">
				<h1>APLIKASI PRAKTIKUM TEGANGAN TINGGI</h1>
			</nav>
		</div>
		
	</body>
</html>