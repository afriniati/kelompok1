<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style2.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" href="jquery/jquery-ui.css" />
	<script src="jquery/jquery-1.9.1.js"></script>
	<script src="jquery/jquery-ui.js"></script>
	<link rel="stylesheet" href="jquery/style.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
<script type="text/javascript" src="jquery/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.datepicker-id.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.8.11.custom.css" />
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

<script type="text/javascript">
 $(document).ready(function() {
 $("#tanggal1").datepicker({
   dateFormat : "yy-mm-dd",
   changeMonth: true,
   changeYear: true,
   yearRange: "-100:+0",
   showon: "button",
   buttonText: "menampilkan date picker",
   buttonImage: "calendar.gif",
   buttonImageonly: true
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
				
<?php
//koneksi data
include"class.php";

$db=new aslab();
//koneksi ke database dengan method

if($_GET['aksi']==''){

$daftar=$db->tampilAslab();
echo"<table border=1><tr><td>ID Asisten</td><td>Nama</td><td>Jenis Kelamin</td><td>Alamat</td><td>No HP</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_aslab']."</td><td>".$data['nama_aslab']."</td><td>".$data['gender']."</td><td>".$data['alamat']."</td><td>".$data['hp']."</td></tr>";
}



}elseif($_GET['aksi']=='tambah'){
echo"<br>
<form method=POST action='?aksi=tambah_data'>";
echo"<table>";
echo"<tr><td>ID Asisten</td><td><input type=text name='id_aslab'></td></tr>";
echo"<tr><td>Nama</td><td><input type=text name='nama_aslab'></td></tr>";
echo"<tr><td>Password</td><td><input type=text name='pass'></td></tr>";
echo"<tr><td>Jenis Kelamin</td><td><select name=gender><option value=- selected>-Jenis Kelamin-<option value=Laki-laki>Laki-laki</option><option value=Perempuan>Perempuan</option></td></tr>";
echo"<tr><td>Alamat</td><td><input type=text name='alamat'></td></tr>";
echo"<tr><td>No Hp</td><td><input type=text name='hp'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"</form>
";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id];
$id_aslab=$_POST['id_aslab'];
$nama=$_POST['nama_aslab'];
$pass=$_POST['pass'];
$gender=$_POST['gender'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$db->tambahAslab($id,$id_aslab,$nama,$pass,$gender,$alamat,$hp);
}

// proses edit data
elseif($_GET['aksi']=='edit'){
$id=$_GET['id'];

// menampilkan form edit anggota pakai method bacaAslabAnggota()
echo"<br>
<form method=POST action='?aksi=update_data'>
<table>
<tr><td>Nama</td><td><input type=text name='nama' value='".$db->bacaAslab(nama,$id)."'></td></tr>
<tr><td>Password</td><td><input type=text name='pass' value='".$db->bacaAslab(pass,$id)."'></td></tr>
<tr><td>Jenis Kelamin</td><td><select name=gender><option value='".$db->bacaAslab(gender,$id)."' selected>-".$db->bacaAslab(gender,$id)."-<option value=Laki-laki>Laki-laki</option><option value=Perempuan>Perempuan</option></td></tr>
<tr><td>Alamat</td><td><input type=text name='alamat' value='".$db->bacaAslab(alamat,$id)."'></td></tr>
<tr><td>No Telepon</td><td><input type=text name='hp' value='".$db->bacaAslab(hp,$id)."'></td></tr>
<tr><td></td><td><input type=submit value='simpan'></td></tr>
</table>
<input type='hidden' name='id' value='".$db->bacaAslab(id,$id)."'>
</form>
";

}elseif($_GET['aksi']=='update_data'){
$id=$_POST[id_nilai];
$nama=$_POST['nama'];
$pass=$_POST['pass'];
$gender=$_POST['gender'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$db->updateAslab($id,$nama,$username,$pass,$gender,$alamat,$hp);


}elseif($_GET['aksi']=='hapus_data'){
$id=$_GET['id'];
$db->hapusAslab($id);
}

?> 	
			</div>
		
		
	
		<!-- Header with Navigation -->
		<div id="header">
			<h1><center><img src="images/praktikum.jpg" width="160" ></center></h1>
			<ul id="navigation">
				<li><a id="" href="#">Home</a></li>
				<li><a id="r" href="">Data Asisten</a></li>
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

