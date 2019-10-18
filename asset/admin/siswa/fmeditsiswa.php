<?php
$id = @$_GET['kode'];

$sql=mysql_query("select * from tb_siswa where md5(id_siswa) = '$id'")or die(mysql_error());
$data=mysql_fetch_array($sql);
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Ubah Data Siswa</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="id">ID Siswa</label>
					<input type="text" name="id" class="form-control" disabled="disabled" value="<?php echo $data['id_siswa'] ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama Siswa</label>
					<input type="text" name="nama" placeholder="Nama Siswa" class="form-control" value="<?php echo $data['nama'] ?>">
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
					<label for="umur">Umur</label>
					<input type="text" name="umur" placeholder="Umur" class="form-control" value="<?php echo $data['umur'] ?>" onkeypress="return hanyaAngka(event)">
				</div>
				<div class="form-group">
					<label for="jk">Jenis Kelamin</label>
					
					<?php
					$jk = $data['jenis_kelamin'];

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
					<input type="submit" name="edit" value="Ubah" class="btn btn-default">
				</div>
			</form>
		</div>
	</div>
</div>


<?php
$nama = @$_POST['nama'];
$tlahir = @$_POST['tlahir'];
$tgllahir = @$_POST['tgllahir'];
$umur = @$_POST['umur'];
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$edit = @$_POST['edit'];

if ($edit){
	if ($nama==""||$tlahir==""||$tgllahir==""||$jk==""||$alamat==""||$umur==""){
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		mysql_query("update tb_siswa set nama='$nama', tempat_lahir='$tlahir', tgl_lahir='$tgllahir', umur='$umur', jenis_kelamin='$jk', alamat='$alamat' where md5(id_siswa) = '$id' ") or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=siswa";
        </script>
        <?php
	}
}


?>