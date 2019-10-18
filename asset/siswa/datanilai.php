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
				$sql = mysql_query("select * from tb_nilai where Tanggal = '$cari_tanggal' and id_siswa = '$id_login' limit $posisi, $batas")or die(mysql_error());
			}else{
				$sql = mysql_query("select * from tb_nilai where Tanggal = '$tanggal' and id_siswa = '$id_login' limit $posisi, $batas")or die(mysql_error());
			}
		?>
		<table class="table">
			<tr>
				<th width="5%">No</th>
				<th width="10%">ID Pelajaran</th>
				<th width="15%">Nama Pelajaran</th>
				<th width="10%">Nilai</th>
				<th width="20%">Keterangan</th>
				<th width="15%">Nama Guru</th>
			</tr>

			<?php
			$no = $posisi + 1;

			while ($data = mysql_fetch_array($sql)){
				$kode_pelajaran = $data['kode_pelajaran'];
				$datapel=mysql_fetch_array(mysql_query("select * from tb_pelajaran where kode_pelajaran = '$kode_pelajaran' "))or die(mysql_error());
				$id_guru = $data['id_guru'];
				$dataguru = mysql_fetch_array(mysql_query("select * from tb_guru where id_guru = '$id_guru' "))or die(mysql_error());
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data[0]; ?></td>
				<td><?php echo $datapel['nama']; ?></td>
				<td><?php echo $data[1]; ?></td>
				<td><?php echo $data['keterangan']; ?></td>
				<td><?php echo $dataguru['nama']; ?></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td colspan="6" class="text-right">
					<?php
					$jmlh = mysql_num_rows(mysql_query("select * from tb_nilai where Tanggal = '$tanggal' and id_siswa = '$id_login'"));
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