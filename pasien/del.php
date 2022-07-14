<?php
require_once "../_config/koneksi.php";

mysqli_query($koneksi, "DELETE FROM pasien WHERE id_pasien = '$_GET[id]'") or die(mysqli_error($koneksi));
echo "<script>window.location='data.php';</script>";
