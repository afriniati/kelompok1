<script>
	$("#pw2").keyup(function()
	{
		var pw1 = $("#pw1").val();
		var pw2 = $("#pw2").val();
		if (pw2 != pw1)
		{
			$("#cek").html("<img src='simbol/false.png'> Password tidak cocok");
		}
		else
		{
			$("#cek").html("<img src='simbol/true.png'> Password cocok");
		}
	});
</script>
<?php
//koneksi data
include"class.php";

$db=new user();
//koneksi ke database dengan method

if($_GET['aksi']=='tambah'){
echo"<center>";
echo"<br><form method=POST action='?aksi=tambah_data'>";
echo"<table>";
echo"<tr><td>Nama</td><td><input type=text name='nama'></td></tr>";
echo"<tr><td>Password</td><td><input type=text name='pass'></td></tr>";
echo"<tr><td>Re-Password</td><td><input type='password' name='password2' id='pw2' required></td></tr>";
echo"<input type='hidden' name='status' value='user'>";
echo"</table>";
echo"<tr><td><input type=submit value='simpan'><input type=reset value='reset'></td></tr>";
echo"</form>";
echo"</center>";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id];
$nama=$_POST['nama'];
$pass=$_POST['pass'];
$status=$_POST['status'];
$db->tambahUser($id,$nama,$pass,$status);
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