<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Users</h1>
    <h4>
        <small> Edit Data Users</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">

            <?php
            $id = @$_GET['id'];
            $sql_users = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'") or die(mysqli_error($koneksi));
            $data = mysqli_fetch_array($sql_users);
            ?>

            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="text" name="username" id="username" value="<?= $data['username'] ?>" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="text" name="pass" id="pass" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>