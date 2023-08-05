<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses'] == "proses-tambah") {
		$nama_lengkap = $_POST['nama_lengkap'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['level'];

		mysqli_query($conn, "insert into tbl_akun(nama_lengkap,username,password,level) values('$nama_lengkap','$username','$password','$level')");
		header("location:pengguna");

	} elseif ($_GET['proses'] == "proses-ubah") {
		$id_akun = $_POST['id_akun'];
		$nama_lengkap = $_POST['nama_lengkap'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$level = $_POST['level'];

		mysqli_query($conn, "update tbl_akun set nama_lengkap='$nama_lengkap', username='$username', password='$password', level='$level' where id_akun='$id_akun'");
		header("location:pengguna");

	} elseif ($_GET['proses'] == "proses-hapus") {
		$id_akun = $_GET['id_akun'];
		mysqli_query($conn, "delete from tbl_akun where id_akun='$id_akun'");
		header("location:pengguna");

	} elseif ($_GET['proses'] == "proses-cari") {
		$cari = $_POST['cari'];
		header("location:pengguna?cari=$cari");
	}
}

?>