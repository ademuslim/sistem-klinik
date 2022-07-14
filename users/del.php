<?php
require_once "../_config/koneksi.php";

mysqli_query($koneksi, "DELETE FROM users WHERE id = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='data.php';</script>";
