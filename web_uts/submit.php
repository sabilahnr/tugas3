<?php
$data = array(
	'hargaRumah' => $_POST['hargaRumah'],
	'uangMuka' => $_POST['uangMuka'],
	'lamaAngsuran' => $_POST['lamaAngsuran'],
	'bunga' => $_POST['bunga'],
);

function rumah_uangMuka($hargaRumah, $uangMuka)
{
	$total = $hargaRumah - $uangMuka;
	return $total;
}

function angsuran_pokok_perbulan($hargaRumah, $uangMuka, $lamaAngsuran)
{
	$total = ($hargaRumah - $uangMuka) / ($lamaAngsuran * 12);

	return $total;
}

function bunga_perbulan($hargaRumah, $uangMuka, $lamaAngsuran, $bunga)
{
	$total = ($hargaRumah * ($bunga / 100) * $lamaAngsuran) / ($lamaAngsuran * 12);

	return $total;
}

function total_angsuran_perbulan($hargaRumah, $uangMuka, $lamaAngsuran, $bunga)
{
	$total = angsuran_pokok_perbulan($hargaRumah, $uangMuka, $lamaAngsuran) + bunga_perbulan($hargaRumah, $uangMuka, $lamaAngsuran, $bunga);

	return $total;
}

function angsuranBulan($lamaAngsuran)
{
	$bulan = ($lamaAngsuran * 12);
	return $bulan;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Hasil</title>
</head>

<body>
	<?php
	if ($_POST['uangMuka'] < ($_POST['hargaRumah'] * 0.3)) {
	?>
		<script>
			alert("Maaf, uang muka minimal 30% dari harga rumah.");
			window.location.href = "/web_uts";
		</script>
	<?php } ?>
	<div class="center">
		<h1 class="judul">Hasil Perhitungan Kredit</h1>

		<table>
			<tr>
				<td>Harga awal</td>
				<td>Rp. <?php echo number_format($data['hargaRumah']) ?></td>
			</tr>
            <tr>
				<td>Uang Muka</td>
				<td>Rp. <?php echo number_format($data['uangMuka'], 2, ",", "."); ?></td>
			</tr>
			<tr>
				<td>Harga Akhir</td>
				<td>Rp. <?php echo number_format(rumah_uangMuka($data['hargaRumah'], $data['uangMuka']), 2, ",", "."); ?></td>
			</tr>
            <tr>
				<td>Bunga per Bulan</td>
				<td><?php echo $data['bunga']; ?>% / bulan</td>
			</tr>
			<tr>
				<td>Total Bunga perbulan</td>
				<td>Rp. <?php echo number_format(bunga_perbulan($data['hargaRumah'], $data['uangMuka'], $data['lamaAngsuran'], $data['bunga']), 2, ",", "."); ?></td>
			</tr>
			<tr>
				<td>Cicilan perbulan</td>
				<td>Rp. <?php echo number_format(total_angsuran_perbulan($data['hargaRumah'], $data['uangMuka'], $data['lamaAngsuran'], $data['bunga']), 2, ",", "."); ?></td>
			</tr>
				<td>Lama Angsuran</td>
				<td><?php echo $data['lamaAngsuran']; ?> Tahun / <?php echo angsuranBulan($data['lamaAngsuran']); ?> Bulan</td>
			</tr>
		</table>
        <p align="right" ><a href="index.php" title="Hitung Ulang">Hitung Ulang?</a></p>
	</div>
</body>

</html>