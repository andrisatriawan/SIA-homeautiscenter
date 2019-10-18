<?php
@session_start();
ob_start();
include 'inc/koneksi.php';

$id_login = @$_SESSION['login'];

$sql_login = mysql_query("select * from tb_user where id = '$id_login'") or die(mysql_error());
$data_login = mysql_fetch_array($sql_login);
$cek_login = mysql_num_rows($sql_login);

if ($cek_login >= 1){
	header('location: ../sekolah');
}else{
  $cari = mysql_query('select * from tb_user')or die(mysql_error());
  $cekdata = mysql_num_rows($cari);
  if ($cekdata>=1){
    $tombol = 'Login';
  }else{
    $tombol = 'Simpan';
  }

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
  	<!-- nav -->
  	<nav class="navbar navbar-default navbar-fixed-top">
  		<div class="container-fluid">
  			<div class="navbar-header">
        <a class="navbar-brand" href="../sekolah">
        <img class="logo" src="img/icon/logo.png" alt="">
        <div>
          <p class="text-header" >Home Autis Center  </p>
          <p class="info-header">Mendidik Anak Berkebutuhan Khusus</p>
        </div>
        
        </a>
  			</div>
  		</div>
  	</nav>
  	<!-- akhir nav -->

    <!-- isi -->
    <section class="isi container">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4 keliling">
          <form class="form-horizontal" action="" method="post">
            <div class="form-group header">
              <div class="col-md-12 text-center">
                <h2>Login</h2>
                <hr>
              </div>
            </div>
            <div class="form-group">
              <label for="id" class="col-md-4 control-label">ID</label>
              <div class="col-md-8">
                <input type="text" class="form-control" id="id" placeholder="ID Login" name="id">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-md-4 control-label">Password</label>
              <div class="col-md-8">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-offset-4 col-md-4">
              	<input type="submit" name="submit" value="<?php echo $tombol; ?>" class="btn btn-default">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- akhir isi -->

    <?php
    $id = @$_POST['id'];
    $pass = @$_POST['password'];
    $login = @$_POST['submit'];

    if ($login) {
      if ($id==""||$pass==""){
        ?><script type="text/javascript">alert("Username atau Password tidak boleh kosong")</script><?php
      }else{
        if ($tombol== 'Simpan'){
          mysql_query("insert into tb_user values('$id', md5('$pass'), 'Admin')")or die(mysql_error());
          mysql_query("insert into tb_admin values('$id', '','','')")or die(mysql_error());
          @$_SESSION['login']=$id;
          header('location: ../sekolah');
        }else{
          $sql=mysql_query("select * from tb_user where id='$id' and password = md5('$pass')")or die(mysql_error());
          $data=mysql_fetch_array($sql);
          $cek = mysql_num_rows($sql);
          if ($cek >= 1){
            @$_SESSION['login']=$data['id'];
            header('location: ../sekolah');
          }else{
            ?><script type="text/javascript">alert("Username dan Password salah")</script><?php
          }
        }
      }
    }
    ?>

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
  </body>
</html>

<?php
}
ob_flush();
?>