<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>KREDIT</title>
</head>
<body>
    <div class="container">
	<form action="submit.php" method="POST" class="center">
		<h1 style="color:#000080 ;" class="judul">Simulasi Kredit Rumah</h1>

		<div>
			<label for="hargaRumah">Harga rumah :</label>
			<input required="" type="number" id="harga" name="hargaRumah">

			<label for="uangMuka">Uang muka :</label>
			<input required="" type="number" id="uangMuka" name="uangMuka"> 
            <tr"> *minimal 30% dari harga rumah</tr>

            <p>
			<label for="lamaAngsuran">Lama angsuran (tahun) :</label>
			<select name="lamaAngsuran">
				<?php for ($i=5; $i <= 10 ; $i++) { ?>
			    	<option value="<?php echo $i ?>"><?php echo $i ?></option>
			    <?php } ?>
			</select>
            </p>

			<label for="bunga">Bunga (%) :</label>
			<select name="bunga">
				<?php for ($i=5; $i <= 10 ; $i++) { ?>
			    	<option value="<?php echo $i ?>"><?php echo $i ?>%</option>
			    <?php } ?>
			</select>

			<input type="reset" value="reset">
			<input type="submit" value="Submit" name="submit">
			
		</div>
	</form>
</body>
</html>				