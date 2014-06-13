<!DOCTYPE html>
<script>
$("#cari").click(function()
{
	var np = $("#peminjaman").val();
	$.ajax(
	{
		method : "POST",
		url : "konfirmasi.php",
		data : "id=" + id,
		success : function(html)
		{
			$("#hasil").html(html);
		}
	});
});

$("#ya").click(function()
{
	var np = $("#ya").val();
	$.ajax(
	{
		method : "POST",
		url : "konfirmasi.php",
		data : "id=" + id + "&status=1",
		success : function(html)
		{
			$("#hasil").html(html);
		}
	});
});

$("#tidak").click(function()
{
	var np = $("#tidak").val();
	$.ajax(
	{
		method : "POST",
		url : "konfirmasiid.php",
		data : "id=" + id + "&status=0",
		success : function(html)
		{
			$("#hasil").html(html);
		}
	});
});
</script>
<?php
include 'class.php';
$db= new mahasiswa();
if(isset($_POST['id']))
{
	if (isset($_POST['id']) && isset($_POST['status']))
	{
		$np = $_POST['np'];
		$status = $_POST['status'];
		$sql="UPDATE peminjaman
		SET status='$status'
		WHERE no_peminjaman = '$np'";
		$result=pg_exec($db,$sql);
		if (($result) && ($status==1))
		{
			echo "Peminjaman dengan no $np telah disetujui.";
		}
		else
		{
			echo "Peminjaman dengan no $np ditolak.";
		}
	}
	
}
else
{
}
?>
</div>