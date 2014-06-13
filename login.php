<html>
<head><title>PRAKTIKUM LABOR</title>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" href="css/font-awesome.css" type="text/css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" href="jquery/jquery-ui.css" />
<script src="js/modernizr.custom.js"></script>
<script src="js/login.js"></script>
<script src="jquery/jquery-1.9.1.js"></script>
<script src="jquery/jquery-ui.js"></script>
<script>
	$(document).ready(function()
	{
		$("#option").hide();
		$("#masuk").click(function()
		{
			$("#option").slideToggle();
		});
		
		$("#reg").click(function()
		{
			$("#show").load("user.php?aksi=tambah");
		});
	});
  </script>
</head>
<body>

<div id="header"></div>
<div id="navigasi"></div>

<div id="content">
	<section class="main">
		<form class="form-2" action="log.php" method="post">
			<h1><center><span class="log-in">Log in</span></center></h1>
			<h1><center><span>
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
			</span></center></h1>
				<p class="float">
					<label for="login"><i class="icon-user"></i>Username</label>
					<input type="text" name="nama" id="nama" placeholder="Username">
				</p>
				<p class="float">
					<label for="password"><i class="icon-lock"></i>Password</label>
					<input type="password" name="pass" id="pass" placeholder="Password" class="showpassword">
				
				<p class="clearfix">
					<input type="submit" name="submit" value="Log in">
					
				</p>
		
		</form>
	</section>
</div>
<div id="footer"></div>

</body>
</html>

