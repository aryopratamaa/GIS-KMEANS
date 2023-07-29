<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="kirim") {
		include "../assets/conn/config.php";
		$id_akun=$_POST['id_akun'];
		$tgl_kejadian=$_POST['tgl_kejadian'];
		$id_kriteria=$_POST['id_kriteria'];
		$id_kecamatan=$_POST['id_kecamatan'];
		$alamat=$_POST['alamat'];
		$telepon=$_POST['telpon'];

		$foto=$_FILES['foto']['name'];
		$source=$_FILES['foto']['tmp_name'];
		$folder='../assets/foto/';

		move_uploaded_file($source, $folder.$foto);
		mysqli_query($conn,"insert into tbl_pengaduan(id_akun,foto,tgl_kejadian,id_kriteria,id_kecamatan,alamat,telepon,status) values('$id_akun','$foto','$tgl_kejadian','$id_kriteria','$id_kecamatan','$alamat','$alamat','Verifikasi')");
		header("location:pengaduan?pesan=berhasil");
	}
}

include "header.php";
?>



<main id="main">
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-image" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Data</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Pengaduan</li>
			</ol>
			

			<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">

					<div style='margin-top:1px;' class='alert alert-primary' role='alert'><span class='fa fa-info-circle'></span> &nbsp; Upload kejadian mengenai Kriminalitas dan Lakalantas, pengaduan anda sangat membantu . .</div><hr><br>

					<?php 
					if(isset($_GET['pesan'])){
						if($_GET['pesan'] == "berhasil"){
							echo "<div style='margin-top:5px;' class='alert alert-primary' role='alert'><span class='fa fa-check'></span>&nbsp;Data anda berhail terkirim, terima kasih.</div>";
						}
					}
					?>

					<?php
					$username=$_SESSION['username'];
					$det=mysqli_query($conn,"select * from tbl_akun where username='$username'");
					$d=mysqli_fetch_array($det); ?>

					<form action="pengaduan?aksi=kirim" method="post" enctype="multipart/form-data">

						<input type="hidden" readonly class="form-control" name="id_akun" value="<?php echo $d['id_akun'] ?>">

						<div class="form-group">
							<label>Foto Kejadian</label>
							<input type="file" class="form-control" name="foto" autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
							<i style="color:red; font-size:13px;">*upload foto dengan extensi jpg. png. jpeg. maximal size 10Mb</i>
						</div>
						<br>

						<div class="form-group">
							<label>Tanggal Kejadian</label>
							<input type="date" class="form-control" name="tgl_kejadian" autocomplete="off" required onsubmit="this.setCustomValidity('')"></td>
						</div>
						<br>

						<div class='form-group'>
							<label>Kejadian</label>
							<select class='form-control' name='id_kriteria' autocomplete='off'>
								<option disabled selected>Pilih</option>";
								<?php
								$b1=mysqli_query($conn,"SELECT * from tbl_kriteria order by id_kriteria asc");
								while($b=mysqli_fetch_array($b1)){
									?>

									<option value="<?php echo $b['id_kriteria'] ?>"><?php echo $b['nama_kriteria'] ?> - (<?php echo $b['keterangan'] ?>)</option>

									<?php
								}
								?>
							</select>
						</div>
						<br>

						<div class='form-group'>
							<label>Kecamatan</label>
							<select class='form-control' name='id_kecamatan' autocomplete='off'>
								<option disabled selected>Pilih</option>";
								<?php
								$b1=mysqli_query($conn,"SELECT * from tbl_kecamatan order by id_kecamatan asc");
								while($b=mysqli_fetch_array($b1)){
									?>

									<option value="<?php echo $b['id_kecamatan'] ?>"><?php echo $b['nama_kecamatan'] ?></option>

									<?php
								}
								?>
							</select>
						</div>
						<br>


						<div class="form-group">
							<label>Alamat Lengkap</label>
							<td><textarea rows='4' cols='50' class='form-control' name='alamat' type='text' required onsubmit="this.setCustomValidity('')"></textarea></td>
						</div>
						<br>

						<div class="form-group">
							<label>Telepon</label>
							<input type="telp" class="form-control" name="telepon" autocomplete="off" placeholder="+62" required onsubmit="this.setCustomValidity('')"></td>
						</div>
						<hr>

						<div class="text-right">
							<a href="index" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>
							<input type="submit" class="btn btn-success" value="Kirim">
						</div>
					</form>
					
			
			</div>
		</div>

	</div>
</section>
</main>

<br>
<br>
<br>

<?php 
include 'footer.php';
?>