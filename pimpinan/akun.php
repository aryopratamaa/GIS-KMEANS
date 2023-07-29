<?php
if (isset($_GET['aksi'])) {
	if ($_GET['aksi']=="ubah") {
		include "../assets/conn/config.php";
		$id_akun=$_POST['id_akun'];
		$username=$_POST['username'];
		$password=$_POST['password'];

		mysql_query("update tbl_akun set username='$username', password='$password' where id_akun='$id_akun'");
		header("location:index.php");
	}
}

include "header.php";
?>



<main id="main">
	<section id="contact" class="contact">
		<div class="container" data-aos="fade-up">

			<ol class="breadcrumb" style="padding: 20px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<li><span class="fa fa-gear" style="font-size: 30px;"></span>&emsp;</li>
				<li class="breadcrumb-item" aria-current="page" style="padding-top:5px;">Akun</li>
				<li class="breadcrumb-item active" aria-current="page" style="padding-top:5px;">Ubah Akun</li>
			</ol>
			

			<div class="panel panel-container" style="padding: 50px; box-shadow: 2px 2px 10px #888888; background-color: whitesmoke;">
				<div class="bootstrap-table">

					<?php
					$username=$_SESSION['username'];
					$det=mysql_query("select * from tbl_akun where username='$username'")or die(mysql_error());
					while($d=mysql_fetch_array($det)){
						?>					
						<form action="akun.php?aksi=ubah" method="post" enctype="multipart/form-data">
							<table class="table">
								<input type="hidden" readonly class="form-control" name="id_akun" value="<?php echo $d['id_akun'] ?>">

								<tr>
									<td>Username</td>
									<td><input type="text" class="form-control" name="username" value="<?php echo $d['username'] ?>"></td>
								</tr>

								<tr>
									<td>Password</td>
									<td><input type="text" class="form-control" name="password" value="<?php echo $d['password'] ?>"></td>
								</tr>

							</table>

							<div class="text-right">
								<a href="index.php" class="btn btn-primary" type="button" data-dismiss="modal">Batal</a>
								<input type="submit" class="btn btn-success" value="Ubah">
							</div>
						</form>
						<?php 
					}
					?>
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