<?php
    require '../koneksi.php';
    $data = $_POST['select'];
  
    $cari_harga = mysqli_query($conn, "SELECT * FROM `uts` WHERE nama = '".$data."'");
    $hasil_harga = mysqli_fetch_array($cari_harga);
    $harga = $hasil_harga['harga'];
    $insert = mysqli_query($conn, "INSERT INTO `pembelian` (`id_beli`, `nama_beli`, `jumlah`) VALUES (NULL, '".$data."', '".$harga."')");
?>