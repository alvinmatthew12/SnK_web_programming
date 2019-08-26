<?php 

include("config.php");

$kd_surat = $_GET['kd_surat'];
$sql = "DELETE FROM tb_surat WHERE kd_surat = '$kd_surat'";

$query = mysqli_query($db, $sql);

if($query){
	//kalau berhasil alihkan ke halaman index.php dengan status = sukses
	header('Location: sentreport.php?status=deletesuccess');
} else {
	//kalau gagal alihkan ke halaman index.php dengan status = gagal
	header('Location: sentreport.php?status=deletefailed');
}

 ?>