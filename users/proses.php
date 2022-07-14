<?php
require_once "../_config/koneksi.php";
require "../_assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;


// Generate a version 4 (random) UUID object
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $pass = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['pass'])));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));

    mysqli_query($koneksi, "INSERT INTO users (id, username, password, nama_lengkap) 
                            VALUES ('$uuid', '$username', '$pass', '$nama')") or die(mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $pass = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['pass'])));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    mysqli_query($koneksi, "UPDATE users SET username = '$username', password = '$pass', nama_lengkap = '$nama' WHERE id = '$id'") or die(mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
}
