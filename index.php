<?php
@session_start();
ob_start();

include 'inc/koneksi.php';

$id_login = @$_SESSION['login'];

$sql_login = mysql_query("select * from tb_user where id = '$id_login'") or die(mysql_error());
$data_login = mysql_fetch_array($sql_login);
$cek_login = mysql_num_rows($sql_login);

if ($cek_login>=1){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Autis Center</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    if ($data_login['level']=='Admin'){
    ?>

  	<!-- nav admin -->
  	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container-fluid">
  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
        <a class="navbar-brand" href="../sekolah">
        <img class="logo" src="img/icon/logo.png" alt="">
        <div>
          <p class="text-header" >Home Autis Center  </p>
          <p class="info-header">Mendidik Anak Berkebutuhan Khusus</p>
        </div>
        
        </a>
  			</div>
  			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
  				<ul class="nav navbar-nav">
            <li><a class="nav-link active" href="../sekolah">Beranda</a></li>
            <li><a class="nav-link" href="?page=guru">Data Guru</a></li>
            <li><a class="nav-link" href="?page=siswa">Data Siswa</a></li>
            <li><a class="nav-link" href="?page=pelajaran">Data Pelajaran</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> User</span></a>
              <ul class="dropdown-menu">
                <li><a href="?page=identitas"><i class="glyphicon glyphicon-cog"> Pengaturan</i></a></li>
                <li><a href="?page=logout"><i class="glyphicon glyphicon-log-out"> Keluar</i></a></li>
              </ul>
            </li>
  					
  				</ul>
  			</div>
  		</div>
  	</nav>
  	<!-- akhir nav admin-->

    <?php
  }elseif($data_login['level']=='Guru'){
    ?>
    <!-- nav guru -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../sekolah">
        <img class="logo" src="img/icon/logo.png" alt="">
        <div>
          <p class="text-header" >Home Autis Center  </p>
          <p class="info-header">Mendidik Anak Berkebutuhan Khusus</p>
        </div>
        
        </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="../sekolah">Beranda</a></li>
            <li><a href="?page=siswa">Pilih Siswa</a></li>
            <li><a href="?page=nilai">Input Nilai</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> User</span></a>
              <ul class="dropdown-menu">
                <li><a href="?page=identitas"><i class="glyphicon glyphicon-cog"> Pengaturan</i></a></li>
                <li><a href="?page=logout"><i class="glyphicon glyphicon-log-out"> LogOut</i></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir nav guru-->
    <?php
  }elseif($data_login['level']=='Siswa'){
    ?>
    <!-- nav guru -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../sekolah">
        <img class="logo" src="img/icon/logo.png" alt="">
        <div>
          <p class="text-header" >Home Autis Center  </p>
          <p class="info-header">Mendidik Anak Berkebutuhan Khusus</p>
        </div>
        
        </a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="../sekolah">Beranda</a></li>
            <li><a href="?page=nilai">Lihat Nilai</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"> User</span></a>
              <ul class="dropdown-menu">
                <li><a href="?page=identitas"><i class="glyphicon glyphicon-cog"> Pengaturan</i></a></li>
                <li><a href="?page=logout"><i class="glyphicon glyphicon-log-out"> LogOut</i></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- akhir nav guru-->
<?php } ?>

    <!-- isi -->
    <section class="isi">
      <?php
      if ($data_login['level']=='Admin'){
        if (@$_GET['page']=='guru') {
          if (@$_GET['action']=='tambah'){
            include 'asset/admin/guru/fmtambahguru.php';
          }elseif(@$_GET['action']=='edit'){
            include 'asset/admin/guru/fmeditguru.php';
          }elseif(@$_GET['action']=='hapus'){
            include 'asset/admin/guru/hapusguru.php';
          }else{
            include 'asset/admin/dataguru.php';
          }
        }elseif(@$_GET['page']=='siswa'){
          if (@$_GET['action']=='tambah'){
            include 'asset/admin/siswa/fmtambahsiswa.php';
          }elseif(@$_GET['action']=='edit'){
            include 'asset/admin/siswa/fmeditsiswa.php';
          }elseif(@$_GET['action']=='hapus'){
            include 'asset/admin/siswa/hapussiswa.php';
          }else{
            include 'asset/admin/datasiswa.php';
          }
        }elseif(@$_GET['page']=='pelajaran'){
          if (@$_GET['action']=='tambah'){
            include 'asset/admin/pelajaran/fmtambahpelajaran.php';
          }elseif(@$_GET['action']=='edit'){
            include 'asset/admin/pelajaran/fmeditpelajaran.php';
          }elseif(@$_GET['action']=='hapus'){
            include 'asset/admin/pelajaran/hapuspelajaran.php';
          }else{
            include 'asset/admin/datapelajaran.php';
          }
        }elseif(@$_GET['page']=='identitas'){
          if (@$_GET['action']=='edit'){
            include 'asset/admin/fmubahdata.php';
          }else{
            include 'asset/admin/identitas.php';
          }
        }elseif(@$_GET['page']=='password'){
          include 'asset/ubahpassword.php';
        }elseif(@$_GET['page']=='logout'){
          include 'logout.php';
        }else{
          include 'asset/admin/utama.php';
        }
      }elseif($data_login['level']=='Guru'){
        if (@$_GET['page']=='siswa') {
          include 'asset/guru/pelajaran/pilihsiswa.php';
        }elseif(@$_GET['page']=='pelajaran') {
          if (@$_GET['action']=='tambah') {
            include 'asset/guru/pelajaran/simpan.php';
          }elseif(@$_GET['action']=='hapus'){
            include 'asset/guru/pelajaran/hapus.php';
          }else{
            include 'asset/guru/pelajaran/pilihpelajaran.php';
          }
        }elseif(@$_GET['page']=='nilai') {
          if (@$_GET['action']=='input') {
            include 'asset/guru/nilai/inputnilai.php';
          }else{
            include 'asset/guru/nilai/pilihsiswa.php';
          }
        }elseif(@$_GET['page']=='identitas'){
          if (@$_GET['action']=='edit'){
            include 'asset/guru/fmubahdata.php';
          }else{
            include 'asset/guru/identitas.php';
          }
        }elseif(@$_GET['page']=='password'){
          include 'asset/ubahpassword.php';
        }elseif(@$_GET['page']=='logout'){
          include 'logout.php';
        }
      }elseif($data_login['level']=='Siswa'){
        if (@$_GET['page']=='nilai') {
          include 'asset/siswa/datanilai.php';
        }elseif(@$_GET['page']=='identitas'){
          if (@$_GET['action']=='edit'){
            include 'asset/siswa/fmubahdata.php';
          }else{
            include 'asset/siswa/identitas.php';
          }
        }elseif(@$_GET['page']=='password'){
          include 'asset/ubahpassword.php';
        }elseif(@$_GET['page']=='logout'){
          include 'logout.php';
        }
      }
      
      ?>
    </section>
    <!-- akhir isi -->

    <!-- footer -->
    <footer class="container text-center">
      <div class="row">
        <div class="col-sm-12">
          <p>Copyright <i class="glyphicon glyphicon-copyright-mark"></i> 2019 | Home Autis Center</p>
        </div>
      </div>
    </footer>
    <!-- akhir footer -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/fungsi.js"></script>
  </body>
</html>

<?php
}else{
  header('location: login.php');
}

ob_flush();
?>