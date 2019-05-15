<?php
session_start();
require '../config.php';
/**
 * Jika Tidak login atau sudah login tapi bukan sebagai admin
 * maka akan dibawa kembali kehalaman login atau menuju halaman yang seharusnya.
 */
$ambil = $dbconnect->query('SELECT * FROM users');
$pecah = $ambil->fetch_assoc();

if (
    !isset($_SESSION['user_login']) || (isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'admin')
) {
    header('location:./../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" id="home">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin|Putri</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/admin.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="#home" class="navbar-brand page-scroll"><?= $pecah['nama']; ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#about" class="page-scroll">About</a></li>
                    <li><a href="#produk" class="page-scroll">Produk</a></li>
                    <li><a href="#portfolio" class="page-scroll">Portofolio</a></li>
                    <li><a href="#Contact" class="page-scroll">Contact</a></li>
                    <li><a href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir -->
    <!-- Jumbotron -->
    <div class="jumbotron text-center">
        <img src="../assets/img/admin.jpg" class="img-circle" width="250">
        <h1>
            <? $pecah['nama']; ?>
        </h1>
        <p>Siswa | SMKN 8 JEMBER | RPL</p>
        <h2>Hallo <?= $_SESSION['nama']; ?> Apakabar ?</h2>
    </div>
    <!-- akhir Jumbotron -->

    <section class="produk" id="produk">
        <div class="container">
            <div class="row">
                <div class="com-sm-12">
                    <h2 class="text-center">Produk</h2>
                    <hr>
                </div>
                <h2>Tambah Produk</h2>

                <form method="post" enctype="multipart/form-data">

                    <div class="form-group">

                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>

                    </div>
                    <div class="form-group">

                        <label>Harga (Rp.)</label>
                        <input type="number" class="form-control" name="harga" required>

                    </div>
                    <div class="form-group">

                        <label>Foto</label>
                        <input type="file" name="foto">

                    </div>
                    <button class="btn btn-primary" name="save"><i class="fa fa-save"></i> Simpan</button>
                    <a href="index.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>

                </form>

            </div>
        </div>
    </section>
    <!-- akhir -->

    <!-- Contact -->
    <section class="Contact" id="Contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Contact</h2>
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form>
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" id="nama" class="form-control" placeholder="Masukan nama">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Masukan email">
                        </div>

                        <div class="form-group">
                            <label for="telp">noTelp</label>
                            <input type="telp" id="telp" class="form-control" placeholder="Masukan no telp">
                        </div>

                        <label for="kategori">Kategori</label>
                        <select class="form-control">
                            <option>-- Pilih Kategori --</option>
                            <option>Web Design</option>
                            <option>Web Development</option>
                        </select>
                        <br>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea class="form-control" rows="10" placeholder="Masukan pesan"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir -->

    <!-- footer -->
    <footer>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Copyright 2018 | built with <i class="glyphicon glyphicon-apple"></i> by <a href="">Putri Nisa</a></p>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <a href="http://youtube.com" class="btn btn-danger"><i class="glyphicon glyphicon-play"></i>Subcribe to Youtube</a>
                </div>
            </div>

        </div>
    </footer>
    <!-- Akhir-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.min.js"></script>

    <script src="../assets/js/jquery-easing.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <script src="../assets/js/script.js"></script>
</body>

</html>

<?php
if (isset($_POST['save'])) {
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "../foto_produk/" . $nama);
    $isi = $dbconnect->query("INSERT INTO produk (nama_produk, harga_produk, gambar_produk) VALUES ('$_POST[nama]','$_POST[harga]','$nama')");

    if (!$isi) {
        echo "<script>alert('" . $dbconnect->error . "'); window.location.href = 'index.php';</script>";
    } else {
        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
    }
}

?>