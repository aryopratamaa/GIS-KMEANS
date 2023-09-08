<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses'] == "proses-tambah") {
		$id_lalulintas = $_POST['id_lalulintas'];
		$data = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='$id_lalulintas'");
		$a = mysqli_num_rows($data);

		if ($a > 0) {
			header("location:lakalantas-aksi?aksi=tambah&pesan=gagal");
		} else {

			$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
			while ($baris = mysqli_fetch_array($hasil)) {
				$idK = $baris['id_kriteria'];
				$idS = $_POST[$idK];

				$query1 = "INSERT INTO tbl_lakalantas(id_lalulintas, id_kriteria, nilai) 
				VALUES ('" . $id_lalulintas . "','" . $idK . "','" . $idS . "')";
				$result1 = mysqli_query($conn, $query1);
			}

			header("location:lakalantas");
		}

	} elseif ($_GET['proses'] == "proses-ubah") {
		$id_lalulintas = $_POST['id_lalulintas'];

		$query2 = "DELETE FROM tbl_lakalantas WHERE id_lalulintas='" . $_POST['id_lalulintas'] . "'";
		$result2 = mysqli_query($conn, $query2);


		$hasil = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
		while ($baris = mysqli_fetch_array($hasil)) {
			$idK = $baris['id_kriteria'];
			$idS = $_POST[$idK];

			$query1 = "INSERT INTO tbl_lakalantas(id_lalulintas, id_kriteria, nilai) 
				VALUES ('" . $id_lalulintas . "','" . $idK . "','" . $idS . "')";
			$result1 = mysqli_query($conn, $query1);
		}

		header("location:lakalantas");

	} elseif ($_GET['proses'] == "proses-hapus") {
		$id_lalulintas = $_GET['id_lalulintas'];
		mysqli_query($conn, "delete from tbl_lakalantas where id_lalulintas='$id_lalulintas'");
		header("location:lakalantas");

		mysqli_query($conn,"update tbl_lalulintas set 
		c1='0', c2='0', c3='0', cluster_lakalantas='?', ket_lakalantas='?'  where id_lalulintas='$id_lalulintas'");
		header("location:lalulintas");

	} elseif ($_GET['proses'] == "proses-cari") {
		$cari = $_POST['cari'];
		header("location:lakalantas?cari=$cari");
	}
}

?>