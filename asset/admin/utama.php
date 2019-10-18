<?php

$tanggal = date('Y-m-d');

$sql_siswa = mysql_query("select * from tb_siswa where exists (select * from tb_nilai where tb_nilai.id_siswa = tb_siswa.id_siswa and tb_nilai.Tanggal = '$tanggal')")or die(mysql_error());
$jumlah_siswa = mysql_num_rows($sql_siswa);
$sql = mysql_query("select * from tb_siswa where exists (select * from tb_nilai where tb_nilai.id_siswa = tb_siswa.id_siswa and tb_nilai.Tanggal = '$tanggal' and tb_nilai.Nilai != '0')")or die(mysql_error());
$jumlah_belajar = mysql_num_rows($sql);
?>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<a href="?page=guru">
				<div class="guru text-center">
					<img src="img/icon/guru.png">
					<hr style="border-top: 0.5px solid">
					<h4><b>GURU</b></h4>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="?page=siswa">
				<div class="siswa text-center">
					<img src="img/icon/siswa.png">
					<hr style="border-top: 0.5px solid ">
					<h4><b>SISWA</b></h4>
				</div>
			</a>
		</div>
		<div class="col-sm-4">
			<a href="?page=pelajaran">
				<div class="pelajaran text-center">
					<img src="img/icon/studies.png">
					<hr style="border-top: 0.5px solid">
					<h4><b>PELAJARAN</b></h4>
				</div>
			</a>
		</div>
	</div>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="note">
				<div class="text-left info">
					<h2>Jumlah Siswa yang belajar hari ini</h2>
				</div>
				<div class="text-center info-jumlah">
					<h1><?php echo $jumlah_siswa; ?></h1>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="note">
				<div class="text-left info">
					<h2>Jumlah Siswa yang telah diberi nilai hari ini</h2>
				</div>
				<div class="text-center info-jumlah">
					<h1><?php echo $jumlah_belajar; ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
		
		
	
