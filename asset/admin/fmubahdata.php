<?php
$sql = mysql_query("select * from tb_admin where id = '$id_login' ")or die(mysql_error());
$data = mysql_fetch_array($sql);
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Ubah Data Diri</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="id">ID</label>
					<input type="text" name="id" class="form-control" disabled="disabled" value="<?php echo $data['id'] ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" name="nama" placeholder="Nama" class="form-control" value="<?php echo $data['nama'] ?>">
				</div>
				<div class="form-group">
					<label for="tlahir">Tempat Lahir</label>
					<input type="text" name="tlahir" placeholder="Tempat Lahir" class="form-control" value="<?php echo $data['tempat_lahir'] ?>">
				</div>
				<div class="form-group">
					<label for="tgllahir">Tanggal Lahir</label>
					<input type="date" name="tgllahir" placeholder="Tanggal Lahir" class="form-control" value="<?php echo $data['tgl_lahir'] ?>">
				</div>
				<div class="form-group">
					<label for="jk">Jenis Kelamin</label>

					<?php
					$jk = $data['jk'];

					if ($jk == 'Laki-laki'){
					 ?>
					<select class="form-control" name="jk">
						<option id="">--Pilih--</option>
						<option id="Laki-laki" selected="selected">Laki-laki</option>
						<option id="Perempuan">Perempuan</option>
					</select>
					<?php
				}elseif($jk == 'Perempuan'){
					?>
					<select class="form-control" name="jk">
						<option id="">--Pilih--</option>
						<option id="Laki-laki">Laki-laki</option>
						<option id="Perempuan" selected="selected">Perempuan</option>
					</select>
					<?php
				}else{

					?>
					<select class="form-control" name="jk">
						<option id="" selected="selected">--Pilih--</option>
						<option id="Laki-laki">Laki-laki</option>
						<option id="Perempuan">Perempuan</option>
					</select>
				<?php } ?>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
  					<textarea class="form-control" rows="2" placeholder="Alamat" name="alamat"><?php echo $data['alamat'] ?></textarea>
				</div>
				<div class="form-group">
					<label for="no_hp">No Hp</label>
					<input type="text" name="no_hp" placeholder="Nomor Handphone" class="form-control" value="<?php echo $data['no_hp'] ?>" onkeypress="return hanyaAngka(event)">
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
$tlahir = @$_POST['tlahir'];
$tgllahir =@$_POST['tgllahir'];
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$no_hp = @$_POST['no_hp'];
$ubah = @$_POST['edit'];


if($ubah){
	if ($nama == "" || $tlahir =="" || $tgllahir =="" || $jk == "--Pilih--" || $alamat == "" || $no_hp == "") {
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		mysql_query("update tb_admin set nama = '$nama', tempat_lahir = '$tlahir', tgl_lahir = '$tgllahir', jk = '$jk', alamat = '$alamat', no_hp = '$no_hp' where id = '$id_login' ")or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=identitas";
        </script>
        <?php
	}
}

?>