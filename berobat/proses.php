<?php
require_once "../_config/koneksi.php";
require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


// Generate a version 4 (random) UUID object
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();

    $tgl = trim(mysqli_real_escape_string($koneksi, $_POST['tgl']));
    $pasien = trim(mysqli_real_escape_string($koneksi, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['keluhan']));
    $diagnosa = trim(mysqli_real_escape_string($koneksi, $_POST['diagnosa']));
    $dokter = trim(mysqli_real_escape_string($koneksi, $_POST['dokter']));
    $penatalaksanaan = trim(mysqli_real_escape_string($koneksi, $_POST['penatalaksanaan']));

    mysqli_query($koneksi,  "INSERT INTO berobat (id_berobat, id_pasien, id_dokter, tgl_berobat, keluhan_pasien, hasil_diagnosa, penatalaksanaan) VALUES ('$uuid', '$pasien', '$dokter', '$tgl', '$keluhan', '$diagnosa', '$penatalaksanaan')") or die(mysqli_error($koneksi));

    $obat = $_POST['obat'];
    foreach ($obat as $ob) {
        mysqli_query($koneksi, "INSERT INTO resep_obat (id_berobat, id_obat) VALUES ('$uuid', '$ob')") or die(mysqli_error($koneksi));
    }

    echo "<script>window.location='data.php';</script>";
}
