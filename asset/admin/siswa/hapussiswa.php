<?php
$id = @$_GET['kode'];

mysql_query("delete from tb_siswa where md5(id_siswa)='$id'")or die(mysql_error());
mysql_query("delete from tb_user where md5(id)='$id'")or die(mysql_error());
mysql_query("delete from tb_nilai where md5(id_siswa)='$id'")or die(mysql_error());

?>
<script type="text/javascript">
	window.location.href="?page=siswa";
</script>