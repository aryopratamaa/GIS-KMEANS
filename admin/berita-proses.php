<?php
include '../assets/conn/config.php';
if (isset($_GET['proses'])) {
	if ($_GET['proses']=="proses-tambah") {
		$judul=$_POST['judul'];
		$tgl_berita=$_POST['tgl_berita'];
		$keterangan=$_POST['keterangan'];

		$foto=$_FILES['foto']['name'];
		$source=$_FILES['foto']['tmp_name'];
		$folder='../assets/foto/';

		move_uploaded_file($source, $folder.$foto);
		mysqli_query($conn,"insert into tbl_berita(judul,tgl_berita,foto,keterangan) values('$judul','$tgl_berita','$foto','$keterangan')");
		header("location:berita");

	}elseif ($_GET['proses']=="proses-ubah") {
		$id_berita=$_POST['id_berita'];
		$judul=$_POST['judul'];
		$tgl_berita=$_POST['tgl_berita'];
		$keterangan=$_POST['keterangan'];

		$foto=$_FILES['foto']['name'];
		$u=mysqli_query($conn,"SELECT * from tbl_berita where id_berita='$id_berita'");
		$us=mysqli_fetch_array($u);

		if (empty($foto)) {
			mysqli_query($conn,"update tbl_berita set judul='$judul', tgl_berita='$tgl_berita', keterangan='$keterangan' where id_berita='$id_berita'");
			header("location:berita");
		}else{

			unlink("../assets/foto/".$us['foto']);
			move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/foto/".$_FILES['foto']['name']);
			mysqli_query($conn,"update tbl_berita set judul='$judul', tgl_berita='$tgl_berita', foto='$foto', keterangan='$keterangan' where id_berita='$id_berita'");
			header("location:berita");
		}

	}elseif ($_GET['proses']=="proses-hapus") {
		$id_berita=$_GET['id_berita'];
		$pilih = mysqli_query($conn,"select * from tbl_berita where id_berita='$id_berita'");
		$data = mysqli_fetch_array($pilih);
		$foto = $data['foto'];
		unlink('../assets/foto/'.$foto);
		mysqli_query($conn,"delete from tbl_berita where id_berita='$id_berita'");
		header("location:berita");

	}elseif ($_GET['proses']=="proses-cari") {
		$cari=$_POST['cari'];
		header("location:beritas?cari=$cari");
	}
}

?>