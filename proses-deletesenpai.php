<?php 

include("config.php");

$npm = $_GET['npm'];
$sql = "DELETE FROM tb_senpai WHERE npm = '$npm'";
$sql1 = "DELETE FROM tb_user WHERE kd_user = '$npm'";

$query = mysqli_query($db, $sql1);
$query = mysqli_query($db, $sql);

if($query){
	//kalau berhasil alihkan ke halaman index.php dengan status = sukses
	header('Location: managesenpai.php?status=deletesuccess');
} else {
	//kalau gagal alihkan ke halaman index.php dengan status = gagal
	header('Location: managesenpai.php?status=deletefailed');
}

 ?>