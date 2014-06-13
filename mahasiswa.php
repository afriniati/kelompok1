
<html>
<head>
<script type="text/javascript" src="jquery/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="jquery/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="jquery/jquery.ui.datepicker-id.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/jquery-ui-1.8.11.custom.css" />
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
</head>
<body>
<?php
//koneksi data
include"class.php";
//include 'index.php';
$db=new mahasiswa();
//koneksi ke database dengan method
//$db->dbOpen();

if($_GET['aksi']==''){

$daftar=$db->tampilData();
echo"<table border=1><tr><td>NIM</td><td>Nama</td><td>Tempat/Tanggal Lahir</td><td>Jenis Kelamin</td><td>Jadwal Praktikum</td><td>Jurusan</td><td>Alamat</td><td>No HP</td><td>Edit</td><td>Hapus</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_mhs']."</td><td>".$data['nama_mhs']."</td><td>".$data['tempat_lhr']."/".$data['ttl']."</td><td>".$data['gender']."</td><td>".$data['hari']."/".$data['shift']."</td><td>".$data['jurusan']."</td><td>".$data['alamat']."</td><td>".$data['no_hp']."</td><td></td><td><a href='?aksi=hapus_data&id=$data[id_mhs]'>Hapus</a></td></tr>";
}
echo"</table> <br> <a href='?aksi=tambah'>TAMBAH</a>";


}elseif($_GET['aksi']=='tambah'){
echo"<br>
<form enctype='multipart/form-data' method='POST' action='?aksi=tambah_data '>";
echo"<table>";
echo"<tr><td>Nim</td><td><input type=text name='id_mhs'></td></tr>";
echo"<tr><td>Nama Mahasiswa</td><td><input type=text name='nama_mhs'></td></tr>";
echo"<tr><td>Tempat Lahir</td><td><input type=text name='tempat_lhr'></td></tr>";
echo"<tr><td>Tanggal Lahir</td><td><input type=text id=tanggal1 name='ttl'></td></tr>";
echo"<tr><td>Jenis Kelamin</td><td><select name=gender><option value=- selected>-Jenis Kelamin-<option value=Laki-laki>Laki-laki</option><option value=Perempuan>Perempuan</option></td></tr>";
echo"<tr><td>Jadwal</td><td><select name='jadwal'>";
echo "<option value=\"0\" selected>";
					$db=new jadwal();
					$daftar=$db->tampilJadwal();
					// $id=;
					// $sql="select * from jadwal where idj='$id'";
					// $hasil=mysql_query($sql);
					// if ($hasil == true)
					// print ("--Matakuliah--");
					// while ($row = mysql_fetch_array($hasil))
					foreach ($daftar as $data)
					{
					$id = $data[0];
					$nama= $data[1];
					$jadwal=$data[2];
					$jml=$data[4];
					if ($jml<4)
					{
						print ("<OPTION VALUE=\"$id\">$nama/$jadwal/$jml");
					}
					
					}
echo"</td></tr>";
echo"<tr><td>Jurusan</td><td><input type=text name='jurusan'></td></tr>";
echo"<tr><td>Alamat</td><td><input type=text name='alamat'></td></tr>";
echo"<tr><td>No Hp</td><td><input type=text name='no_hp'></td></tr>";
echo"<tr><td>Foto</td><td><input type=file name='foto'></td></tr>";
echo"<tr><td>KHS</td><td><input type=file name='khs'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"</form>
";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id_mhs];
$nama=$_POST['nama_mhs'];
$tempat=$_POST['tempat_lhr'];
$ttl=$_POST['ttl'];
$gender=$_POST['gender'];
$jadwal=$_POST['jadwal'];
$jur=$_POST['jurusan'];
$alamat=$_POST['alamat'];
$hp=$_POST['no_hp'];
$foto=$_FILES['foto']['name'];
$khs=$_FILESE['khs']['name'];
$db->tambahData($id,$nama,$tempat,$ttl,$gender,$jadwal,$jur,$alamat,$hp,$foto,$khs);
}


// proses edit data
elseif($_GET['aksi']=='edit'){
$id=$_GET['id'];

// menampilkan form edit anggota pakai method bacaDataAnggota()
echo"<br>
<form method=POST action='?aksi=update_data'>
<table>
<tr><td>Nama</td><td><input type=text name='nama_mhs' value='".$db->bacaData(nama_mhs,$id)."'></td></tr>
<tr><td>Tanggal Lahir</td><td><input type=text name='ttl' value='".$db->bacaData(ttl,$id)."'></td></tr>
<tr><td>Jenis Kelamin</td><td><select name=gender><option value='".$db->bacaData(gender,$id)."' selected>-".$db->bacaData(gender,$id)."-<option value=Laki-laki>Laki-laki</option><option value=Perempuan>Perempuan</option></td></tr>
<tr><td>Jurusan</td><td><input type=text name='jurusan' value='".$db->bacaData(jurusan,$id)."'></td></tr>
<tr><td>Alamat</td><td><input type=text name='alamat' value='".$db->bacaData(alamat,$id)."'></td></tr>
<tr><td>No Telepon</td><td><input type=text name='no_hp' value='".$db->bacaData(no_hp,$id)."'></td></tr>
<tr><td>Foto</td><td><input type=text name='foto' value='".$db->bacaData(foto,$id)."'></td></tr>
<tr><td>KHS</td><td><input type=text name='khs' value='".$db->bacaData(khs,$id)."'></td></tr>
<tr><td></td><td><input type=submit value='simpan'></td></tr>
</table>
<input type='hidden' name='id' value='".$db->bacaData(id_mhs,$id)."'>
</form>
";

}elseif($_GET['aksi']=='update_data'){
$id=$_POST[id];
$nama=$_POST['nama_mhs'];
$ttl=$_POST['ttl'];
$gender=$_POST['gender'];
$jur=$_POST['jurusan'];
$alamat=$_POST['alamat'];
$hp=$_POST['no_hp'];
$foto=$_FILES['foto']['name'];
$khs=$_FILESE['khs']['name'];
$db->updateData($id,$nama,$ttl,$gender,$jur,$alamat,$hp,$foto, $khs);


}elseif($_GET['aksi']=='hapus_data'){
$id=$_GET['id'];
$db->hapusData($id);
}

?> 
</body>
</html>