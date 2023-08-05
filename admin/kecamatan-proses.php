<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses']=="proses-tambah") {
		$id_kecamatan=$_POST['id_kecamatan'];
		$nama_kecamatan=$_POST['nama_kecamatan'];
		$longitude=$_POST['longitude'];
		$latitude=$_POST['latitude'];
		
		mysqli_query($conn,"insert into tbl_kecamatan(id_kecamatan,nama_kecamatan,longitude,latitude,c1,c2,c3,cluster_kriminalitas,ket_kriminalitas) values('$id_kecamatan','$nama_kecamatan','$longitude','$latitude',0,0,0,'?','?')");
		header("location:kecamatan");

	}elseif ($_GET['proses']=="proses-ubah") {
		$id_kecamatan=$_POST['id_kecamatan'];
		$nama_kecamatan=$_POST['nama_kecamatan'];
		$longitude=$_POST['longitude'];
		$latitude=$_POST['latitude'];
		
		mysqli_query($conn,"update tbl_kecamatan set nama_kecamatan='$nama_kecamatan', longitude='$longitude', latitude='$latitude' where id_kecamatan='$id_kecamatan'");
		header("location:kecamatan");

	}elseif ($_GET['proses']=="proses-hapus") {
		$id_kecamatan=$_GET['id_kecamatan'];
		mysqli_query($conn,"delete from tbl_kecamatan where id_kecamatan='$id_kecamatan'");
		mysqli_query($conn,"delete from tbl_kriminalitas where id_kecamatan='$id_kecamatan'");
		mysqli_query($conn,"delete from tbl_cluster_kriminalitas where id_kecamatan='$id_kecamatan'");
		header("location:kecamatan");

	}elseif ($_GET['proses']=="proses-cari") {
		$cari=$_POST['cari'];
		header("location:kecamatan?cari=$cari");
	}
}

?>