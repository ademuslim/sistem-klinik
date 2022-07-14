<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Rekam Medis</h1>
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
    <h4>
        <small>Data Rekam Medis</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Rekam Medis</a>
        </div>
    </h4>
    <div class="table-responsive">
        <!-- Data Tables Client-side id (id="berobat") -->
        <table class="table table-striped table-bordered table-hover" id="berobat">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama Pasien</th>
                    <th>Keluhan</th>
                    <th>Hasil Diagnosa</th>
                    <th>Nama Dokter</th>
                    <th>Penatalaksanaan</th>
                    <th>Data Obat</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $query =    "SELECT * FROM berobat
                            INNER JOIN pasien ON berobat.id_pasien = pasien.id_pasien
                            INNER JOIN dokter ON berobat.id_dokter = dokter.id_dokter
                ";
                $sql_berobat = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                while ($data = mysqli_fetch_array($sql_berobat)) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= tgl_indonesia($data['tgl_berobat']) ?></td>
                        <td><?= $data['nama_pasien'] ?></td>
                        <td><?= $data['keluhan_pasien'] ?></td>
                        <td><?= $data['hasil_diagnosa'] ?></td>
                        <td><?= $data['nama_dokter'] ?></td>
                        <td><?= $data['penatalaksanaan'] ?></td>

                        <!-- Looping dalam looping (menampilkan data obat) -->
                        <td>
                            <?php
                            $sql_obat = mysqli_query($koneksi, "SELECT * FROM resep_obat JOIN obat ON resep_obat.id_obat = obat.id_obat WHERE id_berobat = '$data[id_berobat]'") or die(mysqli_error($koneksi));
                            while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                echo $data_obat['nama_obat'] . "<br>";
                            }
                            ?>
                        </td>
                        <!-- Hapus Data -->
                        <td class="text-center">
                            <a href="del.php?id=<?= $data['id_berobat'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                        </td>
                    <?php
                }
                    ?>
            </tbody>
        </table>
    </div>


</div>

<!-- Data Tables Client-side-->
<script>
    $(document).ready(function() {
        $('#berobat').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [3, 4, 6, 7, 8]
            }],
            order: [
                [0, 'asc']
            ],
        });
    });
</script>

<?php include_once('../_footer.php'); ?>