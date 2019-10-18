<?php

?>
<div class="row">
	<div class="col-md-8 col-md-offset-2 keliling">
		<div class="text-center">
			<h2>Pilih Siswa</h2>
			<hr>
		</div>
		<form class="form-inline" action="" method="post">
		  <div class="form-group">
		    <input type="text" class="form-control" id="cari_nama" placeholder="Cari Nama" name="cari_nama">
		  </div>
		  <input type="submit" name="cari" value="Cari" class="btn btn-default">
		  <input type="submit" name="reset" value="Reset" class="btn btn-default">
		</form>
		<br>
		<table class="table">
			<tr>
				<th width="5%">No</th>
				<th width="10%">ID Siswa</th>
				<th width="25%">Nama Siswa</th>
				<th width="35%">Alamat</th>
				<th width="15%">Umur</th>
				<th width="10%">Pilih</th>
			</tr>

			<?php
			$cari_nama = @$_POST['cari_nama'];
			$cari = @$_POST['cari'];
			$no=1;
			$batas =5;
			$hal = @$_GET['hal'];
			if (empty($hal)){
				$posisi=0;
				$hal=1;
			}else{
				$posisi = ($hal-1) * $batas;
			}
			if ($cari){
				$sql = mysql_query("select * from tb_siswa where nama like '%$cari_nama%' limit $posisi, $batas")or die(mysql_error());
			}else{
				$sql = mysql_query("select * from tb_siswa limit $posisi, $batas")or die(mysql_error());
			}
			$no = $posisi + 1;

			while ($data = mysql_fetch_array($sql)){
				$idsiswa = $data['id_siswa'];
				$tanggal = date('Y-m-d');
				$carinilai = mysql_query("select * from tb_nilai where id_siswa = '$idsiswa' and Tanggal = '$tanggal' and id_guru <> '$id_login'")or die(mysql_error());
				$datanilai=mysql_num_rows($carinilai);
				if ($datanilai==0){

			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_siswa']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['umur']; ?></td>
				<td>
					<a href="?page=pelajaran&kode=<?php echo md5($data['id_siswa']) ?>">Pilih</a>
				</td>
			</tr>
			<?php
			}else{
				?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_siswa']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['umur']; ?></td>
				<td>
					<p>Pilih</p>
				</td>
			</tr>
			<?php
			}
		}
			?>
			<tr>
				<td colspan="6" class="text-right">
					<?php
					$jmlh = mysql_num_rows(mysql_query("select * from tb_siswa"));
					$jmlh_hal = ceil($jmlh / $batas);
					echo "Halaman : ";
					for ($i=1; $i <= $jmlh_hal ; $i++) { 
						if ($i != $hal) {
							echo "<a href='?page=siswa&hal=$i'> $i </a>";
						}else{
							echo " $i ";
						}
					}
					echo "dari " .$jmlh_hal;
					?>
				</td>
			</tr>
		</table>
	</div>
</div>