<?php
require 'koneksi.php';
ini_set('display_errors', 0);
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <!-- Bootstrap CSS -->
    <style type="text/css">
    body{
    background:#B0E0E6; 
    }
    </style>
    <title>MOTOR SHNR</title>
</head>

<body class="p-3 mb-2 bg-info">
    <div class="container mb-5 mt-3 bg-light border border-primary pb-1 pt-1 pl-1 pr-1 border-2">
        <form action="" method="post" class="form-control">
            <center>
                <h3>MOTOR SHNR</h3>
            </center>
            <div class="row">
                <div class="col-md-3">
                    <input type="number" class="form-control" name="id_motor" autofocus placeholder="ID Motor" autocomplete="off" id="id_motor">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nama" autofocus placeholder="Nama Motor" autocomplete="off" id="nama">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="harga" autofocus placeholder="Harga" autocomplete="off" id="harga">
                </div>
                <div class="col-md-3">
                    <input type="number" class="form-control" name="tahun" autofocus placeholder="Tahun" autocomplete="off" id="tahun">
                </div>
            </div>
            <br>
        </form>
        <h5>
            Hasil Pencarian
        </h5>
        <div id='container'>
            <table border="1" class="table text-center">
                <tr class="bg-primary text-white">
                    <th>ID Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Harga</th>
                    <th>Tahun</th>
                </tr>
                <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "select * from uts");
                while ($hasil = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?= $hasil['id']; ?></td>
                        <td><?= $hasil['nama']; ?></td>
                        <td><?= "Rp " . number_format($hasil['harga'], 2, ',', '.'); ?></td>
                        <td><?= $hasil['tahun']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <br><br>
        <form action="" method="post" class="form-control">
            
                <h3>Pembelian Motor</h3>
            
            <select name="select" class="form-control" id="select">
                <?php
                $caridata = mysqli_query($conn, "select * from uts");
                while ($hasil = mysqli_fetch_array($caridata)) {
                ?>
                    <option value="<?= $hasil['nama']; ?>"><?= $hasil['nama']; ?></option>
                <?php
                }
                ?>
            </select><br>
            <button id="button" class="btn btn-success" value="submit" onclick="sendData()">Tambah</button>
        </form><br>

        <div id="struk">
            <table border="1" class="table text-center">
                
                <h3>Hasil Belanja</h3>
                
                <tr class="bg-primary text-white">
                    <th>ID Motor</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
                <?php
                require 'koneksi.php';
                $no = 1;
                $data = mysqli_query($conn, "select * from pembelian");
                while ($hasil = mysqli_fetch_array($data)) {
                    $patok = $hasil['id_beli'];
                ?>
                    <tr>
                        <td><?= $hasil['id_beli']; ?></td>
                        <td><?= $hasil['nama_beli']; ?></td>
                        <td><?= "Rp " . number_format($hasil['jumlah'], 2, ',', '.'); ?></td>
                        <td><input type="number" class="form-control" name="jumlah" id="jumlah<?= $patok; ?>" onkeyup='kolom("<?= $patok; ?>")' min="1"></td>
                        <td>Rp.</td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <button id="hitung" class="btn btn-primary text-white">Hitung Total</button>
            </div>
            <div class="col-md-6">
                <h4>Total Semua Pembelian</h4><br>
                <div id="final">
                    <!--Tempat Harga-->
                </div>
            </div>
        </div>
        <br><br>
    </div>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>