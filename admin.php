<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/style2.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="jquery/jquery-1.9.1.js"></script>
		<script src="jquery/jquery-ui.js"></script>
		<link rel="stylesheet" href="jquery/style.css" /><script src="jquery/jquery-1.9.1.js"></script>
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
			$("#show").load("mahasiswa.php");
		});
		$("#f").click(function()
		{
			$("#show").load("fasilitas.php");
		});
		$("#pj").click(function()
		{
			$("#show").load("orang.php");
		});
		
		$("#pesan").click(function()
		{
			$("#show").load("form_pesan.php");
		});
	});
  </script>
	</head>
	<body>	
		<!-- Home -->
		<div class="panel">
			<div class="content">
				<div id="show">
				</div>	
			</div>
		</div>
		
	
		<!-- Header with Navigation -->
		<div id="header">
			<h1><center><img src="images/praktikum.jpg" width="160" ></center></h1>
			<ul id="navigation">
			<form class="form-2" action="log.php" method="post">
			<h2><center><span class="log-in">Log in</span></center></h2>
			<h2><center><span>
				<?php
					//kode php ini kita gunakan untuk menampilkan pesan eror
					if (!empty($_GET['error'])) {
						if ($_GET['error'] == 1) {
							echo '<h3>Username dan Password belum diisi!</h3>';
						} else if ($_GET['error'] == 2) {
							echo '<h3>Username belum diisi!</h3>';
						} else if ($_GET['error'] == 3) {
							echo '<h3>Password belum diisi!</h3>';
						} else if ($_GET['error'] == 4) {
							echo '<h3>Username dan Password tidak terdaftar!</h3>';
						}
					}
				?>
			</span></center></h2>
				<p class="float">
					<label for="login"><i class="icon-user"></i>Username</label>
					<input type="text" name="nama" id="nama" placeholder="Username or ID Asisten">
				</p>
				<p class="float">
					<label for="password"><i class="icon-lock"></i>Password</label>
					<input type="password" name="pass" id="pass" placeholder="Password" class="showpassword">
				</p>
				<p class="clearfix"> 
					<a href="#" class="log-twitter">Reset</a>    
					<input type="submit" name="submit" value="Log in">
				</p>
		</form>	
			</ul>
			<!-- Demo Nav -->
			<nav id="codrops-demos">
				<a href="#" id="r">Demo 3</a>
				<a class="current-demo" href="#home">Jadwal Praktikum</a>
				<a href="index3.html#home">Demo 3</a>
			</nav>
			<nav id="codrops-demos1">
				<h1>APLIKASI PRAKTIKUM TEGANGAN TINGGI</h1>
			</nav>
		</div>
		
	</body>
</html>
