<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses']=="proses-tambah") {
		$id_lalulintas=$_POST['id_lalulintas'];
		$nama_lalulintas=$_POST['nama_lalulintas'];
		$longitude=$_POST['longitude'];
		$latitude=$_POST['latitude'];
		
		mysqli_query($conn,"insert into tbl_lalulintas(id_lalulintas,nama_lalulintas,longitude,latitude,c1,c2,c3,cluster_lakalantas,ket_lakalantas) values('$id_lalulintas','$nama_lalulintas','$longitude','$latitude',0,0,0,'?','?')");
		header("location:lalulintas");

	}elseif ($_GET['proses']=="proses-ubah") {
		$id_lalulintas=$_POST['id_lalulintas'];
		$nama_lalulintas=$_POST['nama_lalulintas'];
		$longitude=$_POST['longitude'];
		$latitude=$_POST['latitude'];
		
		mysqli_query($conn,"update tbl_lalulintas set nama_lalulintas='$nama_lalulintas', longitude='$longitude', latitude='$latitude' where id_lalulintas='$id_lalulintas'");
		header("location:lalulintas");

	}elseif ($_GET['proses']=="proses-hapus") {
		$id_lalulintas=$_GET['id_lalulintas'];
		mysqli_query($conn,"delete from tbl_lalulintas where id_lalulintas='$id_lalulintas'");
		mysqli_query($conn,"delete from tbl_lakalantas where id_lalulintas='$id_lalulintas'");
		mysqli_query($conn,"delete from tbl_cluster_lakalantas where id_lalulintas='$id_lalulintas'");
		header("location:lalulintas");

	}elseif ($_GET['proses']=="proses-cari") {
		$cari=$_POST['cari'];
		header("location:lalulintas?cari=$cari");
	}
}

?>