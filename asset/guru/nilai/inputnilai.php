<?php
$id_siswa = @$_GET['kode'];
$tanggal = @$_GET['tgl'];
?>




<div class="col-md-6 col-md-offset-3 keliling">
	<h2>Input Nilai Siswa</h2>
	<form action="" method="post">
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama Pelajaran</th>
				<th>Nilai</th>
				<th>Keterangan</th>
			</tr>
			<?php

			$no=1;
			// $batas =5;
			// $hal = @$_GET['hal'];
			// if (empty($hal)){
			// 	$posisi=0;
			// 	$hal=1;
			// }else{
			// 	$posisi = ($hal-1) * $batas;
			// }


			// $sqlnilai = mysql_query("select * from tb_nilai where md5(id_siswa) = '$id_siswa' and md5(Tanggal) = '$tanggal' and id_guru = '$id_login' limit $posisi, $batas")or die(mysql_error());
			$sqlnilai = mysql_query("select * from tb_nilai where md5(id_siswa) = '$id_siswa' and md5(Tanggal) = '$tanggal' and id_guru = '$id_login'")or die(mysql_error());
			$j=1;
			while ($data = mysql_fetch_array($sqlnilai)) {
				
				$kode_pelajaran = $data['kode_pelajaran'];
				$datapel = mysql_fetch_array(mysql_query("select * from tb_pelajaran where kode_pelajaran = '$kode_pelajaran' "))or die(mysql_error());
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $datapel['nama']; ?></td>
				<td>
					<?php
					$datanilai= $data['Nilai'];
					$id_nilai[$j] = $data['id_nilai'];
					if ($datanilai == 'BL'){
						?>
					<select class="form-control" name="nilai<?php echo $j ?>">
						<option id="" >--Pilih--</option>
						<option id="BL" selected="selected">BL</option>
						<option id="UL" >UL</option>
						<option id="L" >L</option>
					</select>
						<?php
					}elseif ($datanilai=='UL'){
						?>
					<select name="nilai<?php echo $j ?>" class="form-control">
						<option id="" >--Pilih--</option>
						<option id="BL" >BL</option>
						<option id="UL" selected="selected">UL</option>
						<option id="L" >L</option>
					</select>
						<?php
					}elseif ($datanilai=='L'){
						?>
					<select name="nilai<?php echo $j ?>" class="form-control">
						<option id="" >--Pilih--</option>
						<option id="BL" >BL</option>
						<option id="UL" >UL</option>
						<option id="L" selected="selected">L</option>
					</select>
						<?php
					}else{
					?>
					<select name="nilai<?php echo $j ?>" class="form-control">
						<option id="" >--Pilih--</option>
						<option id="BL" >BL</option>
						<option id="UL" >UL</option>
						<option id="L" >L</option>
					</select>
					<?php
					}
					?>
				</td>
				<td>
					<textarea class="form-control" rows="1" placeholder="Keterangan" name="keterangan<?php echo $j ?>"><?php echo $data['keterangan'] ?></textarea>
					<?php $j++; ?>
				</td>
			</tr>
		<?php } ?>
			<tr>
				<td colspan="2">
					<input type="submit" name="simpan" value="Simpan" class="btn btn-default">
				</td>
				<td colspan="2" class="text-right">
					<!-- <?php
					$jmlh = mysql_num_rows(mysql_query("select * from tb_nilai where md5(id_siswa) = '$id_siswa' and md5(Tanggal) = '$tanggal' and id_guru = '$id_login'"));
					$jmlh_hal = ceil($jmlh / $batas);
					echo "Halaman : ";
					for ($i=1; $i <= $jmlh_hal ; $i++) { 
						if ($i != $hal) {
							echo "<a href='?page=nilai&action=input&kode=$id_siswa&tgl=$tanggal&hal=$i'> $i </a>";
						}else{
							echo " $i ";
						}
					}
					echo "dari " .$jmlh_hal;
					?> -->
				</td>
			</tr>
		</table>
	</form>
</div>




<?php

$simpan = @$_POST['simpan'];
if ($simpan) {
	$a =1;
	$sqlnilai = mysql_query("select * from tb_nilai where md5(id_siswa) = '$id_siswa' and md5(Tanggal) = '$tanggal' and id_guru = '$id_login' ")or die(mysql_error());
	while ($data = mysql_fetch_array($sqlnilai)) {
		$nilai = @$_POST['nilai' .$a];
		$keterangan = @$_POST['keterangan' .$a];
		$id_nilai_send = $id_nilai[$a];
		echo $nilai;
		$kode_pelajaran = $data['kode_pelajaran'];
		mysql_query("update tb_nilai set nilai = '$nilai', keterangan = '$keterangan' where id_nilai = '$id_nilai_send' and kode_pelajaran = '$kode_pelajaran' and id_guru = '$id_login' and md5(Tanggal) = '$tanggal' and md5(id_siswa) = '$id_siswa' ")or die(mysql_error());
		$a++;
	}
	?>
        <script type="text/javascript">
          alert("Berhasil disimpan");
          window.location.href="?page=nilai&action=input&kode=<?php echo $id_siswa ?>&tgl=<?php echo $tanggal ?>";
        </script>
    <?php
}

?>