<?php
require_once "../_config/koneksi.php";
require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


// Generate a version 4 (random) UUID object
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($koneksi, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
    $umur = trim(mysqli_real_escape_string($koneksi, $_POST['umur']));

    $sql_cek_identitas = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_identitas = '$identitas'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas sudah pernah diinput!'); window.location='add.php';</script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO pasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, umur) 
                            VALUES ('$uuid', '$identitas', '$nama', '$jk', '$umur')") or die(mysqli_error($koneksi));
        echo "<script>window.location='data.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($koneksi, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jk = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
    $umur = trim(mysqli_real_escape_string($koneksi, $_POST['umur']));

    $sql_cek_identitas = mysqli_query($koneksi, "SELECT * FROM pasien WHERE no_identitas = '$identitas' AND id_pasien != '$id'") or die(mysqli_error($koneksi));
    if (mysqli_num_rows($sql_cek_identitas) > 0) {
        echo "<script>alert('Nomor Identitas sudah pernah diinput!'); window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($koneksi, "UPDATE pasien SET no_identitas = '$identitas', nama_pasien = '$nama', jenis_kelamin = '$jk', umur = '$umur' WHERE id_pasien = '$id'") or die(mysqli_error($koneksi));
        echo "<script>window.location='data.php';</script>";
    }
}
