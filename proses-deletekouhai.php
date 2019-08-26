<?php 

include("config.php");

$npm = $_GET['npm'];
$sql = "DELETE FROM tb_kouhai WHERE npm = '$npm'";

$query = mysqli_query($db, $sql);

if($query){
	//kalau berhasil alihkan ke halaman index.php dengan status = sukses
	header('Location: managekouhai.php?status=deletesuccess');
} else {
	//kalau gagal alihkan ke halaman index.php dengan status = gagal
	header('Location: managekouhai.php?status=deletefailed');
}

 ?>