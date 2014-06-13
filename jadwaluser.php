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
			$("#show").load("mahasiswa.php?aksi=tambah");
		});
		$("#f").click(function()
		{
			$("#show").load("jadwal.php");
		});
		$("#absen").click(function()
		{
			$("#show").load("new3.php");
		});
		
		$("#pesan").click(function()
		{
			$("#show").load("jadwal.php?aksi=tambah");
		});
	});
  </script>
<head><title>Aplikasi Pratikum</title>
</head>
<body>	
		<!-- Home -->
		
			<div class="content">
				<div id="show">
				</div>	
			</div>
		
		
	
		<!-- Header with Navigation -->
		<div id="header">
			<h1><center><img src="images/praktikum.jpg" width="160" ></center></h1>
			<ul id="navigation">
				<li><a id="" href="#">Home</a></li>
				<li><a id="r" href="#">Verifikasi</a></li>
				
				<li><a id="f" href="#">jadwal Praktikum</a></li>
				<li><a id="" href="jadwal.php">Tambah Jadwal</a></li>
			</ul>
			<!-- Demo Nav -->
			
			<nav id="codrops-demos1">
				<h1>APLIKASI PRAKTIKUM TEGANGAN TINGGI</h1>
			</nav>
		</div>
		
	</body>
</html>