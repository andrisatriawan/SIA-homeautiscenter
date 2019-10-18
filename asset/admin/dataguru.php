<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 keliling">
			<div class="text-center">
				<h2>Data Guru</h2>
				<hr>
			</div>
			<table class="table">
				<tr>
					<th width="5%">No</th>
					<th width="10%">ID</th>
					<th width="25%">Nama Guru</th>
					<th width="35%">Alamat</th>
					<th width="15%">No. Hp</th>
					<th width="10%">Action</th>
				</tr>

				<?php
				$no=1;
				$batas =5;
				$hal = @$_GET['hal'];
				if (empty($hal)){
					$posisi=0;
					$hal=1;
				}else{
					$posisi = ($hal-1) * $batas;
				}
				$sql=mysql_query("select * from tb_guru limit $posisi, $batas")or die(mysql_error());
				$no = $posisi + 1;
				while ($data = mysql_fetch_array($sql)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['id_guru'] ?></td>
					<td><?php echo $data['nama'] ?></td>
					<td><?php echo $data['alamat'] ?></td>
					<td><?php echo $data['no_hp'] ?></td>
					<td>
						<a class="glyphicon glyphicon-pencil" href="?page=guru&action=edit&kode=<?php echo md5($data['id_guru']) ?>" style="padding-right: 10px"></a>
						<a onclick="return confirm('Apakah anda ingin menghapus <?php echo $data['nama'] ?>?')" class="glyphicon glyphicon-trash" href="?page=guru&action=hapus&kode=<?php echo md5($data['id_guru']) ?>"></a>
					</td>
				</tr>
				<?php
				}
				?>

				<tr>
					<td colspan="4"><a href="?page=guru&action=tambah"><i class="glyphicon glyphicon-plus"></i> Tambah</a></td>
					<td colspan="2" class="text-right">
						<?php
						$jmlh = mysql_num_rows(mysql_query("select * from tb_guru"));
						$jmlh_hal = ceil($jmlh / $batas);
						echo "Halaman : ";
						for ($i=1; $i <= $jmlh_hal ; $i++) { 
							if ($i != $hal) {
								echo "<a href='?page=guru&hal=$i'> $i </a>";
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
</div>