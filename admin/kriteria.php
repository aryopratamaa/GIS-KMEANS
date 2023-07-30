<?php
include "header.php";
?>

<main id="main">
	<section id="contact" class="contact">
		<div class="container">

			<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-folder-o" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Kriteria</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Data Kriteria</li>
			</ol>


			<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">
					<a href="kriteria-aksi?aksi=tambah" class="btn btn-primary"><i class="fa fa-plus"></i>&emsp; Tambah Data</a>
					<br/>
					<br/>


					<?php 
					$per_hal=10;
					$jumlah_record=mysqli_query($conn,"SELECT * from tbl_kriteria");
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

					<form action="kriteria-proses?proses=proses-cari" method="post">
						<div style="padding-left: 800px;">
							<input type="text" class="form-control" placeholder="search" aria-describedby="basic-addon1" name="cari">	
						</div>
					</form>
					<br>

					<table class="table table-hover table-bordered">
						<tr style="box-shadow: 2px 2px 4px #888888;">
							<th class="text-center">No</th>
							<th class="text-center">Kriteria</th>
							<th class="text-center">Keterangan</th>
							<th class="text-center">Opsi</th>
						</tr>
						<?php 
						if(isset($_GET['cari'])){
							$cari=$_GET['cari'];
							$brg=mysqli_query($conn,"select * from tbl_kriteria where nama_kriteria like '$cari' or id_kriteria like '$cari'");
						}else{
							$brg=mysqli_query($conn,"select * from tbl_kriteria order by id_kriteria asc limit $start, $per_hal");
						}
						$no=1;
						while($b=mysqli_fetch_array($brg)){

							?>
							<tr>
								<td class="text-center"><?php echo $no++ ?></td>
								<td><?php echo $b['nama_kriteria'] ?></td>
								<td><?php echo $b['keterangan'] ?></td>

								<td class="text-center">
									<a href="kriteria-aksi?id_kriteria=<?php echo $b['id_kriteria']; ?>&aksi=ubah" class="btn btn-primary"><span class="fa fa-pencil"></span></a>
									<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='kriteria-proses?id_kriteria=<?php echo $b['id_kriteria']; ?>&proses=proses-hapus' }" class="btn btn-success"><span class="fa fa-trash"></span></a>
								</td>
							</tr>		
							<?php 
						}
						?>

					</table>
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

