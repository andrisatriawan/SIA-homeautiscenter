<?php
$sql = mysql_query("select * from tb_admin where id = '$id_login' ")or die(mysql_error());
$data = mysql_fetch_array($sql);
?>


<div class="container">
	<div class="col-md-6 col-md-offset-3 keliling">
		<div class="row header-identitas">
			<div class="col-md-6">
				<h2 class="h2-identitas">Identitas Diri</h2>
			</div>
			<div class="col-md-6 a-identitas text-right">
				<a href="?page=identitas&action=edit&id=<?php echo md5($data['id']) ?>" title="Ubah Data"><i class="glyphicon glyphicon-pencil"></i></a>
				<a href="?page=password&id=<?php echo md5($data['id']) ?>" title="Ubah Password"><i class="glyphicon glyphicon-lock"></i></a>
			</div>
		</div>
		<hr>
		<table width="100%" class="text-identitas table-identitas">
			<tr>
				<td width="30%">ID Admin</td>
				<td width="5%" class="text-left">:</td>
				<td width="65%"><?php echo $data['id']; ?></td>
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
				<td><?php echo $data['jk']; ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $data['alamat']; ?></td>
			</tr>
			<tr>
				<td>No Hp</td>
				<td>:</td>
				<td><?php echo $data['no_hp']; ?></td>
			</tr>
		</table>
	</div>
</div>