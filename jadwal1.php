<?php
//koneksi data
include"class.php";
$db=new jadwal();
//koneksi ke database dengan method
//$db->dbOpen();

if($_GET['aksi']==''){

$daftar=$db->tampilJadwal();
echo"<table border=1><tr><td>Shift</td><td>Jam</td><td>Hari</td><td>Asisten</td><td>Jumlah Mahasiswa</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['idj']."</td><td>".$data['shift']."</td><td>".$data['hari']."</td><td>".$data['nama_aslab']."</td><td>".$data['jumlah_mhs']."</td></tr>";
}


}elseif($_GET['aksi']=='tambah'){
echo"<br>
<form method=POST action='?aksi=tambah_data'>";
echo"<table>";
echo"<tr><td>Jadwal</td><td><input type=text name='shift'></td></tr>";
echo"<tr><td>Hari</td><td><select name='hari'>";
			echo"<option value='Senin'>Senin</option>";
			echo"<option value='Selasa'>Selasa</option>";
			echo"<option value='Rabu'>Rabu</option>";
			echo"<option value='Kamis'>Kamis</option>";
			echo"<option value='Jumat'>Jumat</option>";
			echo"<option value='Sabtu'>Sabtu</option>";
			echo"<option value='Minggu'>Minggu</option>";
echo"</td></tr>";
echo"<tr><td>Asisten</td><td><select name='id_aslab'>";
echo "<option value=\"0\" selected>";
					$db=new aslab();
					$daftar=$db->tampilAslab();
					$sql="select * from aslab";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Asisten");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[id];
					  $nama= $row[nama_aslab];
					  print ("<OPTION VALUE=\"$id\">$nama");
					  
					}
echo"</td></tr>";

echo"<tr><td>Jumlah Mahasiswa</td><td><input type=text name='jumlah_mhs'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"</form>
";

}elseif($_GET['aksi']=='tambah_data'){
$idj=$_POST[idj];
$shift=$_POST['shift'];
$hari=$_POST['hari'];
$id_aslab=$_POST['id_aslab'];
$jumlah=$_POST['jumlah_mhs'];
$db->tambahJadwal($idj,$shift,$hari,$id_aslab,$jumlah);
}

// proses edit data
elseif($_GET['aksi']=='edit'){
$id=$_GET['id'];

// menampilkan form edit anggota pakai method bacaMatkulAnggota()
echo"<br>
<form method=POST action='?aksi=update_data'>
<table>
<tr><td>ID</td><td><input type=text readonly='readonly' name='id_matkul' value='".$db->bacaMatkul(id_matkul,$id)."'></td></tr>
<tr><td>Nama</td><td><input type=text name='nama' value='".$db->bacaMatkul(nama,$id)."'></td></tr>
<tr><td>Semester</td><td><input type=text name='smt' value='".$db->bacaMatkul(smt,$id)."'></td></tr>
<tr><td>Sks</td><td><input type=text name='sks' value='".$db->bacaMatkul(sks,$id)."'></td></tr>
<tr><td>Status</td><td><input type=text name='status' value='".$db->bacaMatkul(status,$id)."'></td></tr>
<tr><td></td><td><input type=submit value='simpan'></td></tr>
</table>
<input type='hidden' name='id' value='".$db->bacaMatkul(id_matkul,$id)."'>
</form>
";

}elseif($_GET['aksi']=='update_data'){
$id=$_POST[id_matkul];
$nama=$_POST['nama'];
$smt=$_POST['smt'];
$sks=$_POST['gender'];
$status=$_POST['status'];
$db->updateMatkul($id,$nama,$smt,$sks,$status);


}elseif($_GET['aksi']=='hapus_data'){
$id=$_GET['id'];
$db->hapusJadwal($id);
}

?>