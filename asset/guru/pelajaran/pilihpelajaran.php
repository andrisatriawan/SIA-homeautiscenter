<?php

$id_siswa = @$_GET['kode'];

$sql = mysql_query("select * from tb_siswa where md5(id_siswa)='$id_siswa' ")or die(mysql_error());
$data = mysql_fetch_array($sql);
$siswa = $data['id_siswa'];
?>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h4>
				<table width="300px">
					<tr>
						<td width="30%">ID Siswa</td>
						<td width="20%">: <?php echo $data['id_siswa'] ?></td>
					</tr>
					<tr>
						<td width="30%">Nama</td>
						<td width="50%">: <?php echo $data['nama'] ?></td>
					</tr>
					<tr>
						<td width="30%">Umur</td>
						<td width="50%">: <?php echo $data['umur'] ?> tahun</td>
					</tr>
					<tr>
						<td width="30%">Login</td>
						<td width="50%">: <?php echo $id_login; ?></td>
					</tr>
				</table>
			</h4>
		</div>
	</div>
</div>
<!-- <h4>
<table width="300px">
	<tr>
		<td width="30%">ID Siswa</td>
		<td width="20%">: <?php echo $data['id_siswa'] ?></td>
	</tr>
	<tr>
		<td width="30%">Nama</td>
		<td width="50%">: <?php echo $data['nama'] ?></td>
	</tr>
	<tr>
		<td width="30%">Umur</td>
		<td width="50%">: <?php echo $data['umur'] ?> tahun</td>
	</tr>
	<tr>
		<td width="30%">Login</td>
		<td width="50%">: <?php echo $id_login; ?></td>
	</tr>
</table>
</h4> -->
<br>

<div class="container keliling">
	<h2>Pelajaran yang dipilih</h2>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>No</th>
					<th>Kode Pelajaran</th>
					<th>Nama Pelajaran</th>
					<th>Pilih</th>
				</tr>
				<?php
				$tanggal = date('Y-m-d');
				$no=1;
				$batas =5;
				$hal = @$_GET['hal'];
				if (empty($hal)){
					$posisi=0;
					$hal=1;
				}else{
					$posisi = ($hal-1) * $batas;
				}
				$sqlpelajaran = mysql_query("select * from tb_pelajaran where not exists (select * from tb_nilai where tb_nilai.kode_pelajaran = tb_pelajaran.kode_pelajaran and tb_nilai.id_guru ='$id_login' and tb_nilai.id_siswa ='$siswa' and tb_nilai.tanggal = '$tanggal') limit $posisi, $batas")or die(mysql_error());
				$no = $posisi + 1;
				while ($data = mysql_fetch_array($sqlpelajaran)){
					?>

				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['kode_pelajaran']; ?></td>
					<td><?php echo $data[1] ?></td>
					<td>
						<a href="?page=pelajaran&action=tambah&siswa=<?php echo $id_siswa; ?>&guru=<?php echo md5($id_login) ?>&kode=<?php echo md5($data['kode_pelajaran']) ?>">Pilih</a>
					</td>
				</tr>
				<?php

				}

				?>
				<tr>
					<td colspan="4" class="text-right">
						<?php
						$jmlh = mysql_num_rows(mysql_query("select * from tb_pelajaran where not exists (select * from tb_nilai where tb_nilai.kode_pelajaran = tb_pelajaran.kode_pelajaran and tb_nilai.id_guru ='$id_login' and tb_nilai.id_siswa ='$siswa' and tb_nilai.tanggal = '$tanggal') "));
						$jmlh_hal = ceil($jmlh / $batas);
						echo "Halaman : ";
						for ($i=1; $i <= $jmlh_hal ; $i++) { 
							if ($i != $hal) {
								echo "<a href='?page=pelajaran&kode=".$id_siswa ."&hal=$i'> $i </a>";
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
		<div class="col-md-6">

			<!-- Tabel Terpilih -->

			<table class="table">
				<tr>
					<th>No</th>
					<th>Kode Pelajaran</th>
					<th>Nama Pelajaran</th>
					<th>Action</th>
				</tr>
				<?php

				$no_pilih=1;
				$batas_pilih =5;
				$hal_pilih = @$_GET['hal_pilih'];
				if (empty($hal_pilih)){
					$posisi_pilih=0;
					$hal_pilih=1;
				}else{
					$posisi_pilih = ($hal_pilih-1) * $batas_pilih;
				}



				$sqlpilih = mysql_query("select * from tb_pelajaran where exists (select * from tb_nilai where tb_pelajaran.kode_pelajaran = tb_nilai.kode_pelajaran and tb_nilai.id_guru ='$id_login' and tb_nilai.id_siswa ='$siswa' and tb_nilai.Tanggal = '$tanggal') limit $posisi_pilih, $batas_pilih")or die(mysql_error());
				$no_pilih= $posisi_pilih +1;
				while ($datapilih=mysql_fetch_array($sqlpilih)) {
					?>
					<tr>
						<td><?php echo $no_pilih++; ?></td>
						<td><?php echo $datapilih['kode_pelajaran']; ?></td>
						<td><?php echo $datapilih[1]; ?></td>
						<td>
							<a href="?page=pelajaran&action=hapus&siswa=<?php echo $id_siswa; ?>&guru=<?php echo md5($id_login) ?>&kode=<?php echo md5($datapilih['kode_pelajaran']) ?>">Hapus</a>
						</td>
					</tr>

					<?php
				}
				 ?>
				<tr>
					<td colspan="4" class="text-right">
						<?php
						$jmlh_pilih = mysql_num_rows(mysql_query("select * from tb_pelajaran where exists (select * from tb_nilai where tb_pelajaran.kode_pelajaran = tb_nilai.kode_pelajaran and tb_nilai.id_guru ='$id_login' and tb_nilai.id_siswa ='$siswa' and tb_nilai.Tanggal = '$tanggal')"))or die(mysql_error());
						$jmlh_hal_pilih = ceil($jmlh_pilih / $batas_pilih);
						echo "Halaman : ";
						for ($a=1;$a<=$jmlh_hal_pilih; $a++){
							if ($a != $hal_pilih){
								$j = $i-1;
								echo "<a href='?page=pelajaran&kode=".$id_siswa ."&hal=$j&hal_pilih=$a'> $a </a>";
							}else{
								echo $a;
							}
						}
						echo " dari " .$jmlh_hal_pilih;
						?>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>