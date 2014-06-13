<?php
//koneksi data
include"class.php";

$db=new nilai();
//koneksi ke database dengan method

if($_GET['aksi']==''){

$daftar=$db->tampilNilai();
echo"<table border=1><tr><td>No</td><td>Nama Mahasiswa</td><td>Mata Kuliah</td><td>Tanggal</td><td>Nama Asisten</td><td>Nilai</td><td>Tools</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$i."</td><td>".$data['nama_mhs']."</td><td>".$data['nama']."</td><td>".$data['tgl']."</td><td>".$data['nama_aslab']."</td><td>".$data['nilai']."</td><td><a href='?aksi=edit&id=$data[id]'>Edit</a>||<a href='?aksi=hapus_data&id=$data[id]'>Hapus</a></td></tr>";
}
echo"</table> <br> <a href='?aksi=tambah'>TAMBAH</a>";

}elseif($_GET['aksi']=='tambah'){
echo"<br>
<form method=POST action='?aksi=tambah_data'>";
echo"<table>";
echo"<tr><td>Nim</td><td><input type=text name='id'></td></tr>";
echo"<tr><td>Nama</td><td><input type=text name='id_mhs'></td></tr>";
echo"<tr><td>Username</td><td><input type=text name='id_matkul'></td></tr>";
echo"<tr><td>Password</td><td><input type=text name='tgl'></td></tr>";
echo"<tr><td>Alamat</td><td><input type=text name='asisten'></td></tr>";
echo"<tr><td>No Hp</td><td><input type=text name='nilai'></td></tr>";
echo"<tr><td></td><td><input type=submit value='simpan'></td></tr>";
echo"</table>";
echo"</form>
";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id];
$id_mhs=$_POST['id_mhs'];
$id_matkul=$_POST['id_matkul'];
$tgl=$_POST['tgl'];
$asisten=$_POST['asisten'];
$nilai=$_POST['nilai'];
$db->tambahNilai($id,$id_mhs,$id_matkul,$tgl,$asisten,$nilai);
}

/*// proses edit data
elseif($_GET['aksi']=='edit'){
$id=$_GET['id'];

// menampilkan form edit anggota pakai method bacaAslabAnggota()
echo"<br>
<form method=POST action='?aksi=update_data'>
<table>
<tr><td>Nama</td><td><input type=text name='nama' value='".$db->bacaAslab(nama,$id)."'></td></tr>
<tr><td>Username</td><td><input type=text name='username' value='".$db->bacaAslab(username,$id)."'></td></tr>
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
$id=$_POST[id];
$nama=$_POST['nama'];
$username=$_POST['username'];
$pass=$_POST['pass'];
$gender=$_POST['gender'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$db->updateAslab($id,$nama,$username,$pass,$gender,$alamat,$hp);


}elseif($_GET['aksi']=='hapus_data'){
$id=$_GET['id'];
$db->hapusAslab($id);
}
*/
?> 