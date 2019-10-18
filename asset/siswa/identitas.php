<?php
$sql = mysql_query("select * from tb_siswa where id_siswa = '$id_login' ")or die(mysql_error());
$data = mysql_fetch_array($sql);
?>


<div class="container">
	<div class="col-md-6 col-md-offset-3 keliling">
		<div class="row header-identitas">
			<div class="col-md-6">
				<h2 class="h2-identitas">Identitas Diri</h2>
			</div>
			<div class="col-md-6 a-identitas text-right">
				<a href="?page=identitas&action=edit&id=<?php echo md5($data['id_guru']) ?>" title="Ubah Data"><i class="glyphicon glyphicon-pencil"></i></a>
				<a href="?page=password&id=<?php echo md5($data['id_guru']) ?>" title="Ubah Password"><i class="glyphicon glyphicon-lock"></i></a>
			</div>
		</div>
		<hr>
		<table width="100%" class="text-identitas table-identitas">
			<tr>
				<td width="30%">ID Siswa</td>
				<td width="5%" class="text-left">:</td>
				<td width="65%"><?php echo $data['id_siswa']; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $data['nama']; ?></td>
			</tr>
			<tr>
				<td>Tempat, Tanggal Lahir</td>
				<td>:</td>
				<td>
					<?php
					$tanggal = $data['tgl_lahir'];
					echo $data['tempat_lahir'] .", " .date("d M Y", strtotime($tanggal));
					?>
					
				</td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $data['jenis_kelamin']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
		</table>
	</div>
</div>