<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Tambah Data Pelajaran</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="kode">Kode Pelajaran</label>
					<input type="text" name="kode" placeholder="Kode Pelajaran" class="form-control">
				</div>
				<div class="form-group">
					<label for="nama">Nama Pelajaran</label>
					<input type="text" name="nama" placeholder="Nama Pelajaran" class="form-control">
				</div>
				<div class="form-group">
					<label for="jumlah">Jumlah Pertemuan</label>
					<input type="text" name="jumlah" placeholder="Jumlah Pertemuan" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>


<?php
$kode = @$_POST['kode'];
$nama = @$_POST['nama'];
$jumlah = @$_POST['jumlah'];
$simpan = @$_POST['simpan'];

if ($simpan){
	if ($kode==""||$nama==""||$jumlah==""){
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		$sql = mysql_query("select * from tb_pelajaran where kode_pelajaran = '$kode'")or die(mysql_error());
		$cek = mysql_num_rows($sql);
		if ($cek){
			?>
	        <script type="text/javascript">
	            alert("Kode '<?php echo $kode; ?>' sudah dipakai");
	        </script>
	        <?php
		}else{
		mysql_query("insert into tb_pelajaran values('$kode', '$nama', '$jumlah')")or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=pelajaran&action=tambah";
        </script>
        <?php
		}
	}
}
?>