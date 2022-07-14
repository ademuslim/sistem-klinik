<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>User</h1>
    <a href="#menu-toggle" class="btn btn-default btn-xs" id="menu-toggle">Toggle Menu</a>
    <h4>
        <small>Data User</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah User</a>
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="pasien">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $sql_users = mysqli_query($koneksi, "SELECT * FROM users") or die(mysqli_error($koneksi));
                if (mysqli_num_rows($sql_users) > 0) {
                    while ($data = mysqli_fetch_array(($sql_users))) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['nama_lengkap'] ?></td>
                            <td class="text-center">
                                <a href="edit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?= $data['id'] ?>" onclick="return confirm('Yakin akan menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
    <div style="float:left;">
        <?php
        $queryJml = "SELECT * FROM users";
        $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
        echo "Jumlah Data Users : <b>$jml</b>";
        ?>
    </div>
</div>

<?php include_once('../_footer.php'); ?>