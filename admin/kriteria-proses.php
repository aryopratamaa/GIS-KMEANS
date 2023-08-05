<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses'] == "proses-tambah") {
		$id_kriteria = $_POST['id_kriteria'];
		$nama_kriteria = $_POST['nama_kriteria'];
		$keterangan = $_POST['keterangan'];

		mysqli_query($conn, "insert into tbl_kriteria(id_kriteria,nama_kriteria,keterangan) values('$id_kriteria','$nama_kriteria','$keterangan')");
		header("location:kriteria.php");

	} elseif ($_GET['proses'] == "proses-ubah") {
		$id_kriteria = $_POST['id_kriteria'];
		$nama_kriteria = $_POST['nama_kriteria'];
		$keterangan = $_POST['keterangan'];

		mysqli_query($conn, "update tbl_kriteria set nama_kriteria='$nama_kriteria', keterangan='$keterangan' where id_kriteria='$id_kriteria'");
		header("location:kriteria.php");

	} elseif ($_GET['proses'] == "proses-hapus") {
		$id_kriteria = $_GET['id_kriteria'];
		mysqli_query($conn, "delete from tbl_kriteria where id_kriteria='$id_kriteria'");
		header("location:kriteria.php");

	} elseif ($_GET['proses'] == "proses-cari") {
		$cari = $_POST['cari'];
		header("location:kriteria.php?cari=$cari");
	}
}

?>