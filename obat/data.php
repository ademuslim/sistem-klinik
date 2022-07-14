<?php include_once('../_header.php'); ?>

<div class="box">
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
    <h2>
        Data Obat
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Obat</a>
        </div>
    </h2>
    <div class="table-responsive">
        <!-- Data Tables Client-side id (id="obat") -->
        <table class="table table-striped table-bordered table-hover" id="obat">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Obat</th>
                    <th>Stok Obat</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>

                <?php

                $no = 1;
                $sql_obat = mysqli_query($koneksi, "SELECT * FROM obat") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_obat) > 0) {
                    while ($data = mysqli_fetch_array(($sql_obat))) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_obat'] ?></td>
                            <td><?= $data['stok_obat'] ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $data['id_obat'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?= $data['id_obat'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan.</td></tr>";
                }
                ?>

            </tbody>
        </table>
    </div>

</div>

<!-- Data Tables Client-side -->
<script>
    $(document).ready(function() {
        $('#obat').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [3] //kolom 4
            }],
            order: [
                [0, 'asc']
            ],
        });
    });
</script>

<?php include_once('../_footer.php'); ?>