<?php
require_once "_config/koneksi.php";

//jika ada seassion arahkan ke dashboard
if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('dashboard') . "';</script>";
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
