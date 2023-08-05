<?php
include "header.php";
?>

<section id="hero-navbar">
</section>

<main id="main">
	<section id="contact" class="contact">
		<div class="container">

			<ol class="breadcrumb"
				style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-rocket" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Metode</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">K-MEANS CLUSTERING
					LAKALANTAS</li>
			</ol>



			<div class="panel panel-container"
				style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">

					<?php if (empty($_GET['max_iterasi'])) { ?>

						<center>
							<h3>PROSES METODE K-MEANS CLUSTERING LAKALANTAS</h3>
						</center>
						<hr>
						<br>

						<div class="modal-body">
							<form action="" method="get" enctype="multipart/form-data">

								<div class="form-group">
									<label>Iterasi</label>
									<input name="max_iterasi" type="number" min="0" max="100" class="form-control"
										placeholder="0" autocomplete="off" required onsubmit="this.setCustomValidity('')">
								</div>
								<br>

								<div class="modal-footer">
									<input type="submit" class="btn btn-primary" name="simpan" value="Proses Metode">
								</div>
							</form>
						</div>

					<?php } else { ?>

						<center>
							<h3>HASIL ANALISA METODE K-MEANS CLUSTERING LAKALANTAS</h3>
						</center>
						<hr>
						<br>

						<h5 class="modal-title">Data Jumlah Kasus Lakalantas</h5>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr style="box-shadow: 2px 2px 4px #888888;">
									<th class="text-center">No</th>
									<th class="text-center">Nama lalulintas</th>

									<?php
									$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
									$x = 1;
									while ($b = mysqli_fetch_array($query)) {
										$id_kriteria = "X<sub>" . $x++ . "</sub>";
										echo "<th class='text-center'>$id_kriteria</th>";
									}
									?>
								</tr>

								<?php
								//untuk menampilkan data alternatif
								$data = mysqli_query($conn, "SELECT * FROM tbl_lalulintas  order by id_lalulintas");
								$no = 1;
								while ($a = mysqli_fetch_array($data)) {
									$nomor = $no++;
									$kode = $a['id_lalulintas'];
									$nama = $a['nama_lalulintas'];
									echo "<tr>";
									$query = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "'");
									$result = mysqli_fetch_array($query);

									if (empty($result['id_lalulintas'])) {

									} else {

										echo "
										<td class='text-center'>$nomor</td> 
										<td>$nama</td>";

										//untuk menampilkan nilai sub berdasarkan kriteria
										$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "' ORDER BY id_kriteria ");
										while ($result1 = mysqli_fetch_array($query1)) {
											echo "<td class='text-center'>$result1[sub]</td>";
										}
									}

									?>

									</tr>
									<?php
								}
								?>

							</table>
						</div>
						<br>


						<h5 class="modal-title">Data Centroid</h5>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr style="box-shadow: 2px 2px 4px #888888;">
									<th class="text-center">No</th>
									<th class="text-center">Cluster</th>

									<?php
									$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
									$x = 1;
									while ($b = mysqli_fetch_array($query)) {
										$id_kriteria = "X<sub>" . $x++ . "</sub>";
										echo "<th class='text-center'>$id_kriteria</th>";
									}
									?>
								</tr>

								<?php
								// lalulintas yang ingin ditampilkan (id_lalulintas 3, 6, dan 9)
								$lalulintasToShow = [4, 8, 12];

								// Loop untuk menampilkan data alternatif
								$data = mysqli_query($conn, "SELECT * FROM tbl_lalulintas  WHERE id_lalulintas IN ('LS04', 'LS08', 'LS12') ORDER BY id_lalulintas");
								$no = 1;
								while ($a = mysqli_fetch_array($data)) {
									$nomor = $no++;
									$kode = $a['id_lalulintas'];
									$nama = $a['nama_lalulintas'];

									echo "<tr>
								<td class='text-center'>$nomor</td>";
									echo "<td>Cluster " . $nomor . "</td>";

									// Loop untuk menampilkan nilai sub berdasarkan kriteria
									$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_lakalantas WHERE id_lalulintas='$kode' ORDER BY id_kriteria ");
									while ($result1 = mysqli_fetch_array($query1)) {
										echo "<td class='text-center'>$result1[sub]</td>";
									}

									echo "</tr>";
								}
								?>

							</table>
						</div>
						<br>




						<h5 class="modal-title">Data Jarak Centroid</h5>
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr style="box-shadow: 2px 2px 4px #888888;">
									<th class="text-center">No</th>
									<th class="text-center">Lalulintas</th>
									<th class="text-center">C1</th>
									<th class="text-center">C2</th>
									<th class="text-center">C3</th>
									<th class="text-center">Cluster</th>
								</tr>

								<?php
								//untuk menampilkan data alternatif
								$data = mysqli_query($conn, "SELECT * FROM tbl_lalulintas  order by id_lalulintas");
								$no = 1;
								$jml_data = mysqli_num_rows($data);
								while ($a = mysqli_fetch_array($data)) {
									$sum1 = 0.0;
									$sum2 = 0.0;
									$sum3 = 0.0;
									$nomor = $no++;
									$kode = $a['id_lalulintas'];
									$nama = $a['nama_lalulintas'];
									echo "<tr>";

									$qu = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "'");
									$res = mysqli_fetch_array($qu);

									if (empty($res['id_lalulintas'])) {

									} else {

										echo "
									<td class='text-center'>$nomor</td> 
									<td>$nama</td>";
										//untuk menampilkan nilai sub berdasarkan kriteria
										$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
										while ($result = mysqli_fetch_array($query)) {

											$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "' AND id_kriteria='" . $result['id_kriteria'] . "' ORDER BY id_kriteria ");
											$result1 = mysqli_fetch_array($query1);

											$query2 = mysqli_query($conn, "SELECT nilai as nilai_sub FROM tbl_lakalantas WHERE  id_kriteria='" . $result['id_kriteria'] . "' AND id_lalulintas='LS04'");
											$result2 = mysqli_fetch_array($query2);
											$distance1 = pow(($result1['sub'] - $result2['nilai_sub']), 2);
											$sum1 += ($distance1);
											$akr1 = sqrt($sum1);

											$query3 = mysqli_query($conn, "SELECT nilai as nilai_sub FROM tbl_lakalantas WHERE  id_kriteria='" . $result['id_kriteria'] . "' AND id_lalulintas='LS08'");
											$result3 = mysqli_fetch_array($query3);
											$distance2 = pow(($result1['sub'] - $result3['nilai_sub']), 2);
											$sum2 += ($distance2);
											$akr2 = sqrt($sum2);

											$query4 = mysqli_query($conn, "SELECT nilai as nilai_sub FROM tbl_lakalantas WHERE  id_kriteria='" . $result['id_kriteria'] . "' AND id_lalulintas='LS12'");
											$result4 = mysqli_fetch_array($query4);
											$distance3 = pow(($result1['sub'] - $result4['nilai_sub']), 2);
											$sum3 += ($distance3);
											$akr3 = sqrt($sum3);
											$akr_values = array(
												'C1' => sqrt($akr1),
												'C2' => sqrt($akr2),
												'C3' => sqrt($akr3)
											);

											$nilai_terkecil = min($akr_values); // Mencari nilai terkecil dari array $akr_values
											$nama_terkecil = array_search($nilai_terkecil, $akr_values); // Mencari nama yang memiliki nilai terkecil
										}


										echo "<td class='text-center'>" . number_format($akr1, 3) . "</td>";
										echo "<td class='text-center'>" . number_format($akr2, 3) . "</td>";
										echo "<td class='text-center'>" . number_format($akr3, 3) . "</td>";
										echo "<td class='text-center'>" . $nama_terkecil . "</td>";


										// Cek apakah data dengan id_lalulintas sudah ada dalam tabel tbl_cluster
										$existing_data_query = mysqli_query($conn, "SELECT * FROM tbl_cluster_lakalantas WHERE id_lalulintas = '$kode'");
										if (mysqli_num_rows($existing_data_query) > 0) {
											// Data sudah ada, Anda bisa memutuskan apakah akan mengganti data yang sudah ada atau mengabaikannya.
											// Misalnya, Anda ingin mengganti data yang sudah ada:
											$row = mysqli_fetch_assoc($existing_data_query);
											$existing_id_cluster = $row['id_cluster'];

											// Lakukan operasi UPDATE untuk mengganti data yang sudah ada
											$query = mysqli_query($conn, "UPDATE tbl_cluster_lakalantas SET c1 = '$akr1', c2 = '$akr2', c3 = '$akr3', group_cluster = '$nama_terkecil' WHERE id_cluster = '$existing_id_cluster'");
										} else {
											// Data belum ada, lakukan operasi INSERT untuk memasukkan data baru ke dalam tabel
											$query = mysqli_query($conn, "INSERT INTO tbl_cluster_lakalantas (id_lalulintas, c1, c2, c3, group_cluster, iterasi) VALUES ('$kode','$akr1', '$akr2', '$akr3', '$nama_terkecil', '1')");
										}


									} // end cek data
									?>

									</tr>
									<?php
								}
								?>

							</table>
						</div>
						<br>
						<br>
						<br>



						<?php
						//poses iterasi
						$i = 1;
						$max_iterasi = $_GET['max_iterasi'];
						while ($i <= $max_iterasi) {
							$ii = $i + 1;
							$iii = $i - 1;
							//panggil group cluster yang muncul
							$cluster_result = mysqli_query($conn, "SELECT GROUP_CONCAT(group_cluster SEPARATOR ', ') AS cluster_lama FROM tbl_cluster_lakalantas WHERE iterasi = '$i'");

							$result = mysqli_query($conn, "SELECT GROUP_CONCAT(group_cluster SEPARATOR ', ') AS cluster_baru FROM tbl_cluster_lakalantas WHERE iterasi = '$iii'");

							if ($cluster_result) {
								$row = mysqli_fetch_assoc($cluster_result);
								$roww = mysqli_fetch_assoc($result);
								$cluster_lama = $row['cluster_lama'];
								$cluster_baru = $roww['cluster_baru'];

								//cek kesamaan clsuter
								if ($cluster_lama == $cluster_baru) {
									$ket = 'Iterasi Dihentikan';
									$break = $i;
								} else {
									$ket = 'Iterasi Dilanjutkan';
								}


								//tampilkan setiap cluster yang muncul
								if ($i == 1) {

									echo "<div style='margin-top:5px; box-shadow: 2px 2px 4px #888888;' class='alert alert-primary' role='alert'><span class='fa fa-toggle-on'></span>&nbsp; <b>Iterasi Ke-$i : <br><hr>Cluster Baru [$cluster_lama] <br>  Keterangan : $ket</b></div>";
								} else {

									echo "<div style='margin-top:5px; box-shadow: 2px 2px 4px #888888;' class='alert alert-primary' role='alert'><span class='fa fa-toggle-on'></span>&nbsp; <b>Iterasi Ke-$i : <br><hr>Cluster Baru [$cluster_lama] == Cluster Lama [$cluster_baru] <br>  Keterangan : $ket</b></div>";
								}

							} else {
								echo "Error in fetching cluster data: " . mysqli_error($conn);
							}
							?>

							<h5 class="modal-title">Data Centroid</h5>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr style="box-shadow: 2px 2px 4px #888888;">
										<th class="text-center">No</th>
										<th class="text-center">Cluster</th>
										<?php
										$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
										$x = 1;
										while ($b = mysqli_fetch_array($query)) {
											$id_kriteria = "X<sub>" . $x++ . "</sub>";
											echo "<th class='text-center'>$id_kriteria</th>";
										}
										?>
									</tr>

									<?php
									// Daftar cluster yang ingin ditampilkan
									$clusters = ['C1', 'C2', 'C3'];
									$no = 1;
									foreach ($clusters as $cluster) {
										echo "<tr>
				<td class='text-center'>" . $no++ . "</td>
				<td class='text-center'>Cluster $cluster</td>";

										// Loop untuk menampilkan nilai sub berdasarkan kriteria dan hasil SUM per cluster
										$query1 = mysqli_query($conn, "SELECT n.id_kriteria, AVG(n.nilai) AS total_nilai 
					FROM tbl_lakalantas n, tbl_cluster_lakalantas k WHERE n.id_lalulintas = k.id_lalulintas AND
					k.group_cluster= '$cluster' AND k.iterasi='$i' GROUP BY n.id_kriteria ORDER BY n.id_kriteria");
										while ($result1 = mysqli_fetch_array($query1)) {
											echo "<td class='text-center'>" . round($result1['total_nilai'], 1) . "</td>";
										}

										echo "</tr>";
									}
									?>

								</table>
							</div>
							<br>


							<h5 class="modal-title">Data Jarak Centroid</h5>
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr style="box-shadow: 2px 2px 4px #888888;">
										<th class="text-center">No</th>
										<th class="text-center">Lalulintas</th>
										<th class="text-center">C1</th>
										<th class="text-center">C2</th>
										<th class="text-center">C3</th>
										<th class="text-center">Cluster</th>
									</tr>

									<?php
									//untuk menampilkan data alternatif
									$data = mysqli_query($conn, "SELECT * FROM tbl_lalulintas  order by id_lalulintas");
									$no = 1;
									while ($a = mysqli_fetch_array($data)) {
										$sum1 = 0.0;
										$sum2 = 0.0;
										$sum3 = 0.0;
										$nomor = $no++;
										$kode = $a['id_lalulintas'];
										$nama = $a['nama_lalulintas'];
										echo "<tr>";

										$qu = mysqli_query($conn, "SELECT * FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "'");
										$res = mysqli_fetch_array($qu);

										if (empty($res['id_lalulintas'])) {

										} else {

											echo "
					<td class='text-center'>$nomor</td>";
											echo "<td>$nama</td>";
											//untuk menampilkan nilai sub berdasarkan kriteria
											$query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE keterangan='lakalantas' ORDER BY id_kriteria");
											while ($result = mysqli_fetch_array($query)) {

												$query1 = mysqli_query($conn, "SELECT nilai as sub FROM tbl_lakalantas WHERE id_lalulintas='" . $kode . "' AND id_kriteria='" . $result['id_kriteria'] . "' ORDER BY id_kriteria ");
												$result1 = mysqli_fetch_array($query1);

												$query2 = mysqli_query($conn, "SELECT n.id_kriteria, AVG(n.nilai) AS nilai_sub 
							FROM tbl_lakalantas n, tbl_cluster_lakalantas k WHERE n.id_lalulintas = k.id_lalulintas AND n.id_kriteria='" . $result['id_kriteria'] . "' AND k.group_cluster = 'C1' AND iterasi='$i' GROUP BY n.id_kriteria ORDER BY n.id_kriteria");
												$result2 = mysqli_fetch_array($query2);
												$distance1 = pow(($result1['sub'] - $result2['nilai_sub']), 2);
												$sum1 += ($distance1);
												$akr1 = sqrt($sum1);

												$query3 = mysqli_query($conn, "SELECT n.id_kriteria, AVG(n.nilai) AS nilai_sub 
							FROM tbl_lakalantas n, tbl_cluster_lakalantas k WHERE n.id_lalulintas = k.id_lalulintas AND n.id_kriteria='" . $result['id_kriteria'] . "' AND k.group_cluster = 'C2' AND iterasi='$i' GROUP BY n.id_kriteria ORDER BY n.id_kriteria");
												$result3 = mysqli_fetch_array($query3);
												$distance2 = pow(($result1['sub'] - $result3['nilai_sub']), 2);
												$sum2 += ($distance2);
												$akr2 = sqrt($sum2);

												$query4 = mysqli_query($conn, "SELECT n.id_kriteria, AVG(n.nilai) AS nilai_sub 
							FROM tbl_lakalantas n, tbl_cluster_lakalantas k WHERE n.id_lalulintas = k.id_lalulintas AND n.id_kriteria='" . $result['id_kriteria'] . "' AND k.group_cluster = 'C3' AND iterasi='$i' GROUP BY n.id_kriteria ORDER BY n.id_kriteria");
												$result4 = mysqli_fetch_array($query4);
												$distance3 = pow(($result1['sub'] - $result4['nilai_sub']), 2);
												$sum3 += ($distance3);
												$akr3 = sqrt($sum3);
												$akr_values = array(
													'C1' => sqrt($akr1),
													'C2' => sqrt($akr2),
													'C3' => sqrt($akr3)
												);

												$nilai_terkecil = min($akr_values); // Mencari nilai terkecil dari array $akr_values
												$nama_terkecil = array_search($nilai_terkecil, $akr_values); // Mencari nama yang memiliki nilai terkecil
											}
											echo "<td class='text-center'>" . number_format($akr1, 3) . "</td>";
											echo "<td class='text-center'>" . number_format($akr2, 3) . "</td>";
											echo "<td class='text-center'>" . number_format($akr3, 3) . "</td>";
											echo "<td class='text-center'>" . $nama_terkecil . "</td>";
											//ambil setiap cluster yang muncul
											mysqli_query($conn, "UPDATE tbl_lalulintas SET c1='$akr1', c2='$akr2', c3='$akr3', cluster_lakalantas = '$nama_terkecil' WHERE id_lalulintas = '$kode'");

											// Cek apakah data dengan id_lalulintas sudah ada dalam tabel tbl_cluster
											$existing_data_query = mysqli_query($conn, "SELECT * FROM tbl_cluster_lakalantas WHERE id_lalulintas = '$kode' AND iterasi='$ii'");
											if (mysqli_num_rows($existing_data_query) > 0) {
												// Data sudah ada, Anda bisa memutuskan apakah akan mengganti data yang sudah ada atau mengabaikannya.
												// Misalnya, Anda ingin mengganti data yang sudah ada:
												$row = mysqli_fetch_assoc($existing_data_query);
												$existing_id_cluster = $row['id_cluster'];

												// Lakukan operasi UPDATE untuk mengganti data yang sudah ada
												$query = mysqli_query($conn, "UPDATE tbl_cluster_lakalantas SET c1 = '$akr1', c2 = '$akr2', c3 = '$akr3', group_cluster = '$nama_terkecil' WHERE id_cluster = '$existing_id_cluster'");
											} else {
												// Data belum ada, lakukan operasi INSERT untuk memasukkan data baru ke dalam tabel
												$query = mysqli_query($conn, "INSERT INTO tbl_cluster_lakalantas (id_lalulintas, c1, c2, c3, group_cluster, iterasi) VALUES ('$kode','$akr1', '$akr2', '$akr3', '$nama_terkecil', '$ii')");
											}


											//penentuan keterangan
											if ($a['cluster_lakalantas'] == 'C1') {
												$keterangan = 'Cukup Rawan';
											} elseif ($a['cluster_lakalantas'] == 'C2') {
												$keterangan = 'Rawan';
											} elseif ($a['cluster_lakalantas'] == 'C3') {
												$keterangan = 'Sangat Rawan';
											}

											//ambil setiap keterangan cluster yang muncul
											mysqli_query($conn, "UPDATE tbl_lalulintas SET ket_lakalantas= '$keterangan' WHERE id_lalulintas = '$kode'");

										} //end cek data
										?>

										</tr>
										<?php
									}
									?>

								</table>
							</div>
							<br>
							<hr>
							<br>

							<?php
							// Tambahkan kondisi tertentu
							if ($i == $break) {
								break; //iterasi dihentikan
							}

							$i++;
						}

						?>






					<?php } //end cek jumlah max iterasi ?>

				</div>
			</div>




		</div>
	</section>
</main>

<?php
include 'footer.php';
?>