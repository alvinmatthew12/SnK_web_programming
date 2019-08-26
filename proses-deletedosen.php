<?php 

include("config.php");

$nik = $_GET['nik'];
$sql = "DELETE FROM tb_dosen WHERE nik = '$nik'";
$sql1 = "DELETE FROM tb_user WHERE kd_user = '$nik'";

$query = mysqli_query($db, $sql1);
$query = mysqli_query($db, $sql);

if($query){
	//kalau berhasil alihkan ke halaman index.php dengan status = sukses
	header('Location: manage.php?status=deletesuccess');
} else {
	//kalau gagal alihkan ke halaman index.php dengan status = gagal
	header('Location: manage.php?status=deletefailed');
}

 ?>