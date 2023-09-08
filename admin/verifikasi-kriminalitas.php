<?php
if (isset($_GET['aksi'])) {
    include "../assets/conn/config.php";
    if ($_GET['aksi'] == "verifikasi") {
        $id_pengaduan = $_POST['id_pengaduan'];
        $status = $_POST['status'];
        mysqli_query($conn, "update tbl_pengaduan_kriminalitas set status='$status' where id_pengaduan='$id_pengaduan'");

        //bikin keputusan berdasarkan status
        if ($status == 'Valid') {
            //panggil data pengaduan
            $data = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_kriminalitas WHERE id_pengaduan='$id_pengaduan'");
            $a = mysqli_fetch_array($data);
            $id_kecamatan = $a['id_kecamatan'];
            $id_kriteria = $a['id_kriteria'];

            //panggil data kriteria untuk menentukan lakalantasa atau kriminalitas
            $query = mysqli_query($conn, "SELECT * FROM tbl_kriteria WHERE id_kriteria='$id_kriteria'");
            $b = mysqli_fetch_array($query);
            $keterangan = $b['keterangan'];

            //buat penentuan
            if ($keterangan == 'Kriminalitas') {
                //panggil data kriminalitas
                $query1 = mysqli_query($conn, "SELECT * FROM tbl_kriminalitas WHERE id_kriteria='$id_kriteria' AND id_kecamatan='$id_kecamatan'");
                $c = mysqli_fetch_array($query1);
                $row_kriminalitas = mysqli_num_rows($query1);
                $n_kriminalitas = $c['nilai'] + 1;

                //cek row kriminalitas
                if ($row_kriminalitas <= 0) {
                    mysqli_query($conn, "insert into tbl_kriminalitas(id_kecamatan,id_kriteria,nilai) values('$id_kecamatan','$id_kriteria','$n_kriminalitas')");
                } else {
                    mysqli_query($conn, "UPDATE tbl_kriminalitas set nilai='$n_kriminalitas' WHERE id_kriteria='$id_kriteria' AND id_kecamatan='$id_kecamatan'");
                } //keputusan cek row

            }

        } else {

        } //end keputusan status
        header("location:verifikasi-kriminalitas");

    } elseif ($_GET['aksi'] == "hapus") {
        $id_pengaduan = $_GET['id_pengaduan'];
        $pilih = mysqli_query($conn, "select * from tbl_pengaduan_kriminalitas where id_pengaduan='$id_pengaduan'");
        $data = mysqli_fetch_array($pilih);
        $foto = $data['foto'];
        unlink('../assets/foto/' . $foto);
        mysqli_query($conn, "delete from tbl_pengaduan_kriminalitas where id_pengaduan='$id_pengaduan'");
        header("location:verifikasi-kriminalitas");
    }
}

include "header.php";
?>

<section id="hero-navbar">
</section>

<main id="main">
    <section id="contact" class="contact">
        <div class="container">

            <ol class="breadcrumb"
                style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
                <li><span class="fa fa-check-square-o" style="font-size: 30px;"></span>&emsp;</li>
                <li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Verifikasi</li>
                <li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Data Verifikasi
                    Kriminalitas</li>
            </ol>

            <div class="panel panel-container"
                style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
                <div class="bootstrap-table">


                    <?php
                    $per_hal = 10;
                    $jumlah_record = mysqli_query($conn, "SELECT * from tbl_pengaduan_kriminalitas");
                    $jum = mysqli_num_rows($jumlah_record);
                    $halaman = ceil($jum / $per_hal);
                    $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
                    $start = ($page - 1) * $per_hal;
                    ?>

                    <table>
                        <tr>
                            <td>Jumlah Record</td>
                            <td>
                                <?php echo $jum; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Halaman</td>
                            <td>
                                <?php echo $halaman; ?>
                            </td>
                        </tr>
                    </table>

                    <form action="" method="get">
                        <div style="padding-left: 800px;">
                            <input type="text" class="form-control" placeholder="search" aria-describedby="basic-addon1"
                                name="cari">
                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr style="box-shadow: 2px 2px 4px #888888;">
                                <th class="text-center">No</th>
                                <th class="text-center">Masyarakat</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Kejadian</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Opsi</th>
                            </tr>

                            <?php
                            if (isset($_GET['cari'])) {
                                $cari = $_GET['cari'];
                                $brg = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_kriminalitas a, tbl_akun b, tbl_kriteria c, tbl_kecamatan d where a.id_akun=b.id_akun AND a.id_kriteria=c.id_kriteria AND a.id_kecamatan=d.id_kecamatan AND c.nama_kriteria like '$cari'");
                            } else {
                                $brg = mysqli_query($conn, "SELECT * FROM tbl_pengaduan_kriminalitas a, tbl_akun b, tbl_kriteria c, tbl_kecamatan d where a.id_akun=b.id_akun AND a.id_kriteria=c.id_kriteria AND a.id_kecamatan=d.id_kecamatan ORDER BY a.id_pengaduan asc limit $start, $per_hal");
                            }
                            $no = 1;
                            while ($b = mysqli_fetch_array($brg)) {

                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $no++ ?>
                                    </td>
                                    <td>
                                        <?php echo $b['nama_lengkap'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $b['tgl_kejadian'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $b['nama_kriteria'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $b['status'] ?>
                                    </td>


                                    <td class="text-center">
                                        <a href="verifikasi-kriminalitas-det?id_pengaduan=<?php echo $b['id_pengaduan']; ?>"
                                            class="btn btn-dark"><span class="fa fa-eye"></span></a>

                                        <?php if ($b['status'] == 'Valid') {
                                        } else { ?>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal<?php echo $b['id_pengaduan']; ?>"
                                                class="btn btn-primary"><span class="fa fa-check"></span></a>
                                        <?php } ?>

                                        <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='verifikasi-kriminalitas?id_pengaduan=<?php echo $b['id_pengaduan']; ?>&aksi=hapus' }"
                                            class="btn btn-success"><span class="fa fa-trash"></span></a>
                                    </td>
                                </tr>




                                <div class="modal fade" id="exampleModal<?php echo $b['id_pengaduan']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="verifikasi-kriminalitas?aksi=verifikasi" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body p-4">
                                                    <input type="hidden" name="id_pengaduan"
                                                        value="<?php echo $b['id_pengaduan'] ?>">

                                                    <div class="form-group">
                                                        <label>Status Pengaduan</label>
                                                        <select name="status" type="text" class="form-control">
                                                            <option selected disabled>Pilih</option>
                                                            <option>Valid</option>
                                                            <option>inValid</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Verifikasi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>



                                <?php
                            }
                            ?>

                        </table>
                    </div>
                    <ul class="pagination">
                        <?php
                        for ($x = 1; $x <= $halaman; $x++) {
                            ?>
                            <li><a href="?page=<?php echo $x ?>" class="btn btn-primary"><?php echo $x ?></a></li>&nbsp;
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