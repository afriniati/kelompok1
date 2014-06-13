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
$db=new matkul();
//koneksi ke database dengan method
//$db->dbOpen();

if($_GET['aksi']==''){

$daftar=$db->tampilMatkul();
echo"<table border=1><tr><td>Kode Matakuliah</td><td>Nama Matakuliah</td><td>Semester</td><td>SKS</td><td>Status</td><td><center>Tools</td></tr>";
foreach($daftar as $data){
echo"<tr><td>".$data['id_matkul']."</td><td>".$data['nama']."</td><td>".$data['smt']."</td><td>".$data['sks']."</td><td>".$data['status']."</td><td><a href='?aksi=edit&id=$data[id_matkul]'>Edit</a>||<a href='?aksi=hapus_data&id=$data[id_matkul]'>Hapus</a></td></tr>";
}
echo"</table> <br> <a href='?aksi=tambah'>TAMBAH</a>";


}elseif($_GET['aksi']=='tambah'){
echo"<br>
<form method=POST action='?aksi=tambah_data'>
<table>
<tr><td>Nama</td><td><input type=text name='nama'></td></tr>
<tr><td>Semester</td><td><select name='smt'>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			<option value='13'>13</option>
			<option value='14'>14</option>

</td></tr>
<tr><td>Jumlah SKS</td><td><input type=text name='sks'></td></tr>
<tr><td>Status</td><td><select name='status'>
			<option value='Tidak Lulus'>Tidak Lulus</option>
			<option value='Lulus'>Lulus</option>
</td></tr>
<tr><td></td><td><input type=submit value='simpan'></td></tr>
</table>
</form>
";

}elseif($_GET['aksi']=='tambah_data'){
$id=$_POST[id_matkul];
$nama=$_POST['nama'];
$smt=$_POST['smt'];
$sks=$_POST['sks'];
$status=$_POST['status'];
$db->tambahMatkul($id,$nama,$smt,$sks,$status);
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
$db->hapusMatkul($id);
}

?> 
</body>
</html>