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
          <li><a href="#portfolio" class="page-scroll">Portofolio</a></li>
          <li><a href="#produk" class="page-scroll">Produk</a></li>
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
    <h2>Selamat Datang admin <?= $_SESSION['nama']; ?></h2>
  </div>
  <!-- akhir Jumbotron -->

  <!-- About -->
  <section class="about" id="about">
    <about>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">About</h2>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nobis eveniet, molestiae dolorum inventore voluptate reiciendis quasi corrupti sit, adipisci accusantium quas architecto rem voluptatem iste delectus aperiam obcaecati placeat?</p>
          </div>
          <div class="col-sm-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae nobis eveniet, molestiae dolorum inventore voluptate reiciendis quasi corrupti sit, adipisci accusantium quas architecto rem voluptatem iste delectus aperiam obcaecati placeat?</p>
          </div>
        </div>
      </div>
    </about>
  </section>
  <!-- Akhir -->

  <!-- Portofolio -->
  <section class="portfolio" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-center">
          <h2>Portfolio</h2>
          <hr>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/1.jpg">
          </a>
        </div>

        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/2.jpg">
          </a>
        </div>

        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/3.jpg">
          </a>
        </div>

        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/4.jpg">
          </a>
        </div>

        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/5.jpg">
          </a>
        </div>

        <div class="col-sm-4">
          <a href="" class="thumbnail">
            <img src="../assets/img/portfolio/6.jpg">
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir -->

  <!-- Produk -->
  <section class="produk" id="produk">
    <about>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center">Produk</h2>
            <hr>
          </div>
        </div>
        <div class="row">

          <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Nama Produk</th>
                <th>harga</th>
                <th>Foto</th>
                <th>Opsi</th>
            </thead>
            <tbody>
              <?php $query = mysqli_query($dbconnect, 'SELECT * FROM produk'); ?>
              <?php $nomor = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                  <td><?= $nomor ?></td>
                  <td><?= $row['nama_produk']; ?></td>
                  <td><?= $row['harga_produk'] ?></td>
                  <td>
                    <img src="../foto_produk/<?= $row['gambar_produk'] ?>" width="70">
                  </td>
                  <td>
                      <a href="ubah_produk.php?id=<?= $row['id_produk'] ?>" class="btn btn-primary">Ubah</a>
                      <a href="hapus_produk.php?id=<?= $row['id_produk'] ?>" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php $nomor++; ?>
              <?php endwhile; ?>
            </tbody>
          </table>
          <a href="tambah_produk.php" class="btn btn-primary">&plus;Tambah</a>
        </div>
      </div>
    </about>
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