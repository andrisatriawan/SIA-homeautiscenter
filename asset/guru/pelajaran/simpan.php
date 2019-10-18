<?php

?>

<?php
$siswa = @$_GET['siswa'];
$guru = @$_GET['guru'];
$pelajaran = @$_GET['kode'];

echo $siswa ."<br>";
echo $guru ."<br>";
echo $pelajaran ."<br>";

$datasiswa = mysql_fetch_array(mysql_query("select * from tb_siswa where md5(id_siswa) = '$siswa'"))or die(mysql_error());
$dataguru = mysql_fetch_array(mysql_query("select * from tb_guru where md5(id_guru) = '$guru'"))or die(mysql_error());
$datapelajaran = mysql_fetch_array(mysql_query("select * from tb_pelajaran where md5(kode_pelajaran) = '$pelajaran'"))or die(mysql_error());


	$carikode = mysql_query("select * from tb_nilai order by id_nilai desc") or die (mysql_error());
	$datakode = mysql_fetch_array($carikode);
	if ($datakode){
		$nilaikode=substr($datakode[0], 2);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "N_".str_pad($kode, 4, "0", STR_PAD_LEFT);
	}else{
		$hasilkode="N_0001";
	}


echo $datasiswa['id_siswa'];
echo $dataguru['id_guru'];
echo $datapelajaran['kode_pelajaran'];

$id_siswa = $datasiswa['id_siswa'];
$id_guru = $dataguru['id_guru'];
$kode_pelajaran = $datapelajaran['kode_pelajaran'];
$tanggal = date('Y-m-d');

mysql_query("insert into tb_nilai values('$hasilkode', '$kode_pelajaran', '0', '$tanggal', '$id_guru', '$id_siswa', '')")or die(mysql_error());

header('location: ?page=pelajaran&kode='.$siswa);

?>