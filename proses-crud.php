<?php 

include("config.php");

if (isset($_POST['addkouhai'])) {
	
	date_default_timezone_set("Asia/Bangkok");
	$datetime = date("Y-m-d h:i:s");
	$kd_date = date("my");


	$sql3 = "SELECT COUNT(tb_surat.kd_surat) AS jumlahsurat FROM tb_surat";
	$query3 = mysqli_query($db, $sql3);

	while ($count = mysqli_fetch_array($query3)) {
		$jumlahsurat = $count['jumlahsurat'] + 1;
	}

	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$prodi = $_POST['program_studi'];
	$npm_senpai = $_POST['npm_senpai'];
	
	$kd_surat = "$prodi$kd_date$jumlahsurat";


	$subject = "Added to be your Kouhai";
	$message = "$npm - $nama <br>
	Telah ditambahkan menjadi kouhai, Mohon bimbingannya.
	";

	$sql = "INSERT INTO tb_surat(kd_surat, subject, message, sent_date, sender, receiver, read_status) VALUES ('$kd_surat','$subject','$message','$datetime','admin','$npm_senpai','unread')";

	$query = mysqli_query($db,$sql);

	$sql = "INSERT INTO tb_kouhai (npm, nama, kd_prodi, npm_senpai) VALUES ('$npm', '$nama', '$prodi', '$npm_senpai')";

	$query = mysqli_query($db,$sql);

	if($query){
		header('Location: managekouhai.php?status=addsuccess');
	} else {
		header('Location: managekouhai.php?status=addfailed');
	}
} 

if (isset($_POST['adddosen'])) {
	
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$prodi = $_POST['program_studi'];
	$jabatan = $_POST['jabatan'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO tb_dosen (nik, nama, kd_prodi, jabatan) VALUES ('$nik', '$nama', '$prodi', '$jabatan')";
	$sql1 = "INSERT INTO tb_user (username, password, kd_user, type_id) VALUES ('$username', '$password', '$nik', '1')";

	$query = mysqli_query($db,$sql1);
	$query = mysqli_query($db,$sql);

	if($query){
		header('Location: manage.php?status=addsuccess');
	} else {
		header('Location: manage.php?status=addfailed');
	}
}

if (isset($_POST['addsenpai'])) {
	
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$prodi = $_POST['program_studi'];
	$semester = $_POST['semester'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "INSERT INTO tb_senpai (npm, nama, kd_prodi, semester) VALUES ('$npm', '$nama', '$prodi', '$semester')";
	$sql1 = "INSERT INTO tb_user (username, password, kd_user, type_id) VALUES ('$username', '$password', '$npm', '2')";

	$query = mysqli_query($db,$sql1);
	$query = mysqli_query($db,$sql);

	if($query){
		header('Location: managesenpai.php?status=addsuccess');
	} else {
		header('Location: managesenpai.php?status=addfailed');
	}
}


if(isset($_POST['editkouhai'])){

	$get_npm = $_GET['npm'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['program_studi'];
    $npm_senpai = $_POST['npm_senpai'];


	$sql = "UPDATE tb_kouhai SET npm = '$npm', nama = '$nama', kd_prodi = '$prodi', npm_senpai = '$npm_senpai' WHERE npm = '$get_npm'";
	$query = mysqli_query($db, $sql);

	if($query){
		header('Location: managekouhai.php?status=editsuccess');
	} else {
		header('Location: managekouhai.php?status=editfailed');
	}

} 


if(isset($_POST['editsenpai'])){

	$get_npm = $_GET['npm'];
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi = $_POST['program_studi'];
    $semester = $_POST['semester'];


	$sql = "UPDATE tb_senpai SET npm = '$npm', nama = '$nama', kd_prodi = '$prodi', semester = '$semester' WHERE npm = '$get_npm'";
	$query = mysqli_query($db, $sql);

	if($query){
		header('Location: managesenpai.php?status=editsuccess');
	} else {
		header('Location: managesenpai.php?status=editfailed');
	}

}



if(isset($_POST['editdosen'])){

	$get_nik = $_GET['nik'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $prodi = $_POST['program_studi'];
    $jabatan = $_POST['jabatan'];


	$sql = "UPDATE tb_dosen SET nik = '$nik', nama = '$nama', kd_prodi = '$prodi', jabatan = '$jabatan' WHERE nik = '$get_nik'";
	$query = mysqli_query($db, $sql);

	if($query){
		header('Location: manage.php?status=editsuccess');
	} else {
		header('Location: manage.php?status=editfailed');
	}

} 



if (isset($_POST['send'])) {

	
	session_start();

	$type_id = $_SESSION['type_id'] ;

	$id = $_SESSION['id'];



	date_default_timezone_set("Asia/Bangkok");
	$datetime = date("Y-m-d h:i:s");
	$kd_date = date("my");


	if ($type_id == 1) {
	  $sql = "SELECT kd_prodi FROM tb_dosen WHERE nik = '$id'";
	  $query = mysqli_query($db, $sql);

	  while ($kd_prodi = mysqli_fetch_array($query)) {
	    $prodi = $kd_prodi['kd_prodi'];
	  }
	}

	else if ($type_id == 2) {
	  $sql = "SELECT kd_prodi FROM tb_senpai WHERE npm = '$id'";
	  $query = mysqli_query($db, $sql);

	  while ($kd_prodi = mysqli_fetch_array($query)) {
	    $prodi = $kd_prodi['kd_prodi'];
	  }
	}


	$sql = "SELECT COUNT(tb_surat.kd_surat) AS jumlahsurat FROM tb_surat";
	$query = mysqli_query($db, $sql);

	while ($count = mysqli_fetch_array($query)) {
		$jumlahsurat = $count['jumlahsurat'] + 1;
	}


	$kd_surat = "$prodi$kd_date$jumlahsurat";


	if (isset($_POST['send'])) {
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$receiver = $_POST['receiver'];

		$sql = "INSERT INTO tb_surat(kd_surat, subject, message, sent_date, sender, receiver, read_status) VALUES ('$kd_surat','$subject','$message','$datetime','$id','$receiver','unread')";

		$query = mysqli_query($db,$sql);

		if($query){
			header('Location: sentreport.php?status=sendsuccess');
		} else {
			header('Location: sentreport.php?status=sendfailed');
		}
	} else{

	}

}



if (isset($_POST['changepass'])) {
	
	session_start();

	$type_id = $_SESSION['type_id'] ;
	$id = $_SESSION['id'];
	$oldpass = $_POST['oldpw'];
	$newpass = $_POST['newpw'];


    $sql = "SELECT password FROM tb_user WHERE kd_user = '$id'";
    $query = mysqli_query($db, $sql);

    while ($exec = mysqli_fetch_array($query)) {
	    	
	    $password = $exec['password'];

	    if ($oldpass == $password) {
	    	
			$sql1 = "UPDATE tb_user SET password = '$newpass' WHERE tb_user.kd_user = '$id'";
			$query1 = mysqli_query($db, $sql1);


			if($query1){
				header('Location: home.php?status=editsuccess');
			} else {
				header('Location: home.php?status=editfailed');
			}

	    }
	    else{
			header('Location: home.php?status=editfailed');
	    }

    }


}





if (isset($_POST['register'])) {

	date_default_timezone_set("Asia/Bangkok");
	$datetime = date("Y-m-d h:i:s");
	$kd_date = date("my");


	$sql3 = "SELECT COUNT(tb_surat.kd_surat) AS jumlahsurat FROM tb_surat";
	$query3 = mysqli_query($db, $sql3);

	while ($count = mysqli_fetch_array($query3)) {
		$jumlahsurat = $count['jumlahsurat'] + 1;
	}


	$npm = $_POST['npm'];
	$nama = $_POST['name'];
	$prodi = $_POST['program_studi'];
	
	$sql2 = "SELECT * FROM tb_prodi WHERE kd_prodi = $prodi";
	$query2 = mysqli_query($db, $sql2);
	while ($exec = mysqli_fetch_array($query2)) {
		$nama_prodi = $exec['nama_prodi'];
	}

	$email = $_POST['email'];
	$kd_surat = "$prodi$kd_date$jumlahsurat";


	$subject = "Requested to be Senpai";
	$message = "Identitas: $npm - $nama <br>
	Email: $email <br>
	Program Studi: $nama_prodi <br>
	telah mengajukan menjadi senpai.
	";

	$sql1 = "SELECT * FROM tb_dosen WHERE kd_prodi = $prodi";
	$query1 = mysqli_query($db, $sql1);
	while ($exec = mysqli_fetch_array($query1)) {
		$dosen = $exec['nik'];
	}

	$sql = "INSERT INTO tb_surat(kd_surat, subject, message, sent_date, sender, receiver, read_status) VALUES ('$kd_surat','$subject','$message','$datetime','admin','$dosen','unread')";

	$query = mysqli_query($db,$sql);

	if($query){
		header('Location: index.php?status=registersuccess');
	} else {
		header('Location: index.php?status=registerfailed');
	}
}



 ?>