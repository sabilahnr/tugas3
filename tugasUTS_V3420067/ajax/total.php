<?php
    require '../koneksi.php';
    $sum = mysqli_query($conn, "SELECT SUM(total) FROM pembelian");
    while($fetch = mysqli_fetch_array($sum)){
    $hasil_rupiah = $fetch['SUM(total)'];
?>
    <h3><?="Rp " . number_format($hasil_rupiah,2,',','.');?></h3>
<?php
}
?>