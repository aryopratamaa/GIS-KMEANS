<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses'] == "proses-tambah") {
		$id_kecamatan = $_POST['id_kecamatan'];
		$data = mysqli_query($conn, "SELECT * FROM tbl_kriminalitas WHERE id_kecamatan='$id_kecamatan'");
		$a = mysqli_num_rows($data);

		if ($a > 0) {
			header("location:kriminalitas-aksi?aksi=tambah&pesan=gagal");
		} else {

			$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='kriminalitas' ORDER BY id_kriteria");
			while ($baris = mysqli_fetch_array($hasil)) {
				$idK = $baris['id_kriteria'];
				$idS = $_POST[$idK];

				$query1 = "INSERT INTO tbl_kriminalitas(id_kecamatan, id_kriteria, nilai) 
				VALUES ('" . $id_kecamatan . "','" . $idK . "','" . $idS . "')";
				$result1 = mysqli_query($conn, $query1);
			}

			header("location:kriminalitas");
		}

	} elseif ($_GET['proses'] == "proses-ubah") {
		$id_kecamatan = $_POST['id_kecamatan'];

		$query2 = "DELETE FROM tbl_kriminalitas WHERE id_kecamatan='" . $_POST['id_kecamatan'] . "'";
		$result2 = mysqli_query($conn, $query2);


		$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='kriminalitas' ORDER BY id_kriteria");
		while ($baris = mysqli_fetch_array($hasil)) {
			$idK = $baris['id_kriteria'];
			$idS = $_POST[$idK];

			$query1 = "INSERT INTO tbl_kriminalitas(id_kecamatan, id_kriteria, nilai) 
				VALUES ('" . $id_kecamatan . "','" . $idK . "','" . $idS . "')";
			$result1 = mysqli_query($conn, $query1);
		}

		header("location:kriminalitas");

	} elseif ($_GET['proses'] == "proses-hapus") {
		$id_kecamatan = $_GET['id_kecamatan'];
		mysqli_query($conn, "delete from tbl_kriminalitas where id_kecamatan='$id_kecamatan'");

		mysqli_query($conn, "delete from tbl_cluster_kriminalitas where id_kecamatan='$id_kecamatan'");

		mysqli_query($conn, "update tbl_kecamatan set 
		c1='0', c2='0', c3='0', cluster_kriminalitas='?', ket_kriminalitas='?'  where id_kecamatan='$id_kecamatan'");
		header("location:kecamatan");

		header("location:kriminalitas");

	} elseif ($_GET['proses'] == "proses-cari") {
		$cari = $_POST['cari'];
		header("location:kriminalitas?cari=$cari");
	}
}

?>