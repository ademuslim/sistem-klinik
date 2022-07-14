<?php include_once('../_header.php'); ?>

<!-- Halaman Dinamis -->
<div class="row">

  <div class="header-dashboard">
    <img src="../_assets/amlogo.png" alt="amlogo" class="brand">
    AM KLINIK
    <p>Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, laboriosam recusandae.</p>
    <p>Labore voluptates voluptatibus minima quibusdam accusantium.
    </p>
  </div>

  <hr>

  <div>
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
  </div>

  <h4>Selamat datang <mark><?= $_SESSION['user']; ?></mark> di aplikasi AM Klinik.</h4>

  <h3>Dashboard</h3>

  <div class="pasien">
    <p>Data Pasien</p>
    <?php
    $queryJml = "SELECT * FROM pasien";
    $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
    ?>
    <div class="jml">
      <?php
      echo "<b>$jml</b>";
      ?>
    </div>

  </div>

  <div class="dokter">
    <p>Data Dokter</p>
    <?php
    $queryJml = "SELECT * FROM dokter";
    $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
    ?>
    <div class="jml">
      <?php
      echo "<b>$jml</b>";
      ?>
    </div>
  </div>

  <div class="obat">
    <p>Data Obat</p>
    <?php
    $queryJml = "SELECT * FROM obat";
    $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
    ?>
    <div class="jml">
      <?php
      echo "<b>$jml</b>";
      ?>
    </div>
  </div>

  <div class="kunjungan">
    <p>Rekam Medis</p>
    <?php
    $queryJml = "SELECT * FROM berobat";
    $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
    ?>
    <div class="jml">
      <?php
      echo "<b>$jml</b>";
      ?>
    </div>
  </div>



</div>

<?php include_once('../_footer.php'); ?>