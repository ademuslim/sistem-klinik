<?php
require_once "_config/koneksi.php";
require "_assets/libs/vendor/autoload.php";

//jika tidak ada seassion arahkan ke login
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi - AM Klinik</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('_assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/simple-sidebar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/css/mystyle.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url('_assets/amlogo.png') ?>">

    <!-- Load DataTables Client-side -->
    <link href="<?= base_url('_assets/libs/DataTables/datatables.min.css') ?>" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?= base_url('dashboard') ?>"><span class="text-primary"><b>AM KLINIK</b></span></a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard') ?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('pasien/data.php') ?>">Data Pasien</a>
                </li>
                <li>
                    <a href="<?= base_url('dokter/data.php') ?>">Data Dokter</a>
                </li>
                <li>
                    <a href="<?= base_url('obat/data.php') ?>">Data Obat</a>
                </li>
                <li>
                    <a href="<?= base_url('berobat/data.php') ?>">Rekam Medis</a>
                </li>
                <li>
                    <a href="<?= base_url('users/data.php') ?>">Users</a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout.php') ?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
                <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>

                <!-- Load DataTables Client-side -->
                <script src="<?= base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>