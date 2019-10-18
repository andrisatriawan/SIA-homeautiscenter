<?php
$siswa = @$_GET['siswa'];
$guru = @$_GET['guru'];
$pelajaran = @$_GET['kode'];

echo $siswa;
echo $pelajaran;

$datasiswa = mysql_fetch_array(mysql_query("select * from tb_siswa where md5(id_siswa) = '$siswa' "))or die(mysql_error());
$dataguru = mysql_fetch_array(mysql_query("select * from tb_guru where md5(id_guru) = '$guru' "))or die(mysql_error());
$datapelajaran = mysql_fetch_array(mysql_query("select * from tb_pelajaran where md5(kode_pelajaran) = '$pelajaran'"))or die(mysql_error());

$id_siswa = $datasiswa['id_siswa'];
$id_guru = $dataguru['id_guru'];
$kode_pelajaran = $datapelajaran['kode_pelajaran'];
$tanggal = date('Y-m-d');


mysql_query("delete from tb_nilai where kode_pelajaran = '$kode_pelajaran' and tanggal = '$tanggal' and id_guru = '$id_guru' and id_siswa = '$id_siswa' ")or die(mysql_error());

header('location: ?page=pelajaran&kode='.$siswa);

?>