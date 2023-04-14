<?php
    require '../koneksi.php';
    ini_set('display_errors', 0);
?>
<?php
$harga_asli = $_POST['jumlah'];
$id= $_POST['id'];
$no = 1;
$data = mysqli_query($conn, "select * from pembelian where id_beli = '" . $id . "'");
$hasil = mysqli_fetch_array($data);
$total = $hasil['jumlah'] * $harga_asli;
$id_beli = $hasil['id_beli'];
$update_total_harga = mysqli_query($conn, "UPDATE `pembelian` SET `total` = '" . $total . "', `harga_asli` = '" . $harga_asli . "' WHERE `id_beli` = '" . $id . "'");
if ($update_total_harga) { ?>
    <table border="1" class="table text-center">
        <tr class="bg-primary text-white">
            <th>Id Penjualan</th>
            <th>Nama Kendaraan</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
        <?php
        require '../koneksi.php';
        $no = 1;
        $data = mysqli_query($conn, "select * from pembelian");
        while ($hasil = mysqli_fetch_array($data)) {
            $patok = $hasil['id_beli'];
        ?>
            <tr>
                <td><?= $hasil['id_beli']; ?></td>
                <td><?= $hasil['nama_beli']; ?></td>
                <td><?= "Rp " . number_format($hasil['jumlah'], 2, ',', '.'); ?></td>
                <input id="<?= $no++; ?>" type="hidden" value="<?= $id_motor; ?>">
                <td><input type="number" min="1" class="form-control" name="jumlah" id="jumlah<?= $patok; ?>" value="<?= $hasil['harga_asli']; ?>" onkeyup='kolom("<?= $patok; ?>")'></td>
                <td><?= "Rp " . number_format($hasil['total'], 2, ',', '.'); ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>