<?php
//membuat class databse
class database {
    // properti
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "rpl";

    // method koneksi MySQL
    function dbOpen(){

mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
mysql_select_db($this->dbDatabase);

}
}
class aslab{
//method tambah data aslab
function tambahAslab($id,$nama,$username,$pass,$gender,$alamat,$hp){
$db = new database();
$db->dbOpen();
$query="insert into aslab(id,nama,username,pass,gender,alamat,hp)values('$id','$nama','$username','$pass','$gender','$alamat','$hp')";
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
if($field == 'id'){
return $data['id'];
}if($field == 'nama'){
return $data['nama'];
}elseif($field == 'username'){
return $data['username'];
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
function updateAslab($id,$nama,$username,$pass,$gender,$alamat,$hp){
$db = new database();
$db->dbOpen();
$query=mysql_query("update aslab set id='$id',nama='$nama',username='$username',pass='$pass',gender='$gender',alamat='$alamat',hp='$hp' where id='$id'");
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

?>
