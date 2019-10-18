<?php
$id = @$_GET['kode'];

mysql_query("delete from tb_pelajaran where md5(kode_pelajaran)='$id'")or die(mysql_error());
?>
<script type="text/javascript">
	window.location.href="?page=pelajaran";
</script>