<?php 
include '../config.php';

$query = $dbconnect->query("SELECT * FROM produk WHERE id_produk = '$_GET[id]'");
$row = $query->fetch_assoc();
$fotoproduk = $row['foto'];
if(file_exists("../foto_produk/$fotoproduk")){
    unlink("../foto_produk/$fotoproduk");
}

$dbconnect->query("DELETE FROM produk WHERE id_produk = '$_GET[id]'");

echo "<script>alert('Produk terhapus')</script>";
echo "<script>location ='index.php'</script>";
