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
		    <input type="date" class="form-control" id="cari_tanggal" name="cari_tanggal">
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
			$cari_tanggal = @$_POST['cari_tanggal'];
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
			$tanggal = date('Y-m-d');
			if ($cari){
				$sql = mysql_query("select * from tb_siswa where exists (select * from tb_nilai where tb_siswa.id_siswa = tb_nilai.id_siswa and tb_nilai.id_guru = '$id_login' and tb_nilai.tanggal = '$cari_tanggal') limit $posisi, $batas")or die(mysql_error());
				$tgl = $cari_tanggal;
			}else{
				$sql = mysql_query("select * from tb_siswa where exists (select * from tb_nilai where tb_nilai.id_siswa = tb_siswa.id_siswa and tb_nilai.id_guru = '$id_login' and tb_nilai.tanggal = '$tanggal') limit $posisi, $batas")or die(mysql_error());
				$tgl = $tanggal;
			}
			$no = $posisi + 1;

			while ($data = mysql_fetch_array($sql)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['id_siswa']; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data[2]; ?></td>
				<td><?php echo $data[3]; ?></td>
				<td>
					<a href="?page=nilai&action=input&kode=<?php echo md5($data['id_siswa']) ?>&tgl=<?php echo md5($tgl) ?>">Pilih</a>
				</td>
			</tr>
			<?php
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
							echo "<a href='?page=nilai&hal=$i'> $i </a>";
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