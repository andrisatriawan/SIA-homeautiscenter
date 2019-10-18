<?php

$sql=mysql_query("select * from tb_guru where id_guru = '$id_login'")or die(mysql_error());
$data=mysql_fetch_array($sql);
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 keliling">
			<div class="text-center">
				<h2>Ubah Data Guru</h2>
				<hr>
			</div>
			<form method="post" action="" class="form">
				<div class="form-group">
					<label for="id">ID Guru</label>
					<input type="text" name="id" placeholder="ID Guru" class="form-control" disabled="disabled" value="<?php echo $data['id_guru'] ?>">
				</div>
				<div class="form-group">
					<label for="nama">Nama Guru</label>
					<input type="text" name="nama" placeholder="Nama Guru" class="form-control" value="<?php echo $data['nama'] ?>">
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
					<label for="nohp">Nomor Handphone</label>
					<input type="text" name="nohp" placeholder="Nomor Handphone" class="form-control" value="<?php echo $data['no_hp'] ?>" onkeypress="return hanyaAngka(event)">
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					
					<?php
					$status = $data['status'];

					if ($status == 'Menikah'){
					 ?>
					<select class="form-control" name="status">
						<option id="">--Pilih--</option>
						<option id="Menikah" selected="selected">Menikah</option>
						<option id="Belum Menikah">Belum Menikah</option>
					</select>
					<?php
				}elseif($status == 'Belum Menikah'){
					?>
					<select class="form-control" name="status">
						<option id="">--Pilih--</option>
						<option id="Menikah">Menikah</option>
						<option id="Belum Menikah" selected="selected">Belum Menikah</option>
					</select>
					<?php
				}else{

					?>
					<select class="form-control" name="status">
						<option id="" selected="selected">--Pilih--</option>
						<option id="Menikah">Menikah</option>
						<option id="Belum Menikah">Belum Menikah</option>
					</select>
				<?php } ?>
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
$jk = @$_POST['jk'];
$alamat = @$_POST['alamat'];
$nohp = @$_POST['nohp'];
$status = @$_POST['status'];
$password = @$_POST['password'];
$edit = @$_POST['edit'];

if ($edit){
	if ($nama==""||$tlahir==""||$tgllahir==""||$jk=="--Pilih--"||$alamat==""||$nohp==""||$status=="--Pilih--"){
		?>
          <script type="text/javascript">
            alert("inputan tidak boleh kosong");
          </script>
        <?php
	}else{
		mysql_query("update tb_guru set nama='$nama', tempat_lahir='$tlahir', tgl_lahir='$tgllahir', jenis_kelamin='$jk', alamat='$alamat', no_hp='$nohp', status='$status' where id_guru = '$id_login' ") or die(mysql_error());
		?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=identitas";
        </script>
        <?php
	}
}
?>