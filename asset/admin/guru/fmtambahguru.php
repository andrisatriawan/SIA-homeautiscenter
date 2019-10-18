<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Tambah Data Guru</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="id">ID Guru</label>
					<input type="text" name="id" placeholder="ID Guru" class="form-control">
				</div>
				<div class="form-group">
					<label for="nama">Nama Guru</label>
					<input type="text" name="nama" placeholder="Nama Guru" class="form-control">
				</div>
				<div class="form-group">
					<label for="tlahir">Tempat Lahir</label>
					<input type="text" name="tlahir" placeholder="Tempat Lahir" class="form-control">
				</div>
				<div class="form-group">
					<label for="tgllahir">Tanggal Lahir</label>
					<input type="date" name="tgllahir" placeholder="Tanggal Lahir" class="form-control">
				</div>
				<div class="form-group">
					<label for="jk">Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option id="">--Pilih--</option>
						<option id="Laki-laki">Laki-laki</option>
						<option id="Perempuan">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
  					<textarea class="form-control" rows="2" placeholder="Alamat" name="alamat"></textarea>
				</div>
				<div class="form-group">
					<label for="nohp">Nomor Handphone</label>
					<input type="text" name="nohp" placeholder="Nomor Handphone" class="form-control" onkeypress="return hanyaAngka(event)">
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<select class="form-control" name="status">
						<option id="">--Pilih--</option>
						<option id="Menikah">Menikah</option>
						<option id="Belum Menikah">Belum Menikah</option>
					</select>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" placeholder="Password" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>


<?php
$id = @$_POST['id'];
$nama = @$_POST['nama'];
$tlahir = @$_POST['tlahir'];
$tgllahir = @$_POST['tgllahir'];
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$nohp = @$_POST['nohp'];
$status = @$_POST['status'];
$password = @$_POST['password'];
$simpan = @$_POST['simpan'];

if ($simpan){
	if ($id==""||$nama==""||$tlahir==""||$tgllahir==""||$jk==""||$alamat==""||$nohp==""||$status==""){
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		$sql = mysql_query("select * from tb_user where id = '$id'")or die(mysql_error());
		$cek = mysql_num_rows($sql);
		if ($cek){
			?>
	        <script type="text/javascript">
	            alert("Id <?php echo $id; ?> sudah dipakai");
	        </script>
	        <?php
		}else{
		mysql_query("insert into tb_guru values('$id', '$nama', '$tlahir', '$tgllahir', '$jk', '$alamat', '$nohp', '$status')")or die(mysql_error());
		mysql_query("insert into tb_user values('$id', md5('$password'), 'Guru')")or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=guru&action=tambah";
        </script>
        <?php
		}
	}
}


?>