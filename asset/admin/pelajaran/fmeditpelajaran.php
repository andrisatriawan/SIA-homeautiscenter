<?php
$kode = @$_GET['kode'];

$sql=mysql_query("select * from tb_pelajaran where md5(kode_pelajaran) = '$kode'")or die(mysql_error());
$data=mysql_fetch_array($sql);
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Ubah Data Pelajaran</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="kode">Kode Pelajaran</label>
					<input type="text" name="kode" class="form-control" disabled="disabled" value="<?php echo $data['kode_pelajaran'] ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama Pelajaran</label>
					<input type="text" name="nama" placeholder="Nama Pelajaran" class="form-control" value="<?php echo $data['nama'] ?>">
				</div>
				<div class="form-group">
					<label for="jumlah">Jumlah Pertemuan</label>
					<input type="text" name="jumlah" placeholder="Jumlah Pertemuan" class="form-control" value="<?php echo $data['jumlh_pertemuan'] ?>">
				</div>
				<div class="form-group">
					<input type="submit" name="edit" value="Ubah" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>


<?php
$nama = @$_POST['nama'];
$jumlah = @$_POST['jumlah'];
$edit = @$_POST['edit'];

if ($edit){
	if ($nama==""||$jumlah==""){
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		mysql_query("update tb_pelajaran set nama='$nama', jumlh_pertemuan='$jumlah' where md5(kode_pelajaran) = '$kode' ") or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=pelajaran";
        </script>
        <?php
	}
}


?>