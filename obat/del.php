<?php
require_once "../_config/koneksi.php";

mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='data.php';</script>";
