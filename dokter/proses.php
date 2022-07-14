<?php
require_once "../_config/koneksi.php";
require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


// Generate a version 4 (random) UUID object
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    mysqli_query($koneksi, "INSERT INTO dokter (id_dokter, nama_dokter) VALUES ('$uuid', '$nama')") or die(mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    mysqli_query($koneksi, "UPDATE dokter SET nama_dokter = '$nama' WHERE id_dokter = '$id'") or die(mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
}
