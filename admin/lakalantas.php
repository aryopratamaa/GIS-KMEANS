<?php
include "header.php";
?>

<main id="main">
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-file-zip-o" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Lakalantas</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Data Lakalantas</li>
			</ol>

			<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">
					<a href="lakalantas-aksi?aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i>&emsp; Tambah Data</a>
					<br>
					<br>


					<?php 
					$per_hal=50;
					$jumlah_record=mysqli_query($conn,"SELECT COUNT(*) from tbl_lakalantas");
					$jum=mysqli_num_rows($jumlah_record);
					$halaman=ceil($jum / $per_hal);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$start = ($page - 1) * $per_hal;
					?>

					<table>
						<tr>
							<td>Jumlah Record</td>		
							<td><?php echo $jum; ?></td>
						</tr>
						<tr>
							<td>Jumlah Halaman</td>	
							<td><?php echo $halaman; ?></td>
						</tr>
					</table>

					<form action="lakalantas-proses?proses=proses-cari" method="post">
						<div style="padding-left: 800px;">
							<input type="text" class="form-control" placeholder="search" aria-describedby="basic-addon1" name="cari">	
						</div>
					</form>
					<br>

					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<tr style="box-shadow: 2px 2px 4px #888888;">
								<th class="text-center">No</th>
								<th class="text-center">Nama Kecamatan</th>

								<?php
								$query=mysqli_query($conn,"SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas'");
								while($b=mysqli_fetch_array($query)){

									echo "
									<th class='text-center'>$b[nama_kriteria]</th>";
								}
								?>

								<th class="text-center">Opsi</th>
							</tr>

							<?php 
							if(isset($_GET['cari'])){
								$cari=$_GET['cari'];
								$data=mysqli_query($conn,"SELECT * from tbl_kecamatan where nama_kecamatan like '$cari'");
							}else{
								//untuk menampilkan data alternatif
								$data=mysqli_query($conn,"SELECT * FROM tbl_kecamatan  order by id_kecamatan");
							}

							$no=1;
							while ($a=mysqli_fetch_array($data)) {
								$nomor = $no++;
								$kode= $a['id_kecamatan'];
								$nama= $a['nama_kecamatan'];
								$query = mysqli_query($conn,"SELECT * FROM tbl_lakalantas WHERE id_kecamatan='".$kode."'");
								$result = mysqli_fetch_array($query);
								if (empty($result['id_kecamatan'])) {

								}else{


									echo "<tr>
									<td class='text-center'>$nomor</td>"; 
									echo "<td>$nama</td>";

								//untuk menampilkan nilai sub berdasarkan kriteria
									$query1 = mysqli_query($conn,"SELECT nilai as sub FROM tbl_lakalantas WHERE id_kecamatan='".$kode."' ORDER BY id_kriteria ");
									while ($result1 = mysqli_fetch_array($query1)) {
										echo "<td class='text-center'>$result1[sub]</td>";
									} 

									?>


									<td class="text-center">
										<a href="lakalantas-aksi?id_kecamatan=<?php echo $a['id_kecamatan']; ?>&aksi=ubah" class="btn btn-primary"><span class="fa fa-pencil"></span></a>

										<a href="lakalantas-proses?id_kecamatan=<?php echo $a['id_kecamatan']; ?>&proses=proses-hapus" class="btn btn-success"><span class="fa fa-trash"></span></a>
									</td>
								<?php } ?>
							</tr>		
							<?php 
						}
						?>

					</table>
				</div>
				<ul class="pagination">			
					<?php 
					for($x=1;$x<=$halaman;$x++){
						?>
						<li><a href="?page=<?php echo $x ?>" class="btn btn-primary"><?php echo $x ?></a></li>
						<?php
					}
					?>						
				</ul>
			</div>
		</div>

	</div>
</section>
</main>

<?php 
include 'footer.php';
?>
