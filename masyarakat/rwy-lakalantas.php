<?php
include 'header.php'
    ?>

<section id="hero-navbar">
</section>

<main id="main">
    <section id="contact" class="contact">
        <div class="container">

            <ol class="breadcrumb"
                style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
                <li><span class="fa fa-history" style="font-size: 30px;"></span>&emsp;</li>
                <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Data</li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Riwayat Pengaduan
                    Lakalantas
                </li>
            </ol>


            <div class="panel panel-container"
                style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
                <div class="bootstrap-table">

                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "berhasil") {
                            echo "<div style='margin-top:5px;' class='alert alert-primary' role='alert'><span class='fa fa-check'></span>&nbsp;Data anda berhail terkirim, terima kasih.</div>";
                        }
                    }
                    ?>


                    <?php
                    $username = $_SESSION['username'];
                    $det1 = mysqli_query($conn, "select * from tbl_akun where username='$username'");
                    $d1 = mysqli_fetch_array($det1);
                    $id_akun = $d1['id_akun'];

                    $det = mysqli_query($conn, "SELECT * from tbl_pengaduan_lakalantas a, tbl_kriteria b, tbl_lalulintas c WHERE a.id_kriteria=b.id_kriteria AND a.id_lalulintas=c.id_lalulintas AND a.id_akun='$id_akun' order by a.id_pengaduan DESC");
                    while ($d = mysqli_fetch_array($det)) { ?>


                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="img-fluid rounded-start" src="../assets/img/bg-riwayat.png" width="220"
                                        height="220px" align="center" />
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>
                                                <?php echo strtoupper($d['nama_kriteria']) ?>
                                            </b></h5>
                                        <h6 class="card-title">Tanggal pengaduan :
                                            <?php echo $d['tgl_kejadian'] ?>
                                        </h6>
                                        <h6>Kecamatan :
                                            <?php echo $d['nama_lalulintas'] ?>
                                        </h6>
                                        <h6>Alamat :
                                            <?php echo $d['alamat'] ?>
                                        </h6>

                                        <p class="card-text" align="justify"><small class="text-muted">Keterangan :
                                                <?php echo $d['ket_pengaduan'] ?>
                                            </small></p>

                                        <a href="" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $d['id_pengaduan']; ?>"
                                            class="btn btn-primary"><em class="fa fa-image"></em></a>


                                        <div align="right">
                                            <div class='small'>

                                                <?php
                                                if ($d['status'] == 'Verifikasi') { ?>
                                                    <font style="color: green;"><b>proses verifikasi</b></font> &emsp;<img
                                                        src='../assets/img/check.png'>&emsp;
                                                    valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                                                    invalid&emsp;<img src='../assets/img/circle.png'>&emsp;


                                                <?php } elseif ($d['status'] == 'Valid') { ?>
                                                    proses verifikasi&emsp;<img src='../assets/img/circle.png'>&emsp;
                                                    <font style="color: green;"><b>valid</b></font> &emsp;<img
                                                        src='../assets/img/check.png'>&emsp;
                                                    invalid&emsp;<img src='../assets/img/circle.png'>&emsp;


                                                <?php } elseif ($d['status'] == 'inValid') { ?>
                                                    proses verifikasi&emsp;<img src='../assets/img/circle.png'>&emsp;
                                                    valid&emsp;<img src='../assets/img/circle.png'>&emsp;
                                                    <font style="color: green;"><b>invalid</b></font> &emsp;<img
                                                        src='../assets/img/check.png'>&emsp;
                                                <?php } ?>


                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="modal fade" id="exampleModal<?php echo $d['id_pengaduan']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Foto Pengaduan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <?php
                                        $query = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_lakalantas WHERE id_pengaduan='$d[id_pengaduan]'");
                                        $a = mysqli_fetch_array($query);
                                        ?>

                                        <center>
                                            <img onerror="this.src='../assets/img/images-zoom.png'"
                                                src="../assets/foto/<?php echo $a['foto'] ?>"
                                                style="width:400px; height:400px;">
                                        </center>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                    ?>



                </div>
            </div>

        </div>
    </section>
</main>



<?php
include 'footer.php';
?>