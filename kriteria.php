<?php
spl_autoload_register(function($class){
  require_once $class.'.php';
});

$saw = new Saw();
 ?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rekomendasi Smartphone</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- loader -->
	<div class="bg-loader">
		<div class="loader"></div>
	</div>

	<!-- header -->
	<div class="medsos">
		<div class="container">
			<ul>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>
	<header>
		<div class="container">
			<h1><a href="index.php">Rekomendasi Smartphone</a></h1>
			<ul>
				<li><a href="index.php">HOME</a></li>
				<li class="active"><a href="kriteria.php">KRITERIA</a></li>
				<li><a href="barang.php">BARANG</a></li>
				<li><a href="b_kriteria.php">B. KRITERIA</a></li>
				<li><a href="normalisasi.php">NORMALISASI</a></li>
			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Home / Kriteria</p>
		</div>
	</section>

	<br>
	<br>
<table border="1" cellspacing="0" width="400" height="200">
  <tr>
    <th>No</th>
    <th>Nama Kriteria</th>
    <th>Jenis</th>
    <th>Bobot</th>
  </tr>

<?php
$no=1;
$kriteria = $saw->get_data_kriteria();
$jml_kriteria = $kriteria->rowCount();
while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td>C<?php echo $data_kriteria['id_kriteria']; ?></td>
    <td><?php echo $data_kriteria['nama_kriteria']; ?></td>
    <td><?php echo $data_kriteria['jenis']; ?></td>
    <td><?php echo $data_kriteria['bobot']; ?></td>
  </tr>

<?php } ?>
</table>

<br><br>
<hr>
	<!-- footer -->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2020 - Rekomendasi Laptop. By Kelompok 10.</small>
		</div>
	</footer>


	<script type="text/javascript">
		$(document).ready(function(){
			$(".bg-loader").hide();
		})
	</script>
</body>
</html>