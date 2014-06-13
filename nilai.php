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

$db=new nilai();
//koneksi ke database dengan method

if($_GET['aksi']==''){
$i=1;
$daftar=$db->tampilNilai();
echo"<table border=1><tr><td>No</td><td>Nama Mahasiswa</td><td>Tanggal</td><td>Nama Asisten</td><td>Modul</td><td>Nilai</td><td>Tools</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_nilai']."</td><td>".$data['nama_mhs']."</td><td>".$data['tgl']."</td><td>".$data['nama_aslab']."</td><td>".$data['modul']."</td><td>".$data['nilai']."</td><td><a href='?aksi=edit&id=$data[id_nilai]'>Edit</a>||<a href='?aksi=hapus_data&id_nilai=$data[id_nilai]'>Hapus</a></td></tr>";
}
echo"</table> <br> <a href='?aksi=tambah'>TAMBAH</a>";
}elseif($_GET['aksi']=='tambah'){
echo"<form method=POST action='?aksi=tambah_data'>";
echo"<table>";
echo"<tr><td>Nama</td><td><select name='id_mhs'>";
echo "<option value=\"0\" selected>";
					$db=new mahasiswa();
					$daftar=$db->tampilData();
					$sql="select * from mahasiswa";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Mahasiswa");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[id_mhs];
					  $lokasi= $row[nama_mhs];
					  print ("<OPTION VALUE=\"$id\">$lokasi");
					  
					}
echo"</td></tr>";
echo"<tr><td>Tanggal</td><td><input type=text id=tanggal1 name='tgl'></td></tr>";
echo"<tr><td>Nama Asisten</td><td><select name='asisten'>";
echo "<option value=\"0\" selected>";
					$db=new aslab();
					$daftar=$db->tampilAslab();
					$sql="select * from aslab";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Asisten Labor");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[id];
					  $nama= $row[nama_aslab];
					  print ("<OPTION VALUE=\"$id\">$nama");
					  
					}
echo"</td></tr>";
echo"<tr><td>Modul</td><td><input type=text name='modul'></td></tr>";
echo"<tr><td>Nilai</td><td><input type=text name='nilai'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"</form>";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id_nilai];
$id_mhs=$_POST['id_mhs'];
$tgl=$_POST['tgl'];
$asisten=$_POST['asisten'];
$modul=$_POST['modul'];
$nilai=$_POST['nilai'];
$db->tambahNilai($id,$id_mhs,$tgl,$asisten,$modul,$nilai);
}

// proses edit data
elseif($_GET['aksi']=='edit'){
$id=$_GET['id'];

// menampilkan form edit anggota pakai method bacaNilaiAnggota()
echo"<br>
<form method=POST action='?aksi=update_data&id=$id'>";
echo"<table>";
//echo"<tr><td>No BP</td><td><input type=text name='id_nilai' value='".$db->bacaNilai(id_nilai,$id)."'></td></tr>";
//echo"<tr><td>Nama Mahasiswa</td><td><input type=text name='id_mhs' value='".$db->bacaNilai(id_mhs,$id)."'></td></tr>";
//echo"<tr><td>Mata Kuliah</td><td><input type=text name='id_matkul' value='".$db->bacaNilai(id_matkul,$id)."'></td></tr>";
echo"<tr><td>Tanggal</td><td><input type=text id=tanggal1 name='tgl' value='".$db->bacaNilai(tgl,$id)."'></td></tr>";
//echo"<tr><td>Nama Asisten</td><td><input type=text name='asisten' value='".$db->bacaNilai(asisten,$id)."'></td></tr>";
echo"<tr><td>Nilai</td><td><input type=text name=nilai value='".$db->bacaNilai(nilai,$id)."'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"<input type=hidden name='id_nilai' value='".$db->bacaNilai(id_nilai,$id)."'></td></tr>";
echo"<input type=hidden name='id_mhs' value='".$db->bacaNilai(id_mhs,$id)."'></td></tr>";
echo"<input type=hidden name='asisten' value='".$db->bacaNilai(asisten,$id)."'></td></tr>";
//<input type='hidden' name='id' value='".$db->bacaAslab(id,$id)."'>
echo"</form>";

}elseif($_GET['aksi']=='update_data'){
$id=$_GET[id];
$id_mhs=$_POST['id_mhs'];
$tgl=$_POST['tgl'];
$asisten=$_POST['asisten'];
$modul=$_POST['modul'];
$nilai=$_POST['nilai'];

$db->updateNilai($id,$id_mhs,$tgl,$asisten,$modul,$nilai);


}elseif($_GET['aksi']=='hapus_data'){
$id=$_GET['id_nilai'];
$db->hapusNilai($id);
}

?> 	
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
