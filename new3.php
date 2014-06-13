<html>
<head>Cetak Absen</head>
<body>
<div class="content">
	<input type='button' onclick=window.print() value='CETAK REKAP ABSEN' class="noPrint">				
</div>
<?php
//koneksi data
include"class.php";
//include 'index.php';
$db=new mahasiswa();
//koneksi ke database dengan method
//$db->dbOpen();

if($_GET['aksi']==''){

$daftar=$db->tampilData();

echo"<table border=1><tr><td>NIM</td><td>Nama Mahasiswa</td><td width='100'></td><td width='100'></td><td width='100'></td><td width='100'></td><td width='100'></td>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_mhs']."</td><td>".$data['nama_mhs']."</td><td></td><td></td><td></td><td></td><td></td>";
}
echo"</table> <br> <a href='?aksi=tambah'>TAMBAH</a>";
}

?> 
</body>