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
				<li><a href="kriteria.php">KRITERIA</a></li>
				<li><a href="barang.php">BARANG</a></li>
				<li><a href="b_kriteria.php">B. KRITERIA</a></li>
                <li class="active"><a href="normalisasi.php">NORMALISASI</a></li>
                
			</ul>
		</div>
	</header>

	<!-- label -->
	<section class="label">
		<div class="container">
			<p>Home / Normalisasi</p>
		</div>
	</section>

    <br><br>

    <table border="1" cellspacing="0" height="200" width="600">

  <tr>
    <th rowspan="2">Karyawan</th>
    <th colspan="<?php echo $jml_kriteria; ?>">Kriteria</th>
  </tr>

  </tr>

  <tr>
  <?php
  $hasil_ranks=array();
  $kriteria = $saw->get_data_kriteria();
  while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
  ?>
      <th>C<?php echo $data_kriteria['id_kriteria']; ?></th>

  <?php } ?>
  </tr>

  <?php
  $karyawan = $saw->get_data_karyawan();
  while ($data_karyawan = $karyawan->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <td><center>K<?php echo $data_karyawan['id_karyawan']; ?></center></td>
      <?php
      // tampilkan nilai dengan id_karyawan ...
      $hasil_normalisasi=0;
      $nilai = $saw->get_data_nilai_id($data_karyawan['id_karyawan']);
      while ($data_nilai = $nilai->fetch(PDO::FETCH_ASSOC)) {
      //
        $kriteria = $saw->get_data_kriteria_id($data_nilai['id_kriteria']);
        while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
          if ($data_kriteria['jenis']=="cost") {
            $min = $saw->nilai_min($data_nilai['id_kriteria']);
            while ($data_min = $min->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                   echo number_format($hasil = $data_min['min']/$data_nilai['nilai'],2);
                      $hasil_kali = $hasil*$data_kriteria['bobot'];
                      $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                   ?>
                 </center>
              </td>
            <?php } ?>

          <?php }elseif ($data_kriteria['jenis']=="benefit") {
            $max = $saw->nilai_max($data_nilai['id_kriteria']);
            while ($data_max = $max->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                  echo $hasil = $data_nilai['nilai']/$data_max['max'];
                    $hasil_kali = $hasil*$data_kriteria['bobot'];
                    $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                  ?>
                </center>
              </td>
            <?php } ?>
          <?php }
        ?>

        <?php } } ?>

    </tr>
  <?php } ?>

</table>

<br><br>

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