<?php
class database {

private $dbHOst ="localhost";
private $dbUser ="root";
private $dbPass ="";
private $dbDatabase ="rpl";

//koneksi data
function dbOpen(){

mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
mysql_select_db($this->dbDatabase);

}
public function dbClose()
	{
		$db = mysql_close();
		return $db;
	}
}
class Controler
{
	public $id;
	public $id_mhs;
	public $nama;
	public $nama_mhs;
	public $id_nilai;
	public $nilai;
}
class mahasiswa extends Controler {

//method tambah data mahasiswa
function tambahData($id,$nama,$tempat,$ttl,$gender,$jadwal,$jur,$alamat,$hp,$foto,$khs){
$db = new database();
$db->dbOpen();
$direktori="images/$foto";
$simpankhs="images/$khs";
$alamatfile=$direktori.$foto;
$alamatkhs=$simpankhs.$khs;

if (move_uploaded_file($_FILES['foto']['tmp_name'],$alamatfile) || move_uploaded_file($_FILES['khs']['tmp_name'],$alamatkhs))
{
$query="insert into mahasiswa (id_mhs,nama_mhs,tempat_lhr,ttl,gender,jadwal,jurusan,alamat,no_hp,foto,khs)values('$id','$nama','$tempat','$ttl','$gender','$jadwal','$jur','$alamat','$hp','$foto','$khs')";
$hasil=mysql_query($query);
if($hasil){
echo"<meta http-equiv='refresh' content='0; url=mahasiswa.php?aksi=tambah'>";
}
}
else
{echo"gagal";}

}
//method tampil data
function tampilData(){
$db = new database();
$db->dbOpen();
$result="select mahasiswa.id_mhs,mahasiswa.nama_mhs,mahasiswa.tempat_lhr,mahasiswa.ttl,mahasiswa.gender, jadwal.shift,jadwal.hari,mahasiswa.jurusan,mahasiswa.alamat,mahasiswa.no_hp, mahasiswa.foto, mahasiswa.khs from mahasiswa,jadwal where  jadwal.idj=mahasiswa.jadwal order by id_mhs";
$sql=mysql_query($result);
while($rows=mysql_fetch_array($sql))
$data[]=$rows;
return $data;
}

function tampilCoba($jadwal){
$db = new database();
$db->dbOpen();
$res="select mahasiswa.id_mhs,mahasiswa.nama_mhs,mahasiswa.tempat_lhr,mahasiswa.ttl,mahasiswa.gender, jadwal.shift,jadwal.hari,mahasiswa.jurusan,mahasiswa.alamat,mahasiswa.no_hp from mahasiswa,jadwal where  jadwal.idj=mahasiswa.jadwal and mahasiswa.jadwal='$jadwal' order by id_mhs ASC";
$sql=mysql_query($res);
//if($sql == true)
//echo"<table border=1><tr><td>NIM</td><td>Nama</td><td>Tempat/Tanggal Lahir</td><td>Jenis Kelamin</td><td>Jadwal Praktikum</td><td>Jurusan</td><td>Alamat</td><td>No HP</td></tr>";
while($rows=mysql_fetch_array($sql))

$data[]=$rows;
return $data;
/*echo"<table border=1>";
echo"<tr><td>$rows[0]</td>";
echo"<td>$rows[1]</td>";
echo"<td>$rows[2]/$rows[3]</td>";
echo"<td>$rows[4]</td>";
echo"<td>$rows[5]/$rows[6]</td>";
echo"<td>$rows[7]</td>";
echo"<td>$rows[8]</td>";
echo"<td>$rows[9]</td></tr>";*/


}

//method baca data mahasiswa
function bacaData($field,$id){
$db = new database();
$db->dbOpen();
$query=mysql_query("select * from mahasiswa  where id_mhs='$id'");
$data=mysql_fetch_array($query);
if($field == 'id_mhs'){
return $data['id_mhs'];
}if($field == 'nama_mhs'){
return $data['nama_mhs'];
}elseif($field == 'tempat_lhr'){
return $data['tempat_lhr'];
}elseif($field == 'ttl'){
return $data['ttl'];
}elseif($field == 'gender'){
return $data['gender'];
}elseif($field == 'jurusan'){
return $data['jurusan'];
}elseif($field == 'alamat'){
return $data['alamat'];
}elseif($field == 'no_hp'){
return $data['no_hp'];
}
}

//method untuk update data mahasiswa
function updateData($id,$nama,$ttl,$gender,$jur,$alamat,$hp){
$db = new database();
$db->dbOpen();
$query=mysql_query("update mahasiswa set id_mhs='$id',nama_mhs='$nama',ttl='$ttl',gender='$gender',jurusan='$jur',alamat='$alamat',no_hp='$hp' where id_mhs='$id'");
echo"<meta http-equiv='refresh' content='0; url=mahasiswa.php'>";
}

//methode untuk hapus data mahasiswa
/*function hapusData($id){
$db = new database();
$db->dbOpen();
$query=mysql_query("delete from mahasiswa where id_mhs='$id'");
if($query){
echo"<meta http-equiv='refresh' content='0; url=mahasiswa.php'>";
}
}
function konfirmasi($id){}*/
}


class nilai extends Controler

 {
//method tambah data nilai
public function tambahNilai($id,$id_mhs,$tgl,$asisten,$modul,$nilai){
$db = new database();
$db->dbOpen();
$query="insert into nilai(id_mhs,tgl,asisten,modul,nilai)values('$id_mhs','$tgl','$asisten','$modul','$nilai')";
$hasil=mysql_query($query);
if($hasil){
echo"<meta http-equiv='refresh' content='0; url=nilai.php'>";
}
else
{
echo"<meta http-equiv='refresh' content='0; url=nilai.php'>";
echo"Gagal";}
}
//method tampil data nilai
public function tampilNilai(){
$db = new database();
$db->dbOpen();
$result="select nilai.id_nilai,mahasiswa.nama_mhs, nilai.tgl, aslab.nama_aslab,nilai.modul,nilai.nilai from nilai,  aslab, mahasiswa where mahasiswa.id_mhs = nilai.id_mhs and  aslab.id=nilai.asisten order by id_nilai";
$sql=mysql_query($result);
while($rows=mysql_fetch_array($sql))
$data[]=$rows;
return $data;
}

public function hitungNilai($id_nilai){
$db = new database();
$db->dbOpen();
$hasil="select distinct modul from nilai where id_mhs=12 order by modul";
$sql=mysql_query($hasil);
echo "<table border='2'><tr><td>No.</td><td>NIM</td><td>Nama</td>";
$x=0;
while($modul=mysql_fetch_array($sql))
{
			$dt[] = $modul[0];
			echo "<td>$modul[0]</td>";
			$x++;
}
echo "<td>Jumlah</td><td>Rata-rata</td></tr>";

$hasil="select distinct mahasiswa.id_mhs,mahasiswa.nama_mhs from mahasiswa, nilai where asisten='1' and mahasiswa.id_mhs=nilai.id_mhs order by mahasiswa.id_mhs";
$sql=mysql_query($hasil);
$i=1;
while ($salah=mysql_fetch_array($sql))
{
	echo"<tr><td>$i</td><td>$salah[0]</td><td>$salah[1]</td>";
	$calc = 0;
	for ($t=0;$t<$x;$t++)
	{
		$query="select nilai from nilai where asisten=1 and id_mhs=$salah[0] and modul=1";
		$hitung=mysql_query($query);
		if (mysql_num_rows($hitung)!=0)
		{
			while ($isilup=mysql_fetch_array($hitung))
			{
				echo "<td>$isilup[0]</td>";
				$calc = $calc+$isilup[0];
			}
		}
		else
		{
			$b=0;
			echo "<td>$b</td>";
			$calc = $calc+$b;
		}
	}
	$i++;
	$hasil=$calc++;
	$rata=$calc/$x;
	echo "<td>";
	echo number_format($hasil,1);	
	echo "</td>";
	echo "<td>";
	echo number_format($rata,1);	
	echo "</td>";
	
echo"</tr>";	
echo"</table>";
}
}

//method baca data nilai
function bacaNilai($field,$id){
$db = new database();
$db->dbOpen();
$query=mysql_query("select * from nilai  where id_nilai='$id'");
$data=mysql_fetch_array($query);
if($field == 'id_mhs'){
return $data['id_mhs'];
}elseif($field == 'id_matkul'){
return $data['id_matkul'];
}elseif($field == 'tgl'){
return $data['tgl'];
}elseif($field == 'asisten'){
return $data['asisten'];
}elseif($field == 'nilai'){
return $data['nilai'];
}
}
//method untuk update data nilai
public function updateNilai($id,$id_mhs,$id_matkul,$tgl,$asisten,$nilai){
$db = new database();
$db->dbOpen();
$query=mysql_query("update nilai set nilai='$nilai' where id_nilai='$id'");
echo"<meta http-equiv='refresh' content='0; url=nilai.php'>";
}

//methode untuk hapus data nilai
public function hapusNilai($id){
$db = new database();
$db->dbOpen();
$query=mysql_query("delete from nilai where id_nilai='$id'");
if($query){
echo"<meta http-equiv='refresh' content='0; url=nilai.php'>";
}
}

}

class jadwal extends Controler
 {
//method tambah data nilai
public function tambahJadwal($idj,$shift,$hari,$id_aslab,$jumlah){
$db = new database();
$db->dbOpen();
$query="insert into jadwal (idj,shift,hari,id_aslab,jumlah_mhs)values('$idj','$shift','$hari','$id_aslab','$jumlah')";
$hasil=mysql_query($query);
if($hasil){
echo"<meta http-equiv='refresh' content='0; url=jadwal.php'>";
}
}
//method tampil data nilai
public function tampilJadwal(){
$db = new database();
$db->dbOpen();
$result="select jadwal.idj,jadwal.shift,jadwal.hari,aslab.nama_aslab, jadwal.jumlah_mhs from jadwal,aslab where aslab.id=jadwal.id_aslab order by idj";
$sql=mysql_query($result);
while($rows=mysql_fetch_array($sql))
$data[]=$rows;
return $data;
}

//method baca data nilai
function bacaJadwal($field,$id){
$db = new database();
$db->dbOpen();
$query=mysql_query("select * from nilai  where id_nilai='$id'");
$data=mysql_fetch_array($query);
if($field == 'id_nilai'){
return $data['id_nilai'];
}if($field == 'id_mhs'){
return $data['id_mhs'];
}elseif($field == 'id_matkul'){
return $data['id_matkul'];
}elseif($field == 'tgl'){
return $data['tgl'];
}elseif($field == 'asisten'){
return $data['asisten'];
}elseif($field == 'nilai'){
return $data['nilai'];
}
}

//method untuk update data nilai
public function updateJadwal($id,$id_mhs,$id_matkul,$tgl,$asisten,$nilai){
$db = new database();
$db->dbOpen();
$query=mysql_query("update nilai set nim='$id',id_mhs='$id_mhs',id_matkul='$id_matkul',semester='$semester',tahun='$tahun',nilai='$nilai' where nim='$nim'");
echo"<meta http-equiv='refresh' content='0; url=nilai.php'>";
}

//methode untuk hapus data nilai
public function hapusJadwal($id){
$db = new database();
$db->dbOpen();
$query=mysql_query("delete from jadwal where idj='$id'");
if($query){
echo"<meta http-equiv='refresh' content='0; url=home-admin.php'>";
}
}

public function tampiljd($id){
$db = new database();
$db->dbOpen();
$sql = "select * from jadwal ";
$result = mysql_query($sql);
while ($data = mysql_fetch_array($result)) 
{
	echo "<option value='$data[0]'>$data[1]</option>";
}

}
}

//class aslab
class aslab{
//method tambah data aslab
function tambahAslab($id,$id_aslab,$nama,$pass,$gender,$alamat,$hp){
$db = new database();
$db->dbOpen();
$query="insert into aslab(id_aslab,nama_aslab,pass,gender,alamat,hp)values('$id_aslab','$nama','$pass','$gender','$alamat','$hp')";
$hasil=mysql_query($query);
if($hasil){
echo"<meta http-equiv='refresh' content='0; url=aslab.php'>";
}
}
//method tampil data aslab
function tampilAslab(){
$db = new database();
$db->dbOpen();
$sql=mysql_query("select * from aslab");
while($rows=mysql_fetch_array($sql))
$data[]=$rows;
return $data;
}

//method baca data aslab
function bacaAslab($field,$id){
$db = new database();
$db->dbOpen();
$query=mysql_query("select * from aslab  where id='$id'");
$data=mysql_fetch_array($query);
if($field == 'id_aslab'){
return $data['id_aslab'];
}if($field == 'nama'){
return $data['nama'];
}elseif($field == 'pass'){
return $data['pass'];
}elseif($field == 'gender'){
return $data['gender'];
}elseif($field == 'alamat'){
return $data['alamat'];
}elseif($field == 'hp'){
return $data['hp'];
}
}

//method untuk update data aslab
function updateAslab($id,$id_aslab,$nama,$pass,$gender,$alamat,$hp){
$db = new database();
$db->dbOpen();
$query=mysql_query("update aslab set id_aslab='$id_aslab',nama='$nama',pass='$pass',gender='$gender',alamat='$alamat',hp='$hp' where id='$id'");
echo"<meta http-equiv='refresh' content='0; url=aslab.php'>";
}

//methode untuk hapus data aslab
function hapusAslab($id){
$db = new database();
$db->dbOpen();
$query=mysql_query("delete from aslab where id='$id'");
if($query){
echo"<meta http-equiv='refresh' content='0; url=aslab.php'>";
}
}
}

class user 
{
function tambahUser($id,$nama,$pass,$status){
$db = new database();
$db->dbOpen();
$query="insert into user(id,nama,pass,status)values('$id','$nama','$pass','$status')";
$hasil=mysql_query($query);
if($hasil){
echo"<meta http-equiv='refresh' content='0; url=index.php'>";
}
}
//method login
public function cekUser($a,$b)
	{
		$db = new database();
		$db->dbOpen();
		$sql = "select * from user where nama='$a' and pass='$b'";
		$result = mysql_query($sql);
		if ($result)
		{
			session_start();
			while($data=mysql_fetch_array($result))
			{
				$_SESSION['id'] = $data[0];
				$_SESSION['nama'] = $data[1];
				$_SESSION['status'] = $data[3];
			}
			if ($_SESSION['status']=='admin')
			{
			header("Location:home-admin.php");
			}
			else if ($_SESSION['status']=='aslab')
			{
			header("Location:home-aslab.php");
			}
			else if ($_SESSION['status']=='user')
			{
			header("Location:index2.php");
			}
		}
		else
		{
			 header('location:login.php?error=4');
		}

		$db->dbClose();
		
	}

}
?>
