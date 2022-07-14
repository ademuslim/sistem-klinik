<?php include_once('../_header.php'); ?>


<!-- Integrasi DataTables Client-side dengan PHP dan Bootstrap -->

<div class="box">
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
    <h2>
        Data Dokter
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
        </div>
    </h2>
    <div class="table-responsive">
        <!-- Data Tables Client-side id (id="dokter") -->
        <table class="table table-striped table-bordered table-hover" id="dokter">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Dokter</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $sql_dokter = mysqli_query($koneksi, "SELECT * FROM dokter") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_dokter) > 0) {
                    while ($data = mysqli_fetch_array(($sql_dokter))) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_dokter'] ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $data['id_dokter'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?= $data['id_dokter'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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

<!-- Data Tables Client-side-->
<script>
    $(document).ready(function() {
        $('#dokter').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [2]
            }],
            order: [
                [0, 'asc']
            ],
        });
    });
</script>

<?php include_once('../_footer.php'); ?>